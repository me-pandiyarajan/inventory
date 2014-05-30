	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Order Confirmation</h1>

	        	<?php echo validation_errors(); ?>
				<?php if(!empty($success)) echo $success; ?>
	        	<?php $attributes = array('class' => 'form-horizontal order-confirmation-class', 'id' =>'order-confirmation', 'name' => 'myform');
	            echo form_open_multipart($form_action,$attributes);?> 
				 <div class="form-group">
				 <input type="text"  id="temp_pro_id" name="temp_pro_id"  value="<?php echo set_value('temp_pro_id'); ?>"  hidden>
						   	  
			     <label class="control-label col-sm-2" for="product">Product Name</label>
			     <div class="dropdown col-xs-4">
			     	 <?php  array_unshift($product, "Select Product");
                     echo form_dropdown('product',$product,set_value('product'),'class="form-control" required');
                     ?>
				 
	             </div>
	  </div>
       	         <div class="form-group">
		 			      <label for="status" class="col-sm-2 control-label">Delivery Status:</label>
						   <div class="col-sm-4">
							  <select name="status" size="1" id="status" class="form-control" >
							  <option value=" " selected="selected">--Select Status-- </option>
							  <option value="1">Completed</option>
							  <option value="0">In-Progress</option>
							</select>  
						    </div>
						   </div>	
						  
						   <div class="form-group">
						      <label for="Delivered Quantity" class="col-sm-2 control-label">Delivery Quantity:</label>
						      	<div class="col-sm-10">
						      		<input type="text"  id="deliveredquantity" name="deliveredquantity"  value="<?php echo set_value('deliveredquantity'); ?>"  placeholder="Enter Delivery Quantity">
						   	  	</div>
						   </div>
						    <div class="form-group" id="Other" >
						<label for="Damaged Quantity" class="col-sm-2 control-label">Damaged Quantity:</label>
						
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
							    	  <button type="submit" class="btn btn-success btn-xs">Confirm</button>
							    	     <input type="reset" class="btn btn-default btn-xs" value="Reset" >
							         <!---<a type="button" href="<?php echo base_url();?>inventory/purchase/orderlist" class="btn btn-default btn-xs">Cancel</a>-->
							         </div>
							</div>

										 
						
						<?php echo form_close();?>
					
				
	</div>
<script>
function toggleOther(chosen){
if (chosen == '0') {
  document.getElementById('Other').style.visibility = 'visible';
} else {
  document.getElementById('Other').style.visibility = 'hidden';
  document.myform.other.value = '';
}
}
</script>



