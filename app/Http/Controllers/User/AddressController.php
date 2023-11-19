<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class AddressController extends Controller
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

        $address = UserAddress::where('user_id' , Auth::user()->id)->get();
        $state = State::get();
        return view('user.address.index')->with('address',$address)
            ->with('state',$state);
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

        $default = UserAddress::where('user_id' , Auth::user()->id)->where('default_address',1)->first();

        $totalAddress = UserAddress::where('user_id' , Auth::user()->id)->count();

        try{
            DB::beginTransaction();

            $address = new UserAddress;
            $address->user_id = Auth::user()->id;
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

            $address->save();

            DB::commit();

            return redirect()->back();

        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->withInput()->withErrors('Failed To Add Address');
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
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
        $address = UserAddress::find($id);
        $state = State::get();

        return view('user.address.edit')->with('address', $address)->with('state',$state);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address =  UserAddress::find($id);

        if(!isset($address)){
            return redirect()->back()->withInput()->withErrors('Address not found');
        }

        if($address->default_address == 1){
            $otherAddress = UserAddress::where('user_id' , Auth::user()->id)->where('id','!=', $id)->first();

            if(isset($otherAddress)){
                $otherAddress->default_address = 1;
                $otherAddress->save();

            }
        }
        $address->delete();

        return redirect()->back();
    }


    public function setDefault($id){

        $address =  UserAddress::find($id);

        if(!isset($address)){
            return redirect()->back()->withInput()->withErrors('Address not found');
        }


        $otherAddress = UserAddress::where('user_id' , Auth::user()->id)->where('id','!=', $id)->where('default_address', 1)->first();

        if(isset($otherAddress)){
            $otherAddress->default_address = 0;
            $otherAddress->save();

        }

        $address->default_address = 1;
        $address->save();

        return redirect()->back();
    }
}
