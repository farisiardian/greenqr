<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ControllerError;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Auth;

class NotificationController extends Controller
{
    public function markasread(Request $request){
        try{
            $notifications = Notification::where('id',$request->notification_id)->get();

            if($request->notification_id == 'all'){
                $notifications = Notification::where('user_id',$request->user()->id)->where('read_at',null)->get();

            }

            DB::beginTransaction();

            foreach($notifications as $notifications2){
                $notifications2->read_at = Carbon::now();
                $notifications2->save();
            }
            DB::commit();

            return response()->json(array("msg"=>"success"), 200);

        }catch(\Exception $e){

            DB::rollback();

            $error = new ControllerError;
            $error->phpfunctions = 'markasread';
            $error->phpcontrollers = 'Api\NotificationController';
            $error->error = $e->getMessage();
            $error->line = $e->getLine();
            $error->remark = 'exception catch';
            $error->save();

            return response()->json(array("msg"=>"fail"),422);
        }
    }
}
