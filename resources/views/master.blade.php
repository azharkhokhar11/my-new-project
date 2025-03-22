<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Comm Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>
<body>
{{View::make('header')}}
@yield('content')
{{View::make('footer')}}
    

</body>
<style>
    .custom-login{
        height: auto;
        padding: 100px;
    }
    img.slider-img{
        height: 400px !important;
    }
    .carousel-item{
        height: 500px;
    }
    .custom-product{
        height: auto;
        width:100%;        
    }
    .slider-text{
        background-color: #35443585 !important;
    }
    .trending-image{
        height: 100px;
        margin: 10px;
        }
    .trending-item{
        float:left;
        margin-left: 40px;
        margin-bottom: 20px;
        width:20%;
        height:200px;
        background-color:lightgrey; 
        text-align: center;       
    }
    .trending-item a{
        text-decoration:none;             
    }
    .trending-wrapper{
        margin: 30px;
        text-align: center;       
    }
    .trending-wrapper1{
        margin: 10px;
    }
    .detail-img{
        height: 300px;
    }
    .cart-list-divider{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    .custom-product1{
        height: auto;        
    }
    .col-sm-4 p {
    margin-bottom: 8px; /* Adds spacing between paragraphs */
    font-size: 16px; /* Adjust font size if needed */
    line-height: 1.5; /* Adjust line height for readability */
}
.card1{
width:100%;
}



.card {
  width: 100%;
  margin: 20px auto;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color:lightblue;
}

.card-body {
  padding: 10px;
}

.content-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.text {
  text-align: left;
  font-size: 16px;
  flex-grow: 1; /* Text will take up the available space */
}

.social-icons {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.icon {
  font-size: 24px;
  color: #333;
}

.icon:hover {
  color: #007bff; /* Hover effect */
}
    
</style>
</html>