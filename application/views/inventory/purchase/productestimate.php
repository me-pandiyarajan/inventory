<div class="col-sm-9 col-md-10 main">
    
    <h1 class="page-header">NEW ESTIMATE</h1>
    <?php echo validation_errors(); ?>  
    <?php 
       $attributes = array('class' => 'form-horizontal');
       echo form_open_multipart($form_action,$attributes);
    ?>
       
      <div class="form-group">
            <label class="control-label col-xs-2" for="estimate_name">Estimate Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('estimate_name'); ?>" id="estimate_name" placeholder="Estimate Name" name="estimate_name" >
            </div>
       </div>
     
      <legend>Product Info</legend>
            <div class="form-group">
                <label class="control-label col-xs-2" for="name">Name</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control typeahead" value="<?php echo set_value('name'); ?>" id="name" placeholder="Name" name= "product">
                    <input type="hidden" name="sku" id="sku" value="" />
                    <input type="hidden" name="productId" id="productId" value="" />
                    <input type="hidden" name="supplierId" id="supplierId" value="" />
                    <input type="hidden" name="supplier_pname" id="supplier_pname" value="" />
                </div>
                
                <label class="control-label col-xs-2" for="design">Design</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('design'); ?>" id="supplierdesign" placeholder="design Name" name= "design">
                </div>          
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2" for="quantity">Quantity</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('Quantity'); ?>" id="quantity" placeholder="Quantity" name= "quantity">
                </div>
                
                <label class="control-label col-xs-2" for="shade">Shade</label>
                <div class="col-xs-3">
                    <input type="text"  class="form-control" value="<?php echo set_value('shade'); ?>" id="suppliershade" placeholder="shade"  name= "shade">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2"  for="description">Description</label>
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
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Design/Shade</th>
                    <th>Dimension</th>
                    <th>Quantity</th>
                </thead>    
                <tbody>
                <?php //var_dump($products); exit; ?>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td ><input type="hidden" name="product_ids[]" value="<?php echo $product['p_id']; ?>" /><input type="hidden" name="suppliers[]" value="<?php echo $product['supplierId']; ?>" /><span class="glyphicon glyphicon-trash remover"></span></td>
                        <td ><?php echo $product['p_name']; ?> <input type="hidden" name="product_names[]" value="<?php echo $product['p_name']; ?>" /> </td>
                        <td ><?php echo $product['desc']; ?> <input type="hidden" name="descriptions[]" value="<?php echo $product['desc']; ?>" /> </td>
                        <td ><?php echo $product['dimensions']; ?> <input type="hidden" name="dimensions[]" value="<?php echo $product['dimensions']; ?>" /> </td>
                        <td ><?php echo $product['quan']; ?> <input type="hidden" name="quantities[]" value="<?php echo $product['quan']; ?>" /> </td>
                    </tr>
                <?php endforeach;    ?>
                </tbody>
            </table>
                            
            <button class="btn btn-success btn-xs" type="submit" >Submit</button>
            <a type="button" href="<?php echo base_url();?>inventory/Product/productlist" class="btn btn-default btn-xs">Cancel</a>

    </form>
</div>

<link href="<?php echo base_url(); ?>assets_inv/css/typeahead.css" rel="stylesheet">

<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/js/create_new_estimate.js"></script>

