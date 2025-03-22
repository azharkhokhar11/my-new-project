@extends('master')
@section('content')
@if(session('error'))
<script>
            $(document).ready(function() {
                toastr.error("{{ session('error') }}");
            });
        </script>
    @endif

    <!-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-sm-4">
        <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">User Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name')}}" placeholder="Enter User Name">            
            @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail" value="{{ old('email')}}" placeholder="Enter Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" id="exampleInputPassword1">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>  
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="exampleInputPassword">
            @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>

@endsection
