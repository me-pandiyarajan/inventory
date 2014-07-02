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
								<th>PLU</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>UnitPrice</th>
								<th>Tax</th>
								<th>Amount</th>
								<th colspan="2">Discount</th>
										
							</tr>
						</thead>
						<tbody >
						<?php foreach($invoices as $invoice):?>
							<tr> 
								<td><?php echo $invoice->getProductsProductGen()->getProductIdPlu(); ?></td>
								<td><?php echo $invoice->getProductsProductGen()->getProductName();?></td>
								<td><?php echo $invoice->getQuantity();?></td>
								<td><i class="fa fa-inr"> <?php echo $invoice->getUnitPrice();?></td>
								<td><?php echo $invoice->getTax();?> %</td>
								<td><i class="fa fa-inr"></i> <?php echo $amount = $invoice->getAmount();?> </td>
								<td><?php echo $discountper = $invoice->getDiscount();?> %</td>
								<td><i class="fa fa-inr"></i> <?php echo $discountAmount = $amount - ($amount * ($discountper/100));?></td>
							</tr>
							<?php $sales_subTotal += $discountAmount; ?>
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
						<?php  foreach($tablehead as $table_head):?>	   
						<th><?php echo $table_head;?></th>
						<?php endforeach; ?>
					</tr>
					</thead>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					<?php foreach($returns as $return):?>
						<tr> 
							<td><?php echo $return->getProductsProductGen()->getProductIdPlu(); ?></td>
							<td><?php echo $return->getProductsProductGen()->getProductName();?></td>
							<td><?php echo $return->getQuantity();?></td>
							<td>-</td>
							<td><?php echo $return->getTax();?> %</td>
							<td><i class="fa fa-inr"></i> <?php echo $r_amount = $return->getAmount(); ?></td>
						</tr>	
						<?php $returns_subTotal += $r_amount; ?>
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
								<tr><?php  foreach($tablehead as $table_head):?>	   
								<th><?php echo $table_head;?></th>
								<?php endforeach; ?></tr>
						</thead>
					<tbody role="alert" aria-live="polite" aria-relevant="all">
						<?php foreach($damaged as $damage):?>
								<tr> 
									<td><?php echo $damage->getProductsProductGen()->getProductIdPlu(); ?></td>
									<td><?php echo $damage->getProductsProductGen()->getProductName();?></td>
									<td><?php echo $damage->getQuantity();?></td>
									<td>-</td>
									<td><?php echo $damage->getTax();?> %</td>
									<td><i class="fa fa-inr"></i> <?php echo $damage_amount = $damage->getAmount();?></td>
									<td>-</td>
								</tr>
                            <?php $damaged_subTotal += $damage_amount; ?>								
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
			<!-- grand total -->
					
			<div class="row">
				<div class="table-responsive">
					<div class="row col-xs-5 pull-right ">
						<table class="table panel panel-default" >
							<tr>
								<td class="col-xs-5"><h5 >GRAND TOTAL :</h5></td>
								<td>
									<h4 class="text-success"><i class="fa fa-inr"></i> 
									<?php 
									$grand = $sales_subTotal - $returns_subTotal - $damaged_subTotal;
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



