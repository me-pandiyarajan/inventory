<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

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

	/**
	 *  Customer management controller.
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
		//show_error('Your not supposed to view this page! Bye');
		$this->load->view('pos/header/header');
		$this->load->view('pos/menu/menu');
		$this->load->view('pos/content_base');
		$this->load->view('pos/footer/footer');
	}

	/*
	 *	Add customer
	 */
	public function addCustomer()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		$data['form_action'] = 'pos/customer/addCustomer';
		
		$config = array(
               array(
                     'field'   => 'customer_name',
                     'label'   => 'Customer name',
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

		//$header['user_data'] = array('id'=>1,'firstName'=>"first",'lastName'=>"last");
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuPos();
		
		$data['group_options'] = $this->customerGroupDropDown();

		
		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('pos/header/header', $header);
			$this->load->view($menu);
			$this->load->view('pos/customer/addCustomer',$data);
			$this->load->view('pos/footer/footer');
		}
		else
		{
			$customer_name = $this->input->post('customer_name');

			$group = $this->input->post('group');
			$group = $this->em->getRepository('models\pos\PosGroupCustomer')->find($group);

			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$street = $this->input->post('street');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zip = $this->input->post('zip');
			$status = $this->input->post('status');

			try {
				
				$customer = new models\pos\PosCustomer;
				$customer->setCustomerName($customer_name);
				$customer->setEmail($email);
				$customer->setMobileNumber($mobile);
				$customer->setStreet($street);
				$customer->setCity($city);
				$customer->setState($state);
				$customer->setZipCode($zip);
				$customer->setDStreet($street);
				$customer->setDCity($city);
				$customer->setDState($state);
				$customer->setDZipCode($zip);
				$customer->setStatus($status);
				$customer->setDeleted(0);
				$customer->setGroupCustomerCustomerGroup($group);
				$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
				$customer->setCreatedBy($user);
				$customer->setLastUpdatedBy($user);
				
				$create_date = new \DateTime("now");
				$customer->setCreatedDate($create_date->getTimestamp());
				$this->em->persist($customer);
				$this->em->flush();

				$data['success'] ='<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									Customer added successfuly!
  									</div>';

				redirect('pos/Customer/listCustomers');

			}
			catch(Exception $e)
			{
				
				echo $e->getMessage();
			
			}
			
		}		
	}


	public function customerGroupDropDown()
	{
		$groups = $this->em->getRepository('models\pos\PosGroupCustomer')->findBy(array( 'deleted' => 0,'status' => 1 ));
		$group_options = array("NULL"=>"None");
		if(!empty($groups))
		{
			foreach($groups as $group)
			{
				$id = $group->getCustomerGroupId();
				$value = $group->getCustomerGroupName();
				$group_options[$id] = $value;			
			}
		}
		else
		{
			$group_options[''] = "No group available";
		}

		return $group_options;
	}


	/*
	*	list customers
	*	---------------------
	*	
	*/
	public function listCustomers()
	{

		try {
				$data['customers'] = $this->em->getRepository('models\pos\PosCustomer')->createQueryBuilder('p')
												->where('p.deleted = 0')
												// ->andWhere('p.groupCustomerCustomerGroup != :iden')
												// ->setParameter('iden', 'null')
												->getQuery()
   												->getResult();
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				$data['tablehead'] = array('Customer Name','Email','Mobile','Group','Status','Action');
	
				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 12:
						$data['visiblity'] = 0;
						break;
					case 13:
						$data['visiblity'] = 0;
						break;
				}

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/customer/listCustomers',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}


	/*
	*	fetch customer details
	*	---------------------
	*	input: customerid , action
	*		
	*/
	public function customerDetails($customerid = null, $action = null )
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		if($customerid != null && $action != null)
		{
			try{
				$data['customer'] = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$data['group_options'] = $this->customerGroupDropDown();
				
				$data['form_action'] = 'pos/customer/updateCustomer';

				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				switch ($group) {
					case 1:
						$data['visiblity'] = 1;
						break;
					case 2:
						$data['visiblity'] = 0;
						break;
				}


				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/customer/'.$action,$data);
				$this->load->view('pos/footer/footer');

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
	 *	Update customer
	 */
	public function updateCustomer()
	{
	
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		
		$config = array(
               array(
                     'field'   => 'customer_name',
                     'label'   => 'Customer name',
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
			$menu = $this->navigator->getMenuPos();

			if ($this->form_validation->run() === FALSE)
			{
				show_error('Your not supposed to view this page! Bye');
			}
			else
			{
				$customer_name = $this->input->post('customer_name');

				$group = $this->input->post('group');
				$group = $this->em->getRepository('models\pos\PosGroupCustomer')->find($group);

				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile');
				$street = $this->input->post('street');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$status = $this->input->post('status');
				$customerid = $this->input->post('customer_id');

				try {
					$data['customer'] = $customer = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
					$customer->setCustomerName($customer_name);
					$customer->setEmail($email);
					$customer->setMobileNumber($mobile);
					$customer->setStreet($street);
					$customer->setCity($city);
					$customer->setState($state);
					$customer->setZipCode($zip);
					$customer->setDStreet($street);
					$customer->setDCity($city);
					$customer->setDState($state);
					$customer->setDZipCode($zip);
					$customer->setStatus($status);
					$customer->setDeleted(0);
					$customer->setGroupCustomerCustomerGroup($group);
						$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
					$customer->setLastUpdatedBy($user);
					$customer->setLastUpdatedDate($create_date = new \DateTime("now"));
					$this->em->persist($customer);
					$this->em->flush();
                   
		          	// redirect('pos/customer/listCustomers'); 
					$group = $this->ion_auth->GetUserGroupId();
					$menu = $this->navigator->getMenuPos();
					switch ($group) {
						case 1:
							$data['visiblity'] = 1;
							break;
						case 2:
							$data['visiblity'] = 0;
							break;
					}

					 $this->session->set_flashdata('customeredit','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Customer detail updated successfuly!</b></div>');
					redirect('pos/customer/listCustomers');
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
					log_message('error',$e->getMessage());
				}
			
			}			
	
	}


		/*
		* customer delete
		*/
		public function deletecustomer($id)
		{
			
			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$group = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuPos();
			$data['customer'] = $customer = $this->em->getRepository('models\pos\PosCustomer')->find($id);
			$customer->setDeleted(1);
			$customer->setStatus(0);
			$this->em->persist($customer);
			$this->em->flush();
			$this->session->set_flashdata('customerdelect','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Customer Deleted successfuly</b></div>');
			redirect('pos/customer/listcustomers'); 
		}


		/*
		*	AjaxCall: get customer list  
		*	---------------------
		*	input : customer name or id
		*
		*/
		public function ajaxCustomersLookup($customer)
		{
			try {
					$customers = $this->em->getRepository('models\pos\PosCustomer')->createQueryBuilder('c')
													->where('c.customerId LIKE :id')
													->setParameter('id', '%'.$customer.'%')
													->orWhere('c.customername LIKE :name')
													->setParameter('name', '%'.$customer.'%')
													->andWhere('c.status = 1')
													->getQuery()
	   												->getResult();
	   				
	   				if(!empty($customers)) {
	   					foreach ($customers as $customer) {
						$customer_list[] = array(
												 'id' => $customer->getCustomerId(),
												 'value' => $customer->getCustomername() 
												 );
						}
	   				}
	   				else {
	   					$customer_list = array();
	   				}
									
					echo json_encode($customer_list);
				}
				catch(Exception $e)
				{
					log_message('error',$e->getMessage());
					
				}
		}


		/*
		*	AjaxCall: get customer Details  
		*	---------------------
		*	input : id
		*
		*/
		public function ajaxCustomerDetails($customerid)
		{
			try {
					$customers = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
					$customer_detail['customer_id'] = $customerid;
					$customer_detail['customer_name'] = $customers->getCustomername();
					$customer_detail['customer_phone'] = $customers->getMobileNumber();
					$customer_detail['customer_email'] = $customers->getEmail();
						
					$customer_detail['customer_address']['street'] = $customers->getStreet();
					$customer_detail['customer_address']['city'] = $customers->getCity();
					$customer_detail['customer_address']['state'] = $customers->getState();
					$customer_detail['customer_address']['zipcode'] = $customers->getZipCode();

					$customer_detail['customer_d_address']['dstreet'] = $customers->getDStreet();
					$customer_detail['customer_d_address']['dcity'] = $customers->getDCity();
					$customer_detail['customer_d_address']['dstate'] = $customers->getDState();
					$customer_detail['customer_d_address']['dzipcode'] = $customers->getDZipCode();

					if($customers->getGroupCustomerCustomerGroup() != NULL)
					{
						$customer_detail['customer_group']['cg_id'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupId();
						$customer_detail['customer_group']['cg_name'] = $customers->getGroupCustomerCustomerGroup()->getCustomerGroupName();
						$customer_detail['customer_group']['cg_discount_percent'] = $customers->getGroupCustomerCustomerGroup()->getDiscountpercent();
					}
					else
					{
						$customer_detail['customer_group']['cg_id'] = null;
						$customer_detail['customer_group']['cg_name'] = "General";
						$customer_detail['customer_group']['cg_discount_percent'] = 1;
					}



					echo json_encode($customer_detail);
				
				}
				catch(Exception $e)
				{
					log_message('error',$e->getMessage());
					
				}
		}


}

/* End of file customer.php */
/* Location: ./application/controllers/pos/customer.php */