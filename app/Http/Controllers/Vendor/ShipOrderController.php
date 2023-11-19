<?php

namespace App\Http\Controllers\Vendor;

use App\Models\OrderConsignment;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ReturnRequest;
use App\Models\ShoppingCart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Auth;

class ShipOrderController extends Controller
{
    public function index(){
        $payment = Payment::where('status','Success')->get();
        $order = Order::select('products.id','products.name as prodName','user_address.name as userName','orders.transaction_id','orders.total_payment','orders.status','product_variation.name as variationName')
                        ->join('products','orders.product_id','products.id')
                        ->join('user_address','orders.user_address_id','user_address.id')
                        ->leftjoin('product_variation','orders.product_combination_id','product_variation.id')
                        ->where('orders.vendor_id', Auth::user()->id)
//                    ->whereIn('status','To Ship','Completed')
//                    ->whereIn('orders.status', ['To Ship','Completed','Pending'])
//                    ->groupBy('transaction_id')
                    ->whereNull('orders.deleted_at')
                    ->whereNull('user_address.deleted_at')
                    ->get();
        $toship = Order::select('products.id','products.name as prodName','user_address.name as userName','orders.transaction_id','orders.total_payment','orders.status','product_variation.name as variationName')
                    ->join('products','orders.product_id','products.id')
                    ->join('user_address','orders.user_address_id','user_address.id')
					->leftjoin('product_variation','orders.product_combination_id','product_variation.id')
                    ->where('orders.vendor_id',Auth::user()->id)
                    ->where('status','To Ship')
                    ->whereNull('orders.deleted_at')
                    ->whereNull('user_address.deleted_at')
                    ->get();
//        dd($toship);
        $completed = Order::select('products.id','products.name as prodName','user_address.name as userName','orders.transaction_id','orders.total_payment','orders.status','product_variation.name as variationName')
                    ->join('products','orders.product_id','products.id')
                    ->join('user_address','orders.user_address_id','user_address.id')
					->leftjoin('product_variation','orders.product_combination_id','product_variation.id')
                    ->where('orders.vendor_id',Auth::user()->id)
                    ->where('status','Completed')
                    ->whereNull('orders.deleted_at')
                    ->get();
//        $useraddress = UserAddress::where('user_id',)->get();
        return view('vendor.shiporder.index')
            ->with('payment',$payment)
            ->with('orderall',$order)
            ->with('toship',$toship)
            ->with('completed',$completed);
    }

    public function editShipOrder($id){
        //dd($id);
        //$order = Order::join('products','orders.product_id','products.id')
        //->join('user_address','orders.user_address_id','user_address.user_id')
        //->where('orders.vendor_id',Auth::user()->id)
        //->where('transaction_id',$id)->get();
        $order = Order::where('transaction_id',$id)->first();
		$consignment = OrderConsignment::where('order_id',$order->id)->first();
        $useraddress = null;
            if(isset($order)) {
                $useraddress = UserAddress::where('id',$order->user_address_id)->first();
            } if($order->courier_id == 7){
                $vendoraddress = UserAddress::where('id',$order->vendor_address_id)->first();
            }
			 else{
                $vendoraddress = null;
            }
            return view('vendor.shiporder.editShipOrder')
                ->with('orders',$order)
                ->with('consignments',$consignment)
                ->with('useraddress',$useraddress)
                ->with('vendoraddress',$vendoraddress);
    }

    public function ship(Request $request){
        //dd($request->trans_id);
        $order = Order::select('id')->where('transaction_id',$request->trans_id)->get();
        //dd($order);
        foreach($order as $orders) {
            // $orders->status='Completed';
            $orders->status='To Received';
            $orders->save();
        }

        foreach($order as $orders) {
            $shiporder = new OrderConsignment();
            $shiporder->order_id = $orders->id;
            $shiporder->status = 'Delivered';
            $shiporder->order_number = null;
            $shiporder->consignment_number = $request->tracking;
            $shiporder->save();
            return back()->with('success','Prepare Delivery Successfully!');
        }
        return redirect()->back();
    }

    public function viewOrder($id){
        $order=Order::select('id','transaction_id')->where('transaction_id',$id)->first();
//        $product = null;
//        $orderQtt = null;
//        $useraddress = null;
//        $reason = null;
//        if(isset($order)) {
//            $product = Product::where('id',$order->product_id)->first();
//            $orderQtt = ShoppingCart::where('id',$order->id)->first();
//            $useraddress = UserAddress::where('id',$order->user_address_id)->first();
//            $reason = ReturnRequest::where('order_id',$order->id)->first();
//        }
        return view('vendor.return.viewOrder')
            ->with('orders',$order)
//            ->with('products',$product)
//            ->with('quantities',$orderQtt)
//            ->with('useraddress',$useraddress)
//            ->with('reasons',$reason)
            ;
    }
	
	public function confirmOrder(){
        $tokenPayex = PayexToken::first();
        \Log::info($tokenPayex->token);

        $result = Request::create(
            'api/token',
            'POST'
        );
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $time = \Carbon\Carbon::now()->format('H:i:s');

        $client = new Client;

        $refno = "DL76900013d7f4ed9a8f";
        $params = [
            'headers' => [
                'accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' .$tokenPayex->token,
            ],
        ];

        try{
            $encodedRefno = urlencode($refno);
            $url = "https://api.payex.io/api/v1/Delivery/Orders/".$encodedRefno;
            // $url = "https://sandbox-payexapi.azurewebsites.net/api/v1/Delivery/Orders/".$encodedRefno;
            $response = $client->request('PUT', $url, $params);

            $online_body = $response->getBody()->getContents();
            $response_json = json_decode($online_body);

            if (!is_null($response_json) && property_exists($response_json, 'consignment_number')) {
                $consignment_number = $response_json->consignment_number;
                \Log::info('Consignment Number: ' . $consignment_number);
                return $consignment_number;
            } else {
                \Log::info('Invalid response: ' . $online_body);
                return null;
            }

        } catch (ClientException $e) {
            \Log::info('log1'.$e);
            return null;
        } catch (\Exception $e){
            \Log::info('log2'.$e);
            return null;
        }
    }




}
