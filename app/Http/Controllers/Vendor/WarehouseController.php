<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouse = Warehouse::where('vendor_id',Auth::user()->id)->get();
        $rand = Str::random(4);
        $count = count($warehouse)+1;
        $wcode = 'WAR-0000'.$rand.$count;
        return view('vendor.warehouse.index')->with('warehouse',$warehouse)->with('wcode',$wcode);
    }

    public function store(Request $request){
        $addwarehouse = new Warehouse;
        $addwarehouse->vendor_id = Auth::user()->id;
        $addwarehouse->warehouse_name = $request->warehouse_name;
        $addwarehouse->warehouse_code = $request->wcode;
        $addwarehouse->contact_number = $request->contact_number;
        $addwarehouse->location = $request->location;
        $addwarehouse->address = $request->address;
        $addwarehouse->city = $request->city;
        $addwarehouse->postcode = $request->postcode;
        $addwarehouse->status = $request->status;
        $addwarehouse->save();
        return back()->with('success','Warehouse Successfully Add!');
        return redirect()->back();
    }
    //sent warehouse id
    public function edit($id){
        //return 'okay';
        $warehouse = Warehouse::where('id',$id)->first();
        \Log::info($warehouse);
        return view('vendor.warehouse.editWarehouse')->with('warehouse',$warehouse);
    }

    public function update(Request $request,$id){
        $warehouse = Warehouse::find($id);
        //\Log::info($warehouse);
        //dd($updateWarehouse);

        if(!isset($warehouse)){
            return redirect()->back()->withInput()->withErrors('Warehouse not found');
        }
        else{
            $warehouse->warehouse_name = $request->warehouse_name;
            $warehouse->warehouse_owner = $request->warehouse_owner;
            $warehouse->warehouse_code = $request->wcode;
            $warehouse->contact_number = $request->contact_number;
            $warehouse->location = $request->location;
            $warehouse->status = $request->status;
            $warehouse->save();

            return redirect()->back()->with('success','Warehouse Successfully Updated!');
        }
    }


    //delete warehouse
    public function destroy($id){

        $warehouse = Warehouse::find($id);

        //check if id exist in db n return error if fails
        if(!isset($warehouse)){
            return redirect()->back()->withInput()->withErrors('Warehouse not found');
        }
        else{
            //soft delete by using "Use SoftDeletes" in modal
            $warehouse->delete();
        }

        //\Log::info($warehouse);

        //return back
        return redirect()->back();
    }
}
