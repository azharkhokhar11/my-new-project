@extends('master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 p-3">
                <div class="row g-0 d-flex align-items-center">
                    <!-- Product Image Section -->
                    <div class="col-md-5">
                        <img src="{{ asset($products->gallery) }}" class="img-fluid rounded-start" 
                             alt="Product Image" style="max-height: 350px; object-fit: contain;">
                    </div>
                    
                    <!-- Product Details Section -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title">{{ $products->name }}</h3>
                            <p class="card-text"><strong>Price:</strong> {{ $products->price }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $products->category_name ?? 'No Category' }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $products->description }}</p>
                            <p class="card-text"><strong>Availability:</strong> 
                                @if($products->stock_count > 0)
                                    <span class="text-success">In Stock</span>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            </p>
                            <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <button class="btn btn-primary me-2"   @if($products->stock_count <= 0) disabled @endif>Add to Cart</button>
                                <button class="btn btn-success"   @if($products->stock_count <= 0) disabled @endif>Buy Now</button>
                            </form>        
                        </div>
                    </div>                    
                </div>                
            </div>  
        </div>
    </div>        
</div>
@endsection
