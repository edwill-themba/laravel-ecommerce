<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ThankYouController;

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
// returns  register view
Route::get('/register_view',[AuthController::class,'show_register'])->name('register.view');
// returns login view
Route::get('/login_view',[AuthController::class,'show_login'])->name('login.view');
// returns forgot password view
Route::get('/forgot_password',[AuthController::class,'show_forgot_password'])->name('forgot_password.view');
// check the existance of the user before changing password
Route::post('/forgot_password',[AuthController::class,'forgot_password'])->name('forgot_password.user');
// update the user password
Route::patch('/update_password',[AuthController::class,'update_user_password'])->name('update_password.user');
// register the user
Route::post('/register',[AuthController::class,'register'])->name('register.user');
// logs the user in
Route::post('/login',[AuthController::class,'login'])->name('login.user');
// display all the products
Route::get('/products',[ProductController::class,'index'])->name('products.index');
// shows a single product
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
// returns all item on the shopping cart
Route::get('/carts',[CartController::class,'index'])->name('cart.index');
// add items to cart
Route::post('/cart',[CartController::class,'store'])->name('cart.store');
// remove item on the cart
Route::delete('/cart/{id}',[CartController::class,'destroy'])->name('cart.destroy');
// remove all items on the cart
Route::delete('/cart_remove/{id}',[CartController::class,'destroyAll'])->name('cart.destroyAll');
// returns the final payment blade
Route::get('/checkout',[CheckOutController::class,'index'])->name('checkout.index');
// process payment
Route::post('/checkout',[CheckOutController::class,'store'])->name('checkout.store');
// returns the thank you page when user finishes payment
Route::get('/thank_you',[ThankYouController::class,'index'])->name('thank_you.index');
// Protected routes 
Route::middleware('auth')->group(function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout.user'); 
    //return the creates product for the administrator
    Route::get('/product',[ProductController::class,'create'])->name('product.create');
    // stores the product
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    // returns admin product update screen
    Route::get('/admin/product/{id}',[ProductController::class,'edit'])->name('product.edit');
    // update the product
    Route::patch('/admin/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    // delete specific product
    Route::delete('/admin/product/{id}/delete',[ProductController::class,'destroy'])->name('product.destroy');
});
