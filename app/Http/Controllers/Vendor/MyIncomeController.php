<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MyIncomeController extends Controller
{
    public function index(){
        if(Auth::user()->isVendor()){
            $isVendor = Auth::user()->id;
        }
        $currentMonth = date('m');
        $payment = Payment::where('status','Success')->get();

        $toReleaseAll = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->withSum('','cart_total')
            ->get();

        $releaseCurrWeek = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
        ->withSum('','cart_total')
        ->whereBetween('created_at',[\Carbon\Carbon::now()->startOfWeek(),\Carbon\Carbon::now()->endOfWeek()])
        ->get();

        $releaseCurrMonth = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->withSum('','cart_total')
//            ->whereMonth('created_at',[\Carbon\Carbon::now()->Month()])
            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
            ->get();

        $releaseAllMonth = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->withSum('','cart_total')
            ->get();

        $toRelease = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->withSum('','cart_total')
            ->get();

        $Release = Order::whereIn('transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
            ->when($isVendor, function ($query) use($isVendor){
                return $query->where('vendor_id',$isVendor);
            })
            ->where('status','Completed')
            ->withSum('','cart_total')
            ->get();
			
		$vendor = User::where('id',$isVendor)->first();

        return view('vendor.myincome.index')
            ->with('totall',$toReleaseAll)
            ->with('totcurrweek',$releaseCurrWeek)
            ->with('totcurrmonth',$releaseCurrMonth)
            ->with('totallmonth',$releaseAllMonth)
            ->with('torelease',$toRelease)
            ->with('release',$Release)
			->with('vendor',$vendor);
    }
	
	public function  exportPDFIncome(Request $request){
        $monthId = $request->month;
        $yearId = $request->year;
        $id = $request->vendor_id;
        $selectedMonth = Carbon::createFromDate($yearId, $monthId, null, 'UTC');

        $data = DB::table('products as p')
            ->join('orders as o', 'o.product_id', '=', 'p.id')
            ->join('payments as pm', 'pm.transaction_id', '=', 'o.transaction_id')
            ->join('users as u', 'p.vendor_id', '=', 'u.id')
            ->join('shopping_carts as sc', 'p.id', '=', 'sc.product_id')
            ->join('main_category as m', 'p.main_category_id', '=', 'm.id')
            ->select('p.name','p.id','p.list_price_on_store','p.supplier_cost_price', 'm.name as category_name','u.name as vendor_name',DB::raw('SUM(sc.quantity) as total_quantity'))
            ->where('p.vendor_id', '=', $id)
            ->where('o.status', '=', 'Completed')
            ->where('pm.status', '=', 'Success')
            ->whereMonth('o.updated_at', '=', $selectedMonth->month)
            ->whereYear('o.updated_at', '=', $selectedMonth->year)
            ->orderBy('m.name')
            ->groupBy('p.id')
            ->get()
            ->groupBy('category_name');
        $vendor = DB::table('users as u')
            ->select('name','created_at')
            ->where('role','=','vendor')
            ->where('id', '=',$id)->first();

        $pdf = Pdf::loadView('vendor.myincome.incomepdf',['orders' => $data,'vendor' => $vendor,'selected_month' => $selectedMonth]);
        //show pdf in browser
        return $pdf->stream('income.pdf');
        //downlaod pdf
//        return $pdf->download('invoice.pdf');
    }
}
