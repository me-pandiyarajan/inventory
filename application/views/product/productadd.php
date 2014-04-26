<div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">ADD PRODUCT</h1>
	 <div class="row placeholders">
	 <?php echo validation_errors(); ?>  
	 <?php if(isset($error)){echo $error;} 
	  if ( $this->session->flashdata('AddProduct') ) echo $this->session->flashdata('AddProduct');?>
	 <?php 
	  $attributes = array('class' => 'form-horizontal');
	 echo form_open_multipart($form_action,$attributes);?>
 
	 <div class="form-group">
	     <label class="control-label col-xs-3" for="category_id">Category</label>
	     <div class="dropdown col-xs-4">
	     <select class="form-control" name="category_id" id="category_id" >
		     <option value="">--Select Category--</option>
		 <?php foreach($Categories as $val => $option): ?>
		 <?php echo $val; echo $option;?>
	         <option value="<?php echo $val;?>"<?php echo set_select('category_id', $val,FALSE); ?>><?php echo $option;?></option>
		 <?php endforeach; ?>
	      </select> 
	     </div>
	  </div>

      <div class="form-group">
            <label class="control-label col-xs-3" for="productName">Product Name:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo set_value('productName'); ?>"  id="productName" name="productName" placeholder="Product Name">
            </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="status">Status</label>
            <div class="dropdown col-xs-4">
			<select class="form-control" name="status" id="status" >
			    <option value="">--Select status--</option>
	            <option value="ENABLE">ENABLE</option>
				<option value="DISABLE">DISABLE</option>
			 </select>
	        </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="description">Description:</label>
            <div class="col-xs-4">
                <textarea rows="3" class="form-control" value="<?php echo set_value('description'); ?>" id="description" placeholder="Description" name="description" ></textarea>
            </div>
        </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="short_description">Short Description:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php echo set_value('short_description'); ?>" id="short_description" placeholder="Short Description" name="short_description">
            </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="supplier_id">Supplier</label>
            <div class="dropdown col-xs-4">
			<select class="form-control" name="supplier_id" id="supplier_id" >
			    <option value="">--Select Supplier--</option>
	         <?php foreach($supplier as $val => $option): ?>
				<option value="<?php echo $val;?>"><?php echo $option;?></option>
		     <?php endforeach; ?>
			 </select>
	        </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="country_of_manufacture">Country of manufacture :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php echo set_value('country_of_manufacture'); ?>" id="country_of_manufacture" name= "country_of_manufacture" placeholder="Country of manufacture">
            </div>
       </div>
	   </fieldset>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="quantity">Quantity :</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value('quantity'); ?>" id="quantity" name="quantity" placeholder="quantity">
            </div>
       </div>
	   <?php 
	   if($visiblity == 1)
	   {
	   echo'
	   <div class="form-group">
            <label class="control-label col-xs-3" for="price">Price :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"   id="price" name="price" placeholder="Price">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="group_price">Group Price :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  id="group_price" name="group_price" placeholder="Group Price">
            </div>
       </div>
       <div class="form-group">
		    <label class="control-label col-xs-3" for="special_price_from">Special Price From :</label>
			<div class="input-group date col-xs-4"  id="special_price_from" name="special_price_from" >
				 <input type="text" class="form-control" />
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
				 </span>
			</div>
       </div>
	   <div class="form-group">
		    <label class="control-label col-xs-3" for="special_price_from">Special Price To:</label>
			<div class="input-group date col-xs-4"  id=" special_price_to" name="special_price_to">
				 <input type="text" class="form-control" />
				 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
				 </span>
			</div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="installation_charges">Installation Charges :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  id="installation_charges" name="installation_charges" placeholder="Installation Charges">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="total_cost">Total Cost :</label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  id="total_cost" name="total_cost"  placeholder="Total Cost">
            </div>
       </div>
	  
	   <!-- Grand total , Upload Image -->
	   
	    <div class="form-group">
            <label class="control-label col-xs-3" for="stock_availability">Stock Availability</label>
            <div class="col-xs-4">
             <input type="text" class="form-control"  id="stock_availability" name="stock_availability" placeholder="Stock Availability">
            </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="safety_stock_level">Safety Stock Level</label>
            <div class="col-xs-4">
             <input type="text" class="form-control"  id="safety_stock_level" name="safety_stock_level" placeholder="Safety Stock Level">
            </div>
       </div>';
	   }?>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="image">Product Image</label>
            <div class="col-xs-4">
            <input type="file" name="image" id="image" size="">
            </div>
       </div>
	   
	   <div class="form-group">
            <label class="control-label col-xs-3" for="weight">Weight</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("weight"); ?>" id="weight" name="weight" placeholder="Weight">
            </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="width">Width</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("width"); ?>" id="width" name="width" placeholder="Width">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="length">Length</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("length"); ?>" id="length" name="length" placeholder="Length">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="height">Height</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("height"); ?>" id="height" name="height" placeholder="Height">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="design_name">Design Name</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("design_name"); ?>" id="design_name" name="design_name" placeholder="Design Name">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="shade">Shade</label>
            <div class="col-xs-4">
             <input type="text" class="form-control" value="<?php echo set_value("shade"); ?>" id="shade" name="shade" placeholder="Shade">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="tax_id">Tax</label>
            <div class="dropdown col-xs-4">
			<select class="form-control" name="tax_id" id="tax_id" >
			<option value="">--Select Tax--</option>
	      <?php foreach($TaxClass as $val => $option): ?>
	         <option value="<?php echo $val;?>"><?php echo $option;?></option>
		     <?php endforeach; ?>
			 </select>
	        </div>
       </div>
       
	           <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </div>
</form>
</div>
</div>