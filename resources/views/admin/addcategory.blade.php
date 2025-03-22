@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-12">
<div class="trending-wrapper1 text-center">
    <h3>{{ isset($category) ? 'Edit Category' : 'Add New Category' }}</h3>
    <div class="">
    <form class="row g-3 mt-2 justify-content-center" action="{{isset($category) ? url('/updatecategory/'.$category->id) : url('/addcategory')}}" method="POST">
    @csrf
  <div class="col-sm-3">
    <input type="text" required class="form-control" name="category" value="{{ isset($category) ? $category->name : '' }}" placeholder="Add Category">
  </div>
  <div class="col-sm-2">
    <button type="submit" class="btn btn-primary mb-3 w-100">{{ isset($category) ? 'Update' : 'Add' }}</button>
  </div>
</form>
    </div>
   </div>
</div>
</div>
@endsection