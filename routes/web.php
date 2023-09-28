<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\carpentercontroller;
use App\Http\Controllers\maincontroller;
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

Route::get('/',[maincontroller::class,'index']);
Route::get('/login',[maincontroller::class,'login']);
Route::get('/signup',[maincontroller::class,'signup']);
Route::post('/userlogin',[maincontroller::class,'userlogin']);
Route::post('/register_user',[maincontroller::class,'register_user']);
Route::get('/about',[maincontroller::class,'about']);
Route::get('/client_ads',[maincontroller::class,'client_ads']);
Route::get('/logout',[maincontroller::class,'logout']);
Route::get('/view_responses/{id}',[maincontroller::class,'view_responses']);
Route::post('/hire_user',[maincontroller::class,'hire_user']);
Route::get('/client_orders',[maincontroller::class,'client_orders']);
Route::get('/contact',[maincontroller::class,'contact']);
Route::post('/contact_us',[maincontroller::class,'contact_us']);




//admincontroller
Route::get('/admin',[admincontroller::class,'admin_index']);
Route::get('/customers',[admincontroller::class,'manage_customers']);
Route::get('/wholesallers',[admincontroller::class,'manage_wholesalers']);
Route::get('/carpenters',[admincontroller::class,'manage_carpenters']);
Route::get('/block/{id}',[admincontroller::class,'block']);
Route::get('/unblock/{id}',[admincontroller::class,'unblock']);
Route::get('/approve_ad/{id}',[admincontroller::class,'approve_ad']);
Route::get('/cancel_ad/{id}',[admincontroller::class,'cancel_ad']);
Route::get('/profile',[admincontroller::class,'profile']);
Route::get('/manage_ads',[admincontroller::class,'manage_ads']);
Route::post('/update_profile',[admincontroller::class,'update_profile']);


//carpenter
Route::get('/carpenter_index',[carpentercontroller::class,'carpenter_index']);
Route::get('/carpenter_ads',[carpentercontroller::class,'carpenter_ads']);
Route::get('/carpenter_category',[carpentercontroller::class,'carpenter_category']);
Route::get('/carpenter_products/{id}',[carpentercontroller::class,'carpenter_products']);
Route::post('/add_ad',[carpentercontroller::class,'add_ad']);
Route::post('/add_category',[carpentercontroller::class,'add_category']);
Route::get('/hide_ad/{id}',[carpentercontroller::class,'hide_ad']);
Route::get('/show_ad/{id}',[carpentercontroller::class,'show_ad']);
Route::get('/del_ad/{id}',[carpentercontroller::class,'del_ad']);
Route::get('/del_cate/{id}',[carpentercontroller::class,'del_cate']);
Route::post('/update_ad',[carpentercontroller::class,'update_ad']);
Route::post('/add_product',[carpentercontroller::class,'add_product']);
Route::get('/csingle_ad/{id}',[carpentercontroller::class,'csingle_ad']);
Route::get('/cview_responses/{id}',[carpentercontroller::class,'cview_responses']);
Route::get('/cmplt_order/{id}',[carpentercontroller::class,'cmplt_order']);
Route::post('bid_ad',[carpentercontroller::class,'bid_ad']);
Route::get('orders',[carpentercontroller::class,'orders']);


