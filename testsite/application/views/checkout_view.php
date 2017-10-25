<!DOCTYPE html>
<head>

<link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo base_url('mycss/cart.css'); ?>">
</head>

<div class="container">
<div class="col-sm-8 col-sm-ofset-3">

<form method="POST" action="<?php echo base_url().'cart/submitdetails';?>">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Full name">
  </div>
  
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" name="email" id="Email" placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="mobileno">Mobile Number</label>
    <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="">
  </div>
  
  <div class="form-group">
  <label for="shippingaddress">Shipping Address</label>
  <textarea name="shippingaddress" class="form-control" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


</div>