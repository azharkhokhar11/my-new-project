@extends('master')
@section('content')
<!-- @if (session()->has('key'))
    <div class="alert alert-info">
        Stored Session Value: {{ session('key') }}
    </div>
@endif -->
@session('success')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    success
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession
<!-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif -->

<div class="container">
    <h2 class="text-center">All Products</h2>
    <div class="table-responsive d-flex justify-content-center"> <!-- Center the table -->
    <table class="table table-bordered table-primary border-dark border-2" style="width: 70%;">  
        <thead>
            <tr>
                <th class="border border-dark border-2 custom-header">Product Name</th>
                <th class="border border-dark border-2 custom-header">Price</th>
                <th class="border border-dark border-2 custom-header">Category</th>
                <th class="border border-dark border-2 text-center custom-header">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $allproduct)
            <tr>
                <td class="border border-dark border-2">{{ $allproduct->name }}</td>
                <td class="border border-dark border-2">{{ $allproduct->price }}</td>
                <td class="border border-dark border-2">
                    {{  optional($allproduct->categoryName)->name ?? 'No Category' }}
                </td>
                <td class="border border-dark border-2 text-center">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url('product/edit/'.$allproduct->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('product/delete/'.$allproduct->id) }}" class="btn btn-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                       </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-3">
    {{ $product->links('pagination::bootstrap-5') }}
</div>
  
@endsection

<style>
    .custom-header {
        background-color: green !important;
        color: white !important;
    }
</style>