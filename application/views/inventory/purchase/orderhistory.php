<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Order History</h1>
 <!-- dynamic view content --> 
   			
   <div class="row placeholders">
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
	                 <?php
					foreach($order as $ord):?>
					<tr class="odd"> 
					<td class="align-center "><?php echo $ord->getOrderId(); ?></td>
					<td class="align-center "><?php echo $ord->getOrderName(); ?></td>
					<td class="align-center "><?php echo $ord->getCreatedDate()->format('d-m-y H:i:s');?></td>
					<?php
					$status = $ord->getDeliveryStatus();
					if($status == 1){$stat = '<span class="label label-success">Delivered</span>';}
					elseif($status == 2){$stat = '<span class="label label-info">In-Progress</span>';$stat = "In-Progress";}
					else{$stat = '<span class="label label-danger">Cancelled</span>';}
					?>
					<td class="align-center "><?php echo $stat;?></td>
				    <td class="align-center"><div class="btn-group">
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url('purchase/vieworderhistory/'.$ord->getOrderId());?>">view</a>
                     </div> </td>    
					</tr>	
					<?php endforeach;?>  
				  </tbody>
    			</table>
			</div>
			
	 </div>

<!-- dynamic view content end-->

</div>
