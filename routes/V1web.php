<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Auth::routes();

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'registers'])->name('register');
Route::post('/register/code', [App\Http\Controllers\Auth\RegisterController::class, 'registerCode'])->name('register.code');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/livewire',[App\Http\Controllers\HomeController::class, 'livewire'])->name('livewire');
Route::get('/location/{location}',[App\Http\Controllers\User\LocationController::class, 'current'])->name('location');
Route::get('/location',[App\Http\Controllers\User\LocationController::class, 'index'])->name('location.all');

Route::get('/shop',[App\Http\Controllers\User\ShopController::class, 'index'])->name('shop');
Route::get('/shop/{id}',[App\Http\Controllers\User\ShopController::class, 'show'])->name('shop.show');
//Route::get('/searchingProduct',[App\Http\Controllers\User\ShopController::class, 'searchingProduct'])->name('searchingProduct');
Route::get('/viewvendorcategory',[App\Http\Controllers\User\ShopController::class, 'viewvendorcategory'])->name('viewvendorcategory');
Route::get('/viewproductcategory',[App\Http\Controllers\User\ShopController::class, 'viewproductcategory'])->name('viewproductcategory');
Route::get('/allproduct',[App\Http\Controllers\User\ShopController::class, 'allproduct'])->name('allproduct');

Route::resource('/product',\App\Http\Controllers\User\ProductController::class);
Route::get('/showProduct/{id}',[\App\Http\Controllers\User\ProductController::class,'showProduct'])->name('showProduct');


Route::resource('/cart',\App\Http\Controllers\User\ShoppingCartController::class);

Route::resource('/checkout',\App\Http\Controllers\User\CheckoutController::class);
Route::post('/courier' ,[\App\Http\Controllers\User\CheckoutController::class ,'courier'])->name('courier');

Route::resource('/address',\App\Http\Controllers\User\AddressController::class);
Route::get('/setDefault/{id}', [\App\Http\Controllers\User\AddressController::class, 'setDefault'])->name('setDefault');

Route::resource('/profile',\App\Http\Controllers\User\ProfileController::class);
Route::post('changepw', [\App\Http\Controllers\User\ProfileController::class , 'changepw'])->name('changepw');

Route::resource('notification', \App\Http\Controllers\User\NotificationController::class);

Route::resource('voucher', \App\Http\Controllers\User\VoucherController::class);

Route::post('/payment', [\App\Http\Controllers\User\PaymentController::class, 'payment'])->name('payment');

Route::resource('mypurchase', \App\Http\Controllers\User\PurchaseHistoryController::class);
Route::post('getOrder',[\App\Http\Controllers\User\PurchaseHistoryController::class, 'getOrder'])->name('getOrder');
Route::post('editRating',[\App\Http\Controllers\User\PurchaseHistoryController::class, 'editRating'])->name('editRating');
Route::post('storeRating',[\App\Http\Controllers\User\PurchaseHistoryController::class, 'storeRating'])->name('storeRating');

Route::get('/my_order', [\App\Http\Controllers\Vendor\MyOrderController::class ,'index'])->name('my_order');
Route::get('/ship_order', [\App\Http\Controllers\Vendor\ShipOrderController::class ,'index'])->name('ship_order');
Route::post('/ship_order',[\App\Http\Controllers\Vendor\ShipOrderController::class,'ship'])->name('saveshiporder');
Route::get('/ship_order/{id}',[\App\Http\Controllers\Vendor\ShipOrderController::class,'editShipOrder'])->name('editShipOrder');
Route::get('/viewOrder/{id}',[\App\Http\Controllers\Vendor\ShipOrderController::class,'viewOrder'])->name('viewOrder');

Route::get('/return', [\App\Http\Controllers\Vendor\ReturnNRefundController::class ,'index'])->name('return');
Route::get('/return/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'viewOrderDetail'])->name('viewOrderDetail');
Route::get('/ApprovedRefund/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'ApprovedRefund'])->name('ApprovedRefund');
Route::get('/DisputeRefund/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'DisputeRefund'])->name('DisputeRefund');
Route::get('/ApprovalByLifecare/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'ApprovalByLifecare'])->name('ApprovalByLifecare');
Route::get('/DisapprovalByLifecare/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'DisapprovalByLifecare'])->name('DisapprovalByLifecare');
Route::get('/fullRefund/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'fullRefund'])->name('fullRefund');
Route::post('/savepartialrefund/{id}',[\App\Http\Controllers\Vendor\ReturnNRefundController::class,'savepartialrefund'])->name('savepartialrefund');


Route::resource('my_product', \App\Http\Controllers\Vendor\ProductController::class);
Route::get('/banned_product',[\App\Http\Controllers\Vendor\ProductController::class, 'banned'])->name('banned_product');
Route::post('/create',[\App\Http\Controllers\Vendor\ProductController::class, 'store'])->name('add_product');
//Route::get('/create',[\App\Http\Controllers\Vendor\ProductController::class,'create'])->name('add_product');
Route::get('/create',[\App\Http\Controllers\Vendor\ProductController::class,'getSubCategories'])->name('add_product');
Route::post('/storeSubCategory',[\App\Http\Controllers\Vendor\ProductController::class,'storeSubCategory'])->name('storeSubCategory');


Route::resource('marketing_center', \App\Http\Controllers\Vendor\MarketingCenterController::class);
Route::get('v_marketingcenter',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'index'])->name('vendor.marketingcenter');
Route::get('v_boostproduct',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'boostproduct'])->name('vendor.boostproduct');
Route::get('v_createvoucher',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'createVoucher'])->name('vendor.createvoucher');
Route::post('v_createvoucher',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'storeVoucher'])->name('storeVoucher');
//Route::get('v_createbooster',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'createBooster'])->name('vendor.createbooster');
Route::get('v_createboosternow/{id}',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'storeBoosterNow'])->name('storeBoosterNow');
Route::get('v_createboosterupcoming/{id}',[ \App\Http\Controllers\Vendor\MarketingCenterController::class ,'storeBoosterUpComing'])->name('storeBoosterUpComing');

Route::get('my_income',[\App\Http\Controllers\Vendor\MyIncomeController::class , 'index'])->name('my_income');

Route::get('settlement',[\App\Http\Controllers\Vendor\SettlementController::class , 'index'])->name('settlement');
Route::get('request_settlement',[\App\Http\Controllers\Vendor\SettlementController::class , 'RequestSettlement'])->name('vendor.settlement');

Route::get('my_balance',[\App\Http\Controllers\Vendor\MyBalanceController::class , 'index'])->name('my_balance');
Route::get('withdrawMoney',[\App\Http\Controllers\Vendor\MyBalanceController::class , 'withdrawMoney'])->name('withdrawMoney');

Route::resource('bank_account', \App\Http\Controllers\Vendor\BankAccountController::class);
Route::post('bank_account',[\App\Http\Controllers\Vendor\BankAccountController::class,'store'])->name('storeBankAccount');
Route::resource('v_profile', \App\Http\Controllers\Vendor\ProfileController::class);
Route::get('v_address' ,[ \App\Http\Controllers\Vendor\ProfileController::class , 'address'])->name('vendor.address');
Route::get('v_shop' ,[ \App\Http\Controllers\Vendor\ProfileController::class, 'shop'])->name('vendor.shop'); //nama apa2 ja
//Route::post('v_shop', [\App\Http\Controllers\User\ProfileController::class, 'store'])->name('vendor.store');

Route::get('/about_us', function () {
    return view('about');
})->name('about_us');

Route::get('/appointment', function () {
    return view('user.appointment.index');
})->name('appointment');

Route::get('/faq', function () {
    return view('user.faq.index');
})->name('faq');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/term', function () {
    return view('term');
})->name('term');

//Route::get('/cart', function () {
//    return view('user.cart.index');
//})->name('cart');

//Route::get('/checkout', function () {
//    return view('user.checkout.index');
//})->name('checkout');

//Route::get('/profile', function () {
//    return view('user.profile.index');
//})->name('profile');

//Route::get('/address', function () {
//    return view('user.address.index');
//})->name('address');

Route::get('/changepw', function () {
    return view('user.profile.changepw');
})->name('changepw');

//Route::get('/order_update', function () {
//    return view('user.profile.order_update');
//})->name('order_update');

Route::get('/rating', function () {
    return view('user.profile.rating');
})->name('rating');

//Route::get('/myvoucher', function () {
//    return view('user.profile.myvoucher');
//})->name('myvoucher');

//Route::get('/mypurchase', function () {
//    return view('user.mypurchase.index');
//})->name('mypurchase');

