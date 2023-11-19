<?php

namespace App\Http\Controllers\Vendor;
use App\Models\Settlements;
use App\Models\SettlementDetails;
use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
class SettlementController extends Controller
{
    public function index(){
		if(Auth::user()->isVendor()){
            $isVendor = Auth::user()->id;
        }
        $currentMonth = date('m');
        $pendingAll  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            //->join('orders','settlement_details.order_id','orders.id')
            ->where('settlements.status','pending')
            ->select('settlement_details.*','settlements.*')
            ->withSum('','settlement_details.total_payment')
            ->get();
        $paidCurrWeek  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            //->join('orders','settlement_details.order_id','orders.id')
            ->where('settlements.status','pending')
            ->select('settlement_details.*','settlements.*')
            ->whereBetween('settlement_details.created_at',[\Carbon\Carbon::now()->startOfWeek(),\Carbon\Carbon::now()->endOfWeek()])
            ->withSum('','settlement_details.total_payment')
            ->get();
        $paidCurrMonth  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            ->where('settlements.status','pending')
            ->select('settlement_details.*','settlements.*')
            ->withSum('','settlement_details.total_payment')
            ->whereRaw('MONTH(settlement_details.created_at) = ?',[$currentMonth])
            ->get();
        $paidAllMonth  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            ->where('settlements.status','pending')
            ->select('settlement_details.*','settlements.*')
            ->withSum('','settlement_details.total_payment')
            ->get();
        $pending  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            ->where('settlements.status','pending')
            //->withSum('','settlement_details.total_payment') klu join table mcm ni tak boleh buat sum mcm ni, kena sum dalam select
            //->select('settlement_details.*','settlements.settlement_id as transaction_id')
            ->select('settlement_details.*',
                    'settlements.settlement_id as transaction_id',
                    'settlement_details.settlement_id as id',
                    DB::raw('SUM(settlement_details.total_payment) as totalPayment'))
            ->groupBy('settlement_details.settlement_id')
            ->get();
        $paid  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            ->where('settlements.status','paid')
            ->select('settlement_details.*',
                    'settlements.settlement_id as transaction_id',
                    'settlement_details.settlement_id as id',
                    DB::raw('SUM(settlement_details.total_payment) as totalPayment'))
            //->select('settlement_details.*','settlements.*',DB::raw('(take_assessments.total_point)/SUM(assessment_questions.available_points)*100 AS percentage'))
            ->get();

//        dd($pending);
//        foreach ($pending as $pendings) {
//            dd($pending,$pendings,$pending->sum('total_payment'));
//        }
		$vendor = User::where('id',$isVendor)->first();

    return view('vendor.settlement.index')
        ->with('totall',$pendingAll)
        ->with('totcurrweek',$paidCurrWeek)
        ->with('totcurrmonth',$paidCurrMonth)
        ->with('totallmonth',$paidAllMonth)
        ->with('pending_tab',$pending)
        ->with('paid_tab',$paid)
		->with('vendor',$vendor);
    }

    public function RequestSettlement(Request $request){
        //$reqSettlement = Settlements::where('user_id',Auth::user()->id)->first();
        //$order = Order::where('status','Completed')->get();
        //$id = Order::select('id')->where('status', 'Completed')->get();
        $generateId = mt_rand(100000,999999);
        $kod = 'RS';

        $settlement  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            ->join('orders','settlement_details.order_id','orders.id')
            ->whereIn('settlements.status', ['pending','success'])
            ->where('orders.status','Completed')
            ->select('orders.*')
            ->get();
        //dd($settlement);
        if(count($settlement) == 0){ // jika request settlement ni belum dibuat jadi ni adalah first request
            $order = Order::where('status','Completed')->get(); //jadi semak status order yg completed sahaja
        }else{ // request settlement yang kedua dan seterusnya
            $checkOrderId = SettlementDetails::select('order_id')->get();
            $order = Order::where('status','Completed')
                ->whereNotIn('id',$checkOrderId)->get();
            //$sub_menu_access_id = Role_Access::where('role_id',Auth::user()->role()->first()->id)->select('sub_menu_id')->distinct()->get();
            //$sub_menu_access_id = $sub_menu_access_id->keyBy('sub_menu_id')->keys()->values()->all();
            //$order = array();
            //utk semak status completed selain id 5 dan 6 (yang dah request) ;
            //mean utk first request id(5,6) status yg completed dah request;
            //jadi else condition ni utk request settlement yg statusnya complete dalam tbl order dan belum request lg;
        }
        //dd('a',$order);
        if(count($order) == 0){
            //jika status yg completed belum wujud
            //kena letak error message (Dalam table order status belum ada yang Completed) sbb count order = 0 jadi masih belum ada yang Completed;
            //letak message "Requested Cannot be Done!Make sure Orders are Completed before Request Settlement!");
            return back()->with('error', 'Requested Settlement Cannot be Done! Make sure Orders are Completed before Request Settlement!');
        }
        $reqSettlement = new Settlements;
        $reqSettlement->user_id = Auth::user()->id;
        $reqSettlement->settlement_id = $kod.$generateId;
        $reqSettlement->status = "Pending";
        $reqSettlement->save();

        foreach($order as $orders) {
            $reqSettlementDetails = new SettlementDetails;
            $reqSettlementDetails->settlement_id = $reqSettlement->id;
            $reqSettlementDetails->order_id = $orders->id;
            $reqSettlementDetails->total_payment = $orders->total_payment;
            $reqSettlementDetails->save();
            return back()->with('success', 'Requested Settlement Successfull');
        }
        return redirect()->back();
    }
	public function exportPDFSettlement(Request $request){
        $monthId = $request->month;
        $yearId = $request->year;
        $id = $request->vendor_id;
        $selectedMonth = Carbon::createFromDate($yearId, $monthId, null, 'UTC');

        $vendor = DB::table('user_address as u')
			->leftjoin('user_banks as ub','ub.user_id','u.user_id')
            ->select('u.*','ub.acc_num as accnumber','ub.holder as bankname')
            ->where('u.user_id', '=',$id)
            ->where('u.default_address', '=', 1)
            ->where('u.deleted_at', '=', null)
            ->first();
		$payment = Payment::where('status','Success')->get();
		
		$order = DB::table('orders as o')
					 ->leftjoin('return_request as rr','rr.order_id','o.id')
					 ->selectRaw('sum(o.total_payment) as totalPayment,sum(o.shipping_total) as shipping,COALESCE(sum(rr.amount_return),0) as total_return')
					 ->whereIn('o.transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
					 ->whereMonth('o.created_at' ,'=',$selectedMonth->month)
					 ->whereYear('o.created_at','=',$selectedMonth->year)
					 ->first();
		$total = $order->totalPayment + $order->shipping + $order->total_return;	
		
		$order2 = DB::table('orders as o')
					 ->leftjoin('return_request as rr','rr.order_id','o.id')
					 ->selectRaw('o.created_at as created_at,o.total_payment as totalPayment,o.shipping_total as shipping,COALESCE(rr.amount_return) as total_return')
					 ->whereIn('o.transaction_id', $payment->keyBy('transaction_id')->keys()->values()->all())
					 ->whereMonth('o.created_at' ,'=',$selectedMonth->month)
					 ->whereYear('o.created_at','=',$selectedMonth->year)
					 ->get();
					 
        $settlement = DB::table('settlements as s')
            ->join('settlement_details as sd', 'sd.settlement_id', '=', 's.id')
            ->select('s.settlement_id','sd.total_payment')
            ->where('s.user_id','=',$id)
            ->where('s.status','=', 'Paid')
            ->whereMonth('s.created_at', '=', $selectedMonth->month)
            ->whereYear('s.created_at', '=', $selectedMonth->year)
            ->get();

        $pdf = Pdf::loadView('vendor.settlement.settlementpdf',['settlement' => $settlement,'orderTotal'=>$order,'orders'=>$order2,'total'=>$total,'vendor' => $vendor,'selected_month' => $selectedMonth]);
        //show pdf in browser
        return $pdf->stream('income.pdf');
        //downlaod pdf
//        return $pdf->download('invoice.pdf');
    }

}
