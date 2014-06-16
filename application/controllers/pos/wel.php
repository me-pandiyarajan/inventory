<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public $em;

	function __construct()  
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('navigator');
		$this->navigator->checkLogin();
		
	}

	public function index()
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();

		$this->load->view('pos/header/header',$header);
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/content_base');
		$this->load->view('pos/footer/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */