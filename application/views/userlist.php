
<div class="col-sm-9 col-md-10 main">

 <!-- dynamic view content -->       

        <h1 class="page-header">User list</h1>

        <div class="row placeholders">

        	<div class="table-responsive">
        
				<table class="table table-bordered " >

				    <thead> 
				        <tr>
				    		<?php  foreach($tablehead as $table_head):?>	   
					   		<th><?php echo $table_head;?></th>
				     		<?php endforeach; ?>
				        </tr>
				    </thead>

					<tbody role="alert" aria-live="polite" aria-relevant="all">
					    <?php foreach($data as $datas): ?> 
						<tr class="odd"> 
							<td class="align-center"><?php echo $datas->username;?></td>
							<td class="align-center"><?php echo $datas->password;?></td>
							<?php 
							if($visiblity == 1 )
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


