<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDealerController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseGeneralControler;
use App\Http\Controllers\FavouriteImagesController;
use App\Http\Controllers\EventListenerPOstCon;

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
Route::get('purchasedetail/{id}/{dealer_id}',[PurchaseGeneralControler::class,'viewPurchasedetail'])->name('purchasedetail');
Route::get('pay-remaining-amount-to-dealer/{id}',[PurchaseGeneralControler::class,'pay_remaining'])->name('pay_remaining');
Route::get('dealer_account',[PurchaseGeneralControler::class,'dealer_account'])->name('dealer_account');
Route::post('savebill',[PurchaseGeneralControler::class, 'savebill'])->name('savebill');
Route::get('create_jobs',[PurchaseGeneralControler::class, 'createForm'])->name('create_jobs');
Route::post('send-contact-from',[PurchaseGeneralControler::class, 'sendMain'])->name('send');
Route::get('eventpost',[EventListenerPOstCon::class, 'index']);
Route::post('storepost',[EventListenerPOstCon::class, 'store'])->name('storepost');

});

Route::get('img-fav-view',[FavouriteImagesController::class,'imgview']);
Route::post('favimg',[FavouriteImagesController::class,'addtofav']);
Route::post('unfav',[FavouriteImagesController::class, 'addtofav']);
Route::get('hearted-fav-img',[FavouriteImagesController::class, 'favouriteViews']);


Route::get('adminregister', [GeneralController::class, 'adminregister'])->name('adminregister');
Route::get('adminlogin', [GeneralController::class, 'adminlogin'])->name('adminlogin');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
