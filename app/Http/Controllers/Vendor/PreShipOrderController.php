<?php

namespace App\Http\Controllers\Vendor;

use App\Models\OrderConsignment;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Auth;

class ShipOrderController extends Controller
{
    public function index(){
        $payment = Payment::where('status','Success')->get();
        $order = Order::join('products','orders.product_id','products.id')
                    ->where('orders.vendor_id', Auth::user()->id)
//                    ->whereIn('status','To Ship','Completed')
                    ->whereIn('orders.status', ['To Ship','Completed','Pending'])
//                    ->groupBy('transaction_id')
                    ->get();
        $toship = Order::join('products','orders.product_id','products.id')
                    ->join('user_address','orders.user_address_id','user_address.user_id')
                    ->where('orders.vendor_id',Auth::user()->id)
                    ->where('status','To Ship')
                    ->get();
        //dd($toship);
        $completed = Order::join('products','orders.product_id','products.id')
                    ->where('orders.vendor_id',Auth::user()->id)
                    ->where('status','Completed')
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
        $useraddress = null;
            if(isset($order)) {
                $useraddress = UserAddress::where('user_id',$order->user_address_id)->first();
            }
            return view('vendor.shiporder.editShipOrder')
                ->with('orders',$order)
                ->with('useraddress',$useraddress);
    }

    public function ship(Request $request){
        //dd($request->trans_id);
        $order = Order::select('id')->where('transaction_id',$request->trans_id)->get();
        //$saveOrder = new Order;
        //$order->status='Completed';
        //$order->save();

        foreach($order as $orders) {
            $shiporder = new OrderConsignment();
            $shiporder->order_id = $orders->id;
            $shiporder->status = 'Delivered';
            $shiporder->order_number = null;
            $shiporder->consignment_number = $request->tracking;
            $shiporder->save();
            //dd($orders);
        }
        return redirect()->back();
    }




}
