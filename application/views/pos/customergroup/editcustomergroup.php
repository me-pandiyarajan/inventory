<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Customer Group</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">



         <!-- /.dynamic content -->
       
        <div class="col-xs-6">
                 <?php echo validation_errors(); ?> 

     <?php if(isset($error)){echo $error;} 
      if ( $this->session->flashdata('editcustomergroup')) echo $this->session->flashdata('editcustomergroup');
      ?>
      
     <?php 
      $attributes = array('class' => 'form-horizontal','id'=>'editcustomergroup-form');
     echo form_open_multipart(uri_string(),$attributes);?>
       <div class="form-group">
            <label class="control-label col-xs-4" for="customergroupname">Group Name:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control"  value="<?php echo $customergroupname; ?>"  id="customergroupname" name="customergroupname" placeholder="Group Name">
            </div>
         </div>
                 <div class="form-group">
            <label class="control-label col-xs-4" for="discountpercent">Discount %</label>
            <div class="col-xs-8">
                <input type="text" class="form-control"  value="<?php echo $discountpercent; ?>"  id="discountpercent" name="discountpercent" placeholder="Discount %">
            </div>
        </div>
         
        <div class="form-group">
          <label for="status" class="col-xs-4 control-label">Status</label>
            <div class="col-xs-8">
                <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
                 echo form_dropdown('status', $options,$status,'class="form-control"'); ?>
            </div>
        </div>

    
       
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a type="button" href="<?php echo base_url();?>pos/CustomerGroup/listcustomergroup" class="btn btn-info btn-sm">Cancel</a>
            </div>
        </div>
        <?php echo form_hidden('id', $customergroupid);?>
     
    
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
                <?php if($customer->getGroupCustomerCustomerGroup() == NULL) { ?>
                    <td><input type="checkbox" name="customers[]" value="<?php echo $customer->getCustomerId(); ?>"><?php echo " ".$customer->getCustomername(); ?></td>
                <?php } else {?>
                    <td><input type="checkbox" checked name="customers[]" value="<?php echo $customer->getCustomerId(); ?>"><?php echo " ".$customer->getCustomername(); ?></td>
                <?php } ?>
              
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


