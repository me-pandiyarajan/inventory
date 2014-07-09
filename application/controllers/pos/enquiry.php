<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends CI_Controller {
    /**
	 *  Enquiry management controller.
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
		//$this->load->view('pos/enquiry/listenquiry');
		$this->load->view('pos/footer/footer');
	}
  /* lead enquiry list*/
	public function leadenquiry()
	{
		$data['lead_enduiry'] = $this->em->getRepository('models\pos_ws\PosWsEnquiry')->findby(array('productType'=>'1'));
		//var_dump($data['lead_enduiry']);exit;
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Enquiry ID','Customer Name','Assigned Marketing Rep','Status','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/enquiry/leadenquiry',$data);
		$this->load->view('pos/footer/footer');
	}
	
	/* confirm list*/
	
    	public function confirmenduiry()
	{
		$data['confirm_enduiry'] = $this->em->getRepository('models\pos_ws\PosWsEnquiry')->findby(array('productType'=>'2'));
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Enquiry ID','Customer Name','Assigned Marketing Rep','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/enquiry/confirmenquiry',$data);
		$this->load->view('pos/footer/footer');
	}
	/* lead product list*/
	
	public function leadenduiryproductlist($enquiry_id)
	
	{
	   /* get enquiry id */
	   
		$data['leadenduiry_product'] = $leadenduiry_product = $this->em->getRepository('models\pos_ws\PosWsEnquiryCheckList')->findby(array('posWsEnquiryEnquiryid' => $enquiry_id));
		
		  /* get checklist id */
		
		$checklistid = $leadenduiry_product[0]->getPosWsCheckListId();
		
		 /* checklist id get images in PosWsImage */
		
		$data['images_list'] = $images_list = $this->em->getRepository('models\pos_ws\PosWsImage')->findby(array('posWsEnquiryCheckListPosWsCheckListId' => $checklistid));
				
		$data['product_details'] = $product_details = $this->em->getRepository('models\pos_ws\PosWsEnquiryProducts')->findby(array('posWsEnquiryEnquiryid' => $enquiry_id));
						
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Check List ID','Check In','Check Out','Work Done By','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/enquiry/leadenquiryproductlist',$data);
		$this->load->view('pos/footer/footer');
	}
	/* confirm product list*/
	public function confirmenduiryproductlist($enquiry_id)
	
	
	{
		$data['confirmenduiry_product'] = $confirmenduiry_product = $this->em->getRepository('models\pos_ws\PosWsEnquiryCheckList')->findby(array('posWsEnquiryEnquiryid' => $enquiry_id));
		
		$checklistid = $confirmenduiry_product[0]->getPosWsCheckListId();
		
		$data['images_list'] = $images_list = $this->em->getRepository('models\pos_ws\PosWsImage')->findby(array('posWsEnquiryCheckListPosWsCheckListId' => $checklistid));
		
		$data['product_details'] = $product_details = $this->em->getRepository('models\pos_ws\PosWsEnquiryProducts')->findby(array('posWsEnquiryEnquiryid' => $enquiry_id));
		
		//var_dump($data['lead_enduiry']);exit;
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Check List ID','Check In','Check Out','Work Done By','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/enquiry/confirmenquiryproductlist',$data);
		$this->load->view('pos/footer/footer');
	}
	

}

/* End of file enquiry.php */
/* Location: ./application/controllers/pos/enquiry.php */