<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Invoice</h2>
		 </div>
	
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
         <!-- /.dynamic content -->
            <div class="col-lg-12">
			<?php 
			$sales_subTotal = 0;
			$returns_subTotal = 0;
			$damaged_subTotal = 0;
			?>
			<!-- sales data -->
			<div class="row">
				<h4>SALES</h4>
				<div class="table-responsive">
					<table class="table table-bordered table-striped" >
						<thead>
							<tr>
								<th rowspan="2">Product</th>
								<th rowspan="2">Quantity</th>
								<th rowspan="2">Unit Price</th>
								<th rowspan="2">Amount</th>
								<th rowspan="2">Discount</th>
								<th colspan="2">Total</th>
							</tr>
							<tr>
								<th >Tax</th>
								<th >Tax Total</th>
							</tr>
						</thead>
						<tbody >
						<?php foreach($invoices as $invoice):?>
						<?php 
								$price = $invoice->getUnitPrice();
								$quantity = $invoice->getQuantity();
								
								$discountper = $invoice->getDiscount();

								$amount = $price * $quantity;
								$discount_price = $amount * ($discountper/100);
								
								$sales_total = $invoice->getAmount();
							?>
							<tr> 
								<td><?php echo $invoice->getProductsProductGen()->getProductName();?><br>
									<i><?php echo $invoice->getProductsProductGen()->getProductIdPlu(); ?></i>
								</td>
								<td><?php echo $quantity." ".$invoice->getProductsProductGen()->getUnit();?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($price,2); ?></td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($amount,2); ?> </td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($discount_price,2); ?></td>
								<td><?php echo $invoice->getTax(); ?> %</td>
								<td><i class="fa fa-inr"></i> <?php echo number_format($sales_total,2);?></td>
							</tr>
							<?php $sales_subTotal += $sales_total; ?>
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
									<h4 class="text-danger">
									<i class="fa fa-inr"></i>
									<?php echo number_format($sales_subTotal, 2); ?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
			
			<?php if(!empty($returns)) : ?> 
			<!-- RETURN data -->
			<div class="row">
			<h4>RETURN</h4>
				<div class="table-responsive">
				 <table class="table table-bordered table-striped" >
					<thead>
							<tr>
								<th rowspan="2">Product</th>
								<th rowspan="2">Quantity</th>
								<th rowspan="2">Unit Price</th>
								<th rowspan="2">Amount</th>
								<th rowspan="2">Discount</th>
								<th colspan="2">Total</th>
							</tr>
							<tr>
								<th >Tax</th>
								<th >Tax Total</th>
							</tr>
						</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					<?php foreach($damaged as $damage):?>
						    <?php 
									$price = $return->getProductsProductGen()->getPrice();
									$quantity = $return->getQuantity();
									$discountper = $return->getDiscount();
									$amount = $price * $quantity;
									$discount_price = $amount * ($discountper/100);
									$return_total = $return->getAmount();
						?>
								<tr> 
							<td><?php echo $return->getProductsProductGen()->getProductName();?><br>
								<i><?php echo $return->getProductsProductGen()->getProductIdPlu(); ?></i>
							</td>
							<td><?php echo $quantity." ".$return->getProductsProductGen()->getUnit();?></td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($price,2); ?></td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($amount,2); ?> </td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($discount_price,2); ?></td>
							<td><?php echo $return->getTax(); ?> %</td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($return_total,2);?></td>
						</tr>
							<?php $return_subTotal += $return_total; ?>
								
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
									<h4 class="text-warning">
									<i class="fa fa-inr"></i>
									<?php echo number_format($returns_subTotal,2); ?>
									</h4>
								</td>
		
							</tr>
						</table>
					</div>
				</div>
			</div>
			<?php endif; ?> 
			
			
			<!-- DAMAGED data -->
			<?php if(!empty($damaged)) : ?> 
			<div class="row">
			<h4>DAMAGED</h4>
				<div class="table-responsive">
					<table class="table table-bordered table-striped" >
						<thead>
							<tr>
								<th rowspan="2">Product</th>
								<th rowspan="2">Quantity</th>
								<th rowspan="2">Unit Price</th>
								<th rowspan="2">Amount</th>
								<th rowspan="2">Discount</th>
								<th colspan="2">Total</th>
							</tr>
							<tr>
								<th >Tax</th>
								<th >Tax Total</th>
							</tr>
						</thead>
					<tbody role="alert" aria-live="polite" aria-relevant="all">
						
						<?php foreach($damaged as $damage):?>
						    <?php 
									$price = $damage->getProductsProductGen()->getPrice();
									$quantity = $damage->getQuantity();
									$discountper = $damage->getDiscount();
									$amount = $price * $quantity;
									$discount_price = $amount * ($discountper/100);
									$damaged_total = $damage->getAmount();
						?>
								<tr> 
							<td><?php echo $damage->getProductsProductGen()->getProductName();?><br>
								<i><?php echo $damage->getProductsProductGen()->getProductIdPlu(); ?></i>
							</td>
							<td><?php echo $quantity." ".$damage->getProductsProductGen()->getUnit();?></td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($price,2); ?></td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($amount,2); ?> </td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($discount_price,2); ?></td>
							<td><?php echo $damage->getTax(); ?> %</td>
							<td><i class="fa fa-inr"></i> <?php echo number_format($damaged_total,2);?></td>
						</tr>
							<?php $damaged_subTotal += $damaged_total; ?>
								
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
									<h4 class="text-danger">
									<i class="fa fa-inr"></i>
									<?php echo number_format($damaged_subTotal,2); ?>
									</h4>
								</td>
		
							</tr>
						</table>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!--  total -->
					
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-5"><h5 >TOTAL :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i> 
								
									<?php 
									$total = $sales_subTotal - $returns_subTotal;
									echo number_format($total,2); 
									?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
				<!--  Advance -->
				<?php if(!empty($advances)) : ?> 
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
						
							<tr>
								<td class="col-xs-5"><h5 >Advance :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i> 
									<?php echo number_format($advances,2); ?>
									</h4>
								</td>
							</tr>
							
						</table>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!--  GRAND -->
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-5"><h5 >GRAND TOTAL :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i> 
									<?php 
									if( $total > 0 ) {
										$grand = $total - $advances;
									} else {
										$grand = $advances;
									}
									echo number_format($grand,2); 
									?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
            </div>
	       </div>
   </div>
       <!-- /.dynamic content end -->
    <!-- /.row -->
</div>



