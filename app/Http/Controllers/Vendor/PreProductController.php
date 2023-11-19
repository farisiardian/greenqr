<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\MainSubCategory;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductImage;
use App\Models\Volumetric;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('vendor_id', Auth::user()->id)->get();
        $categories = MainCategory::get();
        return view('vendor.myproduct.index')
            ->with('product',$product)
            ->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = MainCategory::get();
        $brands = Brand::get();
        $volumes = Volumetric::get();
        return view('vendor.myproduct.create', compact('categories'))
            ->with('categories',$categories)
            ->with('brands',$brands)
            ->with('volumes',$volumes);
    }

    public function getSubCategories(Request $request){
        $subcategories = MainSubCategory::where('main_category_id',$request->main_category_id)->get();
        if(count($subcategories) > 0){
            return response()->json($subcategories);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getCategories(){
        $categories = MainCategory::get();
        //return view('dropdown',compact('categories'));
        //return view('vendor.myproduct.getCategories', compact('categories'))
            //->with('categories',$categories);
        return $categories;
    }

    public function store(Request $request)
    {
        //$product = Product::get();
        //$productID=$product->keyBy('id')->keys()->values()->all();
        //$addproductimage = ProductImage::where('product_id', $productID)->get();
        //$addproductStock = ProductStock::where('product_id',$productID)->get();
        //dd($product,$productID,$addproductimage);

        $addproduct = new Product;
        $addproduct->vendor_id = Auth::user()->id;
        $addproduct->name = $request->prodName;
        $addproduct->description = $request->prodDescr;
        $addproduct->recommended = $request->recommend;
        $addproduct->sku_code = $request->sku;
        $addproduct->product_code = $request->prodCode;
        $addproduct->main_category_id = $request->category;
        $addproduct->main_sub_category_id = $request->subcategories;
        $addproduct->supplier_cost_price = $request->price;
        $addproduct->supermarket_selling_price = $request->supermarketPrice;
        $addproduct->list_price_on_store = $request->listPrice;
        $addproduct->brand_id = $request->brand;
        $addproduct->minimum_order_quantity = $request->minOrder;
        $addproduct->volumetric_id = $request->volumetric;
        $addproduct->allow_self_pickup = $request->pickup;
        $addproduct->save();

        $addproductStock = new ProductStock;
        $addproductStock->product_id = $addproduct->id;
        $addproductStock->total_stock = $request->stock;
        $addproductStock->supplier_cost_price = $request->price;
        $addproductStock->supermarket_selling_price = $request->supermarketPrice;
        $addproductStock->price_on_store = $request->listPrice;
        $addproductStock->weight = $request->weight;
        $addproductStock->save();

        if(isset($request->image)){
            $addproductimage = new ProductImage;
            $image = 'product/'.time() . '.' .  $request->image->getClientOriginalName();
            $request->image->storeAs('public/', $image);
            $addproductimage->image = $image;
            $addproductimage->product_variation_value_id = '1';
            $addproductimage->product_id = $addproduct->id;
            $addproductimage->save();
        }
        //dd($addproductimage);
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


    public function banned(){
        return view('vendor.myproduct.banned');
    }
}
