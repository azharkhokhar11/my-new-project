<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AddCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //add new category
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect('/dashboard')->with('success', 'New Category has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    //showing all categories
    public function show(Request $request)
    {
        $search = $request->input('search', '');
        $allcategories = Category::when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })
        ->paginate(3);
        return view('/admin/dashboard',['allcategories'=>$allcategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (!$category) {
            return redirect()->back()->with('warning', 'Category not found!');
        }
        return view('admin.addcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }
        $category->update([
            'name' => $request->name,
        ]);
        return redirect('/dashboard')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/dashboard')->with('warning', 'Category has been deleted successfully!');
    }
}
