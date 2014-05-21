<div class="col-sm-9 col-md-10 main">
<h1 class="page-header"><?php echo $title ?></h1>

 <!-- dynamic view content -->       
<div class="row placeholders">
	 <?php if ( $this->session->flashdata('deleteestimate') ) echo $this->session->flashdata('cancelorder'); ?>
	 
<?php foreach($estimation_list as $estimationlist):?>

        <div class="form-group" >
            <label class="control-label col-xs-3" for="SupplierName"><b>SupplierName:</b></label>
			  <p><?php echo $estimationlist->getSupplier()->getSupplierName();?></p>
        </div>
		<div class="form-group" >
            <label class="control-label col-xs-3" for="supplieremail"><b>Supplier Email ID:</b></label>
			  <p><?php echo $estimationlist->getSupplier()->getEmail();?></p>
        </div> 
		
		<div class="form-group" >
            <label class="control-label col-xs-3" for="Address"><b>Address:</b></label>
			  <p><?php echo $estimationlist->getSupplier()->getStreet().','. $estimationlist->getSupplier()->getCity().','. $estimationlist->getSupplier()->getState().'-'. $estimationlist->getSupplier()->getZipCode();?></p>
        </div>
		<div class="form-group" >
           <label class="control-label col-xs-3" for="supplierTelephone"><b>SupplierTelephone:</b></label>
			  <p><?php echo $estimationlist->getSupplier()->getTelephone();?></p>
        </div>
		  <div class="form-group" >
           <label class="control-label col-xs-3" for="estimatedate"><b>EstimateDate:</b></label>
			  <p><?php echo $estimationlist->getCreatedDate()->format('d-m-y H:i:s'); ?></p>
        </div>
		  <div class="form-group" >
           <label class="control-label col-xs-3" for="createdby"><b>Created by:</b></label>
			  <p><?php echo $estimationlist->getCreatedBy(); ?></p>
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
            	<td class="align-center "><?php echo $product->getDescription(); ?></td>
            	<td class="align-center "><?php echo $product->getDesignName(); ?></td>
				<td class="align-center "><?php echo $product->getDimensions(); ?></td>
				<td class="align-center"><?php echo $product->getQuantity(); ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
									
				</table>

			</div>
			<a type="button" href="<?php echo base_url();?>purchase/estimatelist" class="btn btn-default btn-xs">Done</a>
</div>

<!-- dynamic view content end-->

</div>
