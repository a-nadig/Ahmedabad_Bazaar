<!DOCTYPE html> 
<head>
<link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<link rel="stylesheet" media="screen" href="<?php echo base_url('mycss/storelogin.css'); ?>">
</head>



<body>
<div class="signup_form container well text-center">

<span class="title">Ahmedabad Bazaar</span><br />

<form action="<?php echo base_url('login/dologin');?>" method="post" >
 <h3>Store Admin Login</h3>
<?php if(isset($error)){?> <p style="color: red">Invalid Username And/Or Password</p><?php } ?> 
 <p>
 <div class="form-group">
  <label for="username">User Name:</label>
  <input name="username" type="text" id="username" size="30"/>
  </div>
 </p>
 
 <p>
  <div class="form-group">
  <label for="password">Password:</label>
  <input name="password" type="password" id="password" size="30 "/>
  </div> 
 </p>
 <p>
  <input class="btn btn-default" type="submit" value="Sign In" name="submit"/>
 </p>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 
 </body>
 </html>