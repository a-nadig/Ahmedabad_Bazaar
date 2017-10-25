<!DOCTYPE html>
<html>
<head>

</head>

<body>

	<div class="container productsarea col-sm-8 col-xs-10 text-center">
	
	
	 
	<div class="row ">
	
	<?php if(isset($gotproducts))
		{		
				
				if($gotproducts->num_rows()>0){
					
					 	foreach($gotproducts->result() as $row){
						echo "<div class=\"product col-sm-3\">"; 
							
							echo "<div class='image'>";
							echo "<a href=\"".base_url().'storefront/productdesc/'.$store_id.'/'.$row->product_id."\">";
								echo "<img src='".base_url().$row->image."' class=\"img-responsive img-rounded\"></img>";
							echo "</a>";
							echo "</div>";	
							
								echo "<div class=\"slidingwindow\">"; 
									echo "<a class=\"btn btn-xs btn-default\" role=\"button\">Quick View</a>";
								echo"</div>";
								echo "<a href='#'>";
								echo "<div class=\"brandname\">";
									echo $row->Manufacturer_name;
								echo"</div>";
							
							
							
									echo "<div class='productname'>";
										echo $row->product_name;
									echo "</div>";
									
									echo "<div class='price'>";
										echo "Rs.".$row->price;
									echo "</div>";
									
							echo "</a>";
								echo "<div class='addtocart'>";
									echo "<a class=\"btn btn-xs btn-danger\" role=\"button\">ADD TO CART</a>";
								echo "</div>";
						echo "</div>";
						} 
				}
				else{echo "nothing retrived dafuq";}
				
		}?>
	</div >
	</div>
	<script src="<?php echo base_url('assets 3.3.2/js/bootstrap.min.js');?>"></script>
	</body>
	</html>