<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRating;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\RefundImage;
use App\Models\ReturnRequest;
use App\Models\ShoppingCart;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PurchaseHistoryController extends Controller
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

    public function index()
    {
        $payment = Payment::where('user_id', Auth::user()->id)->where('status','Success')->get();

        $payment = collect($payment)->keyBy('transaction_id')->keys()->values()->all();
		
		//$pickup = Order::where('courier_id',7)->first(); //this one still have bugs, which is still cannot get the vendor_id; so to get pickup address based on courier_id & based on vendor_id
		//dd($pickup);
        //$vAddress = UserAddress::where('user_id', $pickup->vendor_address_id)->with('stateCode')->first();
		//dd($vAddress);
        $order = Order::whereIn('transaction_id',$payment)
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        $orderToPay = Order::whereIn('transaction_id',$payment)
            ->where('status', 'To Pay')
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        $orderToShip = Order::whereIn('transaction_id',$payment)
            ->where('status', 'To Ship')
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        $orderToReceive = Order::whereIn('transaction_id',$payment)
            ->where('status', 'To Received')
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        $orderToCompleted = Order::whereIn('transaction_id',$payment)
            ->where('status', 'Completed')
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        $orderToCancelled = Order::whereIn('transaction_id',$payment)
            ->where('status', 'Cancelled')
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->get()
            ->groupBy('vendor_id');

        return view('user.mypurchase.index')
            ->with('toPay',$orderToPay)
            ->with('toShip',$orderToShip)
            ->with('toReceive',$orderToReceive)
            ->with('completed',$orderToCompleted)
            ->with('cancel',$orderToCancelled)
            ->with('order',$order)
			//->with('pickup',$pickup)
            //->with('vAddress',$vAddress)
			;
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
    public function show()
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
        //
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
        //Change status 'To Receive' to 'Completed'
        $order = Order::find($id);
//        \Log::info($order);

        if(!isset($order)){
            return redirect()->back()->withInput()->withErrors('Order not found');
        }
        else{
            $order->status = $request->status;
            $order->status = 'Completed';
            $order->save();
        }

//        \Log::info($order);
        //return back
        return redirect()->back()->with('success','Order Successfully Completed! Tq To Purchase With Us');
        //add error danger in index
    }

    public function editRefund($id){
        try{
            $order = Order::find($id);
            $product = Product::where('id',$order->product_id)->first();
            $productImage = ProductImage::where('product_id',$product->id)->first();
            $userAddress = UserAddress::find($order->user_address_id);
            $shoppingCart = ShoppingCart::find($order->cart_id);
//            \Log::info($id);
//            \Log::info($product);
//            \Log::info($productImage);
//            \Log::info($userAddress);
//            \Log::info($shoppingCart);

            if(!isset($order)){
                return redirect()->back()->withInput()->withErrors('Order not found');
            }
            else{
                return view('user.mypurchase.refundUser')
                    ->with('orders',$order)
                    ->with('products',$product)
                    ->with('productImage',$productImage)
                    ->with('userAddress',$userAddress)
                    ->with('shoppingCart',$shoppingCart);
            }

        } catch (Exception $e){
            \Log::info($e->getMessage());
        }
    }

    public function refundUser(Request $request,$id){
        //Change status to receive to refund pending
        try{
            $order = Order::find($id);
//            $request->validate([
//                'image' => 'required|image',
//            ]);

//            \Log::info($order);
 //           \Log::info($request);
            if(!isset($order)){
                return redirect()->back()->withInput()->withErrors('Order not found');
            }
            else{
                //save data at return_request db
                $returnRequest = new ReturnRequest;
                $returnRequest->user_id = $order->user_id;
                $returnRequest->vendor_id = $order->vendor_id;
                $returnRequest->order_id = $order->id;
                $returnRequest->status_r = 'Refund Pending';
                $returnRequest->reason = $request->reason;
				$order->status = 'Refund Request Pending';
                $order->save();
                $returnRequest->save();

                //save data at refund_product_images db
                if($request->image != null){

                    $validator = Validator::make($request->all(), [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                    }
                    ///var/www/html/LifeCare/storage/app/public/refund
					if (!File::isDirectory(public_path('storage/refund'))) {
                        File::makeDirectory(public_path('storage/refund'), 0755, true);
                    }
					
                    $imageName = time() . '.' . $request->image->hashName();
                    $request->image->move(public_path('storage/refund'), $imageName);
                    $productimage = new RefundImage();
                    $productimage->image = $imageName;
                    $productimage->product_variation_value_id = '1';
                    $productimage->product_id = $order->product_id;
                    $productimage->return_request_id = $returnRequest->id;
                    $productimage->save();
                    
                }

                return redirect()->back()->with('success','Refund Successfully Completed! Tq To Purchase With Us');
            }

        }catch (Exception $e){
            \Log::info($e->getMessage());
        }
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

    public function getOrder(Request $request){

        $order = Order::where('transaction_id',$request->order_id)
            ->where('vendor_id', $request->vendor_id)
            ->where('user_id', Auth::user()->id)
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->with('ratings')
            ->get();

        return view('user.mypurchase.rating.index')->with('orderView', $order);
    }

    public function editRating(Request $request){

        $order = Order::where('id', $request->order_id)
            ->with('vendors')
            ->with('carts')
            ->with('products')
            ->with('productImages')
            ->with('ratings')
            ->first();

        return view('user.mypurchase.rating.edit')->with('editOrder',$order);
    }

    public function storeRating(Request $request){

        $validator =  Validator::make($request->all(), [
            'rating' => ['required'],
            'comments' => ['required'],
        ]);

        if($validator->errors()->first()){
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $order = Order::find($request->order_id);

        if(!isset($order)){
            return redirect()->back()->withInput()->withErrors('Failed');
        }

        try{
            DB::beginTransaction();

            $rating = OrderRating::where('order_id',$order->id)->first();

            if(!isset($rating)) {
                $rating = new OrderRating;
                $rating->order_id = $order->id;
            }
            $rating->product_id = $order->product_id;
            $rating->product_combination_id = $order->product_combination_id;
            $rating->user_id = Auth::user()->id;
            $rating->vendor_id = $order->vendor_id;
            $rating->rating = $request->rating;
            $rating->comments = $request->comments;
            $rating->save();


            DB::commit();

            return redirect()->back();

        }catch (\Exception $e){
            DB::rollback();

//            dd($e->getMessage());

            return redirect()->back()->withInput()->withErrors('Failed');
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


}
