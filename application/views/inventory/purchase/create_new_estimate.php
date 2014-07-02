<div class="col-sm-9 col-md-10 main">
    
    <h1 class="page-header">NEW ESTIMATE</h1>
    <?php echo validation_errors();   
      if(!empty($success)) echo $success; ?>
    <?php 
       $attributes = array('class' => 'form-horizontal', 'id' => 'new-estimate');
       echo form_open_multipart($form_action,$attributes);
    ?>
	
	 
    <div class="form-group">
        <label class="control-label col-xs-2" for="estimate_name">Estimate Name</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" required value="<?php echo set_value('estimate_name'); ?>" id="estimate_name" placeholder="Estimate Name" name="estimate_name" >
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
                    <input type="text"  class="form-control" value="<?php echo set_value('shade'); ?>" id="shade" placeholder="shade"  name= "shade">
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
                    <th>SKU</th>
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Design/Shade</th>
                    <th>Dimension</th>
                    <th>Quantity</th>
                </thead>    
                <tbody>
                
                </tbody>
            </table>
                            
             <button class="btn btn-success btn-xs" type="submit" >Send Estimate</button>
           
    </form>
</div>


<!-- Button trigger modal -->
<button  class="hidden" data-toggle="modal" id="pop" data-target="#myModal"></button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title text-danger" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span> <strong>ALERT<strong></h5>
      </div>
        <div class="modal-body" >
	       <p>Please add at least one product to estimate</p>
        </div>
    </div>
  </div>
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
<script type="text/javascript"> var base_url = "<?php print base_url(); ?>";</script>

<script src="<?php echo base_url(); ?>assets_inv/jquery/core/jquery-1.11.0.js"></script>

<script src="<?php echo base_url(); ?>assets_inv/typeahead/typeahead.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_inv/js/create_new_estimate.js"></script>


