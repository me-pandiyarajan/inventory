	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Update Supplier</h1>

	        	<?php echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	        	<!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
	        		
	        			<?php 
	        			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
	        			echo form_open($form_action,$attributes); 
	        			?>
						   
						   <div class="form-group">
						      <label for="supplier name" class="col-sm-2 control-label">Supplier Name</label>
						      	<div class="col-sm-10">
						      		<input type="hidden"  id="supplier_id" name="supplier_id"  value="<?php echo $supplier->getSupplierId(); ?>" >
						      		<input type="text"  id="supplier_name" name="supplier_name"  value="<?php echo $supplier->getSupplierName(); ?>"  placeholder="Enter supplier name">
						   	  	</div>
						   </div>
						   
						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Email</label>
						      	<div class="col-sm-10">
						      		<input type="email"  id="email" name="email" value="<?php echo $supplier->getEmail(); ?>" placeholder="Enter email">
						   		</div>
						   </div>

						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Mobile</label>
						      	<div class="col-sm-10">
						      		<input type="text"  id="mobile" name="mobile" value="<?php echo $supplier->getTelephone(); ?>" placeholder="Enter mobile number">
						   		</div>
						   </div>
						   
						   <!-- address -->
						   <div class="form-group">
						      	<label for="Address" class="col-sm-2 control-label">Address</label>
						      	<div class="col-sm-10">
						      		<input type="text"  id="street" name="street" value="<?php echo $supplier->getAddress1(); ?>" placeholder="Enter street">
						   		</div>
						   </div>						   
						 
						   <div class="form-group">
							   <div class="col-sm-4 col-sm-offset-2">
							     	<label for="city" class="col-sm-2 control-label">City</label>
						      		<div class="col-sm-10">
						      			<input type="text" class="col-sm-7" id="city" name="city" value="<?php echo $supplier->getCity(); ?>" placeholder="Enter city">
						      		</div>
								</div>
						   </div>

						   <div class="form-group">
							   <div class="col-sm-offset-2">
							     	<label for="city" class="col-sm-1 control-label">state</label>
						      		
						      		<div class="col-sm-2">
						      			<select id="state" class="form-control" name="state" placeholder="choose state" value="<?php echo set_value('state'); ?>" >
						      			<option value="1">Tamil Nadu</option>
						      			<option value="2">Kerela</option>
						      			<option value="3">Karnataka</option>
						      			<option value="4">Maharastra</option>
						      			<option value="5">West Bengal</option>
						      			<option value="5">Delhi</option>
						      			</select>
						      		</div>

						      		<label for="city" class="col-sm-2 control-label">zip</label>
						      		<div class="col-sm-2">
						      			<input type="text" id="zip" name="zip" placeholder="" value="<?php echo set_value('zip'); ?>">
						      		</div>
								</div>
						   </div>
						   <!-- address end -->

						   <div class="form-group">
						      <label for="status" class="col-sm-2 control-label">Status</label>
						      	<div class="col-sm-3">
						      		<?php $options = array('1'  => 'Enable','0' => 'Disable'); 
						      		 echo form_dropdown('status', $options,$supplier->getStatus(),'class="form-control"'); ?>
						   		</div>
						   </div>



						   <!-- action -->

						    <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							        <button type="submit" class="btn btn-success btn-sm" id="submit">Update</button>
							        <a href="" class="btn btn-info btn-sm" id="cancel">Cancel</a>
							    </div>
							</div>

						   <!-- action end-->  					 
						
						<?php echo form_close();?>
					<!-- </form> -->
	</div>

<!-- dynamic view content end-->

</div>


