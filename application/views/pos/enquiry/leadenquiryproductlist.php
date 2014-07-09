<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Product List</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
         <!-- /.dynamic content -->
    <div class="col-lg-12">
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
                            <?php foreach($leadenduiry_product as $product): ?> 
                            <tr> 
                               
                                <td><?php echo $product->getPosWsCheckListId(); ?></td>
                                <td><?php echo $product->getCheckIn(); ?></td>
                                <td><?php echo $product->getCheckOut(); ?></td>	
                                <td><?php echo $product->getCreatedBy()->getUsername(); ?></td>
                              							
                                <td>
                                    <div class="btn-group">
									<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#basicModal">Images</a>
                                                                     
                                    </div>
                                </td>
                            </tr>   

                            <?php endforeach; ?>  
                        </tbody>
                                        
                    </table>

            </div>
    </div>  
</div>
<?php if(!empty($product_details)) : ?> 

<div class="row">
         <!-- /.dynamic content -->
    <div class="col-lg-12">
             <div class="table-responsive">
                <table class="table table-bordered table-striped" >
                    <thead> 
                            <tr>
                                <th>Product ID</th>
								<th>Product Name</th>
								<th>Product Category</th>
                            </tr>
                    </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php foreach($product_details as $products): ?> 
                            <tr> 
                               
                                <td><?php echo $products->getProductsProductGen()->getProductGenId(); ?></td>
                                <td><?php echo $products->getProductsProductGen()->getProductName(); ?></td>
                                <td><?php echo $products->getProductsProductGen()->getCategoriesCategory()->getCategoryName(); ?></td>	
                            </tr>   

                            <?php endforeach; ?>  
                        </tbody>
                                        
                    </table>

            </div>
    </div>  
	 	
</div>
	<?php endif; ?> 
<a type="button" href="<?php echo base_url();?>pos/enquiry/leadenquiry" class="btn btn-default btn-xs">Done</a>
</div>
<div class="modal" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Images</h4>
          </div>
		
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
					<?php foreach($images_list as $i=>$images): ?> 
					<?php if($i == 0){ $first = "active"; }else{$first = "";}?>
						<div class="item <?php echo $first; ?>">
						  <img src="<?php echo "http://192.168.5.215".$images->getImage(); ?>" >
						</div>
					<?php endforeach; ?>
				  </div>

				  <!-- Controls -->
				  
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				 </a>
			</div>
	
        </div>
      </div>
    </div>


