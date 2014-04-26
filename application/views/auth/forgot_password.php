<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-6 col-md-offset-3 ht-5">
	
	<h1><?php echo lang('forgot_password_heading');?></h1>
	
	<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

	<div id="infoMessage"><?php echo $message;?></div>

	<form role="form" class="form-horizontal"  action="" method="post">       
	<?php echo form_open("auth/forgot_password");?>

	    <div class="form-group">
	      	<label for="email" class="col-sm-2 control-label"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label>
	      	<div class="col-sm-8">
	      		<?php echo form_input($email);?>
	      	</div>
	    </div>

	<div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
        	<?php echo form_submit('submit', lang('forgot_password_submit_btn'));?>
            <?php echo form_close();?>
        </div>
    </div>

	<?php echo form_close();?>
	</form>

</div>