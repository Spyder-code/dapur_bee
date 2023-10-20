<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[PageController::class,'home'])->name('page.home');
Route::get('/product/{slug}',[PageController::class,'productDetail'])->name('page.product.detail');
Route::get('/invoice',[PageController::class,'invoice'])->name('page.invoice');
Route::get('/shop',[PageController::class,'shop'])->name('page.shop');
Route::get('/instagram',[PageController::class,'instagram'])->name('page.instagram');
Route::get('/contact',[PageController::class,'contact'])->name('page.contact');
Route::get('/whatsapp/{product}/{cart?}',[PageController::class,'whatsapp'])->name('page.whatsapp');
Route::put('/user/{user}',[PageController::class,'updateUser'])->name('page.user.update');
Route::post('/add-cart',[CartController::class,'add'])->name('cart.add');

Route::resource('customer',App\Http\Controllers\CustomerController::class);
Route::resource('cart',App\Http\Controllers\CartController::class)->only(['store','destroy']);
Route::resource('order',App\Http\Controllers\OrderController::class)->only('store');

Route::middleware(['auth','customer'])->group(function(){
    Route::get('/carts',[PageController::class,'cart'])->name('page.carts');
    Route::get('/checkout',[PageController::class,'checkout'])->name('page.checkout');
    Route::get('/profile',[PageController::class,'profile'])->name('page.profile');
    Route::get('/pesanan',[PageController::class,'pesanan'])->name('page.pesanan');
    Route::get('/orders',[PageController::class,'order'])->name('page.order');
    Route::get('/pay',[PaymentController::class,'pay'])->name('payment.pay');
    Route::post('/reset-token/{transaction}',[PaymentController::class,'reset_token'])->name('payment.reset_token');
});
Route::post('transaction',[TransactionController::class,'store'])->name('transaction.store');
Route::put('transaction/{transaction}',[TransactionController::class,'update'])->name('transaction.update');

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::resource('order',App\Http\Controllers\OrderController::class)->except('store');
    Route::resource('cart',App\Http\Controllers\CartController::class)->except(['store','destroy']);
    Route::resource('product-category',App\Http\Controllers\ProductCategoryController::class);
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::resource('product-file',App\Http\Controllers\ProductFileController::class);
    Route::resource('transaction',App\Http\Controllers\TransactionController::class)->except(['store','update']);
    Route::resource('transactiondetail',App\Http\Controllers\TransactionDetailController::class);
    Route::resource('setting',App\Http\Controllers\SettingController::class);
    Route::resource('user',App\Http\Controllers\UserController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',function(){
    return redirect()->route('login');
});
