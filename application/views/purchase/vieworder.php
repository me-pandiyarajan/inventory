<div class="col-sm-9 col-md-10 main">
<h1 class="page-header"><?php echo $title ?></h1>
 <!-- dynamic view content -->       
<div class="row placeholders">
<?php foreach($supplier_name as $suppliers):?>
<?php foreach($order as $ord):?>
        <div class="form-group" >
            <label class="control-label col-xs-3" for="SupplierName"><b>SupplierName:</b></label>
			  <p><?php echo $suppliers->getSupplier()->getSupplierName();?></p>
        </div>
		<div class="form-group" >
            <label class="control-label col-xs-3" for="supplieremail"><b>Supplier Email ID:</b></label>
			  <p><?php echo $suppliers->getSupplier()->getEmail();?></p>
        </div> 
		
		<div class="form-group" >
            <label class="control-label col-xs-3" for="Address"><b>Address:</b></label>
			  <p><?php echo $suppliers->getSupplier()->getStreet().','. $suppliers->getSupplier()->getCity().','. $suppliers->getSupplier()->getState().'-'. $suppliers->getSupplier()->getZipCode();?></p>
        </div>
		<div class="form-group" >
           <label class="control-label col-xs-3" for="supplierTelephone"><b>SupplierTelephone:</b></label>
			  <p><?php echo $suppliers->getSupplier()->getTelephone();?></p>
        </div>
		
      <div class="form-group" >
           <label class="control-label col-xs-3" for="OrderDate"><b>OrderDate:</b></label>
			  <p><?php echo $ord->getCreatedDate()->format('d-m-y H:i:s'); ?></p>
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
				<tr class="odd"> 
				<td class="align-center "><?php echo $product->getProductSku(); ?></td>
				<td class="align-center "><?php echo $product->getProductName(); ?></td>
				
				<td class="align-center"><?php echo $product->getQuantity(); ?></td>
				<?php
					$status = $ord->getDeliveryStatus();
					if($status == 1){$stat = '<span class="label label-success">Delivered</span>';}
					elseif($status == 2){$stat = '<span class="label label-info">In-Progress</span>';$stat = "In-Progress";}
					else{$stat = '<span class="label label-danger">Cancelled</span>';}
					?>
				<td class="align-center "><?php echo $stat; ?></td>
			
				<?php endforeach; ?>
				</tr>	
	            <?php endforeach; ?>
				</tbody>
									
				</table>
      
			</div>

			
           <a type="button" href="<?php echo base_url();?>purchase/orderlist" class="btn btn-default btn-xs">Done</a>
		

</div>

<!-- dynamic view content end-->

</div>
