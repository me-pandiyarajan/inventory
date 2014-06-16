<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">
  	
        	<?php if(!empty($success)) echo $success; ?>
			<dl class="dl-horizontal">
				<dt>Customer Name</dt>
				<dd><?php echo $customer->getCustomername();?></dd>
				
				<dt>Email</dt>
				<dd><?php echo $customer->getEmail();?></dd>
				
				<dt>Mobile</dt>
				<dd><?php echo $customer->getMobileNumber();?></dd>
				
				<dt>Status</dt>
				<dd><?php if($customer->getStatus() == 1){echo "ACTIVE";} else {echo "INACTIVE";}?></dd>
			</dl>

			<!-- add customer -->

			<a href="<?php echo site_url()."customer/customerDetails/".$customer->getCustomerId()."/editCustomerDetails";?>" class="btn btn-success btn-outline">Edit</a>
			<?php if( $visiblity == 1 ): ?>
			<a href="<?php echo site_url()."customer/addCustomer"?>" class="btn btn-success btn-outline">Delete</a>
		  	<?php endif; ?>

		   	<!-- add customer end--> 
		
        </div>
       
         <!-- /.dynamic content end -->
         
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->


