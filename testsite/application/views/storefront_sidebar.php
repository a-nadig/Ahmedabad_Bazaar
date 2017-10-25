<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('mycss/storefront_sidebar.css'); ?>">
</head>
<body>


<div class="container leftsidebar col-sm-2" style="background-color :white">
	<form method="post" action="<?php echo base_url(uri_string());?>">

	<div class="filter">
		<div class="preamble">Filter BY<br /></div>
	<?php foreach($arr as $row){ ?>
	<input type="checkbox" value="<?php echo $row->cat_id ?>">  <?php echo $row->category; ?></input><br />
	
	
	<?php } ?>
		<div class="preamble">Brands<br /></div>
	<?php foreach($brands as $row){ ?>
	<input type="checkbox" id="<?php echo $row->Manufacturer_name; ?>" value="<?php echo $row->Manufacturer_name; ?>">  <?php echo $row->Manufacturer_name; ?></input><br />
	
	
	<?php } ?>
	
	
	</div>		




</div>
<script>
	$(document).ready(function(){
		
		
	})
</script>
</body>
</html>