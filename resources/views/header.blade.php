<?php
use App\Http\Controllers\CartsController;
$total = 0;
if(Session::has('user')){
  $total = CartsController::index();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">E-Comm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/myorders">Orders</a>
        </li>
        @foreach(App\Models\Category::all() as $cat)
        <li class="nav-item">
          <a class="nav-link" href="/category/{{$cat->id}}">{{$cat->name}}</a>
        </li>
        @endforeach
       <li class="nav-item">
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Admin Panel
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
  <li><a class="dropdown-item" href="/allproduct">All Products</a></li>
    <li><a class="dropdown-item" href="/dashboard">All Categories</a></li>
    <li><a class="dropdown-item" href="/addcategory">Add Category</a></li>
    <li><a class="dropdown-item" href="/addproduct">Add Product</a></li>
  </ul>
</div>
</li>
      </ul>
      <!-- Search bar close to Orders link -->
      <form class="d-flex ms-3">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">     
        <a class="nav-link" href="/cartlist">Cart({{$total}})</a>       
      </li>
      @if(Session::has('user'))
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Session::get('user')['name']}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
        @else
        <a class="nav-link" href="/login">Login</a>
        <a class="nav-link" href="/register">Register</a>
        @endif
    </ul>
    </div>
  </div>
</nav>
