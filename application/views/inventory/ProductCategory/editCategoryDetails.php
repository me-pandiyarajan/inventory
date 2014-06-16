	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Update Category</h1>

	        	<?php echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	       
	        		
	        			<?php 
	        			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'edit-category');
	        			echo form_open($form_action,$attributes); 
	        			?>
						   
					     <div class="form-group">
				            <label class="control-label col-xs-2" for="productcategory">Category Name:</label>
				            <div class="col-xs-4">
				            	<input type="hidden"  id="supplier_id" name="category_id"  value="<?php echo $category->getCategoryId(); ?>" >
				                <input type="text" class="form-control"  value="<?php echo $category->getCategoryName(); ?>"  id="productcategory" name="productcategory" placeholder="Category Name">
				            </div>
				         </div>

					    <div class="form-group">
				            <label class="control-label col-xs-2" for="comments">Comments:</label>
				            <div class="col-xs-4">
				                <textarea rows="3" class="form-control" id="comments" placeholder="comments" name="comments" ><?php echo $category->getComments(); ?></textarea>
				         </div>
				       </div>

				       <div class="form-group">
				          <label for="status" class="col-sm-2 control-label">Status</label>
				            <div class="col-sm-3">
				                <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
				                 echo form_dropdown('status', $options,$category->getStatus(),'class="form-control"'); ?>
				            </div>
				        </div>

					   <!-- action -->

					    <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						        <button type="submit" class="btn btn-success btn-xs" >Update</button>
						      <a type="button" href="<?php echo base_url();?>inventory/ProductCategory/listCategories" class="btn btn-default btn-xs">Cancel</a>
						    </div>
						</div>

					   <!-- action end-->  					 
						
						<?php echo form_close();?>
					<!-- </form> -->
	</div>

<!-- dynamic view content end-->

</div>


