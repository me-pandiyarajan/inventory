<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Tax Class</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">



         <!-- /.dynamic content -->
       
        <div class="col-lg-12">
                 <?php echo validation_errors(); ?> 

     <?php if(isset($error)){echo $error;} 
      if ( $this->session->flashdata('addtaxclass')) echo $this->session->flashdata('addtaxclass');
      ?>
      
     <?php 
      $attributes = array('class' => 'form-horizontal','id'=>'edittaxclass-form');
     echo form_open_multipart(uri_string(),$attributes);?>
       <div class="form-group">
            <label class="control-label col-xs-2" for="taxclassname">Tax Class Name:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo $taxclassname; ?>"  id="taxclassname" name="taxclassname" placeholder="Tax Class Name">
            </div>
         </div>

        <div class="form-group">
          <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-xs-4">
                <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
                 echo form_dropdown('status', $options,$status,'class="form-control"'); ?>
            </div>
        </div>

    
       
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a type="button" href="<?php echo base_url();?>pos/TaxClass/listtaxclass" class="btn btn-info btn-sm">Cancel</a>
            </div>
        </div>
        <?php echo form_hidden('id', $taxclassid);?>
     <?php echo form_close();?>
    
        </div>
        <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


