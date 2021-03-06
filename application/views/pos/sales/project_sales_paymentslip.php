<!DOCTYPE html>
<?php
        header('X-Frame-Options: ALLOW-FROM *'); 
    ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of sale</title>
</head>

<body>

    <div class="container" id="printdiv">
        <base href="<?php echo base_url();?>" />
        <!-- Core CSS - Include with every page -->
        <link href="assets_pos/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets_pos/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="assets_pos/css/tableStyle.css" rel="stylesheet">

        <div class="row">
            <div class="col-lg-12 page-header">
                <div class="col-xs-6 ">
                    <address>
                      <h4>Saagar's furnishing</h4>
                      <span id="street_show"><?php echo $street; ?></span><br>
                      <span id="city_show"><?php echo $city; ?></span> 
                      <span id="state_show"><?php echo $state; ?></span> <span id="zipcode_show"><?php echo $zipcode; ?></span><br>
                      
                      <span id="customer_phone_show"><?php echo $customer_phone; ?></span><br>
                      <span id="customer_email_show"><?php echo $customer_email; ?></span><br>
                    </address>
                </div>
                <div class="text-right col-xs-5 pull-right">
                    <h1>PaymentSlip</h1>
                    <label>PSID #:</label> <?php echo $invoice_number; ?> <br>
                    <label>DATE:</label> <?php echo date('d F Y'); ?>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


    <div class="row">
        <!-- /.dynamic content -->
         <div class="col-lg-12">     
            <div class="col-xs-6">
                <address>
                  <strong>To:</strong><br>
                  <strong><span id="customer_name_show"><?php echo $customer_name; ?></span></strong><br>
                  <span id="street_show"><?php echo $street; ?></span><br>
                  <span id="city_show"><?php echo $city; ?></span> <br>
                  <span id="state_show"><?php echo $state; ?></span> <span id="zipcode_show"><?php echo $zipcode; ?></span><br>
                  <span id="customer_phone_show"><?php echo $customer_phone; ?></span><br>
                  <span id="customer_email_show"><?php echo $customer_email; ?></span><br>
                </address>
            </div>
        </div>
       
        <div class="col-lg-12" >
       
            <div class="col-lg-12" >

                <table class="table table-bordered" id='invoice_preview'>
                    <thead>
                        <tr>
                            <th rowspan="2">Description</th>
                            <th rowspan="2">Quantity</th>
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
                    <tbody >
                        <?php for ($i=0; $i < count($product_ids); $i++) : ?>
                            <tr>
                                <td > <?php echo $descriptions[$i]; ?> </td>
                                <td > <?php echo $quantities[$i] ." ".$units[$i]; ?> </td>
                                <td ><i class="fa fa-inr"></i>  <?php echo $prices[$i] ?> </td>
                                <td ><i class="fa fa-inr"></i>  <?php echo $amounts[$i] ?> </td>
                                <td ><i class="fa fa-inr"></i>  <?php echo $discount_prices[$i] ?> </td>   
                                <td > <?php echo $taxs[$i]; ?> % </td>
                                <td ><i class="fa fa-inr"></i>  <?php echo $totals[$i]; ?> </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

            </div>
                
            <div class="col-xs-offset-7 col-xs-5 pull-right">

                <table class="table table-bordered" id='sales_price_cal'>
                    <tr>
                        <th>Grand Total</th>
                        <td><i class="fa fa-inr"></i> <span id="grandTotal"><?php echo $grandTotal; ?></span></td>
                    </tr>
                </table>
                 
                 <table class="table table-bordered" id='sales_payment'>
                    <tr >
                        <th >Transaction mode</th>
                        <td class="form-group">      
                            <?php 
                            switch ($transac_mode) {
                                case 1:
                                    echo "General";
                                    break;
                                case 2:
                                    break;
                                case 3:
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tendered by</th>
                        <td class="col-xs-6 control-group"> 
                            <?php 
                            switch ($paymentType) {
                                case 1:
                                    echo "Cash";
                                    break;
                                case 2:
                                    echo "Cheque";
                                    break;
                                case 3:
                                    echo "DD";
                                    break;
                                case 4:
                                    echo "Card";
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Amount Paid</th>
                        <td class="col-xs-6; control-group"> 
                            <?php 
                            switch ($payment_status) {
                                case 1:
                                    echo "FULL PAYMENT";
                                    break;
                                case 2:
                                    echo '<i class="fa fa-inr"></i> '.$amount_paid;
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Delivery</th>
                        <td class="col-xs-6 control-group"> 
                            <?php if(isset($deliver)){ echo "NOW"; }else{ echo "LATER"; } ?>
                        </td>
                    </tr>
                </table>

            </div>

        </div>
         
    </div>

</div>


 <div class="container">

    <div class="col-lg-12" >
        <div class="row col-xs-5 col-xs-offset-7 pull-right">
            <input type="checkbox" name="print" checked id="print"> Print this invoice
        </div>

        <div class="row">

            <div class="col-xs-3 col-xs-offset-1">
                <a class="btn btn-danger btn-lg col-xs-12 pull-right" href="pos/sales/ProjectSale"  >Cancel</a> 
            </div>

            <div class="col-xs-3">
                <a class="btn btn-warning btn-lg col-xs-12 pull-right" id="edit" >Edit</a> 
            </div>

            <div class="col-xs-5">
               
                <input type="submit" class="btn btn-success btn-lg col-xs-12 pull-right"  href="#" id="hrefPrint"  value="Save" />  </input> 
               
            </div>

        </div>
    </div> 
     
</div>


</div>     



<!-- Core Scripts - Include with every page -->
<script src="assets_pos/plugins/jquery/core/jquery-1.11.0.js"></script>
<script src="assets_pos/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page-Level Plugin Scripts - Sales -->
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>

<!-- print -->
<script src="assets_pos/js/jQuery.print.js"></script>
<script>


jQuery(document).ready(function($) {

    //callPrint("http://192.168.5.19/inventory/assets_inv/estimations/EST000044_2014_06_25.pdf");
 /* function print(url)
  {

      var _this = this,
          iframeId = 'iframeprint',
          $iframe = $('iframe#iframeprint');
      $iframe.attr('src', url);
 
 _this.callPrint(iframeId);
    //  $iframe.load(function() {
      //    _this.callPrint(iframeId);
     // });
  }*/
 
  //initiates print once content has been loaded into iframe
  /*function callPrint() {
    var _this = this,
          iframeId = 'iframeprint',
          $iframe = $('iframe#iframeprint');
      $iframe.attr('src', 'http://192.168.5.19/inventory/assets_inv/estimations/EST000044_2014_06_25.pdf');

      var PDF = document.getElementById('iframeprint');
      alert(document.getElementById('iframeprint'));
      PDF.focus();
      PDF.contentWindow.print();
  }
  callPrint();
});*/

   /* $(function() {

        $("#hrefPrint").click(function() {

                if($('#print').is(":checked"))
                {
                   $("#printdiv").print();
                }
                setTimeout(redirector, 15000);    
            });

        $("#edit").click(function() {
            window.history.back();
        });

        function redirector () {
           window.location = base_url + "pos/sales/createSale";
        }

    });*/
</script>

</body>

</html>



                 