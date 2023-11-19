<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index(Request $request){
        $userName = $request->userName;
        $userEmail = $request->userEmail;
        $status = $request->status;
        $startDate = $request->startDate ? Carbon::parse($request->startDate)->startOfDay() : null;
        $endDate = $request->endDate ? Carbon::parse($request->endDate)->endOfDay()  : null;
        if($request != ""){
            $user = User::where('role','vendor')
                ->when($userName, function ($query , $userName){
                    return $query->where('name','like', '%'.$userName.'%');
                })
                ->when($userEmail, function ($query , $userEmail){
                    return $query->where('email','like', '%'.$userEmail.'%');
                })
                ->when($status, function ($query , $status){
                    return $query->where('status','=',$status);
                })
                ->when($startDate, function ($query , $startDate){
                    return $query->where('created_at','>=', $startDate);
                })
                ->when($endDate, function ($query , $endDate){
                    return $query->where('created_at','<=', $endDate);
                })
                ->get();
        }else{
            $user = User::where('role','vendor')->get();
        }
        //$user = User::where('role','vendor')->get();
        return view('admin.merchant.index')->with('users',$user);  //folder/folder/page
    }

    public function editMerchant($id){
        $view = User::where('id',$id)->first();
        return view('admin.merchant.editMerchant')->with('view',$view);
    }

    public function updateMerchant(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->name=$request->userName;
        //$user->email=$request->userEmail;
        $user->phone=$request->phone;
        $user->save();
        return back()->with('success','Update Merchant Successfully!');
        return redirect()->back();
    }

    public function qrcode(){
        $shopOwner = User::first();
        return view('admin.merchant.qrcode')->with('shopOwners',$shopOwner);
    }
}
