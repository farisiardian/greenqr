<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\SettlementDetails;
use App\Models\Settlements;
use App\Models\UserBank;
use Auth;
use DB;
use \Carbon\Carbon;
use Illuminate\Http\Request;

class MyBalanceController extends Controller
{
    public function index(){
        $defaultbankInformation = UserBank::where('user_id',Auth::user()->id)
            ->orderBy('created_at','asc')
            ->first();
        $secondarybankInformation = UserBank::where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc')
            ->first();
        $currentBalance  = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            //->join('orders','settlement_details.order_id','orders.id')
            ->where('settlements.status','pending')
            ->where('settlements.user_id',Auth::user()->id)
            ->select('settlements.*',DB::raw('sum(settlement_details.total_payment) as total_payment'))
            ->get();
        $withdrawalTab = Settlements::join('settlement_details','settlements.id','settlement_details.settlement_id')
            //$settlement  = Settlements::join('tbl2','tbl1.pk','tbl2.fk')
            //->withSum('','settlement_details.total_payment') klu join table mcm ni tak boleh buat sum mcm ni, kena sum dalam select
            //->select('settlement_details.*','settlements.settlement_id as transaction_id')
            ->select('settlement_details.*', 'settlements.status as status','settlements.settlement_id as transaction_id','settlement_details.settlement_id as id',
            DB::raw('SUM(settlement_details.total_payment) as totalPayment'))
            ->where('settlements.user_id',Auth::user()->id)
            ->groupBy('settlement_details.settlement_id')
            ->get();
        return view('vendor.mybalance.index')
            ->with('defaultbankInformation',$defaultbankInformation)
            ->with('secondarybankInformation',$secondarybankInformation)
            ->with('currentBalances',$currentBalance)
            ->with('withdrawalTabs',$withdrawalTab);
    }

    public function withdrawMoney(){
        $checkStatus = Settlements::select('status')->where('user_id',Auth::user()->id)->where('status','Pending')->get();
        $status = $checkStatus->first();
        if(isset($status)) {
            $currDate = Carbon::now();
            $settlementId = SettlementDetails::where('user_id', Auth::user()->id)->get();
            foreach ($settlementId as $settlementIds) {
                $settlementIds->withdraw_date = $currDate;
                $settlementIds->save();
            }
            $withdrawMoney = Settlements::where('user_id', Auth::user()->id)->where('status', 'Pending')->get();
            foreach ($withdrawMoney as $withdrawMoneys) {
                $withdrawMoneys->status = "Paid";
                $withdrawMoneys->save();
            }
            return back()->with('success', 'Withdrawal Successfull !');
        }else{
            return back()->with('error', 'Withdrawal Already Submit !');
        }
        return redirect()->back();
    }

}
