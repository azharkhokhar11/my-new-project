@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        <img class="detail-img mt-5" src="{{$products->gallery}}" alt="">
        </div>
        <div class="col-sm-6">
            <div class="mb-4"><a style="text-decoration:none; background-color:beige; padding:2px;"  href="/">Go Back</a></div>        
        <div class="border border-2 border-dark rounded bg-info mb-4 ps-2">
        <h2 >{{$products->name}}</h2>       
        <p><b>Details: </b>{{$products->description}}</p>
        <p><b>Category: </b>{{$products->category_name}}</p>
        <p><b>Price: </b>{{$products->price}}</p>
        <br> <br>
        </div>
        <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$products->id}}">
        <button class="btn btn-primary">Add to Cart</button>
        </form>        
        <br>
        <button class="btn btn-success">Buy Now</button>
        <br> <br>
        </div>
    </div>        
</div>
@endsection