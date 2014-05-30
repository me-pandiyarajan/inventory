    $(function() {


        var MaxInputs = 100;

        var x = 1; 
        var FieldCount = 0; 
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
                    var sku = $('#sku').val();
                    var p_id = $('#productId').val();
                   
                    var desc = $('#description').val();
                    var quan = $('#quantity').val();
                    var design = $('#design').val();
                    var shade = $('#shade').val();
                    var dime = $('#dimension').val();
                    listed_products[FieldCount-1] = p_name; 

                newRow = '<tr>' +
                            '<td ><input type="hidden" name="product_ids[]" value="'+ p_id +'" /><span class="glyphicon glyphicon-trash remover"></span></td>' +
                            '<td >'+ sku +' <input type="hidden" name="sku[]" value="'+ sku +'" /></td>' +
                            '<td >'+ p_name +' <input type="hidden" name="product_names[]" value="'+ p_name +'" /></td>' +
                            '<td >'+ desc +' <input type="hidden" name="descriptions[]" value="'+ desc +'" /> </td>' +
                            '<td >'+ design +'/'+ shade +'<input type="hidden" name="designShade[]" value="'+ design +'/'+ shade +'" /> </td>' +
                            '<td >'+ dime +' <input type="hidden" name="dimensions[]" value="'+ dime +'" /> </td>' +
                            '<td >'+ quan +' <input type="hidden" name="quantities[]" value="'+ quan +'" /> </td>' +
                        '</tr>';
                
                $('.table > tbody').append(newRow);

                x++;
                } 
                
            }
        });

        $( ".typeahead" ).focus(function(e) {
               var param = ['productId','sku','description','quantity','design','shade','dimension'];
                $.each(param, function(i,variables){
                    $('#'+variables).val('');
            });
        });
    
            

        $("table").on("click",".remover", function(e){  
            
            if( x > 1 ) {
                    $(this).closest('tr').remove(); //remove text box
                    x--; //decrement textbox
            }
            return false;
        });

        $(document).on('submit','form#new-estimate',function(){
           var estimate_product_count = $('#mytable tbody').children().length;  
           if(estimate_product_count == 0) {
              $( "#pop" ).trigger( "click");  
                    return false;
                }
        });

    });

     /*Fetch product list and product details*/    

    var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + 'inventory/product/ajaxProductsLookup/%QUERY'
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
        remote: base_url + 'inventory/supplier/ajaxSuppliersLookup/%QUERY'
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
     /*Fetch category list and category details*/    
    
   var categories = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '../inventory/product/ajaxCategoriesLookup/%QUERY'
    });
         
    categories.initialize();

    $('.category_typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'name',
            displayKey: 'value',
            source : categories.ttAdapter()
        });

    $('.category_typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
          $.getJSON("../inventory/product/ajaxCategoryDetails/"+datum.id,function(result){
           $.each(result, function(field,value){
             $('#'+field).val(value);
            });
          });
        
    });


/*Fetch Design list and design details*/    
    
   var Designs = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '../inventory/product/ajaxDesignLookup/%QUERY'
    });
         
    Designs.initialize();

    $('.design_typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'name',
            displayKey: 'value',
            source : Designs.ttAdapter()
        });

    $('.design_typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
          $.getJSON("../inventory/product/ajaxDesignDetails/"+datum.id,function(result){
           $.each(result, function(field,value){
             $('#'+field).val(value);
            });
          });
        
    });

    /*Fetch Shade list and Shade details*/    
    
   var Shades = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: '../inventory/product/ajaxShadeLookup/%QUERY'
    });
         
    Shades.initialize();

    $('.shade_typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'name',
            displayKey: 'value',
            source : Shades.ttAdapter()
        });

    $('.shade_typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
          $.getJSON("../inventory/product/ajaxShadeDetails/"+datum.id,function(result){
           $.each(result, function(field,value){
             $('#'+field).val(value);
            });
          });
        
    });

