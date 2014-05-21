<div class="col-sm-9 col-md-10 main">
	 <h1 class="page-header">NEW ESTIMATE</h1>
	 <div class="row placeholders">
	 <?php echo validation_errors(); 
	 if(isset($success)){echo $success;} 
	 ?>  
	 <?php 
	  $attributes = array('class' => 'form-horizontal');
	 echo form_open_multipart($form_action,$attributes);?>
	 <?php foreach($product as $products): ?>
	 <?php
	 if($value == true)
	 {
	 
	 $supplier_id = $products->getSuppliersSupplier()->getSupplierId();
	 $supplier_name = $products->getSuppliersSupplier()->getSupplierName();
	 $supplier_phone = $products->getSuppliersSupplier()->getTelephone();
	 $supplier_email = $products->getSuppliersSupplier()->getEmail();
	 $supplier_address = $products->getSuppliersSupplier()->getStreet().','.$products->getSuppliersSupplier()->getState();
	 }
	else
	{
	$supplier_id = NULL;
	$supplier_name = NULL;
	$supplier_phone = NULL;
	$supplier_email = NULL;
	$supplier_address =NULL;
	}
    ?>
	<div class="form-group">
            <div class="col-xs-4" hidden>
                <input type="text" class="form-control" value="<?php echo set_value('supplier_id');echo $supplier_id;?>" id="supplier_id" placeholder="Supplier Name" name="supplier_id" >
            </div>
      </div>
	 <div class="form-group">
            <label class="control-label col-xs-3" for="supplier_name">Supplier Name</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php echo set_value('supplier_name');echo  $supplier_name; ?>" id="supplier_name" placeholder="Supplier Name" name="supplier_name" >
            </div>
       </div>
	  
        <legend>Supplier Info</legend>
	  <div class="form-group">
            <label class="control-label col-xs-3" for="company">Name of the Company</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('company'); ?>" id="company" placeholder="Name of the Company" name="company">
            </div>
            <label class="control-label col-xs-3" for="phone">Phone Number</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('phone'); echo $supplier_phone; ?>" id="phone" placeholder="Phone Number" name="phone">
            </div>
       </div>
	    <div class="form-group">
            <label class="control-label col-xs-3" for="email">Email Id</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('email');echo $supplier_email; ?>" id="email" placeholder="Email Id" name="email">
            </div>
       
            <label class="control-label col-xs-3" for="address">Address</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('address');echo $supplier_address; ?>" id="address" placeholder="Address" name="address">
            </div>
       </div>
	  
	  <legend>Product Info</legend>
	  <div class="form-group">
            <label class="control-label col-xs-3" for="name">Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('name'); ?>" id="name" placeholder="Name" name= "name">
            </div>
      
            <label class="control-label col-xs-3" for="description">Description</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('description'); ?>" id="description" placeholder="Description" name= "description">
            </div>
       </div>
	   <div class="form-group">
            <label class="control-label col-xs-3" for="quantity">Quantity</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('Quantity'); ?>" id="quantity" placeholder="Quantity" name= "quantity">
            </div>
       
            <label class="control-label col-xs-3" for="desgin">Desgin Name</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?php echo set_value('desgin'); ?>" id="desgin" placeholder="Desgin Name" name= "desgin">
            </div>
       </div>
	  <div class="form-group">
            <label class="control-label col-xs-3" for="dimension">Dimension</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php echo set_value('dimension'); ?>" id="dimension" placeholder="dimension"  name= "dimension">
            </div>
       </div>
	  <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
      </div>
  </form>
  <div class="table-responsive">
  <table class="table table-bordered">
               <thead> 
							<tr>
								<?php  foreach($tablehead as $table_head):?>	   
								<th><?php echo $table_head;?></th>
								<?php endforeach; ?>
							</tr>
				    </thead>			
					<tbody role="alert" aria-live="polite" aria-relevant="all">
					<tr class="odd"> 
					<td class="align-center "><?php echo $products->getProductIdPlu();?></td>
					<td class="align-center "><a href="productDetails/<?php echo $datum->getproductGenId();?>/productview"><?php echo $products->getProductName();?></a></td>
					<td class="align-center "><?php echo $products->getQuantity();?></td>

					</tr>	
	
				<?php endforeach; ?>  
					</tbody>
									
				</table>

			</div>
</div>
</div>