<!DOCTYPE html>
<?php ini_set('display_errors','off');?>
<head>
<link rel="stylesheet" href="<?php echo base_url('mycss/productdesc.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>

<div class="container leftsidebar col-sm-2" style=" background-color :white">
</div>
	<div class="container productcontainer col-sm-8 text-center">
	
	
	 
		<div class="row ">
		
		<!--Page is divided into two columns left column starts-->
		<div class="col-sm-6 text-center">
			<div class='image'>
				<img src="<?php echo base_url().$row->image; ?>" class="img-responsive img-rounded"></img>
			</div>
		</div>
			<div class="info col-sm-6 text-left">
			<?php
							
			
															
									echo "<div class='productname'>";
									//echo "<h1>";	
										echo $row->product_name;
									//echo "</h1>";
									echo "</div>";
									
									echo "<div class='price'>";
										echo "<span>";
											echo "Rs.".$row->price;
										echo "</span>";
									echo "</div>";
									echo "<div class='quantity'>";
										echo "<input type='hidden' name='product_id' id='product_id' value='".$row->product_id."' class=\"form-control\">";
										echo "<input type='hidden' name='product_id' id='store_id' value='".$store_id."' class=\"form-control\">";
										echo "<input type='text' name='quantity' id='quantity' placeholder=\"Enter quantity here\" class=\"form-control\">";
									echo "</div>";
									
							
									echo "<div class='addto'>";
										
										echo "<span>";
										echo "<button type=\"submit\" id='addtocart' class=\"btn btn-lg btn-danger\" role=\"button\">ADD TO CART</button>";
										echo "</span>";
										
										echo "<span>";
										echo "<a class=\"btn btn-lg btn-success\" role=\"button\">BUY NOW</a>";
										echo "</span>";
									echo "</div>";
									
									echo "<div class=\"icons\">";
										echo "<h3>";
										echo "<i class=\"fa fa-check-circle-o color-in\"></i>";
										echo " IN STOCK";
										echo "</h3>";
										echo "<h3 style=\"display:none;\">";
										echo "<i class=\"fa fa-minus-circle color-out\" ></i>";
										echo " OUT OF STOCK";
										echo "</h3>";
										echo "<h3>";
										echo "&nbsp&nbsp&nbsp<i class=\"glyphicon glyphicon-lock\"></i>";
										echo " SECURE ONLINE SHOPPING";
										echo "</h3>";
									echo "</div>";
									
									
			?>
			</div>
		</div>
	</div>

<script>
	$(document).ready(function(){
		
		$("#addtocart").click(function(){
			//alert(0);
		
		var id = $("#product_id").val();
		var qty = $("#quantity").val();	
		var store_id = $("#store_id").val();
		var data = "id="+id+"&qty="+qty;
		
		
		$.ajax({
			url: "<?php echo base_url('cart/addtocart'); ?>",
			data: {id: id , qty:qty , store_id: store_id},
			type: 'POST',		
			success: function(name) {
				 
				$(".cart").html(name);
			}
 		});

		});
	})
</script></body>
</html>