<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index (Request $request){



        return view('location.index');


    }

    public function current (Request $request,$location){

        if($location == 'bangsar'){
            return view('location.bangsar');
        }else if($location == 'cheras'){
            return view('location.cheras');
        }else if($location == 'ss2'){
            return view('location.ss2');
        }else if($location == 'leasing_enquiry'){
            return view('location.leasing_enquiry');
        }

        return redirect('/location');


    }
}
