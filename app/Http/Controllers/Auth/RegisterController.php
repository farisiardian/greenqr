<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\TempCode;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use \Carbon\Carbon;
use Auth;
use Mail;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => isset($data['isvendor']) ? 'vendor' : 'normal',
            'profile_image' => 'userprofile/profile.png',
            'background_image' => 'userbackground/bg.png',
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            $note = 'Thank you for registering with us. Hope you will have an exciting experience with us!';

            $wallet = new Wallet;
            $wallet->user_id = $user->id;
            $wallet->balance = 0;
            $wallet->balance_before = 0;
            $wallet->save();

            $noti = new Notification;
            $noti->user_id = $user->id;
            $noti->title = 'Welcome ' . $data['name'];
            $noti->note = $note;
            $noti->image = 'notification/notification.png';
            $noti->save();
        }

        Auth::login($user);

        return redirect('/home');
    }

    public function registers(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        // 'email' => ['required','string', 'email', 'max:255', 'unique:users'],
        // 'name' => ['required','string'],
        // 'password' => ['required', 'string', 'min:8','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string'],
            'password' => [
                'required',
                'string',
                'min:8'
            ],
        ]);


        $error = [];

        if ($validator->fails()) {
            if ($validator->errors()->first() == 'The password format is invalid.') {
                $error['msg'] = 'The password must contain at least one letter and one number';
            } else {
                $error['msg'] = $validator->errors()->first();
            }

            return redirect()->back()->withInput()->withErrors($error);
        }

        try {
            $decrypted = Crypt::decryptString($request->code);
        } catch (DecryptException $e) {
            $decrypted = '';
        }

        $existcode = TempCode::where('email', $request->email)->where('code', $decrypted)->first();

        if (!isset($existcode)) {
            $error['msg'] = 'Fail To Register!';
            return redirect()->back()->withInput()->withErrors($error);
        }

        return $this->create($request->all());
    }

    public function register(Request $request)
    {

        if (!isset($request->email)) {

            return view('auth.register.email');
        }

        if (isset($request->email)) {

            //            dd($request->code);
            if (!isset($request->code)) {
                //                dd('b');
                $validator = Validator::make($request->all(), [
                    'email' => ['string', 'email', 'max:255', 'unique:users'],
                ]);

                if ($validator->fails()) {

                    $error = [];
                    $error['msg'] = $validator->errors()->first();

                    return redirect()->back()->withInput()->withErrors($error);
                }


                //		generate random code to be sent
                $code = rand(100000, 999999);
                //		$code = Str::random(6);

                try {
                    DB::beginTransaction();

                    //			save code in database
                    $temp = TempCode::where('email', $request->email)->first();


                    if (!isset($temp)) {
                        $temp = new TempCode;
                        $temp->email = $request->email;
                    }
                    $temp->code = strtoupper($code);
                    $temp->save();

                    $email_owner = $request->email;


                    $subject = 'GoldNow Registration code';

                    if ($request->type == 'forgot') {
                        $subject = 'GoldNow Reset Password code';
                    }


                    //			send code to email
                    Mail::send('emails.register_code', ['temp' => $temp, 'type' => $request->type], function ($message) use ($email_owner, $subject) {
                        $message->from('info@greenqr.co');
                        $message->to($email_owner);
                        $message->subject($subject);
                    });

                    DB::commit();
                    // return response()->json(array('msg' => "Success", 'error'=>null, 'code'=> strtoupper($code)), 200);
                    return view('auth.register.verify')->with('email', $request->email);
                } catch (\Exception $e) {
                    DB::rollback();
                    \Log::info($e->getMessage());
                    //		    $error = [];
                    //		    $error['msg'] = 'Failed to register!';
                    //		    return response()->json(array("msg" => $e->getMessage()), 422);
                    return view('auth.register.verify')->with('email', $request->email);
                    // return response()->json(array("msg" => "something wrong with internet please try again later", 'error'=>"fail", 'code'=>null), 422);
                }
            }
        }

        try {
            $decrypted = Crypt::decryptString($request->code);
        } catch (DecryptException $e) {
            $decrypted = '';
        }

        $existcode = TempCode::where('email', $request->email)->where('code', $decrypted)->first();

        if (!isset($existcode)) {
            return view('auth.register.email');
        }

        return view('auth.register')->with('email', $request->email)->with('code', $request->code);
    }

    public function registerCode(Request $request)
    {

        $validator = $request->validate([
            'code1' => ['required'],
            'code2' => ['required'],
            'code3' => ['required'],
            'code4' => ['required'],
            'code5' => ['required'],
            'code6' => ['required'],
        ], [
            'code1.required' => 'Incomplete Value',
            'code2.required' => 'Incomplete Value',
            'code2.required' => 'Incomplete Value',
            'code2.required' => 'Incomplete Value',
            'code2.required' => 'Incomplete Value',
            'code2.required' => 'Incomplete Value',
        ]);

        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4 . $request->code5 . $request->code6;

        $existcode = TempCode::where('email', $request->email)->where('code', $code)->first();

        // print_r($existcode);

        $error = [];

        if (!isset($existcode)) {

            $error['msg'] = 'Invalid Code!';
            return redirect()->back()->withInput()->withErrors($error);
        }

        // if ($existcode->updated_at->diffInSeconds(Carbon::now()) > 900) {

        //     $error['msg'] = 'request time out!';
        //     return redirect()->back()->withInput()->withErrors($error);
        // }

        return redirect('/register?email=' . $existcode->email . '&code=' . Crypt::encryptString($existcode->code));
    }
}
