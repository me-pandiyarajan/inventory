<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Invoice List</h2>
		 </div>
		  <?php if ( $this->session->flashdata('cancelvoid') ) echo $this->session->flashdata('cancelvoid'); ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
         <!-- /.dynamic content -->
            <div class="col-lg-12">
			<div class="table-responsive">
	        <table class="table table-bordered table-striped" >
		    <thead> 
			<tr><?php  foreach($tablehead as $table_head):?>	   
						   		<th><?php echo $table_head;?></th>
					     		<?php endforeach; ?></tr>
			</thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php foreach($invoice_details as $invoice): ?> 			
			<tr>		
				<td> 
				<?php 
					if($invoice->getStatus() == 0){
						echo '<span class="label label-danger">'.$invoice->getInvoiceNumber().' VOID </span>';
					} else {
						echo $invoice->getInvoiceNumber();
					}
				 ?>
				</td>
				<td>
					<?php 
					if($invoice->getPosCustomerCustomer() != null){
						echo $invoice->getPosCustomerCustomer()->getCustomername(); 
					}else{echo "N/A";}
					?>
				</td>
				<td><?php echo date("d-m-Y", $invoice->getCreatedDate()); ?></td>
				<td>
				<div class="btn-group">
				 <a type="button" href="<?php echo site_url()."pos/invoice/view_invoice/".$invoice->getInvoiceid();?>" class="btn btn-info btn-outline btn-xs">View Invoice</a>
				</div>
				</td>
			</tr>	
			<?php endforeach; ?>
			</tbody>
			</table>
            </div>
	       </div>
   </div>
   </div>
       <!-- /.dynamic content end -->
    <!-- /.row -->
</div>



