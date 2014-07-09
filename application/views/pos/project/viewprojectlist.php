
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Project detail</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
     <div class="row">
 
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

	 <br><br><br>
	 <?php 
			$sold_subTotal = 0;
			$unsold_subTotal=0;
			?>
<div class="row">
<div class="table-responsive">

			<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">Product</th>
					<th rowspan="2">Quantity</th>
					<th rowspan="2">Unit Price</th>
					<th rowspan="2">Amount</th>
					<th rowspan="2">Discount</th>
					<th colspan="2">Total</th>
					<th rowspan="2">Status</th>
				</tr>
				<tr>
					<th >Tax</th>
					<th >Tax Total</th>
					
				</tr>
				
			</thead>
			 
           		 
			<tbody>
				<?php foreach($products_sold as $sold): ?> 	

                <?php 
					$price = $sold->getUnitPrice();
					$quantity = $sold->getQuantity();
					
					$discountper = $sold->getDiscount();

					$amount = $price * $quantity;
					$discount_price = $amount * ($discountper/100);
					
					$sold_total = $sold->getAmount();
				?>
							<tr> 
								<td><?php echo $sold->getProductsProductGen()->getProductName();?><br>
									<i><?php echo $sold->getProductsProductGen()->getProductIdPlu(); ?></i>
								</td>
								<td><?php echo $quantity." ".$sold->getProductsProductGen()->getUnit();?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($price,2); ?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($amount,2); ?> </td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($discount_price,2); ?></td>
								<td><?php echo $sold->getTax(); ?> %</td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($sold_total,2);?></td>
								<td ><span class="label label-success">Sold</span></td>
							</tr>				
					<?php $sold_subTotal += $sold_total; ?>	
				<?php endforeach; ?>
				</tbody>
				</table>
				</div>
				</div>
				<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-10 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-3"><h5 >Subtotal :</h5></td>
								<td>
									<h4>
									<i class="fa fa-inr"></i>
									<?php echo number_format($sold_subTotal, 2); ?>
									</h4>
								</td>
								<td class="col-xs-3"><h5 >Advance :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i> 
									<?php 
									echo number_format($advances,2); 
									?>
									
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
			<!--  Advance -->
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
						
							<tr>
								<td class="col-xs-5"><h5 >TOTAL :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i>
									
									<?php 
									
									$total_sold = $sold_subTotal - $advances;
									echo number_format($total_sold,2); 
								?>
									</h4>
								</td>
							</tr>
							
						</table>
					</div>
				</div>
			</div>
			<?php if(!empty($products_unsold)) : ?>
			<div class="row">
           <div class="table-responsive">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">Product</th>
					<th rowspan="2">Quantity</th>
					<th rowspan="2">Unit Price</th>
					<th rowspan="2">Amount</th>
					<th rowspan="2">Discount</th>
					<th colspan="2">Total</th>
					<th rowspan="2">Status</th>
				</tr>
				<tr>
					<th >Tax</th>
					<th >Tax Total</th>
					
				</tr>
				
			</thead>
			         		 
			<tbody>		
		
				<?php foreach($products_unsold as $unsold): ?> 	
                 <?php 
					$price = $unsold->getUnitPrice();
					$quantity = $unsold->getQuantity();
					
					$discountper = $unsold->getDiscount();

					$amount = $price * $quantity;
					$discount_price = $amount * ($discountper/100);
					
					$sold_total = $unsold->getAmount();
				?>	
                    	<tr> 
								<td><?php echo $sold->getProductsProductGen()->getProductName();?><br>
									<i><?php echo $sold->getProductsProductGen()->getProductIdPlu(); ?></i>
								</td>
								<td><?php echo $quantity." ".$sold->getProductsProductGen()->getUnit();?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($price,2); ?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($amount,2); ?> </td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($discount_price,2); ?></td>
								<td><?php echo $sold->getTax(); ?> %</td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($unsold_total,2);?></td>
								<td ><span class="label label-success">Unsold</span></td>
							</tr>				
				
                        <?php $unsold_subTotal += $unsold_total; ?>					
				<?php endforeach; ?>
			</tbody>
							
			</table>
    
			</div>
			</div>
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-5"><h5 >SUBTOTAL :</h5></td>
								<td>
									<h4>
									<i class="fa fa-inr"></i>
									<?php echo number_format($unsold_subTotal,2); ?>
									</h4>
									
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
			<?php endif; ?>
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-5"><h5 >GRAND TOTAL :</h5></td>
								<td>
									<h4>
									<i class="fa fa-inr"></i>
									<?php 
									echo number_format($total_sold+$unsold_subTotal,2); ?>
									</h4>
									
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
<a type="button" href="<?php echo base_url();?>pos/project/projectlist" class="btn btn-default btn-xs">Done</a>
			
         
		

</div>
    <!-- /.row -->
</div>