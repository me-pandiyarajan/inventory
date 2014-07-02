<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Estimation</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
   
        <!-- /.dynamic content -->
       
    <div class="col-lg-12">
	 <div class="row">
        <div class="form-group">
            <label class="control-label col-xs-2" for="project_name">Project</label>
            <div class="col-xs-4">
				<input type="hidden" name="project_id" id="project_id" value="" />
                <input type="text" class="form-control project_typeahead" value="" id="project_name_id_fetch" placeholder="Enter project name/code" name="product_name_id" >
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-xs-2" for="product_name">Customer</label>
            <div class="col-xs-4">
				<input type="hidden" name="customerid" id="customerid" />
                <input type="text" class="form-control customer_typeahead" id="customer_name" placeholder="Enter customer name/code" name="customer_name" >
            </div>
          </div>
      </div>
		  <div class="row">
		  <div class="form-group">
		  <label for="product_name" class="col-xs-2 control-label">Product Name</label>
			<div class="col-xs-4">
			<input type="text" class="form-control product_typeahead" id="product_name" name="product_name" placeholder="Enter product name/PLU" >
			</div>
	   </div></div>
	   <div class="row">
		 <table class="table table-bordered" id='product_add'>
                <thead>
                    <th>Remove</th>
                    <th>PLU</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Amount</th>
                </thead>    
                <tbody id="productlist">
                
                </tbody>
            </table>
    
<link href="<?php echo base_url(); ?>assets_pos/css/typeahead.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets_pos/plugins/css/typeahead.css" rel="stylesheet">
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/plugins/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_pos/js/pos_estimation_created.js"></script>   
</div>
</div>
</div>
</body>

</html>

