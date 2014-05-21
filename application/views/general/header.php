<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/nav.css" rel="stylesheet">


<script>
	function startTime() {

		var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	    var today=new Date();
	    var date = month[today.getMonth()]+" "+today.getDate()+", "+today.getFullYear();
	    var h=today.getHours();
	    var m=today.getMinutes();
	    var s=today.getSeconds();
	    m = checkTime(m);
	    s = checkTime(s);

		var suffix = "AM";
		if (h >= 12) 
		{
			suffix = "PM";
			h = h - 12;
		}
			if (h == 0) {
			h = 12;
		}

	    document.getElementById('timer').innerHTML = date+" "+h+":"+m+":"+s+" "+ suffix;
	    var t = setTimeout(function(){startTime()},500);
	}

	function checkTime(i) {
	    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
	    return i;
	}
</script>
</head>
<body onload="startTime()">

<!-- header pannel -->		
<div class="panel panel-default">
  <div class="panel-body">
  		Inventory
			<span class="pull-right">
				<span id="timer">
				
			</span>
			<div class="btn-group">
			  <button type="button" class="btn btn-info btn-sm"><?php echo $user_data['firstName']." ".$user_data['lastName'];?></button>
			  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
			  <ul class="dropdown-menu">
			     <li><a href="<?php echo base_url();?>auth/view_profile/<?php echo $user_data['id']; ?>">My profile</a></li>
			  </ul>
			</div>
		  <a type="button" class="btn btn-sm btn-info" href="<?php echo site_url()."auth/logout"?>"><span class="glyphicon glyphicon-off"></span> Logout</a> 
		</span>	
  </div>
</div>
<!-- header pannel end-->

<!-- container start -->
<div class="container-fluid">
	<div class="row">
