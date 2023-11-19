<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){

        $search = $request->search;

        $category = MainCategory::get();


        $product = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })->paginate(9)->appends($request->query());

        if(isset($request->id)) {
            $product = Product::where('main_category_id', $request->id)->paginate(9)->appends($request->query());
        }

        return view('shop.index')
            ->with('product', $product)
            ->with('maincat', $category);
    }

    public function viewproductcategory(Request $request){

        // $category = MainCategory::get();
        // $product = Product::paginate(9)->appends($request->query());

        // if(isset($request->id)) {
        //     $product = Product::where('main_category_id', $request->id)->paginate(9)->appends($request->query());
        // }

        return view('shop.productcategory');
    }
	public function allproduct(Request $request){

        // $category = MainCategory::get();
        // $product = Product::paginate(9)->appends($request->query());

        // if(isset($request->id)) {
        //     $product = Product::where('main_category_id', $request->id)->paginate(9)->appends($request->query());
        // }

        return view('shop.allproduct');
    }

    public function show($id){
//        dd('a');

        $vendor = User::find($id);

        $product = Product::where('vendor_id', $id)->with('image')->paginate(9);

        $voucher = Voucher::where('vendor_id', $id)->with('productImage')->get();
        $mainCategory = MainCategory::where('sort_id',$id)->first();
        return view('user.shop.show')
            ->with('vendor',$vendor)
            ->with('voucher',$voucher)
            ->with('product', $product)
            ->with('mainCategory',$mainCategory);

    }

    public function viewvendor(Request $request){

        return view('shop.vendorview');
    }
    public function viewvendorcategory(Request $request){

        return view('shop.viewvendorcategory');
    }
}
