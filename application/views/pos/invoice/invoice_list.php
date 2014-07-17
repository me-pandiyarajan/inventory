<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Invoice List</h2>
		 </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php if ( $this->session->flashdata('delivered') ) echo $this->session->flashdata('delivered'); ?>
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
					if($invoice->getPosCustomerCustomer() != null){
						echo $invoice->getPosCustomerCustomer()->getCustomername(); 
					}else{echo "N/A";}
					?>
				</td>
				<td><?php echo date("d-m-Y", $invoice->getCreatedDate()); ?></td>
				<?php 
					$status = $invoice->getStatus();
					if ($status == 0) 
					{ 
					$stat = '<span class="label label-danger">Void</span>';
					
					}
					elseif ($status == 1)
					{
					$stat = '<span class="label label-success">Delivered</span>';	
					}					
					else 
				    {
					$stat = '<span class="label label-info">In-Progress</span>';

				  
					}
					?>		
					<td> <?php echo $stat;?></td>
				<td>
				<div class="btn-group">
				 <a type="button" href="<?php echo site_url()."pos/invoice/view_invoice/".$invoice->getInvoiceid();?>" class="btn btn-info btn-outline btn-xs">View Invoice</a>
				<?php if($status == 2) : ?> 
				<a type="button" href="<?php echo site_url()."pos/invoice/Delivered/".$invoice->getInvoiceid();?>" class="btn btn-info btn-outline btn-xs">Delivered</a>
				<?php endif;	?>
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



