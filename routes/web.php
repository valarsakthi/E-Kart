<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categorycontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', [categorycontroller::class,'viewCategory'])->middleware('is_admin');

Route::get('/product', [ProductController::class,'viewProduct'])->middleware('is_admin');

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//get category
Route::post('/category',[categorycontroller::class,'getCategory'])->middleware('is_admin');

//list category
Route::get('/categorylist',[categorycontroller::class,'showCategory'])->middleware('is_admin');

//edit category
Route::get('/cat_edit/{id}',[categorycontroller::class,'editCategory'])->middleware('is_admin');

//update category
Route::post('/cat_update',[categorycontroller::class,'updateCategory'])->middleware('is_admin');

//delete category
Route::get('/cat_delete/{id}',[categorycontroller::class,'deleteCategory'])->middleware('is_admin');

//category dropdown in product create
// Route::get('/product', [categorycontroller::class,'dropdownCategory']);

//Get product Details
Route::post('/product',[ProductController::class,'getProduct'])->middleware('is_admin');

//list product details
Route::get('/productlist',[ProductController::class,'showProducts'])->middleware('is_admin');

//edit product
Route::get('/prod_edit/{id}',[ProductController::class,'editProduct'])->middleware('is_admin');

//update product
Route::post('/prod_update',[ProductController::class,'updateProduct'])->middleware('is_admin');

//delete product
Route::get('/prod_delete/{id}',[ProductController::class,'deleteProduct'])->middleware('is_admin');

//Load categories
// Route::get('/home',[categorycontroller::class,'menuCategory']);

//list product based on category
Route::get('/{id}',[ProductController::class,'listProducts']);

//product Detail page
Route::get('/details/{id}',[ProductController::class,'productDetail']);

//enquiry page
Route::get('/enquiry/{id}',[ProductController::class,'enquiryProd']);

//Send Email Page
Route::post('/enquiry/sendmail',[ProductController::class,'send']);

