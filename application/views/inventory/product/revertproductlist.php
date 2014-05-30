<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">Product list</h1>
 <!-- dynamic view content -->       

 <?php if ( $this->session->flashdata('EditProduct') ) echo $this->session->flashdata('EditProduct'); ?>
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
						if(!$datum->getCategoriesCategory() == null){
							$Category = $datum->getCategoriesCategory()->getCategoryName();
						}else
						{
							$Category = "N/A";
						}
					   ?>
						
				<tr class="odd"> 
				<td class="align-center "><?php echo $datum->getSku();?></td>
				<td class="align-center "><a href="productDetails/<?php echo $datum->getproductGenId();?>/productview"><?php echo $datum->getProductName();?></a></td>
				<td class="align-center "><?php echo $Category; ?></td>
				<td class="align-center "><?php echo $datum->getCreatedDate()->format('d-m-y H:i:s');?></td>
				<td class="align-center"><div class="btn-group">
			    <a class="btn btn-primary btn-xs" href="productDetails/<?php echo $datum->getproductGenId();?>/productedit">Edit</a>
			    <a class="btn btn-primary btn-xs" href="">Delete</a>
				</div>
			    </td>
				</tr>	
				<?php endforeach; ?>  
					</tbody>									
				</table>

			</div>
<!-- dynamic view content end-->

</div>
