<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url(); ?>assets/css/mystyle.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head><body>
<div id="global" class="sty" >
<div  id="header" class="sty" >
<script type="text/javascript">
<!--
	var currentDate = new Date()
	var day = currentDate.getDate()
	var month = currentDate.getMonth() + 1
	var year = currentDate.getFullYear()
	document.write("<b>" + day + "/" + month + "/" + year + "</b>")
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

	document.write("<b>" + hours + ":" + minutes + " " + suffix + "</b>")
//-->
</script>

  Welcome :<?php echo $data;?>
  <button type="button"><img src="<?php echo base_url(); ?>assets/images/images.jpg" width="15";height="10";align="right" />Profile</button> 
  <button type="button"  href="<?php echo site_url()."/login"?>"><img src="<?php echo base_url(); ?>assets/images/logout.jpg" width="15";height="10";align="right" />LogOut</button> 
</div><br>





   
   