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
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;

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
    public function index(Request $request,$categoryId = null)
    {

        $desktopcategory = MainCategory::limit(12)->get();
        $category = MainCategory::limit(8)->get();
        $categorySecond = MainCategory::skip(8)->limit(4)->get();

        $banner = Banner::get();

        $package = Product::where('main_category_id', 1)->get();
        $supplement = Product::where('main_category_id', 3)->orderBy('updated_at', 'desc')->limit(8)->get();

        $currDate = Carbon::now();
        $popularProductPre = Product::where('products.start_at' ,'<=', $currDate)
            ->where('products.end_at', '>=',$currDate)
            ->orderBy('name', 'asc')
            ->paginate(12);
			
		$popularProduct = Product::join('orders', 'products.id', '=', 'orders.product_id')
                    ->select('products.*', DB::raw('SUM(orders.product_id) as total_sales'))
					//->whereBetween('orders.created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])
                    ->groupBy('products.id')
                    ->orderByDesc('total_sales')
                    ->limit(12)
                    ->get();
	
        // $popularShop = User::where('role','vendor')->limit(12)->get();
		// $categoryshop = MainCategory::get();
		
		$popularShop = User::where('role', 'vendor')->limit(12);
		$categoryId = $request->input('categoryId', $categoryId);
		$listProductsBasedoncategory = Product::query()->limit(8);

		// Filter shops based on selected category
		if ($categoryId) {
			// $listProductsBasedoncategory->whereRaw('id IN (SELECT id FROM products WHERE main_category_id = ?)', [$categoryId]);
			 $listProductsBasedoncategory->where('main_category_id', $categoryId);
		}

		$listProductsBasedoncategory = $listProductsBasedoncategory->get();
		// dd($listProductsBasedoncategory);

		$categoryshop = MainCategory::get();

		$popularShop = $popularShop->get();
	
        $products = Product::paginate(8);


        if (Auth::user() && !Auth::user()->isUser()) {
            $isVendor = null;

            if (Auth::user()->isVendor()) {
                $isVendor = Auth::user()->id;
            }

            $payment = Payment::where('status', 'Success')->get();

            $order = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
                ->when($isVendor, function ($query) use ($isVendor) {
                    return $query->where('vendor_id', $isVendor);
                })
                ->withSum('carts', 'quantity')
                ->withCount('ratings')
                ->get();

//            dd($order->groupBy('product_id'));
			$staff = Staff::get();
            $merchant = User::where('role','vendor')->get();
            $merchantSales = User::join('orders','orders.vendor_id','users.id')->where('role','vendor')
                ->select('users.profile_image as profile_image','users.name as name','orders.id as id')
                ->groupBy('users.id')
                ->get();
            $user = User::where('role','normal')->get();
            $totalSales = Order::select(DB::raw('sum(cart_total) as cart_total'))->where('vendor_id',Auth::user()->id)->get();
		   
		    $currentYear1 = Carbon::now()->year;
            $previousYear = $currentYear1 - 1;
            $currentYearData = DB::table('orders')->whereYear('created_at',$currentYear1)->get();
            $chartData = [
                'labels' => $currentYearData->pluck('label'),
                'values' => $currentYearData->pluck('value'),
            ];
			
			$currentYearSalesgrow = Order::where('vendor_id',Auth::user()->id)->where('status','Completed')->whereYear('created_at', Carbon::now()->year)->sum('cart_total');
            $previousYearSalesgrow = Order::where('vendor_id',Auth::user()->id)->where('status','Completed')->whereYear('created_at', Carbon::now()->subYear()->year)->sum('cart_total');
            if ($previousYearSalesgrow != 0) {
                $growthRate = (($currentYearSalesgrow - $previousYearSalesgrow) / $previousYearSalesgrow) * 100;
            } else {
                $growthRate = 0;
            }
			
			$currentYearSalesgrow2 = Order::where('vendor_id',Auth::user()->id)->where('status','Completed')->whereYear('created_at', Carbon::now()->year)->sum('cart_total');
            $previousYearSalesgrow2 = Order::where('vendor_id',Auth::user()->id)->where('status','Completed')->whereYear('created_at', Carbon::now()->subYear()->year)->sum('cart_total');
            if($previousYearSalesgrow2 != 0) {
                $growthRate2 = (($currentYearSalesgrow2 - $previousYearSalesgrow2) / $previousYearSalesgrow2) * 100;
            }else{
                $growthRate2 = 0;
            }
			
			$currentYearSalesAd = Order::whereYear('created_at', $currentYear1)
                ->select(DB::raw('SUM(cart_total) as total_sales'))
                ->first()
                ->total_sales;
			$currentYearSales = Order::where('vendor_id',Auth::user()->id)->whereYear('created_at', $currentYear1)
                ->select(DB::raw('SUM(cart_total) as total_sales'))
                ->first()
                ->total_sales;
            $lastYear = date('Y', strtotime('-1 year'));

            $lastYearSales = Order::where('vendor_id',Auth::user()->id)->whereYear('created_at', $lastYear)
                ->select(DB::raw('SUM(cart_total) as total_sales'))
                ->first()
                ->total_sales;
			 
							
		 /* chart 1 */
            $result1 = Order::whereYear('created_at', $currentYear1)
                ->select(DB::raw('SUM(total_payment) as totalPayment'), DB::raw('COUNT(id) as totalOrder'), DB::raw('COUNT(total_payment) as totalSold'))
                ->groupBy('vendor_id')
                ->get();
            $data1 = [];
            foreach ($result1 as $val) {
                $data1[] = [
                    'totalPayment' => $val->totalPayment,
                    'totalOrder' => $val->totalOrder,
                    'totalSold' => $val->totalSold,
                ];
            }
		/* chart 2 */
            $vendor_id = Auth::user()->id;
            $result2 = Order::where('vendor_id', $vendor_id)
                ->whereYear('created_at', $currentYear1)
                ->select(DB::raw('SUM(total_payment) as totalPayment'), DB::raw('COUNT(id) as totalOrder'), DB::raw('COUNT(total_payment) as totalSold'))
                ->groupBy('vendor_id')
                ->get();
            $data2 = [];
            foreach ($result2 as $val) {
                $data2[] = [
                    'totalPayment' => $val->totalPayment,
                    'totalOrder' => $val->totalOrder,
                    'totalSold' => $val->totalSold,
                ];
            }	
			
		
            return view('admin.home',compact('chartData','data1','data2'))
                ->with('order', $order)
				->with('staff',$staff)
                ->with('merchant',$merchant)
                ->with('user',$user)
                ->with('merchantSales',$merchantSales)
                ->with('totalSales',$totalSales)
				->with('currentYear',$currentYear1)
                ->with('previousYear',$previousYear)
				->with('currentYearSalesAd',$currentYearSalesAd)
				->with('currentYearSales',$currentYearSales)
                ->with('lastYearSales',$lastYearSales)
                ->with('growthRate',$growthRate)
                ->with('growthRate2',$growthRate2)
				;
        } else {
            return view('home', compact('products'))
                ->with('desktopcategory', $desktopcategory)
                ->with('category', $category)
                ->with('categorySecond', $categorySecond)
                ->with('package', $package)
                ->with('supplement', $supplement)
                ->with('banner', $banner)
                ->with('popularShops', $popularShop)
                ->with('listProductsBasedoncategory', $listProductsBasedoncategory)
                ->with('popularProducts', $popularProduct)
                ->with('products',$products)
                ->with('categoryshop',$categoryshop);
        }
    }

    public function livewire()
    {
        return view('livewire');
    }

    public $amount = 8;

    public function render()
    {
        $products = Product::take($this->amount)->get();
        return view('livewire.products', compact('products'));
    }

    public function load()
    {
        $this->amount += 8;
    }
	
	  public function allshops(){
        $popularShop = User::where('role','vendor')->get();
        return view('allshops')
            ->with('popularShops', $popularShop);
    }
	
	public function lineChart(){
		$currentYear = date('Y');
		$previousYear = $currentYear - 1;

		// Get the total sales, total orders, and products sold for the current year
		$currentYearData = DB::select(DB::raw("
			SELECT 
				SUM(total_payment) AS totalPayment, 
				COUNT(id) AS totalOrder, 
				COUNT(total_payment) AS totalSold 
			FROM 
				orders 
			WHERE 
				YEAR(created_at) = '".$currentYear."' AND 
				status = 'Completed'
		"));

		// Get the total sales, total orders, and products sold for the previous year
		$previousYearData = DB::select(DB::raw("
			SELECT 
				SUM(total_payment) AS totalPayment, 
				COUNT(id) AS totalOrder, 
				COUNT(total_payment) AS totalSold 
			FROM 
				orders 
			WHERE 
				YEAR(created_at) = '".$previousYear."' 
		"));

		// Extract the data from the query results
		$currentYearSales = $currentYearData[0]->totalPayment;
		$currentYearOrders = $currentYearData[0]->totalOrder;
		$currentYearProducts = $currentYearData[0]->totalSold;

		$previousYearSales = $previousYearData[0]->totalPayment;
		$previousYearOrders = $previousYearData[0]->totalOrder;
		$previousYearProducts = $previousYearData[0]->totalSold;
	
		//dd($currentYearData);
	
		return view('admin.home')
		->with('currentYearSales',$currentYearSales)
		->with('currentYearOrders',$currentYearOrders)
		->with('currentYearProducts',$currentYearProducts)
		->with('previousYearSales',$previousYearSales)
		->with('previousYearOrders',$previousYearOrders)
		->with('previousYearProducts',$previousYearProducts);
	}

}
