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
            <td><?php echo date('d M Y');?></td>
            <td style="font-weight:bold;text-align:right; line-height:5px">
                <h1>delivery Report</h1>
                <i> #ORD<?php echo sprintf("%06s", $orderid); ?></i>
            </td>
          </tr>
        </table>   
        </div>
        
        <div id="fromTo" >
         <table width="100%" cellspacing="2">

        </table>     
        </div>   

    <div >
      <table class="table_style" style="width:50%">
      	<tr>
          <th style="text-align:left">Requisitioner</th>
          <td><?php echo $user_name;?></td> 
        </tr>
      </table>
    </div>
    
    
    <h4>Products</h4>
   <hr class="style-six" >
  
  <div>
      <table class="table_style">
        <thead >
        <tr>
          <th>SKU</th>
          <th>Product name</th>
          <th>Description</th>
          <th>Design/Shade</th>
          <th>Dimension</th>
          <th>Quantity</th>
         </tr>
        </thead>
        <tbody>
         
          <?php foreach ($orderconfirm as $order):?>
           
          
          <tr>
            <td><?php echo $order->getProductSku(); ?></td>
            <td><?php echo $order->getProductName(); ?></td>
            <td><?php echo $order->getDescription(); ?></td>
            <td><?php echo $order->getDesignName(); ?></td>
            <td><?php echo $order->getDimensions(); ?></td>
            <td><?php echo $order->getDeliveryQuality(); ?></td>
          </tr>
          <?php endforeach; ?>       
        </tbody>
      </table>
    </div>
    
   
    	
</body>
</html>

