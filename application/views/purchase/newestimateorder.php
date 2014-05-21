<div class="col-sm-9 col-md-10 main">
<h1 class="page-header"><?php echo $title ?></h1>

 <!-- dynamic view content -->       
<div class="row placeholders">
 <?php echo validation_errors();   
      if(!empty($success)) echo $success; ?>
 

<?php 
       $attributes = array('class' => 'form-horizontal');
       echo form_open($form_action,$attributes);
    ?>
    <div class="form-group" >
            <label class="control-label col-xs-3" for="order_name"><b>Order Name:</b></label>
			  <input value="<?php echo set_value('order_name'); ?>"  id="order_name" placeholder="order Name" name="order_name" >
        </div> 
		
  
<?php foreach($estimation_list as $estimationlist):?>

        <div class="form-group" >
            <label class="control-label col-xs-3" for="SupplierName"><b>SupplierName:</b></label>
			  <input value="<?php echo $estimationlist->getSupplier()->getSupplierName();?>" name="SupplierName" id="SupplierName">
			  <input type="hidden" class="form-control" value="<?php echo $estimationlist->getEstimateId(); ?>" id="estimate_id"  name="estimate_id" >
        </div>
		<div class="form-group" >
            <label class="control-label col-xs-3" for="supplieremail"><b>Supplier Email ID:</b></label>
			  <input value="<?php echo $estimationlist->getSupplier()->getEmail();?>" name="supplieremail" id="supplieremail">
        </div> 
		
		<div class="form-group" >
            <label class="control-label col-xs-3" for="Address"><b>Address:</b></label>
			 <input id="address" name="address" value="<?php echo $estimationlist->getSupplier()->getStreet().','. $estimationlist->getSupplier()->getCity().','. $estimationlist->getSupplier()->getState().'-'. $estimationlist->getSupplier()->getZipCode();?>">
        </div>
		<div class="form-group" >
           <label class="control-label col-xs-3" for="supplierTelephone"><b>SupplierTelephone:</b></label>
			  <input value="<?php echo $estimationlist->getSupplier()->getTelephone();?>" name="supplierTelephone" id="supplierTelephone">
        </div>
		  <div class="form-group" >
           <label class="control-label col-xs-3" for="estimatedate"><b>EstimateDate:</b></label>
			  <input value="<?php echo $estimationlist->getCreatedDate()->format('d-m-y H:i:s'); ?>" name="estimatedate" id="estimatedate" >
        </div>
		 
<?php endforeach; ?>	
 <br>
<div class="table-responsive">
<table class="table table-bordered">
                 <thead> 
					<tr>
						<?php  foreach($tablehead as $table_head):?>	   
						<th><?php echo $table_head;?></th>
						<?php endforeach; ?>
					</tr>
				 </thead>
           		 
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php foreach($estimated_product as $product):?>
                    <tr>
    					
    					<td><input type="hidden" name="product_sku[]" value="<?php echo $product->getProductSku(); ?>" /> <?php echo $product->getProductSku(); ?>
</td>
    					<td ><input type="hidden" name="product_names[]" value="<?php echo $product->getProductName(); ?>" /><?php echo $product->getProductName(); ?></td>
    					<td ><textarea row="1" name="descriptions[]" /><?php echo $product->getDescription();?></textarea> </td>
                        <td ><input type="text" name="designShade[]" value="<?php echo $product->getDesignName(); ?>" /></td>
    					<td ><input type="text" name="dimensions[]"  value="<?php echo $product->getDimensions(); ?>" /></td>
    					<td ><input type="text" class="col-sm-6" name="quantities[]"  value="<?php echo $product->getQuantity(); ?>" /></td>
					
				<!--    <td class="align-center">
					<div class="btn-group">
					<a title="Delete" class="button align-center "  href="<?php echo site_url()."purchase/deleteorderproduct/".$product->getTempProductId();?>">Delete</a>
					
                         </div>
                    </td> -->
                    
				</tr>
				<?php endforeach; ?>
				</tbody>
									
				</table>

			</div>
			 <button class="btn btn-success btn-xs" type="submit" >Order Now</button>
			<a type="button" href="<?php echo base_url();?>purchase/estimatelist" class="btn btn-default btn-xs">Cancel</a>
	</form>		
</div>

<!-- dynamic view content end-->

</div>
