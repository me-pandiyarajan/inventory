</nav> <!-- do not remove this please -->

<div id="page-wrapper-reports">

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
           
           <div id="grid" data-columns>
                    <div class="panel panel-default ">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Five Customer </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>    
                                            <th>Name</th>
                                            <th>Visits</th>                                                                
                                        </tr>
                                    </thead>
                                <tbody >
                                <?php foreach ($customer_sales as $customersales):?>
                                   <tr> 
                                      <td><?php echo $customersales[0]->getPosCustomerCustomer()->getCustomername();?></td>
                                      <td><?php echo $customersales['data'];?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Area Wise </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>
                                            
                                            <th>Address</th>
                                            <th>Count of Area</th>                                                              
                                        </tr>
                                    </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php foreach ($area_wise_sales as $area_wise):?>
                                   <tr> 
                                      <td><?php echo $area_wise[0]->getStreet();?>,<?php echo $area_wise[0]->getCity();?>,<?php echo $area_wise[0]->getState();?>,<?php echo $area_wise[0]->getZipCode();?></td>
                                      <td><?php echo $area_wise['data'];?></td>
                                     </tr>
                                    <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Five Products </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>                                            
                                            <th>Product Name/PLU</th>
                                            <th>Quantity</th>                                                   
                                        </tr>
                                    </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php foreach ($product_sales as $productsales):?>
                                
                                   <tr> 
                                       <td><?php echo $productsales[0]->getProductsProductGen()->getProductName();?><i><?php echo $productsales[0]->getProductsProductGen()->getProductIdPlu();?></i></td>
                                      <td><?php echo $productsales['data']; ?></td>                   
                                  </tr>
                                <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Five Category </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>                            
                                            <th>Category Name</th>
                                            <th>Quantity</th>                                                           
                                        </tr>
                                    </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                   <tr> 
                                      <td></td>
                                      <td></td>
                                  </tr>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Return Products </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>                            
                                            <th>Product Name/PLU</th>
                                            <th>Quantity</th>
                                            </tr>
                                    </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php foreach ($sales_return as $salesreturn):?>
                                   <tr> 
                                       <td><?php echo $salesreturn[0]->getProductsProductGen()->getProductName();?>/<?php echo $salesreturn[0]->getProductsProductGen()->getProductIdPlu();?></td>
                                       <td><?php echo $salesreturn['data']; ?></td>                  
                                  </tr>
                                   <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Damaged Products </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" >
                                    <thead> 
                                        <tr>                            
                                            <th>Product Name/PLU</th>
                                            <th>Quantity</th>                                                       
                                        </tr>
                                    </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                
                                <?php foreach ($sales_damaged as $salesdamaged):?>
                                
                                   <tr> 
                                      <td><?php echo $salesdamaged[0]->getProductsProductGen()->getProductName();?>/<?php echo $salesdamaged[0]->getProductsProductGen()->getProductIdPlu();?></td>
                                      <td><?php echo $salesdamaged['data']; ?></td>
                                     </tr>
                                  <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Projects Count </div>
                        <div class="panel-body">
                            <div class="text-center">  
                                <span class="size-medium"><?php echo $project_count;?></span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Payment Type </div>
                        <div class="panel-body">
                           <div class=" text-center col-xs-2">   
                                <p>Credit</p>
                                <span class="size-medium"><?php echo $payment_type['credit'];?></span>
                            </div>
                            <div class=" text-center col-xs-2">  
                                <p>Cash</p>
                                <span class="size-medium"><?php echo $payment_type['cash'];?></span>
                            </div>
                            <div class=" text-center col-xs-2">  
                                <p>Cheque</p>
                                <span class="size-medium"><?php echo $payment_type['cheque'];?></span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Void Invoice List </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead> 
                                        <tr>                            
                                            <th>Product Name/PLU</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>                                                   
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php foreach ($voidinvoice as $void):?>
                                   <tr> 
                                      <td><?php echo $void->getProductsProductGen()->getProductName();?>/<?php echo $void->getProductsProductGen()->getProductIdPlu();?></td>
                                      <td><?php echo $void->getUnitPrice();?></td>
                                      <td><?php echo $void->getQuantity();?></td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>        
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> payment type-c </div>
                        <div class="panel-body"> 
                            <div id="chartContainer" class="case-containers chart-dim"></div>        
                        </div>
                    </div>

                     <div class="panel panel-default" >
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Top Five Category </div>
                        <div class="panel-body">
                            <div id="map" class="col-xs-12" style="height: 370px;"></div>
                        </div>
                    </div>
            </div>

        </div>
        <!-- /.dynamic content end -->
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

