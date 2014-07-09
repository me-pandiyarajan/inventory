
/*Fetch product list and product details*/    

var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: base_url + 'pos/product/ajaxProductsLookup/%QUERY'
});
     
products.initialize();

    $('.typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'states',
        displayKey: 'value',
        source : products.ttAdapter()
    });


$('.typeahead').bind('typeahead:selected', function(obj, datum, name) {

      $.getJSON(base_url + "pos/product/ajaxProductDetails/"+ datum.id ,function(product){
            addProduct(product);
      });
    
});


/*Fetch customer list and customer details*/    

var customers = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: base_url + 'pos/customer/ajaxCustomersLookup/%QUERY'
});
     
customers.initialize();

$('.customer_typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'name',
        displayKey: 'value',
        source : customers.ttAdapter()
    });

$('.customer_typeahead').bind('typeahead:selected', function(obj, datum, name) {

      $.getJSON(base_url + "pos/customer/ajaxCustomerDetails/"+datum.id,function(result){

       
            $.each(result, function(field,value){
                
                switch (field) {
                    case 'customer_address':
                         $.each(value, function(field1,value1){
                            $('#'+field1).val(value1);
                         });
                        break;
                    case 'customer_d_address':
                        $.each(value, function(field2,value2){
                            $('#'+field2).val(value2);
                         });
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

           $('.dis_per').val($('#cg_discount_percent').val());

           $('#customer_name_show').text($('#customer_name').val());
           $('#street_show').text($('#street').val());
           $('#city_show').text($('#city').val());
           $('#state_show').text($('#state').val());
           $('#zipcode_show').text($('#zipcode').val());
           $('#customer_phone_show').html('<abbr title="Phone">P:</abbr> ' + $('#customer_phone').val());
           $('#customer_email_show').html('<abbr title="Email">E:</abbr> ' + $('#customer_email').val());

      discount();

      grandTotal();
      });

});
 

/*
*  -----------------------------------------------------------------------------------------------------------------------------
*
*/

    var MaxInputs = 100;

    var x = 1; 
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

            newRow = '<tr>' +
                        '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ description +' <input type="hidden"  id="descriptions" name="descriptions[]" value="'+ description +'" /> </td>' +
                        '<td ><input type="text" autocomplete="off" class="form-control quantity" id="q'+ p_id +'" name="quantities[]" pd-id="'+ p_id +'" quantity-unit="'+ product.unit +'" actual-quantity="'+ product.ava_quan +'" ssl="'+ product.ssl +'" value="'+ quan +'" /> </td>' +
                        '<td >'+ product.unit +' <input type="hidden" id="unit" name="units[]" value="'+ product.unit +'" /></td>' +
                        '<td ><i class="fa fa-inr"></i> '+ price +'<input type="hidden" id="p'+ p_id +'" name="prices[]" value="'+ price +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ amount +'</span><input type="hidden" id="a'+ p_id +'" pd-id="'+ p_id +'"  name="amounts[]" class="amount" value="'+ amount +'" /> </td>' +
                        '<td ><i class="fa fa-inr"></i> <span>'+ discount_price +'</span><input type="hidden" id="dp'+ p_id +'" pd-id="'+ p_id +'"  class="discount_amounts" name="discount_percents[]" value="'+ discount_price +' " /><input type="hidden" id="dpr'+ p_id +'" pd-id="'+ p_id +'" name="discount_prices[]" value="'+ discount_price +' " /></td>' +
                        '<td >'+ product.tax.percent +' %<input type="hidden" id="t'+ p_id +'" name="taxs[]"  value="'+ product.tax.percent +'" /></td>' + 
                        '<td ><i class="fa fa-inr"></i> <span>'+ amount_price_taxed +'</span><input type="hidden" id="ta'+ p_id +'" name="totals[]" class="total" value="'+ amount_price_taxed +'" /> </td>' +
                     '</tr>';
            
            $('.table > tbody#itemsList').append(newRow);

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

        if($('#sales tbody').children().length > 0) {

            $(".total").each(function() {
                grandTotal = ( parseFloat( $(this).val() ) + parseFloat( grandTotal ) ).toFixed(2);
                $('#grandTotal').html( grandTotal +' <input type="hidden" name="grandTotal" value="'+ grandTotal +'" />');
            });
        }
        else
        {
            $('#subTotal').html('0.00 <input type="hidden" name="subTotal" value="0.00" />')
        }

    }

    
    $( ".typeahead" ).focus(function(e) {
           var param = ['productId','plu','description','quantity','design','shade','dimension'];
            $.each(param, function(i,variables){
                $('#'+variables).val('');
        });
    });


    /*
    *   calculate price for quantity
    */

    $( "table#sales" ).on( "keyup",".quantity", function() {
        
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


    $( "table#sales" ).on( "blur",".quantity", function() {
        
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
    *   apply discount
    */ 
    function discount() {
        $(".discount_amounts").each(function() {
            var pd_id = $(this).attr('pd-id');
            MasterCalculation(pd_id);
        });
    }


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
    $(document).on('submit','form#general',function(){
       var estimate_product_count = $('#sales tbody').children().length;  
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

    
    