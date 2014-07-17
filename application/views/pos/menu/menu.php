 <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <h4 class="align-center"> MENU </h4>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="pos/sales/Sale"><i class="fa fa-dashboard fa-fw"></i> Sales</a>
                        </li>
                        <li>
                            <a href="pos/return_damage"><i class="fa fa-dashboard fa-fw"></i>Sales Return</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money"></i> Tax Class<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pos/taxclass/addtaxclass">Add Tax Class</a>
                                </li>
                                <li>
                                    <a href="pos/taxclass/listtaxclass">List Tax Classes</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Customer<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pos/customer/addCustomer">Add Customer</a>
                                </li>
                                <li>
                                    <a href="pos/customer/listCustomers">List Customers</a>
                                </li>
                                <li>
                                    <a href="pos/customergroup/addcustomergroup">Add Customer Group</a>
                                </li>
                                <li>
                                    <a href="pos/customergroup/listcustomergroup">List Customer Groups</a>
                                </li>
                            </ul>
                            </li>
                            <li>
                            <a href="#"><i class="fa fa-users"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pos/product/productlist">List Products</a>
                                </li>
                               
                            </ul>
                            </li>
                             <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Invoice<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>pos/invoice/invoice_list">Invoice List</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>pos/invoice/void_invoice">Void Invoice</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Estimation<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>pos/estimation/view_estimation">Create Estimation</a>
                                </li>
                              <li>
                                    <a href="<?php echo base_url();?>pos/estimation/estimationlist">Estimation List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <li>
                            <a href="#"><i class="fa fa-users"></i> Project <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>pos/project/projectadd">Create Project</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>pos/project/projectlist">Project List</a>
                                </li>
                                <li>
                                    <a href="pos/sales/ProjectSale">Project Sale</a>
                                </li>

                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>  
                        <!-- enquiry-->
             <li>
                <a href="#"><i class="fa fa-users"></i> Enquiry <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url()."pos/enquiry/leadenquiry"?>">List Enquiry</a>
                    </li>
                  
                </ul>
            </li> 
            <!-- Feedback-->
             <li>
                <a href="#"><i class="fa fa-users"></i> Feedback <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url()."pos/feedback/feedbacklist"?>">List Feedback</a>
                    </li>
                    
                </ul>
            </li>    
              <!-- Feedback-->
             <li>
                <a href="#"><i class="fa fa-users"></i>Sales Report<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>pos/salesreport/index">Sales Report</a>
                    </li>
                    
                </ul>
            </li>                         
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>