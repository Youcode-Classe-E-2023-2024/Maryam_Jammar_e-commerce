<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::post('/create', [ProductController::class, 'store']);

Route::get('/update', [ProductController::class, 'edit']);

Route::post('/update/{id}', [ProductController::class, 'update']);

Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);

Route::get('/description/{id}', [ProductController::class, 'show']);


Route::get('/categories_product', [ProductController::class, 'showProductsByCategory'])->name('categories_product');
