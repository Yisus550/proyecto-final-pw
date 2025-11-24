<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'login')->name('login');
Route::post('/login', [EmployeeController::class, 'login'])->name('login');
Route::get('/logout', [EmployeeController::class, 'logout'])->name('logout');

Route::middleware('auth:employee')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('categories', CategoryController::class)->parameters(['categories' => 'id']);

    Route::resource('products', ProductController::class)->parameters(['parameters' => 'id']);

    Route::resource('inventories', InventoryController::class)->parameters(['inventories' => 'id']);

    Route::resource('employees', EmployeeController::class)->parameters(['employees' => 'id']);

    Route::resource('customers', CustomerController::class)->parameters(['customers' => 'id']);

    Route::resource('orders', OrderController::class)->parameters(['orders' => 'id']);

    Route::resource('order-details', OrderDetailsController::class)->parameters(['order-details' => 'id']);
});
