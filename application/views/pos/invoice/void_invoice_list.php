<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Void Invoice</h2>
		 </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
         <!-- /.dynamic content -->
       
            <div class="col-lg-12">
            <?php if(!empty($void_invoices)): ?>
				<?php $invoice_subTotal = 0; ?>
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
								<th colspan="2">Discount</th>
										
							</tr>
						</thead>
						
						<tbody>
						<?php foreach ($void_invoices as $void):?>
						<?php 
							$invoice_id = $void->getInvoicesInvoiceid()->getInvoiceid();
						    $customer_name =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getCustomername();
							$customer_street =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getStreet();
							$customer_city =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getCity();
							$customer_state =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getState();
							$customer_zip =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getZipCode();
							$customer_phone =  $void->getInvoicesInvoiceid()->getPosCustomerCustomer()->getMobileNumber();
						?>
					<tr> 
					  <td><?php echo $void->getProductsProductGen()->getProductIdPlu();?></td>
					  <td><?php echo $void->getProductsProductGen()->getProductName();?></td>
					  <td><?php echo $void->getQuantity();?></td>
					  <td><i class="fa fa-inr"></i> <?php echo $void->getUnitPrice();?></td>
					  <td><?php echo $void->getTax();?> %</td>
					  <td><i class="fa fa-inr"></i> <?php echo $amount = $void->getAmount();?></td>
					  <td><?php echo $discount = $void->getDiscount();?> %</td>
					  <td><i class="fa fa-inr"></i> <?php echo $discountAmount = ($amount - ($amount * ($discount/100)));?></td>
					</tr>
					  <?php $invoice_subTotal += $discountAmount; ?>
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
									<h4 class="text-success">
									<i class="fa fa-inr"></i>
									<?php echo number_format($invoice_subTotal, 2); ?>
									</h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				 <div class="row col-xs-5 col-xs-offset-7 pull-right">
				     <a class="btn btn-danger btn-lg col-xs-12" href="<?php echo site_url()."pos/invoice/cancelvoid/".$invoice_id ?>">Cancel Invoice(void)</a>
				</div> 
			
			</div>
            <div class="row">
			<div class="table-responsive">
					<div class="row col-xs-6 pull-left ">
						
					<tr>
					<div class="form-group" >
					<!--<label class="control-label col-xs-6" for="CustomerName">Customer Name:</label>-->
					<p><?php echo $customer_name;?></p>
					<!--<label class="control-label col-xs-6" for="CustomerName">CustomerAddress:</label>-->
					<p><?php echo $customer_street; ?></p> 
					<p><?php echo $customer_city;?></p>
					<p><?php echo $customer_state;?> </p>
					<p><?php echo $customer_zip; ?></p>
					<!--<label class="control-label col-xs-6" for="CustomerName">Customer Phone:</label>-->
					<p><?php echo $customer_phone;?></p>
					</div>
					</div>	
					</div>
				</div>
		<?php else: ?>
		<div class="row">
				<p class="well text-danger"> No Invoice has been created today.</p>
		</div>	
		<?php endif; ?>

		
	</div>
       <!-- /.dynamic content end -->
    <!-- /.row -->
</div>



