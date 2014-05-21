    $(function() {

        var MaxInputs = 100; //maximum rows allowed

        var x = existing_p_count; //initlal text box count
        var FieldCount = 1; //to keep track of text box added
        
        $("body").on("click","#addProd", function(){

            if(x <= MaxInputs) 
            {
                FieldCount++; 
    
                var temp_p_id = "";
                var p_id = $('#productId').val();
                if(p_id.length > 0)
                {
                    var sku = $('#sku').val();
                    var p_name = $('#name').val();
                    var desc = $('#description').val();
                    var quan = $('#quantity').val();
                    var design = $('#design').val();
                    var shade = $('#shade').val();
                    var dime = $('#dimension').val();

                newRow = '<tr>' +
                            '<td ><input type="hidden" name="temp_p_id[]" value="'+ temp_p_id +'" /><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                            '<td >'+ sku +' <input type="hidden" name="plu[]" value="'+ sku +'" /></td>' +
                            '<td >'+ p_name +' <input type="hidden" name="product_names[]" value="'+ p_name +'" /> </td>' +
                            '<td ><textarea row="1" name="descriptions[]" >'+ desc +'</textarea> </td>' +
                            '<td ><input type="text" name="designShade[]" value="'+ design +'/'+ shade +'" /> </td>' +
                            '<td ><input type="text" name="dimensions[]" value="'+ dime +'" /> </td>' +
                            '<td ><input type="text"  class="col-sm-5" name="quantities[]" value="'+ quan +'" /> </td>' +
                        '</tr>';
                
                $('.table > tbody').append(newRow);

                x++; 
                }
                
                $('#productId').val(null);
                $('#sku').val(null);     
            }
        });

        $( ".typeahead" ).focus(function(e) {
               var param = ['productId','plu','description','quantity','design','dimension'];
                $.each(param, function(i,variables){
                    $('#'+variables).val('');
            });
        });
    
            
        $("table").on("click",".remover", function(e){  
            if( x > 1 ) {
                    $(this).closest('tr').addClass('hidden'); 
                    x--; 
            }
            return false;
        });     

    });


   /*Fetch product list and product details*/    
    
   var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + "product/ajaxProductsLookup/%QUERY"
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
        
          $.getJSON(base_url + "product/ajaxProductDetails/"+ datum.id ,function(result){
           $.each(result, function(field, value){
             $('#'+field).val(value);
            });
          });
        
    });
	

    /*Fetch supplier list and supplier details*/    
    
    var suppliers = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + "supplier/ajaxSuppliersLookup/%QUERY"
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
          $.getJSON(base_url + "supplier/ajaxSupplierDetails/"+datum.id,function(result){
           $.each(result, function(field,value){
             $('#'+field).val(value);
            });
          });
        
    });
