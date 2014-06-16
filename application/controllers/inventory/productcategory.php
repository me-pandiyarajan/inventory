<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductCategory extends CI_Controller {

	/**
	 * Product categories management controller.
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

	public function addproductcategory()
	{

	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$data['form_action'] = "inventory/ProductCategory/addproductcategory";
      
		$config = array(
               array(
                     'field'   => 'productcategory',
                     'label'   => 'Product Category',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'comments',
                     'label'   => 'Comments',
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
		$menu = $this->navigator->getMenuInventory();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('inventory/general/header', $header);
			$this->load->view($menu);
			$this->load->view('inventory/ProductCategory/productcategory',$data);
			$this->load->view('inventory/general/footer');
		}
		else
		{
			try {
			    $productcategory = new models\inventory\Categories;
				$productcategory->setCategoryName($this->input->post('productcategory'));
				$productcategory->setComments($this->input->post('comments'));

				$created_date = new\DateTime("now");
				$creator = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
				$productcategory->setCreatedBy($creator);
				$productcategory->setCreatedDate($created_date->getTimestamp());
				
				$productcategory->setStatus($this->input->post('status'));
				$this->em->persist($productcategory);
	            $this->em->flush();
				$this->session->set_flashdata('productcategory', '<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Category Successfully</b></div>');
				redirect('inventory/ProductCategory/addproductcategory');
				
	        }
		   catch(Exception $e)
		   {
			 echo $e->getMessage();
		   }
	  }
	}


	/*
	*	list categories
	*	---------------------
	*	
	*/
	public function listCategories()
	{

		try {
				$data['categories'] = $this->em->getRepository('models\inventory\Categories')->findAll();
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenuInventory();
				$data['tablehead'] = array('CategoryId','Category Name','Description','Status','Action');

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
				$this->load->view('inventory/ProductCategory/listcategories',$data);
				$this->load->view('inventory/general/footer');
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
	
	}

	/*
	*	fetch category details
	*	---------------------
	*	input: categoryid , action
	*	
	*	
	*/
	public function categoryDetails($categoryid = null, $action = null )
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');

		if($categoryid != null && $action != null)
		{
			try{
				$data['category'] = $this->em->getRepository('models\inventory\Categories')->find($categoryid);
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				
				$data['form_action'] = 'inventory/ProductCategory/updateCategory';

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
				$this->load->view('inventory/ProductCategory/'.$action,$data);
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
	 *	Update Category
	 */
	public function updateCategory()
	{
	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['form_action'] = "inventory/ProductCategory/updateCategory";
      
		$config = array(
           array(
                 'field'   => 'productcategory',
                 'label'   => 'Product Category',
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'comments',
                 'label'   => 'Comments',
                 'rules'   => 'required'
              )
          );

		$this->form_validation->set_rules($config);
		
		/*
		*	set fields here, that to be re-populating the form
		*/
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();

		if ($this->form_validation->run() === FALSE)
		{	
			show_error('Your not supposed to view this page! Bye');
		}
		else
		{
			
			$category_id = $this->input->post('category_id');
			try {

				$productcategory = $this->em->getRepository('models\inventory\Categories')->find($category_id);
				$productcategory->setCategoryName($this->input->post('productcategory'));
				$productcategory->setComments($this->input->post('comments'));
				$productcategory->setStatus($this->input->post('status'));

				$updated_date = new\DateTime("now");
				$updater = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
				$productcategory->setLastUpdatedBy($updater);
				$productcategory->setLastUpdatedDate($updated_date);
				$this->em->persist($productcategory);
				$this->em->flush();
               
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
				 $this->session->set_flashdata('categoryedit','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Category detail updated successfuly!</b></div>');
				redirect('inventory/ProductCategory/listcategories');
				

			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
			
		}			
	
	}

	/*
	* 	Category delete
	*/
	public function deleteCategory($id)
		{		
			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$group = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenuInventory();

			$data['category'] = $category = $this->em->getRepository('models\inventory\Categories')->find($id);
			$category->setStatus(0);



			$this->em->persist($category);
			$this->em->flush();
			$this->session->set_flashdata('categorydelete','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Category Deleted successfuly</b></div>');
			redirect('inventory/ProductCategory/listcategory'); 
		}	

	

	

}

/* End of file ProductCategory.php */
/* Location: ./application/controllers/ProductCategory.php */
