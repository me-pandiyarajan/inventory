	<div class="col-sm-9 col-md-10 main">

	 <!-- dynamic view content -->       

	        <h1 class="page-header">Supplier</h1>

	        	<?php //echo validation_errors(); ?>
	        	<?php if(!empty($success)) echo $success; ?>
	        	<!--<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>"> -->
	        		
		        			<?php 
		        			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		        			echo form_open($form_action,$attributes); 
		        			?>
						  	
						  	<input class="typeahead prod_v" type="text" name="a" id="a" > 
							<input class="typeahead prod_v" type="text" name="b" id="b">
							<input class="typeahead prod_v" type="text" name="c" id="c">
							<input class="typeahead prod_v" type="text" name="d" id="d">
							<input class="typeahead prod_v" type="text" name="e" id="e">

							<input type="button" class="btn btn-primary" id="addProd" value="Add Row" />

							<table class="table" border='1' id='mytable'>
								<thead>
									<th>Sno</th>
									<th>PLU No</th>
									<th>Product name</th>
									<th>Description</th>
									<th>Dimensions</th>
									<th>Quantity</th>
								</thead>	
							<tbody>
								
							</tbody>
							</table>
							
							<button class="btn btn-primary" type="submit" >Submit</button>

						<?php echo form_close();?>
					<!-- </form> -->
	</div>

<!-- dynamic view content end-->

</div>
<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
		
		$(function() {

			var MaxInputs = 7; //maximum rows allowed

			var x = 1; //initlal text box count
			var FieldCount = 1; //to keep track of text box added

			
			$("body").on("click","#addProd", function(){ 	
				if(x <= MaxInputs) 
		        {
		            FieldCount++; //text box added increment
		            //add input box
					var a = $('#a').val();
					var b = $('#b').val();
					var c = $('#c').val();
					var d = $('#d').val();
					var quan = $('#e').val();

					var da = [a, b, c, d, quan];

				    newRow = '<tr>' +
	    						'<td >'+ x +'<input type="hidden" name="da[]" value="'+ da +'" /> <span class="glyphicon glyphicon-trash remover" id="sss"></span></td>' +
	    						'<td >'+ a +' <input type="hidden" name="products[]" value="'+ b +'" /></td>' +
						        '<td >'+ b +'</td>' +
						        '<td >'+ c +'</td>' + 
						        '<td >'+ d +'</td>' +
						        '<td >'+ quan +' <input type="hidden" name="quantity[]" value="'+ quan +'" /> </td>' +
					    	'</tr>';
					
					$('.table > tbody').append(newRow);
		            x++;
		        }
			});


			$("tbody").on("click",".remover", function(e){  
		        
		        if( x > 1 ) {
		                $(this).closest('tr').remove(); //remove text box
		                x--; //decrement textbox
		        }
				return false;
			});		

		});


		/*function myfun(row) {
				row.closest('tr').remove();
			}*/	
		</script>

<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>


