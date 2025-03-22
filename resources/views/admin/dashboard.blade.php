@extends('master')
@section('content')
<div class="container">
    <h2 class="text-center">All Categories</h2>
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
            @foreach($allcat as $allcategory)
            <tr>
                <td class="border border-dark border-2">{{ $allcategory->id }}</td>
                <td class="border border-dark border-2">{{ $allcategory->name }}</td>
                <td class="border border-dark border-2 text-center">
                    <a href="{{ url('category/edit/'.$allcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('category/delete/'.$allcategory->id) }}" class="btn btn-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
    {!! $allcat->links('pagination::bootstrap-5') !!}
</div>
@endsection

<style>
    .custom-header {
        background-color: green !important;
        color: white !important;
    }
</style>