<?php

use Illuminate\Support\Facades\Route;
Route::get('data-productcategory',[App\Http\Controllers\ProductCategoryController::class,'dataTable'])->name('productcategory.data');Route::get('data-product',[App\Http\Controllers\ProductController::class,'dataTable'])->name('product.data');Route::get('data-productfile',[App\Http\Controllers\ProductFileController::class,'dataTable'])->name('productfile.data');Route::get('data-customer',[App\Http\Controllers\CustomerController::class,'dataTable'])->name('customer.data');Route::get('data-cart',[App\Http\Controllers\CartController::class,'dataTable'])->name('cart.data');Route::get('data-order',[App\Http\Controllers\OrderController::class,'dataTable'])->name('order.data');Route::get('data-transaction',[App\Http\Controllers\TransactionController::class,'dataTable'])->name('transaction.data');Route::get('data-transactiondetail',[App\Http\Controllers\TransactionDetailController::class,'dataTable'])->name('transactiondetail.data');Route::get('data-setting',[App\Http\Controllers\SettingController::class,'dataTable'])->name('setting.data');Route::get('data-user',[App\Http\Controllers\UserController::class,'dataTable'])->name('user.data');