@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
<div class="trending-wrapper1">
    <h3>My Orders</h3>
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
        <p>Delivery Status: {{ $item->status }}</p>
        <p>Address: {{ $item->address }}</p>
        <p>Payment Method: {{ $item->payment_method }}</p>
        <p>Payment Status: {{ $item->payment_status }}</p>
        
      </div>
</div>
    </div>
    @endforeach
</div>
</div>
</div>
@endsection