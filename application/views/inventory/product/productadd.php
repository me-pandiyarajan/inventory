<div class="col-sm-9 col-md-10 main">
   <h1 class="page-header">ADD PRODUCT</h1>
  
   <?php echo validation_errors(); ?>  
   <?php if(isset($error)){echo $error;} 
    if ( $this->session->flashdata('AddProduct')) echo $this->session->flashdata('AddProduct');
    if ( $this->session->flashdata('ProductNot')) echo $this->session->flashdata('ProductNot');
    ?>
    <?php 
     switch ($visiblity) {
       case 1:
        $attributes = array('class' => 'form-horizontal','id' => 'superadmin-add-product'); 
        break;
       case 2:
        $attributes = array('class' => 'form-horizontal','id' => 'admin-add-product'); 
        break;
       case 3:
        $attributes = array('class' => 'form-horizontal','id' => 'deo-add-product'); 
        break;
     }
   ?>
   <?php echo form_open_multipart($form_action,$attributes); ?>
 
   <div class="form-group">
       <label class="control-label col-xs-2" for="category_id">Category</label>
       <div class="dropdown col-xs-3">
      <?php  array_unshift($Categories, "Select Category");
             echo form_dropdown('category_id',$Categories,set_value('category_id'),'class="form-control" required');
      ?>
       </div>
    </div>
       
     <legend>General</legend>
       <div class="form-group">
            <label class="control-label col-xs-2" for="productName">Product Name:</label>
            <div class="col-xs-3 control-group">
                <input type="text" required  class="form-control"  value="<?php echo set_value('productName'); ?>"  id="productName" name="productName" placeholder="Product Name">
            </div>
      <label class="control-label col-xs-2" for="supplier_id">Supplier</label>
            <div class="dropdown col-xs-3">
      <?php 
      array_unshift($supplier, "Select supplier");
      echo form_dropdown('supplier_id',$supplier,set_value('supplier_id'),'class="form-control" required');
      ?>
    </div>
       </div>
      <div class="form-group">
            <label class="control-label col-xs-2" for="short_description">Short Description:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('short_description'); ?>" id="short_description" placeholder="Short Description" name="short_description">
            </div>
            
            <label class="control-label col-xs-2" for="country_of_manufacture">COM:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('country_of_manufacture'); ?>" id="country_of_manufacture" name= "country_of_manufacture" placeholder="Country of manufacture">
            </div>

       </div>
      <div class="form-group">
             <label class="control-label col-xs-2" for="description">Description:</label>
            <div class="col-xs-3">
                <textarea rows="3" class="form-control" required  id="description" placeholder="Description" name="description" ><?php echo set_value('description'); ?></textarea>
            </div>
        </div>
       
    <?php 
   if($visiblity == 1)
     {
     echo'<div class="form-group"> 
     <label class="control-label col-xs-2" for="status">Status</label>
            <div class="dropdown col-xs-3">';
      $options = array(''=>'Select status','1'  => 'Enable','0' => 'Disable'); 
      echo form_dropdown('status', $options,set_value('status'),'class="form-control" required');
         echo'</div>
      </div>
      <legend>Price</legend>
     <div class="form-group">
            <label class="control-label col-xs-2" for="price">Unit price :</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" required id="price" name="price" value="'.set_value("price").'" placeholder="Unit price">
            </div>
            <label class="control-label col-xs-2" for="installation_charges">Installation Charges :</label>
            <div class="col-xs-3">
                <input type="text" class="form-control"  id="installation_charges" name="installation_charges" value="'.set_value("installation_charges").'"  placeholder="Installation Charges">
            </div>
        </div>';

        }
    if($visiblity == 1 || $visiblity == 2)
       {
      echo '<legend>Inventory</legend>
        <div class="form-group">
            <label class="control-label col-xs-2" for="quantity">Quantity :</label>
              <div class="col-xs-3">
                 <input type="text" class="form-control" id="quantity" required name="quantity" value ="'.set_value("quantity").'" placeholder="quantity">
             </div>
             <label class="control-label col-xs-2" for="unit">Unit</label>
            <div class="dropdown col-xs-3">';
            $options = array(''=>'Select Unit','Box(s)'  => 'Box(s)','Bags' => 'Bags','Rolls'=>'Rolls','Piece(s)'=>'Piece(s)','Meter'=>'Meter','Feet'=>'Feet','Inches' => 'Inches'); 
            echo form_dropdown('unit', $options,set_value('unit'),'class="form-control"');
           echo'</div>
             </div>';
         }
        ?>
        <?php
            if($visiblity == 1)
          {
        echo'
           <div class="form-group">
        <label class="control-label col-xs-2" for="stock_availability">Stock Availability</label>
        <div class="dropdown col-xs-3">';
        $options = array(''=>'Select status','1'  => 'InStock','0' => 'OutOfStock'); 
        echo form_dropdown('stock_availability', $options,set_value('stock_availability'),'class="form-control" id="stock_availability" required');
         echo'</div>
       </div>
      <div class="form-group">
            <label class="control-label col-xs-2" for="safety_stock_level">Safety Stock Level</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" required id="safety_stock_level" name="safety_stock_level" value = "'.set_value("safety_stock_level").'" placeholder="Safety Stock Level">
            </div>
      <label class="control-label col-xs-2" for="POS_stock_level">POS Stock Level</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" required id="POS_stock_level" name="POS_stock_level"  value = "'.set_value("POS_stock_level").'" placeholder="POS Stock Level">
            </div>
        </div>
    
    ';
    
     }?>
     <legend>Image</legend>
     <div class="form-group">
            <label class="control-label col-xs-2" for="image">Product Image</label>
            <div class="col-xs-3">
            <input type="file" name="image" id="image" size="">
            </div>
       </div>
      <legend>Dimenesion</legend>
        <div class="form-group">
           <label class="control-label col-xs-2" for="material">Material Type</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" required value="<?php echo set_value("material"); ?>" id="material" name="material" placeholder="Material Type">
            </div>
            <label class="control-label col-xs-2" for="unit">Unit</label>
            <div class="dropdown col-xs-3">
            <?php
           $options = array(''=>'Select Unit','meter'=>'meter','feet'=>'feet','inches' => 'Inches'); 
            echo form_dropdown('dimunit', $options,set_value('dimunit'),'class="form-control" ');
            ?>
           </div>
      </div>
     <div class="form-group">
            <label class="control-label col-xs-2" for="weight">Weight</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo set_value("weight"); ?>"  id="weight" name="weight" placeholder="Weight">
            </div>
            <label class="control-label col-xs-2" for="width">Width</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo set_value("width"); ?>" id="width" name="width" placeholder="Width">
            </div>
       </div>
     <div class="form-group">
            <label class="control-label col-xs-2" for="length">Length</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo set_value("length"); ?>" id="length" name="length"  placeholder="Length">
            </div>
            <label class="control-label col-xs-2" for="height">Height</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo set_value("height"); ?>" id="height" name="height" placeholder="Height">
            </div>
       </div>
     <legend>Design</legend>
     <div class="form-group">
            <label class="control-label col-xs-2" for="design_name">Design Name</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" required value="<?php echo set_value("design_name"); ?>" id="design_name" name="design_name" placeholder="design">
            </div>
            <label class="control-label col-xs-2" for="shade">Shade</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" required value="<?php echo set_value("shade"); ?>" id="shade" name="shade" placeholder="Shade">
            </div>
       </div>
        
       
      <div class="form-group">
            <div class="col-xs-offset-2 col-xs-3">
                 <button type="submit" class="btn btn-success btn-sm">Submit</button>
                  <input type="reset" class="btn btn-info btn-sm" value="Reset" >
               <!--  <a type="button" href="<?php echo base_url();?>Product/addProduct" class="btn btn-default btn-xs">Cancel</a>-->
               
            </div>
        </div>
  <?php echo form_close();?>
</div>
