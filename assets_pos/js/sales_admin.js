
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

           $('#dis_per').text($('#cg_discount_percent').val());

           $('#customer_name_show').text($('#customer_name').val());
           $('#street_show').text($('#street').val());
           $('#city_show').text($('#city').val());
           $('#state_show').text($('#state').val());
           $('#zipcode_show').text($('#zipcode').val());
           $('#customer_phone_show').html('<abbr title="Phone">P:</abbr> ' + $('#customer_phone').val());
           $('#customer_email_show').html('<abbr title="Email">E:</abbr> ' + $('#customer_email').val());

      subTotal();
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
                $( "#pop2" ).trigger( "click" ); 
                return false; 
            }

            if(product.p_name.length > 0)
            {
                var plu = product.plu;
                var p_id = product.productId;
                var quan = 1;
                var price = product.price + (product.price * (parseFloat(product.tax.percent)/100));

                listed_products[FieldCount-1] = product.p_name; 

            newRow = '<tr>' +
                        '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ plu +' <input type="hidden" name="plu[]" value="'+ plu +'" /></td>' +
                        '<td >'+ product.p_name +' <input type="hidden"  id="product_names" name="product_names[]" value="'+ product.p_name +'" /></td>' +
                        '<td ><input type="text" class="form-control quantity" price-id="'+ p_id +'" actual-unit-price="'+ price +'" name="quantities[]" value="'+ quan +'" /> </td>' +
                        '<td >'+ product.unit +' <input type="hidden"  id="unit" name="unit[]" value="'+ product.unit +'" /></td>' +
                        '<td >'+ price +'<input type="hidden" actual-unit-price="'+ price +'" name="price[]" class="price" value="'+ price +'" /> </td>' +
                        '<td class="showAmount"> <span>'+ price +'</span><input type="hidden" id="'+ p_id +'" name="amount[]" class="amount" value="'+ price +'" /> </td>' +
                     '</tr>';
            
            $('.table > tbody#itemsList').append(newRow);

            x++;
            } 
            
        }

    subTotal();    
    }

    
    /*
    *   calculate subtotal price for items
    */

    function subTotal () {
        var subTotal = 0;

        if($('#sales tbody').children().length > 0) {

            $(".amount").each(function() {
                subTotal = parseFloat($(this).val()) + subTotal;
                $('#subTotal').html( subTotal +' <input type="hidden" name="subTotal" value="'+ subTotal +'" />');
            });
        }
        else
        {
            $('#subTotal').html('0 <input type="hidden" name="subTotal" value="0" />')
        }

    grandTotal(subTotal);
    }

    /*
    *   calculate subtotal price for items
    */
    function grandTotal(subTotal){
        
        var grandTotal;

        grandTotal = subTotal - ( subTotal * ( parseFloat($('#cg_discount_percent').val()) / 100 ) );
        $('#grandTotal').html( grandTotal +' <input type="hidden" name="grandTotal" value="'+ grandTotal +'" />');

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
        
        if($(this).val() != ""){
            var quanPrice = parseFloat($(this).val()) * parseFloat($(this).attr('actual-unit-price'));
            $('#'+ $(this).attr('price-id')).val(quanPrice);
            $('#'+ $(this).attr('price-id')).siblings("span").text(quanPrice);
        }
        else{
            var quanPrice = 0;
            $('#'+ $(this).attr('price-id')).val(quanPrice);
            $('#'+ $(this).attr('price-id')).siblings("span").text(quanPrice);
        }
    
    subTotal();   
    });
     

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
        subTotal();
        return false;
    });


    /*
    *   check number of item for sales before billing.
    */
    $(document).on('submit','form#general',function(){
       var estimate_product_count = $('#sales tbody').children().length;  
       if(estimate_product_count == 0) {
          $( "#pop" ).trigger( "click");  
                return false;
            }
    });

    /*
    *   mask (plugin)
    */
    //$(function(){
        //$('.quantity').mask('0#');
    //})

    