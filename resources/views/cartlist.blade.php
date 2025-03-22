@extends('master')
@section('content')
<div class="custom-product1">
    <div class="col-sm-10">
<div class="trending-wrapper1">
    <h3>Result for Products</h3>
    <a class="btn btn-success mt-2 mb-4" href="ordernow">Order Now</a>
    @foreach($products as $item)
    <div class="row cart-list-divider">
        <div class="col-sm-3">
    <a href="detail/{{$item->id}}">
    <img class="trending-image" src="{{$item->gallery}}">
    </a>
</div>
<div class="col-sm-4">   
    <div class="">
        <h4>{{ $item->name }}</h4>
        <h6>{{ $item->description }}</h6>
        <p>Price: {{ $item->price }}</p>
      </div>
</div>
<div class="col-sm-3">
    <button class="btn btn-warning"><a style="text-decoration:none; color:white;" href="/removecart/{{$item->cart_id}}">Remove to Cart</a></button>
</div>
    </div>
    @endforeach
</div>
<a class="btn btn-success m-2" href="ordernow">Order Now</a>
</div>
</div>
@endsection