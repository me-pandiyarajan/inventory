  <div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">EDIT PRODUCT</h1>
	 <?php echo validation_errors(); ?>  
	 <?php if(isset($error)){echo $error;} 
	 ?>
	 <?php 
	  $attributes = array('class' => 'form-horizontal');
	 echo form_open_multipart($form_action,$attributes);?>
 
       <div class="form-group">
	     <label class="control-label col-xs-3" for="category_id">Category</label>
	     <div class="dropdown col-xs-3">
		 <?php 
			  array_unshift($Categories, "Select Category");
             echo form_dropdown('category_id',$Categories,$product->getCategoriesCategory()->getCategoryId(),'class="form-control"');
			?>
	     </div>
	   </div>
       <div class="form-group" hidden="hidden">
            <label class="control-label col-xs-3" for="productName">Product Id:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo $product->getProductGenId();?>" id="productGenId" name="productGenId" placeholder="Product Name" >
            <input type="hidden" name="editmode" value="<?php echo $editmode;?>">
            </div>
	 </div> 
	<legend>General</legend>
	<div class="form-group">
            <label class="control-label col-xs-3" for="productName">Product Name:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control"  value="<?php echo $product->getProductName();?>"  id="productName" name="productName" placeholder="Product Name">
            </div>
            <label class="control-label col-xs-3" for="supplier_id">Supplier</label>
            <div class="dropdown col-xs-3">
			<?php 
			 array_unshift($supplier, "Select supplier");
             echo form_dropdown('supplier_id',$supplier,$product->getSuppliersSupplier()->getSupplierId(),'class="form-control"');
			?>
	        </div>
       </div>
	    <div class="form-group">
            
            <label class="control-label col-xs-3" for="short_description">Short Description:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo $product->getShortDescription(); ?>" id="short_description" placeholder="Short Description" name="short_description">
            </div>
             <label class="control-label col-xs-3" for="description">Description:</label>
            <div class="col-xs-3">
                <textarea rows="3" class="form-control"  id="description" placeholder="Description" name="description" ><?php echo $product->getDescription(); ?></textarea>
         </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="country_of_manufacture">Country of Manufacture :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php echo $product->getCountryOfManufacture(); ?>" id="country_of_manufacture" name= "country_of_manufacture" placeholder="Country of manufacture">
            </div>
       </div>
	<?php 
     if($visiblity == 1)
       {
       echo'<div class="form-group">
            <label class="control-label col-xs-3" for="status">Status</label>
            <div class="dropdown col-xs-3">';
            $options = array(''=>'Select Status','1'  => 'Enable','0' => 'Disable'); 
            echo form_dropdown('status', $options,$product->getStatus(),'class="form-control"');
           echo'</div>
           </div>
           <legend>Price</legend>
           <div class="form-group">
            <label class="control-label col-xs-3" for="price">Price :</label>
            <div class="col-xs-3">
                <input type="text" class="form-control"   id="price" name="price" value= "'.$product->getPrice().'" placeholder="Price">
            </div>
             <label class="control-label col-xs-3" for="installation_charges">Installation Charges :</label>
           <div class="col-xs-3">
                <input type="text" class="form-control"  id="installation_charges" name="installation_charges" value= "'.$product->getInstallationCharges().'" placeholder="Installation Charges">
            </div>
       </div>';

        }

        if($visiblity == 2 || $visiblity == 1)
          {
        echo '<legend>Inventory</legend>
        <div class="form-group">
        <label class="control-label col-xs-3" for="quantity">Quantity :</label>
        <div class="col-xs-3">
         <input type="text" class="form-control" value= "'.$product->getQuantity().'"  id="quantity" name="quantity" placeholder="quantity">
        </div>
        <label class="control-label col-xs-3" for="unit">Unit</label>
            <div class="dropdown col-xs-3">';
             $options = array(''=>'Select Unit','pieces' => 'piece(s)','boxes'  => 'box(s)','bags' => 'bags','rolls'=>'rolls','meter'=>'meter','feet'=>'feet','inches' => 'Inches'); 
             echo form_dropdown('unit',$options,$product->getUnit(),'class="form-control"').'</div>
            </div>';
        }
            ?>
            <?php
            if($visiblity == 1)
          {
            echo '<div class="form-group">
            <label class="control-label col-xs-3" for="stock_availability">Stock Availability</label>
             <div class="dropdown col-xs-3">';
            $options = array(''=>'Select Stock Availability','1'  => 'In-Stock','0' => 'Out-Of-Stock'); 
            echo form_dropdown('stock_availability', $options,$product->getStockAvailability(),'class="form-control"');
           echo'</div>
           </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="safety_stock_level">Safety Stock Level</label>
            <div class="col-xs-3">
             <input type="text" class="form-control"  id="safety_stock_level" name="safety_stock_level" value= "'.$product->getSafetyStockLevel().'" placeholder="Safety Stock Level">
            </div>
            <label class="control-label col-xs-3" for="POS_stock_level">POS Stock Level</label>
            <div class="col-xs-3">
             <input type="text" class="form-control"  id="POS_stock_level" name="POS_stock_level" value="'.$product->getPosStockLevel().'" placeholder="POS Stock Level">
            </div>
          </div>';  
        }    
     ?>
	 <legend>Image</legend>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="image">Product Image</label>
            <div class="col-xs-9">
            <?php 
           $image_path = $product->getUploadImage(); 
            if(!$image_path)
              echo "No image was uploaded. You can upload it now";
            else{
              echo '<img src="'.$image_path.'" class="img-thumbnail">';
            }             
            ?>
            <input type="file" name="image" id="image" size="">
            </div>
       </div>
	   <legend>Dimensions</legend>
      <div class="form-group">
           <label class="control-label col-xs-3" for="material">Material Type</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getMaterial(); ?>" id="material" name="material" placeholder="Material Type">
            </div>
            <label class="control-label col-xs-3" for="unit">Unit</label>
            <div class="dropdown col-xs-3">
            <?php
           $options = array(''=>'Select Unit','meter'=>'meter','feet'=>'feet','inches' => 'Inches'); 
            echo form_dropdown('dimunit', $options,$product->getDimenUnit(),'class="form-control"');
            ?>
           </div>
      </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="weight">Weight</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getWeight(); ?>" id="weight"  pattern="[0-9]{1,5}" name="weight" placeholder="Weight">
            </div>
            <label class="control-label col-xs-3" for="width">Width</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getWidth();?>" id="width"  pattern="[0-9]{1,5}" name="width" placeholder="Width">
            </div>
       </div>
	      <div class="form-group">
            <label class="control-label col-xs-3" for="length">Length</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getLength();?>" id="length"  pattern="[0-9]{1,5}" name="length" placeholder="Length">
            </div>
            <label class="control-label col-xs-3" for="height">Height</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getHeight(); ?>" id="height"  pattern="[0-9]{1,5}" name="height" placeholder="Height">
            </div>
       </div>
	    <legend>Design</legend>
			   <div class="form-group">
            <label class="control-label col-xs-3" for="design_name">Design Name</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getDesignName(); ?>" id="design_name" name="design_name" placeholder="Design Name">
            </div>
            <label class="control-label col-xs-3" for="shade">Shade</label>
            <div class="col-xs-3">
             <input type="text" class="form-control" value="<?php echo $product->getShade(); ?>" id="shade" name="shade" placeholder="Shade">
            </div>
       </div>

       
	     <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                                 
              <button type="submit" class="btn btn-success btn-xs">Update</button>
                 <a type="button" href="<?php echo base_url();?>Product/productlist" class="btn btn-default btn-xs">Cancel</a>
            </div>
        </div>
</form>
</div>