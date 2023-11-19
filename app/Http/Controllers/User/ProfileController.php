<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\State;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->isVendor()){
            return view('vendor.profile.index');
        }
		$address = UserAddress::where('user_id' , Auth::user()->id)->first();
        $state = State::first();
        return view('user.profile.index')
            ->with('address',$address)
            ->with('state',$state);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isVendor()){
            return view('vendor.profile.changepw');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
//        dd($request);

        $validator =  Validator::make($request->all(), [
            'name' => ['required'],
//            'phone' => ['required'],
        ]);

        if($validator->errors()->first()){
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $user = User::find($id);

        if(!isset($user)){
            return redirect()->back()->withInput()->withErrors('User not found');
        }

        try{
            DB::beginTransaction();

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            if(isset($request->dob)) {
                $user->dob = Carbon::parse($request->dob)->isoFormat('YYYY-MM-DD');
            }

            if(isset($request->image)){
                $image = 'userprofile/'.time() . '.' .  $request->image->getClientOriginalName();
                $request->image->storeAs('public/', $image);
                $user->profile_image = $image;
            }

            $user->save();

            DB::commit();

            return redirect()->back();

        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->withInput()->withErrors('Failed To Edit Profile');
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
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

    public function changepw(Request $request){

        $validator =  Validator::make($request->all(), [
            'oldpw' => ['required'],
            'password' => ['required', 'string','confirmed', 'min:8','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
        ]);

        if($validator->errors()->first()){
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $user = User::find(Auth::user()->id);

        if(!isset($user)){
            return redirect()->back()->withInput()->withErrors('Invalid Password');
        }

        if(!Hash::check($request->oldpw,$user->password)){

            return redirect()->back()->withInput()->withErrors('Invalid Password');

        }

        try{
            DB::beginTransaction();


            $user->password = Hash::make($request->password);
            $user->save();



            DB::commit();

            return redirect()->back();

        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->withInput()->withErrors('Failed To Save Profile');
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }


    }
}
