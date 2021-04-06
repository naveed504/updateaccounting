<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDealerController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseGeneralControler;

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

Route::get('/', function () {
    return view('register.login');
});
Route::group(['middleware'=> ['auth']], function(){
Route::get('admins', [GeneralController::class, 'showadmins'])->name('admins');
Route::resource('maindealer', MainDealerController::class);
Route::resource('purchaseitem', PurchaseController::class);
Route::get('purchasedetail/{id}',[PurchaseGeneralControler::class,'viewPurchasedetail'])->name('purchasedetail');
Route::get('pay-remaining-amount-to-dealer/{id}',[PurchaseGeneralControler::class,'pay_remaining'])->name('pay_remaining');
Route::get('dealer_account',[PurchaseGeneralControler::class,'dealer_account'])->name('dealer_account');
Route::post('savebill',[PurchaseGeneralControler::class, 'savebill'])->name('savebill');
});


Route::get('adminregister', [GeneralController::class, 'adminregister'])->name('adminregister');
Route::get('adminlogin', [GeneralController::class, 'adminlogin'])->name('adminlogin');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
