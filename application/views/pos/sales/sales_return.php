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
	 
        <table class="table table-bordered" id='return_sale'>
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
                <tbody id="damageItemsList">
                
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
                    <td><i class="fa fa-inr"> <span id="subTotal">0.00</span></td>
                </tr>
                
                <tr>
                    <th>Grand Total</th>
                    <td><i class="fa fa-inr"> <span id="grandTotal">0.00</span></td>
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

        <div class="row col-xs-5 col-xs-offset-7 pull-right" id="damaged" style="display:none">
            <table class="table table-bordered" id='sales_payment'>
                <tr>
                    <th>Compensated by</th>
                    <td class="col-xs-6 control-group"> 
                        <?php 
                            $options = array('1'  => 'Cash','2' => 'Product'); 
                            echo form_dropdown('CompensatedBy', $options,'class="form-control" id = "CompensatedBy" required');
                        ?>
                    </td>
                </tr>
             <!-- <tr id="Quantity">
                    <th>Quantity</th>
                    <td colspan="2" class="form-group text-center">
                     <input  type="text" name="Quantity">
                   </td>
                </tr>
                <tr id="Price">
                 <th>Price</th>
                    <td colspan="2" class="form-group text-center">
                     <input  type="text" name="Price">
                   </td>
                </tr>-->
               
            </table>
        </div>

        <div class="row col-xs-5 col-xs-offset-7 pull-right">
            <button class="btn btn-success btn-lg col-xs-12" type="submit" >Submit</button>
        </div>                 
                 
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
	       <p>Please add at least one product</p>
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
           <p>A product cannot be added twice.</p>
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
         $("#damaged").show();
         $("#title").html("Damaged");
         $("form#returns").attr('action',base_url + 'pos/return_damage/damaged');
      }
      else
      {
          $("#damaged").hide();
          $("#title").html("Sales Return");
          $("form#returns").attr('action',base_url + 'pos/return_damage/returnSale');
      }
    });
}); 
</script>

<!--<script type="text/javascript">
    $(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")== "1"){
                    $("#Quantity").hide();
                    $("#Price").show();
                }
                if($(this).attr("value")== "2"){
                    $("#Price").hide();
                    $("#Quantity").show();
                }
                
            });
        }).change();
    });
</script>-->
</body>

</html>

