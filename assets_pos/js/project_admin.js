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
           $.each(product.soldlist, function(index,key){
              
            //$('#'+variables).val('');
            newRow ='<tr>' +
                        '<td> <span class="label label-success">Sold</span> </td>' +
                        '<td >'+ key.Plu +' </td>' +
                        '<td >'+ key.ProductName +'</td>' +
                        '<td >'+ key.Price +' </td>' +
                        '<td >'+ key.Quantity +' </td>' +
                        '<td >'+ key.Unit +'</td>' +
                        '<td >'+ key.Discount +' % </td>' +
                        '<td >'+ key.Tax +' % </td>' +
                        '<td class="showAmount"> <span>'+ key.Amount +'</span> </td>' +
                        
                     '</tr>';
            
                $('.table > tbody#projectItemsList').append(newRow);
            });

       
        //unsold
         $.each(product.unsoldlist, function(index,key){

                  newRow = '<tr>' +
                         '<td ><input type="hidden" name="product_ids[]" value="'+ key.ProductId +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ key.Plu +' <input type="hidden" name="plu[]" value="'+ key.Plu +'" /></td>' +
                         '<td >'+ key.ProductName +' <input type="hidden"  id="product_names" name="product_names[]" value="'+ key.ProductName +'" /></td>' +
                         '<td >'+ key.Price +'<input type="hidden" actual-unit-price="'+ key.Price +'" name="price[]" class="price" value="'+ key.Price +'" /> </td>' +
                         '<td ><input type="text" class="form-control quantity" price-id="'+ key.ProductId +'" actual-unit-price="'+ key.Price +'" name="quantities[]" value="'+ key.Quantity +'" /></td>' +
                         '<td >'+ key.Unit +'</td>' +
                         '<td >'+ key.Discount +' <input type="hidden"  id="discount" name="discount[]" value="'+ key.Discount +'" /></td>' +
                         '<td >'+ key.Tax +' <input type="hidden"  id="tax" name="tax[]" value="'+ key.Tax +'" /></td>' +
                        '<td class="showAmount"> <span>'+key.Amount +'</span><input type="hidden" id="'+ key.ProductId +'" name="amount[]" class="amount" value="'+ key.Amount +'" /> </td>' +
                        
                      '</tr>';
            
                 $('.table > tbody#projectItemsList').append(newRow);
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

    var x = 1; 
    //var FieldCount = $('#project_sales tbody').children().length;
    var FieldCount = 0;
    var listed_products =  new Array();

    //console.log(FieldCount);
    
    
    
    /*
     * add new product for project_sales
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
                var price = product.price;
                listed_products[FieldCount-1] = product.p_name; 

            newRow = '<tr>' +
                        '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                        '<td >'+ plu +' <input type="hidden" name="plu[]" value="'+ plu +'" /></td>' +
                        '<td >'+ product.p_name +' <input type="hidden"  id="product_names" name="product_names[]" value="'+ product.p_name +'" /></td>' +
                        '<td >'+ price +'<input type="hidden" actual-unit-price="'+ price +'" name="price[]" class="price" value="'+ price +'" /> </td>' +
                        
                        '<td ><input type="text" class="form-control quantity" price-id="'+ p_id +'" actual-unit-price="'+ price +'" name="quantities[]" value="'+ quan +'" /> </td>' +
                        '<td >'+ product.unit +'</td>' +
                        '<td >'+ "-" +' <input type="hidden"  id="discount" name="discount[]" value="-" /></td>' +
                        '<td >'+ product.tax +' <input type="hidden"  id="tax" name="tax[]" value="'+ product.tax +'" /></td>' +
                        '<td class="showAmount"> <span>'+ price +'</span><input type="hidden" id="'+ p_id +'" name="amount[]" class="amount" value="'+ price +'" /> </td>' +
                     '</tr>';
            
            $('.table > tbody#projectItemsList').append(newRow);

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

        if($('#project_sales tbody').children().length > 0) {

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

    $( "table#project_sales" ).on( "keyup",".quantity", function() {
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
    *   check number of item for project_sales before billing.
    */
    $(document).on('submit','form#general',function(){
       var estimate_product_count = $('#project_sales tbody').children().length;  
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

