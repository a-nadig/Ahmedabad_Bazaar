<!DOCTYPE html>
<head>

<link href="<?php echo base_url('assets 3.3.2/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo base_url('mycss/cart.css'); ?>">
</head>
<div class='container'>
	<div class=" col-sm-8 col-sm-ofset-3 ">


	<table class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
               </thead>
               <tbody>
                         
	<?php
	$this->load->library('session');
	$data=$this->session->all_userdata();
	//print_r($data);
	$i=0;
	
	
		 foreach($data as $key=>$row)
		   { //print_r($key);
		  
		   
		    if(isset($row['product_id']) && $key == $row['product_id'])
				{	
	
	
		
			?>
				<tr>
                  <td><div class="img-cart"><img src="<?php echo base_url().$row['image']; ?>" class="img-responsive img-rounded"></div></td>
                  <td><strong></strong><p></p></td>
                  <td>
                    <form class="form-inline">
                      <input class="form-control" value="<?php echo $row['quantity']; ?>" type="text">
                      <!--<button data-original-title="Update" rel="tooltip" title="" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                      <a data-original-title="Delete" href="#" class="btn btn-primary" rel="tooltip" title=""><i class="fa fa-trash-o"></i></a>
					  -->
					</form>
                  </td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['totalprice'];?></td>
                </tr>
       
			
			<?php
				}
		}

			?>
			<tr>
                  <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total Amount</td>
                  <td><?php echo $this->session->userdata('total'); ?></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total Shipping</td>
                  <td>Rs. 00</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right"><strong>Total</strong></td>
                  <td><?php echo $this->session->userdata('total'); ?></td>
                </tr>
				<tr>
                  <td colspan="6" class="text-right"><a class="btn-success btn-lg" href="<?php echo base_url()."cart/checkout"; ?>">Checkout</a></td>
                </tr>
               </tbody>
              </table>
	</div>
</div>
<html>