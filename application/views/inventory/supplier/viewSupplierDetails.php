<div class="col-sm-9 col-md-10 main">

 <!-- dynamic view content -->       

        <h3 class="page-header">Supplier Details</h3>
  	
        	<?php if(!empty($success)) echo $success; ?>
			<dl class="dl-horizontal">
				<dt>Supplier Name</dt>
				<dd><?php echo $supplier->getSupplierName();?></dd>
				
				<dt>Email</dt>
				<dd><?php echo $supplier->getEmail();?></dd>
				
				<dt>Mobile</dt>
				<dd><?php echo $supplier->getTelephone();?></dd>
				
				<dt>Status</dt>
				<dd><?php if($supplier->getStatus() == 1){echo "ACTIVE";} else {echo "INACTIVE";}?></dd>
			</dl>

			<!-- add supplier -->

			<a href="<?php echo site_url()."supplier/supplierDetails/".$supplier->getSupplierId()."/editSupplierDetails";?>" class="btn btn-success btn-sm">Edit</a>
			<?php if( $visiblity == 1 ): ?>
			<a href="<?php echo site_url()."supplier/addSupplier"?>" class="btn btn-success btn-sm">Delete</a>
		  	<?php endif; ?>

		   	<!-- add supplier end--> 
		

<!-- dynamic view content end-->

</div>


