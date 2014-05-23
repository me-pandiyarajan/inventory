	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Update Supplier</h1>

	        	<?php echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	        	<!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
	        		
	        			<?php 
	        			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'edit-supplier');
	        			echo form_open($form_action,$attributes); 
	        			?>
						   
						   <div class="form-group">
						      <label for="supplier name" class="col-sm-2 control-label">Supplier Name</label>
						      	<div class="col-sm-3">
						      		<input type="hidden"  id="supplier_id" name="supplier_id"  value="<?php echo $supplier->getSupplierId(); ?>" >
						      		<input type="text" class="form-control" id="supplier_name" name="supplier_name"  value="<?php echo $supplier->getSupplierName(); ?>"  placeholder="Enter supplier name" >
						   	  	</div>
						   </div>
						   
						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Email</label>
						      	<div class="col-sm-3">
						      		<input type="email" class="form-control" id="email" name="email" value="<?php echo $supplier->getEmail(); ?>" placeholder="Enter email">
						   		</div>
						   </div>

						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Mobile</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control"  id="mobile" name="mobile" value="<?php echo $supplier->getTelephone(); ?>" placeholder="Enter mobile number">
						   		</div>
						   </div>
						   
						   <!-- address -->
						   <div class="form-group">
						      	<label for="Address" class="col-sm-2 control-label">Address</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control" id="street" name="street" value="<?php echo $supplier->getStreet(); ?>" placeholder="Enter street">
						   		</div>
						   </div>						   
						 

						    <div class="form-group">							   
						     	<label for="city" class="col-sm-2 control-label">City</label>
					      		<div class="col-sm-3">
					      			<input type="text" class="form-control" id="city" name="city" value="<?php echo $supplier->getCity(); ?>" placeholder="Enter city name" />
					      		</div>
						   </div>


 							 <div class="form-group">
						      	<label for="state" class="col-sm-2 control-label">State</label>
						      	<div class="col-sm-3">
						      		<input type="text" class="form-control" id="state" name="state" value="<?php echo $supplier->getState(); ?>" placeholder="Enter state name" >
						   		</div>
						   </div>

 							<div class="form-group">
					      		<label for="zip" class="col-sm-2 control-label">Zip</label>
					      		<div class="col-sm-3">
					      			<input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" pattern="[0-9]{5,6}" value="<?php echo $supplier->getZipCode(); ?>">
					      		</div>
						   </div>



						   <!-- address end -->

						   <div class="form-group">
						      <label for="status" class="col-sm-2 control-label">Status</label>
						      	<div class="col-sm-3">
						      		<?php $options = array('' => 'Select Status','1'  => 'Enable','0' => 'Disable'); 
						      		 echo form_dropdown('status', $options,$supplier->getStatus(),'class="form-control"'); ?>
						   		</div>
						   </div>


						   <!-- action -->

						    <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							        <button type="submit" class="btn btn-success btn-xs" >Update</button>
							      <a type="button" href="<?php echo base_url();?>supplier/listsuppliers" class="btn btn-default btn-xs">Cancel</a>
							    </div>
							</div>

						   <!-- action end-->  					 
						
						<?php echo form_close();?>
					<!-- </form> -->
	</div>

<!-- dynamic view content end-->

</div>


