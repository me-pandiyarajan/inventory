<!DOCTYPE html>

<html>
<head>
</head>
<body>

<h1>Estimate </h1>

        <div>
            <label><b>SupplierName: </b><?php echo $supplierdata['supplier_name']; ?></label>
			 
        </div>
		<div>
            <label><b>Supplier Email ID: </b><?php echo $supplierdata['email']; ?></label>
			  
        </div> 
		
		<div>
            <label><b>Address:</b>werwerwrw</label>
			 
        </div>
		<div>
           <label><b>SupplierTelephone:</b>34242424</label>
			 
        </div>
	
 <br>

<table border="1">
                 <thead> 
					<tr>
	   
						<th>Product Name</th>
							   
						<th>Description</th>
							   
						<th>Dimensions</th>
							   
						<th>Quantity</th>
											</tr>
				 </thead>
           		 
				<tbody >
			   <?php 
				foreach($productdata as $productdatum):?>
				<tr >
			   	<td> <?php var_dump($productdatum['productname']);?></td>
            	<td ><?php var_dump($productdatum['description']);?></td>
				<td ><?php var_dump($productdatum['quantity']);?></td>
				<td ><?php var_dump( $productdatum['dimension']);?></td>
				</tr>
				 <?php endforeach; ?>
				
				</tbody>
									
				</table>
			
</div>

<!-- dynamic view content end-->
</div>
</div>
</div>	
</body>
</html>