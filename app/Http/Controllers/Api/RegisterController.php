<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ControllerError;
use App\Models\Notification;
use App\Models\User;
use App\Models\TempCode;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB;
use Hash;
use \Carbon\Carbon;


class RegisterController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
    }

    public function tempcode(Request $request){

        \Log::info($request);

//        $client = new Client();
//
//        $token = ZahabAccessToken::first();
//
//        $access_token = null;
//
//        if(isset($token)){
//
//            $access_token = $token->access_token;
//
//        }
//
//        $online_params = [
//            'headers' => ['accept' => 'application/json','Content-Type' => 'application/json','Authorization' => 'Bearer '.$access_token],
//            'body' => json_encode(array(
//                "Page" => 1,
//                "Rows" => 10,
//                "Search" => "{\"Email\":\"$request->email\"}",
//
//            ))
//
//        ];
//
//        try {
//
//            $online_response = $client->request('POST', config('app.ZAHAB_API_CRM') . '/v1.0/customer/customers/find-all', $online_params);
//
//            $online_statusCode = $online_response->getStatusCode();
//            $online_body = $online_response->getBody()->getContents();
//
//            $online_data = json_decode($online_body);
//
//            \Log::info($online_body);
//
//        }catch (\Exception $e){
//            \Log::info(json_encode($e->getMessage()));
////                return response()->json(array("msg" => 'Email available',"error"=>'fail'), 422);
//            return response()->json(array("msg" => $e->getMessage(),"error"=>'fail'), 422);
//        }
////        \Log::info($online_data->count);
//        if($online_data->count > 0 && $request->type != 'forgot'){
//            return response(array("msg" => 'Email already existed', 'error'=>"fail", 'code'=>null), 400);
//        }



        if( $request->type != 'forgot') {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->whereNull('deleted_at')],
            ]);
            if ($validator->fails()) {
                return response(array("msg" => $validator->errors()->first(), 'error' => "fail", 'code' => null), 400);
            }
        }

        if( $request->type == 'forgot'){
            $user = User::where("email", $request->email)->first();

            if(!isset($user)){
                return response()->json(array("msg" => "Email not found","error"=>"fail", 'code' => null), 422);

            }
        }




//		generate random code to be sent
        $code = rand(100000,999999);
//		$code = Str::random(6);

        try{
            DB::beginTransaction();

//			save code in database
            $temp = TempCode::where('email',$request->email)->first();


            if (!isset($temp)) {
                $temp = new TempCode;
                $temp->email = $request->email;

            }
            $temp->code = strtoupper($code);
            $temp->save();

//            $email_owner = $request->email;
//
//
//            $subject = 'LifeCare Registration code';
//
//            if( $request->type == 'forgot'){
//                $subject = 'GoldNow Reset Password code';
//            }
//
//
//////			send code to email
            Mail::send('emails.register_code', ['temp' => $temp,'type'=>$request->type], function ($message) use ($email_owner,$subject) {
                	$message->from('info@greenqr.co');
                $message->to($email_owner);
                $message->subject($subject);
            });

            DB::commit();
            return response()->json(array('msg' => "Success", 'error'=>null, 'code'=> strtoupper($code)), 200);

        } catch (\Exception $e){
            DB::rollback();
            \Log::info($e->getMessage());
//		    $error = [];
//		    $error['msg'] = 'Failed to register!';
//		    return response()->json(array("msg" => $e->getMessage()), 422);
            return response()->json(array("msg" => "something wrong with internet please try again later", 'error'=>"fail", 'code'=>null), 422);
        }


    }

    public function codecheck(Request $request){

        \Log::info($request);

        //		validate request
        if( $request->type != 'forgot'){
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->whereNull('deleted_at')],
            ]);
            if ($validator->fails()) {
                return response(array("msg" => $validator->errors()->first(), 'error'=>'fail'), 400);
            }
        }

        $validator = Validator::make($request->all(), [
            'code' => ['required'],
        ]);

        if ($validator->fails()) {
            return response(array("msg" => $validator->errors()->first(), 'error'=>'fail'), 400);
        }

        $temp = TempCode::where('email',$request->email)->where('code',$request->code)->first();

        if(!isset($temp)){
            return response()->json(array('msg' => "Invalid Code", 'error'=>'fail'), 200);

        }
        if($temp->updated_at->diffInSeconds(Carbon::now()) > 120){
            return response()->json(array('msg' => "request time out", 'error'=>'fail'), 200);
        }

        $temp->delete();

        return response()->json(array('msg' => "Code Match", 'error'=>null), 200);


    }

    public function register(Request $request){

        \Log::info($request);

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->whereNull('deleted_at')],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[._@$!%*?&])[A-Za-z\d._@$!%*?&]{8,}$/'],
        ]);

        if ($validator->fails()) {
            if($validator->errors()->first() == 'The password format is invalid.'){
                return response(array("msg" => 'The password must contain at least one uppercase letter, one lowercase letter, one number and one special character',"error"=>'fail'), 400);
            }else if($validator->errors()->first() == 'The username format is invalid.'){
                return response(array("msg" => 'The username cannot has spaces',"error"=>'fail'), 400);
            }else{
                return response(array("msg" => $validator->errors()->first(),"error"=>'fail'), 400);
            }
        }

        try{
            DB::beginTransaction();

            $note = 'Thank you for registering with us. Hope you will have an exciting experience with us!';


            $user = new User;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'normal';
            $user->profile_image = 'userprofile/profile.png';
            $user->background_image = 'userbackground/bg.png';
            $user->save();

            if($user){

                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->balance = 0;
                $wallet->balance_before = 0;
                $wallet->save();

                $noti = new Notification;
                $noti->user_id = $user->id;
                $noti->title = 'Welcome '.$request->username;
                $noti->note = $note;
                $noti->image = 'notification/notification.png';
                $noti->save();

            }


            DB::commit();
        } catch (\Exception $e){
            DB::rollback();

            $error = new ControllerError;
            $error->phpfunctions = 'register';
            $error->phpcontrollers = 'Api\RegisterController';
            $error->error = $e->getMessage();
            $error->line = $e->getLine();
            $error->remark = 'exception catch';
            $error->save();
//			\Log::info($e->getMessage());
            return response()->json(array("msg" => 'Failed To Register',"error"=> true), 422);
        }

        $request->request->add([
            'grant_type'    => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username'      => $request['username'],
            'password'      => $request['password'],
            'scope'         => null,
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'api/login',
            'POST'
        );
        return \Route::dispatch($token);
    }
}
