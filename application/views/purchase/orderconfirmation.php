	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Order Confirmation</h1>

	        	<?php echo validation_errors(); ?>
				<?php if(!empty($success)) echo $success; ?>
	        	<?php $attributes = array('class' => 'form-horizontal');
	            echo form_open_multipart($form_action,$attributes);?> 
				 <div class="form-group">
				 <input type="text"  id="temp_pro_id" name="temp_pro_id"  value="<?php echo set_value('temp_pro_id'); ?>"  hidden>
						   	  
			     <label class="control-label col-sm-2" for="product">Product Name</label>
			     <div class="dropdown col-xs-4">
				  <?php    array_unshift($product, "Select Product"); 
		           echo form_dropdown('product',$product,'','class="form-control"');
				  ?>
	             </div>
	  </div>
       	<div class="form-group">
						      <label for="status" class="col-sm-2 control-label">Delivery Status:</label>
							   <div class="col-sm-3">
						      	<?php $options = array(''=>'Select Status','1'  => 'Completed','0' => 'In-Progress');
                               echo form_dropdown('status',$options,'','class="form-control"');
	                        	?> 
						      		
						   		</div>
						   </div>		
						   
						   <div class="form-group">
						      <label for="Delivered Quantity" class="col-sm-2 control-label">Delivery Quantity:</label>
						      	<div class="col-sm-10">
						      		<input type="text"  id="deliveredquantity" name="deliveredquantity"  value="<?php echo set_value('deliveredquantity'); ?>"  placeholder="Enter Delivery Quantity">
						   	  	</div>
						   </div>
						   	   <div class="form-group">
						<label for="Delivery Quantity" class="col-sm-2 control-label">Damaged Quantity:</label>
						
						      	<div class="col-sm-10">
						      		<input type="text"  id="damagedquantity" name="damagedquantity" value="<?php echo set_value('damagedquantity'); ?>" placeholder="Enter Damaged Quantity">
						   		</div>
						   </div>

						   <div class="form-group">
						      <label for="name" class="col-sm-2 control-label">Comments:</label>
						      	<div class="col-sm-10">
								
								  <textarea rows="3" class="form-control" value="<?php echo set_value('comments'); ?>" id="comments" placeholder="Comments" name="comments" ></textarea>
						      		</div>
						   </div>
						   <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							    	  <button type="submit" id="submit" class="btn btn-success btn-xs">Confirm</button>
							    	     <input type="reset" class="btn btn-default btn-xs" value="Reset" >
							         <!---<a type="button" href="<?php echo base_url();?>purchase/orderlist" class="btn btn-default btn-xs">Cancel</a>-->
							         </div>
							</div>

										 
						
						<?php echo form_close();?>
				
	</div>





