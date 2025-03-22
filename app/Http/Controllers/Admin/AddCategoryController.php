<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AddCategoryController extends Controller
{
    function addcategory(Request $req){
       //return view('/admin/addcategory',$req->name);
       $category = new Category;
       $category->name=$req->category;
       $category->save();
       return redirect('/dashboard');
    }

    function allcategories(){
        $allcat = Category::paginate(3);
        return view('/admin/dashboard',['allcat'=>$allcat]);
    }

    function delcategory($id){
        Category::destroy($id);
        return redirect('/dashboard');
    }

    function editcategory($id){
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }
        return view('/admin/addcategory',['category'=>$category]);
    }

    function updatecategory(Request $req, $id){
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }
        $category->name = $req->category;
        $category->save();
        return redirect('/dashboard')->with('success', 'Category updated successfully!');
    }
   
    //
}
