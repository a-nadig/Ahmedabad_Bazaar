<!DOCTYPE html>
<html>





<body>
 <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Orders</div>
                                    <!--<div class="pull-right"><span class="badge badge-info">812</span>

                                    </div>-->
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Id</th>
												<th>Order Date</th>
												
												<th>Amount</th>
												<th>Total items </th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
											
										<?php		$i=1;
													foreach($query->result() as $row){ ?>
												<tr>
														<td><?php echo $i."."; $i++;?></td>
														<td><?php echo $row->order_id; ?></td>
														<td><?php echo $row->orderdate; ?></td>
														<td>Rs. <?php echo $row->order_totalcost; ?></td>
														<td><?php echo $row->no_of_items; ?></td>
														<td><a href="<?php echo base_url()."storeadmin/show_products_ordered/".$row->order_id; ?>" class="btn btn-success">Display products</a></td>
												</tr>
                                            <?php } ?>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
   </body>
   </html>