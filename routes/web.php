<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use App\Models\Category;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendFrontendController::class , 'index']);
Route::get('/category',[FrontendFrontendController::class , 'category']);
Route::get('/view-category/{slug}',[FrontendFrontendController::class , 'viewCategory']);
Route::get('/category/{cate_slug}/{prod_slug}',[FrontendFrontendController::class , 'viewProduct']);

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class,'index']);

    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);

});
