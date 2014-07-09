<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Feedback View</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
	<?php foreach($feedback as $feedbacks): ?> 
		<div class="form-group" >
            <label class="control-label col-xs-3" for="command"><b>Commands:</b></label>
			  <p><?php echo $feedbacks->getComments(); ?></p>
        </div>
	<?php endforeach; ?>		
    </div>
</div>
<a type="button" href="<?php echo base_url();?>pos/feedback/feedbacklist" class="btn btn-default btn-xs">Done</a>
</div>




