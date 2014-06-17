 <div class="col-sm-9 col-md-10 main">

   <!-- dynamic view content -->       

          <h1 class="page-header">Edit User</h1>

            <?php echo validation_errors(); ?>
            <?php if(!empty($success)) echo $success; ?>
            <div id="infoMessage"><?php echo $message;?></div>
            <!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
              
                <?php 
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id'=>'edit-user');
                echo form_open(uri_string(),$attributes); 
                ?>

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control"  id="first_name" name="first_name" value="<?php echo $user->first_name; ?>" placeholder="Enter first name" >
                  </div>
               </div> 

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Last name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>" placeholder="Enter Last name">
                  </div>
               </div>               
                    
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>" placeholder="Enter email">
                  </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone; ?>" placeholder="Enter mobile number">
                  </div>
               </div>

                <?php if(!empty($options)): ?> 
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Group</label>
                  <div class="col-sm-3">
                       <?php echo form_dropdown('group', $options,$currentGroups,'class="form-control"'); ?>
                  </div>
               </div>
               <?php endif; ?>

               <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-3">
                      <?php $options = array('' => 'Select Status', '1'  => 'Enable','0' => 'Disable'); 
                       echo form_dropdown('status', $options,$user->active,'class="form-control"'); ?>
                  </div>
               </div>

                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>

               <!-- action -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success btn-xs" value="Update" />
                      <a type="button" href="<?php echo base_url();?>inventory/auth/list_users" class="btn btn-default btn-xs">Cancel</a>
                      
                  </div>
              </div>
            
               <!-- action end-->            
            
            <?php echo form_close();?>
          <!-- </form> -->
  </div>

<!-- dynamic view content end-->

</div>


