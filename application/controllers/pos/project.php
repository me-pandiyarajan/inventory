<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

	/**
	 * 
	 *  Supplier management controller.
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
		
		$this->navigator->checkLogin();
		$this->navigator->posUserOnly();
	}


	/* ADD PROJECT */
	public function projectadd()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');
        
		 $data['form_action'] = 'pos/Project/projectadd';

		$config = array(
               array(
                     'field'   => 'projectname',
                     'label'   => 'Projectname',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'description',
                     'label'   => 'Description',
                     'rules'   => 'required'
                  )            
            );

		$this->form_validation->set_rules($config);
		
		/*	*	set fields here, that to be re-populating the form
		*/
		 $fields = array('street','city','zip','state');
		foreach ($fields as $field) {
			    $this->form_validation->set_rules($field);
		} 
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
        $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		if ($this->form_validation->run() === FALSE)
		{
			    $this->load->view('pos/header/header', $header);
				$this->load->view('pos/menu/menu');
				$this->load->view('pos/project/projectadd',$data);
				$this->load->view('pos/footer/footer');
		}
		else
		{		
			$customerid = $this->input->post('customer_id');
			//var_dump($customerid);exit;
			$customername = $this->input->post('customername');
			$projectname = $this->input->post('projectname');
			$description = $this->input->post('description');
			$status = $this->input->post('status');
		    $advanceamount = $this->input->post('advanceamount');
			//var_dump($advanceamount);exit;
			try {
			
				$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
			    $invoices = new models\pos\PosInvoices;
				$customer = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
				$invoices->setPosCustomerCustomer($customer);
				$invoices->setTransacMode(1);
				$invoices->setTenderedby(1);
				$invoices->setCreatedBy($user);
				$created_date = new\DateTime("now");
				$invoices->setCreatedDate($created_date->getTimestamp());
				$invoices->setStatus(2);
				$invoices->setPaymentStatus(2);
				$this->em->persist($invoices);
				$this->em->flush();
				$invoices_id = $invoices->getInvoiceid();

                $project = new models\pos\PosProjects;
				$invoices_id_project = $this->em->getRepository('models\pos\PosInvoices')->find($invoices_id);
				$project->setPosInvoicesInvoiceid($invoices_id_project);
				$project->setProjectName($projectname);
				$project->setProjectDescription($description);
				$project->setStatus(2);
				$created_date = new\DateTime("now");
				$project->setCreatedDate($created_date->getTimestamp());
				$project->setCreatedBy($user);
				$this->em->persist($project);
				$this->em->flush();

				$advance = new models\pos\PosAdvance;
				$invoices_id_project = $this->em->getRepository('models\pos\PosInvoices')->find($invoices_id);
				$advance->setPosInvoicesInvoiceid($invoices_id_project);
				$advance->setAmount($advanceamount);
				$created_date = new\DateTime("now");
				$advance->setCreatedDate($created_date->getTimestamp());
				$advance->setCreatedBy($user);
				$this->em->persist($advance);
				$this->em->flush();

				$this->session->set_flashdata('projectadd','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Project added successfuly!</b></div>'); 
             	redirect('pos/project/projectlist');
				$this->load->view('pos/header/header', $header);
				$this->load->view('pos/menu/menu');
				$this->load->view('pos/project/projectadd',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
			echo $e->getMessage();
			}
		}		
	}
	
	/*listproject*/

	public function projectlist()
		{

		try {   
		       
				$data['projects'] = $this->em->getRepository('models\pos\PosProjects')->findAll();
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				$data['tablehead'] = array('Project ID','Project Name','Received Amount','Status','Action');

				switch ($group) {
					case 13:
						$data['visiblity'] = 1;
						break;
					case 12:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/project/projectlist',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}
	

	public function ProjectDetails($projectId = null, $action = null )
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		if($projectId != null && $action != null)
		{
			try{

				
			  
				$data['project'] =  $Projects = $this->em->getRepository('models\pos\PosProjects')->find($projectId);
				$invoice_id = $Projects->getPosInvoicesInvoiceid();
                $data['customer'] = $customer = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoice_id));
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$data['form_action'] = 'pos/project/updateproject';

				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				switch ($group) {
					case 13:
						$data['visiblity'] = 1;
						break;
					case 12:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/project/'.$action,$data);
				$this->load->view('pos/footer/footer');

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
	 *	Update project
	 */
	public function updateproject()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$config = array(
               array(
                     'field'   => 'project_name',
                     'label'   => 'project name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'project_description',
                     'label'   => 'project description',
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'status',
                     'label'   => 'status',
                     'rules'   => 'required'
                  )
            );
			$this->form_validation->set_rules($config);
			/*
			*	set fields here, that to be re-populating the form
			*/
			$fields = array('street','city','zip','state');
			foreach ($fields as $field) {
				$this->form_validation->set_rules($field);
			}
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
            $header['user_data'] = $this->ion_auth->GetHeaderDetails();
			$group_id = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuPos();

			if ($this->form_validation->run() === FALSE)
			{
				show_error('Your not supposed to view this page! Bye');
			}
			else
			{  
			    $project_name = $this->input->post('project_name');
				$project_description = $this->input->post('project_description');
				$status = $this->input->post('status');
				$projectid = $this->input->post('project_id');
				try {
               		$data['Projects'] = $Projects = $this->em->getRepository('models\pos\PosProjects')->find($projectid);
					$Projects->setProjectname($project_name);
					$Projects->setProjectdescription($project_description);
					$Projects->setStatus($status);
					$this->em->persist($Projects);
					$this->em->flush();
                 	$this->session->set_flashdata('projectedit','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Project detail updated successfuly!</b></div>');
					redirect('pos/project/projectlist');
					

				}
				catch(Exception $e)
				{
					echo $e->getMessage();
					log_message('error',$e->getMessage());
				}
			
			}			
	
	}	
	
	public function viewproject($projectid, $ajax = FALSE)
	{
	  try { 
		   
		
			/* get project id */
			$project = $this->em->getRepository('models\pos\PosProjects')->findByProjectid($projectid);
		   
			/* get invoice id */
			$invoice_id = $project[0]->getPosInvoicesInvoiceid();	
			$advances = $this->em->getRepository('models\pos\PosAdvance')->createQueryBuilder('d')
										    ->addselect('SUM(d.amount)')
										    ->where('d.posInvoicesInvoiceid = :id')
											->setParameter('id', $invoice_id)
										    ->getQuery()
										    ->getResult();	
					//	var_dump($advances);exit;					
							
	        $data['advances'] = $advances[0][1];
			/* get product of $invoice_id in pos_product_sales */
			$data['products_sold'] = $products_pps = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoice_id));
			

				if(count($products_pps) > 0){

					$data['customer_details'] = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoice_id));	
		
					foreach($products_pps as $sales)
					{
						/* sold products */
						$product_id_pps[$sales->getProductsalesid()] = $sales->getProductsProductGen()->getProductGenId();			
					}
				}
				else
				{
					$product_id_pps = array();
					$data['customer_details'] = array();
				}
			
				/* get estimate id*/
				$projectid_estimate = $this->em->getRepository('models\pos\PosEstimates')->findByposProjectsProjectid($projectid);
				$product_id_est = array();
				$data['products_unsold'] = array();
				$unsold = array();

				if(count($projectid_estimate) > 0)
				{
					
					/*estimated id*/
					$estimated_id = $projectid_estimate[0]->getEstimateid();

					/* get product of $estimated_id in PosEstimateProducts */
					$products_est = $this->em->getRepository('models\pos\PosEstimateProducts')->findBy(array('posEstimatesEstimateid' => $estimated_id));

					foreach($products_est as $est)
					{
						/* estimated products */
						$product_id_est[$est->getEstimatedetailsid()] = $est->getProductsProductGen()->getProductGenId();			
					}

					$unsold = array_diff($product_id_est,$product_id_pps);

					foreach($products_est as $est_product)
					{
						$estid = $est_product->getProductsProductGen()->getProductGenId();
						if(in_array($estid,$unsold)){
							$data['products_unsold'][] = $est_product;
						}
					}

				}

			
				if($ajax === FALSE) 
				{
					$header['user_data'] = $this->ion_auth->GetHeaderDetails();
					$menu = $this->navigator->getMenuPos();
					$this->load->view('pos/header/header', $header);
					$this->load->view($menu);
					$this->load->view('pos/project/viewprojectlist',$data);
					$this->load->view('pos/footer/footer');
				}
				else
				{
					return array($data['products_sold'],$data['products_unsold']);
				}
			
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}      
	}


	/*
	*	AjaxCall: get project Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxProjectsLookup($project)
	{
		$projects_list = array(); 
		try {
			$projects = $this->em->getRepository('models\pos\PosProjects')->createQueryBuilder('p')
												->Where('p.projectName LIKE :name')
												->setParameter('name', '%'.$project.'%')
												->getQuery()
   												->getResult();

				foreach ($projects as $proj) {
					$projects_list[] = array(
											 'id' => $proj->getProjectid(),
											 'value' => $proj->getProjectName() 
											 );
				}				
				echo json_encode($projects_list);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get project Details  
	*	---------------------
	*	input : id
	*
	*/
	
	public function ajaxProjectDetails($projectid){

		try {
				
				list($sold_products,$unsold_products) = $this->viewproject($projectid, TRUE);

			    $sold_list = array(); 
			    $unsold_list = array(); 
			    $customer_data = array();

				if (!empty($sold_products)) 
				{
					foreach($sold_products as $sold)
					{ 		
					$plu = $sold->getProductsProductGen()->getProductIdPlu(); 
					$name = $sold->getProductsProductGen()->getProductName(); 
					$unit = $sold->getProductsProductGen()->getUnit();
					$description = $sold->getProductsProductGen()->getDescription(); 
					$quantity = $sold->getQuantity(); 
					$price = $sold->getUnitPrice(); 
					$discount = $sold->getDiscount(); 
					$tax = $sold->getTax(); 
					$total = $sold->getAmount();

					$base_amount = $quantity * $price;
					$discount_price = ($base_amount * ($discount/100)); 

					$sold_detail = array(
									"Plu"=>$plu,
									"ProductName"=>$name,
									"Description" => $description,
									"Quantity"=>$quantity,
									"Unit"=> $unit,
									"Price"=> number_format($price,2),
									"Amount"=>number_format($base_amount,2),
									"Discount"=> number_format($discount_price, 2),
									"Tax"=> $tax,
									"Total"=>number_format($total,2)
									); 
					array_push($sold_list,$sold_detail); 
					}
				} else {
					$sold_list = array();
				}


				if (!empty($unsold_products)) 
				{
				
					foreach($unsold_products as $unsold)
					{			
						$genid = $unsold->getProductsProductGen()->getProductGenId();
						$product  = $this->em->getRepository('models\inventory\Products')->findByproductGenId($genid);
		
						if($product[0]->getPosTaxTaxClass() != NULL)
						{
							$tax = $product[0]->getPosTaxTaxClass()->getTaxPercent();
						}
						else
						{
							$tax = 0;
						}

						$plu = $unsold->getProductsProductGen()->getProductIdPlu(); 
						$name = $unsold->getProductsProductGen()->getProductName(); 
						$unit = $unsold->getProductsProductGen()->getUnit(); 
						$description = $unsold->getProductsProductGen()->getDescription(); 

						$quantity = $unsold->getQuantity();
						$available_quantity = $unsold->getProductsProductGen()->getQuantity();
						$safety_stock_level = $unsold->getProductsProductGen()->getSafetyStockLevel();

						$price = $unsold->getProductsProductGen()->getPrice(); 
						$total = $unsold->getAmount();

						$base_amount = $quantity * $price;

						$unsold_detail = array(
						 	                    "ProductId"=>$genid,
						 						"Plu"=>$plu,
						 						"ProductName"=>$name,
						 						"Description" => $description,
						 						"Quantity"=>$quantity,
						 						"availableQuantity"=> $available_quantity,
						 						"SafetyStockLevel" => $safety_stock_level,
						 						"Unit"=> $unit,
						 						"Price"=> number_format($price, 2),
						 						"Amount"=> number_format($base_amount, 2),
						 						"Discount"=> "0.00",
										        "Tax"=> $tax,
						 						"Total"=> number_format($total, 2)
						 						); 
						array_push($unsold_list,$unsold_detail);	
					}

				} else {
					$unsold_list = array();
				}


				/*get customer details*/

				//get invoice
                $project = $this->em->getRepository('models\pos\PosProjects')->findByProjectid($projectid);
             	$invoice_id = $project[0]->getPosInvoicesInvoiceid()->getInvoiceid();

				//get customer id
		        $invoice = $this->em->getRepository('models\pos\PosInvoices')->findByInvoiceid($invoice_id);
                $customerid = $invoice[0]->getPosCustomerCustomer()->getCustomerId();
                
                //get customer 
				$customers = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
				$customer_detail['customer_id'] = $customerid;
				$customer_detail['customer_name'] = $customers->getCustomername();
				$customer_detail['customer_phone'] = $customers->getMobileNumber();
				$customer_detail['customer_email'] = $customers->getEmail();
					
				$customer_detail['customer_address']['street'] = $customers->getStreet();
				$customer_detail['customer_address']['city'] = $customers->getCity();
				$customer_detail['customer_address']['state'] = $customers->getState();
				$customer_detail['customer_address']['zipcode'] = $customers->getZipCode();

				$customer_detail['customer_d_address']['dstreet'] = $customers->getDStreet();
				$customer_detail['customer_d_address']['dcity'] = $customers->getDCity();
				$customer_detail['customer_d_address']['dstate'] = $customers->getDState();
				$customer_detail['customer_d_address']['dzipcode'] = $customers->getDZipCode();

					if($customers->getGroupCustomerCustomerGroup() != NULL)
					{
						$customer_detail['customer_group']['cg_id'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupId();
						$customer_detail['customer_group']['cg_name'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupName();
						$customer_detail['customer_group']['cg_discount_percent'] = $customers->getGroupCustomerCustomerGroup()->getDiscountpercent();
					}
					else
					{
						$customer_detail['customer_group']['cg_id'] = null;
						$customer_detail['customer_group']['cg_name'] = "General";
						$customer_detail['customer_group']['cg_discount_percent'] = 0;
					}


				$last_p_transactions = $this->em->getRepository('models\pos\PosPaymentSlip')->findBy(array('posProjectsProjectid'=>$projectid,'status'=>2));
				
				if ( count($last_p_transactions) > 0 ){
					//var_dump(end($last_transaction));
					$last_transaction = array( 'allowed' => false );
					
					foreach ($last_p_transactions as $transactions) 
					{
						$payment_slip_id = $transactions->getPaymentslipid();
						$transactions_status = $transactions->getStatus();

						/* actual total of transaction */
						$transaction_total = $this->em->getRepository('models\pos\PosPaymentslipProducts')->findBy(array('posPaymentSlipPaymentslipid'=>$payment_slip_id));
						$product_amount = NULL;
						foreach ($transaction_total as $product) {
							$product_amount += $product->getPosProductSalesProductsalesid()->getAmount();
						}

						/* amount paid for transaction */
						if($transactions_status == 2)
						{
							$transaction_paid_amount = $this->em->getRepository('models\pos\PosPayments')->findBy(array('posPaymentSlipPaymentslipid'=>$payment_slip_id));
							$amount_paid = NULL;
							foreach ($transaction_paid_amount as $amount) {
								$amount_paid += $amount->getAmountPaid();
							}
						}
						else
						{
							$amount_paid = 0;
						}
						
						if($amount_paid > $product_amount)
							$dueAmount = $amount_paid - $product_amount;
						else
							$dueAmount = $product_amount - $amount_paid;

						
						$createdDate = $transactions->getCreatedDate();


						$last_transaction['partPaymentDetails'][] = array('paymentSlipId' => $payment_slip_id,
													 					  'createdDate'	  => date('d-M-Y',$createdDate),
																		  'dueAmount'    => number_format($dueAmount,2)
																	  	 );
					}
					

				}
				else
				{ 
					$last_transaction = array( 'allowed' => true );
				}


				$advances = $this->em->getRepository('models\pos\PosAdvance')->createQueryBuilder('d')										
										    ->addselect('SUM(d.amount)')
										    ->where('d.posInvoicesInvoiceid = :id')
											->setParameter('id', $invoice_id)
										    ->getQuery()
										    ->getResult();
				
				$result = array("soldlist" 	 => $sold_list,
								"unsoldlist" => $unsold_list,
								"customer" 	 => $customer_detail,
								"project_id" => $projectid,
								"invoice_id" => $invoice_id,
								"last_transaction" => $last_transaction,
								"advance" => number_format($advances[0][1],2)
								);

        		echo json_encode($result);		
   			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
				
			}
	}

	/* project id get customer details for estimate */
	public function ajaxProjectsDetails_estimate($projectId)
	{
		try {
				$Project = $this->em->getRepository('models\pos\PosProjects')->find($projectId);
				$invoice_id = $Project->getPosInvoicesInvoiceid();

				$customer = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoice_id));
				$customerid = $customer[0]->getPosCustomerCustomer()->getCustomerId();
							
				$customers = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
				$customer_detail['project_id'] = $projectId;

				$customer_detail['customer_id'] = $customerid;
				$customer_detail['customer_name'] = $customers->getCustomername();
				$customer_detail['customer_phone'] = $customers->getMobileNumber();
				$customer_detail['customer_email'] = $customers->getEmail();
					
				$customer_detail['customer_address']['street'] = $customers->getStreet();
				$customer_detail['customer_address']['city'] = $customers->getCity();
				$customer_detail['customer_address']['state'] = $customers->getState();
				$customer_detail['customer_address']['zipcode'] = $customers->getZipCode();

				$customer_detail['customer_d_address']['dstreet'] = $customers->getDStreet();
				$customer_detail['customer_d_address']['dcity'] = $customers->getDCity();
				$customer_detail['customer_d_address']['dstate'] = $customers->getDState();
				$customer_detail['customer_d_address']['dzipcode'] = $customers->getDZipCode();

				if($customers->getGroupCustomerCustomerGroup() != NULL)
					{
						$customer_detail['customer_group']['cg_id'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupId();
						$customer_detail['customer_group']['cg_name'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupName();
						$customer_detail['customer_group']['cg_discount_percent'] = $customers->getGroupCustomerCustomerGroup()->getDiscountpercent();
					}
					else
					{
						$customer_detail['customer_group']['cg_id'] = null;
						$customer_detail['customer_group']['cg_name'] = "General";
						$customer_detail['customer_group']['cg_discount_percent'] = 0;
					}
				
				echo json_encode($customer_detail);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
				
			}
	}

	
}