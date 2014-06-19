<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

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

		$this->session->set_flashdata('last_location',uri_string());
	}

	public function index()
	{
		
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		
		$data['form_action'] = 'pos/sales/invoicePreview';

		$header['user_data']=$this->ion_auth->GetHeaderDetails();

		$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/sales/sales',$data);
		//$this->load->view('pos/footer/footer');
	}


    public function invoicePreview()
    {
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		$this->session->set_userdata('sales_data',$this->input->post());
		$this->createSale();
    }



    /*
    *  sale
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

		if(empty($customer_id))
		{	
			$customer_id = null;
			$discount 	 = 0; 
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
			$invoice->setStatus(1);
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

			
			for ($i=0; $i < count($product_ids); $i++) { 
				
				$product_sale = new models\pos\PosProductSales;
				$product_sale->setQuantity($quantities[$i]);
				$product_sale->setUnitPrice($price[$i]);
				$product_sale->setDiscount($discount);
				$product_sale->setTax($tax[$i]);
				$product_sale->setAmount($amount[$i]);
				$product_sale->setInvoicesInvoiceid($invoice);
					$product_id = $this->em->getRepository('models\inventory\products')->find($product_ids[$i]); 
				$product_sale->setProductsProductGen($product_id);
				$product_sale->setCreatedBy($creator);
				$product_sale->setCreatedDate($now->getTimestamp());
				$this->em->persist($product_sale);
				$this->em->flush();
			}
			
			$this->em->getConnection()->commit();

		} catch (Exception $e) {

			$this->em->getConnection()->rollback();
            throw $e;

		}


	}

	/*
    *  sale
    */
	public function sessionTest()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}

}

/* End of file sales.php */
/* Location: ./application/controllers/pos/sales.php */
