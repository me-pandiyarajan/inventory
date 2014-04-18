<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/nav.css" rel="stylesheet">

</head>
<body>

<!-- header pannel -->		
<div class="panel panel-default">
  <div class="panel-body">
    Welcome: <?php echo $data;?>
    	<span>
    		<script type="text/javascript">
			<!--
				var currentDate = new Date()
				var day = currentDate.getDate()
				var month = currentDate.getMonth() + 1
				var year = currentDate.getFullYear()

				document.write("" + day + "/" + month + "/" + year + "")
			//-->
			</script>
			<script type="text/javascript">
			<!--
				var currentTime = new Date()
				var hours = currentTime.getHours()
				var minutes = currentTime.getMinutes()

				if (minutes < 10)
				minutes = "0" + minutes

				var suffix = "AM";
				if (hours >= 12) {
				suffix = "PM";
				hours = hours - 12;
				}
				if (hours == 0) {
				hours = 12;
				}

				document.write("" + hours + ":" + minutes + " " + suffix + "")
			//-->
			</script>
		</span>
		<span class="pull-right">
			<div class="btn-group">
			  <button type="button" class="btn btn-info btn-sm">Profile</button>
			  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
			  <ul class="dropdown-menu">
			    <li><a href="#">Action</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Separated link</a></li>
			  </ul>
			</div>
		  <a type="button" class="btn btn-sm btn-info" href="<?php echo site_url()."/login"?>"><span class="glyphicon glyphicon-off"></span> Logout</a> 
		</span>	
  </div>
</div>
<!-- header pannel end-->

<!-- container start -->
<div class="container-fluid">

	<div class="row">
