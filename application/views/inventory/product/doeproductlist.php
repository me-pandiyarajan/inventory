<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Product list</h1>
<?php if ( $this->session->flashdata('EditProduct') ) echo $this->session->flashdata('EditProduct'); 
if ( $this->session->flashdata('ProductNot') ) echo $this->session->flashdata('ProductNot');?>

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
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php foreach($data as $datum):?>								
					<tr class="odd"> 
						<td class="align-center "><?php echo $datum->getSku();?></td>
						<td class="align-center "><?php echo $datum->getProductName();?></td>
						<?php 
									$status = $datum->getStatus();
									if ($status == 0) 
									{ 
									$stat = '<span class="label label-danger">Disable</span>';
									
									}
														else 
									{
									$stat = '<span class="label label-success">Enable</span>';
									}
									?>					
						<td class="align-center "><?php echo $stat;?></td>
						<td>				
					   <div class="btn-group">
						
							<a type="button" href="productDetails/<?php echo $datum->getproductGenId();?>/productview" class="btn btn-info btn-outline btn-xs">View</a>
							
							<?php  $approved = $datum->getApproved(); if($approved == 3) : ?> 
							<a type="button" href="productDetails/<?php echo $datum->getproductGenId();?>/productedit/dp" class="btn btn-info btn-outline btn-xs">Edit</a>
							<?php endif;	?>
						</div></td>
					</tr>
				<?php endforeach; ?>  
			</tbody>				
		</table>
	</div>
<!-- dynamic view content end-->
</div>
