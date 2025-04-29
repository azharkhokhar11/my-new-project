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
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" 
                                   value="{{ isset($product) ? $product->name : '' }}" 
                                   placeholder="Enter Product Name">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Price -->
                        <div class="col-md-6">
                            <label class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="price" 
                                   value="{{ isset($product) ? $product->price : '' }}" 
                                   placeholder="Enter Price">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Category (Dropdown) -->
                        <div class="col-md-6">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ isset($product) && $product->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Description -->
                        <div class="col-md-6">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" 
                                      placeholder="Enter Product Description">{{ isset($product) ? $product->description : '' }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image URL (Gallery) -->
                        <div class="col-md-6">
                            <label class="form-label">Image URL <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="gallery" 
                                   value="{{ isset($product) ? $product->gallery : '' }}" 
                                   placeholder="Enter Image URL">
                            @error('gallery')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Stock Count <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="stock_count" 
                                   value="{{ isset($product) ? $product->stock_count : '' }}" 
                                   placeholder="Enter Stock Count">
                            @error('stock_count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Live Image Preview -->
                        <div class="col-md-6 text-center">
                            @if(isset($product) && $product->gallery)
                                <img src="{{ $product->gallery }}" alt="No image available" class="img-thumbnail preview-img">
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
