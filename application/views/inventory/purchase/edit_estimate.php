<div class="col-sm-9 col-md-10 main">
    
    <h1 class="page-header">EDIT ESTIMATE</h1>
    <?php echo validation_errors(); ?> 
    <?php if(!empty($success)) echo $success; ?> 
    <?php 
       $attributes = array('class' => 'form-horizontal', 'id'=>'edit-estimate');
       echo form_open_multipart($form_action,$attributes);
    ?>
	<?php //var_dump($estimationlist);?>
	 
      <div class="form-group">
            <label class="control-label col-xs-2" for="estimate_name">Estimate Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo $estimationlist->getEstimateName(); ?>" id="estimate_name" placeholder="Estimate Name" name="estimate_name" >
                 <input type="hidden" class="form-control" value="<?php echo $estimationlist->getEstimateId(); ?>" id="estimate_id"  name="estimate_id" >
            </div>
       </div>
    <legend>Supplier Info</legend>
	    
      <div class="form-group">
             <label class="control-label col-xs-2" for="supplier_name">Supplier Name</label>
            <div class="col-xs-3">
			      <input type="hidden"  id="estimate_id" name="estimate_id"  value="<?php echo $estimationlist->getEstimateId(); ?>" >
                <input type="text" class="form-control supplier_typeahead" value="<?php echo$estimationlist->getSupplier()->getSupplierName();?>" id="supplier_name" placeholder="Supplier Name" name="supplier_name" >
				<input type="hidden" name="supplier_id" id="supplier_id" value="<?php echo $estimationlist->getSupplier()->getSupplierId(); ?>"/>
            </div>
            <label class="control-label col-xs-2" for="phone">Phone Number</label>
            <div class="col-xs-3">
                <input type="text" class="form-control"  value="<?php echo $estimationlist->getSupplier()->getMobile(); ?>" id="phone" placeholder="Phone Number" name="phone">
            </div>
       </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="email">Email Id</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo $estimationlist->getSupplier()->getEmail(); ?>" id="email" placeholder="Email Id" name="email">
            </div>
       
            <label class="control-label col-xs-2" for="address">Address</label>
            <div class="col-xs-3">
                <textarea row="3" class="form-control"  id="address" placeholder="Address" name="address"><?php echo $estimationlist->getSupplier()->getStreet().','. $estimationlist->getSupplier()->getCity().','. $estimationlist->getSupplier()->getState().'-'. $estimationlist->getSupplier()->getZipCode();?></textarea>
            </div>
       </div>
     
      <legend>Product Info</legend>
            <div class="form-group">
                <label class="control-label col-xs-2" for="name">Name</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control typeahead" value="<?php echo set_value('name'); ?>" id="name" placeholder="Name" name= "product">
                    <input type="hidden" name="sku" id="sku" value="" />
                    <input type="hidden" name="productId" id="productId" value="" />
                </div>
                
                <label class="control-label col-xs-2" for="design">Design</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('design'); ?>" id="design" placeholder="design Name" name= "design">
                </div>
                
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2" for="quantity">Quantity</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('Quantity'); ?>" id="quantity" placeholder="Quantity" name= "quantity">
                </div>
                
                <label class="control-label col-xs-2" for="shade">Shade</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('shade'); ?>" id="shade" placeholder="shade"  name= "shade">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2" for="description">Description</label>
                <div class="col-xs-3">
                    <textarea class="form-control" row="3" value="<?php echo set_value('description'); ?>" id="description" placeholder="description" name= "description"></textarea>
                </div>

                <label class="control-label col-xs-2" for="dimension">Dimension</label>
                <div class="col-xs-3">
                    <textarea class="form-control" row="3" value="<?php echo set_value('dimension'); ?>" id="dimension" placeholder="dimension"  name= "dimension"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-9">
                    <input type="button" class="btn btn-success btn-xs" id="addProd" value="Add">
                </div>
            </div>

            <legend>Estimate </legend>
            <table class="table table-bordered" id='mytable'>
                <thead>
                    <th>Remove</th>
					<th>SKU</th>
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Design/Shade</th>
                    <th>Dimensions</th>
                    <th>Quantity</th>
                </thead>    
                <tbody>
					<?php foreach($estimated_product as $product):?>
					<tr>
    					<td ><input type="hidden" name="temp_p_id[]" value="<?php echo $product->getTempProductId(); ?>" /><input type="hidden" name="product_ids[]" value="<?php echo $product->getProductSku(); ?>" /><span class="glyphicon glyphicon-trash remover"></span></td>
    					<td><input type="hidden" name="product_sku[]" value="<?php echo $product->getProductSku(); ?>" /><?php echo $product->getProductSku(); ?>
 </td>
    					<td ><input type="hidden" name="product_names[]" value="<?php echo $product->getProductName(); ?>" /><?php echo $product->getProductName(); ?></td>
    					<td ><textarea row="1" name="descriptions[]" /><?php echo $product->getDescription();?></textarea> </td>
                        <td ><input type="text" name="designShade[]" value="<?php echo $product->getDesignName(); ?>" /></td>
    					<td ><input type="text" name="dimensions[]"  value="<?php echo $product->getDimensions(); ?>" /></td>
    					<td ><input type="text" name="quantities[]"  value="<?php echo $product->getQuantity(); ?>" /></td>
					</tr>
				<?php endforeach; ?>
                </tbody>
            </table>
               <button class="btn btn-success btn-xs" type="submit" >Update Estimate</button>
               <a type="button" href="<?php echo base_url();?>inventory/purchase/estimatelist" class="btn btn-default btn-xs">Cancel</a>              
          

    </form>
</div>


<!-- Button trigger modal -->
<button  class="hidden" data-toggle="modal" id="pop2" data-target="#myModal2"></button>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title text-danger" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span> <strong>ALERT<strong></h5>
      </div>
        <div class="modal-body" >
           <p>A product cannot be added twice in an estimate.</p>
        </div>
    </div>
  </div>
</div>

<link href="<?php echo base_url(); ?>assets_inv/css/typeahead.css" rel="stylesheet">
<script type="text/javascript"> 
    var base_url = "<?php print base_url(); ?>";
    var existing_p_count = "<?php print count($estimated_product); ?>";
</script>
<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/js/edit_estimate.js"></script>
