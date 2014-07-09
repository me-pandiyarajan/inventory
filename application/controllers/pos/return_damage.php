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