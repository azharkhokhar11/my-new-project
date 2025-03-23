<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(Request $request){
       $data = Product::all();
        return view('product',['products'=>$data]);
    }
    
    public function show(Product $product){ 
        
        $product = Product::with('category')->get();
        
        return view('detail',['product'=>$product]);
    }
    
    public function addToCart(Request $request){
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        }else{
            return redirect('/login');
        }
     }
     public static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
     }
     public function cartList(){
        if(session()->has('user')){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }else{
        return redirect('login');
    }
     }    
     public function removecart($id){
        Cart::destroy($id);
        return redirect('cartlist');
     }
     public function orderNow(){
        if(session()->has('user')){
            $userId = Session::get('user')['id'];
           $total = $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
            return view('ordernow',['total'=>$total]);
        }else{
            return redirect('login');
        }
     }
     public function orderPlace(Request $request){
        $userId = Session::get('user')['id'];
        $allcart = Cart::where('user_id',$userId)->get();
        foreach($allcart as $cart)
        {
            $order = new order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$request->payment;
            $order->payment_status="pending";
            $order->address=$request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $request->input();
        return redirect('/');
     }

}
