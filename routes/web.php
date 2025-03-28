<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AddCategoriesController;
use App\Http\Controllers\Admin\AddProductsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartsController;

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

Route::view('/register','register');
Route::post('/login',[UsersController::class,'login']);
Route::post('/register',[UsersController::class,'register']);
Route::post('/testing',[TestingController::class,'index']);
Route::get('/',[ProductsController::class,'index']);
Route::get('detail/{product}',[ProductsController::class,'show']);
Route::post('add_to_cart/{product}',[CartsController::class,'store']);
Route::get('cartlist',[CartsController::class,'show']);
Route::get('removecart/{cart}',[CartsController::class,'destroy']);
Route::get('ordernow/{user}',[OrdersController::class,'orderNow']);
Route::post('orderplace',[OrdersController::class,'orderPlace']);
Route::get('myorders',[OrdersController::class,'index']);
Route::get('detailwatch/{id}',[ProductsController::class,'detailwatch']);
Route::get('/category/{id}',[CategoryController::class,'index']);
Route::view('/addcategory','admin/addcategory');
Route::post('/addcategory',[AddCategoriesController::class,'store']);
Route::get('dashboard',[AddCategoriesController::class,'show']);
Route::get('deletecategory/{category}',[AddCategoriesController::class,'destroy']);
Route::get('editcategory/{category}',[AddCategoriesController::class,'edit']);
Route::post('/updatecategory/{category}', [AddCategoriesController::class, 'update']);
Route::get('/addproduct',[AddProductsController::class,'index']);
Route::post('/addproduct',[AddProductsController::class,'store']);
Route::get('allproduct',[AddProductsController::class,'show']);
Route::get('/editproduct/{product}', [AddProductsController::class, 'edit']);
Route::post('/updateproduct/{product}', [AddProductsController::class, 'update']);
Route::get('/deleteproduct/{product}', [AddProductsController::class, 'destroy']);