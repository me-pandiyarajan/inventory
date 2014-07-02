<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

         <!-- /.dynamic content -->
       
        <div class="col-lg-12">

        <?php if ( $this->session->flashdata('productedit') ) echo $this->session->flashdata('productedit'); ?>
              <!-- add tax class -->

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
                            
                            <?php foreach($products as $product): ?>

                            <?php 
                                $stock_level = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('p')
                                ->where("p.safetyStockLevel >= p.posStockLevel")
                                ->andWhere("p.status = 1")
                                ->andWhere("p.deleted = 0")
                                ->andWhere("p.productIdPlu = '".$product->getProductIdPlu()."'")
                                ->getQuery()
                                ->getResult();
                                if (count($stock_level) == 0) 
                                {
                                   echo' <tr>' ;
                                }
                                else
                                {
                                  echo' <tr class="danger">' ; 
                                }
                                ?>                                             
                           
                                <td><?php echo $product->getProductIdPlu();?></td>
                                <td><?php echo $product->getProductName();?></td>
                                <td><?php echo $product->getPrice();?></td>
                                <td><?php echo $product->getPosStockLevel()." ".$product->getUnit();?></td>
                                <td><?php echo $product->getSafetyStockLevel();?></td>
                                <td><?php 
                                    if($product->getPosTaxTaxClass() == NULL)
                                    {
                                        echo "N/A".'</td>';
                                    }
                                    else
                                    {
                                        echo $product->getPosTaxTaxClass()->getTaxPercent().'</td>';
                                    }
                                    ?>
                                <td>
                                    <div class="btn-group">
                                        <a type="button"  href="<?php echo site_url()."pos/product/editProduct/".$product->getProductIdPlu();?>" class="btn btn-primary btn-xs btn-outline">Edit</a>
                                           
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
