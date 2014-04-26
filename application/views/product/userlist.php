<div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">User list</h1>
 <!-- dynamic view content -->       

       
       <div class="row placeholders">

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
                     <a class="btn btn-primary" href="<?php echo base_url();?>auth/create_user">Add User</a> 
				
					</div>
						
					<tbody role="alert" aria-live="polite" aria-relevant="all">
					    <?php foreach($data as $datas): ?> 
						<tr class="odd"> 
							<td class="align-center"><?php echo $datas->username;?></td>
							<td class="align-center"><?php echo $datas->first_name;?></td>
							<td class="align-center"><?php echo $datas->last_name;?></td>
							<td class="align-center"><?php echo $datas->email;?></td>
							<td class="align-center"><?php echo $datas->phone;?></td>
							<td class="align-center"><?php echo $datas->active;?></td>
							<td>
							<?php foreach ($datas->groups as $group):?>
								<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
							<?php endforeach?>
			                </td>
							
							
							<?php 
							if($visiblity == 1)
							{
							echo'<td class="align-center">
									<a class="btn btn-xs" href="<?php echo base_url();?>auth/edit_user/">Edit</a>  
								</td>';
							}
							?>
							
							<?php 
							if($visiblity == 2)
							{
							echo'<td class="align-center">
									<a class="btn btn-xs" href="">Edit</a>  
									<a class="btn btn-xs" href="">Delete</a>
								</td>';
							}
							?>
							
							</tr>	

						<?php endforeach; ?>  
					</tbody>
									
				</table>

			</div>
	 </div>

<!-- dynamic view content end-->

</div>
