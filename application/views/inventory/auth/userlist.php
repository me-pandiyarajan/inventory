<div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">User list</h1>
 <!-- dynamic view content --> 
 <?php if ( $this->session->flashdata('userdelect') ) echo $this->session->flashdata('userdelect'); ?>       
<div id="infoMessage"><?php echo $message;?></div>
       

      <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" id="table" name="table1" width="100%" class="table table-striped table-bordered">
			

				    <thead> 
				        <tr>
				    		<?php  foreach($tablehead as $table_head):?>	   
					   		<th><?php echo $table_head;?></th>
				     		<?php endforeach; ?>
				        </tr>
				    </thead>
					<div class="btn-group ">
                     <a class="btn btn-success btn-xs" href="<?php echo base_url();?>inventory/auth/create_user">Add User</a> 
				
					</div>

						
					<tbody role="alert" aria-live="polite" aria-relevant="all">
					    <?php foreach($user as $datum): ?> 
						<tr class="odd"> 
							<td class="align-center"><?php echo $datum->username;?></td>
							<td class="align-center"><?php echo $datum->first_name;?></td>
							<td class="align-center"><?php echo $datum->last_name;?></td>
							<td class="align-center"><?php echo $datum->email;?></td>
							<td class="align-center"><?php echo $datum->phone;?></td>
                           	<?php foreach ($datum->groups as $group):?>
							     
							<td class="align-center"><?php echo $group->name;?></td>
							<?php endforeach?>					
							<?php 
					  $activated = $datum->active;
					
					if ($activated == 0) 
					{ 
					   $acti = '<span class="label label-info">In-Active</span>';
					}
					elseif ($activated == 1)
					{
						$acti = '<span class="label label-success">Active</span>';
					}
				
					
					?> 
					
					<td class="align-center "><?php echo $acti;?></td>

							<td class="align-center">
								<div class="btn-group"><a class="btn btn-primary btn-xs" href="<?php echo base_url();?>inventory/auth/edit_user/<?php echo $datum->id; ?>">Edit</a>

                        <?php if( $visiblity == 2 ): ?>
		                      <a type="button" href="<?php echo site_url()."inventory/auth/deleteuser/".$datum->id;?>" class="btn btn-primary btn-xs">Delete</a>
										
						<?php endif;	?>


							  </div></td>
							
							</tr>	

						<?php endforeach; ?>  
					</tbody>
									
				</table>

			</div>
<!-- dynamic view content end-->

</div>
