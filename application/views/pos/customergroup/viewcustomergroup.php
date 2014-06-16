<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Customer List</h2><h3>Group Name - <?php echo $groupname->getCustomerGroupName(); ?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
         <!-- /.dynamic content -->
       
        <div class="col-lg-12">
  
				  <div class="table-responsive">
	        
					<table class="table table-bordered table-striped" >

					    <thead> 
					        <tr>
					    		<?php  foreach($tablehead as $table_head):?>	   
						   		<th><?php echo $table_head;?></th>
					     		<?php endforeach; ?>
					        </tr>
					    </thead>

						<tbody role="alert" aria-live="polite" aria-relevant="all">
						    
						    <?php foreach($customergrouplist as $customerlist): ?> 
							
							<tr> 
								<!-- <a href="<?php //echo site_url()."pos/customer/customerDetails/".$customer->getCustomerId()."/viewCustomerDetails";?>" ><?php //echo $customer->getCustomername(); ?></a> -->
								<td><?php echo $customerlist->getCustomername(); ?></td>
								<td><?php echo $customerlist->getEmail(); ?></td>
								<td><?php echo $customerlist->getMobileNumber(); ?></td>
								<td><?php if($customerlist->getStatus() == 1){
											echo '<span class="label label-success">Active</span>';
										}else {
											echo '<span class="label label-danger">Inactive</span>';
										}
									?></td>
								<td>	
								<a type="button" href="<?php echo site_url()."pos/CustomerGroup/removeCustomerCustomerGroup/".$customerlist->getCustomerId();?>" class="btn btn-danger remove-btn btn-xs btn-outline">Remove</a>
							</td>
							</tr>	

							<?php endforeach; ?>  
						</tbody>
										
					</table>

				</div>
	</div>

 </div>
       <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->



