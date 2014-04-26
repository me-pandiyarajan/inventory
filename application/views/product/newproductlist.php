<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">New Product list</h1>
 <!-- dynamic view content -->       
<div class="row placeholders">
<div class="table-responsive">
<table  id="newproducttable" name="table1" class="table table-bordered">
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
						
						if(!$datum->getSuppliersSupplier() == null){
							$supplier =  $datum->getSuppliersSupplier()->getSupplierName();
						}else{
							$supplier = "N/A";
						}
						if(!$datum->getCategoriesCategory() == null){
							$Category = $datum->getCategoriesCategory()->getCategoryName();
						}else{
							$Category = "N/A";
						}
						
						if(!$datum->getTaxClassTaxClass() == null){
						$tax = $datum->getTaxClassTaxClass()->getTaxClassName();
						}else{
							$tax = "N/A";
						}
						
													
                        ?>
						
				<tr class="odd"> 
				<td class="align-center "><?php echo $datum->getProductId();?></td>
				<td class="align-center "><?php echo $datum->getProductName();?></td>
				<td class="align-center "><?php echo $Category; ?></td>
				<td class="align-center "><?php echo $datum->getQuantity();?></td>
				<td class="align-center "><?php echo $supplier;?></td>
				<td class="align-center "><?php echo $datum->getPrice();?></td>
				<td class="align-center"><?php echo $datum->getSafetyStockLevel();?></td>
						<?php 
							if($visiblity == 1)
							{
							echo'<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs">Edit</a>
                           <a class="btn btn-primary btn-xs">Approve</a>
                           <a class="btn btn-primary btn-xs">Revert</a>
						   <a class="btn btn-primary btn-xs">Delete</a>
                           </div>
                           </td>';
							
							}
							?>
						<?php 
							if($visiblity == 2)
							{
							echo'<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs">Edit</a>
                           <a class="btn btn-primary btn-xs">Approve</a>
                           <a class="btn btn-primary btn-xs">Revert</a>
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
