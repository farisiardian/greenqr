<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourierList;
use App\Models\PayexToken;
use App\Models\ProductCombination;
use App\Models\ProductStock;
use App\Models\ShoppingCart;
use App\Models\State;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use Auth;
use Illuminate\Support\Facades\Crypt;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	
    {
		
        $cart = ShoppingCart::where('user_id', Auth::user()->id)->where('sold',0)
			->whereNull('deleted_at')
            ->with('product')
            ->with('productImage')
            ->with('stocks')
            ->get()
            ->groupBy('vendor_id');
		// \Log::info($cart);
        $state = State::get();

        $courierList = null;

        if(isset($request->courier)){

            $decryptCourier = Crypt::decrypt($request->courier);
        }


		//dd($request->courier,$decryptCourier);
		//$request->session()->put('pickup_address', $request->pickup_address);
		$pickupAdd = CourierList::where('serviceId','pickup')->first();
		$selected_vendor_address = UserAddress::where('user_id',$request->vendor)
		->where('id',$request->address_select)
		->first();
		\Log::info($selected_vendor_address);
        foreach($cart as $key => $carts){
		\Log::info('display courier'.$request->courier);
		\Log::info('display courier'.$pickupAdd);

		//$carts->put(('Shipping'),[1,2,3]);
            $carts->{'shipping'} = null;

            if(isset($decryptCourier) && isset($decryptCourier[$key])){
                $courier = CourierList::find($decryptCourier[$key]->id);
				
				
                if(isset($courier)){
                    $courier->{'receiveBy'} = isset($decryptCourier[$key]->receiveBy) ? $decryptCourier[$key]->receiveBy : null;
                    $courier->{'price'} = isset($decryptCourier[$key]->price) ? $decryptCourier[$key]->price : null;

                }


                $carts->{'shipping'} = $courier;

                $courierList[$key] = $courier;
            }

            if(isset($request->couriers) && isset($request->vendor) && $request->vendor == $key){
                $courier = CourierList::find($request->couriers);


                if(isset($courier)){
                    $courier->{'receiveBy'} = $request->receiveBy;
                    $courier->{'price'} = $request->price;

                }


                $carts->{'shipping'} = $courier;
                $courierList[$key] = $courier;
            }

        }




        $crypCourier = Crypt::encrypt($courierList);

//        dd($crypCourier);

        $address = Auth::user()->address()->where('default_address',1)->first();

        if(isset($request->address)){
            $address = Auth::user()->address()->where('id',$request->address)->first();
        }

		

		// $currDate = Carbon::now();
        // $voucher = null;
        // if(isset($request->voucher)){

            // $voucher = Voucher::where('unique_code', $request->voucher)->with('product')->first();
			// if($voucher->end_at < $currDate) 
			// {
				// return back()->with('error', 'Voucher has expired.');
			// }
			// else{
				// return back()->with('success', 'Voucher is still valid..');
			// }
        // }
		
		$currDate = Carbon::now();
        $voucher = null;
        if(isset($request->voucher)){
            $carting = ShoppingCart::where('user_id', Auth::user()->id)->where('sold',0)->whereNull('deleted_at')->first();
            $voucher = Voucher::where('unique_code', $request->voucher)->with('product')->first();

            if($carting->vendor_id !== $voucher->vendor_id){
                return back()->with('error', 'Voucher Invalid.');
            // } else if($voucher->product_id !== null && $carting->product_id !== $voucher->product_id && $carting->vendor_id !== $voucher->vendor_id) {
            } else if($voucher->product_id !== null && $carting->product_id !== $voucher->product_id) {
                return back()->with('error', 'Voucher is not valid for this product.');
            } else {
                if($voucher->end_at < $currDate)
                {
                    return back()->with('error', 'Voucher has expired.');
                }
            }
        }
		
        $addresslist = Auth::user()->address()->get();


        return view('user.checkout.index')
            ->with('address',$address)
            ->with('addresslist',$addresslist)
            ->with('courier',$crypCourier)
            ->with('voucher',$voucher)
            ->with('state',$state)
            ->with('cart',$cart)
            ->with('pickupAdd',$pickupAdd)
			->with('selected_vendor_address',$selected_vendor_address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function token(){

        $token = new Client();
        $result = PayexToken::where('expiration' , '>', Carbon::now()->isoFormat('YYYY-MM-DD hh:mm:ss'))->first();
//		dd($result);
        if(!isset($result)){
            $params = [
                'headers' => ['Content-Type' => 'application/json','Authorization' => 'Basic '.base64_encode('tanhk@lifecare.com.my:9dZSxA2jIcuYZ1ue4yUoaPix6NA6RtpC')],
				// 'headers' => ['Content-Type' => 'application/json','Authorization' => 'Basic '.base64_encode('emir@sendmylove.co:rgwl7CaDMCQPvt6DWd6rol86fNTNdoEP')],

            ];


            $response = $token->request('POST', 'https://api.payex.io/api/Auth/Token', $params);
            // $response = $token->request('POST', 'https://sandbox-payexapi.azurewebsites.net/api/Auth/Token', $params);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            $data = json_decode($body);

//            dd($data->token);
            $result = PayexToken::first();
            if(!isset($result)){
                $result = new PayexToken;
            }
            $result->token = $data->token;
            $result->expiration = Carbon::parse($data->expiration)->isoFormat('YYYY-MM-DD hh:mm:ss');
            $result->save();

        }

        return $result;
    }

    public function courier(Request $request){

        $token = new Client();
        $result = PayexToken::first();

        if(!isset($result)){
            $result = $this->token();
        }
        if(Carbon::parse($result->expiration) < Carbon::now() ){
            $result = $this->token();
        }
		 // \Log::info($request->vendor_id);
        $vAddress = UserAddress::where('user_id', $request->vendor_id)->with('stateCode')->first();

        $uAddress = UserAddress::where('id',$request->address_id)->with('stateCode')->first();


        $courier = CourierList::get();
		$selfpickup = UserAddress::where('user_id', $request->vendor_id)->with('stateCode')->get();

        if(!isset($vAddress)){
            $courier = CourierList::where('serviceId', 'pickup')->get();
        }

        if(!isset($uAddress)){
            $courier = CourierList::where('serviceId', 'pickup')->get();
        }

        if(isset($uAddress) && isset($vAddress)) {

            $vStatecode = $vAddress->stateCode ? $vAddress->stateCode->code : 'kul';
            $uStatecode = $uAddress->stateCode ? $uAddress->stateCode->code : 'kul';

            $weight = 0;


            $cart = ShoppingCart::where('user_id', Auth::user()->id)->where('sold',0)
                ->where('vendor_id', $request->vendor_id)
                ->get();
				
			// if($cart[0]->product_id >= 1)
			// {
				// foreach ($cart as $carts) {
                // $product_combine = ProductCombination::where('product_id', $carts->product_id)->where('variation_id',$carts->product_combinations_id)->first();
                // $product_stock = ProductStock::where('product_id', $carts->product_id)
                    // ->where('products_combination_id', isset($product_combine) ? $product_combine->variation_id : null)->latest()->first();
				
                // if (isset($product_stock)) {
                    // $weight += $product_stock->weight;
                // }
				// \Log::info($product_combine);
				// \Log::info($product_stock);
				// \Log::info($weight);
            // }
			// }
			// else{
				// foreach ($cart as $carts) {
					// $product_combine = ProductCombination::where('product_id', $carts->product_id)->first();
					// $product_stock = ProductStock::where('product_id', $carts->product_id)
						// ->where('products_combination_id', isset($product_combine) ? $product_combine->variation_id : null)->latest()->first();
					
					// if (isset($product_stock)) {
						// $weight += $product_stock->weight;
					// }
					// \Log::info($product_combine);
					// \Log::info($product_stock);
					// \Log::info($weight);
				// }
			// }
			
			if ($cart[0]->product_id >= 1) {
			foreach ($cart as $carts) {
				$product_combine = ProductCombination::where('product_id', $carts->product_id)
					->where('variation_id', $carts->product_combinations_id)
					->first();
				$product_stock = ProductStock::where('product_id', $carts->product_id)
					->where('products_combination_id', optional($product_combine)->variation_id)
					->latest()
					->first();

				if ($product_stock) {
					$weight += $product_stock->weight;
				}

				\Log::info($product_combine);
				\Log::info($product_stock);
				\Log::info($weight);
			}
		} else {
			foreach ($cart as $carts) {
				$product_combine = ProductCombination::where('product_id', $carts->product_id)
					->first();
				$product_stock = ProductStock::where('product_id', $carts->product_id)
					->where('products_combination_id', optional($product_combine)->variation_id)
					->latest()
					->first();

				if ($product_stock) {
					$weight += $product_stock->weight;
				}

				\Log::info($product_combine);
				\Log::info($product_stock);
				\Log::info($weight);
			}
		}


            $courierP = $this->getCourier($token, $result, $vAddress->postalcode, $uAddress->postalcode, $vStatecode, $uStatecode, $weight);
			\Log::info($courierP);
            $courierP = collect($courierP)->collapse();
        }

//        foreach ($courierP as $courierPs) {
//            \Log::info(collect($courierPs));
////            return $courierPs;
//        }
//
//        return $courierP->firstWhere('id', 'njv-pst');



        foreach ($courier as $couriers){

            if(isset($courierP)) {
                $findc = $courierP->firstWhere('id', $couriers->serviceId);
            }

            $couriers->{'price'} = 0;
            $couriers->{'receiveBy'} = null;

            if($couriers->serviceId != 'pickup' && isset($findc)){
                $couriers->{'price'} = $findc->rate;
                $couriers->{'receiveBy'} = $findc->delivery_time;
            }


        }

//        return $result;

        return view('user.checkout.courier_modal')
            ->with('vendor_id',$request->vendor_id)
            ->with('courier_id',$request->courier_id)
            ->with('address_id',$request->address_id)
            ->with('voucher_id',$request->voucher_id)
            ->with('courierList',$request->courier)
            ->with('courier',$courier)
            ->with('selfpickup',$selfpickup);
    }

    public function getCourier($token,$result,$vpostalcode,$upostalcode,$vStatecode,$uStatecode,$weight){

        $params2 = [
            'headers' => ['accept' => 'application/json','Content-Type' => 'application/json','Authorization' => 'Bearer '.$result->token],
            'body' =>json_encode([ [
                'sender_postcode' => $vpostalcode,
                'sender_state' => $vStatecode,
                'sender_country' => "MY" ,
                'receiver_postcode'=> $upostalcode,
                'receiver_state' => $uStatecode ,
                'receiver_country' => "MY",
                'delivery_type' => "p",
                'parcel_type' => "p",
                'weight' => $weight,
                'pickup_date' => Carbon::now()->addDays(1)->isoFormat('YYYY-MM-DD'),
                'pickup_time' => '16:00',
            ]])

        ];
\Log::info($params2);
        try{
               $response2 = $token->request('POST', 'https://api.payex.io/api/v1/Delivery/Rates', $params2);
          //   $response2 = $token->request('POST', 'https://sandbox-payexapi.azurewebsites.net/api/v1/Delivery/Rates', $params2);

            $statusCode2 = $response2->getStatusCode();
            $body2 = $response2->getBody()->getContents();
            $data2 = json_decode($body2);
            //return response()->json(array("msg" => $body2), 200);
            return $data2->result;
	
        }catch(\Exception $e){


            return $e->getMessage();
  //          \Log::info('data2 '.$e->getMessage());
//            return response()->json(array("msg" => $e->getMessage()), 422);



        }
    }
}
