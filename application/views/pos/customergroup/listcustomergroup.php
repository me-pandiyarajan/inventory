<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer Group List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">

 <?php if ( $this->session->flashdata('cusgroupedit') ) echo $this->session->flashdata('cusgroupedit'); ?>
<?php if ( $this->session->flashdata('cusgroupdelect') ) echo $this->session->flashdata('cusgroupdelect'); ?>
<?php if ( $this->session->flashdata('cusgroupadd') ) echo $this->session->flashdata('cusgroupadd'); ?>
               <!-- add customer group -->

                        <a href="<?php echo site_url()."pos/CustomerGroup/addcustomergroup"?>" class="btn btn-success btn-sm">Add Customer Group</a>

               <!-- add customer group end--> 
                  <div class="table-responsive">
            
                    <table class="table table-bordered table-striped" >

                        <thead> 
                            <tr>
                                <?php  foreach($tablehead as $table_head):?>       
                                <th><?php echo $table_head;?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            
                            <?php foreach($customergroup as $customergroup): ?>                         
                            <tr> 
                                <td><?php echo $customergroup->getCustomerGroupName();?></td>
                                <td><?php echo $customergroup->getDiscountpercent();?></td>
                                <td><?php  $customercount = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('deleted'=>0,'groupCustomerCustomerGroup'=>$customergroup->getCustomerGroupId()));  echo count($customercount);  ?></td>
                                
                                <td><?php if($customergroup->getStatus() == 1)
                                        {echo '<span class="label label-success">Active</span>';} 
                                        else {echo '<span class="label label-danger">Inactive</span>';}
                                    ?>
                                <td><?php echo mdate("%Y/%m/%d", $customergroup->getCreatedDate()); ?></td>
                                
                                <td>
                                    <div class="btn-group">
                                        <a type="button"  href="<?php echo site_url()."pos/CustomerGroup/viewCustomerGroup/".$customergroup->getCustomerGroupId();?>" class="btn btn-primary btn-xs btn-outline">View List</a>
                                        <a type="button"  href="<?php echo site_url()."pos/CustomerGroup/editCustomerGroup/".$customergroup->getCustomerGroupId();?>" class="btn btn-primary btn-xs btn-outline">Edit</a>
                                            <?php if( $visiblity == 1 ): ?>
        <a type="button" href="<?php echo site_url()."pos/CustomerGroup/deleteCustomerGroup/".$customergroup->getCustomerGroupId();?>" class="btn btn-danger delete-btn btn-xs btn-outline">Delete</a>
                                        <?php endif;    ?>
                                    </div>
                                </td>
                            </tr>

                            <?php endforeach; ?>  
                        </tbody>
                                        
                    </table>

                </div>

        </div>
       
         <!-- /.dynamic content end -->


    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
