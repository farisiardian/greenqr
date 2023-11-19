<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ShopDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $category = MainCategory::get();

        $banner = Banner::get();

        $package = Product::where('main_category_id',1)->get();
        $supplement = Product::where('main_category_id',3)->orderBy('updated_at', 'desc')->limit(8)->get();

        $popularProduct = Product::select('products.id','main_category.name as category_name','products.name as product_name','supplier_cost_price as product_price','boostProduct')
                        ->join('main_category','products.main_category_id','main_category.id')
                        ->where('products.boostProduct','1')
                        ->orderBy('products.main_category_id','asc')
                        ->orderBy('products.name','asc')
                        ->whereNull('products.deleted_at')
                        ->get();
        //dd($popularProduct);
        $popularShop = User::get();

        $product = Product::select('products.id','main_category.name as category_name','products.name as product_name','supplier_cost_price as product_price')
                    ->join('main_category','products.main_category_id','main_category.id')
                    ->orderBy('products.main_category_id','asc')
                    ->orderBy('products.name','asc')
                    ->whereNull('products.deleted_at')
                    ->limit(8)
                    ->get();
        //return $product;
        //dd($product);

        if(Auth::user() && !Auth::user()->isUser()){
            $isVendor = null;

            if(Auth::user()->isVendor()){
                $isVendor = Auth::user()->id;
            }

            $payment = Payment::where('status','Success')->get();

            $order = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
                ->when($isVendor, function ($query) use($isVendor){
                    return $query->where('vendor_id',$isVendor);
                })
                ->withSum('carts', 'quantity')
                ->withCount('ratings')
                ->get();

//            dd($order->groupBy('product_id'));

            return view('admin.home')
                ->with('order',$order);

        }else {
            return view('home')
                ->with('category', $category)
                ->with('package', $package)
                ->with('supplement', $supplement)
                ->with('banner', $banner)
                ->with('products', $product)
                ->with('popularShops',$popularShop)
                ->with('popularProducts',$popularProduct);
        }
    }

  }
