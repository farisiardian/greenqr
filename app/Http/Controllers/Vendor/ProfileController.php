<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\ShopDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $addshop = ShopDetail::where('user_id',Auth::user()->id)->first();

        if(!isset($addshop)) {

            $addshop = new ShopDetail;
            $addshop->user_id = Auth::user()->id;
        }
        $addshop->tagline=$request->tagline;
        $addshop->summary=$request->summary;
        $addshop->save();
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
        $validator =  Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
        ]);

        if($validator->errors()->first()){
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $user = User::find($id);

        if($user->email != $request->email){
            $validator =  Validator::make($request->all(), [
                'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            ]);

            if($validator->errors()->first()){
                return redirect()->back()->withInput()->withErrors($validator->errors()->first());
            }
        }

        if(!isset($user)){
            return redirect()->back()->withInput()->withErrors('User not found');
        }

        try{
            DB::beginTransaction();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->ic = $request->icpassword;
            $user->phone = $request->phoneNumber;
            $user->nationality = $request->country;
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

    public function address(){

        $address = UserAddress::where('user_id', Auth::user()->id)->get();
        $state = State::get();

        return view('vendor.profile.address')
            ->with('state', $state)
            ->with('address', $address);
    }

    public function shop(){
//        $shop = ShopDetail::where('user_id',Auth::user()->id)->get();   //ni array
          $shop = ShopDetail::where('user_id',Auth::user()->id)->first(); //ni object
		  $operatingHours = ShopDetail::where('user_id',Auth::user()->id)->first();
//        dd($shop2, $shop);

        return view('vendor.profile.shop')
            ->with('shop',$shop)
            ->with('operatingHours',$operatingHours)
			;
    }
	
	 public function editAddress($id){
        $address = UserAddress::find($id);
        $state = State::get();

        return view('vendor.profile.editAddress')->with('address', $address)->with('state',$state);
    }

    public function updateAddress(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
        ]);

        if($validator->errors()->first()){
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $address =  UserAddress::find($id);

        if(!isset($address)){
            return redirect()->back()->withInput()->withErrors('Address not found');
        }

        $default = UserAddress::where('user_id' , Auth::user()->id)->where('id','!=', $id)->where('default_address',1)->first();

        $totalAddress = UserAddress::where('user_id' , Auth::user()->id)->count();



        try{
            DB::beginTransaction();

            $address->phone = $request->phone;
            $address->name = $request->name;
            $address->email = $request->email;
            $address->address = $request->address;
            $address->postalcode = $request->postal_code;
            $address->city = $request->city;
            $address->state = $request->state;

            if($totalAddress == 0) {
                $address->default_address = 1;
            }
            if(isset($default) && isset($request->default_address)) {

                $default->default_address = 0;
                $default->save();
                $address->default_address = 1;
            }

            if(!isset($default) && isset($request->default_address)) {

                $address->default_address = 1;
            }

            $address->save();

            DB::commit();

            return redirect()->back();

        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->withInput()->withErrors('Failed To Edit Address');
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
	
	public function operatingHours(Request $request)
    {
        $user_id = Auth::user()->id;

        $shopDetail = ShopDetail::where('user_id', $user_id)->first();
        if (!$shopDetail) {
            $shopDetail = new ShopDetail(['user_id' => $user_id]);
        }

        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($days as $day) {
            $from = $request->input($day.'_from');
            $to = $request->input($day.'_to');
            $shopDetail->{$day.'_from'} = $from ? date('H:i:s', strtotime($from)) : null;
            $shopDetail->{$day.'_to'} = $to ? date('H:i:s', strtotime($to)) : null;
        }

        $shopDetail->save();
        return redirect()->back()->with('success', 'Operating hours updated successfully');
    }

}
