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

Route::get('/', function () {
    return view('admin.share.master');
});
// Route::get('/', function () {
//     return view('admin.page.product.create');
// });
Route::group(['prefix' => '/admin'], function(){
    Route::get('/create-category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('Category.Create');
    Route::post('/create-category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('Category.post');
    Route::get('/list-category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('Category.list');
    Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
});

