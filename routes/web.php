<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/form', [ProductController::class, 'showForm'])->name('products.form');
    Route::get('/products/form-update/{id}', [ProductController::class, 'showFormUpdate'])->name('products.form-update');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/submit', [ProductController::class, 'submitForm']);
    Route::get('/products/list', [ProductController::class, 'productList'])->name('products.list');
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sales/list', [SaleController::class, 'SaleList'])->name('sales.list');


});

require __DIR__.'/auth.php';
