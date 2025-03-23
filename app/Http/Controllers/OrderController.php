<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function myOrders()
{
    if (!session()->has('user')) {
        return redirect('login');
    }    
        $userId = Session::get('user')['id'];
        $products = Order::userOrders()->get(); // Call the query scope from the Order model
        // return $products;
   return view('myorders', ['products' => $products]);
}
}
