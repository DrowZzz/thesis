<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//homepage//
Route::get('/', [HomeController::class,'home']) ;

Route::get('/userhome', [HomeController::class,'index']) ;
Route::get('/redirect', [HomeController::class,'redirect']);
Route::get('/userprofile', [HomeController::class,'profile']);
Route::get('/editprofile', [HomeController::class,'editprofile']);
Route::post('/saveprofile', [HomeController::class,'saveprofile']);
Route::get('/deleteprofile', [HomeController::class,'deleteprofile']);
Route::post('/addpayment', [HomeController::class,'addpayment']);



Route::get('/makedonation', [HomeController::class,'makedonation']) ;
Route::post('/adddonation', [HomeController::class,'adddonation']) ;
Route::get('/donationhistory', [HomeController::class,'donationhistory']) ;


Route::get('/productlist', [HomeController::class,'productlist']) ;

Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);
Route::get('/mycart', [HomeController::class,'mycart']);
Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);

Route::get('/cash_order', [HomeController::class,'cash_order']);

Route::get('/print_pdf/{id}', [HomeController::class,'print_pdf']);


//admin users//
Route::get('/users_manage', [AdminController::class,'users_manage']) ;
Route::get('/users_delete/{id}', [AdminController::class,'users_delete']);
Route::get('/users_addform', [AdminController::class, 'users_addform']);
Route::post('/users_add', [AdminController::class, 'users_add']);
Route::get('/users_manage', [AdminController::class,'users_manage']) ;

Route::get('/donation', [AdminController::class,'donationlist']) ;
Route::get('/donationupdate/{id}', [AdminController::class,'donationupdate']) ;
Route::post('/confirm_donationupdate/{id}', [AdminController::class,'confirm_donationupdate']) ;

//admin products//
Route::get('/products_manage', [AdminController::class,'products_manage']) ;
Route::get('/products_addform', [AdminController::class,'products_addform']) ;
Route::get('/product_delete/{id}', [AdminController::class,'product_delete']);
Route::get('/product_update/{id}', [AdminController::class,'product_update']);
Route::post('/confirm_update/{id}', [AdminController::class,'confirm_update']);
Route::post('/add_product', [AdminController::class,'add_product']) ;

Route::get('/orderlist', [AdminController::class,'orderlist']) ;
Route::get('/updatestatus_order/{id}', [AdminController::class,'updatestatus_order']) ;
Route::post('/confirmupdatestatus_order/{id}', [AdminController::class,'confirmupdatestatus_order']) ;


