<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourierList;
use App\Models\Product;
use App\Models\User;
use App\Models\State;
use App\Models\UserAddress;
use App\Models\Order;
use App\Models\PayexReturn;
use App\Models\PayexToken;
use App\Models\Payment;
use App\Models\ProductCombination;
use App\Models\ProductStock;
use App\Models\ShoppingCart;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function token(){

        $token = new Client();
        $result = PayexToken::where('expiration' , '>', Carbon::now()->isoFormat('YYYY-MM-DD hh:mm:ss'))->first();
//		dd($result);
        if(!isset($result)){
            $params = [
                // 'headers' => ['Content-Type' => 'application/json','Authorization' => 'Basic '.base64_encode('emir@sendmylove.co:rgwl7CaDMCQPvt6DWd6rol86fNTNdoEP')],
                'headers' => ['Content-Type' => 'application/json','Authorization' => 'Basic '.base64_encode('tanhk@lifecare.com.my:zjm7Suz9ep7OA1R3Cdw8n9JafRzzfiIT')],

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

    public function callback_url(Request $request){
		
		\Log::info($request);

        $payment = Payment::where('transaction_id', $request->reference_number)->first();
        $order = Order::where('transaction_id', $request->reference_number)->get();

        if($request->auth_code == '00'){
            $status = 'Success';
        }else if($request->auth_code == 00){
            $status = 'Success';
        }else{
            $status = 'Fail';
        }

        $payexreturn = new PayexReturn;
        $payexreturn->payment_id = isset($payment) ? $payment->id : 0;
        $payexreturn->amount = $request->amount;
        $payexreturn->currency = $request->currency;
        $payexreturn->customer_name = $request->customer_name;
        $payexreturn->description = $request->description;
        $payexreturn->reference_number = $request->reference_number;
        $payexreturn->mandate_reference_number = $request->mandate_reference_number;
        $payexreturn->payment_intent = $request->payment_intent;
        $payexreturn->collection_id = $request->collection_id;
        $payexreturn->invoice_id = $request->invoice_id;
        $payexreturn->txn_id = $request->txn_id;
        $payexreturn->txn_date = $request->txn_date;
        $payexreturn->external_txn_id = $request->external_txn_id;
        $payexreturn->response = $request->response;
        $payexreturn->auth_code = $request->auth_code;
        $payexreturn->auth_number = $request->auth_number;
        $payexreturn->fpx_mode = $request->fpx_mode;
        $payexreturn->fpx_buyer_name = $request->fpx_buyer_name;
        $payexreturn->fpx_buyer_id = $request->fpx_buyer_id;
        $payexreturn->fpx_buyer_bank_name = $request->fpx_buyer_bank_name;
        $payexreturn->card_holder_name = $request->card_holder_name;
        $payexreturn->card_number = $request->card_number;
        $payexreturn->card_expiry = $request->card_expiry;
        $payexreturn->card_brand = $request->card_brand;
        $payexreturn->card_on_file = $request->card_on_file;
        $payexreturn->signature = $request->signature;
        $payexreturn->txn_type = $request->txn_type;
        $payexreturn->nonce = $request->nonce;
        $payexreturn->save();



        if(isset($payment) ){

            $payment->txn_id = $request->txn_id;
            $payment->save();

            if($request->auth_code == '00') {
                $payment->status = $status;
                $payment->save();
            }else if($request->auth_code == 00){
                $payment->status = $status;
                $payment->save();

            }else{
                $payment->delete();
            }
        }

        foreach ($order as $orders){

            $orders->txn_id = $request->txn_id;
            $orders->save();

            if($request->auth_code == '00') {
                $orders->status = 'To Ship';
                $orders->save();

                $cart = ShoppingCart::find($orders->cart_id);
                $product = ProductStock::where('product_id',$orders->product_id)
//                    ->where('products_combination_id',$orders->product_combinations_id)
                    ->where('total_stock' , '>=', 0)->latest()->first();

                $productcombination = ProductCombination::where('product_id', $orders->product_id)->first();
//                $productcombination = ProductCombination::find($orders->product_combinations_id);

                if (isset($cart)) {

                    $cart->sold = 1;
                    $cart->save();

                    if(isset($product)){
                        $productStock = new ProductStock;
                        $productStock->product_id = $orders->product_id;
                        $productStock->products_combination_id = isset($productcombination) ? $productcombination->id : $orders->products_combination_id ;
                        $productStock->total_stock = -$cart->quantity;
                        $productStock->supplier_cost_price = $product->supplier_cost_price;
                        $productStock->supermarket_selling_price = $product->supermarket_selling_price;
                        $productStock->price_on_store = $product->price_on_store;
                        $productStock->total_supplier_cost_price = $product->supplier_cost_price*$cart->quantity;
                        $productStock->total_supermarket_selling_price = $product->supermarket_selling_price*$cart->quantity;
                        $productStock->total_price_on_store = $product->price_on_store*$cart->quantity;
                        $productStock->weight = $product->weight;
                        $productStock->save();

                    }

                    if(isset($productcombination)){

                        $productcombination->available_stock = $productcombination->available_stock - $cart->quantity;
                        $productcombination->save();
                    }
					$createOrderDelivery = $this->createOrderDelivery($request,$cart);
                }
            }else if($request->auth_code == 00){
                $orders->status = 'To Ship';
                $orders->save();

                $cart = ShoppingCart::find($orders->cart_id);
                $product = ProductStock::where('product_id',$orders->product_id)
//                    ->where('products_combination_id',$orders->product_combinations_id)
                    ->where('total_stock' , '>=', 0)->latest()->first();

                $productcombination = ProductCombination::where('product_id', $orders->product_id)->first();
//                $productcombination = ProductCombination::find($orders->product_combinations_id);

                if (isset($cart)) {

                    $cart->sold = 1;
                    $cart->save();

                    if(isset($product)){
                        $productStock = new ProductStock;
                        $productStock->product_id = $orders->product_id;
                        $productStock->products_combination_id = isset($productcombination) ? $productcombination->id : $orders->products_combination_id ;
                        $productStock->total_stock = $cart->quantity;
                        $productStock->supplier_cost_price = $product->supplier_cost_price;
                        $productStock->supermarket_selling_price = $product->supermarket_selling_price;
                        $productStock->price_on_store = $product->price_on_store;
                        $productStock->total_supplier_cost_price = $product->supplier_cost_price*$cart->quantity;
                        $productStock->total_supermarket_selling_price = $product->supermarket_selling_price*$cart->quantity;
                        $productStock->total_price_on_store = $product->price_on_store*$cart->quantity;
                        $productStock->weight = $product->weight;
                        $productStock->save();

                    }

                    if(isset($productcombination)){

                        $productcombination->available_stock = $productcombination->available_stock - $cart->quantity;
                        $productcombination->save();
                    }
					 $createOrderDelivery = $this->createOrderDelivery($request,$cart);
                }

            }else{
                $orders->delete();
            }
        }



        return view('receipt')->with('order', $request);
    }
	
	public function createOrderDelivery($request,$cart){
		//dd($request);
        $sender = User::where('id',$cart->vendor_id)->first();
        $orderTracking = Order::where('txn_id', $request->txn_id)->first();
        $user = User::where('id',$orderTracking->user_id)->first();
        $productStock = ProductStock::where('product_id',$cart->product_id)->first();
        //dd($productStock);
        //dd($request,$cart,$sender,$orderTracking,$user,$productStock);
        $vaddress = UserAddress::where('id',$orderTracking->vendor_address_id)->first();
        $uaddress = UserAddress::where('id',$orderTracking->user_address_id)->first();
        $vstateCode = State::join('user_address','user_address.state','states.name')->where('user_address.user_id',$orderTracking->vendor_address_id)->first();
        $ustateCode = State::join('user_address','user_address.state','states.name')->where('user_address.user_id',$orderTracking->user_address_id)->first();
        //dd($vstateCode->code);
        //dd($uaddress);
        $courierList = CourierList::where('id',$orderTracking->courier_id)->first();
        //dd($orderTracking,$courierList);
        //\Log::info('hmmadsad'.$orderTracking);
//        \Log::info('sender' .$sender->name);
        $tokenPayex = PayexToken::first();
//        \Log::info($tokenPayex->token);

        $result = Request::create(
            'api/token',
            'POST'
        );
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $time = \Carbon\Carbon::now()->format('H:i');
        $client = new Client;

        //dd($payment,$payexreturn,$courier);
        //foreach ($cart as $key => $carts) {
            $params = [
                'headers' => [
                    'accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' .$tokenPayex->token
                ],
                'body' => json_encode([
                    'sender_name' => $sender->name,
                    'sender_contact_no' => $sender->phone,
                    'sender_email' => $sender->email,
                    'sender_address' => $vaddress->address,
                    'sender_postcode' => $vaddress->postalcode,
                    'sender_location_id' => $vaddress->id,
                    'sender_location' => $vaddress->city,
                    'sender_city' => $vaddress->city,
                    'sender_state' => (isset($vstateCode) ? $vstateCode->code : ''),
                    'sender_country' => 'MY',
                    'delivery_type' => 'p',
                    'pickup_date' => $date,
                    'pickup_time' => $time,
                    'transportation' => 'v',
                    'trolley' => false,
                    'remarks' => 'delivery',
                    'service_provider' => $courierList->courierId,
                    'consignments' => [
                        [
                            'txn_id' => $request->txn_id,
                            'service_id' => $courierList->serviceId,
                            'receiver_name' => $user->name,
                            'receiver_contact_no' => $user->phone,
                            'receiver_email' => $user->email,
                            'receiver_address' => $uaddress->address,
                            'receiver_postcode' => $uaddress->postalcode,
                            'receiver_location_id' => $uaddress->id,
                            'receiver_location' => $uaddress->address,
                            'receiver_city' => $uaddress->city,
                            'receiver_state' => (isset($ustateCode) ? $ustateCode->code : ''),
                            'receiver_country' => 'MY',
                            'dropoff_id' => $courierList->courierId,
                            'dropoff_name' => $courierList->serviceName,
                            'dropoff_contact_no' => '',
                            'dropoff_email' => '',
                            'dropoff_address' => '',
                            'dropoff_postcode' => '',
                            'dropoff_city' => '',
                            'dropoff_state' => '',
                            'parcel_type' => 'p',
                            'content' => 'abc',
                            'pieces' => $cart->quantity,
                            'value' => '10',
                            'weight' => $productStock->weight,
                            'price' => $orderTracking->total_payment,
                            'insurance' => false,
                        ]
                    ]
                ]),
            ];
//        }
        try{
        $response = $client->request('POST', 'https://api.payex.io/api/v1/Delivery/Orders', $params);
        // $response = $token->request('POST', 'https://sandbox-payexapi.azurewebsites.net/api/Auth/Token', $params);

//        $online_statusCode = $response->getStatusCode();


            //$online_body = $response->getBody()->getContents();
			$responseData = json_decode($response->getBody()->getContents(), true);
			$referenceNumber = $responseData['result']['reference_number'];
//        $online_header = $response->getHeaders();

            \Log::info('response'.$referenceNumber);
            \Log::info($params);

      

        } 
		catch (ClientException $e) {
            // \Log::info('log1'.$e);
        }catch (\Exception $e){
            // \Log::info('log2'.$e);
//            dd($e->getMessage());
        }

		 try{
			$refno = $referenceNumber;
            $encodedRefno = urlencode($refno);
            // $url = "https://api.payex.io/api/v1/Delivery/Orders/".$encodedRefno;
			// $url = "https://sandbox-payexapi.azurewebsites.net/api/v1/Delivery/Orders/".$encodedRefno;
            $url = "https://api.payex.io/api/v1/Delivery/Orders/".$encodedRefno;
            $response = $client->request('PUT', $url, $params);

            //$online_body = $response->getBody()->getContents();
            //$response_json = json_decode($online_body);
			$responseData = json_decode($response->getBody()->getContents(), true);
			$order_number = $responseData['result']['consignments'][0]['order_number'];
			$consignment_number = $responseData['result']['consignments'][0]['consignment_number'];
			$awb_url = $responseData['result']['consignments'][0]['awb_url'];
			$price = $responseData['result']['consignments'][0]['price'];

			\Log::info($refno . ' - ' . $order_number . ' - '. $consignment_number . ' - ' . $awb_url . ' - ' . $price);

           if (isset($responseData['result']['consignments']) && isset($responseData['result']['consignments'][0]['order_number'])) {
				$order_number = $responseData['result']['consignments'][0]['order_number'];
				\Log::info($refno . ' ' . $order_number);
				$orderId = Order::where('transaction_id', $request->reference_number)->first();
				$orderConsignment = new OrderConsignment;
				$orderConsignment->order_id = $orderId->id;
				// $orderConsignment->status = 'Delivered';
				$orderConsignment->order_number = $order_number;
				$orderConsignment->consignment_number = $consignment_number;
				$orderConsignment->awb_url = $awb_url;
				$orderConsignment->price = $price;
				$orderConsignment->save();
				// Rest of the code
			} else {
				// \Log::info('Invalid response: ' . $responseData);
				return null;
			}
			  return $response;
        }
		catch (ClientException $e) {
            // \Log::info('log1'.$e);
        }catch (\Exception $e){
            // \Log::info('log2'.$e);
//            dd($e->getMessage());
        }

    }
	
	public function createOrderDeliveryPre($request,$cart){
        $sender = User::where('id',$cart->vendor_id)->first();
        \Log::info('sender' .$sender->name);


        $tokenPayex = PayexToken::first();
        \Log::info($tokenPayex->token);

        $result = Request::create(
            'api/token',
            'POST'
        );
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $time = \Carbon\Carbon::now()->format('H:i:s');

        $client = new Client;

        //dd($payment,$payexreturn,$courier);
        //foreach ($cart as $key => $carts) {
            $params = [
                'headers' => [
                    'accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' .$tokenPayex->token
                ],
                'body' => json_encode([
                    'sender_name' => $sender->name,
                    'sender_contact_no' => $sender->phone,
                    'sender_email' => $sender->email,
                    'sender_address' => 'kuala lumpur',
                    'sender_postcode' => '40150',
                    'sender_location_id' => '1',
                    'sender_location' => 'Kuala Lumpur',
                    'sender_city' => 'Kuala Lumpur',
                    'sender_state' => 'kul',
                    'sender_country' => 'MY',
                    'delivery_type' => 'p',
                    'pickup_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $date),
                    'pickup_time' => \Carbon\Carbon::createFromFormat('H:i:s', $time),
                    'transportation' => 'v',
                    'trolley' => false,
                    'remarks' => 'delivery',
                    'service_provider' => 'njv',
                    'consignments' => [
                        [
                            'txn_id' => $request->txn_id,
                            'service_id' => $request->serviceId,
                            'receiver_name' => $request->name,
                            'receiver_contact_no' => $request->phone,
                            'receiver_email' => $request->email,
                            'receiver_address' => $request->address,
                            'receiver_postcode' => $request->postalcode,
                            'receiver_location_id' => $request->id,
                            'receiver_location' => $request->address,
                            'receiver_city' => $request->city,
                            'receiver_state' => $request->state,
                            'receiver_country' => 'Malaysia',
                            'dropoff_id' => 'njv',
                            'dropoff_name' => 'NinjaVan Standard',
                            'dropoff_contact_no' => '04505940',
                            'dropoff_email' => 'njv@gmail.com',
                            'dropoff_address' => 'yan sela',
                            'dropoff_postcode' => '06900',
                            'dropoff_city' => 'yan',
                            'dropoff_state' => 'kdh',
                            'parcel_type' => 'p',
                            'content' => 'abc',
                            'pieces' => '1',
                            'value' => '10',
                            'weight' => '1',
                            'price' => '1',
                            'insurance' => false,
                        ]
                    ]
                ]),
            ];
//        }
        try{
        $response = $client->request('POST', 'https://api.payex.io/api/v1/Delivery/Orders', $params);
        // $response = $token->request('POST', 'https://sandbox-payexapi.azurewebsites.net/api/Auth/Token', $params);

//        $online_statusCode = $response->getStatusCode();
        $online_body = $response->getBody()->getContents();
//        $online_header = $response->getHeaders();

            \Log::info('response'.$online_body);

        return $response;



        } catch (ClientException $e) {
            // \Log::info('log1'.$e);
        }catch (\Exception $e){
            // \Log::info('log2'.$e);
//            dd($e->getMessage());
        }

    }

}
