 <div class="col-sm-9 col-md-10 main">

   <!-- dynamic view content -->       
       <h1 class="page-header">Edit profile</h1>
          <?php echo validation_errors(); ?>
            <?php if(!empty($message)) echo $message; ?>
                        <?php 
                $attributes = array('class' => 'form-horizontal', 'role' => 'form','id' => 'edit-profile');
                echo form_open(uri_string(),$attributes); 
                ?>

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First name</label>
                    <div class="col-sm-3">
                      <input type="text"  class="form-control" id="first_name" name="first_name" value="<?php echo $user->first_name; ?>" placeholder="Enter first name">
                  </div>
               </div> 

               <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last name</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>" placeholder="Enter Last name">
                  </div>
               </div>               
                    
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                      <input type="email" class="form-control"  id="email" name="email" value="<?php echo $user->email; ?>" placeholder="Enter email">
                  </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control"  id="phone" name="phone" value="<?php echo $user->phone; ?>" placeholder="Enter mobile number">
                  </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3">
                      <input type="password" class="form-control"  id="password" name="password"  placeholder="Enter password">
                  </div>
               </div>
			     <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-3">
                      <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="" placeholder="Enter Confirm Password">
                  </div>
               </div>
       


                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>

               <!-- action -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
                      <input type="submit" class="btn btn-success btn-sm" value="Update">
                       <input type="reset" class="btn btn-info btn-sm" value="Reset" >
                      
                  </div>
              </div>
            
               <!-- action end-->            
            
            <?php echo form_close();?>
          <!-- </form> -->
  </div>

<!-- dynamic view content end-->

</div>


