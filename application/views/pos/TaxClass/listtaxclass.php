<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List Tax Classes</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">
        <?php if ( $this->session->flashdata('taxadd') ) echo $this->session->flashdata('taxadd'); ?>
        <?php if ( $this->session->flashdata('taxedit') ) echo $this->session->flashdata('taxedit'); ?>
        <?php if ( $this->session->flashdata('taxdelect') ) echo $this->session->flashdata('taxdelect'); ?>
               <!-- add tax class -->

                        <a href="<?php echo site_url()."pos/TaxClass/addtaxclass"?>" class="btn btn-success btn-sm">Add Tax Class</a>

               <!-- add tax class end--> 
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
                            
                            <?php foreach($taxclass as $taxclass): ?>                         
                            <tr> 
                                <td><?php echo $taxclass->getTaxClassName(); ?></td>
                                <td><?php echo $taxclass->getTaxPercent(); ?></td>
                                <td><?php 
                                        if($taxclass->getStatus() == 1) {
                                            echo "ACTIVE";
                                        } else {
                                            echo "INACTIVE";
                                        }
                                    ?>
                                <td><?php echo gmdate('d-m-Y', $taxclass->getCreatedDate() ); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a type="button"  href="<?php echo site_url()."pos/TaxClass/editTaxClass/".$taxclass->getTaxClassId();?>" class="btn btn-primary btn-xs btn-outline">Edit</a>
                                            <?php if( $visiblity == 1 ): ?>
        <a type="button" href="<?php echo site_url()."pos/TaxClass/deleteTaxClass/".$taxclass->getTaxClassId();?>" class="btn btn-danger delete-btn btn-xs btn-outline">Delete</a>
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
