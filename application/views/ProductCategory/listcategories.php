
	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h2 class="page-header">List product categories</h2>
		 <?php if ( $this->session->flashdata('categoryedit') ) echo $this->session->flashdata('categoryedit'); ?>
		 <?php if ( $this->session->flashdata('categorydelect') ) echo $this->session->flashdata('categorydelect'); ?>
			   <!-- add category -->

				        <a href="<?php echo site_url()."ProductCategory/addproductcategory"?>" class="btn btn-success btn-sm">Add Category</a>

			   <!-- add category end--> 

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
						    
						    <?php foreach($categories as $category): ?> 						
							<tr> 
								<td><?php echo "CAT".sprintf('%03s',$category->getCategoryId());?></td>
								<td><?php echo $category->getCategoryName();?></td>
								<td><?php echo $category->getComments();?></td>
								<td><?php if($category->getStatus() == 1){echo "ACTIVE";} else {echo "INACTIVE";}?></td>
								<td>
									<div class="btn-group">
									  	<a type="button" href="<?php echo site_url()."ProductCategory/categoryDetails/".$category->getCategoryId()."/editCategoryDetails";?>" class="btn btn-primary btn-xs">Edit</a>
									  		<?php if( $visiblity == 1 ): ?>
		<a type="button" href="<?php echo site_url()."ProductCategory/deleteCategory/".$category->getCategoryId();?>" class="btn btn-primary btn-xs">Delete</a>
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


