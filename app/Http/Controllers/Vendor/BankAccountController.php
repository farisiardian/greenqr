<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Auth;
class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaultbankInformation = UserBank::where('user_id',Auth::user()->id)
            ->orderBy('created_at','asc')
            ->first();
        $secondarybankInformation = UserBank::where('user_id',Auth::user()->id)
            ->orderBy('created_at','desc')
            ->first();
        return view('vendor.bankaccount.index')
            ->with('defaultbankInformation',$defaultbankInformation)
            ->with('secondarybankInformation',$secondarybankInformation);
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
        $addBankAccount = UserBank::where('user_id',Auth::user()->id)->get();
        $countBankAccount = count($addBankAccount);
        if($countBankAccount <= 2){
            return back()->with('error','Bank Account already exist!');
        }else{
            $addBankAccount = new UserBank();
            $addBankAccount->user_id = Auth::user()->id;
            $addBankAccount->name = $request->fullName;
            $addBankAccount->holder = $request->bankName;
            $addBankAccount->acc_num = $request->accountNo;
            $addBankAccount->save();
            return back()->with('success','Bank Account Successfully Add!');
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
}
