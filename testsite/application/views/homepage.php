<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<link rel="stylesheet" media="screen" href="<?php echo base_url('mycss/homepage.css'); ?>">   
<!--<link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">-->
 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 
</head>
<body>

<div class="name text-center">
<span class="title">Ahmedabad Bazaar</span><br />


<div class='buttons'>
<?php

										
										echo "<span>";
										echo "<a href='".base_url('login/signin')."' id='storefront' class=\"btn btn-lg btn-primary\" role=\"button\">Login</a>";
										echo "</span>";
										
										echo "<span>";
										echo "<a href='".base_url('login/register')."' class=\"btn btn-lg btn-primary\" role=\"button\">Sign Up</a>";
										echo "</span>";
										
										echo "<span style='display:block color:#808080'>";
										echo "<a href='".base_url('stores/liststores')."' class=\"btn btn-block btn-lg btn-default \" role=\"button\">View Stores</a>";
										echo "</span>";

?>
</div>
<span class="konami"></span>
</div>


<script src="<?php echo base_url('myjs/konami.js'); ?>" type="text/javascript"></script>
</body>
</html>