
	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h2 class="page-header">List Supplier</h2>

			   <!-- add supplier -->

				        <a href="<?php echo site_url()."supplier/addSupplier"?>" class="btn btn-success btn-sm">Add</a>

			   <!-- add supplier end--> 

				  <div class="table-responsive">
	        
					<table class="table table-bordered" >

					    <thead> 
					        <tr>
					    		<?php  foreach($tablehead as $table_head):?>	   
						   		<th><?php echo $table_head;?></th>
					     		<?php endforeach; ?>
					        </tr>
					    </thead>

						<tbody role="alert" aria-live="polite" aria-relevant="all">
						    
						    <?php foreach($suppliers as $supplier): ?> 
							
							<tr> 
								<td><?php echo $supplier->getSupplierName();?></td>
								<td><?php echo $supplier->getEmail();?></td>
								<td><?php echo $supplier->getTelephone();?></td>
								<td><?php if($supplier->getStatus() == 1){echo "ACTIVE";} else {echo "INACTIVE";}?></td>
								<td>
									<div class="btn-group">
									  	<a type="button" href="<?php echo site_url()."supplier/supplierDetails/".$supplier->getSupplierId()."/editSupplierDetails";?>" class="btn btn-default btn-xs">Edit</a>
									  	<?php if( $visiblity == 1 ): ?>
										<button type="button" class="btn btn-default btn-xs">Delete</button>
									  	<?php endif;	?>
									</div>
								</td>
							</tr>	

							<?php endforeach; ?>  
						</tbody>
										
					</table>

				</div>
	</div>

<!-- dynamic view content end-->

</div>


