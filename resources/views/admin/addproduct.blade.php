@extends('master')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header text-center bg-primary text-white fw-bold">
                    {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
                </div>
                <div class="card-body">
                    
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Product Form -->
                    <form action="{{ isset($product) ? url('/updateproduct/'.$product->id) : url('/addproduct') }}" 
                          method="POST" class="row g-3">
                        @csrf

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" required class="form-control" name="name" 
                                   value="{{ isset($product) ? $product->name : '' }}" 
                                   placeholder="Enter Product Name">
                        </div>

                        <!-- Product Price -->
                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="number" required class="form-control" name="price" 
                                   value="{{ isset($product) ? $product->price : '' }}" 
                                   placeholder="Enter Price">
                        </div>

                        <!-- Product Category (Dropdown) -->
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category" required class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ isset($product) && $product->category == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Description -->
                        <div class="col-md-6">
                            <label class="form-label">Description</label>
                            <textarea required class="form-control" name="description" 
                                      placeholder="Enter Product Description">{{ isset($product) ? $product->description : '' }}</textarea>
                        </div>

                        <!-- Image URL (Gallery) -->
                        <div class="col-md-6">
                            <label class="form-label">Image URL</label>
                            <input type="text" class="form-control" required name="gallery" 
                                   value="{{ isset($product) ? $product->gallery : '' }}" 
                                   placeholder="Enter Image URL">
                        </div>

                        <!-- Live Image Preview -->
                        <div class="col-md-6 text-center">
                            @if(isset($product) && $product->gallery)
                                <img src="{{ $product->gallery }}" class="img-thumbnail preview-img">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success btn-lg custom-btn">
                                {{ isset($product) ? 'Update Product' : 'Add Product' }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
/* Card Design */
.card {
    border-radius: 10px;
    overflow: hidden;
}

/* Form Styling */
.form-label {
    font-weight: bold;
    color: #333;
}

/* Input Fields */
.form-control, .form-select {
    border-radius: 8px;
}

/* Image Preview */
.preview-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 10px;
    border: 2px solid #ddd;
}

/* Submit Button */
.custom-btn {
    padding: 10px 20px;
    font-size: 18px;
    transition: 0.3s;
}

.custom-btn:hover {
    background-color: #28a745;
    color: white;
}
</style>
