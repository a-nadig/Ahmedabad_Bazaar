<!DOCTYPE html>
<html>
	<head>
  
	</head>  
    
    
    <body>
        <div class="container-fluid">

                <div class="span9" id="content  >

                     

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><strong>Add a new product</strong></div>
                            </div>
						<div class="block-content collapse in"> <div class="span12">
							 <!-- <div class="lead"><?php if(isset($error)){echo $error ;}     //Displays error if we pass the error variable to this view file ?></div>
                                 -->  
								   <form role="form" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('storeadmin/doaddproducts');?>" method="post" >
											
											<h4 class="text-center"><u>Enter the details of your product</u></h4>
											
											<input type="hidden" name="MAX_FILE_SIZE" value="22048000" />
										
												
											<div class="control-group">
											<label class="control-label" for="product_id"> Product Id</label>
											<div>
											<input class="controls" type="text" id="product_id" name="product_id"/>
											</div>
											</div>
										
										
										 
											<div class="control-group">
											<label class="control-label" for="product_name"> Product Name</label>
											<input class="controls" type="text" id="product_name" name="product_name"/>
											</div>
										
										
											
											<div class="control-group">
											<label class="control-label" for="Manufacturer_name">Manufacturer's Name</label>
											<input class="controls" type="text" id="manufacturer_name" name="manufacturer_name"/>
											</div>
										
										
										
										
												
											<div class="control-group">
											<label class="control-label">Color</label>
											<select class="controls" name="color">
											<?php 	foreach($query->result_array() as $row)
															{
															echo "<option>". $row['color'] ."</option>"; 
															} ?>
											</select>
											</div>
										
										
										
											<div class="control-group">
											<label class="control-label" for="price"> Price </label>
											<input class="controls" type="text" id="price" name="price"/>
											</div>
										
										
										
											<div class="control-group">
											<label class="control-label" for="quantity">Quantity</label>
											<input class="controls" type="text" id="quantity" name="quantity"/>
											</div>
										
										
											  <div class="control-group">
											  <label class="control-label">Category</label>
											 <select class="controls" name="category">
											 <?php foreach($categoriesquery->result() as $row)
														{ echo "<option value=\"".$row->cat_id."\">".$row->category . "</option>";}
														?>
											</select>
										
											</div>
										<br />
											<div class="control-group">
											<label class="control-label" for="image">Upload Image:</label>
											<input class="controls" type="file" name="image" id="image"/>
											<!-- <input type="submit" value="Upload Image"/> -->
											</div>
										
										
											<div class="control-group">
										<center>	<input  style="margin-left: -100px;" class="btn controls " type="submit" value="Submit" name="submit"/></center>
											</div>
										 
										
 
										</form>
                                </div>
                            </div>
                        </div>
						
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script src="<?php echo base_url('vendors/jquery-1.9.1.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('vendors/datatables/js/jquery.dataTables.min.js');?>"></script>


        <script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
        <script src="<?php echo base_url('assets/js/DT_bootstrap.js');?>"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>