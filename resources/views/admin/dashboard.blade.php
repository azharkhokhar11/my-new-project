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
    <h2 class="text-center">All Categories</h2>
     <!-- Search Form -->
     <form action="{{ url('dashboard') }}" method="GET" class="mb-3 d-flex justify-content-center">
        <input type="text" name="search" class="form-control w-50 me-2" 
               placeholder="Search by category name" 
               value="{{ request('search') }}"> <!-- ✅ Keeps search value after submitting -->
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="table-responsive d-flex justify-content-center"> <!-- Center the table -->
    <table class="table table-bordered table-primary border-dark border-2" style="width: 60%;">  
        <thead>
            <tr>
                <th class="border border-dark border-2 custom-header">ID</th>
                <th class="border border-dark border-2 custom-header">Category Name</th>
                <th class="border border-dark border-2 text-center custom-header">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allcategories as $allcategory)
            <tr>
                <td class="border border-dark border-2">{{ $allcategory->id }}</td>
                <td class="border border-dark border-2">{{ $allcategory->name }}</td>
                <td class="border border-dark border-2 text-center">
                    <a href="{{ url('editcategory/'.$allcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('deletecategory/'.$allcategory->id) }}" class="btn btn-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
    {!! $allcategories->appends(['search' => request('search')])->links('pagination::bootstrap-5') !!}
</div>
@endsection

<style>
    .custom-header {
        background-color: green !important;
        color: white !important;
    }
</style>