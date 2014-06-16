<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Customer List</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
         <!-- /.dynamic content -->
       
        <div class="col-lg-12">

			 <?php if ( $this->session->flashdata('customeredit') ) echo $this->session->flashdata('customeredit'); ?>
			 <?php if ( $this->session->flashdata('customerdelect') ) echo $this->session->flashdata('customerdelect'); ?>
			   <!-- add customer -->

	        	<a href="<?php echo site_url()."pos/customer/addCustomer"?>" class="btn btn-success btn-outline btn-sm">Add Customer</a>

			   <!-- add customer end--> 

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
						    
						    <?php foreach($customers as $customer): ?> 
							
							<tr> 
								<!-- <a href="<?php //echo site_url()."pos/customer/customerDetails/".$customer->getCustomerId()."/viewCustomerDetails";?>" ><?php //echo $customer->getCustomername(); ?></a> -->
								<td><?php echo $customer->getCustomername(); ?></td>
								<td><?php echo $customer->getEmail(); ?></td>
								<td><?php echo $customer->getMobileNumber(); ?></td>
								<td>
									<?php 
									$groupName = $customer->getGroupCustomerCustomerGroup();
									if($groupName != null)
										echo $customer->getGroupCustomerCustomerGroup()->getCustomerGroupName();
									else
										echo "General";  
									?>
								</td>
								<td><?php if($customer->getStatus() == 1){
											echo '<span class="label label-success">Active</span>';
										}else {
											echo '<span class="label label-danger">Inactive</span>';
										}
									?></td>
								<td>
									<div class="btn-group">
									  	<a type="button" href="<?php echo site_url()."pos/customer/customerDetails/".$customer->getCustomerId()."/editCustomerDetails";?>" class="btn btn-primary btn-outline btn-xs">Edit</a>
									  	<?php if( $visiblity == 1 ): ?>
										<a type="button" href="<?php echo site_url()."pos/customer/deletecustomer/".$customer->getCustomerId(); ?>" class="btn btn-danger btn-outline btn-xs delete-btn">Delete</a>
									  	<?php endif; ?>
									</div>
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



