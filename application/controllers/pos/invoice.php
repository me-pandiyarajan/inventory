<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Invoice management controller.
	 *
	 *
	 */
	public $em; 

   	function __construct()  
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('navigator');
		$this->em = $this->doctrine->em;	
	    $this->navigator->checkLogin();
	}

	/* invoice list*/
 	public function invoice_list()
   	{
        $data['invoice_details'] = $this->em->getRepository('models\pos\PosInvoices')->findAll();
        $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Invoice number','Customer name','Created date','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/invoice/invoice_list',$data);
		$this->load->view('pos/footer/footer');
   	}
 	
 	/* invoice view*/  
	public function view_invoice($invoice_id)
	{  
      
          /* get advances details */

        $advances = $this->em->getRepository('models\pos\PosAdvance')->createQueryBuilder('d')
										    ->addselect('SUM(d.amount)')
										    ->where('d.posInvoicesInvoiceid = :id')
											->setParameter('id', $invoice_id)
										    ->getQuery()
										    ->getResult();	

			//var_dump($advances);exit;						    	
											
							
		$data['advances'] = $advances[0][1];

		/*Void */
	   /* get invoice  id */
	   
	    $invoice = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoice_id));		
		/* get invoice id */
		$invoice_id = $invoice[0]->getInvoiceid();	
			
		/* get sales detail in pos_product_sales */
		
		$data['invoices'] = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoice_id));
		//var_dump($data['void_invoice']);exit;
		
		/* Return*/
		/* get Return detail in PosReturn */
		$data['returns'] = $this->em->getRepository('models\pos\PosReturn')->findBy(array('posInvoicesInvoiceid' => $invoice_id));
		
		/* Damaged*/
		/* get Damaged details in PosDamaged */
		
		$data['damaged'] = $this->em->getRepository('models\pos\PosDamaged')->findBy(array('posInvoicesInvoiceid' => $invoice_id));
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		//$data['tablehead'] = array('PLU','Product Name','Quantity','UnitPrice','Tax','Amount');
		
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/invoice/view_invoice_list',$data);
		$this->load->view('pos/footer/footer');
	 
	}

	/* void invoice list */
	public function void_invoice()
	{     
        $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$group = $this->ion_auth->GetUserGroupId();
		//echo $group;exit;
		switch ($group) {
				case 1:
					$data['visiblity'] = 1;
					$header = $this->ion_auth->GetHeaderDetails();
					$user = $this->em->getRepository('models\pos\Users')->find($header['id']);
					$data['invoice_superadmin'] = $invoice_superadmin = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('createdBy' => $user,'status' =>array(1,2)));
					  $data['void_invoices'] = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoice_superadmin));
				   // var_dump($data['void_invoices']);exit;
					//var_dump($invoice_superadmin);exit;
				  /*  foreach($data['invoice_superadmin'] as $sa_invoiceid)
					{
				    $invoiceid = $sa_invoiceid->getInvoiceid();
				   // var_dump($invoiceid);exit;
				    $data['void_invoices'] = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoice_superadmin));
				   // var_dump($data['void_invoices']);
				    } */
					//$data['customer_details'] = $customer = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoice_superadmin));  
					break;
				case 12:
					$data['visiblity'] = 2;
					 $queryDate = strtotime("today"); 
					 //$unitxtime = time();
					// $status = array(1, 2);
				    $data['invoice']	= $invoice = $this->em->getRepository('models\pos\PosInvoices')->createQueryBuilder('i')
									->where('i.createdBy = :id')
									->setParameter('id', $header['user_data']['id'])
									->andwhere('i.status IN (:status)')
									->setParameter('status', array(1, 2))
									->andWhere('i.createdDate >= :queryDate' )
									->setParameter('queryDate', $queryDate )
									->add('orderBy', 'i.invoiceid DESC')
									->setMaxResults(3)
									->getQuery()
									->getResult();
									//var_dump($invoice);exit;
					/*get invoice id */
					//
					$invoiceid = $invoice[0]->getInvoiceid();
					$data['void_invoices'] = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoiceid));
					$data['customer_details'] = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoiceid));
					//var_dump($invoice);exit;										
					break;
				case 13:
					$data['visiblity'] = 3;
					$queryDate = strtotime("today"); 
					//$unitxtime = time();
					$invoice = $this->em->getRepository('models\pos\PosInvoices')->createQueryBuilder('i')
									->where('i.createdBy = :id')
									->setParameter('id', $header['user_data']['id'])
									->andwhere('i.status IN (:status)')
									->setParameter('status', array(1, 2))
									->andWhere('i.createdDate >= :queryDate' )
									->setParameter('queryDate', $queryDate )
									->add('orderBy', 'i.invoiceid DESC')
									->setMaxResults(1)
									->getQuery()
									->getResult();
									//var_dump($invoice);exit;
					/*get invoice id */										
					$invoiceid = $invoice[0]->getInvoiceid();	
                      $data['void_invoices'] = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $invoiceid));
                      $data['customer_details'] = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoiceid));					  
					//var_dump($invoice);exit;
					break;
				     }
			//$data['tablehead'] = array('PLU','Product Name','Quantity','UnitPrice','tax','Amount','Discount');
			$this->load->view('pos/header/header', $header);
			$this->load->view($menu);
			$this->load->view('pos/invoice/void_invoice_list',$data);
			$this->load->view('pos/footer/footer');
	}
	
	/* cancel void invoice */
	public function cancelvoid($invoiceid)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$data['void_status'] = $void = $this->em->getRepository('models\pos\PosInvoices')->find($invoiceid);
		$void->setStatus(0);
		$this->em->persist($void);
		$this->em->flush();
		$this->session->set_flashdata('cancelvoid','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>void cancelled</b></div>');
		redirect('pos/invoice/invoice_list'); 
	}

	
	/*
	*	AjaxCall: get Invoice list  
	*	---------------------
	*	input : part of name or id
	*
	*/

	public function ajaxInvoiceLookup($invoice)
	{
		$invoice_list = array(); 
		try {
				$invoices = $this->em->getRepository('models\pos\PosInvoices')->createQueryBuilder('p')
												->Where('p.invoiceNumber LIKE :id')
												->setParameter('id', '%'.$invoice.'%')
												->getQuery()
   												->getResult();

				foreach ($invoices as $invoice) {
					$invoice_list[] = array(
											 'id' => $invoice->getInvoiceid(),
											 'value' => $invoice->getInvoiceNumber() 
											 );
				}				
				echo json_encode($invoice_list);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
				log_message('error',$e->getMessage());
			}
	}


	/*
	*	AjaxCall: get Invoice Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxInvoiceDetails($invoiceid)
	{

		try {
			    $invoicelist = array(); 
			    $products = $this->em->getRepository('models\pos\PosProductSales')->findByinvoicesInvoiceid($invoiceid);	
			    foreach ($products as $product) 
			    {
				    $quantity = $product->getQuantity();
					$unitprice = $product->getUnitPrice();
					$discount = $product->getDiscount();
					$tax_id = $product->getTax();
					$total = $product->getAmount();

					$genid = $product->getProductsProductGen()->getProductGenId();
					$plu = $product->getProductsProductGen()->getProductIdPlu();
					$name = $product->getProductsProductGen()->getProductName();
					$description = $product->getProductsProductGen()->getDescription(); 
					$unit = $product->getProductsProductGen()->getUnit();

					$available_quantity = $product->getProductsProductGen()->getQuantity();
					$safety_stock_level = $product->getProductsProductGen()->getSafetyStockLevel();

					$base_amount = $quantity * $unitprice;

					$discount_price = ($base_amount * ($discount/100));
			    
				
					$invoice_detail = array(	"InvoiceId"=> $invoiceid,
					                            "productId"=> $genid,				 	                 
						 						"Plu"=> $plu,
						 						"ProductName"=> $name,
						 						"Description" => $description,
						 						"Quantity"=> $quantity,
						 						"availableQuantity"=> $available_quantity,
						 						"SafetyStockLevel" => $safety_stock_level,
						 						"Unit"=> $unit,
						 						"UnitPrice"=> $unitprice,
						 						"Amount"=> $base_amount,
						 						"Discount"=> $discount_price,
										        "Tax"=> $tax_id,  
						 						"Total"=>$total
						 						); 
					array_push($invoicelist,$invoice_detail);
				}	
               // echo json_encode($invoicelist);
			    $invoice = $this->em->getRepository('models\pos\PosInvoices')->findByInvoiceid($invoiceid);
                
                if($invoice[0]->getPosCustomerCustomer() != NULL)
                {
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
				}
				else{
					$customer_detail = null;
				}

			    //echo json_encode($customer_detail);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
		
		$result = array("invoicelist"=>$invoicelist,"customer" => $customer_detail);
        echo json_encode($result);
	}
	
}

/* End of file Invoice.php */
/* Location: ./application/controllers/pos/Invoice.php */
