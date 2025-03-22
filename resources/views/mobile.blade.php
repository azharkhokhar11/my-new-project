@extends('master')
@section('content')
<!-- <div class="container-fluid">

<div class="trending-wrapper">
    <h3 text-center my-4>All Products</h3>
    @foreach($products as $item)
    <div class="mt-4">
    <div class="trending-item">
    <a href="detail/{{$item['id']}}">
    <img class="trending-image" src="{{$item['gallery']}}">
    <div class="">
        <h6>{{ $item['name'] }}</h6>
        <p>Rs. {{$item['price']}}</p>
      </div>
    </a>
    </div>
</div>
    @endforeach
</div>
</div> -->

<div class="container">
    <div class="trending-wrapper">
        <h3 class="text-center my-4">All Products</h3>
        <div class="row">
            @foreach($products as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3"> <!-- Responsive column classes -->
                <div class="card trending-item p-2 text-center">
                    <a href="../detail/{{$item['id']}}" class="text-decoration-none text-dark">
                        <img class="trending-image img-fluid mb-2" src="{{$item['gallery']}}" alt="{{$item['name']}}">
                        <h6 class="mt-0">{{ $item['name'] }}</h6>
                        <p class="text-muted">Rs. {{$item['price']}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection