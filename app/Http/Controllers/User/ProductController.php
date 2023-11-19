<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\OrderRating;
use App\Models\Voucher;
use App\Models\CourierList;
use App\Models\ProductVariation;
use App\Models\ProductVariationOptions;
use App\Models\ProductVariationOptionsValue;
use Illuminate\Http\Request;
use phpseclib3\File\ASN1\Maps\RelativeDistinguishedName;
use Auth;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function showProduct($id)
    {
        $product = Product::find($id);
        //dd($product);
        if(!isset($product)){
            return redirect()->back();
        }
		$ratings = OrderRating::where('product_id',$id)->get();
		$countRates = OrderRating::where('product_id',$id)->first();
        $related = Product::where('main_category_id',$product->main_category_id)->limit(4)->get();
		$otherProduct = Product::limit(8)->get();
		$voucher = Voucher::where('vendor_id',$product->vendor_id)->first();
		$address = null; // define a default value for $address
		$popularShop = User::where('role','vendor')->where('id',$product->vendor_id)->first();
		if (Auth::check()) {
			$address = User::where('id', Auth::user()->id)->first();
		}
		$courier = CourierList::get();
        // dd($product, $related);
		$size = ProductVariationOptions::join('products_variations_options_value', 'products_variations_options_value.products_variation_id', '=', 'products_variations_options.id')
            ->where('products_variations_options.product_id', $id)
            ->where('products_variations_options.variation_name', 'like', '%Size%')
            ->select('products_variations_options.*', 'products_variations_options_value.variation_name AS option_value')
            ->get();

		$color = ProductVariationOptions::join('products_variations_options_value','products_variations_options_value.products_variation_id','products_variations_options.id')
		->where('products_variations_options.product_id',$id)
		->where('products_variations_options.variation_name','like','%Color%')
		->select('products_variations_options.*', 'products_variations_options_value.variation_name AS option_value')
		->get();
		$productSizes = ProductVariation::where('product_id', $id)->pluck('size')->toArray();

		$colorvariation = ProductVariation::select('id','color','variationimage')->distinct()->where('product_id',$id)->get();
		$sizevariation = ProductVariation::select('id','variationimage','size', DB::raw('GROUP_CONCAT(DISTINCT size) as sizes'))->groupBy('size')->where('product_id',$id)->get();
		// dd($colorvariation,$sizevariation);
		$imageProduct = ProductVariation::select('variationimage')->distinct()->where('product_id',$id)->get();
		// dd($imageProduct);
        return view('user.product.show',compact('productSizes'))
            ->with('related',$related)
            ->with('countRates',$countRates)
            ->with('ratings',$ratings)
            ->with('product',$product)
			->with('otherProduct',$otherProduct)
			->with('voucher',$voucher)
			->with('address',$address)
			->with('courier',$courier)
			->with('size',$size)
			->with('color',$color)
			->with('imageProduct',$imageProduct)
			->with('popularShop',$popularShop)
			->with('colorvariation',$colorvariation)
			->with('sizevariation',$sizevariation)
			;	
    }
	
	public function viewrating($id){
		$product = Product::find($id);
		$ratings = OrderRating::where('product_id',$id)->get();
		return view('user.product.viewrate')
		->with('product',$product)
		->with('ratings',$ratings);
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
}
