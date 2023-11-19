<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ProductImage;
use App\Models\ReturnRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Auth;

class ReturnNRefundController extends Controller
{
    public function index(){
        $product = Product::where('vendor_id', Auth::user()->id)->get();
        $returnNrefund = Order::select('products.id','return_request.order_id as id','name','status_r','lifecare_approval','reason','cart_total')
            ->join('products','orders.product_id','products.id')
            ->join('return_request','orders.id','return_request.order_id')
            ->whereIn('orders.status',['Return','Refund'])
            ->get();
        $toRequest = Order::select('return_request.order_id as id','name','status_r','reason','cart_total')
            ->join('products','orders.product_id','products.id')
            ->join('return_request','orders.id','return_request.order_id')
            ->whereIn('orders.status',['Return','Refund'])
            ->whereIn('return_request.status_r',['Accept','Partial Refund','Dispute'])
            ->get(); //new request & to respond
        $toRespond = Order::select('return_request.order_id as id','products.name','orders.cart_total as total_payment','return_request.status_r','return_request.status_r as status_refund')
            ->join('products','orders.product_id','products.id')
            ->join('return_request','orders.id','return_request.order_id')
            ->whereIn('orders.status',['Return','Refund'])
            ->where('return_request.status_r','Refund Pending')
            ->get();
        $toResponded = Order::select('return_request.order_id as id','name','status_r','reason','orders.cart_total','amount_return')
            ->join('products','orders.product_id','products.id')
            ->join('return_request','orders.id','return_request.order_id')
            ->whereIn('orders.status',['Return','Refund'])
            ->whereIn('return_request.status_r',['Accept','Dispute','Partial Refund'])
            ->whereNotIn('return_request.lifecare_approval',['Approved','Dispute'])
            ->get();
        $complete = Order::select('return_request.order_id as id','name','status_r','reason','cart_total')
            ->join('products','orders.product_id','products.id')
            ->join('return_request','orders.id','return_request.order_id')
            ->whereIn('orders.status',['Return','Refund'])
            ->whereIn('return_request.lifecare_approval',['Approved','Dispute'])
            ->get();
        return view('vendor.return.index')
            ->with('products',$product)
            ->with('returnNrefund',$returnNrefund)
            ->with('toRequest',$toRequest)
            ->with('toRespond',$toRespond)
            ->with('toResponded',$toResponded)
            ->with('completed',$complete);
    }

    public function viewOrderDetail($id){
        $order=Order::where('id',$id)->first();
        $product = null;
        $orderQtt = null;
        $useraddress = null;
        $reason = null;
        if(isset($order)) {
            $product = Product::where('id',$order->product_id)->first();
            $orderQtt = ShoppingCart::where('id',$order->id)->first();
            $useraddress = UserAddress::where('user_id',$order->user_id)->first();
            $reason = ReturnRequest::where('order_id',$order->id)->first();
        }
        return view('vendor.return.viewOrderDetail')
                ->with('orders',$order)
                ->with('products',$product)
                ->with('quantities',$orderQtt)
                ->with('useraddress',$useraddress)
                ->with('reasons',$reason);
    }

    public function ApprovalByLifecare($id){
        $orders = Order::where('id',$id)->get();
        foreach($orders as $order){
            $lifecareApproval = ReturnRequest::where('order_id',$id)->first();  // save satu guna first - save byk guna get
            //$lifecareApproval->amount_return = $order->cart_total;
            $lifecareApproval->lifecare_approval = 'Approved';
            $lifecareApproval->status_r = 'Approved';
            $lifecareApproval->save();  //save mcm ni perlu object punya data - 1 data ja  // klu get in array kna foreach
            return back()->with('success','Approved by Admin Successfully!');
        }
        return redirect()->back();
    }

     public function DisapprovalByLifecare($id){
        $orders = Order::where('id',$id)->get();
         foreach($orders as $order){
             $lifecareApproval = ReturnRequest::where('order_id',$id)->first();  // save satu guna first - save byk guna get
             //$lifecareApproval->amount_return = $order->cart_total;
             $lifecareApproval->lifecare_approval = 'Dispute';
             $lifecareApproval->status_r = 'Disputed';
             $lifecareApproval->save();  //save mcm ni perlu object punya data - 1 data ja  // klu get in array kna foreach
             return back()->with('success','Dispute by Admin Successfully!');
         }
         return redirect()->back();
     }

    public function fullRefund($id)
    {
        $orders = Order::where('id',$id)->get();
        foreach($orders as $order){
            $fullRefund = ReturnRequest::where('order_id',$id)->first();  // save satu guna first - save byk guna get
            $fullRefund->amount_return = $order->cart_total;
            $fullRefund->status_r = 'Accept';
            $fullRefund->save();  //save mcm ni perlu object punya data - 1 data ja  // klu get in array kna foreach
            return back()->with('success','Accept Full Refund by Vendor Successfully!');
        }
        return redirect()->back();
    }

    public function DisputeRefund($id){
        $orders = Order::where('id',$id)->get();
        foreach($orders as $order){
            $disputeRefund = ReturnRequest::where('order_id',$id)->first();  // save satu guna first - save byk guna get
            $disputeRefund->amount_return = $order->cart_total;
            $disputeRefund->status_r = 'Dispute';
            $disputeRefund->save();  //save mcm ni perlu object punya data - 1 data ja  // klu get in array kna foreach
            return back()->with('success','Dispute Refund by Vendor Successfully!');
        }
        return redirect()->back();
    }

    public function savepartialrefund(Request $request, $id){
        $orders = Order::where('id',$id)->get();

        foreach($orders as $order){
            $partialRefund = ReturnRequest::where('order_id',$id)->first();
            $partialRefund->amount_return = $request->partial_refund;
            $partialRefund->status_r = 'Partial Refund';
            $partialRefund->save();
            return back()->with('success','Accept Partial Refund by Vendor Successfully!');
        }
        return redirect()->back();
    }

//    public function AcceptRefund($id){
//        $orders = Order::where('id',$id)->get();
//        foreach($orders as $order){
//            $fullRefund = ReturnRequest::where('order_id',$id)->first();  // save satu guna first - save byk guna get
//            $fullRefund->amount_return = $order->cart_total;
//            $fullRefund->status_r = 'Accept';
//            $fullRefund->save();  //save mcm ni perlu object punya data - 1 data ja  // klu get in array kna foreach
//        }
//        return redirect()->back();
//    }
}
