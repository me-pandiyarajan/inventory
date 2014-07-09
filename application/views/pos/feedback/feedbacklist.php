<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">List Feedback</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
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
					<?php foreach($feedback_list as $feedback): ?> 
						<tr> 
							<td><?php echo $feedback->getFeedbackid(); ?></td>
							<td><?php echo $feedback->getPosCustomerCustomer()->getCustomername(); ?></td>
							<td><?php echo $feedback->getSatisfactoryLevel(); ?></td>
							<td><?php echo $feedback->getCreatedBy()->getUsername(); ?></td>
							<td>
								 <div class="btn-group">
								 <a type="button" href="<?php echo site_url()."pos/feedback/feedbackview/".$feedback->getFeedbackid();?>" class="btn btn-primary btn-xs">View command</a>
																 
								</div>
                                </td>
						</tr>	

					<?php endforeach; ?>  
				</tbody>						
			</table>
        </div>
    </div>
</div>
</div>




