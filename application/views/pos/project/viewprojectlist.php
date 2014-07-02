
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Project detail</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">   

	<?php foreach($customer_details as $customer): ?> 

        <div class="form-group" >
            <label class="control-label col-xs-3" for="CustomerName"><b>Customer Name:</b></label>
			  <p><?php echo $customer->getPosCustomerCustomer()->getCustomername(); ?></p>
        </div>
		<div class="form-group" >
            <label class="control-label col-xs-3" for="customeremail"><b>Customer Email ID:</b></label>
			  <p><?php echo $customer->getPosCustomerCustomer()->getEmail(); ?></p>
        </div> 
		
		<div class="form-group" >
            <label class="control-label col-xs-3" for="Address"><b>Customer Address:</b></label>
			  <p><?php echo $customer->getPosCustomerCustomer()->getStreet().','. $customer->getPosCustomerCustomer()->getCity().','. $customer->getPosCustomerCustomer()->getState().'-'. $customer->getPosCustomerCustomer()->getZipCode();?></p>
        </div>
	<?php endforeach; ?>	 

<div class="table-responsive">

			<table class="table table-bordered">
			 <thead> 
				<tr>
					<?php  foreach($tablehead as $table_head):?>	   
					<th><?php echo $table_head;?></th>
					<?php endforeach; ?>
				</tr>
			 </thead>
           		 
			<tbody >
				<?php foreach($products_sold as $sold): ?> 		
					<tr > 
						<td ><?php echo $sold->getProductsProductGen()->getProductIdPlu(); ?></td>
						<td ><?php echo $sold->getProductsProductGen()->getProductName(); ?></td>
						<td ><?php echo $sold->getQuantity(); ?></td>
						<td ><i class="fa fa-inr"></i> <?php echo $sold->getUnitPrice(); ?></td>
						<td ><?php echo $sold->getDiscount()."%"; ?></td>
						<td ><?php echo $sold->getTax()."%"; ?></td>
						<td ><i class="fa fa-inr"></i> <?php echo $sold->getAmount(); ?></td>
						<td ><span class="label label-success">Sold</span></td>
					</tr>	
				<?php endforeach; ?>
				<?php foreach($products_unsold as $unsold): ?> 		
					<tr > 
						<td ><?php echo $unsold->getProductsProductGen()->getProductIdPlu(); ?></td>
						<td ><?php echo $unsold->getProductsProductGen()->getProductName(); ?></td>
						<td ><?php echo $unsold->getQuantity(); ?></td>
						<td >
							<i class="fa fa-inr"></i>
							<?php echo $unsold->getProductsProductGen()->getPrice(); ?>
						</td>
						<td > - </td>
						<td > - </td>
						<td ><i class="fa fa-inr"></i> <?php echo $unsold->getAmount(); ?></td>
						<td ><span class="label label-warning">Unsold</span></td>
					</tr>	
				<?php endforeach; ?>
			</tbody>
							
			</table>
    
			</div>
<a type="button" href="<?php echo base_url();?>pos/project/projectlist" class="btn btn-default btn-xs">Done</a>
			
         
  			</div>
   		</div>
   </div>
       <!-- /.dynamic content end -->
    <!-- /.row -->
</div>