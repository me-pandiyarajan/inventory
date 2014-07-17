<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Safety Stock Level List</h1>
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
					    <?php
                        
                        foreach($data as $datum):
						
							if(!$datum->getSafetyStockLevel() == null){
								$SafetyStockLevel =  $datum->getSafetyStockLevel();
							}else{
								$SafetyStockLevel = "N/A";
							}
							if(!$datum->getCategoriesCategory() == null){
								$Category = $datum->getCategoriesCategory()->getCategoryName();
							}else{
								$Category = "N/A";
							}
													
                        ?>			
					<tr class="odd"> 
					<td class="align-center "><?php echo $datum->getSku();?></td>
					<td class="align-center "><?php echo $datum->getProductName();?></a></td>
					<td class="align-center "><?php echo $Category; ?></td>
					<td class="align-center "><?php echo $datum->getQuantity()." ".$datum->getUnit();?></td>
					<td class="align-center "><?php echo $SafetyStockLevel;?></td>
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
					<?php 
						if($visiblity == 1)
						{
						echo'
							<td class="align-center ">'.$datum->getPrice().'</td>
							<td class="align-center">'.$datum->getSafetyStockLevel().'</td>
							<td class="align-center">
							<div class="btn-group">
		                        <a class="btn btn-primary btn-xs" href="'.base_url().'inventory/purchase/addtoestimate/'.$datum->getproductGenId().'">Add to Estimate</a>
	                        </div>
	                        </td>';
						}
						?>
						<?php 
							if($visiblity == 2)
							{
							echo'<td class="align-center">
								<div class="btn-group">
	                             	<a class="btn btn-primary btn-xs" href="'.base_url().'inventory/purchase/addtoestimate/'.$datum->getproductGenId().'">Add to Estimate</a>
	                            </div>
                            </td>';
							}
							?>	
							
					</tr>	
	
				<?php endforeach; ?>  
					</tbody>
									
				</table>

			</div>
<div class="">
	<a type="button"  href="<?php echo base_url();?>inventory/dashboard/admin" class="btn btn-default btn-xs">Done</a>
</div>
<!-- dynamic view content end-->

</div>
