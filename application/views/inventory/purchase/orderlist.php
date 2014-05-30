<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Order list</h1>
 <!-- dynamic view content -->       
   <div class="row placeholders">
   <?php if ( $this->session->flashdata('cancelorder') ) echo $this->session->flashdata('cancelorder'); ?>
        <div class="table-responsive">
		<table class="table table-bordered table-striped">
            <thead> 
				<tr>
							<?php  foreach($tablehead as $table_head):?>	   
							<th><?php echo $table_head;?></th>
							<?php endforeach; ?>
				</tr>
			</thead>
					<?php
                        foreach($data as $datum):
						?>
					<tbody role="alert" aria-live="polite" aria-relevant="all">
	
					<tr> 
					<td class="align-center "><?php echo $datum->getOrderId();?></td>
					<td class="align-center "><?php echo $datum->getOrderName();?></td>
					<td class="align-center "><?php echo $supplier_name; ?></td>
					<td class="align-center "><?php echo $datum->getCreatedDate()->format('d-m-y H:i:s');?></td>
					<?php 
					$status = $datum->getDeliveryStatus();
					if ($status == 1) 
					{ 
					$stat = '<span class="label label-success">Delivered</span>';
					
					}
					elseif ($status == 2)
					{
					$stat = '<span class="label label-info">In-Progress</span>';	
					}					
					else
				    {
					$stat = '<span class="label label-danger">Cancelled</span>';
					}
					
					?>
					<td class="align-center "><?php echo $stat;?></td>
				
						<?php 
							if($visiblity == 1)
							{
							echo'
						  <td class="align-center"><div class="btn-group">
 
						  <a class="btn btn-primary btn-xs" href="vieworder/'.$datum->getOrderId().'">view</a>
                           <a class="btn btn-primary btn-xs" href="orderconfirmation/'.$datum->getEstimate()->getEstimateId().'">Delivered</a>
						   <a class="btn btn-primary btn-xs" href="ordercancel/'.$datum->getOrderId().'">Cancel</a>
						 
                           </div>
                           </td>';
							}if($visiblity == 2)
							{
							echo'
						  <td class="align-center"><div class="btn-group">
						   <a class="btn btn-primary btn-xs" href="vieworder/'.$datum->getOrderId().'">view</a>
                          <a class="btn btn-primary btn-xs" href="orderconfirmation/'.$datum->getEstimate()->getEstimateId().'">Delivered</a>
						    <a class="btn btn-primary btn-xs" href="ordercancel/'.$datum->getOrderId().'">Cancel</a>
                             </div>
                           </td>';
							}
							?>
					</tr>
<?php endforeach; ?>  					
				</tbody>

				</table>
			</div>
	 </div>

<!-- dynamic view content end-->

</div>
