<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Customer</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">

	        	<?php echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	        	<!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
	        		
	        			<?php 
	        			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'edit-customer');
	        			echo form_open($form_action,$attributes); 
	        			?>
						   
						   <div class="form-group">
						      <label for="customer name" class="col-sm-2 control-label">Customer Name</label>
						      	<div class="col-sm-3">
						      		<input type="hidden"  id="customer_id" name="customer_id"  value="<?php echo $customer->getCustomerId(); ?>" >
						      		<input type="text" class="form-control" id="customer_name" name="customer_name"  value="<?php echo $customer->getCustomername(); ?>"  placeholder="Enter customer name" >
						   	  	</div>
						   </div>

						   <div class="form-group">
						      <label for="group" class="col-sm-2 control-label">Group</label>
						      	<div class="col-sm-3">
						      		 <?php 
						              if ($customer->getGroupCustomerCustomerGroup() == NULL) {
						               		echo form_dropdown('group',$group_options,set_value('group'),'class="form-control" required');
						              } else {
						                  	echo form_dropdown('group', $group_options,$customer->getGroupCustomerCustomerGroup()->getCustomerGroupId(),'class="form-control" required'); 
						              }
						              ?>
						   		</div>
					   		</div>
						   
						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Email</label>
						      	<div class="col-sm-3">
						      		<input type="email" class="form-control" id="email" name="email" value="<?php echo $customer->getEmail(); ?>" placeholder="Enter email">
						   		</div>
						   </div>

						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Mobile</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control"  id="mobile" name="mobile" value="<?php echo $customer->getMobileNumber(); ?>" placeholder="Enter mobile number">
						   		</div>
						   </div>
						   
						   <!-- address -->
						   <div class="form-group">
						      	<label for="Address" class="col-sm-2 control-label">Address</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control" id="street" name="street" value="<?php echo $customer->getStreet(); ?>" placeholder="Enter street">
						   		</div>
						   </div>						   
						 

						    <div class="form-group">							   
						     	<label for="city" class="col-sm-2 control-label">City</label>
					      		<div class="col-sm-3">
					      			<input type="text" class="form-control" id="city" name="city" value="<?php echo $customer->getCity(); ?>" placeholder="Enter city name" />
					      		</div>
						   </div>


 							 <div class="form-group">
						      	<label for="state" class="col-sm-2 control-label">State</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control" id="state" name="state" value="<?php echo $customer->getState(); ?>" placeholder="Enter state name" >
						   		</div>
						   </div>

 							<div class="form-group">
					      		<label for="zip" class="col-sm-2 control-label">Zip</label>
					      		<div class="col-sm-3">
					      			<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" value="<?php echo $customer->getZipCode(); ?>">
					      		</div>
						   </div>



						   <!-- address end -->

						   <div class="form-group">
						      <label for="status" class="col-sm-2 control-label">Status</label>
						      	<div class="col-sm-3">
						      		<?php $options = array('' => 'Select Status','1'  => 'Enable','0' => 'Disable'); 
						      		 echo form_dropdown('status', $options,$customer->getStatus(),'class="form-control"'); ?>
						   		</div>
						   </div>


						   <!-- action -->

						    <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							        <button type="submit" class="btn btn-success btn-outline" >Update</button>
							      <a type="button" href="<?php echo base_url();?>pos/customer/listCustomers" class="btn btn-primary btn-outline">Cancel</a>
							    </div>
							</div>

						   <!-- action end-->  					 
						
						<?php echo form_close();?>
					<!-- </form> -->
	        </div>
       
         <!-- /.dynamic content end -->
         
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


