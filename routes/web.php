<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

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
//product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products{$id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products{$id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products{$id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products{$id}', [ProductController::class, 'destroy'])->name('products.destroy');

//Cateogry routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories{$id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories{$id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories{$id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories{$id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//supplier routes
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers{$id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers{$id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::get('/supplier{$id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::delete('suppliers{$id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
