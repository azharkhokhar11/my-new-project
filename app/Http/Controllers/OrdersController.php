<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // showing all orders
    public function index()
    {
        if (!session()->has('user')) 
        {
            return redirect('login');
        }    
        $products = Order::userOrders()->get(); // Call the query scope from the Order model
        return view('myorders', ['products' => $products]);
    }
    //getting all carts item & showing total price of all items against specific user
    public function orderNow(User $user){
        if(session()->has('user')){
        $total = Cart::where('user_id', $user->id)
            ->with('product') // Load the related product
            ->get()
            ->sum(fn ($cart) => $cart->product->price);
            return view('ordernow',['total'=>$total]);
        }else{
            return redirect('login');
        }
     }
     //saving all cart items to order table
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
        return redirect('/')->with('success', 'Order placed successfully!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
