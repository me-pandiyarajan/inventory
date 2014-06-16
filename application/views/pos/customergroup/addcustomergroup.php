<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Customer Group</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">



         <!-- /.dynamic content -->
       
        <div class="col-xs-6">
                 <?php echo validation_errors(); ?> 

     <?php if(isset($error)){echo $error;} 
      if ( $this->session->flashdata('addcustomergroup')) echo $this->session->flashdata('addcustomergroup');
      ?>
      
     <?php 
     $attributes = array('class' => 'form-horizontal','id' => 'addcustomergroup-form'); 
     echo form_open_multipart($form_action,$attributes);?>
        <div class="form-group">
            <label class="control-label col-xs-4" for="customergroupname">Group Name</label>
            <div class="col-xs-8">
                <input type="text" class="form-control"  value="<?php echo set_value('customergroupname'); ?>"  id="customergroupname" name="customergroupname" placeholder="Group Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4" for="discountpercent">Discount %</label>
            <div class="col-xs-8">
                <input type="text" class="form-control"  value="<?php echo set_value('discountpercent'); ?>"  id="discountpercent" name="discountpercent" placeholder="Discount %">
            </div>
        </div>

        <div class="form-group">
          <label for="status" class="col-sm-4 control-label">Status</label>
            <div class="col-xs-8">
                <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
                 echo form_dropdown('status', $options,set_value('status'),'class="form-control"'); ?>
            </div>
        </div>

    
       
        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-9">
                <button type="submit" class="btn btn-success btn-sm">Add</button>
                 <input type="reset" class="btn btn-info btn-sm" value="Reset" >
            </div>
        </div>
        
        </div>
        <div class="col-xs-6">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <?php  foreach($tablehead as $table_head):?>       
                  <th><?php echo $table_head;?></th>
                  <?php endforeach; ?>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
              <?php foreach ($customerlist as $customer):?>
              <tr>
              <td><input type="checkbox" name="customers[]" value="<?php echo $customer->getCustomerId(); ?>"><?php echo " ".$customer->getCustomername(); ?></td>
              <td><?php echo $customer->getEmail(); ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php echo form_close();?>
        <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


