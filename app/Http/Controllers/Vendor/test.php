<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
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
        return view('vendor.myproduct.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.myproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addproductimage = Product::where('user_id',Auth::user()->id)->get();
        $addproduct = Product::where('user_id',Auth::user()->id)->get();
        $addproductStock = ProductStock::where('product_id',Auth::user()->id)->get();
        //addProductImage
        $image = 'product/'.time() . '.' .  $request->image->getClientOriginalName();
        $request->image->storeAs('public/', $image);
        $addproductimage->image = $image;
    }
    //addProduct
$addproduct->name = $request->prodName;
$addproduct->desription = $request->prodDescr;
$addproduct->recommended = $request->recommend;
$addproduct->sku_code = $request->sku;
$addproduct->product_code = $request->prodCode;
$addproduct->main_category_id = $request->category;
$addproduct->main_sub_category_id = $request->sub_category;
$addproduct->supplier_cost_price = $request->price;
$addproduct->supermarket_selling_price = $request->supermarketPrice;
$addproduct->list_price_on_store = $request->listPrice;
    //Brand
$addproduct->brand_id = $request->brand;
$addproduct->minimum_order_quantity = $request->minOrder;
$addproduct->volumetric_id = $request->volumetric;
    //addProductStock
$addproductStock->total_stock = $request->stock;
$addproductStock->weight = $request->weight;

$addproduct->save();
$addproductStock->save();
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



public function store(Request $request)
{
$product = Product::where('vendor_id',Auth::user()->id)->get();
$productID=$product->keyBy('id')->keys()->values()->all();

$addproductimage = ProductImage::where('product_id', $productID)->get();
$addproductStock = ProductStock::where('product_id',$productID)->get();
//dd($product,$productID,$addproductimage);

//addProductImage
$image = 'product/'.time() . '.' .  $request->image->getClientOriginalName();
$request->image->storeAs('public/', $image);
$addproductimage->image = $image;
//addProduct
$addproduct = new Product;
$addproduct->name = $request->prodName;
$addproduct->desription = $request->prodDescr;
$addproduct->recommended = $request->recommend;
$addproduct->sku_code = $request->sku;
$addproduct->product_code = $request->prodCode;
$addproduct->main_category_id = $request->category;
$addproduct->main_sub_category_id = $request->sub_category;
$addproduct->supplier_cost_price = $request->price;
$addproduct->supermarket_selling_price = $request->supermarketPrice;
$addproduct->list_price_on_store = $request->listPrice;
//addProduct - Brand ID
$addproduct->brand_id = $request->brand;
$addproduct->minimum_order_quantity = $request->minOrder;
$addproduct->volumetric_id = $request->volumetric;
//addProductStock
$addproductStock->total_stock = $request->stock;
$addproductStock->supplier_cost_price = $request->price;
$addproductStock->supermarket_selling_price = $request->supermarketPrice;
$addproductStock->price_on_store = $request->listPrice;
$addproductStock->weight = $request->weight;

$addproductimage->save();
$addproduct->save();
$addproductStock->save();
}
