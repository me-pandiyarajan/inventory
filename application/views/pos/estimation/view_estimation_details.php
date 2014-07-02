<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">View Estimation </h2>
		 </div>
	
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
         <!-- /.dynamic content -->
            <div class="col-lg-12">
			<?php 
			$estimation_Total = 0;?>
			<!-- sales data -->
			<div class="row">
				
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
								
										
							</tr>
						</thead>
						<tbody >
						    <?php foreach($product as $products):?>
							<tr> 
							
								<td><?php echo $products->getProductsProductGen()->getProductIdPlu(); ?></td>
								<td><?php echo $products->getProductsProductGen()->getProductName(); ?></td>
								<td><?php echo $products->getQuantity();?></td>
								<td><i class="fa fa-inr"><?php echo $products->getProductsProductGen()->getPrice(); ?></td>
								<td><?php echo $tax = $products->getProductsProductGen()->getPosTaxTaxClass()->getTaxPercent(); ?> %</td>
								<td><i class="fa fa-inr"><?php echo $products_amount = $products->getAmount();?></td>
								<?php  $totalAmount = $products_amount + ($products_amount * ($tax/100));?>
								</tr>
								<?php $estimation_Total += $totalAmount; ?>
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
								<td class="col-xs-5"><h5 >TOTAL :</h5></td>
								<td>
									<h4 class="text-danger">
									<i class="fa fa-inr"></i>
									<?php echo number_format($estimation_Total, 2); ?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
			</div>
			       <!-- /.dynamic content end -->
    <!-- /.row -->
</div>

			
	



