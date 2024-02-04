<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/', [ProductController::class, 'indexUser'])->name('welcome');

Route::get('/description/{id}', [ProductController::class, 'show']);

Route::get('/categories_product', [ProductController::class, 'showProductsByCategory'])->name('categories_product');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::post('/create', [ProductController::class, 'store']);

    Route::get('/update', [ProductController::class, 'edit']);

    Route::post('/update/{id}', [ProductController::class, 'update']);

    Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);




});

require __DIR__.'/auth.php';
