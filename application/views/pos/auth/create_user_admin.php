<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add User</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12"> 

            <?php echo validation_errors(); ?>
            <?php if(!empty($success)) echo $success; ?>
            <div id="infoMessage"><?php echo $message;?></div>
            <!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
              
                <?php 
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'add-user');
                echo form_open($form_action,$attributes); 
                ?>
               
             <!--  <div class="form-group">
                  <label for="user name" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text"  id="username" name="username"  value="<?php echo set_value('name'); ?>"  placeholder="Enter user name" >
                    </div>
               </div>-->

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First name</label>
                    <div class="col-sm-3">
                      <input type="text"  id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Enter first name" class="form-control">
                  </div>
               </div> 

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Last name</label>
                    <div class="col-sm-3">
                      <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Enter Last name" class="form-control" >
                  </div>
               </div>               
                    
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                      <input type="email"  id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email" class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-3">
                      <input type="text"  id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Enter mobile number" class="form-control">
                  </div>
               </div>

                <?php if(!empty($options)): ?> 
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Group</label>
                    <div class="col-sm-3">
                      <?php echo form_dropdown('group', $options,set_value('group'),'class="form-control" id="group"'); ?>   
                  </div>
               </div>
               <?php endif; ?>

               <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-3">
                      <select class="form-control" id="status" name="status" value="<?php echo set_value('status'); ?>">
                        <option value="">Select Status</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                      </select>
                  </div>
               </div>

               <!-- action -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-sm">Add</button>
                       <button type="reset" class="btn btn-info btn-sm" id="reset">Reset</button>
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



