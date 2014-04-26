<div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">VIEW PRODUCT</h1>
	 
<form class="form-horizontal" action="" method="POST">
	 
	<dl class="dl-horizontal">
  <dt><label class="control-label col-xs-3" for="productName">Product Name:</label></dt>
  <dd> <?php echo $data[0]->getProductName(); ?></dd>
  <dt><label class="control-label col-xs-3" for="productName">Status:</label></dt>
  <dd> <?php echo $data[0]->getStatus(); ?></dd>
   <dt><label class="control-label col-xs-3" for="productName">County of Manufacture:</label></dt>
  <dd> <?php echo $data[0]->getCountryOfManufacture(); ?></dd>
  <dt><label class="control-label col-xs-3" for="productName">Product Descriotion:</label></dt>
  <dd> <?php echo $data[0]->getDescription(); ?></dd>
  <dt><label class="control-label col-xs-3" for="productName">Product ShortDescriotion:</label></dt>
  <dd> <?php echo $data[0]->getShortDescription(); ?></dd>
  
 
</dl>
 
	
</form>
</div>