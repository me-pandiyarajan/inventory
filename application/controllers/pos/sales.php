<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	/**
	 * Supplier management controller.
	 *
	 *
	 */
	public $em;

	public static $invoiceIds_Locked = array(); 

   	function __construct()  
	{
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		$this->load->library('navigator');
		
		$this->navigator->checkLogin();
		$this->navigator->posUserOnly();

		$this->session->set_flashdata('last_location',uri_string());
	}


	/*
	* 	General Sale
	*
	*/
	public function Sale()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		
		$data['form_action'] = 'pos/sales/SaleBrancher';

		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		//$invoiceIds_Locked 

		$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/sales/sales',$data);
		//$this->load->view('pos/footer/footer');
	}


	/*
	* 	Project sale
	*
	*/
	public function ProjectSale()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$group = $this->ion_auth->GetUserGroupId();
		$data['form_action'] = 'pos/sales/SaleBrancher';

		$header['user_data']=$this->ion_auth->GetHeaderDetails();
        switch($group)
		{
			
		case 1:
		    $data['visiblity'] = 1;
			break;
		case 12:
		    $data['visiblity'] = 2;
			break;
		case 13:
		    $data['visiblity'] = 3;
			break;
		}
		$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/project/project_sales',$data);
		//$this->load->view('pos/footer/footer');

	}


    public function SaleBrancher()
    {
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		$invoice_data = $this->input->post();

		if ($invoice_data['project_id'] == 0) 
		{
			
		   /*
			*	general sale block
			*/

			$last_invoice = $this->em->getRepository('models\pos\PosInvoices')->createQueryBuilder('i')
													->orderBy('i.invoiceid', 'DESC')
													->setMaxResults(1)
													->getQuery()
	   												->getResult();

	   		$expected_inv_number = $last_invoice[0]->getInvoiceid();										
			$last_invoice_number = "INV".sprintf("%07s", $expected_inv_number++ );

			$invoice_data['invoice_number'] = $last_invoice_number; 

			$this->session->set_userdata('sales_data', $invoice_data);
			//$this->load->view('pos/header/header',$header);
			$this->load->view('pos/sales/sales_invoice', $invoice_data);
		}
		else
		{
		   /*
			*	project block
			*	
			*/
			//var_dump($invoice_data);
			$invoice_data['invoice_number'] = "07"; 

			$this->session->set_userdata('sales_data', $invoice_data);
			//$this->load->view('pos/header/header',$header);
			$this->load->view('pos/sales/project_sales_paymentslip', $invoice_data);

			$this->session->set_userdata('project_sales_data', $invoice_data);
			//$this->CreateProjectSale();
		}

		//$this->createSale(); 
    }


    /*
    *   general sale
    */
	public function createSale()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		//access session
		$invoiceData = $this->session->userdata('sales_data');

		foreach ($invoiceData as $key => $value) {
			${$key} = $value;
		}

		//unset session
		$this->session->unset_userdata('sales_data');

		
		if(isset($deliver)){
			$status = 2;
		}else{
			$status = 1;
		}
		

		if(empty($customer_id))
		{	
			$customer_id = null;
		}

		/* Time satus */
		$now = new \DateTime("now");
		$creator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);

		/*create invoice*/
		$this->em->getConnection()->beginTransaction();
		try {
			
			$invoice = new models\pos\PosInvoices;
			$invoice->setTransacMode($transac_mode);
			$invoice->setTenderedby($paymentType);  
			$invoice->setPaymentStatus($payment_status);
			//$invoice->setSpecialInstructions($special_Instructions);
			$invoice->setStatus($status);
			$customer = $this->em->getRepository('models\pos\PosCustomer')->find($customer_id);
			$invoice->setPosCustomerCustomer($customer);
			$invoice->setCreatedBy($creator);
			$invoice->setCreatedDate($now->getTimestamp());
			$this->em->persist($invoice);
			$this->em->flush();
			
			$invoice_id 	= $invoice->getInvoiceid();
			$invoice_number = "INV".sprintf("%07s", $invoice_id);

			$invoice = $this->em->getRepository('models\pos\PosInvoices')->find($invoice_id);
			$invoice->setInvoiceNumber($invoice_number);
			$this->em->persist($invoice);
			$this->em->flush();

			
			for($i=0; $i < count($product_ids); $i++) 
			{ 	
				$product_sale = new models\pos\PosProductSales;
				$product_sale->setQuantity($quantities[$i]);
				$product_sale->setUnitPrice($prices[$i]);
				$product_sale->setDiscount($discount_percents[$i]);
				$product_sale->setTax($taxs[$i]);
				$product_sale->setAmount($totals[$i]);
				$product_sale->setInvoicesInvoiceid($invoice);
					$product_id = $this->em->getRepository('models\inventory\products')->find($product_ids[$i]); 
				$product_sale->setProductsProductGen($product_id);
				$product_sale->setCreatedBy($creator);
				$product_sale->setCreatedDate($now->getTimestamp());
				$this->em->persist($product_sale);
				$this->em->flush();
			}
			
			$this->em->getConnection()->commit();

			$this->session->set_flashdata('sale_status', '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<b>Sale successful</b></div>');
			redirect('pos/sales');


		} catch (Exception $e) {

			$this->em->getConnection()->rollback();
            throw $e;

		}


	}

	/*
	*	create project sale
	*/
	public function CreateProjectSale()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		//access session
		$invoiceData = $this->session->userdata('project_sales_data');

		foreach ($invoiceData as $key => $value) {
			${$key} = $value;
		}

		//unset session
		$this->session->unset_userdata('project_sales_data');

		if(isset($deliver)){
			$status = 2;
		}else{
			$status = 1;
		}

		/* Time satus */
		$now = new \DateTime("now");
		$creator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);


		/*create invoice*/
		$this->em->getConnection()->beginTransaction();
		try {
						
			$invoice_number = "INV".sprintf("%07s", $invoice_id);

			$invoice = $this->em->getRepository('models\pos\PosInvoices')->find($invoice_id);
			$invoice_number = $invoice->getInvoiceNumber();

			$invoice->setStatus($status);
			$invoice->setUpdatedBy($now->getTimestamp());
			$invoice->setUpdatedDate($creator);
			$this->em->persist($invoice);
			$this->em->flush();

			/* payment slip*/
			$payment_slip = new models\pos\PosPaymentSlip;
			
			$project = $this->em->getRepository('models\pos\PosProjects')->find($project_id);
			$payment_slip->setPosProjectsProjectid($project);

			$payment_slip->setTransacMode($transac_mode);
			$payment_slip->setTenderedby($paymentType);
			$payment_slip->setPaymentStatus($payment_status);
				//$payment_slip->setSpecialInstructions();
			$payment_slip->setStatus($payment_status);
			$payment_slip->setCreatedBy($creator);
			$payment_slip->setCreatedDate($now->getTimestamp());
			$this->em->persist($payment_slip);
			$this->em->flush();
			$payment_slip_id = $payment_slip->getPaymentslipid();
	

			for($i=0; $i < count($product_ids); $i++) 
			{ 	
				$product_sale = new models\pos\PosProductSales;
				$product_sale->setQuantity($quantities[$i]);
				$product_sale->setUnitPrice($prices[$i]);
				$product_sale->setDiscount($discount_percents[$i]);
				$product_sale->setTax($taxs[$i]);
				$product_sale->setAmount($totals[$i]);
				$product_sale->setInvoicesInvoiceid($invoice);
					$product_id = $this->em->getRepository('models\inventory\products')->find($product_ids[$i]); 
				$product_sale->setProductsProductGen($product_id);
				$product_sale->setCreatedBy($creator);
				$product_sale->setCreatedDate($now->getTimestamp());
				$this->em->persist($product_sale);
				$this->em->flush();

				$product_sale_id = $product_sale->getProductsalesid();


				/* PosPaymentslipProducts */
				$payment_slip_products = new models\pos\PosPaymentslipProducts;

				$product_sale_id_OBJ = $this->em->getRepository('models\pos\PosProductSales')->find($product_sale_id); 
				$payment_slip_id_OBJ = $this->em->getRepository('models\pos\PosPaymentSlip')->find($payment_slip_id); 

				$payment_slip_products->setPosProductSalesProductsalesid($product_sale_id_OBJ);
				$payment_slip_products->setPosPaymentSlipPaymentslipid($payment_slip_id_OBJ);
				$this->em->persist($payment_slip_products);
				$this->em->flush();

			}

			// eternicode.github.io/bootstrap-datepicker/

			/* PosPayments */
			$posPayments = new models\pos\PosPayments;
			$posPayments->setAmountPaid($amount_paid);
			$posPayments->setPosPaymentSlipPaymentslipid($payment_slip_id_OBJ);
			$posPayments->setCreatedBy($creator);
			$posPayments->setCreatedDate($now->getTimestamp());
			$this->em->persist($posPayments);
			$this->em->flush();

			$this->em->getConnection()->commit();

			$this->session->set_flashdata('sale_status', '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<b>Project Transaction completed successfuly</b></div>');
			redirect('pos/sales/ProjectSale');

		} catch (Exception $e) {

			$this->em->getConnection()->rollback();
            throw $e;

		}

	}


	/* 
	* 	DuePayment
	*/
	public function DuePayment()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		$input = $this->input->post();

		$psid = $input['psid'];
		$amount_paid = $input['amount'];

		/* Time satus */
		$now = new \DateTime("now");
		$creator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);

		$this->em->getConnection()->beginTransaction();
		try {
			
			/* PosPaymentSlip */
			$payment_slip_OBJ = $this->em->getRepository('models\pos\PosPaymentSlip')->find($psid);
			$payment_slip_OBJ->setStatus(1);
			$this->em->persist($payment_slip_OBJ);
			$this->em->flush();

			/* PosPayments */
			$posPayments = new models\pos\PosPayments;
			$posPayments->setAmountPaid($amount_paid);
			$posPayments->setPosPaymentSlipPaymentslipid($payment_slip_OBJ);
			$posPayments->setCreatedBy($creator);
			$posPayments->setCreatedDate($now->getTimestamp());
			$this->em->persist($posPayments);
			$this->em->flush();

			$this->em->getConnection()->commit();

			return true;

		} catch (Exception $e) {

			$this->em->getConnection()->rollback();
            throw $e;
			
		}
	}

	/*
    *  sale
    */
	public function test()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}


	/*
	*	discount access code 
	*/
	public function accessCode()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('sms');

		//$verification_code = random_string('alnum', 7);
		$verification_code = 7777;
		$this->session->set_userdata('verification_code', $verification_code);

		// set text
        $text   = "Discount access verification code $verification_code Please use this on POS to provide discount.";
        
        // set phone (string or array)
        //$phone = array('919566200738');
	        //$phone = array('919444969600','919159251757');
	        //$response = $this->sms->send($text, $phone);
	        //$result = explode(" ", $response);
        $result[0] = 100;
		
		//$response = $this->sms->get_balance();
  		//$result = explode(" ",$response);

        if ($result[0] == 100) {
        	$return = true;
        }
        else {
        	$return = false;
        	log_message('error',$response);
        	//echo $e->getMessage();
        }

		echo $return;
	}

	/*
	*	discount access code 
	*/
	public function discountCodeVerification()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		$verification_code = $this->session->userdata('verification_code');

		if( $this->input->post('verification_code') == $verification_code) 
		{
			$return = true;
		}
		else
		{
			$return = false;
		}

		$this->session->unset_userdata('verification_code');
		
		echo $return;
	}



}

/* End of file sales.php */
/* Location: ./application/controllers/pos/sales.php */
