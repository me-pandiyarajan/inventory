<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerGroup extends CI_Controller {

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


	public function addCustomerGroup()
	{

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['form_action'] = "pos/CustomerGroup/addCustomerGroup";
	      
			$config = array(
	               array(
	                     'field'   => 'customergroupname',
	                     'label'   => 'Customer Group Name',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'discountpercent',
	                     'label'   => 'Discount Percent',
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
				$data['customerlist']=$this->em->getRepository('models\pos\PosCustomer')->findBy(array('deleted'=>0,'groupCustomerCustomerGroup'=>null));
				$data['tablehead']=array("Customer Name","Email Id");

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/CustomerGroup/addcustomergroup',$data);
				$this->load->view('pos/footer/footer');
			}
			else
			{
				try {

					$newcustomergroup = new models\pos\PosGroupCustomer;
					$newcustomergroup->setCustomerGroupName($this->input->post('customergroupname'));
					$newcustomergroup->setDiscountpercent($this->input->post('discountpercent'));
					$newcustomergroup->setStatus($this->input->post('status'));
					$newcustomergroup->setDeleted(0);
					$author = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
					$newcustomergroup->setCreatedBy($author);
					$newcustomergroup->setLastUpdatedBy($author);
					$created_date = new\DateTime("now");
					$newcustomergroup->setCreatedDate($created_date->getTimestamp());
					$updated_date = new\DateTime("now");
					$newcustomergroup->setLastUpdatedDate($updated_date->getTimestamp());
					$this->em->persist($newcustomergroup);
		            $this->em->flush();
		            $groupid = $newcustomergroup->getCustomerGroupId();
		            $groupCustomers = $this->input->post('customers');
		            if(!empty($groupCustomers))
		            {
		            $customergroup = $this->em->getRepository('models\pos\PosGroupCustomer')->find($groupid);
		            $customers = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('customerId'=>$this->input->post('customers')));
					$updated_date = new\DateTime("now");
					foreach ($customers as $customer) {
						$customer->setGroupCustomerCustomerGroup($customergroup);
						$customer->setLastUpdatedBy($author);
						$customer->setLastUpdatedDate($updated_date->getTimestamp());
					}
					$this->em->persist($customer);
		            $this->em->flush();
					}
					$this->session->set_flashdata('cusgroupadd', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Customer Group Successfully Added</b></div>');
					redirect('pos/CustomerGroup/listCustomerGroup');

		        }
			   catch(Exception $e)
			   {
				 echo $e->getMessage();
			   }
			}
	}



	public function listCustomerGroup()
	{

		try {
				$customergroup=$data['customergroup'] = $this->em->getRepository('models\pos\PosGroupCustomer')->findBy(array('deleted'=>0));
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				$data['tablehead'] = array('Group Name','Discount %','No of Customers','Status','Created Date','Action');

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
				$this->load->view('pos/CustomerGroup/listcustomergroup',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}


	/*
	 *	Update Customer Group
	 */
	
	public function editCustomerGroup($id)
	{

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	      
			$config = array(
	               array(
	                     'field'   => 'customergroupname',
	                     'label'   => 'Customer Group Name',
	                     'rules'   => 'required'
	                  ),
	               array(
	                     'field'   => 'discountpercent',
	                     'label'   => 'Discount Percent',
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
				$customergroupid=$id;
				$editcustomergroup = $this->em->getRepository('models\pos\PosGroupCustomer')->find($customergroupid);
				$data['customergroupname'] = $editcustomergroup->getCustomerGroupName();
				$data['discountpercent'] = $editcustomergroup->getDiscountpercent();
				$data['status'] = $editcustomergroup->getStatus();
				$data['customergroupid'] = $id;

				$data['tablehead'] = array("Customer Name","Email Id");

				$data['customerlist'] = $this->em->getRepository('models\pos\PosCustomer')->createQueryBuilder('c')
												->where('c.groupCustomerCustomerGroup = :id')
												->setParameter('id',$id)
												->orWhere('c.groupCustomerCustomerGroup is NULL')
												->getQuery()
   												->getResult();
				/*$products = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('p')
												->where('p.sku LIKE :sku')
												->setParameter('sku', '%'.$product.'%')
												->orWhere('p.productName LIKE :name')
												->setParameter('name', '%'.$product.'%')
												->andWhere('p.approved = 1')
												->getQuery()
   												->getResult();*/
				// $data['customerlist'] = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('groupCustomerCustomerGroup'=>));

				$this->load->view('pos/header/header', $header);
				$this->load->view($menu);
				$this->load->view('pos/CustomerGroup/editcustomergroup',$data);
				$this->load->view('pos/footer/footer');
			}
			else
			{
				

				try {
					$customergroupid=$this->input->post('id');

					$newcustomergroup = $this->em->getRepository('models\pos\PosGroupCustomer')->find($customergroupid);
					$newcustomergroup->setCustomerGroupName($this->input->post('customergroupname'));
					$newcustomergroup->setDiscountpercent($this->input->post('discountpercent'));
					$newcustomergroup->setStatus($this->input->post('status'));
					$updator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
					$newcustomergroup->setLastUpdatedBy($updator);
					$updated_date = new\DateTime("now");
					$newcustomergroup->setLastUpdatedDate($updated_date->getTimestamp());
					$this->em->persist($newcustomergroup);
		            $this->em->flush();
					
					$customergroups = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('groupCustomerCustomerGroup'=>$customergroupid));
					foreach ($customergroups as $customergroup) {
						$customergroup->setGroupCustomerCustomerGroup();
						$this->em->persist($customergroup);
		            	$this->em->flush();
					}
					
					
		            $groupCustomers = $this->input->post('customers');
		            if(!empty($groupCustomers))
		            {
		            $customergroup = $this->em->getRepository('models\pos\PosGroupCustomer')->find($customergroupid);
		            $customers = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('customerId'=>$this->input->post('customers')));
					$updated_date = new\DateTime("now");
					$author = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
					foreach ($customers as $customer) {
						$customer->setGroupCustomerCustomerGroup($customergroup);
						$customer->setLastUpdatedBy($author);
						$customer->setLastUpdatedDate($updated_date->getTimestamp());
					}
					$this->em->persist($customer);
		            $this->em->flush();
					}

					$this->session->set_flashdata('cusgroupedit', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Customer Group Successfully Updated</b></div>');
					



					redirect('pos/CustomerGroup/listCustomerGroup');

		        }
			   catch(Exception $e)
			   {
				 echo $e->getMessage();
			   }
			}
	}

	/*
	 *	View Customer Group
	 */
	
	public function viewCustomerGroup($id)
	{

		try {
				$data['customergrouplist'] = $this->em->getRepository('models\pos\PosCustomer')->findBy(array('deleted'=>0,'groupCustomerCustomerGroup'=>$id));
				//$data['groupname'] = $this->em->getRepository('model\pos\PosGroupCustomer')->findBy(array('customerGroupId'=>$id));
				$data['groupname'] = $this->em->getRepository('models\pos\PosGroupCustomer')->find($id);
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuPos();
				$data['tablehead'] = array('Customer Name','Email','Mobile','Status','Action');

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
				$this->load->view('pos/CustomerGroup/viewcustomergroup',$data);
				$this->load->view('pos/footer/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}	

	/*
	* 	Customer Group delete
	*/
	public function deleteCustomerGroup($id)
	{
		
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$data['customer'] = $customer = $this->em->getRepository('models\pos\PosGroupCustomer')->find($id);
		$customer->setStatus(0);
		$customer->setDeleted(1);
		$updator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
		$customer->setLastUpdatedBy($updator);
		$updated_date = new\DateTime("now");
		$customer->setLastUpdatedDate($updated_date->getTimestamp());
		$this->em->persist($customer);
		$this->em->flush();
		$this->session->set_flashdata('cusgroupdelect','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Customer Group Deleted Successfuly</b></div>');
		redirect('pos/CustomerGroup/listCustomerGroup');
	}	

	public function removeCustomerCustomerGroup($id)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$customer = $this->em->getRepository('models\pos\PosCustomer')->find($id);
		$customer->setGroupCustomerCustomerGroup();

		$updator = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
		$customer->setLastUpdatedBy($updator);
		
		$updated_date = new\DateTime("now");

		$customer->setLastUpdatedDate($updated_date);
		
		$this->em->persist($customer);
		$this->em->flush();
		$this->session->set_flashdata('cusremoved','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Customer Group Deleted Successfuly</b></div>');
		redirect('pos/CustomerGroup/listCustomerGroup');
	}	
	


}


?>