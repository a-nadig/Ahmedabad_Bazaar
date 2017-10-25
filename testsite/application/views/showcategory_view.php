<!DOCTYPE html>

    
    
    
    <body>
	 
	 <div class="span9" id="content  >

                     

                     <div class="row-fluid">
					 <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">CATEGORIES</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" id="form1" action="<?php echo base_url('storeadmin/doaddcategory');?>" method="POST">
                                      <fieldset>
                                        <legend>Create categories and sub-categories</legend>
                                        <?php if($addedcategory){ ?>
										<div class="alert alert-success">
											<button class="close" data-dismiss="alert">&times;</button>
											<strong>Success!</strong> <?php echo "Successfully added ".$addedcategory.".";} ?>
										</div> 
										
								</div>
										
										
										
											<div class="control-group">
													<label class="control-label" for="focusedInput">Create a new category </label>
												
													<div class="controls">
														<input class="input-xlarge focused" id="category" name="category" type="text">
														
														<label for="dropdown1">Select a parent category to add to</label>
														<select name="dropdown1" id="dropdown1">
														
														<?php foreach($basecategories->result() as $basecategoryrow){
																				
																				if($basecategoryrow->category=="None"){
																					echo "<option selected value=\"".$basecategoryrow->cat_id."\">".$basecategoryrow->category . "</option>";
																					continue;
																				}
																			
																			echo "<option value=\"".$basecategoryrow->cat_id."\">".$basecategoryrow->category . "</option>";
																			
																			foreach($query->result() as $row){
																				if($row->parent_id==$basecategoryrow->cat_id){
											
																				echo "<option value=\"".$row->cat_id."\">&nbsp&nbsp&nbsp&nbsp<i class='icon-play'></i>".$row->category . "</option>";
																					foreach($query->result() as $row1){
																						if($row1->parent_id==$row->cat_id){
																					
																							echo "<option value=\"".$row1->cat_id."\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i>".$row1->category . "</option>";
																								foreach($query->result() as $row2){
																										if($row2->parent_id==$row1->cat_id){
																					
																											echo "<option value=\"".$row2->cat_id."\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i><i class='icon-forward'></i>".$row2->category . "</option>";
																													foreach($query->result() as $row3){
																															if($row3->parent_id==$row2->cat_id){
																															echo "<option value=\"".$row3->cat_id."\">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i><i class='icon-forward'></i>".$row3->category . "</option>";
																															}
																															}
																										}
																								}
																						}
	
																					}
																				}
																				
																				}
																				
																			}
																				
																				
																				
																				 ?>     
														
														
														
														
														
														
														
														
														<!--foreach($query->result() as $row)
														{ echo "<option value=\"".$row->cat_id."\">".$row->category . "</option>";}-->
												
														</select>
														<input type="submit" class="btn btn-success btn-lg" value="Add" name="submit">
														<!--<input type="submit" value="Go" name="go" class="btn btn-success btn-lg"/>-->
													</div>
										  </div>
                            </div>
									
									</form>
									
										<div class="row-fluid">
                        <!-- block -->
											<div class="block">
												<div class="navbar navbar-inner block-header">
													<div class="muted pull-left">Your Categories</div>
												</div>
													<div class="block-content collapse in">
														<div class="span12">
															<table class="table">
																<tbody>
																	<?php foreach($basecategories->result() as $basecategoryrow){
																			if($basecategoryrow->category=="None"){
																				continue;
																			}
																			echo "<tr class=\"success\">";
																			echo "<td>";
																			echo "$basecategoryrow->category"; 
																			echo "</td>";
																			echo "</tr>";
																			foreach($query->result() as $row){
																				if($row->parent_id==$basecategoryrow->cat_id){
											
																				echo "<tr class=\"error\">";
																				echo "<td>";
																				echo "&nbsp&nbsp&nbsp&nbsp<i class='icon-play'></i>".$row->category;
																				echo "</td>";
																				echo "</tr>";
																					foreach($query->result() as $row1){
																						if($row1->parent_id==$row->cat_id){
																					
																							echo "<tr class=\"info\">";
																							echo "<td>";
																							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i>".$row1->category;
																							echo "</td>";
																							echo "</tr>";
																								foreach($query->result() as $row2){
																										if($row2->parent_id==$row1->cat_id){
																					
																											echo "<tr class=\"info\">";
																											echo "<td>";
																											echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i><i class='icon-forward'></i>".$row2->category;
																											echo "</td>";
																											echo "</tr>";
																													foreach($query->result() as $row3){
																															if($row3->parent_id==$row2->cat_id){
																					 
																															echo "<tr class=\"info\">";
																															echo "<td>";
																															echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class='icon-forward'></i><i class='icon-forward'></i>".$row2->category;
																															echo "</td>";
																															echo "</tr>";
																															}
																															}
																										}
																								}
																						}
	
																					}
																				}
																				
																				}
																				
																			}
																				
																				
																				
																				 ?>     
																</tbody>
															</table>
														</div>
													</div>
											</div>
                        <!-- /block -->
										</div>
						</div>		
							</div>
					 </div>
	</div>
	
	</div>
</body>
</html>