<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Estimate list</h1>

 <?php
 if ( $this->session->flashdata('create_estimate') ) echo $this->session->flashdata('create_estimate'); 
 
 if ( $this->session->flashdata('ordersend') ) echo $this->session->flashdata('ordersend'); 
 if ( $this->session->flashdata('deleteestimate') ) echo $this->session->flashdata('deleteestimate');?>
 <!-- dynamic view content -->       
   
         <div class="table-responsive">
			 <table class="table table-bordered table-striped">
                  <thead> 
						<tr>
							<?php  foreach($tablehead as $table_head):?>	   
							<th><?php echo $table_head;?></th>
							<?php endforeach; ?>
						</tr>
				    </thead>
					
                		
					<tbody>
                	<?php foreach($data as $datum): ?>
					<tr> 
						<td ><?php echo $datum->getEstimateId();?></td>
						<td ><?php echo $datum->getEstimateName();?></td>
						<td ><?php echo $datum->getSupplier()->getSupplierName();?></td>
					 <?php 
						$status = $datum->getStatus();
					
						if ($status == 1){ 
						   $stat = '<span class="label label-success">Ordered</span>';
						}elseif ($status == 2){
							$stat = '<span class="label label-info">In-Progress</span>';
						}elseif ($status == 0){
					     	$stat = '<span class="label label-danger">Cancelled</span>';
						}
			
					?> 
					<td ><?php echo $stat;?></td>
					
					<td ><?php $data= $datum->getCreatedDate();echo date("d-m-Y", $data);?></td>
					<!--<td >'.$datum->getCreatedBy().'</td>-->
					
						<td class="align-center">
							<div class="btn-group">
						<?php 
							if($visiblity == 1 && $status == 1)
							{
								echo '
								<a class="btn btn-default btn-xs disabled" href="#" >Order Now</a>
	                            <a class="btn btn-default btn-xs disabled" href="#">Edit</a>
								<a class="btn btn-info btn-xs " href="viewestimate/'.$datum->getEstimateId().'">view</a>
								<a class="btn btn-default btn-xs disabled" href="#">Cancel</a>
								';
							}
							elseif($visiblity == 1 && $status == 2)
							{
								echo'						
	                            <a class="btn btn-success btn-xs" href="newestimateorder/'.$datum->getEstimateId().'" >Order Now</a>
	                            <a class="btn btn-warning btn-xs" href="estimateDetails/'.$datum->getEstimateId().'/edit_estimate">Edit</a>
								<a class="btn btn-info btn-xs" href="viewestimate/'.$datum->getEstimateId().'">view</a>
								<a class="btn btn-danger btn-xs" href="deleteestimate/'.$datum->getEstimateId().'">Cancel</a>
								 ';
							}
							elseif($visiblity == 1)
							{ 
								echo '
								<a class="btn btn-default btn-xs disabled" href="#" >Order Now</a>
	                            <a class="btn btn-default btn-xs disabled" href="#">Edit</a>
								<a class="btn btn-info btn-xs " href="viewestimate/'.$datum->getEstimateId().'">view</a>
								<a class="btn btn-default btn-xs disabled" href="#">Cancel</a>
								';
							}
							if($visiblity == 2)
							{
								echo'
								<a class="btn btn-default btn-xs disabled" href="#" >Order Now</a>
	                            <a class="btn btn-default btn-xs disabled" href="#">Edit</a>
								<a class="btn btn-info btn-xs " href="viewestimate/'.$datum->getEstimateId().'">view</a>
								<a class="btn btn-default btn-xs disabled" href="#">Cancel</a>
								';
							}
							?>
							 </div>
                           </td>
					</tr>
				  <?php endforeach; ?>  
				</tbody>
					
				</table>
			</div>


<!-- dynamic view content end-->

</div>
