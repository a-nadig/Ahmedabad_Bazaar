
<!DOCTYPE html>
 <head>
	<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('mycss/styles.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('mycss/storefront.css'); ?>"> 
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   
        <title>Store Home Page</title>
    
    
	</head>
	<body>
	<div class="text-center storenamenavbar">
	
	<h2><u><a href="<?php echo base_url().'stores/display/'.$store_id; ?>"><img  src="<?php  echo base_url()."storelogos/".$store_id.".png"; ?>"></a></u></h2>
	
	</div>
	<div id="cssmenu">

	
	
	<ul  id="nav">
	
	<?php 	
			$store_id=$store_id;
			foreach($basecategories->result() as $basecategoryrow){
																if($basecategoryrow->category=="None"){
																				continue;
																			}
																echo "<li role=\"presentation\" class='has-sub'>";
																	echo "<a href=\"". base_url()."storefront/getproducts/".$store_id."/". $basecategoryrow->cat_id ."\">". $basecategoryrow->category ."</a>"; 
																			
																		echo "<ul>";	
																			foreach($query->result() as $row){
																				if($row->parent_id==$basecategoryrow->cat_id){
											
																					
																						echo "<li class='has-sub'>";
																							echo "<a href=\"". base_url()."storefront/getproducts/".$store_id."/". $row->cat_id ."\">".$row->category."</a>";
																			
																							echo "<ul>";
																							foreach($query->result() as $row1){
																								if($row1->parent_id==$row->cat_id){
																					
																								
																									echo "<li class='has-sub'>";
																										echo "<a href=\"". base_url()."storefront/getproducts/".$store_id."/". $row1->cat_id ."\">".$row1->category."</a>";
																							
																									echo "<ul>";
																										foreach($query->result() as $row2){
																											if($row2->parent_id==$row1->cat_id){
																										    
																											echo "<li class='has-sub'>";
																											
																												echo "<a href=\"". base_url()."storefront/getproducts/".$store_id."/". $row2->cat_id ."\">".$row2->category."</a>";
																												
																												echo "<ul>";
																															foreach($query->result() as $row3){
																																	if($row3->parent_id==$row2->cat_id){
																															
																																	echo "<li >";
																																		echo "<a href=\"". base_url()."storefront/getproducts/".$store_id."/". $row3->cat_id ."\">".$row3->category."</a>";
																																	echo "</li>";
																																	}
																															
																															}	 
																												echo "</ul>";
																											echo "</li>";
																											}
																										}
																									echo "</ul>";
																									echo "</li>";
																								}
																							}
																					
																				echo "</ul>";	
																			echo "</li>";
																				}
																				
																			}
																				
																		echo "</ul>";
																echo "</li>";
																}
																				
																				
																				
																				 ?>
		<div class="cartcontainer">
		<li><div class="heading">Shopping Cart</div><br/>
		<a href="<?php echo base_url()."cart/displaycart" ?>">
		<span style="color: red"><i class="fa fa-shopping-cart fa-3x"></i></span><br/>
		<div class="cart"></div></a> </li>
		
		</div>
	</ul>
		
	</div> 
	
		</body>
</html>