<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TaxClass extends CI_Controller {

	public $em; 

   	function __construct()  
	{
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		$this->load->library('navigator');
		
		$this->navigator->checkLogin();

		$this->session->set_flashdata('last_location',uri_string());
		
	}


	public function addTaxClass()
	{

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['form_action'] = "pos/TaxClass/addTaxClass";
	      
			$config = array(
	               array(
	                     'field'   => 'taxclassname',
	                     'label'   => 'Tax Class Name',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'status',
	                     'label'   => 'Status',
	                     'rules'   => 'required'
	                  )
	              );

			$this->form_validation->set_rules($config);
			
			/*
			*	set fields here, that to be re-populating the form
			*/
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
			$header['user_data'] = $this->ion_auth->GetHeaderDetails();
			$group_id = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuPos();
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/TaxClass/addtaxclass',$data);
				$this->load->view('pos/footer/footer');
			}
			else
			{
				try {
				    $newtaxclass = new models\pos\PosTax;
					$newtaxclass->setTaxClassName($this->input->post('taxclassname'));
					$newtaxclass->setStatus($this->input->post('status'));
					$newtaxclass->setDeleted(0);
					$newtaxclass->setCreatedBy($header['user_data']['id']);
					$newtaxclass->setLastUpdatedBy($header['user_data']['id']);
					$created_date = new\DateTime("now");
					$newtaxclass->setCreatedDate($created_date);
					$this->em->persist($newtaxclass);
		            $this->em->flush();
					$this->session->set_flashdata('taxadd', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Tax Class Successfully Added</b></div>');
					redirect('pos/TaxClass/listTaxClass');

		        }
			   catch(Exception $e)
			   {
				 echo $e->getMessage();
			   }
			}
	}



	public function listtaxclass()
	{

		try {
				$data['taxclass'] = $this->em->getRepository('models\pos\PosTax')->findBy(array('deleted'=>0));				
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				$data['tablehead'] = array('Tax Class Name','Status','Created Date','Action');

				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 12:
						$data['visiblity'] = 0;
						break;
				}



				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/TaxClass/listtaxclass',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}


	/*
	 *	Update Tax Class
	 */
	
	public function editTaxClass($id)
	{

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//$data['form_action'] = "pos/TaxClass/editTaxClass";
	      
			$config = array(
	               array(
	                     'field'   => 'taxclassname',
	                     'label'   => 'Tax Class Name',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'status',
	                     'label'   => 'Status',
	                     'rules'   => 'required'
	                  )
	              );

			$this->form_validation->set_rules($config);
			
			/*
			*	set fields here, that to be re-populating the form
			*/
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
			$header['user_data'] = $this->ion_auth->GetHeaderDetails();
			$group_id = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuPos();
			if ($this->form_validation->run() === FALSE)
			{
				$taxclassid=$id;
				$edittaxclass = $this->em->getRepository('models\pos\PosTax')->find($taxclassid);
				$data['taxclassname'] = $edittaxclass->getTaxClassName();
				$data['status'] = $edittaxclass->getStatus();
				$data['taxclassid'] = $id;
				

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/TaxClass/edittaxclass',$data);
				$this->load->view('pos/footer/footer');
			}
			else
			{
				$taxclassid=$id;
				try {
					$newtaxclass = $this->em->getRepository('models\pos\PosTax')->find($taxclassid);
					$newtaxclass->setTaxClassName($this->input->post('taxclassname'));
					$newtaxclass->setStatus($this->input->post('status'));
					$newtaxclass->setLastUpdatedBy($header['user_data']['id']);
					$updated_date = new\DateTime("now");
					$newtaxclass->setLastUpdatedDate($updated_date);
					$this->em->persist($newtaxclass);
		            $this->em->flush();
					$this->session->set_flashdata('taxedit', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Tax Class Successfully Updated</b></div>');
					redirect('pos/TaxClass/listtaxclass');

		        }
			   catch(Exception $e)
			   {
				 echo $e->getMessage();
			   }
			}
	}



	

	/*
	* 	Tax delete
	*/
	public function deleteTaxClass($id)
		{
			
			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$group = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuInventory();
			$data['tax'] = $tax = $this->em->getRepository('models\pos\PosTax')->find($id);
			$tax->setStatus(0);
			$tax->setDeleted(1);
			$tax->setLastUpdatedBy($header['user_data']['id']);
			$updated_date = new\DateTime("now");
			$tax->setLastUpdatedDate($updated_date);
			$this->em->persist($tax);
			$this->em->flush();
			$this->session->set_flashdata('taxdelect','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Tax Deleted successfuly</b></div>');
			redirect('pos/TaxClass/listtaxclass');
		}	



}


?>