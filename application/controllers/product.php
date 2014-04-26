<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

/**
* Index Page for this controller.
*
* Maps to the following URL
* http://example.com/index.php/welcome
* - or -
* http://example.com/index.php/welcome/index
* - or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see http://codeigniter.com/user_guide/general/urls.html
*/
public $em; 

function __construct()  {
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('navigator');

	    $this->em = $this->doctrine->em;
		$this->navigator->checkLogin();
	}
 
	public function index()
	{
	
	}
	public function image_upload()
	{
	    $config['upload_path'] = './assets/product_images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        
		$this->load->library('upload', $config);
        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('image'))
		{
		
			$error = array('error' => $this->upload->display_errors());
			
            return $error;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
            return $data;
		}
	}
	public function commenData()
	{
	    $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		$this->load->view('general/header',$header);
		$menu = $this->navigator->getMenu();
	    $action['form_action'] = "product/addProduct";
		$supplier_data = $this->em->getRepository('models\inventory\Suppliers')->findAll();
		$TaxClass_data =  $this->em->getRepository('models\inventory\TaxClass')->findAll();
		$Categories_data = $this->em->getRepository('models\inventory\Categories')->findAll();
		$supplier = array();
		
		if(!empty($supplier_data))
		{
			foreach($supplier_data as $sup)
			{
				$id = $sup->getSupplierId();
				$value = $sup->getSupplierName();
				 $supplier[$id] = $value;
				
			}
		}
		else
		{
			$supplier[0] = "No suppliers available";
		}
		
		
		if(!empty($TaxClass_data))
		{
			foreach($TaxClass_data as $tax)
			{
				$id = $tax->getTaxClassId();
				$value = $tax->getTaxClassName();
				$TaxClass[$id] = $value;
			}
		}
		else
		{
			$TaxClass[0] = "No tax group available";
		}
		
		
		if(!empty($Categories_data))
		{
			foreach($Categories_data as $cat)
			{
				$id = $cat->getCategoryId();
				$value = $cat->getCategoryName();
				$Categories[$id] = $value;
			}
		}
		else
		{
			$Categories[0] = "No categories available";
		}
		
		$action['supplier'] = $supplier;
		$action['TaxClass'] = $TaxClass;
		$action['Categories'] = $Categories;
		switch($group_id)
			{	   
			case 1: 
				$action['visiblity'] = 1;  
                $this->load->view($menu);
				$this->load->view('product/productadd',$action);
			   break;
			case 2:
				$action['visiblity'] = 2;  
				$this->load->view($menu);
				$this->load->view('product/productadd',$action);
				break;
			case 3:
				$action['visiblity'] = 3;  
				$this->load->view($menu);
				$this->load->view('product/productadd',$action);
				break;
			}
			$this->load->view('general/footer');
	}
	
	public function addProduct()
	{
	$config = array(
               array(
                     'field'   => 'category_id',
                     'label'   => 'category',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'productName',
                     'label'   => 'ProductName',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'description',
                     'label'   => 'Description',
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'short_description',
                     'label'   => 'short_description',
                     'rules'   => 'required'
                  )
			 );
		$this->form_validation->set_rules($config);
		
		/*
		*	set fields here, that to be re-populating the form
		*/
		  $fields = array('country_of_manufacture','quantity','weight','width','image');
		foreach ($fields as $field) {
			$this->form_validation->set_rules($field);
		} 
	    
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>','</b></div>');
		
		  if ($this->form_validation->run() == FALSE)
			{
			$this->commenData();
			}
		 else
			{  
			   $action = $this->image_upload();
			   
			   if(!empty($action['error']))
			   {		
	              $this->commenData();
				  $image_path = "No"; 
				  var_dump($action['error']); 
			   }
			   else
			   {
		       $image_path = $action['upload_data']['full_path']; 
			  
				try
			    {
					$header = $this->ion_auth->GetHeaderDetails();
					$group_id = $this->ion_auth->GetUserGroupId();
					$product = new models\inventory\Products;
					$product->setProductName($this->input->post('productName'));
					$product->setDescription($this->input->post('description'));
					$product->setShortDescription($this->input->post('short_description'));
					$product->setCountryOfManufacture($this->input->post('country_of_manufacture'));
					$product->setStatus($this->input->post('status'));
					$product->setTrack($group_id);
					$product->setPrice($this->input->post('price'));
					$product->setGroupPrice($this->input->post('group_price'));
					//$product->setSpecialPriceFrom($this->input->post('special_price_from'));
					//$product->setSpecialPriceTo($this->input->post('special_price_to'));
					$product->setInstallationCharges($this->input->post('installation_charges'));
					$product->setTotalCost($this->input->post('total_cost'));
					//$product->setGrandTotal($this->input->post(''));
					$product->setUploadImage($image_path);
					$product->setQuantity($this->input->post('quantity'));
					$product->setStockAvailability($this->input->post('stock_availability'));
					$product->setSafetyStockLevel($this->input->post('safety_stock_level'));
					$product->setWeight($this->input->post('weight'));
					$product->setWidth($this->input->post('width'));
					$product->setLength($this->input->post('length'));
					$product->setHeight($this->input->post('height'));
					$product->setDesignName($this->input->post('design_name'));
					$product->setShade($this->input->post('shade'));
					$create_date = new \DateTime("now");
					$product->setCreatedDate($create_date);
					//$product->setLastUpdated();
					$product->setProductActivated($create_date);
					//$product->setApproved());
					//$product->setApprovedDate();
					$product->setCreatedBy($header['id']);
					//$product->setLastUpdatedBy();
					//$product->setApprovedBy(); 
					$supplier = $this->em->getRepository('models\inventory\Suppliers')->find($this->input->post('supplier_id'));
					$TaxClass =  $this->em->getRepository('models\inventory\TaxClass')->find($this->input->post('tax_id'));
					$Categories = $this->em->getRepository('models\inventory\Categories')->find($this->input->post('category_id'));
					$product->setCategoriesCategory($Categories);
					$product->setSuppliersSupplier($supplier);
					$product->setTaxClassTaxClass($TaxClass);
					$this->em->persist($product);
					$this->em->flush();
					$this->session->set_flashdata('AddProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Added Successfully</b></div>');
					redirect('product/addProduct'); 
			    }
            catch(Exception $e)
				{
				log_message('error', $e->getMessage()); 
				}
			 }
          }				
	}
	public function editProduct($id)
	{
	 
	}
    public function newproductlist()
	{
	$header['user_data']=$this->ion_auth->GetHeaderDetails();
	$user['data'] = $this->em->getRepository('models\inventory\products')->findAll();
    $group = $this->ion_auth->GetUserGroupId();
	
	switch($group)
	{
	case 1:
	    $user['tablehead'] = array('ProductCode','ProductName','categories','Quality','Supplier','Price','Safetylevel','Edit','Approve','Revert','Delete'); 
		$user['visiblity'] = 1;
		$this->load->view('general/header',$header);
	   	$this->load->view('general/superadminmenu');
		$this->load->view('product/newproductlist',$user);
	    $this->load->view('general/footer');
		break;
	case 2:
	    $user['tablehead'] = array('ProductCode','ProductName','categories','Quality','Supplier','Price','Safetylevel','Action'); 
		$user['visiblity'] = 2;
		$this->load->view('general/header',$header);
	   	$this->load->view('general/adminmenu');
		$this->load->view('product/newproductlist',$user);
	    $this->load->view('general/footer');
		break;
		}
   }
public function productlist()
{
    $header['user_data']=$this->ion_auth->GetHeaderDetails();
	$user['data'] = $this->em->getRepository('models\inventory\products')->findBy(array('track' =>1,'status' => 'Enable'));
	//$user['data'] = $this->em->getRepository('models\inventory\products')->findAll();
    $group = $this->ion_auth->GetUserGroupId();
	
			
	switch($group)
	{
	case 1:
	    $user['tablehead'] = array('ProductCode','ProductName','categories','Quality','Supplier','Price','Safetylevel','Action'); 
		$user['visiblity'] = 1;
		$this->load->view('general/header',$header);
	   	$this->load->view('general/superadminmenu');
		$this->load->view('product/productlist',$user);
	    $this->load->view('general/footer');
		break;
	case 2:
	    $user['tablehead'] = array('ProductCode','ProductName','categories','Quality','Supplier','Price','Safetylevel','Action'); 
		$user['visiblity'] = 2;
		$this->load->view('general/header',$header);
	   	$this->load->view('general/adminmenu');
		$this->load->view('product/productlist',$user);
	    $this->load->view('general/footer');
		break;
		}
		}
public function productview($id)
{   
        $user['data'] = $this->em->getRepository('models\inventory\products')->findBy(array('productGenId'=>$id)); 
	    $header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$this->load->view('general/header',$header);
	    $this->load->view('general/superadminmenu');
		$this->load->view('product/productview',$user);
	    $this->load->view('general/footer');
}
  
}
?>

