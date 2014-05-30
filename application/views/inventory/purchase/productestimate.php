<div class="col-sm-9 col-md-10 main">
    
    <h1 class="page-header">NEW ESTIMATE</h1>
    <?php echo validation_errors(); ?>  
    <?php 
       $attributes = array('class' => 'form-horizontal');
       echo form_open_multipart($form_action,$attributes);
    ?>
    
     <?php
    
     $supplier_id = $product->getSuppliersSupplier()->getSupplierId();
     $supplier_name = $product->getSuppliersSupplier()->getSupplierName();
     $supplier_phone = $product->getSuppliersSupplier()->getTelephone();
     $supplier_email = $product->getSuppliersSupplier()->getEmail();
     $supplier_address = $product->getSuppliersSupplier()->getStreet().','.$product->getSuppliersSupplier()->getState();

    ?>
       
      <div class="form-group">
            <label class="control-label col-xs-2" for="estimate_name">Estimate Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('estimate_name'); ?>" id="estimate_name" placeholder="Estimate Name" name="estimate_name" >
            </div>
       </div>
    <legend>Supplier Info</legend>
    <div class="form-group">
            <div class="col-xs-4" hidden>
                <input type="text" class="form-control" value="<?php echo set_value('supplier_id');echo $supplier_id;?>" id="supplier_id" placeholder="Supplier Name" name="supplier_id" >
            </div>
      </div>
      <div class="form-group">
             <label class="control-label col-xs-2" for="supplier_name">Supplier Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control supplier_typeahead" value="<?php echo set_value('supplier_name');echo  $supplier_name; ?>" id="supplier_name" placeholder="Supplier Name" name="supplier_name" >
                <input type="hidden" name="supplierId" id="supplierId" value="" />
            </div>
            <label class="control-label col-xs-2" for="phone">Phone Number</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('phone');echo $supplier_phone; ?>" id="phone" placeholder="Phone Number" name="phone">
            </div>
       </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="email">Email Id</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('email');echo $supplier_email; ?>" id="email" placeholder="Email Id" name="email">
            </div>
       
            <label class="control-label col-xs-2" for="address">Address</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('address');echo $supplier_address; ?>" id="address" placeholder="Address" name="address">
            </div>
       </div>
     
      <legend>Product Info</legend>
            <div class="form-group">
                <label class="control-label col-xs-2" for="name">Name</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control typeahead" value="<?php echo set_value('name'); ?>" id="name" placeholder="Name" name= "product[]">
                    <input type="hidden" name="plu" id="plu" value="" />
                    <input type="hidden" name="productId" id="productId" value="" />

                </div>
                
                <label class="control-label col-xs-2" for="design">Design Name</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('design'); ?>" id="design" placeholder="design Name" name= "design[]">
                </div>
                
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2" for="quantity">Quantity</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('Quantity'); ?>" id="quantity" placeholder="Quantity" name= "Quantity[]">
                </div>
                
                 <label class="control-label col-xs-2" for="dimension">Dimension</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" value="<?php echo set_value('dimension'); ?>" id="dimension" placeholder="dimension"  name= "dimension[]">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2" for="description">Description</label>
                <div class="col-xs-3">
                    <textarea  class="form-control" row="3" value="<?php echo set_value('description'); ?>" id="description" placeholder="Description" name= "description[]"></textarea>
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
                    <th>PLU No</th>
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Dimensions</th>
                    <th>Quantity</th>
                </thead>    
                <tbody>
                <?php 
                
                $p_id = $product->getProductGenId();
                $p_name = $product->getProductName();
                $plu = $product->getProductIdPlu();
                $design = $product->getDesignName();
                $desc = $product->getDescription();
                $quan = $product->getQuantity();
                $dime = "NULL";
                 echo '<tr>
                            <td ><input type="hidden" name="product_ids[]" value="'. $p_id .'" /><span class="glyphicon glyphicon-trash remover"></span></td>
                            <td >'. $plu .' <input type="hidden" name="plu[]" value="'. $plu .'" /></td>
                            <td >'. $p_name .' <input type="hidden" name="product_names[]" value="'. $p_name .'" /> </td>
                            <td >'. $desc .' <input type="hidden" name="descriptions[]" value="'. $desc .'" /> </td>
                            <td >'. $dime .' <input type="hidden" name="dimensions[]" value="'. $dime .'" /> </td>
                            <td >'. $quan .' <input type="hidden" name="quantities[]" value="'. $quan .'" /> </td>
                        </tr>';
               
                ?>
                </tbody>
            </table>
                            
            <button class="btn btn-success btn-xs" type="submit" >Submit</button>
            <a type="button" href="<?php echo base_url();?>inventory/Product/productlist" class="btn btn-default btn-xs">Cancel</a>

    </form>
</div>

<link href="<?php echo base_url(); ?>assets_inv/css/typeahead.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/js/create_new_estimate.js"></script>

