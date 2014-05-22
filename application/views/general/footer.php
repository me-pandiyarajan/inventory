</div>

<!-- footer -->

<div class="row">
	<div class="panel panel-default">
	  <div class="panel-body">
	    <span class="">&copy;<?php echo date('Y'); ?> Saagar's furnishing </span>
		<span class="pull-right"><?php echo unix_to_human($user_data['lastlogin']); ?></span>	
	  </div>
	</div>
</div>

<!-- footer end -->


</div>	

<!-- container end -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>

<script src="<?php echo base_url(); ?>assets/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrapvalidator/dist/js/bootstrapValidator.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrapvalidator/validate.js"></script>

<script type="text/javascript">$(document).ready(function() { $("li.active").removeClass("active");var active = document.URL;active = active.split("#");$("#"+active[1]).addClass('active');});</script>
<script>
$(document).ready(function(){
	$('.order-confirmation-class #status').on('change',function(){
		if( $(this).val() == 1 ){
			$('#damagedquantity').attr('disabled',true);
		}else{
			$('#damagedquantity').attr('disabled',false);
		}	
	});
});
</script>

</body>
</html>

