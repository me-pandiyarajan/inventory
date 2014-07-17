<!DOCTYPE html>
<html>
<head>
<style>
	
	body {
		border:#CCCCCC 1px solid; 
		margin:2%; 
		padding:2%;
	}
	
	p {
		font-size:12px;
		line-height:5px
	}

	h1 {
		font-size:25px;
	}
	
	h4 {
		font-size:16px;
		margin-bottom:0px;
	}
	
	table {
		border-collapse:collapse;
		font-size:x-small;
	}
	
	
	.table_style {
		border:#CCCCCC .2px solid; 
		width:100%;
	}
	
	.table_style  th {
		border:.15px solid #B2B2B2;
		background:#4AC0E8;
	}
	
	.table_style  td {
		border:1px solid #E0E0E0;
	}
	
	hr.style-six 
	{ 
		border: 0; 
		height: 0; 
		border-top: 1px solid rgba(0, 0, 0, 0.1); 
		border-bottom: 1px solid rgba(255, 255, 255, 0.3); 
	}
	
	#corres {
		width:500px;
		text-align:center; 
		margin:10px auto;
		font-size: 12px;
	}
	
	div {
		margin-bottom: 20px;
	}
	
	#fromTo {
		font-size: 12px;
	}

	
</style>
</head>
<body>
        <div >      
          <table width="100%" cellspacing="2">
          <tr>
            <td></td>
            <td style="font-weight:bold;text-align:right; line-height:5px">
                <h1>POESTIMATE</h1>
                <i> #EST</i>
            </td>
          </tr>
        </table>   
        </div>
        
        <div id="fromTo" >
         <table width="100%" cellspacing="2">
          <tr>
            <td> 
            	<strong>From:</strong> <br>
                Saagar's Furnishing <br>
                65/1 C P Ramasamy Road Alwarpet <br>
                Chennai 600018, TN  <br>
                 44-32979316 <br>
                Fax Number <br>
             </td>
            <td >
            	<strong>To:</strong> <br>
              <?php foreach ($customer_email as $data) {
                  echo $data."<br>";  
              } ?>
            </td>
          </tr>
        </table>     
        </div>   

    <div >
      <table class="table_style" style="width:50%">
      	<tr>
          <th style="text-align:left">Requisitioner</th>
          <td></td> 
        </tr>
      </table>
    </div>
    
    
    <h4>Products</h4>
   <hr class="style-six" >
  
  <div>
      <table class="table_style">
        <thead >
        <tr>
          <th>PLU</th>
          <th>Product name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Unit</th>
          <th>Tax</th>
		  <th>Amount</th>
         </tr>
        </thead>
        <tbody>
		
          <?php for($i=0; $i < count($product['p_id']) ; $i++) : ?>
          <tr>
            <td><?php echo $product['p_plu'][$i]; ?></td>
            <td><?php echo $product['productname'][$i]; ?></td>
            <td><?php echo $product['price'][$i]; ?></td>
            <td><?php echo $product['quantities'][$i]; ?></td>
            <td>unit</td>
            <td><?php echo $product['tax'][$i]; ?></td>
            <td><?php echo $product['amount'][$i]; ?></td>
          </tr>
          <?php endfor; ?>       
        </tbody>
      </table>
    </div>
    
    <div id="corres">
               Send all correspondence to: <br>
        Bharat Kapoor - 9876543210 - bharat@gmail.com <br>
             T.nagar, Chennai, Tamil Nadu 600015 
    </div>
    	
</body>
</html>

