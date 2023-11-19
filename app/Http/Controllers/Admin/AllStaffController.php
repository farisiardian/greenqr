<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AllStaffController extends Controller
{
//    public function index(Request $request){
//        $searchName = $request['search'] ?? "";
//        if($searchName != ""){
//            $user = Staff::where('name','LIKE',"%$searchName")->get();
//        }else{
//            $user = Staff::all();
//        }
////        $user = Staff::get();
//        return view('admin.allstaff.index',compact('user','searchName'))
//            ->with('users',$user)->with('search',$searchName);    //folder/folder/page
//    }

    public function index(Request $request){

        $userName = $request->userName;
        $userEmail = $request->userEmail;
        $department= $request->department;
        $position = $request->position;
        $status = $request->status;
        $startDate = $request->startDate ? Carbon::parse($request->startDate)->startOfDay() : null;
        $endDate = $request->endDate ? Carbon::parse($request->endDate)->endOfDay()  : null;

        if($request != ""){
            $user = Staff::
            when($userName, function ($query , $userName){
                return $query->where('name','like', '%'.$userName.'%');
            })
                ->when($userEmail, function ($query , $userEmail){
                    return $query->where('email','like', '%'.$userEmail.'%');
                })
                ->when($department, function ($query , $department){
                    return $query->where('dept','like', '%'.$department.'%');
                })
                ->when($position, function ($query , $position){
                    return $query->where('position','like', '%'.$position.'%');
                })
                ->when($status, function ($query , $status){
                    return $query->where('status','like',$status);
                })
                ->when($startDate, function ($query , $startDate){
                    return $query->where('registered_dated','>=', $startDate);
                })
                ->when($endDate, function ($query , $endDate){
                    return $query->where('registered_dated','<=', $endDate);
                })
                ->get();
        }else{
            $user = Staff::all();
        }
        return view('admin.allstaff.index')->with('users',$user);    //folder/folder/page
    }

    public function delete($id){
        $data=Staff::find($id);
        $data->delete();
        return back()->with('success','Delete ' .$id. ' Successfully!');
        return redirect()-back();
    }

    public function deleteStaff($id){
        $data=Staff::find($id);
        $data->delete();
        return back()->with('success','Delete Successfully!');
        return redirect()-back();
    }

    public function editStaff($id){
        $staff = Staff::where('id',$id)->first();
        return view('admin.allstaff.editStaff')->with('staff',$staff);
    }

    public function updateStaff(Request $request){
        $staff = Staff::where('id',$request->id)->first();
        $staff->name=$request->staffName;
        $staff->dept=$request->department;
        $staff->position=$request->position;
        $staff->phone=$request->phone;
        $staff->email=$request->email;
        $staff->password=Hash::make($request->password);
        $staff->save();
        return back()->with('success','Update Staff Successfully!');
        return redirect()->back();
    }

    public function addstaff(){
        $staff = Staff::select('id')->get();
        $count = count($staff) + 1;
        $staffId = 'S00000'.$count;

        $generatePassword = mt_rand(100000,999999);
        $kod = 'pass';
        $password = $kod.$generatePassword;
        return view('admin.allstaff.addstaff')->with('staffId',$staffId)->with('password',$password);
    }

    public function addnewstaff(Request $request){
        //dd($request->staffID);
        $addStaff = new Staff;
        $addStaff->staff_id=$request->staffID;
        $addStaff->name=$request->staffName;
        $addStaff->phone=$request->phone;
        $addStaff->email=$request->email;
        $addStaff->dept=$request->department;
        $addStaff->position=$request->position;
        $addStaff->status=1;
        $addStaff->registered_dated=Carbon::now();
        $addStaff->password=Hash::make($request->password);
        $addStaff->save();
        return back()->with('success','Add New Staff Succesfully');
        return redirect()->back();
    }

}
