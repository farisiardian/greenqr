<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\MainSubCategory;
use App\Models\Product;
use App\Models\Tagging;
use App\Models\Warehouse;
use App\Models\ProductStock;
use App\Models\ProductCombination;
use App\Models\ProductVariation;
use App\Models\ProductVariationOptions;
use App\Models\ProductVariationOptionsValue;
use App\Models\ProductImage;
use App\Models\Volumetric;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

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
        //dd($categories);
		$warehouse = Warehouse::where('vendor_id',Auth::user()->id)->get();
        $brands = Brand::get();
        $volumes = Volumetric::get();
        return view('vendor.myproduct.create', compact('categories'))
            ->with('categories',$categories)
			->with('warehouse',$warehouse)
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

    public function storeSubCategory(Request $request)
    {
        //$addSub = MainCategory::get();
            $addSubCate = new MainSubCategory();
            $addSubCate->main_category_id = $request->mainCategory;
            $addSubCate->name = $request->subCategory;
            $addSubCate->save();
            return back()->with('success','Sub Category Successfully Add!');

        return redirect()->back();
    }


    public function store(Request $request)
    {
		
		 if (!empty($request->inputs) && !empty($request->inputs[0]['name']) && !empty($request->inputs[0]['colors']) && !empty($request->inputs[0]['sizes'])) {
			 // dd($request);
			// dd('variation');
			$addproduct = new Product;
			$addproduct->vendor_id = Auth::user()->id;
			$addproduct->warehouse_id = $request->warehouse_id;
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
			
			$addtagging = new Tagging;
			$addtagging->product_id = $addproduct->id;
			$addtagging->tag_name = $request->tagging;
			$addtagging->save();
			
			$request->validate([
				'inputs.*.name' => 'required',
				'inputs.*.colors' => 'required',
				'inputs.*.sizes' => 'required',
			], [
				'inputs.*.name.required' => 'Name is required',
				'inputs.*.colors.required' => 'Colors are required',
				'inputs.*.sizes.required' => 'Sizes are required',
			]);

		foreach ($request->inputs as $key => $value) {
			$addvariation = new ProductVariation;
			$addvariation->product_id = $addproduct->id;
			$addvariation->name = $value['name'];
			$addvariation->color = $value['colors'];
			$addvariation->size = $value['sizes'];
			$image = 'product/' . time() . '.' . $value['variationimage']->getClientOriginalName();
			$value['variationimage']->storeAs('public/', $image);
			$addvariation->variationimage = $image;
			$addvariation->save();
			
			$addproductStock = new ProductStock;
			$addproductStock->product_id = $addproduct->id;
			$addproductStock->products_combination_id = isset($addvariation) ? $addvariation->id : null;
			$addproductStock->total_stock = $request->stock;
			$addproductStock->supplier_cost_price = $request->price;
			$addproductStock->supermarket_selling_price = $request->supermarketPrice;
			$addproductStock->price_on_store = $request->listPrice;
			$addproductStock->weight = $request->weight;
			$addproductStock->save();
		}
			
		if(isset($request->variationimage)){
			foreach ($request->variationimage as $imageFile) {
				$addvariationimage = new ProductImage;
				$image = 'product/' . time() . '.' . $imageFile->getClientOriginalName();
				$imageFile->storeAs('public/', $image);
				$addvariationimage->image = $image;
				$addvariationimage->product_variation_value_id = $addvariation->id;
				$addvariationimage->product_id = $addvariation->product_id;
				$addvariationimage->save();
			}
		}
		
		foreach ($request->inputs as $key => $value) {
			
			$name = strtolower($value['name']); // Convert to lowercase
			$colors = str_replace(' ', '', strtolower($value['colors'])); // Remove spaces and convert to lowercase
			$sizes = str_replace(' ', '', strtolower($value['sizes'])); // Remove spaces and convert to lowercase

			$uniqueString = $colors . $sizes;
			$uniqueString = str_shuffle($uniqueString); // Randomly shuffle the characters
			//$addproductcombination->unique_string_id = $uniqueString;
			$productVariation = ProductVariation::where('product_id', $addproduct->id)->first();
			$addproductcombination = new ProductCombination;
			$addproductcombination->variation_id = $productVariation->id;
			$addproductcombination->product_id = $productVariation->product_id;
			$combinationsString = $name . $colors . $sizes;
			$addproductcombination->combinations_string = $combinationsString;
			$addproductcombination->unique_string_id = $uniqueString;
			$addproductcombination->sku_id = $request->sku;
			$addproductcombination->sku_code = $request->sku;
			$addproductcombination->price_on_store = $request->listPrice;
			$addproductcombination->available_stock = $request->stock;
			$addproductcombination->save();
		}

		// if(isset($request->variationimage)){
            // $addvariationimage = new ProductImage;
            // $image = 'product/'.time() . '.' .  $request->variationimage->getClientOriginalName();
            // $request->variationimage->storeAs('public/', $image);
            // $addvariationimage->image = $image;
            // $addvariationimage->product_variation_value_id = $addvariation->id;
            // $addvariationimage->product_id = $addvariation->product_id;
            // $addvariationimage->save();
        // }
			// dd($request);
			
		}
		else{
			// dd('novariation');
			$addproduct = new Product;
			$addproduct->vendor_id = Auth::user()->id;
			$addproduct->warehouse_id = $request->warehouse_id;
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
			
			$addtagging = new Tagging;
			$addtagging->product_id = $addproduct->id;
			$addtagging->tag_name = $request->tagging;
			$addtagging->save();
			
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
		}
		return back()->with('success','Product Successfully Add!');
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
        //return collection of value to display in form
        //\Log::info($id);
        $product = Product::where('id',$id)->first();
        $categories = MainCategory::get();
        $subcategories = MainSubCategory::get();
        $warehouse = Warehouse::where('vendor_id',Auth::user()->id)->get();
        $brands = Brand::get();
        $volumes = Volumetric::get();
        $productStock = ProductStock::where('product_id',Auth::user()->id)->first();
        $productImage = ProductImage::where('product_id',$id)->first();
		$productCombination = ProductCombination::where('product_id',$id)->get();
        $productVariation = ProductVariation::where('product_id',$id)->get();
        // $productVariation = ProductVariation::where('product_id',$id)->where('id',$productCombination[0]->variation_id)->get();
		\Log::info($productImage);
		//dd($productVariation);
        return view('vendor.myproduct.editProduct',compact('product'))
            ->with('product',$product)
            ->with('categories',$categories)
            ->with('subcategories',$subcategories)
            ->with('warehouse',$warehouse)
            ->with('brands',$brands)
            ->with('volumes',$volumes)
            ->with('productStock',$productStock)
            ->with('productImage',$productImage)
            ->with('productVariation',$productVariation)
            ->with('productCombination',$productCombination);
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
        //update product given id
        $product = Product::find($id);
        //\Log::info($product);

        //if value is null
        if(!isset($product)){
            return redirect()->back()->withInput()->withErrors('Product not found');
        }
        else{
            $product->tagging = $request->tagging;
            $product->name = $request->prodName;
            $product->description = $request->prodDescr;
            $product->recommended = $request->recommend;
            $product->sku_code = $request->sku;
            $product->product_code = $request->prodCode;
            $product->main_category_id = $request->category;
            $product->main_sub_category_id = $request->subcategories;
            $product->supplier_cost_price = $request->price;
            $product->supermarket_selling_price = $request->supermarketPrice;
            $product->list_price_on_store = $request->listPrice;
            $product->warehouse_id = $request->warehouse_id;
            $product->brand_id = $request->brand;
            $product->minimum_order_quantity = $request->minOrder;
            $product->allow_self_pickup = $request->pickup;
            $product->volumetric_id = $request->volumetric;
            $product->save();

            $productStock = new ProductStock;
            $productStock->product_id = $product->id;
            $productStock->total_stock = $request->stock;
            $productStock->supplier_cost_price = $request->price;
            $productStock->supermarket_selling_price = $request->supermarketPrice;
            $productStock->price_on_store = $request->listPrice;
            $productStock->weight = $request->weight;
            $productStock->save();
			
			
			
            //check if there is an image request
            if(isset($request->image)){
                $productimage = ProductImage::where('product_id',$id)->first();
                 if($productimage){
					$image = 'product/'.time() . '.' .  $request->image->getClientOriginalName();
					$request->image->storeAs('public/', $image);
					$productimage->image = $image;
					$productimage->product_variation_value_id = '1';
					$productimage->save();
				}
            }
			
			// $productCombination = ProductCombination::select('variation_id')->where('product_id',$id)->get();
			// dd($productCombination);
			// $variation = ProductVariation::where('product_id',$id)->where('id',$productCombination[0]->variation_id)->get();
			// foreach($variation as $editvariation){
				// $editvariation->name = $request->variationname;
				// $editvariation->color = $request->variationcolor;
				// $editvariation->size = $request->variationsize;
				// $editvariation->save();
				// dd($editvariation);
			// }
			
			$productCombination = ProductCombination::select('variation_id')->where('product_id', $id)->get();

			foreach ($productCombination as $product) {
				$variationId = $product->variation_id;
				$variation = ProductVariation::find($variationId);

				if ($variation) {
					$variation->name = $request->input('variationname.' . $variationId);
					$variation->color = $request->input('variationcolor.' . $variationId);
					$variation->size = $request->input('variationsize.' . $variationId);
					$variation->save();
				}
			}

			return back()->with('success','Product Successfully Updated!');
            // return redirect()->back()->withInput()->withErrors('Product Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find product based on id & delete
        $product = Product::find($id);

        //check if id exist in db n return error if fails
        if(!isset($product)){
            return redirect()->back()->withInput()->withErrors('Product not found');
        }
        else{
            //soft delete by using "Use SoftDeletes" in modal
            $product->delete();

            //return back
            return redirect()->back()->with('success','Product Successfully Deleted!');
        }
    }

    public function banned(){
        return view('vendor.myproduct.banned');
    }
}
