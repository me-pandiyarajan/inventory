<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_damage extends CI_Controller {

	/**
	 * Supplier management controller.
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
		
		$this->navigator->checkLogin();
		$this->navigator->posUserOnly();
	}

	public function index()
	{
		
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$group = $this->ion_auth->GetUserGroupId();
		$data['form_action'] = 'pos/return_damage/returnSale';
		$data['title'] = 'Sales Return';
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
       	$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/sales/sales_return',$data);
		//$this->load->view('pos/footer/footer');
	}

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
				$amount = $product->getAmount();
				$genid = $product->getProductsProductGen()->getProductGenId();
				$plu = $product->getProductsProductGen()->getProductIdPlu();
				$name = $product->getProductsProductGen()->getProductName();
				$unit = $product->getProductsProductGen()->getUnit();
			    
				
				$invoice_detail = array(	"InvoiceId"=>$invoiceid,
				                            "productId"=>$genid,				 	                 
					 						"Plu"=>$plu,
					 						"ProductName"=>$name,
					 						"Quantity"=>$quantity,
					 						"Unit"=>$unit,
					 						"UnitPrice"=> $unitprice,
					 						"Discount"=> $discount,
									        "Tax"=> $tax_id,  
					 						"Amount"=>$amount
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
						$customer_detail['customer_group']['cg_discount_percent'] = 1;
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


	 public function returnSale()
	 {

	 	$group = $this->ion_auth->GetUserGroupId();
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
     	$invoiceid = $this->input->post('invoiceid');
	    $product_id = $this->input->post('product_ids');
	    $plu = $this->input->post('plu');
	    $product_name = $this->input->post('product_names');
	    $price = $this->input->post('price');
	    $quantities = $this->input->post('quantities');
	    $discount = $this->input->post('discount');
	    $tax = $this->input->post('tax');
	    $amount = $this->input->post('amount');

		    for ($i=0; $i < count($product_id); $i++) 
		    { 
	          $pos_return = new models\pos\PosReturn;
			  $pos_return->setQuantity($quantities[$i]);
			  $pos_return->setTax($tax[$i]);
			  $pos_return->setAmount($amount[$i]);
			  
			  $unixtime = time();
			  
			  $pos_return->setCreatedDate($unixtime);
			  $creator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
			  $pos_return->setCreatedBy($creator);

			  $Products = $this->em->getRepository('models\inventory\Products')->find($product_id[$i]);
			  $pos_return->setProductsProductGen($Products);

			  $invoice_id = $this->em->getRepository('models\pos\PosInvoices')->find($invoiceid[$i]);
			  $pos_return->setPosInvoicesInvoiceid($invoice_id);

			  $this->em->persist($pos_return);
			  $this->em->flush();
			  
			  $pos_product    = $this->em->getRepository('models\inventory\Products')->find($product_id[$i]) ;
              $quantity       =  $pos_product->getQuantity();
              $total_quantity =  $quantity + $quantities[$i];
			  
			  $pos_product->setQuantity($total_quantity);
              $this->em->persist($pos_product);
			  $this->em->flush();

		    }
        $this->session->set_flashdata('returnsale','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>product returned</b></div>');
		redirect('pos/return_damage'); 
	 }



	 public function damaged()
	 {
        $group = $this->ion_auth->GetUserGroupId();
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
     	$invoiceid = $this->input->post('invoiceid');
	    $product_id = $this->input->post('product_ids');
	    $quantities = $this->input->post('quantities');
	    $tax = $this->input->post('tax');
	    $compensatedby = $this->input->post('CompensatedBy');
	    $compensatedprice = $this->input->post('Price');
	    $compensatedQuantity = $this->input->post('Quantity');
	    $amount = $this->input->post('amount');

		    for ($i=0; $i < count($product_id); $i++) 
		    { 
	          $pos_damage = new models\pos\PosDamaged;
			  $pos_damage->setQuantity($quantities[$i]);
			  $pos_damage->setTax($tax[$i]);
			  $pos_damage->setAmount($amount[$i]);
			  $unixtime = time();
			  $pos_damage->setCompensateBy($compensatedby);
			  $pos_damage->setCompAmount($compensatedprice);
			  $pos_damage->setCompProductQuantity($compensatedQuantity);
			  $pos_damage->setCreatedDate($unixtime);

			  $creator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
			  $pos_damage->setCreatedBy($creator);

			  $Products = $this->em->getRepository('models\inventory\Products')->find($product_id[$i]);
			  $pos_damage->setProductsProductGen($Products);

			  $invoice_id = $this->em->getRepository('models\pos\PosInvoices')->find($invoiceid[$i]);
			  $pos_damage->setPosInvoicesInvoiceid($invoice_id);

			  $this->em->persist($pos_damage);
			  $this->em->flush();
			  
			  $pos_product    = $this->em->getRepository('models\inventory\Products')->find($product_id[$i]) ;
              $quantity       =  $pos_product->getQuantity();
              $total_quantity =  $quantity - $compensatedQuantity;
			  $pos_product->setQuantity($total_quantity);
              $this->em->persist($pos_product);
			  $this->em->flush();
		    }

        $this->session->set_flashdata('Damaged Product','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>product returned</b></div>');
		redirect('pos/return_damage'); 
	 }

}