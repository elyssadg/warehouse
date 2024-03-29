<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [ViewController::class, 'login'])->name('login');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', [ViewController::class, 'dashboard'])->name('dashboard');
    Route::resource('product-type', ProductTypeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('account', AccountController::class);

    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::resource('product-type', ProductTypeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('warehouse', WarehouseController::class);

    Route::post('warehouse/{warehouse_id}', [WarehouseController::class, 'searchItemByName'])->name('warehouse-item.search');
    Route::get('warehouse-item/{warehouse_id}/create', [WarehouseItemController::class, 'create'])->name('warehouse-item.create');
    Route::get('warehouse-item/{warehouse_item}/retreive', [WarehouseItemController::class, 'retreiveItemView'])->name('warehouse-item.retreiveView');
    Route::POST('warehouse-item/{warehouse_item}/retreive', [WarehouseItemController::class, 'retreiveItem'])->name('warehouse-item.retreive');
    Route::POST('warehouse-item/{warehouse_id}', [WarehouseItemController::class, 'store'])->name('warehouse-item.store');
    Route::resource('warehouse-item', WarehouseItemController::class)->except(['create', 'index', 'store']);
});

require __DIR__ . '/auth.php';
