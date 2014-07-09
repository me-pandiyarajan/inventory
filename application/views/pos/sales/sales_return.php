<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          
          
          <h1 class="page-header text-center" >
            <span class="pull-left"><input type="checkbox" name="my-checkbox" checked  data-on-text="Return" data-off-text="Damage" data-size='large' data-on-color = "success" data-target="#intro"></span>
            <span id="title"><?php echo $title; ?></span>
          </h1>

          <div class="form-group has-success">
            
         <input type="text" class="form-control input-lg typeahead" value="<?php echo set_value('invoice_id'); ?>" id="invoice_id" placeholder="Invoice Id" name="invoice_id" >
        </div>
        <!-- /.col-lg-12 -->
    </div>
  </div>
    <!-- /.row -->
    <div class="row">
        <!-- /.dynamic content -->
       
    <div class="col-lg-12">
        <?php echo validation_errors();   
          if(!empty($success)) echo $success; ?>
          <?php if ( $this->session->flashdata('returnsale') ) echo $this->session->flashdata('returnsale'); ?>
        <?php 
           $attributes = array('class' => 'form-horizontal', 'id' => 'returns');
           echo form_open_multipart($form_action,$attributes);
        ?>
	 
      <div class="table-responsive">
        <table class="table table-bordered" id='return_sale'>
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
              <tbody id="damageItemsList">
              
              </tbody>
          </table>
      </div>


    <div >
        
        <div class="row col-xs-7">
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

        <div class="row col-xs-5 pull-right">

                <table class="table table-bordered" id='return_price_cal'>
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
                   
              <button class="btn btn-success btn-lg col-xs-12" type="submit" >Submit</button>
          
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
                     
    <?php echo form_close(); ?>
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
<script src="assets_pos/js/salesreturn.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="assets_pos/js/sb-admin.js"></script>


<link href="assets_pos/css/bootstrap-switch.css" rel="stylesheet">
<script src="assets_pos/plugins/bootstrapswitch/bootstrap-switch.js"></script>


<script>
$(function() {
   $('input[name="my-checkbox"]').bootstrapSwitch('state', true, true);

   $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
    
      if(state == false)
      {
         $("#title").html("Damaged");
         $("form#returns").attr('action',base_url + 'pos/return_damage/damaged');
      }
      else
      {
          $("#title").html("Sales Return");
          $("form#returns").attr('action',base_url + 'pos/return_damage/returnSale');
      }
    });
}); 
</script>
</body>

</html>

