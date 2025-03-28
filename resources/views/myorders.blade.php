@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
<div class="trending-wrapper1">
    <h3>My Orders</h3>
    @if($products->isEmpty()) 
                <p class="alert alert-warning">You have no orders yet.</p>
    @else
    @foreach($products as $order)
            <div class="row cart-list-divider">
                <div class="col-sm-2 ">
                    <a href="detail/{{$order->product->id ?? 'null'}}">
                        <img class="trending-image" src="{{ $order->product->gallery ?? 'default.jpg' }}" alt="Product Image">
                    </a>
                </div>
                <div class="col-sm-5">   
                        <h4 class="mb-1">{{ $order->product->name ?? 'Product Not Found' }}</h4>
                        <p >{{ $order->product->description ?? '' }}</p>   
                        <p class="mb-1"><b>Price:</b> {{ $order->product->price ?? 'N/A' }}</p>
                        <p class="mb-1"><b>Delivery Status:</b> {{ $order->status }}</p>
                        <p class="mb-1"><b>Address:</b> {{ $order->address }}</p>
                        <p class="mb-1"><b>Payment Method:</b> {{ $order->payment_method }}</p>
                        <p class="mb-1"><b>Payment Status:</b> {{ $order->payment_status }}</p>
                    
                </div>
            </div>
            @endforeach
            @endif   
</div>
</div>
</div>
@endsection