<?php

namespace App\Http\Controllers\Vendor;
use App\Models\Product;
use App\Models\Settlements;
use App\Models\ShopDetail;
use App\Models\Voucher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use \Carbon\Carbon;

class MarketingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$currDate = now();
        //$currDate = Carbon::now()->startOfDay(); untuk tarikh sahaja
        $voucher = Voucher::select('start_at','end_at','unique_code','capped',DB::raw('count(unique_code) as uniqueId'))->groupBy('id')->get();

        $currDate = Carbon::now();
//         \Carbon\Carbon::now();
        $OnGoingVoucher = Voucher::where('start_at' ,'<=', $currDate)->where('end_at', '>=',$currDate)
            ->select('start_at','end_at','unique_code','capped',DB::raw('count(unique_code) as uniqueId'))
            //->where( DB::raw('now()'),'>=',DB::raw('start_at') )
            //->where( DB::raw('now()'), '<=',DB::raw('end_at') )
            ->groupBy('id')->get();

        $UpcomingVoucher = Voucher::where('start_at' ,'>=', $currDate)
            ->select('start_at','end_at','unique_code','capped',DB::raw('count(unique_code) as uniqueId'))
            ->groupBy('id')->get();

        $ExpiredVoucher = Voucher::where('end_at' ,'<=', $currDate)
            ->select('start_at','end_at','unique_code','capped',DB::raw('count(unique_code) as uniqueId'))
            ->groupBy('id')->get();

        //dd($current_events);
        return view('vendor.marketingcenter.index')
            ->with('allvoucher',$voucher)
            ->with('ongoingvoucher',$OnGoingVoucher)
            ->with('upcomingvoucher',$UpcomingVoucher)
            ->with('expiredvoucher',$ExpiredVoucher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVoucher()
    {
        $voucher = Voucher::get();
        return view('vendor.marketingcenter.createvoucher')
            ->with('voucher', $voucher);
    }

//    public function createBooster(){
//        $booster = Product::where('vendor_id',Auth::user()->id)->get();
//        return view('vendor.marketingcenter.createbooster')
//            ->with('booster',$booster);
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVoucher(Request $request)
    {
//        $validator =  Validator::make($request->all(), [
//            'vouchName' => ['required'],
//            'vouchType' => ['required'],
//            'amount' => ['required'],
//            'start' => ['required'],
//            'end' => ['required'],
//        ]);
//        if($validator->errors()->first()){
//            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
//        }
        $random = Str::random(2);
        $generateId = mt_rand(100000,999999);

        $createVoucher = new Voucher;
        $createVoucher->vendor_id=Auth::user()->id;
        $createVoucher->product_id=null; //product_id ni tengok balik kemudian
        $createVoucher->name=$request->vouchName;
        $createVoucher->unit_value=$request->vouchType;
        $createVoucher->value=$request->amount;
        $createVoucher->start_at=$request->start;
        $createVoucher->end_at=$request->end;
        $createVoucher->unique_code=Auth::user()->id.$random.$generateId;
        $createVoucher->save();

        return redirect()->back();
    }

    public function storeBoosterNow(Request $request, $id)
    {
        //dd($id);
        $currDate = Carbon::now();
        $OnGoingVoucher = Product::where('start_at' ,'<=', $currDate)->where('end_at', '>=',$currDate)
            //->where( DB::raw('now()'),'>=',DB::raw('start_at') )
            //->where( DB::raw('now()'), '<=',DB::raw('end_at') )
            ->get();
        $countOnGoing = count($OnGoingVoucher);
        //dd($count);
        if($countOnGoing >= 4){
            return back()->with('error', 'Boost are overlimit ! Maximum only 4 products');
        }else{
            $boostProduct = Product::where('id',$id)->first();
            $currentDateTime = Carbon::now();
            $newDateTime = Carbon::now()->addHours(4);
            $boostProduct->vendor_id=Auth::user()->id;
            $boostProduct->start_at=$currentDateTime;
            $boostProduct->end_at=$newDateTime;
            $boostProduct->boostProduct=1;
            $boostProduct->save();
            return back()->with('success', 'Boost Successfull!');
        }
        return redirect()->back();
    }

    public function storeBoosterUpComing(Request $request, $id)
    {
        //dd($id);
        $currDate = Carbon::now();
        //$newDateTime = Carbon::now()->subMinutes(2);
        $OnGoingVoucher = Product::where('start_at' ,'<=', $currDate)->where('end_at', '>=',$currDate)->orderBy('end_at','desc')->get();
        $latest = $OnGoingVoucher->first();
        $UpcomingVoucher = Product::where('start_at' ,'>=', $currDate)->get();
        $countUpcoming = count($UpcomingVoucher);
        if($countUpcoming >= 4){
            return back()->with('error', 'UpComing Boost are overlimit ! Maximum only 4 products');
        }
        if(isset($latest)){
            $newstart_at = \Carbon\Carbon::parse($latest->end_at)->addMinutes(1);
            $addHours = Carbon::now()->addHours(8);
            $boostProduct = Product::where('id',$id)->first();
            $boostProduct->vendor_id=Auth::user()->id;
            $boostProduct->start_at=$newstart_at;
            $boostProduct->end_at=$addHours;
            $boostProduct->boostProduct=1;
            $boostProduct->save();
            return back()->with('success', 'Boost Successfull!');
        }
        return redirect()->back();
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

    public function boostproduct(){
        $boost = Product::get();
        $currDate = Carbon::now();
        $newDateTime = Carbon::now()->addHours(4);
        //$result->expiry_date >= Carbon::now();
        $OnGoingVoucher = Product::where('start_at' ,'<=', $currDate)->where('end_at', '>=',$currDate)
            //->where( DB::raw('now()'),'>=',DB::raw('start_at') )
            //->where( DB::raw('now()'), '<=',DB::raw('end_at') )
            ->get();
        $UpcomingVoucher = Product::where('start_at' ,'>=', $currDate)
            ->get();
        $ExpiredVoucher = Product::where('start_at' ,'<=', $newDateTime)
            ->get();
        //dd($current_events);
        return view('vendor.marketingcenter.boostproduct')
            ->with('boost', $boost)
            ->with('ongoingproduct',$OnGoingVoucher)
            ->with('upcomingproduct',$UpcomingVoucher)
            ->with('expiredproduct',$ExpiredVoucher);
    }
}
