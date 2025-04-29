@extends('master')
@section('content')
@if(session('success'))
<script>
            $(document).ready(function() {
                toastr.success("{{ session('success') }}");
            });
        </script>
    @endif
<div class="custom-product1">
    <div class="col-sm-10">
<div class="trending-wrapper1">
    <h3>Result for Products</h3>    
    @if($products->isEmpty())
        <a class="btn btn-success mt-2 mb-4 disabled" >Order Now</a> 
        <p class="alert alert-warning">Your cart list is empty.</p>
    @else
    <a class="btn btn-success mt-2 mb-4"  href="ordernow/{{session('user.id')}}">Order Now</a>
    @foreach($products as $item)
    <div class="row cart-list-divider">
        <div class="col-sm-3">
    <a href="detail/{{$item->product->id}}">
    <img class="trending-image" src="{{$item->product->gallery}}">
    </a>
</div>
<div class="col-sm-4">   
    <div class="">
        <h4>{{ $item->product->name }}</h4>
        <h6>{{ $item->product->description }}</h6>
        <p>Price: {{ $item->product->price }}</p>
      </div>
</div>
<div class="col-sm-3">
    <button class="btn btn-warning"><a style="text-decoration:none; color:white;" href="/removecart/{{$item->id}}">Remove to Cart</a></button>
</div>
    </div>
    @endforeach
    @endif
</div>
    @if($products->isEmpty())
        <a class="btn btn-success m-2 disabled" >Order Now</a> 
    @else
        <a class="btn btn-success m-2" href="ordernow/{{session('user.id')}}">Order Now</a>
    @endif
</div>
</div>
@endsection