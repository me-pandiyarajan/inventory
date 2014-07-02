 

    var customers = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: base_url + 'pos/customer/ajaxCustomersLookup/%QUERY'
    });
         
    customers.initialize();

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 3
        },
        {
            name: 'states',
            displayKey: 'value',
            source : customers.ttAdapter()
        });

    $('.typeahead').bind('typeahead:selected', function(obj, datum, name) {                 
          $.getJSON(base_url + "pos/customer/ajaxCustomerDetails/"+ datum.id ,function(result){
           $.each(result, function(field, value){
				$('#'+field).val(value);
            });
          });
        
    });


    