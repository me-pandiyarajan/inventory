 var x = 1; 

/*Fetch project list and project details*/    

var projects = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: base_url + 'pos/project/ajaxProjectsLookup/%QUERY'
});
     
projects.initialize();

    $('.typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'states',
        displayKey: 'value',
        source : projects.ttAdapter()
    });


$('.typeahead').bind('typeahead:selected', function(obj, datum, name) {

      $.getJSON(base_url + "pos/project/ajaxProjectDetails/"+ datum.id ,function(product){
           
           //console.log(product);
           //sold
           $('#project_id').val(product.project_id);
           $('#invoice_id').val(product.invoice_id);

           $.each(product.soldlist, function(index,key){

            var description = "<strong>" + key.ProductName + "</strong><br><i>" + key.Plu + "</i><br><br>" + key.Description; 
              
            //$('#'+variables).val('');
            newRow ='<tr>' +
                        '<td> <span class="label label-success">Sold</span> </td>' +
                        '<td >'+ description +'</td>' +
                        '<td >'+ key.Quantity +' </td>' +
                        '<td >'+ key.Unit +'</td>' +
                        '<td ><i class="fa fa-inr"></i> '+ key.Price +' </td>' +
                        '<td ><i class="fa fa-inr"></i> '+ key.Amount +'</td>' +
                        '<td ><i class="fa fa-inr"></i> '+ key.Discount +'</td>' +
                        '<td >'+ key.Tax +' % </td>' +
                        '<td ><i class="fa fa-inr"></i> '+ key.Total +'</td>' +
                        
                     '</tr>';
            
                $('.table > tbody#projectItemsList').append(newRow);
            
            });

       
        //unsold
         $.each(product.unsoldlist, function(index,key){

            var description = "<strong>" + key.ProductName + "</strong><br><i>" + key.Plu + "</i><br><br>" + key.Description;
            var p_id = key.ProductId;
            var selectTax = '<select id="t'+ p_id +'" pd-id="'+ p_id +'"  class="form-control tax" name="taxs[]" >'+ key.tax_options +'</select>';


            newRow = '<tr>' +
                        '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ description +' <input type="hidden"  id="descriptions" name="descriptions[]" value="'+ description +'" /> </td>' +
                        '<td ><input type="text" autocomplete="off" class="form-control quantity" id="q'+ p_id +'" name="quantities[]" pd-id="'+ p_id +'" quantity-unit="'+ key.Unit +'" actual-quantity="'+ key.availableQuantity +'" ssl="'+ key.SafetyStockLevel +'" value="'+ key.Quantity +'" /> </td>' +
                        '<td >'+ key.Unit +' <input type="hidden" id="unit" name="units[]" value="'+ key.Unit +'" /></td>' +
                        '<td ><i class="fa fa-inr"></i> '+ key.Price +'<input type="hidden" id="p'+ p_id +'" name="prices[]" value="'+ key.Price +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ key.Amount +'</span><input type="hidden" id="a'+ p_id +'" pd-id="'+ p_id +'"  name="amounts[]" class="amount" value="'+ key.Amount +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ key.Discount +'</span><input type="hidden" id="dp'+ p_id +'" pd-id="'+ p_id +'"  class="discount_amounts" name="discount_percents[]" value="'+ 0 +' " /><input type="hidden" id="dpr'+ p_id +'" pd-id="'+ p_id +'" name="discount_prices[]" value="'+ key.Discount +' " /></td>' +
                        '<td >'+ selectTax +'</td>' + 
                        '<td ><i class="fa fa-inr"></i> <span>'+ key.Total +'</span><input type="hidden" id="ta'+ p_id +'" name="totals[]" class="total" value="'+ key.Total +'" /> </td>' +
                     '</tr>';
            
                 $('.table > tbody#projectItemsList').append(newRow);
                 x = $('#project_sales tbody').children().length;
             });

        

        /*get customer details*/
            
           $.each(product.customer, function(field,value){
               
                switch (field) {
                    case 'customer_address':
                         $.each(value, function(field1,value1){
                            $('#'+field1).val(value1);
                         });
                        break;
                    case 'customer_d_address':
                        var fa = "";
                        $.each(value, function(field2,value2){
                            $('#'+field2).val(value2);
                            fa = fa + value2 + "\n";
                         });
                        $('#d_address_txt').text(fa);
                        if($('input[name="deliver"]:checked').length == 0){
                            $('#d_address').removeClass('hidden');
                        }
                        break;
                    case 'customer_group':
                        $.each(value, function(field3,value3){
                            $('#'+field3).val(value3);
                         });
                        break;
                    default:
                        $('#'+field).val(value);
                        break;
                    }
            
            });

           /*last transaction*/
           var allow_transaction = product.last_transaction.allowed;

           if(allow_transaction == false)
           {
                $('#tableLastTransaction').show();
                $('#complete_sale').prop('disabled', true);
                $.each(product.last_transaction.partPaymentDetails, function(index,key){
                newRow = '<tr class="danger">' +
                            '<td >PSID#'+ key.paymentSlipId +'<input type="hidden"  name="paymentSlipId[]" id="paymentSlipId" value="'+ key.paymentSlipId +'" /></td>' +
                            '<td ><i class="fa fa-inr"></i> '+ key.dueAmount +' <input type="hidden"  id="DueAmount" name="dueAmount[]" value="'+ key.dueAmount +'" /></td>' +
                            '<td >'+ key.createdDate +' <input type="hidden"  id="createdDate" name="createdDate[]" value="'+ key.createdDate +'" /></td>' +
                            '<td ><a class="btn btn-success btn-sm notpayed" onClick="payNow(this,'+ key.paymentSlipId +','+ key.dueAmount +')" >Pay now</a></td>' +
                         '</tr>';
                
                     $('#tableLastTransaction > tbody#dueList').append(newRow);
                 });
           }
           


           $('#dis_per').text($('#cg_discount_percent').val());

           $('#customer_name_show').text($('#customer_name').val());
           $('#street_show').text($('#street').val());
           $('#city_show').text($('#city').val());
           $('#state_show').text($('#state').val());
           $('#zipcode_show').text($('#zipcode').val());
           $('#customer_phone_show').html('<abbr title="Phone">P:</abbr> ' + $('#customer_phone').val());
           $('#customer_email_show').html('<abbr title="Email">E:</abbr> ' + $('#customer_email').val());

        discount();
        discountAccess();
        grandTotal();
      });
      
});


 /*Fetch product list and product details*/    

var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: base_url + 'pos/product/ajaxProductsLookup/%QUERY'
});
     
products.initialize();

    $('.product_typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'states',
        displayKey: 'value',
        source : products.ttAdapter()
    });


$('.product_typeahead').bind('typeahead:selected', function(obj, datum, name) {

      $.getJSON(base_url + "pos/product/ajaxProductDetails/"+ datum.id ,function(product){
            addProduct(product);
      });
    
});




/*
*  -----------------------------------------------------------------------------------------------------------------------------
*
*/

    var MaxInputs = 100;

    var FieldCount = 0; 
    var listed_products =  new Array();

    
    /*
     * add new product for sales
     */
   
    function addProduct(product)
    {
        if(x <= MaxInputs) 
        {
            FieldCount++;

            if( jQuery.inArray( product.p_name , listed_products ) > -1 && FieldCount > 1 ){
                message_content = '<p class="text-center">A product cannot be added twice in an sale.</p>' ;
                alert_warning(message_content);
                return false; 
            }

            if(product.p_name.length > 0)
            {
                var plu = product.plu;
                var p_id = product.productId;
                var quan = 1;

                //var price = ( product.price + (product.price * (parseFloat(product.tax.percent)/100)) ).toFixed(2);
                var price = ( parseFloat(product.price) ).toFixed(2);
                var amount = ( parseFloat(quan) * parseFloat(price) ).toFixed(2);
                var discount_price = ( parseFloat( amount ) * ( (parseFloat($('#cg_discount_percent').val() )/100 ) ) ).toFixed(2);

                var discounted_amount = parseFloat(amount) - parseFloat(discount_price);
                var amount_price_taxed =  ( parseFloat(discounted_amount) + (parseFloat(discounted_amount) * (parseFloat(product.tax.percent)/100)) ).toFixed(2);

                listed_products[FieldCount-1] = product.p_name;


                var description = "<strong>" +product.p_name + "</strong><br><i>" + plu + "</i><br><br>" + product.desc;
                var selectTax = '<select id="t'+ p_id +'" pd-id="'+ p_id +'" class="form-control tax" name="taxs[]" >'+ product.tax_options +'</select>'; 

            newRow = '<tr>' +
                        '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ description +' <input type="hidden"  id="descriptions" name="descriptions[]" value="'+ description +'" /> </td>' +
                        '<td ><input type="text" autocomplete="off" class="form-control quantity" id="q'+ p_id +'" name="quantities[]" pd-id="'+ p_id +'" quantity-unit="'+ product.unit +'" actual-quantity="'+ product.ava_quan +'" ssl="'+ product.ssl +'" value="'+ quan +'" /> </td>' +
                        '<td >'+ product.unit +' <input type="hidden" id="unit" name="units[]" value="'+ product.unit +'" /></td>' +
                        '<td ><i class="fa fa-inr"></i> '+ price +'<input type="hidden" id="p'+ p_id +'" name="prices[]" value="'+ price +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ amount +'</span><input type="hidden" id="a'+ p_id +'" pd-id="'+ p_id +'"  name="amounts[]" class="amount" value="'+ amount +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ discount_price +'</span><input type="hidden" id="dp'+ p_id +'" pd-id="'+ p_id +'"  class="discount_amounts" name="discount_percents[]" value="'+ discount_price +' " /><input type="hidden" id="dpr'+ p_id +'" pd-id="'+ p_id +'" name="discount_prices[]" value="'+ discount_price +' " /></td>' +
                        '<td >'+ selectTax +'</td>' + 
                        '<td ><i class="fa fa-inr"></i> <span>'+ amount_price_taxed +'</span><input type="hidden" id="ta'+ p_id +'" name="totals[]" class="total" value="'+ amount_price_taxed +'" /> </td>' +
                     '</tr>';
            
            $('.table > tbody#projectItemsList').append(newRow);

            x++;
            } 
            
        }

    grandTotal();    
    }

    
    /*
    *   calculate grandTotal price for items
    */

    function grandTotal () {
        var grandTotal = 0;

        if($('#project_sales tbody').children().length > 0) {

            $(".total").each(function() {
                grandTotal = ( parseFloat( $(this).val() ) + parseFloat( grandTotal ) ).toFixed(2);
                $('#grandTotal').html( grandTotal +' <input type="hidden" name="grandTotal" value="'+ grandTotal +'" />');
                $('#amount_paid').val(parseFloat(grandTotal/2).toFixed(2));
            });
        }
        else
        {
            $('#grandTotal').html('0.00 <input type="hidden" name="grandTotal" value="0.00" />');
        }

    }

    
    $( ".typeahead" ).focus(function(e) {
           var param = ['project_id','invoice_id','customer_id'];
            $.each(param, function(i,variables){
                $('#'+variables).val('');
        });
        $('#projectItemsList').html("");
        $('#tableLastTransaction').hide();
        $('#complete_sale').prop('disabled', false);
        grandTotal();
    });


    /*
    *   calculate price for quantity
    */

    $( "table#project_sales" ).on( "keyup",".quantity", function() {
        
        req_quan = $(this).val();
        
        if( req_quan != "" ){
           var pd_id = $(this).attr('pd-id');
           MasterCalculation(pd_id);
        }
        else
        {
            //$(this).val(1).delay(1500);
        }
    
    grandTotal();   
    });


    $( "table#project_sales" ).on( "blur",".quantity", function() {
        
        var pd_id = $(this).attr('pd-id');

        if( $(this).val() != "" ){
    
            req_quan    = parseFloat($(this).val());
            ssl         = parseFloat($(this).attr('ssl'));
            ava_quan    = parseFloat($(this).attr('actual-quantity'));
            quan_unit   = $(this).attr('quantity-unit');

            expected_inv_quantity = ava_quan - req_quan; 
        
            if(req_quan > ava_quan){         
                var message_content = '<p class="text-center">Oops.... we have only <b> '+ ava_quan +' '+ quan_unit +'</b> available at inventory! <br> So please enter upto <b>'+ ava_quan +' '+ quan_unit +'</b>. </p>';
                alert_warning(message_content);
                $(this).val(1);
            }

            //if(expected_inv_quantity < ssl) {
                // send message to super admin or admin. this alert for testing purpose
               //BootstrapDialog.alert("Warning: Quantity below safety level!");
            //}

        MasterCalculation(pd_id);    
        }
        else
        {
            $(this).val(1);
            MasterCalculation(pd_id);          
        }
    
    grandTotal();   
    });

    /*
    *   calculate price for tax
    */
    $( "table#project_sales" ).on( "change",".tax", function() {
        
        tax_percent = $(this).val();
        
        if( tax_percent != "" ){
           var pd_id = $(this).attr('pd-id');
           MasterCalculation(pd_id);
        }
        else
        {
            //$(this).val(1).delay(1500);
        }
    
    grandTotal();   
    });
    
    
    /*
    *   apply discount
    */ 
    function discount() {
        $(".discount_amounts").each(function() {
            var pd_id = $(this).attr('pd-id');
            MasterCalculation(pd_id);
        });
    }

    function discountAccess() 
    {
        if(parseFloat($('#cg_discount_percent').val()) <= 0)
        {
            $('#discountAccess').show();
        }
        else
        {
            $('#discountAccess').hide();
        }
    }
    discountAccess();


    $( "body" ).on( "click","#access_code", function() {
        $.get(base_url + "pos/sales/accessCode",function (response) {
            if(response == 1){
                $('#access_code').html('Verify');
                $('#access_code').attr('id','verifyCode');
                $('#cg_discount_percent').attr('type','text');
                $('#cg_discount_percent').val('');
            }
        }); 
    });

    $( "body" ).on( "click","#verifyCode", function() {
        var code = $('#cg_discount_percent').val();
        $.post(base_url + "pos/sales/discountCodeVerification",{ verification_code:code },function (response) {
            if(response == 1){
                $('#verifyCode').html('Apply');
                $('#verifyCode').attr('id','applyDiscount');
                $('#cg_discount_percent').val('');
            }
        });
    });

    $( "body" ).on( "click","#applyDiscount", function() { 
        var discount_percentage = $('#cg_discount_percent').val();
        discount();
        grandTotal();
    });


    /*
    *   Master calculation
    */
    function MasterCalculation (pd_id) {

        var tax_percent         = $('#t'+ pd_id ).val();
        var discount_percent    = $('#cg_discount_percent').val();

        var unit_price  = ( parseFloat( $('#p'+ pd_id ).val() ) ).toFixed(2);
        var quantity    = ( parseFloat( $('#q'+ pd_id ).val() ) );
        var amount      = ( parseInt(quantity) * parseFloat(unit_price) ).toFixed(2);

        var discount_price      = ( parseFloat( amount ) * ( ( parseFloat( discount_percent )/100 ) ) ).toFixed(2);
        var discounted_amount   = ( parseFloat( amount ) - parseFloat(discount_price) ).toFixed(2);
        
        var amount_price_taxed =  ( parseFloat(discounted_amount) + (parseFloat(discounted_amount) * (parseFloat(tax_percent)/100)) ).toFixed(2);

        // Discount
        $('#dp' + pd_id ).val( discount_percent );
        $('#dpr'+ pd_id ).val( discount_price );
        $('#dp' + pd_id ).siblings("span").text(discount_price);

        // Amount
        $('#a'+ pd_id ).val( amount ); 
        $('#a'+ pd_id ).siblings("span").text(amount);

        // Total Amount with Tax
        $('#ta'+ pd_id ).val( amount_price_taxed ); 
        $('#ta'+ pd_id ).siblings("span").text( amount_price_taxed );
    }


    /*
    *   Remove item
    */
    $("table").on("click",".remover", function(e){  
        if( x > 1 ) {
            var removeItem = $(this).closest('tr#product_names').val();
            $(this).closest('tr').remove();
            x--;
            listed_products.splice( $.inArray(removeItem,listed_products) ,1 );
        }
        grandTotal();
        return false;
    });


    /*
    *   check number of item for sales before billing.
    */
    $(document).on('submit','form',function(){
       var estimate_product_count = $('#project_sales tbody').children().length;  
       if(estimate_product_count == 0) {
            message_content = '<p>Please add at least one product to sell</p>' ;
            alert_warning(message_content);
            return false;
            }
    });

    /*
    *   mask (plugin)
    */
    //$(function(){
        //$('.quantity').mask('0#');
    //})

    /*
    *   warning function
    */

    function alert_warning (message_content) {
       BootstrapDialog.show({
            title: '<i class="fa fa-warning fa-lg"></i>  Warning',
            type: BootstrapDialog.TYPE_WARNING,
            message: message_content,
            buttons: [{
                label: 'Close',
                action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
    }

    /* payment of due payments.*/
    function payNow(btnObj,psid,amount) {

        $(btnObj).parent().text('payed');

        $.post('pos/sales/duepayment',{psid:psid,amount:amount},function (response) {

            alert(response);
            var payed = $('#tableLastTransaction tbody').find('.notpayed').length;
            if(payed < 1)
            {
                $('#complete_sale').prop('disabled', false);
            } 
        });
    }


    /*
    *   Miscellaneous 
    */
    $("table").on("change",".payment_status:radio", function(){  
       if($(this).val() == 2) {
            $('#amount_paid_row').show();
       }
       else{
            $('#amount_paid_row').hide();
       }
    });


    /* 
    *   delivery address editable; show hide
    */

    $("table").on("click","#deliver", function(e)
    {  
        if($('input[name="deliver"]:checked').length == 1){
            $('#d_address').addClass('hidden');
        }else{
            $('#d_address').removeClass('hidden');
        }
    });



