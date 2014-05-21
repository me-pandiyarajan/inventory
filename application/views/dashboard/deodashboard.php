<div class="col-sm-9 col-md-10 main">

<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>assets/chartjs/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/chartjs/js/knockout-3.0.0.js"></script>
<script src="<?php echo base_url(); ?>assets/chartjs/js/globalize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/chartjs/js/dx.chartjs.js"></script>
	
	<div class="col-md-7 ">	
		 <div class="panel panel-default ht-5 text-center">
				<h3 class="text-info"> WELCOME ! </h3>
				<hr>
			<div id="chartContainer" class="case-containers chart-dim"></div>	
		</div>			
	</div>

	<div class="col-md-5 ">	
		 <div class="panel panel-default ht-5 text-center">
			<div class="col-md-12">
			<h3>REVERTED</h3>
			<h2 class="txt-thick-big"> { <?php echo $productsCount['reverted']; ?> } </h2>
			</div>

			<div class="col-md-12">
				<h3>TOTAL PRODUCTS</h3>
				<h2 class="txt-thick-big"> { <?php echo $totalProducts; ?> } </h2>
			</div>			
		</div>			
	</div>

</div>


</div>
</div>
		
<script>
	$(function ()  {

	 var dataSource = [
		    {status: "Created", val: <?php echo $productsCount['created'];  ?>},
		    {status: "Deleted", val: <?php echo $productsCount['deleted'];  ?>}
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