<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AddCategoryController;
use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\OrderController;
use App\Http\Requests\RegisterRequest;



Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

Route::view('/register','register');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/',[ProductController::class,'index']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'removecart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[OrderController::class,'myOrders']);
//Route::get('mobile',[ProductController::class,'mobile']);
//Route::get('watch',[ProductController::class,'watch']);
Route::get('detailwatch/{id}',[ProductController::class,'detailwatch']);
//Route::get('mobile',[ProductController::class,'mobile']);
//Route::get('earbud',[ProductController::class,'earbud']);
Route::get('/category/{id}',[CategoryController::class,'index']);
Route::view('/addcategory','admin/addcategory');
Route::post('/addcategory',[AddCategoryController::class,'addcategory']);
Route::get('dashboard',[AddCategoryController::class,'allcategories']);
Route::get('category/delete/{id}',[AddCategoryController::class,'delcategory']);
Route::get('category/edit/{id}',[AddCategoryController::class,'editcategory']);
Route::post('/updatecategory/{id}', [AddCategoryController::class, 'updatecategory']);
Route::get('/addproduct',[AddProductController::class,'getcategory']);
Route::post('/addproduct',[AddProductController::class,'addproduct']);
Route::get('allproduct',[AddProductController::class,'allproduct']);
Route::get('/product/edit/{id}', [AddProductController::class, 'editProduct']);
Route::post('/updateproduct/{id}', [AddProductController::class, 'updateProduct']);
Route::get('/product/delete/{id}', [AddProductController::class, 'deleteProduct']);