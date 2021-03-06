
	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h2 class="page-header">List Supplier</h2>
	        <?php if ( $this->session->flashdata('supplieradd') ) echo $this->session->flashdata('supplieradd'); ?>
 <?php if ( $this->session->flashdata('supplieredit') ) echo $this->session->flashdata('supplieredit'); ?>
 <?php if ( $this->session->flashdata('supplierdelect') ) echo $this->session->flashdata('supplierdelect'); ?>
			   <!-- add supplier -->

				        <a href="<?php echo site_url()."inventory/supplier/addSupplier"?>" class="btn btn-success btn-sm">Add Supplier</a>

			   <!-- add supplier end--> 

				  <div class="table-responsive">
	        
					<table class="table table-bordered table-striped" >

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
								<td><?php echo $supplier->getSupplierName(); ?></td>
								<td><?php echo $supplier->getEmail(); ?></td>
								<td><?php echo $supplier->getMobile(); ?></td>
                                <?php 
									$status = $supplier->getStatus();
									if ($status == 0) 
									{ 
									$stat = '<span class="label label-danger">INACTIVE</span>';
									
									}
														else 
									{
									$stat = '<span class="label label-success">ACTIVE</span>';
									}
									?>					
         						<td class="align-center "><?php echo $stat;?></td>
  
								
								<td>
									<div class="btn-group">
									  	<a type="button" href="<?php echo site_url()."inventory/supplier/supplierDetails/".$supplier->getSupplierId()."/editSupplierDetails";?>" class="btn btn-primary btn-xs">Edit</a>
									  		<?php if( $visiblity == 1 ): ?>
		<a type="button" href="<?php echo site_url()."inventory/supplier/deletesupplier/".$supplier->getSupplierId();?>" class="btn btn-primary btn-xs">Delete</a>
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


