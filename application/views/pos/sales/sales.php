<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Sales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- /.dynamic content -->
       
    <div class="col-lg-12">

        <?php if ( $this->session->flashdata('sale_status') ) echo $this->session->flashdata('sale_status'); ?>
        <?php 
              $attributes = array('class' => 'form-horizontal', 'id' => 'general');
              echo form_open_multipart($form_action,$attributes);
        ?>

        <div class="form-group">
            <label class="control-label col-xs-1" for="customer_name">Customer</label>
            <div class="col-xs-3">
                <input type="text" class="form-control customer_typeahead" value="<?php echo set_value('customer_name'); ?>" id="customer_name_id_fetch" placeholder="Customer Name/id" >
            </div>
            <div class="col-xs-3">
                 <button class="btn btn-success btn-circle btn-default btn-outline" type="button">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
       
        <div class="form-group has-success">
            <div class="col-xs-12">  
                <input type="text" class="form-control input-lg typeahead" value="<?php echo set_value('product_name_id'); ?>" id="product_name_id" placeholder="Product Name or PLU"  >
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id='sales'>
                <thead>
                    <tr>
                        <th rowspan="2">Remove</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2" colspan="2">Quantity</th>
                        <th rowspan="2">Unit Price</th>
                        <th rowspan="2">Amount</th>
                        <th rowspan="2">Discount</th>
                        <th colspan="2">Total</th>
                    </tr>
                    <tr>
                        <th >Tax</th>
                        <th >Tax Total</th>
                    </tr>
                </thead>    
                <tbody id="itemsList">
               
                </tbody>
            </table>
        </div>
    
    <div >
        
        <div class="row col-xs-3">
            <address >
              <strong>To:</strong><br>
              <strong><span id="customer_name_show"></span></strong><br>
              <span id="street_show"></span><br>
              <span id="city_show"></span> <span id="zipcode_show"></span><br>
              <span id="state_show"></span> <br>
              <span id="customer_phone_show"></span><br>
              <span id="customer_email_show"></span><br>
            </address>
        </div>
        <div class="row col-xs-4">
             <address >
              <strong>Delivery Address:</strong><br>
              <span id="d_address" class="hidden"> <textarea class="form-control" rows="4" name="d_address_txt" id="d_address_txt" ></textarea> </span>
            </address>
        </div>

        <div class="row col-xs-5 pull-right">

                <table class="table table-bordered" id='sales_price_cal'>
                <!-- <tr>
                        <th class="col-xs-4">Sub Total</th>
                        <td><i class="fa fa-inr"></i> <span id="subTotal">0.00</span></td>
                    </tr> 
                    <tr>
                        <th>Discount</th>
                        <td><span id="dis_per">0</span>%</td>
                    </tr>
                    <tr>
                        <th>Tax Total</th>
                        <td>0.00</td>
                    </tr> -->
                    <tr>
                        <th>Grand Total</th>
                        <td><i class="fa fa-inr"></i> <span id="grandTotal">0.00</span></td>
                    </tr>
                </table>
                   
                <table class="table table-bordered" id='sales_payment' >
                    <tr>
                        <th >Transaction mode</th>
                        <td class="form-group">      
                            <label class="radio-inline">
                                <input id="transac_mode1" type="radio" required value="1" name="transac_mode" checked >General</label>
                            <!-- <label class="radio-inline">
                                <input id="transac_mode2" type="radio" required value="2" name="transac_mode">Demo</label> -->
                            <!-- <label class="radio-inline">
                                <input id="transac_mode3" type="radio" required value="3" name="transac_mode">Gift</label> --> 
                        </td>
                    </tr>
                    <tr>
                        <th>Mode of Payment</th>
                        <td class="control-group"> 
                            <?php 
                                $options = array(' '=>'Select mode of payment','1' => 'Cash','2' => 'Cheque','3' => 'Card'); 
                                echo form_dropdown('paymentType', $options,set_value('paymentType'),'class="form-control"');
                            ?>
                        </td>
                    </tr>
                     <tr>
                        <th>Delivery</th>
                        <td class="control-group"> 
                            <input type="checkbox" name="deliver" id="deliver" checked /> Now
                        </td>
                    </tr>
                    <tr id="discountAccess">
                        <th>Discount</th>
                        <td class="control-group"> 
                            <input type="hidden" class="form-control col-xs-8" id="cg_discount_percent" name="discount" value="0.00" />
                            <a class="btn btn-success btn-sm" id="access_code"  >Request</a>
                        </td>
                    </tr>
                <!-- <tr>
                        <td colspan="2" class="form-group text-center">        
                        <label class="radio-inline">
                        <input id="payment_status1" type="radio" required value="1" name="payment_status">Fully Payment</label>
                        <label class="radio-inline">
                        <input id="payment_status2" type="radio" required value="2" name="payment_status">Partial Payment</label>
                        </td>
                    </tr> -->
                </table>
            
                <button class="btn btn-success btn-lg col-xs-12" type="submit" >Complete Sale</button>

        </div>
            
    </div>
        <!-- data to post -->  
            <!-- customer details - primary -->
            <input type="hidden" id="customer_id" name="customer_id" value="null" />
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
    <?php echo form_close(); ?>
</div>


<!-- Core Scripts - Include with every page -->
<script src="assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
<script src="assets_pos/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets_pos/plugins/bootstrapDialog/dist/js/bootstrap-dialog.min.js"></script>
<script src="assets_pos/plugins/metisMenu/jquery.metisMenu.js"></script>


<!-- Page-Level Plugin Scripts - Sales -->
<link href="assets_pos/css/typeahead.css" rel="stylesheet">
<script src="assets_pos/plugins/typeahead/typeahead.bundle.js"></script>
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="assets_pos/js/sales_admin.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="assets_pos/js/sb-admin.js"></script>


</body>

</html>

