<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/register_view',[AuthController::class,'show_register'])->name('register.view');

Route::get('/login_view',[AuthController::class,'show_login'])->name('login.view');

Route::get('/forgot_password',[AuthController::class,'show_forgot_password'])->name('forgot_password.view');

Route::post('/forgot_password',[AuthController::class,'forgot_password'])->name('forgot_password.user');

Route::patch('/update_password',[AuthController::class,'update_user_password'])->name('update_password.user');

Route::post('/register',[AuthController::class,'register'])->name('register.user');

Route::post('/login',[AuthController::class,'login'])->name('login.user');

// Protected routes 
Route::middleware('auth')->group(function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout.user'); 
});
