<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Edit Project</h2>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

	<div class="col-lg-12">
		<?php 
			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'edit-project');
			echo form_open($form_action,$attributes); 
		?>
		
	<div class="form-group">
		 <label for="customername" class="col-sm-3 control-label">Customer Name:</label>
			<div class="col-sm-3">
<input type="text" class="form-control" id="customername" name="customername"  value="<?php echo $customer[0]->getPosCustomerCustomer()->getCustomername();?>"  disabled>
			</div>
		</div>	
		<div class="form-group">
		  <label for="Project Name" class="col-sm-3 control-label">Project Name:</label>
			<div class="col-sm-3">
				<input type="hidden"  id="project_id" name="project_id"  value="<?php echo $project->getProjectid(); ?>" >
				<input type="text" class="form-control" id="project_name" name="project_name"  value="<?php echo $project->getProjectname(); ?>"  placeholder="Enter project name" >
			</div>
	   </div>
		 <div class="form-group">
		  <label for="Project Description" class="col-sm-3 control-label">Project Description:</label>
			<div class="col-sm-3">
			<input type="text" class="form-control" id="project_description" name="project_description"  value="<?php echo $project->getProjectdescription(); ?>"  placeholder="Enter Project Description" >
			</div>
	   </div>
	
	 <div class="form-group">
	  <label for="status" class="col-sm-3 control-label">Status:</label>
		<div class="col-sm-3">
			<?php $options = array('' => 'Select Status','1'  => 'Completed','2' => 'In-Progress','0' => 'Cancelled'); 
			 echo form_dropdown('status', $options,$project->getStatus(),'class="form-control"'); ?>
		</div>
   </div>
	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-success " >Update</button>
	  <a type="button" href="<?php echo base_url();?>pos/project/projectlist" class="btn btn-primary ">Cancel</a>
	</div>
	</div>

   <!-- action end-->  					 

<?php echo form_close();?>
<!-- </form> -->
</div>

<!-- /.dynamic content end -->

<!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


