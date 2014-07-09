<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Lead Enquiry</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
         <!-- /.dynamic content -->
    <div class="col-lg-12">
       	<ul class="nav nav-tabs" role="tablist">
		   <li><a href="<?php echo site_url()."pos/enquiry/leadenquiry"?>">Lead Enquiry</a></li>
         <li  class="active"><a href="<?php echo site_url()."pos/enquiry/confirmenduiry"?>">Confirm Enquiry</a></li>
		</ul>
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
                            
                            <?php foreach($confirm_enduiry as $confirm): ?> 
                            
                            <tr> 
                               
                                <td><?php echo $confirm->getEnquiryid(); ?></td>
                                <td><?php echo $confirm->getPosCustomerCustomer()->getCustomername(); ?></td>
                                <td><?php echo $confirm->getAssignedMarketingRep()->getUsername(); ?></td>
								<?php 
										$status = $confirm->getStatus();
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
									 <a type="button" href="<?php echo site_url()."pos/enquiry/confirmenduiryproductlist/".$confirm->getEnquiryid();?>" class="btn btn-primary btn-xs">ViewProduct</a>
                                                                     
                                    </div>
									
									<?php
									$projectid = $confirm->getPosProjectsProjectid()->getProjectid();
									
									if(!empty($projectid) <= 0) 
									{
									
									echo'<div class="btn-group">
									<a class="btn btn-primary btn-xs" href="pos/project/projectadd/ep">Create Project</a>
									   
                                    </div>';
									}
									else
									{
									echo'<div class="btn-group">
									<a class="btn btn-primary btn-xs" href="pos/project/viewproject/'.$projectid.'">View Project</a>				                                                                 
								</div>';
								}
								?>
							                                                                
                                    
                                </td>
                            </tr>   

                            <?php endforeach; ?>  
                        </tbody>
                                        
                                              
                    </table>

                </div>



	</div>
</div>
</div>    

