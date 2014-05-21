 <div class="col-sm-9 col-md-10 main">

   <!-- dynamic view content -->       
       <h1 class="page-header">Edit profile</h1>
          <?php echo validation_errors(); ?>
            <?php if(!empty($message)) echo $message; ?>
                        <?php 
                $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                echo form_open(uri_string(),$attributes); 
                ?>

               
               <div class="form-group">
                  <label for="user name" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
					<!---<input type="text" class="form-control"  value=" //echo $user->id; " id="productGenId" name="productGenId" placeholder="Product Name" >-->
                      <input type="text"  id="username" name="username"  value="<?php echo $user->username; ?>"  placeholder="Enter User Name">
                    </div>
               </div>

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First name</label>
                    <div class="col-sm-10">
                      <input type="text"  id="first_name" name="first_name" value="<?php echo $user->first_name; ?>" placeholder="Enter first name">
                  </div>
               </div> 

               <div class="form-group">
                    <label for="last_name" class="col-sm-2 control-label">Last name</label>
                    <div class="col-sm-10">
                      <input type="text" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>" placeholder="Enter Last name">
                  </div>
               </div>               
                    
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email"  id="email" name="email" value="<?php echo $user->email; ?>" placeholder="Enter email">
                  </div>
               </div>

               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">password</label>
                    <div class="col-sm-10">
                      <input type="password"  id="password" name="password"  placeholder="Enter password">
                  </div>
               </div>
			     <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password"  id="password_confirm" name="password_confirm" value="" placeholder="Enter Confirm Password">
                  </div>
               </div>
       


                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>

               <!-- action -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success btn-sm" id="submit">Update</button>
                       <input type="reset" class="btn btn-info btn-sm" value="Reset" >
                      
                  </div>
              </div>
            
               <!-- action end-->            
            
            <?php echo form_close();?>
          <!-- </form> -->
  </div>

<!-- dynamic view content end-->

</div>


