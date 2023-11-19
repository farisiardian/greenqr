<?php

namespace App\Http\Controllers\Admin;
use App\Models\staff;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $userName = $request->userName;
        $userEmail = $request->userEmail;
        $status = $request->status;
        $startDate = $request->startDate ? Carbon::parse($request->startDate)->startOfDay() : null;
        $endDate = $request->endDate ? Carbon::parse($request->endDate)->endOfDay()  : null;
        if($request != ""){
            $user = User::where('role','normal')
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
            $user = User::where('role','normal')->get();
        }
        return view('admin.user.index')->with('users',$user);  //folder/folder/page
    }

    public function editUser($id){
        $view = User::where('id',$id)->first();
        return view('admin.user.editUser')->with('view',$view);
    }

    public function updateUser(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->name=$request->userName;
        //$user->email=$request->userEmail;
        $user->phone=$request->phone;
        $user->save();
        return back()->with('success','Update User Successfully!');
        return redirect()->back();
    }
}
