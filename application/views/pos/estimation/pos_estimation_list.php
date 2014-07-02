<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Estimation List</h2>
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
            <?php $i = 0; ?>
			<?php foreach($Estimates_details as $Estimates): ?> 			
			<tr>
            		<?php
					$status = $Estimates->getStatus();
					if ($status == 0) { 
					$stat = '<span class="label label-danger">Void</span>';
					}
					else {
					$stat = '';
					}
					?>			
				<td><?php echo $Estimates->getEstimateid(); ?>   <?php echo $stat;?></td>
				<td><?php echo $customer_details[$i]->getCustomername(); ?> </td>
				<td><?php echo date("m-d-Y", $Estimates->getCreatedDate());?></td>
				<td>
				<div class="btn-group">
				 <a type="button" href="<?php echo site_url()."pos/estimation/view_estimation_details/".$Estimates->getEstimateid();?>" class="btn btn-info btn-outline btn-xs">View Estimate</a>
				</div>
				</td>
			</tr>
			<?php $i++; ?>	
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



