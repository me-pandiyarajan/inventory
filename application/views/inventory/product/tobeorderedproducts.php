<div class="col-sm-9 col-md-10 main">
<h1 class="page-header">To Be Ordered List</h1>
 <!-- dynamic view content -->       

<?php if ( $this->session->flashdata('EditProduct') ) echo $this->session->flashdata('EditProduct'); 
if ( $this->session->flashdata('ProductNot') ) echo $this->session->flashdata('ProductNot');?>

<div class="table-responsive">
<table class="table table-bordered table-striped">
               <thead> 
					<tr>
						<?php  foreach($tablehead as $table_head):?>	   
						<th><?php echo $table_head;?></th>
						<?php endforeach; ?>
					</tr>
				    </thead>
                   <div class="btn-group ">
                   	 <a type="submit" id="submit" class="btn btn-success btn-xs" href="<?php echo base_url();?>inventory/product/addProduct">Add Product</a>
                   	</div>					
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
												
                        ?>			
				<tr class="odd"> 
				<td class="align-center "><?php echo $datum->getSku();?></td>
				<td class="align-center "><a href="productDetails/<?php echo $datum->getproductGenId();?>/productview"><?php echo $datum->getProductName();?></a></td>
				<td class="align-center "><?php echo $Category; ?></td>
				<td class="align-center "><?php echo $datum->getQuantity()." ".$datum->getUnit();?></td>
				<td class="align-center "><?php echo $supplier;?></td>
				<?php $status = $datum->getStatus();
				if($status == 0 ){$stat ="DISABLE";}else{$stat ="ENABLE";}?>
				<td class="align-center "><?php echo $stat;?></td>
						<?php 
							if($visiblity == 1)
							{
							echo'
							<td class="align-center ">'.$datum->getPrice().'</td>
							<td class="align-center">'.$datum->getSafetyStockLevel().'</td>
							<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs" href="productDetails/'.$datum->getproductGenId().'/productedit/ep">Edit</a>
                           <a class="btn btn-primary btn-xs" href="'.base_url().'inventory/purchase/addtoestimate/'.$datum->getproductGenId().'">Add to Estimate</a>
                           <a class="btn btn-primary btn-xs" href="delete/'.$datum->getproductGenId().'/pd">Delete</a>
                            <a class="btn btn-success btn-xs" href='.base_url().$datum->getBarcodeimage().'>Barcode <span class="glyphicon glyphicon-circle-arrow-down"></span></a>
                           </div>
                           </td>';
							}
							?>
						<?php 
							if($visiblity == 2)
							{
							echo'<td class="align-center"><div class="btn-group">
                           <a class="btn btn-primary btn-xs" href="productDetails/'.$datum->getproductGenId().'/productedit/ep">Edit</a>
                           <a class="btn btn-primary btn-xs" href="'.base_url().'inventory/purchase/addtoestimate/'.$datum->getproductGenId().'">Add to Estimate</a>
                            <a class="btn btn-success btn-xs" href='.base_url().$datum->getBarcodeimage().'>Barcode <span class="glyphicon glyphicon-circle-arrow-down"></span></a>
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
<link href="<?php echo base_url(); ?>assets_inv/css/typeahead.css" rel="stylesheet">
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/js/create_new_estimate.js"></script>