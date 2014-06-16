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
		
		$data['form_action'] = 'pos/sales/createSale';

		$header['user_data']=$this->ion_auth->GetHeaderDetails();

		$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/sales/sales',$data);
		//$this->load->view('pos/footer/footer');
	}


    /*
    *  sale
    */
	public function createSale()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		//$this->session->set_userdata('sales_data',$this->input->post());
		var_dump($this->input->post());
	}

	/*
    *  sale
    */
	public function sessionTest()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');

		//acces
		$data = $this->session->userdata('sales_data');
		var_dump($data);
		//unset
		//$this->session->unset_userdata('sales_data');
	}

}

/* End of file sales.php */
/* Location: ./application/controllers/pos/sales.php */
