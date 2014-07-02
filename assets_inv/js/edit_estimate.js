    $(function() {

        var MaxInputs = 100; //maximum rows allowed

        var x = existing_p_count; //initlal row count
        var FieldCount = 0; //to keep track of rows added
        var listed_products =  new Array();
        
        $("body").on("click","#addProd", function(){

            if(x <= MaxInputs) 
            {
                FieldCount++; 

                var p_name = $('#name').val();

                if( jQuery.inArray( p_name , listed_products ) > -1 && FieldCount > 1 ){
                    $( "#pop2" ).trigger( "click" ); 
                    return false; 
                }
    
                if(p_name.length > 0)
                {
                    var temp_p_id = "";
                    var sku = $('#sku').val();
                    var p_id = $('#productId').val();
                    var desc = $('#description').val();
                    var quan = $('#quantity').val();
                    var design = $('#design').val();
                    var shade = $('#shade').val();
                    var dime = $('#dimension').val();
                    listed_products[FieldCount-1] = p_name; 

                newRow = '<tr>' +
                            '<td style="cursor: pointer;"><input type="hidden" name="temp_p_id[]" value="'+ temp_p_id +'" /><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                            '<td >'+ sku +' <input type="hidden" name="sku[]" value="'+ sku +'" /></td>' +
                            '<td >'+ p_name +' <input type="hidden" id="product_names" name="product_names[]" value="'+ p_name +'" /> </td>' +
                            '<td ><textarea row="1" name="descriptions[]" >'+ desc +'</textarea> </td>' +
                            '<td ><input type="text" name="designShade[]" value="'+ design +'/'+ shade +'" /> </td>' +
                            '<td ><input type="text" name="dimensions[]" value="'+ dime +'" /> </td>' +
                            '<td ><input type="text" name="quantities[]" value="'+ quan +'" /> </td>' +
                        '</tr>';
                
                $('.table > tbody').append(newRow);

                x++; 
                }
            }
        });



        $( ".typeahead" ).focus(function(e) {
               var param = ['productId','sku','description','quantity','design','shade','dimension'];
                $.each(param, function(i,variables){
                    $('#'+variables).val(null);
            });
        });
    
            
        $("table").on("click",".remover", function(e){  
            if( x > 1 ) {
                var removeItem = $(this).closest('tr#product_names').val();
                $(this).closest('tr').remove();
                x--;
                listed_products.splice( $.inArray(removeItem,listed_products) ,1 );
            }
            return false;
        });     

    });


   /*Fetch product list and product details*/    
    
   var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + "inventory/product/ajaxProductsLookup/%QUERY"
    });
         
    products.initialize();

        $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'name',
            displayKey: 'value',
            source : products.ttAdapter()
        });


    $('.typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
        //alert(datum.alt_key);
        //$(this).attr("pro-id",datum.id);
        
          $.getJSON(base_url + "inventory/product/ajaxProductDetails/"+ datum.id ,function(result){
           $.each(result, function(field, value){
             $('#'+field).val(value);
            });
          });
        
    });
	

    /*Fetch supplier list and supplier details*/    
    
    var suppliers = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + "inventory/supplier/ajaxSuppliersLookup/%QUERY"
    });
         
    suppliers.initialize();

    $('.supplier_typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'name',
            displayKey: 'value',
            source : suppliers.ttAdapter()
        });

    $('.supplier_typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
          $.getJSON(base_url + "inventory/supplier/ajaxSupplierDetails/"+datum.id,function(result){
           $.each(result, function(field,value){
             $('#'+field).val(value);
            });
          });
        
    });
