
<!DOCTYPE html> 
<head>
<link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
</head>



<body>
<div class="signup_form container well text-center">

<form action="<?php echo base_url('login/doregister');?>" method="post" >
 <h3>Sign Up To Ahmedabad Bazaar</h3>
  <p>
	<label for="storename">Store Name </label>
	<input name="store_name" type="text" id="storename" size="30"/>
	</p>
 <p>
  <label for="username">User Name:</label>
  <input name="username" type="text" id="username" size="30"/>
 </p>
 <p>
  <label for="email">E-mail:</label>
  <input name="email" type="text" id="email" size="30"/>
 </p>
 <p>
  <label for="password">Password:</label>
  <input name="password" type="password" id="password" size="30 "/>
 </p>
 <p>
  <input type="submit" value="Submit" name="submit"/>
 </p>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 </body>
 </html>