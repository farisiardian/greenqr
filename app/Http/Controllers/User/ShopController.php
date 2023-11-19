<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\MainSubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use App\Models\ShopDetail;
use Illuminate\Http\Request;
use DB;
class ShopController extends Controller
{
	public function index(Request $request,$id = null){
	
    $query = Product::query();
    // Get the search query
    $searchQuery = $request->input('search', '');
    // Get the current subcategory or set it to null
    $subcategory = $request->input('subcategory', null);
    // Get all main categories
    $categories = MainCategory::all();
    $mainCategories = MainCategory::where('id',$id)->first();
    $categories1 = MainSubCategory::where('main_category_id',$id)->get();
	
	if ($searchQuery) {
		$query->where(function ($query) use ($searchQuery) {
			$query->where('products.name', 'like', '%' . $searchQuery . '%')
				// ->orWhere('products.description', 'like', '%' . $searchQuery . '%')
				->orWhere('main_category.name', 'like', '%' . $searchQuery . '%')
				->orWhere('tagging.tag_name', '=', $searchQuery);
		});
	}
	$query->where(function ($query) use ($searchQuery) {
		$query->where('tagging.tag_name', $searchQuery)
			  ->orWhereNull('tagging.tag_name');
	});
    $query->join('main_category', 'main_category.id', '=', 'products.main_category_id')
           ->leftJoin('tagging','tagging.product_id','=','products.id')
          ->select('products.*', 'main_category.name as categoryName', 'tagging.tag_name');
	 // $query->orWhere('tagging.tag_name', $searchQuery);

    // If a subcategory is selected, filter by it
    if ($subcategory) {
        $query->where('main_sub_category_id', $subcategory);
    }
    // If a main category is selected, filter by it
	if ($id !== null) {
		$query->where('main_category_id', $id);
	}
    // Paginate the results and append the query parameters to the pagination links
    $products = $query->paginate(9)->appends($request->query());
	//$mainId = Product::where('main_category_id',$mainCategories->id)->first();
	$mainId = null;
	if ($mainCategories) {
	  $mainId = Product::where('main_category_id', $mainCategories->id)->first();
	}
	//dd($productId);
    return view('shop.index', [
        'mainId' => $mainId,
        'product' => $products,
        'maincat' => $categories,
        'maincat1' => $categories1,
        'maincat2' => $mainCategories,
        'searchQuery' => $searchQuery,
        'selectedCategory' => $id,
        'selectedSubcategory' => $subcategory,
    ]);
}

	public function mobileCategory(){
		$category = MainCategory::limit(6)->get();
        $categorySecond = MainCategory::skip(6)->limit(6)->get();
		return view('shop.productcategory')
		->with('category',$category)
		->with('categorySecond',$categorySecond);
	}


	public function Preindex(Request $request){

    $search = $request->search;
    // Get the current subcategory or set it to null
    $subcategory = $request->input('subcategory', null);
    $category = MainCategory::get();

    $query = Product::join('main_category','main_category.id','products.main_category_id')
        ->when($search, function ($query, $search) {
            return $query
                ->orWhere('products.name', 'like', '%'.$search.'%')
                ->orWhere('main_category.name', 'like', '%'.$search.'%');
        })
        ->select('products.*','main_category.name as categoryName');

    if ($subcategory) {
        // Filter by selected subcategory
        $query->where('main_sub_category_id', $subcategory);
    } else if(isset($request->id)) {
        // If subcategory is not selected, filter by main category
        $query->where('main_category_id', $request->id);
    }

    $product = $query->paginate(9)->appends($request->query());

    return view('shop.index')
        ->with('product', $product)
        ->with('maincat', $category);
}


    public function indexPre(Request $request){

        $search = $request->search;
		// Get the current subcategory or set it to null
		$subcategory = $request->input('subcategory', null);
        $category = MainCategory::get();


       $product = Product::join('main_category','main_category.id','products.main_category_id')
        ->when($search, function ($query, $search) {
            return $query
                ->orWhere('products.name', 'like', '%'.$search.'%')
                ->orWhere('main_category.name', 'like', '%'.$search.'%');
        })
		->select('products.*','main_category.name as categoryName')
		->paginate(9)->appends($request->query());
		
		 if ($subcategory) {
        $product->where('main_sub_category_id', $subcategory);
    }

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

    public function showPrevious(Request $request,$id){

		//Tab 1
        $vendor = User::find($id);
		$voucher = Voucher::where('vendor_id', $id)->with('productImage')->get();
		$newproduct = Product::where('vendor_id',$id)->latest()->paginate(12);
		
		//Tab 2
        $product = Product::where('vendor_id', $id)->with('image')->paginate(12);
        $mainCategory = MainCategory::where('sort_id',$id)->first();
		$category = MainCategory::join('products','products.main_category_id','main_category.id')->where('products.vendor_id',$id)->get();
		
        return view('user.shop.show')
            ->with('vendor',$vendor)
            ->with('voucher',$voucher)
            ->with('newproduct',$newproduct)
            ->with('product', $product)
            ->with('mainCategory',$mainCategory)
			->with('maincat', $category);

    }
	
	public function showVersion1(Request $request,$id){
		 if (!$id) {
        return redirect()->route('shop')->with('error', 'Invalid shop ID.');
    }
		// Get the current tab or set it to 'tab1' as default
        $tab = $request->input('tab', 'tab1');

		//Tab 1
        $vendor = User::find($id);
		$voucher = Voucher::where('vendor_id', $id)->with('productImage')->get();
		$newproduct = Product::where('vendor_id',$id)->latest()->paginate(12);
		
		//Tab 2
        $product = Product::where('vendor_id', $id)->with('image')->paginate(12);
        $mainCategory = MainCategory::where('sort_id',$id)->first();
		$category = Product::where('vendor_id',$id)->limit(1)->get();
		$subcategory = Product::where('vendor_id',$id)->get();
		
		//Tab 3
		 $address = User::find($id);
		
		//dd($category);
        return view('user.shop.show')
            ->with('vendor',$vendor)
            ->with('voucher',$voucher)
            ->with('newproduct',$newproduct)
            ->with('product', $product)
            ->with('address', $address)
            ->with('mainCategory',$mainCategory)
			->with('maincat', $category)
			->with('subcategory', $subcategory)
			->with('tab', $tab)
			->with('id', $id);

    }
	
	public function show(Request $request,$id) {
    if (!$id) {
        return redirect()->route('shop')->with('error', 'Invalid shop ID.');
    }

    // Get the current tab or set it to 'tab1' as default
    $tab = $request->input('tab', 'tab1');

    // Get the current subcategory or set it to null
    $subcategory = $request->input('subcategory', null);

    //Tab 1
    $vendor = User::find($id);
    $voucher = Voucher::where('vendor_id', $id)->with('productImage')->get();
    $newproduct = Product::where('vendor_id',$id)->latest()->paginate(12);
	$operatingHours = ShopDetail::where('user_id',$id)->first();

    //Tab 2
    $productQuery = Product::where('products.vendor_id', $id)->with('image');
	$selectedSubCategoryId = null;
    if ($subcategory) {
        $productQuery->where('main_sub_category_id', $subcategory);
		 $selectedSubCategoryId = $subcategory;
    }
	// Get the selected sort option, default to 'latest'
	$sort_by = $request->input('sort_by', 'latest');

	switch($sort_by) {
    case 'latest':
        $productQuery->latest('products.created_at');
        break;
    case 'rating':
        $productQuery->join('order_ratings', 'products.id', '=', 'order_ratings.product_id')
                     ->selectRaw('AVG(order_ratings.rating) as avg_rating')
                     ->orderBy('avg_rating', 'desc')
                     ->groupBy('products.id');
        break;
		default:
        $productQuery->latest('products.created_at');
	}

    $product = $productQuery->paginate(12);
    $productforyou = Product::where('products.vendor_id', $id)->orderBy('name', 'asc')->paginate(12);


	
	$newMainCategories = DB::table('products as p')
	->join('main_category as m','m.sort_id','=','p.main_category_id')
	->join('main_sub_category as s','s.main_category_id','=','p.main_category_id')
	->select('m.name as main_name','s.name as subname','p.id as product_id','p.vendor_id as id','p.main_sub_category_id as sub_id')
	->where('p.vendor_id',$id)
	// ->where('p.main_category_id','=','m.sort_id')
	->orderBy('main_name')
	->groupBy('s.id')
	->get()
	->groupBy('main_name')
	;
	//dd($newMainCategories);
	
    $mainCategories = MainCategory::whereHas('products', function($query) use ($id) {
        $query->where('vendor_id', $id);
    })->orderBy('sort_id')->get();

    $subCategories = MainSubCategory::whereHas('products', function($query) use ($id) {
        $query->where('vendor_id', $id);
    })->orderBy('name')->get();

	 //Tab 3
	 $address = User::find($id);
		 
	 //mobile view
	 $productMobile = User::where('id',$id)->first();
	 //dd($productMobile);
    return view('user.shop.show')
        ->with('vendor', $vendor)
        ->with('voucher', $voucher)
        ->with('newproduct', $newproduct)
        ->with('operatingHours', $operatingHours)
        ->with('product', $product)
        ->with('productforyou', $productforyou)
        ->with('address', $address)
        ->with('newMainCategories', $newMainCategories)
        ->with('mainCategories', $mainCategories)
        ->with('subCategories', $subCategories)
        ->with('selectedSubCategoryId', $selectedSubCategoryId)
        ->with('tab', $tab)
        ->with('id', $id)
        ->with('sort', $sort_by)
		->with('productMobile',$productMobile);
}
	
	public function viewsubcategory($id){
		$subcategories = Product::where('main_sub_category_id',$id)->get();
		//dd($id);
		return view('user.shop.show')->with('subcategories',$subcategories);
	}
	
    public function allproduct(Request $request)
    {
        $products = Product::paginate(12);
        if($request->ajax()){
            $product_view = view('layouts.single-product',compact('products'))->render();
            return response()->json(['product_view'=>$product_view]);
        }
        return view('shop.allproduct',compact('products'))
            ->with('products',$products);
    }
	
	public function allproduct_tab(Request $request){
		$tab_products = Product::paginate(12);
		if($request->ajax()){
			$tab_product_view = view('layouts.tab-single-product',compact('tab_products'))->render();
			return response()->json(['tab_product_view'=>$tab_product_view]);
		}
		return view('shop.allproduct_tab',compact('tab_products'))
		->with('tab_products',$tab_products);
	}
	
	public function allproduct_mobile(Request $request)
    {
        $mobile_products = Product::paginate(12);
        if($request->ajax()){
            $mobile_product_view = view('layouts.mobile-single-product',compact('mobile_products'))->render();
            return response()->json(['mobile_product_view'=>$mobile_product_view]);
        }
        return view('shop.allproduct_mobile',compact('mobile_products'))
            ->with('mobile_products',$mobile_products);
    }
	
    public function viewvendor(Request $request){

        return view('shop.vendorview');
    }
	
    public function viewvendorcategory(Request $request,$id){
	if (!$id) {
        return redirect()->route('shop')->with('error', 'Invalid shop ID.');
    }
	$productQuery = Product::where('products.vendor_id', $id)->with('image');
	$subcategory = $request->input('subcategory', null);
    if ($subcategory) {
        $productQuery->where('main_sub_category_id', $subcategory);
    }
	// Get the selected sort option, default to 'latest'
	$sort_by = $request->input('sort_by', 'latest');

	switch($sort_by) {
    case 'latest':
        $productQuery->latest('products.created_at');
        break;
    case 'rating':
        $productQuery->join('order_ratings', 'products.id', '=', 'order_ratings.product_id')
                     ->selectRaw('AVG(order_ratings.rating) as avg_rating')
                     ->orderBy('avg_rating', 'desc')
                     ->groupBy('products.id');
        break;
    default:
         $productQuery->latest('products.created_at');
}

    $product = $productQuery->get();

    $mainCategories = MainCategory::whereHas('products', function($query) use ($id) {
        $query->where('vendor_id', $id);
    })->orderBy('sort_id')->get();

    $subCategories = MainSubCategory::whereHas('products', function($query) use ($id) {
        $query->where('vendor_id', $id);
    })->orderBy('name')->get();

        return view('shop.viewvendorcategory')
		->with('productQuery',$productQuery)
        ->with('product', $product)
        ->with('mainCategories', $mainCategories)
        ->with('subCategories', $subCategories)
        ->with('id', $id);
    }
}
