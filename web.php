<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration;

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
    return view('welcome');
});

Route::get('/registration',[Registration::class,'registration']);
Route::get('/login',[Registration::class,'login']);
Route::get('/registrationto',[Registration::class,'registrationto']);
Route::view('/whatwedo',[Registration::class,'whatwedo']);
Route::post('/register',[Registration::class,'registeruser'])->name('registeruser');
Route::post('/loginuser',[Registration::class,'loginuser'])->name('loginuser');
Route::get('/home',[Registration::class,'home'])->name('home');
Route::post('/signout',[Registration::class,'signOut'])->name('signOut');
Route::post('/registerjoin',[Registration::class,'registerjoin'])->name('registerjoin');
Route::view('/home2',[Registration::class,'home2'])->name('home2');
Route::view('/SDG3',[Registration::class,'SDG3'])->name('SDG3');
Route::view('/SDG8',[Registration::class,'SDG8'])->name('SDG8');
Route::view('/SDG12',[Registration::class,'SDG12'])->name('SDG12');
Route::view('/SDG13',[Registration::class,'SDG13'])->name('SDG13');
Route::view('/about',[Registration::class,'about'])->name('about');
Route::view('/impact',[Registration::class,'impact'])->name('impact');
Route::post('/store',[Registration::class,'store'])->name('store');
Route::view('/testimony',[Registration::class,'testimony'])->name('testimony');
Route::post('/testimonial',[Registration::class,'testimonial'])->name('testimonial');
Route::view('/thankyou',[Registration::class,'thankyou'])->name('thankyou');
Route::get('/profileUpdate',[Registration::class,'profileUpdate'])->name('profileUpdate');
Route::view('/profile',[Registration::class,'profile']);
