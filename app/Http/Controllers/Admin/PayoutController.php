<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payout;
use DB;
use Illuminate\Http\Request;
use Auth;
class PayoutController extends Controller
{
    public function index(){  //kay payout ni kena tambah where login by sapa
//        $view = Order::where('status','Completed')->groupBy('transaction_id')->get();
        $view = Order::join('users','users.id','orders.vendor_id')
                ->where('orders.status','Completed')
                ->select('orders.updated_at as created_at','users.name as userName','users.email as userEmail','users.phone as userPhone',DB::raw('sum(cart_total) as totalCart'),'product_id','cart_id','transaction_id','vendor_id')
               ->groupBy('transaction_id')->get();
        //dd($view);
        return view('admin.payout.index')->with('views',$view);
    }

    public function acceptPayout($id){
        $order = Order::select('user_id',DB::raw('sum(cart_total) as totalCart'))->where('transaction_id',$id)->first();
        //dd($order);
        $acceptPayout = new Payout;
        $acceptPayout->user_id = $order->user_id;
        $acceptPayout->vendor_id = Auth::user()->id;
        $acceptPayout->transaction_id = $id;
        $acceptPayout->total_payment = $order->totalCart;
        $acceptPayout->status = 'Accept';
        $acceptPayout->save();
        return back()->with('success','Accept Successfully!');
        return redirect()-back();
    }

    public function rejectPayout($id){
        $order = Order::select('id',DB::raw('sum(cart_total) as totalCart'))->where('transaction_id',$id)->first();
        //dd($order);
        $acceptPayout = new Payout;
        $acceptPayout->user_id = $order->user_id;
        $acceptPayout->vendor_id = Auth::user()->id;
        $acceptPayout->transaction_id = $id;
        $acceptPayout->total_payment = $order->totalCart;
        $acceptPayout->status = 'Reject';
        $acceptPayout->save();
        return back()->with('success','Reject Successfully!');
        return redirect()-back();
    }

}
