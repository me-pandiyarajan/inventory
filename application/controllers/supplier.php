<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
		
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	/*
	 *	Add supplier
	 */
	public function addSupplier()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		$data['form_action'] = 'supplier/addSupplier';

		$config = array(
               array(
                     'field'   => 'supplier_name',
                     'label'   => 'Supplier name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile',
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'status',
                     'label'   => 'status',
                     'rules'   => 'required'
                  )
            );

		$this->form_validation->set_rules($config);
		
		/*
		*	set fields here, that to be re-populating the form
		*/
		$fields = array('street','city','zip','state[]');
		foreach ($fields as $field) {
			$this->form_validation->set_rules($field);
		}


		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');

		//$header['user_data'] = array('id'=>1,'firstName'=>"first",'lastName'=>"last");
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenu();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('general/header', $header);
			$this->load->view($menu);
			$this->load->view('addsupplier',$data);
			$this->load->view('general/footer');
		}
		else
		{
			$supplier_name = $this->input->post('supplier_name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$street = $this->input->post('street');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zip = $this->input->post('zip');
			$status = $this->input->post('status');

			try {
				$supplier = new models\inventory\Suppliers;
				$supplier->setSupplierName($supplier_name);
				$supplier->setEmail($email);
				$supplier->setTelephone($mobile);
				$supplier->setAddress1($street);
				$supplier->setAddress1($city);
				$supplier->setCity($state);
				$supplier->setZipCode($zip);
				$supplier->setStatus($status);
				$this->em->persist($supplier);
				$this->em->flush();

				$data['success'] ='<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									Supplier added successfuly!
  									</div>';

				$this->load->view('general/header', $header);
				$this->load->view($menu);
				$this->load->view('addsupplier',$data);
				$this->load->view('general/footer');
			}
			catch(Exception $e)
			{
				
				echo $e->getMessage();
				// $this->load->view('general/header', $header_data);
				// $this->load->view('general/deomenu');
				// $this->load->view('addsupplier');
				// $this->load->view('general/footer');
			}
			
		}		
	}

	/*
	*	list suppliers
	*	---------------------
	*	
	*/
	public function listSuppliers()
	{

		try {
				$data['suppliers'] = $this->em->getRepository('models\inventory\Suppliers')->findAll();
				
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenu();
				switch ($group) {
					case 1:
						$data['tablehead'] = array('Supplier Name','Email','Mobile','Status','Action');
						$data['visiblity'] = 1;
						break;
					case 2:
						$data['tablehead'] = array('Supplier Name','Email','Mobile','Status','Action');
						$data['visiblity'] = 0;
						break;
					case 3:
						break;
					default:
						break;
				}

				$this->load->view('general/header', $header);
				$this->load->view($menu);
				$this->load->view('listsuppliers',$data);
				$this->load->view('general/footer');
			}
			catch(Exception $e)
			{
				$data['supplier'] = $this->em->getRepository('models\inventory\Suppliers')->findBy();

				echo $e->getMessage();
				// $this->load->view('general/header', $header_data);
				// $this->load->view('general/deomenu');
				// $this->load->view('addsupplier');
				// $this->load->view('general/footer');
			}
	
	}

	/*
	*	fetch supplier details
	*	---------------------
	*	input: supplierid , action
	*	
	*	
	*/
	public function supplierDetails($supplierid = null, $action = null )
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		if($supplierid != null && $action != null)
		{
			try{
				$data['supplier'] = $this->em->getRepository('models\inventory\Suppliers')->find($supplierid);
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				
				$data['form_action'] = 'supplier/updateSupplier';

				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenu();
				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 2:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('general/header', $header);
				$this->load->view($menu);
				$this->load->view($action,$data);
				$this->load->view('general/footer');

			}catch(Exception $e){
				
				echo $e->getMessage();
				// $this->load->view('general/header', $header_data);
				// $this->load->view('general/deomenu');
				// $this->load->view('addsupplier');
				// $this->load->view('general/footer');
			}
		}
		else
		{
			#error message
			show_error('Your not supposed to view this page! Bye');
		}
		
	}


	/*
	 *	Update supplier
	 */
	public function updateSupplier()
	{
	
			$this->load->helper('form','url');
			$this->load->library('form_validation');
			
			//$data['form_action'] = 'supplier/updateSupplier';

			$config = array(
	               array(
	                     'field'   => 'supplier_name',
	                     'label'   => 'Supplier name',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'email',
	                     'label'   => 'Email',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'mobile',
	                     'label'   => 'Mobile',
	                     'rules'   => 'required'
	                  ),   
	               array(
	                     'field'   => 'status',
	                     'label'   => 'status',
	                     'rules'   => 'required'
	                  )
	            );

			$this->form_validation->set_rules($config);
			
			/*
			*	set fields here, that to be re-populating the form
			*/
			$fields = array('street','city','zip','state');
			foreach ($fields as $field) {
				$this->form_validation->set_rules($field);
			}


			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');

			$header['user_data'] = $this->ion_auth->GetHeaderDetails();
			$group_id = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenu();

			if ($this->form_validation->run() === FALSE)
			{
				/*if($supplierid != null)
				{	
					$data['supplier'] = $this->em->getRepository('models\inventory\Suppliers')->find($supplierid);
					$this->load->view('general/header', $header);
					$this->load->view($menu);
					$this->load->view('editSupplierDetails',$data);
					$this->load->view('general/footer');
				}
				else
				{
					#error message
				}*/
				show_error('Your not supposed to view this page! Bye');

			}
			else
			{
				$supplier_name = $this->input->post('supplier_name');
				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile');
				$street = $this->input->post('street');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$status = $this->input->post('status');
				$supplierid = $this->input->post('supplier_id');

				try {

					$data['supplier'] = $supplier = $this->em->getRepository('models\inventory\Suppliers')->find($supplierid);
					$supplier->setSupplierName($supplier_name);
					$supplier->setEmail($email);
					$supplier->setTelephone($mobile);
					$supplier->setAddress1($street);
					$supplier->setCity($city);
					$supplier->setAddress2($state);
					$supplier->setZipCode($zip);
					$supplier->setStatus($status);
					$this->em->persist($supplier);
					$this->em->flush();

					$data['success'] ='<div class="alert alert-success alert-dismissable">
	  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  									Supplier detail updated successfuly!
	  									</div>';

					$group = $this->ion_auth->GetUserGroupId();
					$menu = $this->navigator->getMenu();
					switch ($group) {
						case 1:
							$data['visiblity'] = 1;
							break;
						case 2:
							$data['visiblity'] = 0;
							break;
					}

					$this->load->view('general/header', $header);
					$this->load->view($menu);
					redirect('supplier/supplierDetails/'.$supplierid.'/viewSupplierDetails');
					$this->load->view('general/footer');

				}
				catch(Exception $e)
				{
					log_message('error',$e->getMessage());
					// $this->load->view('general/header', $header_data);
					// $this->load->view('general/deomenu');
					// $this->load->view('addsupplier');
					// $this->load->view('general/footer');
				}
			
			}
		
				
	}



}

/* End of file supplier.php */
/* Location: ./application/controllers/supplier.php */
