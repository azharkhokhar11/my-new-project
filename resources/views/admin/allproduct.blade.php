@extends('master')
@section('content')
@if(session('success'))
    <script>
            $(document).ready(function() {
            toastr.success("{{ session('success') }}");
            });
    </script>
@endif
@if(session('warning'))
    <script>
            $(document).ready(function() {
            toastr.warning("{{ session('warning') }}");
            });
    </script>
@endif

<div class="container">
    <h2 class="text-center">All Products</h2>
    <!-- 🔎 Search Form -->
    <form action="{{ url('allproduct') }}" method="GET" class="mb-3 d-flex justify-content-center">
        <input type="text" name="search" class="form-control w-50 me-2" placeholder="Search by product name, category, or price" 
               value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

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
            @foreach($products as $allproduct)
            <tr>
                <td class="border border-dark border-2">{{ $allproduct->name }}</td>
                <td class="border border-dark border-2">{{ $allproduct->price }}</td>
                <td class="border border-dark border-2">
                    {{  optional($allproduct->category)->name ?? 'No Category' }}
                </td>
                <td class="border border-dark border-2 text-center">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url('editproduct/'.$allproduct->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('deleteproduct/'.$allproduct->id) }}" class="btn btn-danger btn-sm" 
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
    {{ $products->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
</div>
  
@endsection

<style>
    .custom-header {
        background-color: green !important;
        color: white !important;
    }
</style>