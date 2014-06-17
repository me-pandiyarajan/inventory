 <div class="col-sm-9 col-md-10 main">

   <!-- dynamic view content -->       

          <h1 class="page-header">View Profile</h1>
            <?php if ( $this->session->flashdata('profileadd') ) echo $this->session->flashdata('profileadd'); ?> 
            <?php echo validation_errors(); ?>
          
            <!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
              
                <?php 
                $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                echo form_open(uri_string(),$attributes); 
                ?>
           
              
               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">First name</label>
                    <div class="col-sm-10">
                     <p><?php echo $user->first_name; ?></p>
                  </div>
               </div> 

               <div class="form-group">
                    <label for="first_name" class="col-sm-2 control-label">Last name</label>
                    <div class="col-sm-10">
                      <p><?php echo $user->last_name; ?></p>
                  </div>
               </div>               
                    
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                     <p><?php echo $user->email; ?></p>
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-10">
                      <p><?php echo $user->phone; ?></p>
                  </div>
               </div>
                						
               
              
      			    <?php 
      					$activated = $user->active;
      					if ($activated == 0) 
      					{ 
      					   $acti = 'In-Active';
      					}
      					elseif ($activated == 1)
      					{
      					   $acti = 'Active';
      					}
      					?> 
			   
			   
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <p><?php echo $acti; ?></p>
                  </div>
               </div>
              
                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>

               <!-- action -->

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
				  <a class="btn btn-success btn-sm" href="<?php echo base_url();?>inventory/auth/edit_profile/<?php echo $user->id; ?>">Edit</a >
                              
                  </div>
              </div>
            
               <!-- action end-->            
            
            <?php echo form_close();?>
          <!-- </form> -->
  </div>

<!-- dynamic view content end-->

</div>


