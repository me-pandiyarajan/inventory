<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Project List</h2>
             <?php if ( $this->session->flashdata('projectadd') ) echo $this->session->flashdata('projectadd'); ?>
			 <?php if ( $this->session->flashdata('projectedit') ) echo $this->session->flashdata('projectedit'); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
         <!-- /.dynamic content -->
             <div class="col-lg-12">
			  <div class="table-responsive">
	        
					<table class="table table-bordered table-striped" >

					    <thead> 
					        <tr>
					    		<?php  foreach($tablehead as $table_head):?>	   
						   		<th><?php echo $table_head;?></th>
					     		<?php endforeach; ?>
					        </tr>
					    </thead>

						<tbody role="alert" aria-live="polite" aria-relevant="all">
						 	 <?php foreach($projects as $project): ?> 			
							<tr> 
									<td><?php echo $project->getProjectid(); ?></td>
								<td><?php echo $project->getProjectname(); ?></td>
								<td>100</td>
						<?php 
					$status = $project->getStatus();
					if ($status == 1) 
					{ 
					$stat = '<span class="label label-success">Completed</span>';
					
					}
					elseif ($status == 2)
					{
					$stat = '<span class="label label-info">In-Progress</span>';	
					}					
					else 
				    {
					$stat = '<span class="label label-danger">Cancelled</span>';
					}
					
					?>
					<td class="align-center "><?php echo $stat;?></td>
								
									
								<td>
									<div class="btn-group">
									
									    <a type="button" href="<?php echo site_url()."pos/project/viewproject/".$project->getProjectid();?>" class="btn btn-info btn-outline btn-xs">ViewProduct</a>
									    
									    <a type="button" href="<?php echo site_url()."pos/Project/ProjectDetails/".$project->getProjectid()."/editProjectDetails";?>" class="btn btn-primary btn-outline btn-xs">Edit</a>
																		 
									</div>
								</td>
							</tr>	

							<?php endforeach; ?>
						</tbody>
										
					</table>

				</div>
	</div>

 </div>
       <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>



