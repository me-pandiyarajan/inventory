<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">New Product list</h1>
 <!-- dynamic view content -->       
<?php if ( $this->session->flashdata('EditProduct') ) echo $this->session->flashdata('EditProduct'); 
if ( $this->session->flashdata('ProductNot') ) echo $this->session->flashdata('ProductNot');?>
<div class="table-responsive">
<table  id="newproducttable" name="table1" class="table table-bordered table-striped">
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
						
						// if(!$datum->getTaxClassTaxClass() == null){
						// $tax = $datum->getTaxClassTaxClass()->getTaxClassName();
						// }else{
						// 	$tax = "N/A";
						// }
						
													
                        ?>
						
				<tr class="odd"> 
				<td class="align-center "><?php echo $datum->getSku();?></td>
				<td class="align-center "><a href="productDetails/<?php echo $datum->getproductGenId();?>/productview"><?php echo $datum->getProductName();?></a></td>
				<td class="align-center "><?php echo $Category; ?></td>
				<td class="align-center "><?php echo $datum->getQuantity();?></td>
				<td class="align-center "><?php echo $supplier;?></td>
				
						<?php
						   
							if($visiblity == 1)
							{
							echo'<td class="align-center ">'.$datum->getPrice().'</td>
				            <td class="align-center">'.$datum->getSafetyStockLevel().'</td>
							<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs" href="productDetails/'.$datum->getproductGenId().'/productedit/np">Edit</a>
                           <a class="btn btn-primary btn-xs" href="approveproduct/'.$datum->getproductGenId().'/np">Approve</a>
						   <a class="btn btn-primary btn-xs" href="delete/'.$datum->getproductGenId().'">Delete</a>
                           </div>
                           </td>';
							
							}
							?>
						<?php 
							if($visiblity == 2)
							{
							echo'<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs" href="productDetails/'.$datum->getproductGenId().'/productedit/np">Edit</a>
                           <a class="btn btn-primary btn-xs" href="approveproduct/'.$datum->getproductGenId().'/np">Approve</a>
                           <a class="btn btn-primary btn-xs" href="revertproduct/'.$datum->getproductGenId().'">Revert</a>
                           </div>
                           </td>';
							}
							?>	
							
					</tr>	
	
				<?php endforeach; ?>  
					</tbody>
									
				</table>

			</div>

<!-- dynamic view content end-->

</div>
