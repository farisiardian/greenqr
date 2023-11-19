<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class SalesController extends Controller
{
    public function index(){
        $view = Order::join('users as users_a','users_a.id','orders.vendor_id')
                    ->join('users as users_b','users_b.id','orders.user_id')
                    ->join('products','orders.product_id','products.id')
                    ->join('shopping_carts','orders.user_id','shopping_carts.user_id')
                    ->select('users_a.name as merchantName',
                            'users_b.name as userName','users_b.email as userEmail','users_b.phone as userPhone',
                            'orders.updated_at as updated_at','orders.transaction_id as orderID','orders.shipping_total as feeShip','orders.status as status',
                            'products.name as productName','products.list_price_on_store as unitPrice','shopping_carts.user_id','shopping_carts.quantity as quantity',
                    )
                    ->where('users_a.role','vendor')->where('orders.status','Completed')->get();
        //dd($view);
        return view('admin.sales.index')->with('views',$view);
    }
}
