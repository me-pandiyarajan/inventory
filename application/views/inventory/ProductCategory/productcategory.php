<div class="col-sm-9 col-md-10 main">

	 <h1 class="page-header">Add Category</h1>
	
	 <?php echo validation_errors(); ?> 

	 <?php if(isset($error)){echo $error;} 
	  if ( $this->session->flashdata('productcategory')) echo $this->session->flashdata('productcategory');
	  ?>
      
	 <?php 
	  $attributes = array('class' => 'form-horizontal','id'=>'add-category');
	 echo form_open_multipart($form_action,$attributes);?>
       <div class="form-group">
            <label class="control-label col-xs-2" for="productcategory">Category Name:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo set_value('productcategory'); ?>"  id="productcategory" name="productcategory" placeholder="Category Name">
            </div>
         </div>
	    <div class="form-group">

            <label class="control-label col-xs-2" for="comments">Comments:</label>
            <div class="col-xs-4">
                <textarea rows="3" class="form-control" value="<?php echo set_value('comments'); ?>" id="comments" placeholder="comments" name="comments" ></textarea>
         </div>
       </div>

        <div class="form-group">
          <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-3">
                <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
                 echo form_dropdown('status', $options,set_value('status'),'class="form-control"'); ?>
            </div>
        </div>

	
       
	    <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-success btn-sm">Add</button>
                 <input type="reset" class="btn btn-info btn-sm" value="Reset" >
                <!-- <a type="button" href="<?php echo base_url();?>Product/addproductcategory" class="btn btn-default btn-xs">Cancel</a>-->               
            </div>
        </div>
     <?php echo form_close();?>
</div>