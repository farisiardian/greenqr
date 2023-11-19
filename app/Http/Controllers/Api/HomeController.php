<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'msg' => 'Successfully logged out'
        ]);
    }

    public function home(Request $request){

        $user = $request->user();
        $wallet = $request->user()->wallets()->first();
        $address = $request->user()->address()->get();
        $bank = $request->user()->banks()->get();
        $notifications = $request->user()->notifications()->get();
        $unreadnotifications = $request->user()->notifications()->where('read_at',null)->get();
        $banner = Banner::get();
        $maincategory = MainCategory::get();
        $popularpackage = Product::where('main_category_id',1)->limit(10)->get();
        $popularsupplement = Product::where('main_category_id',3)->limit(10)->get();

        return response()
            ->json(
                array(
                    'user' => $user,
                    'wallet'=> $wallet,
                    'address'=> $address,
                    'bank'=> $bank,
                    'notifications'=> $notifications,
                    'unreadnotifications'=> $unreadnotifications,
                    'banner'=> $banner,
                    'maincategory'=> $maincategory,
                    'popularpackage'=> $popularpackage,
                    'popularsupplement'=> $popularsupplement,
                ),
                200);

    }
}
