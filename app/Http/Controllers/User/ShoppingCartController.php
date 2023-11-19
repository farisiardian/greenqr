<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\State;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Auth;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = ShoppingCart::where('user_id', Auth::user()->id)->where('sold',0)
			->whereNull('deleted_at')
            ->with('product')
            ->with('productImage')
            ->with('variation')
            ->get();
		$address = UserAddress::where('user_id' , Auth::user()->id)->first();
        $state = State::first();

        return view('user.cart.index')
			->with('cart',$cart)
            ->with('addresslists',$address)
            ->with('state',$state);
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
		// dd($request);
        $product = Product::find($request->id);

        if (!isset($product)) {
            return redirect()->back();
        }

        $combination_id = $request->combination_id;

        $cart = ShoppingCart::where('user_id', Auth::user()->id)
            ->whereNull('deleted_at')
            ->where('vendor_id', $product->vendor_id)
            ->where('product_id', $product->id)
            ->where('sold', 0)
            ->when($combination_id, function ($query, $combination_id) {
                return $query->where('product_combinations_id', $combination_id);
            })
            ->first();

        $quantity = 1;

        if (isset($cart)) {
            $quantity = $cart->quantity + ($request->quantity ?? 1);
        } elseif ($request->quantity) {
            $quantity = $request->quantity;
        }

        if (!isset($cart)) {
            $cart = new ShoppingCart;
            $cart->user_id = Auth::user()->id;
            $cart->vendor_id = $product->vendor_id;
            $cart->product_id = $product->id;
            if ($request->combination_id) {
                $cart->product_combinations_id = $request->combination_id;
            }
        }

        $cart->quantity = $quantity;

        $cart->save();
        //dd($cart);

        if ($request->option == 'buynow') {
            return redirect('/cart');
        } else {
            return redirect()->back();
        }
    }
	
    public function storePre(Request $request)
    {

        $product = Product::find($request->id);

        if(!isset($product)){
            return redirect()->back();

        }

        $quantity = 1;
        $combination_id = $request->combination_id;

        $cart = ShoppingCart::where('user_id',Auth::user()->id)
            ->where('vendor_id', $product->vendor_id)
            ->where('product_id', $product->id)
            ->where('sold', 0)
            ->when($combination_id,function ($query, $combination_id){
                return  $query->where('product_combinations_id',$combination_id);
            })
            ->first();

        if(isset($cart) && !isset($request->quantity)){

            $quantity = $cart->quantity + 1;

        }elseif ($request->quantity){
            $quantity = $request->quantity;
        }

        if(!isset($cart)){
            $cart = new ShoppingCart;
            $cart->user_id = Auth::user()->id;
            $cart->vendor_id = $product->vendor_id;
            $cart->product_id = $product->id;
            if($request->combination_id){
                $cart->product_combinations_id = $request->combination_id;

            }
        }

        $cart->quantity = $quantity;
        $cart->save();

        if($request->option == 'buynow'){

            return redirect('/cart');

        }else {
            return redirect()->back();
        }


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
        $cart = ShoppingCart::find($id);
        $stock = ShoppingCart::select('products_stock.total_stock')->join('products_stock','products_stock.product_id','shopping_carts.product_id')
            ->where('shopping_carts.id',$id)->first();

        if(!isset($cart)){
            return redirect()->back();
        }

        $cart->quantity = $request->quantity;
        $quantity = $cart->quantity;
        //\Log::info($quantity);
        //\Log::info($stock->total_stock);
        if($quantity >= $stock->total_stock){
            return back()->with('error','Out Of Stock');
        }
        
        $cart->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = ShoppingCart::find($id);

        if(!isset($cart)){
            return redirect()->back();
        }

        $cart->delete();

        return redirect()->back();
    }
}
