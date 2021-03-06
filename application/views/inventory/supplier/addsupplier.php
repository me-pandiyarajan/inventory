	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       
	        <h1 class="page-header">Add Supplier</h1>

	        	<?php echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	        	<!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
	        		
	        			<?php 
	        			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'add-supplier');
	        			echo form_open($form_action,$attributes); 
	        			?>
						   
					   <div class="form-group ">
					      <label for="supplier name" class="col-xs-2 control-label">Supplier Name</label>
					      	<div class="col-xs-3">
					      		<input type="text" class="form-control"  id="supplier_name" name="supplier_name"  value="<?php echo set_value('supplier_name'); ?>"  placeholder="Enter supplier name" >
					   	  	</div>
					   </div>
					   
					   <div class="form-group">
					      <label for="name" class="col-xs-2 control-label">Email</label>
					      	<div class="col-xs-3">
					      		<input type="email" class="form-control"  id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email">
					   		</div>
					   </div>

					   <div class="form-group">
					      <label for="name" class="col-xs-2 control-label">Mobile</label>
					      	<div class="col-xs-3">
					      		<input type="text" class="form-control"  id="mobile" name="mobile"  pattern="[0-9]{10}" value="<?php echo set_value('mobile'); ?>" placeholder="Enter mobile number">
					   		</div>
					   </div>
					   
					   <!-- address -->
					   <div class="form-group">
					      	<label for="Address" class="col-xs-2 control-label">Address</label>
					      	<div class="col-xs-3">
					      		<input type="text" class="form-control"  id="street" name="street" value="<?php echo set_value('street'); ?>" placeholder="Enter street">
					   		</div>
					   </div>						   
					 
					   <div class="form-group">							   
					     	<label for="city" class="col-xs-2 control-label">City</label>
				      		<div class="col-xs-3">
				      			<input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city'); ?>" placeholder="Enter city name" />
				      		</div>
					   </div>

						<div class="form-group">
					      	<label for="state" class="col-xs-2 control-label">State</label>
					      	<div class="col-xs-3">
					      		<input type="text" class="form-control"  id="state" name="state" value="<?php echo set_value('state'); ?>" placeholder="Enter state name" >
					   		</div>
					   </div>

						<div class="form-group">
			      		<label for="zip" class="col-xs-2 control-label">Zip</label>
			      		<div class="col-xs-3">
			      			<input type="text" id="zip" class="form-control" name="zip" placeholder="Enter zip code"  value="<?php echo set_value('zip'); ?>">
			      		</div>
					   </div>
					   <!-- address end -->

					   <div class="form-group">
					      <label for="status" class="col-sm-2 control-label">Status</label>
					      	<div class="col-sm-3">
					      		<?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
					      		 echo form_dropdown('status', $options,set_value('status'),'class="form-control"'); ?>
					   		</div>
					   </div>

					   <!-- action -->

					    <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-3">
						        <button type="submit" class="btn btn-success btn-sm">Add</button>
						        <button type="reset" class="btn btn-info btn-sm" id="reset">Reset</button>
						    </div>
						</div>

					   <!-- action end-->  					 
					
					<?php echo form_close();?>
				<!-- </form> -->
	</div>

<!-- dynamic view content end-->

</div>


