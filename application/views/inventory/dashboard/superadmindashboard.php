<div class="col-sm-9 col-md-10 main">

<link href="<?php echo base_url(); ?>assets_inv/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets_inv/css/dashboard.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/chartjs/js/knockout-3.0.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/chartjs/js/globalize.min.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/chartjs/js/dx.chartjs.js"></script>
<script type="text/javascript">$(document).ready(function() { $("li.active").removeClass("active");var active = document.URL;active = active.split("#");$("#"+active[1]).addClass('active');});</script>
	
	<div class="col-md-7 ">			
		<div class="panel panel-default ht-3_5 text-center">
				<h3 class="text-info"> WELCOME ! </h3>
				<hr>

				<div class="col-md-6">
					<h3>FOR APPROVAL</h3>
					<a href="<?php echo base_url();?>inventory/Product/newproductlist"><h2 class="txt-thick-big"> { <?php echo $forApproval; ?> } </h2></a>
				</div>
				<div class="col-md-6">
					<h3>BELOW SAFETY LEVEL</h3>
					<a href="<?php echo base_url();?>inventory/Product/safetystocklevellist"><h2 class="txt-thick-big"> { <?php echo $belowSaftyLevel; ?> } </h2></a>
				</div>	
				<div class="col-md-6 ">
					<h3>TOTAL PRODUCTS</h3>
					<a href="<?php echo base_url();?>inventory/Product/productlist"><h2 class="txt-thick-big"> { <?php echo $totalProducts; ?> } </h2></a>
				</div>
				<div class="col-md-6">
					<h3>UPDATED PRODUCTS</h3>
					<a href="<?php echo base_url();?>inventory/Product/updatedproductlist"> <h2 class="txt-thick-big">{ <?php echo $updateproductcount; ?> } </h2></a>
				</div>	
				<div class="col-md-6 col-md-offset-3">
					<h3>TO BE ORDERED</h3>

					<a href="<?php echo base_url();?>inventory/product/tobeordered"><h2 class="txt-thick-big text-danger">{<?php echo $outofstock ; ?>} </h2></a>
				</div>				
		</div> 
							
	</div>

	<div class="col-md-5 ">	
		<div class="panel panel-default">		    
		    <div id="chartContainer" class="case-containers chart-dim"></div>		 
		</div>

	</div>
	
	<div class="col-md-12">
		<div class="col-md-4 panel panel-default text-center">	
			<p>ESTIMATED</p>
			<span class="size-medium"><?php echo $estimated; ?></span>	
		</div>

		<div class="col-md-4 panel panel-default text-center">	
			<p>ORDERED</p>
			<span class="size-medium"><?php echo $ordered; ?></span>
		</div>

		<div class="col-md-4 panel panel-default text-center">	
			<p>DELIVERED</p>
			<span class="size-medium"><?php echo $delivered; ?></span>
		</div>

	</div>

	<div class="col-md-12">
		<div class="col-md-4 panel panel-default text-center">	
			<p>SUPPLIER</p>
			<span class="text-success">ACTIVE</span>
			<span class="size-medium"><?php echo $supplierCount['active']; ?></span>
			<span class="size-large">|</span>
			<span class="size-medium"><?php echo $supplierCount['inactive']; ?></span>
			<span class="text-danger">INACTIVE</span>
		</div>

		<div class="col-md-4 panel panel-default text-center">	
			<p>DATA ENTRY OPERATOR</p>
			<span class="text-success">ACTIVE</span>
			<span class="size-medium"><?php echo $deoCount['active']; ?></span>
			<span class="size-large">|</span>
			<span class="size-medium"><?php echo $deoCount['inactive']; ?></span>
			<span class="text-danger">INACTIVE</span>
		</div>

		<div class="col-md-4 panel panel-default text-center">	
			<p>Admin</p>
			<span class="text-success">ACTIVE</span>
			<span class="size-medium"><?php echo $adminCount['active']; ?></span>
			<span class="size-large">|</span>
			<span class="size-medium"><?php echo $adminCount['inactive']; ?></span>
			<span class="text-danger">INACTIVE</span>
		</div>

	</div>

</div>


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

</body>
</html>

		
<script>
	$(function ()  {

	 var dataSource = [
	    {status: "Created",  val: <?php echo $productsCount['created'];  ?>},
	    {status: "Approved", val: <?php echo $productsCount['approved']; ?>},
	    {status: "Deleted",  val: <?php echo $productsCount['deleted'];  ?>}
	];

		$("#chartContainer").dxPieChart({
		    dataSource: dataSource,
		    title: "Product's status",
			tooltip: {
				enabled: true,
				percentPrecision: 2,
				customizeText: function() { 
					return this.valueText + " - " + this.percentText;
				}
			},
			legend: {
				horizontalAlignment: "center",
				verticalAlignment: "top",
				margin: 0
			},
			series: [{
				type: "doughnut",
				argumentField: "status",
				label: {
					visible: true,
					connector: {
						visible: true
					}
				}
			}]
		});
	
	});
</script>