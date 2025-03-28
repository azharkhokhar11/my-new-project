<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //count carts against specific user
    public static function index()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
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
    // addtocart function
    public function store(Request $request,Product $product)
    {
        if ($user = $request->session()->get('user')) {
            Cart::create([
                'user_id' => $user['id'],
                'product_id' => $product->id,
            ]);
            return redirect('/');
        }
        return redirect('/login');        
    }

    /**
     * Display the specified resource.
     */
    //show cartlist
    public function show(Request $request)
    {
        if($user = $request->session()->get('user')){
            $products = Cart::where('user_id',$user['id'])
            ->with('product')
            ->get();
            return view('cartlist',['products'=>$products]);
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete(); // Use Eloquent delete method
        return redirect('cartlist')->with('success', 'Item removed from cart.');
    }
}
