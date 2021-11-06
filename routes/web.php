<?php

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () {

    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::post('/file-upload', [App\Http\Controllers\Admin\FileUploadController::class, 'upload'])->name('file.upload');
    Route::resource('supplier', App\Http\Controllers\Admin\SupplierController::class);
    Route::resource('customer', App\Http\Controllers\Admin\CostumerController::class);
    Route::resource('purchase', App\Http\Controllers\Admin\PurchaseController::class);
    Route::resource('sale', App\Http\Controllers\Admin\SalesController::class);
});
