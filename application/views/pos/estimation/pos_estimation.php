<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Estimation</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<?php echo validation_errors();   
          if(!empty($success)) echo $success; ?>
          <?php if ( $this->session->flashdata('estimationcreated') ) echo $this->session->flashdata('estimationcreated'); ?>
        <?php 
           $attributes = array('class' => 'form-horizontal', 'id' => 'returns');
           echo form_open_multipart($form_action,$attributes);
        ?>
    <div class="row">
  <div class="col-xs-6">
        <div class="form-group">
            <label class="control-label col-xs-2" for="project_name">Project</label>
            <div class="col-xs-8">
        <input type="hidden" name="project_id" id="project_id"  />
                <input type="text" class="form-control project_typeahead" value="" id="project_name_id_fetch" placeholder="Enter project name/code" name="project_name_id_fetch" >
            </div>
        </div>
  </div>
  <div class="col-xs-6">
    <div class="form-group">
            <div class="col-xs-2">
              <label class="control-label" for="product_name">Customer</label>
            </div>
            
            <div class="col-xs-8">
           
                <input type="text" class="form-control customer_typeahead" value="" id="customer_name" placeholder="Enter customer name/code" name="customerName" >
            </div>
          </div>
     </div>
     </div>
		 <div class="row">
		  <div class="form-group">
		  <div class="col-lg-12">
			<input type="text" class="form-control input-lg product_typeahead" id="product_name" name="product_name" placeholder="Enter product name/PLU" >
			</div>
	   </div></div>
    <!-- /.row -->
   
        <!-- /.dynamic content -->
    
   <div class="row">
    
        <table class="table table-bordered" id='product_add'>
            <thead>
                <th>Remove</th>
                <th>PLU</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
      					<th>Unit</th>
      					<th>Tax</th>
                <th>Amount</th>
            </thead>    
            <tbody id="productlist">
            
            </tbody>
        </table>

    <div>
        
        <div class="row col-xs-6 col-xs-offset-0">
            <address>
              <strong>To:</strong><br>
              <strong><span id="customer_name_show"></span></strong><br>
              <span id="street_show"></span><br>
              <span id="city_show"></span> <span id="zipcode_show"></span><br>
              <span id="state_show"></span> <br>
              <span id="customer_phone_show"></span><br>
              <span id="customer_email_show"></span><br>
            </address>
        </div>

        <div class="row col-xs-5 pull-right">
            <table class="table table-bordered" id='sales_price_cal'>
                <tr>
                    <th>Sub Total</th>
                    <td id="subTotal">0.00</td>
                </tr>
                
                <tr>
                    <th>Grand Total</th>
                    <td><span id="grandTotal">0.00</span></td>
                </tr>
            </table>
        </div>

    </div>

        <!-- data to post -->
            
            <!-- customer details - primary -->
            <input type="hidden" id="customer_id" name="customer_id" value="" />
            <input type="hidden" id="customer_name" name="customer_name" value="" />
            <input type="hidden" id="customer_phone" name="customer_phone" value="" />
            <input type="hidden" id="customer_email" name="customer_email" value="" />

            <!-- customer details - registered address -->
            <input type="hidden" id="street" name="street" value="" />
            <input type="hidden" id="city" name="city" value="" />
            <input type="hidden" id="state" name="state" value="" />
            <input type="hidden" id="zipcode" name="zipcode" value="" />

            <!-- customer details - delivery address -->
            <input type="hidden" id="dstreet" name="dstreet" value="" />
            <input type="hidden" id="dcity" name="dcity" value="" />
            <input type="hidden" id="dstate" name="dstate" value="" />
            <input type="hidden" id="dzipcode" name="dzipcode" value="" />

            <!-- customer details - group details -->
            <input type="hidden" id="cg_id" name="cg_id" value="" />
            <input type="hidden" id="cg_name" name="cg_name" value="" />
            <input type="hidden" id="cg_discount_percent" name="discount" value="0.00" />
            

        <!-- /. data -->

        <div class="row col-xs-5 col-xs-offset-7 pull-right">
            <button class="btn btn-success btn-lg col-xs-12" type="submit" href="">Send Estimation</button>
        </div>                 
                 
<?php echo form_close();?>
</div>


<!-- Button trigger modal -->
<button  class="hidden" data-toggle="modal" id="pop" data-target="#myModal"></button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title text-danger" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span> <strong>ALERT<strong></h5>
      </div>
        <div class="modal-body" >
	       <p>Please add at least one product to estimate</p>
        </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<button  class="hidden" data-toggle="modal" id="pop2" data-target="#myModal2"></button>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title text-danger" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span> <strong>ALERT<strong></h5>
      </div>
        <div class="modal-body" >
           <p>A product cannot be added twice in an estimate.</p>
        </div>
    </div>
  </div>
</div>


<!-- Core Scripts - Include with every page -->
<script src="assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
<script src="assets_pos/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets_pos/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets_pos/plugins/bigslide/bigSlide.min.js"></script>


<!-- Page-Level Plugin Scripts - Sales -->
<link href="assets_pos/css/typeahead.css" rel="stylesheet">
<script src="assets_pos/plugins/typeahead/typeahead.bundle.js"></script>
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="assets_pos/plugins/mask/jquery.mask.min.js"></script>
<script src="assets_pos/js/pos_estimation_created.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="assets_pos/js/sb-admin.js"></script>
</body>

</html>
