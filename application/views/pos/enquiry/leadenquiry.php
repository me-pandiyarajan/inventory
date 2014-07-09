<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Enquiry List</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
         <!-- /.dynamic content -->
    <div class="col-lg-12">
       	<ul class="nav nav-tabs" role="tablist">
		   <li   class="active"><a href="<?php echo site_url()."pos/enquiry/leadenquiry"?>">Lead Enquiry</a></li>
         <li><a href="<?php echo site_url()."pos/enquiry/confirmenduiry"?>">Confirm Enquiry</a></li>
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
                            
                            <?php foreach($lead_enduiry as $lead): ?> 
                            
                            <tr> 
                               
                                <td><?php echo $lead->getEnquiryid(); ?></td>
                                <td><?php echo $lead->getPosCustomerCustomer()->getCustomername(); ?></td>
                                <td><?php echo $lead->getAssignedMarketingRep()->getUsername(); ?></td>
								<?php 
										$status = $lead->getStatus();
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
									 <a type="button" href="<?php echo site_url()."pos/enquiry/leadenduiryproductlist/".$lead->getEnquiryid();?>" class="btn btn-primary btn-xs">ViewProduct</a>                    
                                    </div>
									 </div>
									
									<?php
									$projectid = $lead->getPosProjectsProjectid()->getProjectid();
									$enquiryid = $lead->getEnquiryid();
									if(!empty($projectid) <= 0) 
									{
									
									echo'<div class="btn-group">
									<a class="btn btn-primary btn-xs" 
									href="pos/project/projectadd/'.$enquiryid.'">
									Create Project</a>
									   
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
      

