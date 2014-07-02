<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Project Sales</h1>
        </div>
        
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- /.dynamic content -->
       
    <div class="col-lg-12">
        <?php echo validation_errors();   
          if(!empty($success)) echo $success; ?>
        <?php 
           $attributes = array('class' => 'form-horizontal', 'id' => 'general');
           echo form_open_multipart($form_action,$attributes);
        ?>



        <div class="form-group">
            <label class="control-label col-xs-1" for="project_name">Project</label>
            <div class="col-xs-3">
                 <input type="text" class="form-control typeahead" value="<?php echo set_value('project_name'); ?>" id="project_name_id_fetch" placeholder="Project Name" name="project_name_id_fetch" >
            </div>
            <div class="col-xs-3">
                 <button class="btn btn-success btn-circle btn-default btn-outline" type="button">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
       
        <div class="form-group has-success">
            <div class="col-xs-12">  
                <input type="text" class="form-control input-lg product_typeahead" value="<?php echo set_value('product_name_id'); ?>" id="product_name_id" placeholder="Product Name or PLU" name="product_name_id" >
            </div>
        </div>
	 

       
         
            <table class="table table-bordered" id='project_sales'>
                <thead>
                    <th>Remove</th>
                    <th>PLU</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th colspan="2">Quantity</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Amount</th>
                   

                </thead>    
                <tbody id="projectItemsList">
                
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
                    <th>Discount</th>
                    <td><span id="dis_per">0</span>%</td>
                </tr>
                <tr>
                    <th>Tax Total</th>
                    <td>0.00</td>
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
            <table class="table table-bordered" id='sales_payment'>
                <tr>
                    <th>Tendered by</th>
                    <td class="col-xs-6 control-group"> 
                        <?php 
                            $options = array(''=>'Select payment type','1'  => 'Cash','2' => 'Cheque','3'=>'DD','4'=>'Credit'); 
                            echo form_dropdown('paymentType', $options,'class="form-control" required');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="form-group text-center">
                            
                    <label class="radio-inline">
                        <input id="payment_status1" type="radio" required value="1" name="payment_status">Fully Payment</label>
                    <label class="radio-inline">
                        <input id="payment_status2" type="radio" required value="2" name="payment_status">Partial Payment</label>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row col-xs-5 col-xs-offset-7 pull-right">
            <button class="btn btn-success btn-lg col-xs-12" type="submit" >Complete Sale</button>
        <div>                 
                 
    </form>
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
	       <p>Please add at least one product to sell</p>
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
           <p>A product cannot be added twice in an sale.</p>
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
<?php
if ($visiblity == 1) {
    echo '<script src="assets_pos/js/project_superadmin.js"></script>';
}
elseif ($visiblity == 2 || $visiblity == 3) {
    echo '<script src="assets_pos/js/project_admin.js"></script>';
}

?>
<!-- SB Admin Scripts - Include with every page -->
<script src="assets_pos/js/sb-admin.js"></script>


</body>

</html>

