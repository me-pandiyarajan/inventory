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

		$data['form_action'] = 'inventory/supplier/addSupplier';

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
		$menu = $this->navigator->getMenuInventory();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('inventory/general/header', $header);
			$this->load->view($menu);
			$this->load->view('inventory/supplier/addsupplier',$data);
			$this->load->view('inventory/general/footer');
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
				$supplier->setMobile($mobile);
				$supplier->setStreet($street);
				$supplier->setCity($city);
				$supplier->setState($state);
				$supplier->setZipCode($zip);
				$supplier->setStatus($status);
				$supplier->setDeleted(0);
				$this->em->persist($supplier);
				$this->em->flush();

				$data['success'] ='<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									Supplier added successfuly!
  									</div>';

				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/supplier/addsupplier',$data);
				$this->load->view('inventory/general/footer');
			}
			catch(Exception $e)
			{
				
				echo $e->getMessage();
			
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
				//$data['suppliers'] = $this->em->getRepository('models\inventory\Suppliers')->findAll();
				$data['suppliers'] = $this->em->getRepository('models\inventory\Suppliers')->findBy(array('deleted' =>0));
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuInventory();
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

				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/supplier/listsuppliers',$data);
				$this->load->view('inventory/general/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
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
				
				$data['form_action'] = 'inventory/supplier/updateSupplier';

				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuInventory();
				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 2:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('inventory/general/header', $header);
				$this->load->view($menu);
				$this->load->view('inventory/supplier/'.$action,$data);
				$this->load->view('inventory/general/footer');

			}catch(Exception $e){
				
				echo $e->getMessage();
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
		
		//$data['form_action'] = 'inventory/supplier/updateSupplier';

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
			$menu = $this->navigator->getMenuInventory();

			if ($this->form_validation->run() === FALSE)
			{
				
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
					$supplier->setMobile($mobile);
					$supplier->setStreet($street);
					$supplier->setCity($city);
					$supplier->setState($state);
					$supplier->setZipCode($zip);
					$supplier->setStatus($status);
					$this->em->persist($supplier);
					$this->em->flush();
                   
		          // redirect('inventory/supplier/listsuppliers'); 
					$group = $this->ion_auth->GetUserGroupId();
					$menu = $this->navigator->getMenuInventory();
					switch ($group) {
						case 1:
							$data['visiblity'] = 1;
							break;
						case 2:
							$data['visiblity'] = 0;
							break;
					}

					$this->load->view('inventory/general/header', $header);
					$this->load->view($menu);
					$this->load->view('inventory/general/footer');
					 $this->session->set_flashdata('supplieredit','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Supplier detail updated successfuly!</b></div>');
					redirect('inventory/supplier/listsuppliers');
					

				}
				catch(Exception $e)
				{
					log_message('error',$e->getMessage());
				}
			
			}			
	
	}


	/*
	* supplier delete
	*/
	public function deletesupplier($id)
		{
			
			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$group = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuInventory();
			$data['supplier'] = $supplier = $this->em->getRepository('models\inventory\Suppliers')->find($id);
			$supplier->setDeleted(1);
			$supplier->setStatus(0);
			$this->em->persist($supplier);
			$this->em->flush();
			$this->session->set_flashdata('supplierdelect','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Supplier Deleted successfuly</b></div>');
			redirect('inventory/supplier/listsuppliers'); 
		}


	/*
	*	AjaxCall: get supplier list  
	*	---------------------
	*	input : supplier name or id
	*
	*/
	public function ajaxSuppliersLookup($supplier)
	{
		try {
				$suppliers = $this->em->getRepository('models\inventory\Suppliers')->createQueryBuilder('s')
												->where('s.supplierId LIKE :id')
												->setParameter('id', '%'.$supplier.'%')
												->orWhere('s.supplierName LIKE :name')
												->setParameter('name', '%'.$supplier.'%')
												->andWhere('s.status = 1')
												->getQuery()
   												->getResult();

				foreach ($suppliers as $supplier) {
					$supplier_list[] = array(
											 'id' => $supplier->getSupplierId(),
											 'value' => $supplier->getSupplierName() 
											 );
				}				
				echo json_encode($supplier_list);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
				
			}
	}

	/*
	*	AjaxCall: get supplier Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxSupplierDetails($supplierid)
	{
		try {
				$suppliers = $this->em->getRepository('models\inventory\Suppliers')->find($supplierid);
				$supplier_detail['supplier_id'] = $supplierid;
				$supplier_detail['supplier_name'] = $suppliers->getSupplierName();
				$supplier_detail['phone'] = $suppliers->getMobile();
				$supplier_detail['email'] = $suppliers->getEmail();
				$supplier_detail['address'] = $suppliers->getStreet();
				echo json_encode($supplier_detail);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
				
			}
	}

}

/* End of file supplier.php */
/* Location: ./application/controllers/supplier.php */
