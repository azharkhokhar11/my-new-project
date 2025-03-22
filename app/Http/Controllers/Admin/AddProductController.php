<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AddProductController extends Controller
{

    function getcategory(){
    $categories = Category::all(); // Fetch all categories
    return view('admin.addproduct',['categories'=>$categories]);
    }

    function addproduct(Request $req){
        $product = new Product;
        $product->name=$req->name;
        $product->price=$req->price;
        $product->category=$req->category;
        $product->description=$req->description;
        $product->gallery=$req->gallery;
        $product->save();
        return redirect('/allproduct');
     }

    function allproduct(){
        $allproduct = Product::with('categoryName')->paginate(7);
        return view('/admin/allproduct',['product'=>$allproduct]);
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id); // Find product by ID
        $categories = Category::all(); // Fetch all categories
        return view('admin.addproduct', ['product' => $product, 'categories' => $categories]);
    }

    // Update Product
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
            'gallery' => 'required|string',
        ]);

        // Update product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category, // Ensure category ID is saved
            'description' => $request->description,
            'gallery' => $request->gallery,
        ]);
        Session::start();
        session::put('key','value');
        return redirect('/allproduct')->with('success', 'Product updated successfully!');
    }

    // Delete Product
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect('/allproduct')->with('success', 'Product deleted successfully!');
    }

    //
}
