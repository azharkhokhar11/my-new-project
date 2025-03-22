@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10 m-3">
    <table class="table">
  <tbody>
    <tr>
      <th>Amount</th>
      <td>$ {{$total}}</td>
    </tr>
    <tr>
      <th>Tax</th>
      <td>$ 0</td>
    </tr>
    <tr>
      <th>Delivery Charges</th>
      <td>$ 10</td>
    </tr>
    <tr>
      <th>Total Amount</th>
      <td>$ {{$total + 10}}</td>
    </tr>
  </tbody>
</table>
<form action="/orderplace" method="POST">
    @csrf
  <div class="mb-3 mt-5">
    <label for="" class="form-label"><b>Enter Your Address</b></label>
    <textarea name="address" class="form-control"></textarea>
  </div>
  <div class="mb-3">
  <label for="" class="form-label"><b>Select Your Payment Method: </b></label>
  <div class="form-check ">
  <input class="form-check-input" type="radio" value="cash" name="payment" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  online payment
  </label>
</div>
<div class="form-check ">
  <input class="form-check-input" type="radio" value="cash" name="payment" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">
  EMI payment
  </label>
</div>
<div class="form-check ">
  <input class="form-check-input" type="radio" value="cash" name="payment" id="flexRadioDefault3">
  <label class="form-check-label" for="flexRadioDefault3">
  cash on delivery
  </label>
</div>   
  </div> 
  <button type="submit" class="btn btn-primary">Order Now</button>
</form>
</div>
</div>
@endsection