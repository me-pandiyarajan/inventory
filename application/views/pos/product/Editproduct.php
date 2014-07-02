<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">



         <!-- /.dynamic content -->
       
        <div class="col-lg-12">
                 <?php echo validation_errors(); ?> 

     <?php if(isset($error)){echo $error;} 
      if ( $this->session->flashdata('addcustomergroup')) echo $this->session->flashdata('addcustomergroup');
      ?>
      
     <?php 
     $attributes = array('class' => 'form-horizontal','id' => 'poseditproduct'); 
     echo form_open($form_action,$attributes);?>
     <?php foreach ($products as $product):?>
        <div class="form-group">
            <label class="control-label col-xs-2" for="productname">Product Name</label>
            <div class="col-xs-4">
              <input type="hidden" class="form-control"  value="<?php echo $product->getProductIdPlu();?>"  id="plu" name="plu" >
                <input type="text" class="form-control"  value="<?php echo $product->getProductName();?>"  id="productname" name="productname" placeholder="Product Name" disabled="disabled">
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-xs-2" for="price">Price </label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo $product->getPrice();?>"  id="price" name="price" placeholder="Price " disabled="disabled">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-2" for="quantity">Quantity </label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo $product->getPosStockLevel();?>"  id="quantity" name="quantity" placeholder="Quantity " disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="tax">Tax</label>
            <div class="dropdown col-xs-4">
              <?php 
              $tax_data = $product->getPosTaxTaxClass();
              if ($tax_data == NULL) 
              {
                  echo form_dropdown('tax',$tax,set_value('tax'),'class="form-control" required');
              }
              else
              {
                 echo form_dropdown('tax',$tax,$product->getPosTaxTaxClass()->getTaxClassId(),'class="form-control" required');
              }
             
              ?>
          </div>
      </div>   
     
      <div class="form-group">
            <label class="control-label col-xs-2" for="safety_stock_level">Safety Stock Level </label>
            <div class="col-xs-4">
                <input type="text" class="form-control"  value="<?php echo $product->getSafetyStockLevel();?>"  id="safety_stock_level" name="safety_stock_level" placeholder="Price " disabled="disabled">
            </div>
        </div>
      
     <?php endforeach;?>
       

    
       
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-9">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                 <input type="reset" class="btn btn-info btn-sm" value="Reset" >
            </div>
        </div>
     <?php echo form_close();?>
    
        </div>
        <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


