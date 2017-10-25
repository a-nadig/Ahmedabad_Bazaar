<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" media="screen">
</head>

<body>



<div class="span9">
	<table class="table table-bordered table-striped">
               <thead>
                <tr>
					
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Qty</th>
                  <th>Price</th>
				  
                  <th>Total</th>
                </tr>
               </thead>
               <tbody>
			   
			   <tr>
			   <?php foreach($products_query->result() as $row){ ?>
			   <td><?php echo $row->product_name; ?></td>
			   <td><div class="img-cart" style="height: 180px; width:180px;"><img src="<?php echo base_url().$row->image; ?>" style="max-width:100%;
																												max-height:100%" class="img-responsive img-rounded"></div></td>
			   <td><?php echo $row->quantity_ordered; ?></td>
			   <td><?php echo $row->price; ?></td>
			   <td><?php echo ($row->price)*($row->quantity_ordered); ?></td>
			   </tr>
			   <?php } ?>
			   
			   <tr>
			   <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total Amount</td>
                  <td>Rs.<?php echo $orderinfo_row->order_totalcost; ?></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total Shipping</td>
                  <td>Rs. 00</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right"><strong>Total</strong></td>
                  <td><?php echo $orderinfo_row->order_totalcost;  ?></td>
                </tr>
               </tbody>
</table>
</div>


</body>
</html>