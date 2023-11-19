<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourierList;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductCombination;
use App\Models\ProductStock;
use App\Models\ShoppingCart;
use App\Models\UserAddress;
use App\Models\Voucher;
use App\Models\PayexToken;
use App\Models\PayexReturn;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Auth;
use DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment(Request $request)
    {

        $token = new Client();
        $rand = Str::random(9);
        $save = false;

        $result = Request::create(
            'api/token',
            'POST'
        );

        $user = Auth::user();
        $userAddress = UserAddress::find($request->address);
        if ($userAddress == null) {
            return redirect()->back()->withErrors('Please input your address');
        }

        $result = \Route::dispatch($result);


        $payment = $this->getPayment($request, $rand, $result->getData(), $token, $user, $userAddress);

        if (isset($payment) && $payment->status == '00' && count($payment->result) != 0 && $payment->result[0]->status == '00') {

            $decryptCourier = Crypt::decrypt($request->courier);

            $cart = ShoppingCart::where('user_id', Auth::user()->id)
                ->whereNull('deleted_at')
                ->with('product')
                ->with('productImage')
                ->get();
            \Log::info('carting' . $cart);
            $voucher = Voucher::where('unique_code', $request->voucher)->with('product')->first();


            $save = $this->savedata($request, $rand, $decryptCourier, $cart, $voucher, $user, $userAddress);
            //$createOrderDelivery = $this->createOrderDelivery($decryptCourier,$request,$cart,$token,$user,$userAddress);

        }

        if ($save != false && isset($payment) && $payment->status == '00' && count($payment->result) != 0 && $payment->result[0]->status == '00') {

            return redirect($payment->result[0]->url);
        } else {
            return redirect()->back()->withErrors('Please choose your shipping options');
        }
    }

    public function getPayment($request, $rand, $result, $token, $user, $userAddress)
    {

        $params = [
            'headers' => ['accept' => 'application/json', 'Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $result->token],
            'body' => json_encode([[
                'amount' => number_format((float)$request->total_payment * 100, 0, '.', ''),
                'currency' => 'MYR',
                'collection_id' => 'T' . strtoupper($rand),
                'capture' => true,
                'customer_name' => $user->name,
                'email' => $user->email,
                'contact_number' => $user->phone,
                'address' => $userAddress->address,
                'postcode' => $userAddress->postalcode,
                'city' => $userAddress->city,
                'state' => $userAddress->state,
                'country' => 'Malaysia',
                'shipping_name' => $userAddress->name,
                'shipping_email' => $userAddress->email,
                'shipping_contact_number' => $userAddress->phone,
                'shipping_address' => $userAddress->address,
                'shipping_postcode' => $userAddress->postalcode,
                'shipping_city' => $userAddress->city,
                'shipping_state' => $userAddress->state,
                'shipping_country' => 'Malaysia',
                'description' => 'Purchase Packages',
                'reference_number' => 'T' . strtoupper($rand),
                'payment_type' => $request->payment,
                'payment_types' => [$request->payment],
                'show_payment_types' => true,
                'tokenize' => true,
                'card_on_file' => '',
                'return_url' => url('/api/callback_url'),
                'callback_url' => url('/api/callback_url'),
                'accept_url' => url('/api/callback_url'),
                'reject_url' => url('/api/callback_url'),
                'nonce' => 'T' . strtoupper($rand),
                'source' => 'AppLink',
                'expiry_date' => Carbon::now()->isoFormat('YYYY-MM-DD'),
                'splits' => [],
            ]])

        ];

        //        dd(config('app.PAYEX_API'));

        $response = $token->request('POST', config('app.PAYEX_API') . '/api/v1/PaymentIntents', $params);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $data = json_decode($body);



        return $data;
    }

    public function savedata($request, $rand, $decryptCourier, $cart, $voucher, $user, $userAddress)
    {

        $total_weight = 0;

        try {
            DB::beginTransaction();

            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->address_id =  isset($userAddress) ? $userAddress->id : 0;
            $payment->voucher_id = isset($voucher) ? $voucher->id : null;
            $payment->cart_total = $request->cart_total;
            $payment->shipping_total = $request->shipping_total;
            $payment->voucher_total = $request->voucher_total;
            $payment->total_payment = $request->total_payment;
            $payment->transaction_id = 'T' . strtoupper($rand);
            $payment->status = 'pending';
            $payment->service_charge = 0;
            $payment->total_weight = $total_weight;
            $payment->save();

            foreach ($cart as $key => $carts) {
                \Log::info('DecryptCourier: ' . json_encode($decryptCourier));
                \Log::info('Vendor ID 27: ' . $carts->vendor_id);

                if (isset($decryptCourier[$carts->vendor_id])) {
                    \Log::info('Courier data: ' . json_encode($decryptCourier[$carts->vendor_id]));
                } else {
                    \Log::warning('Undefined array key: ' . $carts->vendor_id);
                }

                $voucher_total = isset($voucher) && $voucher->product_id == $carts->product_id ? $request->voucher_total : 0;
                // \Log::info($voucher_total);
                $shipping_total = isset($decryptCourier[$carts->vendor_id]) && isset($decryptCourier[$carts->vendor_id]->price) ? $decryptCourier[$carts->vendor_id]->price : 0;
                // \Log::info($shipping_total);
                $cart_total = isset($carts->product) ? $carts->product->list_price_on_store * $carts->quantity : 0;
                // \Log::info($cart_total);
                $courier = CourierList::find($decryptCourier[$carts->vendor_id]->id);
                \Log::info('test' . $courier);
                $vAddress = UserAddress::where('user_id', $carts->vendor_id)->with('stateCode')->first();
                // \Log::info($vAddress);
                $weight = 0;

                $product_combine = ProductCombination::where('product_id', $carts->product_id)->first();
                $product_stock = ProductStock::where('product_id', $carts->product_id)
                    ->where('products_combination_id', isset($product_combine) ? $product_combine->id : null)->latest()->first();

                if (isset($product_stock)) {
                    $weight = $product_stock->weight;
                    $total_weight += $product_stock->weight;
                }

                $order = new Order;
                $order->user_id = $carts->user_id;
                $order->vendor_id = $carts->vendor_id;
                $order->cart_id = $carts->id;
                $order->product_id = $carts->product_id;
                $order->product_combination_id = $carts->product_combinations_id;
                $order->transaction_id = 'T' . strtoupper($rand);
                $order->voucher_id = isset($voucher) && $voucher->product_id == $carts->product_id ? $voucher->id : null;
                $order->cart_total = $cart_total;
                $order->shipping_total = $shipping_total;
                $order->voucher_total = $voucher_total;
                $order->total_payment = ($cart_total + $shipping_total) - $voucher_total;
                $order->status = 'pending';
                $order->courier_id = isset($courier) ? $courier->id : 0;
                $order->vendor_address_id = isset($vAddress) ? $vAddress->user_id : 0;
                $order->user_address_id = isset($userAddress) ? $userAddress->user_id : 0;
                $order->total_weight = $weight;
                $order->admin_status = 'pending';
                $order->save();
            }

            $payment->total_weight = $total_weight;
            $payment->save();



            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            // \Log::info($e->getMessage());

            // dd($e->getLine().' : '.$e->getMessage());
            return false;
        }
    }
}
