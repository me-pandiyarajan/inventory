<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase extends CI_Controller {

	/**
	 * purchase order management controller.
	 *
	 *
	 */
	public $em; 

   	function __construct()  
	{
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		$this->load->library('navigator');
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->navigator->checkLogin(); 
		
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	/*
	 *	create_new_estimate
	 */
	public function create_new_estimate()
	{
	    $this->navigator->mustBeAdminOrSAdmin();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
        
		$estimatedata['form_action'] = "inventory/purchase/create_new_estimate";

		$this->form_validation->set_message('required_2', 'Please add atleast one %s to generate an estimate');

		/*
		*	set fields here, that to be re-populating the form
		*/
		$fields = array('email','address','name');
		foreach ($fields as $field) {
			$this->form_validation->set_rules($field);
		}
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		
		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('inventory/general/header', $header);
			$this->load->view($menu);
			$this->load->view('inventory/purchase/create_new_estimate',$estimatedata);
			$this->load->view('inventory/general/footer');
		}
		else
		{  
		    $this->em->getConnection()->beginTransaction();
			try {

                //  name="suppliers"
				$suppliers = $this->input->post('suppliers');
				$product_ids_post = $this->input->post('product_ids');
			    $sku_post = $this->input->post('sku');  
				$productname_post = $this->input->post('product_names');
				$description_post = $this->input->post('descriptions');
				$designShade_post = $this->input->post('designShade');
				$quantity_post = $this->input->post('quantities');
				$dimension_post = $this->input->post('dimensions');
				$estimate_name = $this->input->post('estimate_name');

				$supplierProducts = array();
				$i = 0;
				foreach ($suppliers as $supplier) {
						
						$products = array( 
								'product_ids' => $product_ids_post[$i],
								'sku' => $sku_post[$i],
								'productname' => $productname_post[$i],
								'description' => $description_post[$i],
								'designShade' => $designShade_post[$i],
								'quantity' => $quantity_post[$i],
								'dimension' => $dimension_post[$i],
								);

					$supplierProducts[$supplier][] = $products;
					$i++;
				}

				$created_date = new\DateTime("now");
    			$creator = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);

					
			   	foreach ($supplierProducts as $supplier => $productDetail) 
			   	{
			   		//supplier data
			   		$supplier_id  = $this->em->getRepository('models\inventory\Suppliers')->find($supplier);
			   		$supplier_name = $supplier_id->getSupplierName();
			   		$supplier_email = $supplier_id->getEmail();
			   		$supplier_mobile = $supplier_id->getMobile();

			   		$estimate = new models\inventory\NewEstimation;
					$estimate->setEstimateName($estimate_name);
					$estimate->setFlag(0);
					$estimate->setCreatedDate($created_date->getTimestamp());
					$estimate->setStatus(2);
					$estimate->setEstimateNoProduct(count($productDetail));

					$estimate->setCreatedBy($creator);
					
					$estimate->setSupplier($supplier_id);
					$this->em->persist($estimate);
					$this->em->flush();

					$estimate_id = $estimate->getEstimateId();

					/* email content */
    				$emaildata['user_name'] = $header['user_data']['firstName'].' '.$header['user_data']['lastName'];
				 	$emaildata['supplierdata'] = array('supplier_name'=>$supplier_name,'email'=>$supplier_email);
				 	

		   			foreach ($productDetail as $key => $value) {

		   				foreach ($value as $k => $v) {
		   					${$k} = $v;
		   				}

		   				/*distinguish newe product vs existing product*/
	   	        	    if(strlen($product_ids) < 1 )
	   	        	    {
	   	                    $product_ids = null;
	   	                    $Ifref = 0;
	   	                }
	   	                else
	   	                {
	   	                 	$Ifref = 1;
	   	                 	$product_ids = $this->em->getRepository('models\inventory\Products')->find($product_ids);
	   	                }

	   	                $estimate_product = new models\inventory\EstimatedProduct;
						$estimate_product->setProductName($productname);
						$estimate_product->setProductId($product_ids);
						$estimate_product->setQuantity($quantity);
						$estimate_product->setDescription($description);
						$estimate_product->setDimensions($dimension);
						$estimate_product->setDesignName($designShade);					
						$estimate_product->setOrderProduct(1);
						$estimate_product->setCreatedDate($created_date->getTimestamp());
						$estimate_product->setIfref($Ifref);
						
						$Estimatid = $this->em->getRepository('models\inventory\NewEstimation')->find($estimate_id);
						$estimate_product->setNewEstimationEstimate($Estimatid);
					
					    $estimate_product->setCreatedBy($creator);
					    $estimate_product->setDeliveryStatus(0);
					    $estimate_product->setProductSku($sku);
						$this->em->persist($estimate_product);
			            $this->em->flush();

						$emaildata['productdata'][] = array(
						   		 		'sku'			=>$sku,
						   		 		'productname'	=>$productname,
						   		 		'description'	=>$description,
						   		 		'quantity'		=>$quantity,
						   		 		'dimension'		=>$dimension,
						   		 		'design'		=>$designShade
						   		 		);
		   			}

		            /* create estimate pdf and send mail*/
		            $this->load->helper(array('dompdf', 'file'));

		            $estimate_name_file = "EST".sprintf("%06s", $estimate_id)."_".date('Y_m_d').".pdf";
	 	    		$emaildata['estimate_id'] = $estimate_name_file;

		            $html = $this->load->view('inventory/email_template/estimate_template', $emaildata, true);

	 	    		$data = pdf_create($html, $estimate_name_file,false);

					if(!write_file("assets_inv/estimations/".$estimate_name_file, $data))
					{
					    echo 'Unable to write the file';
					}

					
                    $msg = "Estimated Product";
                    $subject = "New Estimate";
					$attachment= "assets_inv/estimations/".$estimate_name_file;
					$attachments = array($attachment);
		            $this->email($supplier_email,$msg,$attachments,$subject);
				   
			   	}

			   
				$this->em->getConnection()->commit();

				$estimatedata['success'] ='<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Estimate Created successfully!</b></div>';
				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/purchase/create_new_estimate',$estimatedata);
				$this->load->view('inventory/general/footer');
				$this->session->set_flashdata('create_estimate','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Estimate Created successfully</b></div>');
		      	redirect('inventory/purchase/estimatelist'); 
	   	   }
		   catch(Exception $e)
		   {
			 echo $e->getMessage();
		   }
	 }
   }	

   	/*
	*	fetch estimate details
	*	---------------------
	*	input: estimate id , action
	*	
	*	
	*/
	public function estimateDetails($estimateid = null, $action = null )
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		if($estimateid != null && $action != null)
		{
			try{
				$data['estimationlist'] = $this->em->getRepository('models\inventory\NewEstimation')->find($estimateid);
				$data['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$estimateid));
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				
				$data['title'] = "View Estimate";			
				$data['form_action'] = 'inventory/purchase/updateestimate';
				
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuInventory();
				$data['tablehead'] = array('Product Id','Product Name','Quantity','Status');
				
				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 2:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/purchase/'.$action, $data);
				$this->load->view('inventory/general/footer');

			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		else
		{
			#error message
			show_error('Your not supposed to view this page! Bye');
		}
		
	} 

   /*
    *	Edit estimate
	*	---------------------
	*	Post Input data From form And Set Status (2)-(i.e In-progress)
	*	
	*
   */
	public function updateestimate()
	{
		$this->navigator->mustBeAdminOrSAdmin();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$estimatedata['form_action'] = "inventory/purchase/updateestimate";
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
       	
		  $config = array(
	 		array(
                     'field'   => 'product_ids',
                     'label'   => 'Product',
                     'rules'   => 'required_2'
                  ),	
			array(
                     'field'   => 'quantities',
                     'label'   => 'Quantity',
                     'rules'   => 'required'
                  ),
			array(
                     'field'   => 'dimensions',
                     'label'   => 'Dimension',
                     'rules'   => 'required'
                  )				  
               );
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required_2', 'Please add atleast one %s to generate an estimate');

		/*
		*	set fields here, that to be re-populating the form
		*/
		$fields = array('email','address','name');
		foreach ($fields as $field) {
			$this->form_validation->set_rules($field);
		}
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		
		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('inventory/general/header', $header);
			$this->load->view($menu);
			$this->load->view('inventory/purchase/edit_estimate',$estimatedata);
			$this->load->view('inventory/general/footer');
		}
		else
		{  
		    $this->em->getConnection()->beginTransaction();
			try { 
					$supplier_id = $this->input->post('supplier_id');
					$supplier_name = $this->input->post('supplier_name');
					$supplier_email = $this->input->post('email');
					//$product_plu = $this->input->post('product_plu');
					$sku = $this->input->post('product_sku');
					$temp_p_id = $this->input->post('temp_p_id');  
				    $product_ids = $this->input->post('product_ids');  
					$productname = $this->input->post('product_names');
					$designShade = $this->input->post('designShade');
					$description = $this->input->post('descriptions');
					$quantity = $this->input->post('quantities');
					$estimate_name = $this->input->post('estimate_name');
					$estimate_id = $this->input->post('estimate_id');
					$dimension = $this->input->post('dimensions');
					$updated_date = new\DateTime("now");
					$emaildata['user_name'] = $header['user_data']['firstName'].'  '.$header['user_data']['lastName'];
					$emaildata['estimate_id'] = $estimate_id;
                    $emaildata['supplierdata'] = array('supplier_name'=>$supplier_name,'email'=>$supplier_email);
                    $emaildata['productdata'] = array('sku'=>$sku,'productname'=>$productname,'description'=>$description,'quantity'=>$quantity,'dimension'=>$dimension,'design'=>$designShade);
					$estimatedata['estimationlist'] = $estimate = $this->em->getRepository('models\inventory\NewEstimation')->find($estimate_id);
					$estimate->setEstimateName($estimate_name);
					$estimate->setFlag(0);
					$estimate->setLastUpdatedDate($updated_date->getTimestamp());
					$estimate->setStatus(2);
					$estimate->setEstimateNoProduct(count($product_ids));
					$updator = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
					$estimate->setLastUpdatedBy($updator);
					$supplier = $this->em->getRepository('models\inventory\Suppliers')->find($supplier_id);
					$estimate->setSupplier($supplier);
					$this->em->persist($estimate);
					$this->em->flush();

                      	for ($i=0; $i < count($product_ids); $i++) 
                      	{

			           	    /*distinguish new product vs existing product*/
		           	    	if(strlen($temp_p_id[$i]) < 1 )
		           	    	{
		                        //new product
		                        $product_ids[$i] = null;
		                        $Ifref = 0;

		                        $created_date = new\DateTime("now");
								$estimate_product = new models\inventory\EstimatedProduct;
								$estimate_product->setProductName($productname[$i]);
								$estimate_product->setQuantity($quantity[$i]);
								$estimate_product->setDescription($description[$i]);
								$estimate_product->setDimensions($dimension[$i]);
								$estimate_product->setDesignName($designShade[$i]);
								$estimate_product->setOrderProduct(1);
								$estimate_product->setCreatedDate($created_date);
								$estimate_product->setIfref($Ifref);
								$estimate_product->setProductSku($product_ids[$i]);
							    	$estimate = $this->em->getRepository('models\inventory\NewEstimation')->find($estimate_id);
									$estimate_product->setNewEstimationEstimate($estimate);
								$User = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
							    $estimate_product->setCreatedBy($User);
							    $estimate_product->setDeliveryStatus(0);
							    $estimate_product->setProductSku('N/A');
							    
								$this->em->persist($estimate_product);
					            $this->em->flush(); 

		                    }
		                    else
		                    {
		                    	//existing product
		                    	$Ifref = 1;

		                    	$estimatedata['estimated_product'] = $estim_product = $this->em->getRepository('models\inventory\EstimatedProduct')->find($temp_p_id[$i]);
								$estim_product->setProductName($productname[$i]);
								$estim_product->setQuantity($quantity[$i]);
								$estim_product->setDesignName($designShade[$i]);
								$estim_product->setDescription($description[$i]);
								$estim_product->setDimensions($dimension[$i]);
								$estim_product->setOrderProduct(1);
								$estim_product->setIfref($Ifref);
								$estim_product->setProductSku($product_ids[$i]);
								$this->em->persist($estim_product);
					            $this->em->flush();
		                    	
		                    }
		                     $this->load->helper(array('dompdf', 'file'));
		                    $html =  $this->load->view('inventory/email_template/estimate_template',$emaildata,TRUE);
		                     $estimate_name = $estimate_id."_".date('Y_m_d').".pdf";
			 	    		$data = pdf_create($html, $estimate_name,false);

							if(!write_file("assets_inv/estimations/".$estimate_name, $data))
							{
							     echo 'Unable to write the file';
							}

							$msg = "Supplier estimate";
                            $subject = "Updated Estimate";
							$attachment = "assets_inv/estimations/".$estimate_name;
							$attachments = array($attachment);
		                     $this->email($supplier_email,$msg,$attachments,$subject);
			           	    /*---------------*/
					
                    //$estproducts = $this->em->getRepository('models\inventory\EstimatedProduct')->findByestimate($estimate_id);
                    					
						}

				$this->em->getConnection()->commit();
				$estimatedata['success'] =' <div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Estimate Updated successfully!</b>
									</div> ';

				 $this->load->view('inventory/general/header', $header);
				 $this->load->view($menu);
				 $this->load->view('inventory/purchase/edit_estimate',$estimatedata);
				 $this->load->view('inventory/general/footer');
				//$this->estimateDetails(1,"edit_estimate");
	   	   }
		   catch(Exception $e)
		   {
			 echo $e->getMessage();
		   }
	 	}
	}


   public function addtoestimate($id)
	{
	    
		$data['form_action'] = "inventory/purchase/create_new_estimate";
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
        $products = $this->em->getRepository('models\inventory\products')->findBy(array('productGenId'=>$id));

        $est_products = array();

		foreach ($products as $product) 
		{
			$p_id 	= $product->getProductGenId();
	        
	        $p_name = $product->getSuppplierProductName();

	        $plu 	= $product->getProductIdPlu();
	        $supplierId = $product->getSuppliersSupplier()->getSupplierId();
	        $design = $product->getSupplierDesignName();
	        $shade  = $product->getSupplierShadeName();
	        $desc 	= $product->getDescription();
	        $quan 	= $product->getQuantity();
	        
	        $width 	= $product->getWidth();
	        $length = $product->getLength();
	        $height = $product->getHeight();
	        $dimension = array();

	        if($width != 0)
	            $dimension[] = " ".$width."W ";

	        if($length != 0)
	            $dimension[] = " ".$length."L ";

	        if($height != 0)
	            $dimension[] = " ".$height."H ";

	        $dimensions = implode('x', $dimension);

	        isset($dimensions) ? $dimensions = $dimensions : $dimensions = $dimensions." ".$product->getDimenUnit();

	        
	        $est_product_details = array( 'p_id' => $p_id,
	        							  'supplierId' => $supplierId,
	        							  'p_name' => $p_name,
	        							  'desc'  => $desc,
	        							  'design' => $design,
	        							  'shade' => $shade,
	        							  'dimensions' => $dimensions,
	        							  'quan' => $quan
	        							 );

	        array_push( $est_products, $est_product_details );
		}

		$data['products'] = $est_products;		        


		$this->load->view('inventory/general/header', $header);
		$this->load->view($menu);
		$this->load->view('inventory/purchase/productestimate',$data);
		$this->load->view('inventory/general/footer');
	
	}


   /*
    *	List Order History
	*	---------------------
	*	(Delivered and cancelled order)
	*   deliveryStatus(0-cancelled,1-delivered)
	*	
    */
	 
    public function orderhistory()
	 {
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$action['order'] = $this->em->getRepository('models\inventory\NewOrder')->findBydeliveryStatus(array(0,1));
		//var_dump($action['order']);exit;
		foreach($action['order'] as $ord)
			{
				$id = $ord->getEstimate()->getEstimateId();
				$estimate_data = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' =>$id));
			    $action['supplier_name'] = $estimate_data[0]->getSupplier()->getSupplierName();
               $action['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' => $id));
			}
		$action['tablehead'] = array('Order Id','Order Name','Order Date','Status','Action'); 
		$this->load->view('inventory/general/header',$header);
	   	$this->load->view($menu);
		$this->load->view('inventory/purchase/orderhistory',$action);
	    $this->load->view('inventory/general/footer');
	 }

    /*
    *	List Order List
	*	---------------------
	*	deliveryStatus(2 - In-progress)
	*  
	*	
    */
	 
  	public function orderlist()
	{

	$header['user_data']=$this->ion_auth->GetHeaderDetails();
	$user['data']=$this->em->getRepository('models\inventory\NewOrder')->findBy(array("deliveryStatus" =>2));
				if(!empty($user['data']))
					{
					foreach($user['data'] as $datum)
						{
						$id = $datum->getEstimate()->getEstimateId();
						$estimate_data = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' =>$id));
						$user['supplier_name'] = $estimate_data[0]->getSupplier()->getSupplierName();
						}
					}
					else
					{
						$estimate[0] = "No tax group available";
					}
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		switch($group)
		{
		case 1:
			$user['tablehead'] = array('Order ID','Order Name','Supplier Name','Order Date','Status','Action'); 
			$user['visiblity'] = 1;
			break;
		case 2:
			$user['tablehead'] = array('Order ID','Order Name','Supplier Name','Order Date','Status','Action'); 
			$user['visiblity'] = 2;
			break;
			}
		$this->load->view('inventory/general/header',$header);
		$this->load->view($menu);
		$this->load->view('inventory/purchase/orderlist',$user);
		$this->load->view('inventory/general/footer');
	}	
		
      

   /*
    *	List Order Confirmation 
	*	---------------------
	*	New order - setDeliveryStatus(2) - if ordered products are not    delivered
	*	setDeliveryStatus(1) - if ordered products are delivered
	*  
	*	
    */

	public function orderconfirmation($estimateid)
		{
		$data['form_action'] = "inventory/purchase/orderconfirmation/".$estimateid;
		$config = array(
			     array(
						 'field'   => 'product',
						 'label'   => 'Product Name ',
						 'rules'   => 'required'
					  ),
					array(
						 'field'   => 'status',
						 'label'   => 'Status',
						 'rules'   => 'required'
					  ),
				   array(
						 'field'   => 'deliveredquantity',
						 'label'   => 'Delivery Quantity',
						 'rules'   => 'required'
					  ),
				  		 				  
				   );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
        
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$product_data= $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array("newEstimationEstimate" =>$estimateid,'deliveryStatus' => 0));
	
		$product = array(''=>"Select product");

			if(!empty($product_data))
			{
				foreach($product_data as $pro)
				{
					$id = $pro->getTempProductId();
					$value = $pro->getProductName();
					$product[$id] = $value;			
				}
				
			}
			else
			{
				$product[0] = "No Product available";
			}
			
			$data['product'] = $product;
			$data['orderid'] = $estimateid;
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/purchase/orderconfirmation',$data);
				$this->load->view('inventory/general/footer');
			}
			else
			{
				 $productid = $this->input->post('product');
				 $deliveredstatus = $this->input->post('status');
				 $deliveredquantity = $this->input->post('deliveredquantity');
				 $damagedquantity = $this->input->post('damagedquantity');
				 $comments = $this->input->post('comments');
				try {
					$header['user_data']=$this->ion_auth->GetHeaderDetails();
					$user = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
     				$estimate = $this->em->getRepository('models\inventory\EstimatedProduct')->find($productid);
     				var_dump($estimate);
     				exit();
				    $estimate->setDeliveryStatus($deliveredstatus);
					$estimate->setDeliveryQuality($deliveredquantity);
					$estimate->setDamagedQuality($damagedquantity);
					$estimate->setDeliveryComments($comments);
					$estimate->setLastUpdatedBy($user);
					$this->em->persist($estimate);
					$this->em->flush();
                    
                    /* check if all product in estimate_product table is completed then change status in new order as delivered else inprogress*/
   					  $estimated_products = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$estimateid,'deliveryStatus'=> 0));
                     
                      $neworders = $this->em->getRepository('models\inventory\NewOrder')->findByEstimate($estimateid);
                      foreach($neworders as $neworder)
                       {
                       $orderid = $neworder->getOrderId();
                       $ordername = $neworder->getOrderName();
                       $created_date = $neworder->getCreatedDate();
                       $new_date = date('d-m-Y', $created_date);
                       }

           
                        $data['neworder'] = $neworder = $this->em->getRepository('models\inventory\NewOrder')->find($orderid);
					    $update_date = new\DateTime("now");
					    $neworder->setLastUpdatedDate($update_date->getTimestamp());

                    	if( count($estimated_products) == 0)
                    	{  
							$neworder->setDeliveryStatus(1);
							$this->load->helper(array('dompdf', 'file'));
		     	       		$OrderName = $ordername."_".$new_date.".pdf";
		     	       		$file = file_get_contents("assets_inv/estimations/".$OrderName);
		     	       		
							$orderedattachment = "assets_inv/estimations/".$OrderName;

							/*email -order confirmation template and create order template to super admin*/
							$orderdata['user_name'] = $header['user_data']['firstName'].'  '.$header['user_data']['lastName'];
							$orderdata['orderid'] = $orderid;
							$orderdata['orderconfirm']= $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$estimateid,'deliveryStatus'=> 1));
							$confirmOrder_name = "DR_".$orderid."_".date('Y_m_d').".pdf";
						    $html =  $this->load->view('inventory/email_template/order_confirm_template',$orderdata,TRUE);
		                	$pdfdata = pdf_create($html, $confirmOrder_name,false);

							if(!write_file("assets_inv/orders/delivery_reports/".$confirmOrder_name, $pdfdata))
							{
							     echo 'Unable to write the file';
							}

							$msg = "confirm order";
                            $subject = "Confirm Order";
							$confirmattachment = "assets_inv/orders/delivery_reports/".$confirmOrder_name;
							$user = $this->ion_auth_model->user(1)->row();
							$user->email;
						    $attachments = array($orderedattachment,$confirmattachment);
						    $this->email($user->email,$msg,$attachments,$subject);
		     				
                    	}
                       	else
                       	{     
							$neworder->setDeliveryStatus(1);
                       	}

                        $this->em->persist($neworder);  
						$this->em->flush();

					
					$data['success'] ='<div class="alert alert-success alert-dismissable">
										 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 Confirm successfuly!
									 	</div>';

					$this->load->view('inventory/general/header', $header);
					$this->load->view($menu);
					$this->load->view('inventory/purchase/orderconfirmation',$data);
					$this->load->view('inventory/general/footer');
				}
				catch(Exception $e) {
				   echo $e->getMessage();
					}
				}		
		}

   /*
    *	View Order
	*	---------------------
	*   Input : Order Id
    *   Output : ordered Product details
	*	
    */
   
	public function vieworder($id)
	{
	$action['tablehead'] = array('Product Id','Product Name','Quantity','Status');
    $action['title'] = "View Order ";	
	$header['user_data']=$this->ion_auth->GetHeaderDetails();
	$group = $this->ion_auth->GetUserGroupId();
	$menu = $this->navigator->getMenuInventory();
	$action['order'] = $this->em->getRepository('models\inventory\NewOrder')->findByorderId(array("orderId" => $id));
		foreach($action['order'] as $ord)
			{
			$id = $ord->getEstimate()->getEstimateId();
			$action['supplier_name'] = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' => $id));
			$action['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$id));
			}
	$this->load->view('inventory/general/header',$header);
	$this->load->view($menu);
	$this->load->view('inventory/purchase/vieworder',$action);
	$this->load->view('inventory/general/footer');
	}



    /*
    *	View Order history
	*	---------------------
	*   Input : Order Id
    *   Output : ordered Product details
	*	
    */
	public function vieworderhistory($id)
		{
		$action['tablehead'] = array('Product Id','Product Name','Quantity','Status');
	    $action['title'] = "View Order ";	
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$action['order'] = $this->em->getRepository('models\inventory\NewOrder')->findByorderId(array("orderId" => $id));
			foreach($action['order'] as $ord)
				{
				$id = $ord->getEstimate()->getEstimateId();
				$action['supplier_name'] = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' => $id));
				$action['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$id));
				}
		$this->load->view('inventory/general/header',$header);
		$this->load->view($menu);
		$this->load->view('inventory/purchase/vieworderhistory',$action);
		$this->load->view('inventory/general/footer');
		}



   /*
    *	order cancel 
	*	---------------------
	*   Input : Order Id
    *   Output : setDeliveryStatus(0-cancelled)
	*	
    */

	public function ordercancel($id)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$data['order'] = $order = $this->em->getRepository('models\inventory\NewOrder')->find($id);
		$order->setDeliveryStatus(0);
		$this->em->persist($order);
		$this->em->flush();
		$this->session->set_flashdata('cancelorder','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Order cancelled</b></div>');
		redirect('inventory/purchase/orderlist'); 
	}
	
   /*
    *	Estimate list 
	*	---------------------
	*   Input : Order Id
    *   Output : List all estimated list
	*	
    */

	public function estimatelist()
	{
	$header['user_data']=$this->ion_auth->GetHeaderDetails();
	$group = $this->ion_auth->GetUserGroupId();
	$menu = $this->navigator->getMenuInventory();
	switch($group)
		{

		case 1:
			$user['tablehead'] = array('Estimated ID','Estimated Name','Supplier Name','Status','Estimated Date','Action'); 
			$user['data'] = $this->em->getRepository('models\inventory\NewEstimation')->findAll();
			$user['visiblity'] = 1;
			break;
		case 2:
			$user['tablehead'] = array('Estimated ID','Estimated Name','Supplier Name','Status','Estimated Date','Action');  
			$user['data'] = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('status' => 2));
			$user['visiblity'] = 2;
			break;
			}
		$this->load->view('inventory/general/header',$header);
		$this->load->view($menu);
		$this->load->view('inventory/purchase/view_estimatelist',$user);
		$this->load->view('inventory/general/footer');
	}	

   /*
    *	View Estimate
	*	---------------------
	*   
    *   Output : View details of estimate id
	*	
    */
   public function viewestimate($id)
	{
		$action['tablehead'] = array('SKU','Product Name','Description','Design/Shade','Dimensions','Quantity');
	    $action['title'] = "View Estimate ";	
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$action['estimation_list'] = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' => $id));
	    $action['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$id));	
		$this->load->view('inventory/general/header',$header);
		$this->load->view($menu);
		$this->load->view('inventory/purchase/viewestimate',$action);
		$this->load->view('inventory/general/footer'); 
	}	

   /*
    *	Delete Estimate
	*	---------------------
	*   
    *   Output : setStatus(0-Deleted) in NewEstimation table
	*	
    */

 	public function deleteestimate($id)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
	    $data['estimated'] = $estimated = $this->em->getRepository('models\inventory\NewEstimation')->find($id);
		$estimated->setStatus(0);
		$this->em->persist($estimated);
		$this->em->flush();
		$this->session->set_flashdata('deleteestimate','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Estimate cancelled</b></div>');
		redirect('inventory/purchase/estimatelist'); 
	}

	/* create_order */
	public function newestimateorder($id) 
	{   
	        $this->load->library('form_validation');
			$config = array(
				     array(
							 'field'   => 'order_name',
							 'label'   => 'Order Name ',
							 'rules'   => 'required'
						  ),
						array(
							 'field'   => 'SupplierName',
							 'label'   => 'Supplier Name',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'supplieremail',
							 'label'   => 'Supplier Email',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'address',
							 'label'   => 'Address',
							 'rules'   => 'required'
						  ), 
									  
					   );

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
            $action['title'] = "New Order";
		    $action['form_action'] = "inventory/purchase/addestimateorder/".$id;	
			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$group = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuInventory();
			$action['tablehead'] = array('SKU','Product Name','Decription','Design/Shade','Dimensions','Quantity');
		   $action['estimation_list'] = $this->em->getRepository('models\inventory\NewEstimation')->findBy(array('estimateId' => $id));
	       $action['estimated_product'] = $this->em->getRepository('models\inventory\EstimatedProduct')->findBy(array('newEstimationEstimate' =>$id,'orderProduct'=>1));	
       	if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('inventory/general/header',$header);
			$this->load->view($menu);
			$this->load->view('inventory/purchase/newestimateorder',$action);
			$this->load->view('inventory/general/footer'); 
		}
		else
		{  
			$this->load->view('inventory/general/header',$header);
			$this->load->view($menu);
			$this->load->view('inventory/purchase/newestimateorder',$action);
			$this->load->view('inventory/general/footer'); 
		}
  } 
	

   /*
    *	delete order product
	*	---------------------
	*   
    *  delete estimated product in created order 
	*  Input :Tempid - EstimatedProduct
	*  output : setOrderProduct(0)-delete product that was estimated
    */

 	public function deleteorderproduct($id)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
	    $estimated = $this->em->getRepository('models\inventory\EstimatedProduct')->find($id);
		$estimate_id = $estimated->getEstimate()->getEstimateId();
		$estimated->setOrderProduct(0);
		$this->em->persist($estimated);
		$this->em->flush();
		redirect('inventory/purchase/newestimateorder/'.$estimate_id); 
	}

   /*
    *	New Order
	*	---------------------
	*   
    *  input : estimateid
	*  output : setStatus(1-ordered) in NewEstimation
	*  setDeliveryStatus(2-In-progress) in NewOrder
    */


  public function addestimateorder($estimateid)
		{
		
		$header=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$OrderName =  $this->input->post('order_name');
		$SupplierName = $this->input->post('SupplierName');
		$supplieremail = $this->input->post('supplieremail');
		$supplierTelephone = $this->input->post('supplierTelephone');
		$sku = $this->input->post('product_sku');
		$product_ids = $this->input->post('product_ids');  
		$productname = $this->input->post('product_names');
		$description = $this->input->post('descriptions');
		$quantity = $this->input->post('quantities');
		$designShade = $this->input->post('designShade');
		$estimate_name = $this->input->post('estimate_name');
		$estimate_id = $this->input->post('estimate_id');
		$dimension = $this->input->post('dimensions');
		$desgin = NULL;
		$dimension = $this->input->post('dimensions');
		$emaildata['user_name'] = $header['user_data']['firstName'].'  '.$header['user_data']['lastName'];
		$emaildata['estimate_id'] = $estimate_id;
		$emaildata['supplierdata'] = array('supplier_name'=>$SupplierName,'email'=>$supplieremail);
        $emaildata['productdata'] = array('sku'=>$sku,'productname'=>$productname,'description'=>$description,'quantity'=>$quantity,'dimension'=>$dimension,'design'=>$designShade);
			
			try {
			    $estimate = $this->em->getRepository('models\inventory\NewEstimation')->find($estimateid);
			    $estimate->setStatus(1);
			    $this->em->persist($estimate);
				$this->em->flush();
              
				$user = $this->em->getRepository('models\inventory\Users')->find($header['id']);
				$order = new models\inventory\NewOrder;
				$order->setOrderName($OrderName);
				$order->setEstimate($estimate);
				$order->setDeliveryStatus(2);
				$order->setCreatedBy($user);

				$create_date = new \DateTime("now");
				$order->setCreatedDate($create_date->getTimestamp());

				$this->em->persist($order);
				$this->em->flush();
				$order_id = $order->getOrderId();
				$emaildata['order_id'] = $order_id;
				$this->load->helper(array('dompdf', 'file'));
 	            $html = $this->load->view('inventory/email_template/order_template', $emaildata, true);

 	    		$OrderName = $order_id."_".date('Y_m_d').".pdf";
 	    		$data = pdf_create($html, $OrderName,false);

				if(!write_file("assets_inv/orders/".$OrderName, $data))
				{
				     echo 'Unable to write the file';
				}

				$msg = "Ordered Product";
                $subject = "Ordered Product";
				$attachment = "assets_inv/orders/".$OrderName;
				$attachments = array($attachment);
 				$this->email($supplieremail,$msg,$attachments,$subject);
				$this->session->set_flashdata('ordersend','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Order has been sent successfully!</b></div>');
              	redirect('inventory/purchase/estimatelist'); 
			}
			catch(Exception $e) 
			{
			   echo $e->getMessage();
			}

       	}
    /*
    *	Email
	*	---------------------
	*   
    *  input : to , message ,attachment ,subject
	*  
    */   
    
   public function email($to,$message,$attachments,$subject)
   {
	     $config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'kirubadebo89@gmail.com',
		    'smtp_pass' => 'glory11589',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
	    $this->email->from('admin@inventory.com','admin');
	    $this->email->to($to,'supplier');
		$this->email->subject($subject);
		foreach ($attachments as $attachment) {
			$this->email->attach($attachment);
		}
		$this->email->message($message);
		$this->email->send();  
    }

 }

/* End of file purchase.php */
/* Location: ./application/controllers/purchase.php */
