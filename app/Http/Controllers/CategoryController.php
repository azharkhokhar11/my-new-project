<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index($id){
        $products = Product::where('category_id', $id)->get();
        return view('mobile',['products'=>$products]); 
    }
    //
}
