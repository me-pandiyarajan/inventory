
 var x = 1; 

/*Fetch Invoice list and Invoice details*/    
   

var invoice = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: base_url + 'pos/return_damage/ajaxInvoiceLookup/%QUERY'
});
     
invoice.initialize();

    $('.typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    },
    {
        name: 'states',
        displayKey: 'value',
        source : invoice.ttAdapter()
    });

$('.typeahead').bind('typeahead:selected', function(obj, datum, name) {

      $.getJSON(base_url + "pos/return_damage/ajaxInvoiceDetails/"+ datum.id ,function(product){
        
         $.each(product.invoicelist, function(index,key){
            
             newRow = '<tr>' +
                         '<td style="display:none;"><input type="hidden" name="invoiceid[]" value="'+ key.InvoiceId +'" /></td>' +
                         '<td ><input type="hidden" name="product_ids[]" value="'+ key.productId +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                         '<td >'+ key.Plu +' <input type="hidden" name="plu[]" value="'+ key.Plu +'" /></td>' +
                         '<td >'+ key.ProductName +' <input type="hidden"  id="product_names" name="product_names[]" value="'+ key.ProductName +'" /></td>' +
                         '<td ><i class="fa fa-inr"> '+ key.UnitPrice +'<input type="hidden" actual-unit-price="'+ key.UnitPrice +'" name="price[]" class="form-control price" value="'+ key.UnitPrice +'" /> </td>' +
                         '<td ><input type="text" autocomplete="off" max="'+ key.Quantity +'" class="form-control quantity" price-id="'+ key.productId +'" actual-unit-price="'+ key.UnitPrice +'" name="quantities[]" value="'+ key.Quantity +'" /></td>' +
                         '<td >'+ key.Unit +'</td>' +
                         '<td >'+ key.Discount +'  % <input type="hidden" id="discount" name="discount[]" value="'+ key.Discount +'" /></td>' +
                         '<td >'+ key.Tax +' % <input type="hidden"  id="tax" name="tax[]" value="'+ key.Tax +'" /></td>' +
                        '<td class="showAmount"> <i class="fa fa-inr"> <span>'+key.Amount +'</span><input type="hidden" id="'+ key.productId +'" name="amount[]" class="amount" value="'+ key.Amount +'" /> </td>' +
                        
                      '</tr>';  
            
            
                $('.table > tbody#damageItemsList').append(newRow);
                x = $('#return_sale tbody').children().length;
            });
      


  if (product.customer != null) {

      $.each(product.customer, function(field,value){
           
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


         }

      subTotal();
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
    *   calculate subtotal price for items
    */

    function subTotal () {
        var subTotal = 0;

        if($('#return_sale tbody').children().length > 0) {

            $(".amount").each(function() {
                subTotal = parseFloat($(this).val()) + subTotal;
                $('#subTotal').html( subTotal +'<input type="hidden" name="subTotal" value="'+ subTotal +'" />');
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
        $('#grandTotal').html( grandTotal +'<input type="hidden" name="grandTotal" value="'+ grandTotal +'" />');

    }


    $( ".typeahead" ).focus(function(e) {
          var param = ['productId','plu','description','quantity','design','shade','dimension'];
          $.each(param, function(i,variables){
              $('#'+variables).val('');
          });

         $('#damageItemsList').html("");

    });


    /*
    *   calculate price for quantity
    */

    $( "table#return_sale" ).on( "keyup",".quantity", function() {
        
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
    *   check number of item for return_sale before billing.
    */
    $(document).on('submit','form#returns',function(){
       var estimate_product_count = $('#return_sale tbody').children().length;  
       if(estimate_product_count == 0) {
          $( "#pop" ).trigger( "click");  
                return false;
            }
    });

    /*
    *   mask 
    */
    $(function() {
        $('table').on('keyup','.quantity',function () {
          var max = parseFloat( $(this).attr('max') );
          var quan = parseFloat( $(this).val() );
            if( quan > max || quan == 0 )
            {
              $(this).val(max);
            }

        });
    });

    



    