<?php

namespace App\Http\Controllers\Vendor;
use App\Models\OrderConsignment;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\Product;
use App\Models\Payment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MyOrderExport;
use Auth;
use DB;
class MyOrderController extends Controller
{
    public function index(){
        $isVendor = null;

        if(Auth::user()->isVendor()){
            $isVendor = Auth::user()->id;
        }
        $payment = Payment::where('status','Success')->get();

        $order = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->withSum('','cart_total')
            ->get()
            ->groupBy('transaction_id'); //array[] di view

        $orderToship = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->where('status','To Ship')
            ->withSum('','cart_total')
            ->get()
            ->groupBy('transaction_id');

        $orderTocomplete = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->where('status','Completed')
            ->withSum('','cart_total')
            ->get()
            ->groupBy('transaction_id');

        $orderTocancel = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
			->select(DB::raw('sum(cart_total) as cart_total'),DB::raw('count(transaction_id) as quantity'),'updated_at','transaction_id','status')
            ->where('status','Cancelled')
            ->get()
            ->groupBy('transaction_id');

        return view('vendor.myorder.index')
            ->with('ship',$orderToship)
            ->with('completed',$orderTocomplete)
            ->with('cancel',$orderTocancel)
            ->with('order',$order);
    }
	
	public function viewMyOrder($id){
		$transactionId = Order::where('transaction_id',$id)
		->select('id','user_id','transaction_id as transaction_id','shipping_total',DB::raw('sum(cart_total) as cart_total'))
		->first();
		
		if(isset($transactionId)) {
			$order = Order::join('products','products.id','orders.product_id')
					->where('transaction_id',$id)->get();
			$orderQtt = Order::where('transaction_id',$transactionId->transaction_id)->count();
			//dd($orderQtt);
			$useraddress = UserAddress::where('user_id',$transactionId->user_id)->first();
			$consignment = OrderConsignment::where('order_id',$order[0]->id)->first();
			$useraddress1 = null;
            if(isset($order)) {
                $useraddress1 = UserAddress::where('id',$order[0]->user_address_id)->first();
            } if($order[0]->courier_id == 7){
                $vendoraddress = UserAddress::where('id',$order[0]->vendor_address_id)->first();
            }
		}
		return view('vendor.myorder.viewMyOrder')
		->with('transactionId',$transactionId)
		->with('orders',$order)
		->with('quantities',$orderQtt)
		->with('consignment',$consignment)
		->with('useraddress',$useraddress)
		->with('useraddress1',$useraddress1)
		->with('vendoraddress',$vendoraddress);
	}
	
	public function viewMyOrderPre($id){
		$order=Order::where('transaction_id',$id)->first();
		$product = null;
        $orderQtt = null;
        $useraddress = null;
        if(isset($order)) {
            $product = Product::where('id',$order->product_id)->first();
            $orderQtt = ShoppingCart::where('id',$order->id)->first();
            $useraddress = UserAddress::where('user_id',$order->user_id)->first();
        }
        return view('vendor.myorder.viewMyOrder')
                ->with('orders',$order)
                ->with('products',$product)
                ->with('quantities',$orderQtt)
                ->with('useraddress',$useraddress);
	}
		
	public function exportReport(){
        return Excel::download(new MyOrderExport, 'MyOrder.xlsx');
    }
	
	public function cancelOrder($id){
		// $orders = Order::where('transaction_id',$id)->get();
        // foreach($orders as $order){
            // $cancelOrder = Order::where('transaction_id',$id)->get();  
            // $cancelOrder->status = 'Cancel';
			// dd($cancelOrder);
            // $cancelOrder->save();  
            // return back()->with('success','Cancel Order by Vendor Successfully!');
        // }
        // return redirect()->back();
		
		$results = Order::query()
        ->where('transaction_id',$id)
        ->update(['status' => 'Cancel']);
		// dd($results);
		// foreach($results as $res){
			// $res->status = 'Cancel';
			// $res->save();
			return back()->with('success','Cancel Order by Vendor Successfully!');
		// }
		return redirect()->back();	
	}
	
	public function receipt_order($id){
		$transactionId = Order::where('transaction_id',$id)
		->select('id','user_id','transaction_id as transaction_id','shipping_total',DB::raw('sum(cart_total) as cart_total'))
		->first();
		
		if(isset($transactionId)) {
			$order = Order::join('products','products.id','orders.product_id')
					->where('transaction_id',$id)->get();
			$orderQtt = ShoppingCart::where('id',$transactionId->id)->first();
			$useraddress = UserAddress::where('user_id',$transactionId->user_id)->first();
			//$admin = User::where('role','Admin')->first();
		}
		  return view('vendor.myorder.receipt')
		->with('transactionId',$transactionId)
		->with('orders',$order)
		->with('quantities',$orderQtt)
		->with('useraddress',$useraddress)
		//->with('admin',$admin)
		;
     
               
		
	}
		
}
