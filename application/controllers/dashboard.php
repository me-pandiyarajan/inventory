<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	/**
	 * dashboard controller.
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
		
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		
		$menu = $this->navigator->getMenu();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();

		$this->load->view('general/header', $header);
		$this->load->view($menu);
		$this->load->view('dashboard');
		$this->load->view('general/footer');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
