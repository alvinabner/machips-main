<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::get('/', function () {
    return redirect()->route('auth.index');
});

Route::get('index', [AuthController::class, 'index'])->name('auth.index');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('create', [AuthController::class, 'create'])->name('auth.create');
Route::post('store', [AuthController::class, 'store'])->name('auth.store');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function() {
    Route::get('profile/{id}', [AuthController::class, 'edit'])->name('auth.edit');
    Route::post('update/{id}', [AuthController::class, 'update'])->name('auth.update');
    Route::get('product-category/{id}', [AdminController::class, 'product'])->name('product.category');
    
    Route::get('category-product', [AdminController::class, 'category'])->name('category.product');
    Route::resource('dashboard', AdminController::class);
    Route::resource('chat', ChatController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('sale', SaleController::class);
    Route::post('add-cart', [SaleController::class, 'addCart'])->name('addCart');
    Route::get('pesanan', [SaleController::class, 'todoPesanan'])->name('todoPesanan');
    Route::get('pesanan-saya', [SaleController::class, 'todoPesananSaya'])->name('todoPesananSaya');
    Route::get('invoice/{id}', [SaleController::class, 'invoice'])->name('invoice');
    Route::post('ulasan', [SaleController::class, 'ulasan'])->name('ulasan');
    Route::post('buktiPembayaran', [SaleController::class, 'buktiPembayaran'])->name('buktiPembayaran');
    Route::post('job/{id}', [SaleController::class, 'job'])->name('job');
    Route::get('prodSaleDestroy/{id}', [SaleController::class, 'prodSaleDestroy'])->name('prodsale.destroy');
    
});