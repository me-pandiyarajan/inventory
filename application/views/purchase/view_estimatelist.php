<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Estimate list</h1>

 <?php if ( $this->session->flashdata('ordersend') ) echo $this->session->flashdata('ordersend'); 
 if ( $this->session->flashdata('deleteestimate') ) echo $this->session->flashdata('deleteestimate');?>
 <!-- dynamic view content -->       
   
         <div class="table-responsive">
			 <table class="table table-bordered">
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
	
					<tr class="odd"> 
					<td class="align-center "><?php echo $datum->getEstimateId();?></td>
					<td class="align-center "><?php echo $datum->getEstimateName();?></td>
					<td class="align-center "><?php echo $datum->getSupplier()->getSupplierName();?></td>
					 <?php 
					$status = $datum->getStatus();
					
					if ($status == 1) 
					{ 
					   $stat = '<span class="label label-success">Ordered</span>';
					
					}
					elseif ($status == 2)
					{
					$stat = '<span class="label label-info">In-Progress</span>';
				
					}
					elseif ($status == 0)
				    {
				     $stat = '<span class="label label-danger">Cancelled</span>';
					}
				
					
					?> 
					<td class="align-center "><?php echo $stat;?></td>
					
					
					<td class="align-center "><?php echo $datum->getCreatedDate()->format('d-m-y H:i:s');?></td>
					<!--<td class="align-center ">'.$datum->getCreatedBy().'</td>-->
					
						<?php 
							if($visiblity == 1 && $status == 1)
							{
							echo'
							<td class="align-center"><div class="btn-group">
							<a class="btn btn-primary btn-xs" href="viewestimate/'.$datum->getEstimateId().'">view</a>
							 </div>
                           </td>';
							}
							elseif($visiblity == 1 && $status == 2)
							{
								echo'
							<td class="align-center"><div class="btn-group">
                            <a class="btn btn-primary btn-xs" href="newestimateorder/'.$datum->getEstimateId().'" >Order Now</a>
                            <a class="btn btn-primary btn-xs" href="estimateDetails/'.$datum->getEstimateId().'/edit_estimate">Edit</a>
							<a class="btn btn-primary btn-xs" href="viewestimate/'.$datum->getEstimateId().'">view</a>
							<a class="btn btn-primary btn-xs" href="deleteestimate/'.$datum->getEstimateId().'">Cancel</a>
							   </div>
                           </td>';
							}
							elseif($visiblity == 1)
							{
								echo'
							<td class="align-center"><div class="btn-group">
                          	<a class="btn btn-primary btn-xs" href="viewestimate/'.$datum->getEstimateId().'">view</a>
						   </div>
                           </td>';
							}
							if($visiblity == 2)
							{
							echo'
							<td class="align-center"><div class="btn-group">
						    <a class="btn btn-primary btn-xs" href="viewestimate/'.$datum->getEstimateId().'">view</a>
					        </div>
                           </td>';
							}
							?>
					</tr>
				
				</tbody>
					<?php endforeach; ?>  
				</table>
			</div>


<!-- dynamic view content end-->

</div>
