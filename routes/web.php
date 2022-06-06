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

// Route::get('/', function () {
//     return view('client.page.shopCate');
// });
// Route::get('/', function () {
//     return view('admin.register');
// });

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewlogin']);
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'postlogin'])->name('login.post');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout']);

Route::group(['prefix' => '/admin' ,'middleware' => 'checkAdmin'], function(){
    Route::get('/create-category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('Category.Create');
    Route::post('/create-category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('Category.post');
    Route::get('/list-category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('Category.list');
    Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('/category/delete_category/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);
    Route::get('/create-product', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.Create');
    Route::post('/create-product', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.post');
    Route::get('/list-product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
    Route::get('/product/delete_product/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
    Route::get('/register', [\App\Http\Controllers\AdminController::class, 'view']);
    Route::post('/register', [\App\Http\Controllers\AdminController::class, 'post']);
});

Route::get('/client', [\App\Http\Controllers\ClientController::class, 'indexclient']);
Route::get('/{id}', [\App\Http\Controllers\ClientController::class, 'shopCate']);
Route::post('/client/register', [\App\Http\Controllers\ClientController::class, 'register']);
Route::post('/client/login', [\App\Http\Controllers\ClientController::class, 'Login']);
Route::get('/client/logout', [\App\Http\Controllers\ClientController::class, 'logout']);
Route::group(['prefix' => '/' ,'middleware' => 'checkUser'], function(){


});
