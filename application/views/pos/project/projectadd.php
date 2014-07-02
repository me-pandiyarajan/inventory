<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Project</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
     <!-- /.dynamic content -->
  	   <?php 
	    $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'project_created');
	        echo form_open($form_action,$attributes); 
	    ?>
		<?php echo validation_errors(); ?>
	    <?php if(!empty($success)) echo $success; ?>
<div class="col-lg-12">
       
	<div class="form-group">
			<label class="control-label col-xs-3" for="customername">Customer Name:</label>
			<div class="col-xs-3 control-group">
			<input type="text"  class="form-control typeahead" id="customer_name"  name="customer_name" placeholder="customername" >
			<input type="hidden"  class="form-control" id="customer_id"  name="customer_id" placeholder="customername" >
			</div>
			</div>
	 <div class="form-group">
		<label class="control-label col-xs-3" for="projectname">Project Name:</label>
		<div class="col-xs-3 control-group">
			<input type="text"  class="form-control"  value="<?php echo set_value('projectname'); ?>"  id="projectname" name="projectname" placeholder="Project Name">
			<input type="hidden"  class="form-control" id="invoices_id"  name="invoices_id" placeholder="invoicesid" >
		</div>
		</div>
	  <div class="form-group">
		 <label class="control-label col-xs-3" for="description">Project Description:</label>
		<div class="col-xs-3">
			<textarea  class="form-control" id="description" placeholder="Project Description" name="description" value="<?php echo set_value('projectdescription');?>" ></textarea>
		</div>
	</div>    
	  <div class="form-group">
		 <label class="control-label col-xs-3" for="advanceamount">Advance Amount:</label>
		<div class="col-xs-3">
			<input type="text" class="form-control" id="advanceamount"  name="advanceamount" placeholder="Advance Amount" >
		</div>
	</div> 
	 <div class="form-group">
				<div class="col-sm-offset-2 col-sm-3">
					<button type="submit" class="btn btn-success btn-sm" id="addproject">Add</button>
					<button type="reset" class="btn btn-info btn-sm" id="reset">Reset</button>
				</div>
			</div>

        </div>
   <?php echo form_close();?>  
   </div>
	  
         <!-- /.dynamic content end -->
         
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
	


<link href="<?php echo base_url(); ?>assets_pos/css/typeahead.css" rel="stylesheet">
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/plugins/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/plugins/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/js/project_created.js"></script>
<!--<script src="assets_pos/plugins/mask/jquery.mask.min.js"></script>-->

<!-- /#wrapper -->

