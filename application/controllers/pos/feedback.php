<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {
    /**
	 *  Feedback management controller.
	 */

	public $em;

	function __construct()  
	{
		parent::__construct();
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		$this->load->helper('url');
		$this->load->library('navigator');
		$this->navigator->checkLogin();
    	$this->session->set_flashdata('last_location',uri_string());
		
		
	}

	public function index()
	{
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/footer/footer');
	}
  /* feedback list*/
	public function feedbacklist()
	{ 
	    $data['feedback_list'] = $this->em->getRepository('models\pos_ws\PosWsFeedback')->findAll();
	    $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Feedback ID','Customer EmailID','Satisfactory Level','Created By','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/feedback/feedbacklist',$data);
		$this->load->view('pos/footer/footer');
	}
	
	 /* feedback View*/
	public function feedbackview($feedback_id)
	{ 
	    $data['feedback'] = $feedback = $this->em->getRepository('models\pos_ws\PosWsFeedback')->findby(array('feedbackid' => $feedback_id));
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
	    $menu = $this->navigator->getMenuPos();
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/feedback/feedbackview',$data);
		$this->load->view('pos/footer/footer');
	}
	
	
	
	

}

/* End of file feedback.php */
/* Location: ./application/controllers/pos/feedback.php */