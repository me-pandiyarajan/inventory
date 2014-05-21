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
	$this->load->view('test');
	}

	public function image_upload()
	{
	    $config['upload_path'] = './assets/product_images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '750';
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

	public function form_validation()
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
                     'field'   => 'supplier_id',
                     'label'   => 'supplier_id',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'design_name',
                     'label'   => 'Design Name',
                     'rules'   => 'required'
                  ),
				  array(
                     'field'   => 'shade',
                     'label'   => 'Shade',
                     'rules'   => 'required'
                  )
			 );
		$this->form_validation->set_rules($config);
		
		/*
		*	set fields here, that to be re-populating the form
		*/
		  $fields = array('country_of_manufacture','quantity','unit','supplier_id','weight','width','image','status','price','tax_id','installation_charges','stock_availability','safety_stock_level','POS_stock_level','material','dimunit','length','height');
		foreach ($fields as $field) {
			$this->form_validation->set_rules($field);
		} 
	    
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>','</b></div>');
	}

	public function addProduct()
	{
	    $this->form_validation();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
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
		
		  if ($this->form_validation->run() == FALSE)
			{
				switch($group_id)
				{	   
				case 1: 
					$action['visiblity'] = 1;  
	                
				   break;
				case 2:
					$action['visiblity'] = 2;  
					break;
				case 3:
					$action['visiblity'] = 3;  
					break;
				}
				$this->load->view('general/header',$header);
				$this->load->view($menu);
				$this->load->view('product/productadd',$action);
				$this->load->view('general/footer',$header);
			}
		 else
			{  
			   $image_action = $this->image_upload();
			   if(!empty($image_action['error']))
			   {	
				  $image_path = 0;
			   }
			   else
			   {
		       	$image_path = site_url()."assets/product_images/".$image_action['upload_data']['file_name']; 
			   }
			  	$this->em->getConnection()->beginTransaction();
				try
			    {
					$header = $this->ion_auth->GetHeaderDetails();
					$group_id = $this->ion_auth->GetUserGroupId();
					$product = new models\inventory\Products;
					$product->setStatus($this->input->post('status'));
					$product->setPrice($this->input->post('price'));
					$product->setGroupPrice($this->input->post('group_price'));
					//$product->setSpecialPriceFrom($this->input->post('special_price_from'));
					//$product->setSpecialPriceTo($this->input->post('special_price_to'));
					$product->setInstallationCharges($this->input->post('installation_charges'));
					$product->setTotalCost($this->input->post('total_cost'));
					$product->setGrandTotal($this->input->post('grand_total'));
					$product->setPosStockLevel($this->input->post('POS_stock_level'));
					$product->setStockAvailability($this->input->post('stock_availability'));
					$product->setSafetyStockLevel($this->input->post('safety_stock_level'));
					$product->setProductName($this->input->post('productName'));
					$product->setDescription($this->input->post('description'));
					$product->setShortDescription($this->input->post('short_description'));
					$product->setCountryOfManufacture($this->input->post('country_of_manufacture'));
					$product->setUploadImage($image_path);
					$product->setUnit($this->input->post('unit'));
					$product->setMaterial($this->input->post('material'));
					$product->setDimenUnit($this->input->post('dimunit'));
					$product->setQuantity($this->input->post('quantity'));
					$product->setWeight($this->input->post('weight'));
					$product->setWidth($this->input->post('width'));
					$product->setLength($this->input->post('length'));
					$product->setHeight($this->input->post('height'));
					$design = $this->input->post('design_name');
					$product->setDesignName($design);
					$shade = $this->input->post('shade');
					$product->setShade($shade);
					if($group_id != 1){$product->setStatus(0);}else{$product->setStatus(1);}
					$create_date = new \DateTime("now");
					$product->setCreatedDate($create_date);
					$product->setProductActivated($create_date);
					$product->setApproved($group_id);
					$product->setApprovedDate($create_date);
					$product->setCreatedBy($header['id']);
					$product->setApprovedBy($header['id']); 
				    $supplier_id = $this->input->post('supplier_id');
					$supplier = $this->em->getRepository('models\inventory\Suppliers')->find($supplier_id);
					$TaxClass =  $this->em->getRepository('models\inventory\TaxClass')->find($this->input->post('tax_id'));
					$category_id = $this->input->post('category_id');
					$Categories = $this->em->getRepository('models\inventory\Categories')->find($category_id);
					$category = $Categories->getCategoryName();
					$product->setCategoriesCategory($Categories);
					$product->setSuppliersSupplier($supplier);
					$product->setTaxClassTaxClass($TaxClass);
					$product->setDeleted(0);
					$this->em->persist($product);
					$this->em->flush();					
                    $product_id = $product->getProductGenId();
					list($response,$barCodeImage,$PLU,$SKU) = $this->getSKU_PLU($product_id,$supplier_id,$inv_counrty="INDIA",$inv_city="CHENNAI",$category,$design,$shade);
					$k = array($response,$barCodeImage,$PLU,$SKU);
					if(!$response)
					{
						$this->em->getConnection()->rollback();
						$this->session->set_flashdata('ProductNot', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Not Added</b></div>');
					    redirect('product/addProduct');  
					}
					else
					{
					$product = $this->em->getRepository('models\inventory\Products')->find($product_id);
					$product->setProductIdPlu($PLU);
					$product->setSku($SKU);
					$product->setBarcodeimage($barCodeImage);
					$this->em->persist($product);
					$this->em->flush();
					$this->em->getConnection()->commit();
					$this->session->set_flashdata('AddProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Added Successfully</b></div>');
					redirect('product/addProduct'); 
					}
			    }
            catch(Exception $e)
				{
				 $this->em->getConnection()->rollback();
                 throw $e; 
				}
			 }			
	}

	/*
	*	fetch product details
	*	---------------------
	*	input: productid , action
	*	
	*	
	*/
	public function productDetails($productid = null, $actionview = null )
	{
		if($productid != null && $actionview != null)
		{
			try{
				$action['product'] = $this->em->getRepository('models\inventory\products')->find($productid);
				$header['user_data'] = $this->ion_auth->GetHeaderDetails();
				
				$action['form_action'] = 'product/editProduct';
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
				$group = $this->ion_auth->GetUserGroupId();
				$menu = $this->navigator->getMenu();
				switch ($group) {
					case 1:
						$action['visiblity'] = 1;
						break;
					case 2:
						$action['visiblity'] = 2;
						break;
					case 3:
						$action['visiblity'] = 3;
						break;
				}
                $actionpage= "product/".$actionview."";
				$this->load->view('general/header', $header);
				$this->load->view($menu);
				$this->load->view($actionpage,$action);
				$this->load->view('general/footer',$header);

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
	 *	Update product
	 */
	public function editProduct()
	{
			$this->form_validation();
			$header['user_data'] = $this->ion_auth->GetHeaderDetails();
			$group_id = $this->ion_auth->GetUserGroupId();
			$menu = $this->navigator->getMenu();
			$id = $this->input->post('productGenId');
		   	if ($this->form_validation->run() == FALSE)
			{
				$this->productDetails($id,'productedit');
			}
		 	else
			{  		
			   $action = $this->image_upload();		   
			   if(!empty($action['error']))
			   {		
                 $this->productDetails($id,'productedit');
				 $image_path = 0;
			   }
			   else
			   {
              	$image_path = site_url()."assets/product_images/".$action['upload_data']['file_name'];
               }
			   $this->em->getConnection()->beginTransaction();
				
				try
			    {
					$header['user_data'] = $this->ion_auth->GetHeaderDetails();
					$group_id = $this->ion_auth->GetUserGroupId();
					$data['product'] = $product = $this->em->getRepository('models\inventory\Products')->find($id);
					$product->setProductName($this->input->post('productName'));
					$product->setDescription($this->input->post('description'));
					$product->setShortDescription($this->input->post('short_description'));
					$product->setCountryOfManufacture($this->input->post('country_of_manufacture'));
					$product->setStatus($this->input->post('status'));
					$product->setPrice($this->input->post('price'));
					$product->setGroupPrice($this->input->post('group_price'));
					//$product->setSpecialPriceFrom($this->input->post('special_price_from'));
					//$product->setSpecialPriceTo($this->input->post('special_price_to'));
					$product->setInstallationCharges($this->input->post('installation_charges'));
					$product->setTotalCost($this->input->post('total_cost'));
					//$product->setGrandTotal($this->input->post(''));
					$product->setUploadImage($image_path);
					$product->setQuantity($this->input->post('quantity'));
					$product->setUnit($this->input->post('unit'));
					$product->setMaterial($this->input->post('material'));
					$product->setDimenUnit($this->input->post('dimunit'));
					$product->setStockAvailability($this->input->post('stock_availability'));
					$product->setSafetyStockLevel($this->input->post('safety_stock_level'));
					$product->setPosStockLevel($this->input->post('POS_stock_level'));
					$product->setWeight($this->input->post('weight'));
					$product->setWidth($this->input->post('width'));
					$product->setLength($this->input->post('length'));
					$product->setHeight($this->input->post('height'));
					$design = $this->input->post('design_name');
					$product->setDesignName($design);
					$shade = $this->input->post('shade');
					$product->setShade($shade);
					if($group_id == 3){$product->setApproved($group_id);$product->setStatus($this->input->post('Status'));}
					$update_date = new\DateTime("now");
					$product->setLastUpdated($update_date);
					$product->setLastUpdatedBy($header['user_data']['id']);
					$supplier_id = $this->input->post('supplier_id');
					$supplier = $this->em->getRepository('models\inventory\Suppliers')->find($supplier_id);
					$TaxClass =  $this->em->getRepository('models\inventory\TaxClass')->find($this->input->post('tax_id'));
					$category_id = $this->input->post('category_id');
					$Categories = $this->em->getRepository('models\inventory\Categories')->find($category_id);
					$category = $Categories->getCategoryName();
					$product->setCategoriesCategory($Categories);
					$product->setSuppliersSupplier($supplier);
					$product->setTaxClassTaxClass($TaxClass);
					if($group_id == 3){$product->setApproved($group_id);$product->setStatus(1);}
						$this->em->persist($product);
						$this->em->flush();
						$product_id = $product->getProductGenId();
						list($response,$barCodeImage,$PLU,$SKU) = $this->getSKU_PLU($product_id,$supplier_id,$inv_counrty="INDIA",$inv_city="CHENNAI",$category,$design,$shade);
						$k = array($response,$barCodeImage,$PLU,$SKU);
					if(!$response)
					{
						$this->em->getConnection()->rollback();
						$this->session->set_flashdata('ProductNot', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Cannot be updated</b></div>');
					    redirect('product/productlist');  
					}
					else
					{
						$product = $this->em->getRepository('models\inventory\Products')->find($product_id);
						$product->setProductIdPlu($PLU);
						$product->setSku($SKU);
						$product->setBarcodeimage($barCodeImage);
						$this->em->persist($product);
						$this->em->flush();
						$this->em->getConnection()->commit();
						$this->session->set_flashdata('EditProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Updated  Successfully</b></div>');
						if($group_id == 3)
						{
							redirect('product/revertproductlist'); 
						}
						else
						{
							redirect('product/newproductlist'); 
						}
					}					
			    }
	       		catch(Exception $e)
	        	{
					log_message('error', $e->getMessage()); 
				}
			 
			 }
	}

	/*
	*	list New Product List
	*	---------------------
	*	
	*/
    public function newproductlist()
	{
	$header['user_data']=$this->ion_auth->GetHeaderDetails();
	$group = $this->ion_auth->GetUserGroupId();
	$menu = $this->navigator->getMenu();
	if($group == 2)
	{
	$user['data'] = $this->em->getRepository('models\inventory\products')->findBy(array('approved' => 3));
    }
	else
	{
	$user['data'] = $this->em->getRepository('models\inventory\products')->findBy(array('approved' =>array(2,3)));
	}
	
		switch($group)
		{
			case 1:
			    $user['tablehead'] = array('Product Code','Product Name','Categories','Quantity','Supplier','Price','Safetylevel','Action'); 
				$user['visiblity'] = 1;
				break;
			case 2:
			    $user['tablehead'] = array('Product Code','Product Name','Categories','Quantity','Supplier','Action'); 
				$user['visiblity'] = 2;
				break;
		}
		$this->load->view('general/header',$header);
	   	$this->load->view($menu);
		$this->load->view('product/newproductlist',$user);
	    $this->load->view('general/footer');
   }
   
   /*
	*	list Product List-Approved Product
	*	----------------------------------
	*	
	*/
	public function productlist()
	{
		
		$header['user_data']=$this->ion_auth->GetHeaderDetails();

		if($this->input->post())
		{
			$params = array('approved' => 1);

			foreach ($this->input->post() as $key => $value) 
			{

				if(strlen($value) > 0)
				{
					switch ($key) {
						case "category_id":
							$category_id =$this->em->getRepository('models\inventory\categories')->findBy(array('categoryName' => $value));
							$params['categoriesCategory'] = $category_id[0]->getCategoryId();
							break;
						case "supplier":
							$supplier_id = $this->em->getRepository('models\inventory\Suppliers')->findBy(array('supplierName' => $value));
           					$params['suppliersSupplier'] = $supplier_id[0]->getSupplierId();
							break;
						case 'design':
							$params['designName'] = $value;
							break;
						case 'Shade':
							$params['shade'] = $value;
							break;
						case 'product':
							$params['productName'] = $value;
							break;
					}
				}
					
			}
		
           $user['data'] = $data =$this->em->getRepository('models\inventory\products')->findBy($params);
		}
		else
		{
		    $user['data'] = $data =$this->em->getRepository('models\inventory\products')->findBy(array('approved' => 1,'deleted' => 0));      
		}
		
		$group = $this->ion_auth->GetUserGroupId();
	    $menu = $this->navigator->getMenu();
		$user['form_action']="product/productlist";	

		switch($group)
		{
		case 1:
		    $user['tablehead'] = array('Product Code','Product Name','Categories','Quantity','Supplier','Status','Price','Safetylevel','Action'); 
			$user['visiblity'] = 1;
			break;
		case 2:
		    $user['tablehead'] = array('Product Code','Product Name','Categories','Quantity','Supplier','Status','Action'); 
			$user['visiblity'] = 2;
			break;
		}
		$this->load->view('general/header',$header);
	   	$this->load->view($menu);
		$this->load->view('product/productlist',$user);
	    $this->load->view('general/footer');
	}
	
	/*
	*	Approve product
	*	---------------------
	*	input: productid 
	*/
	public function approveproduct($id)
	{             
		   $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		   $data['product'] = $product = $this->em->getRepository('models\inventory\Products')->find($id);
			$group_id = $this->ion_auth->GetUserGroupId();
			$approve_date = new\DateTime("now");
			//$product->setProductActivated($create_date);
			if($group_id == 1){$product->setStatus(1);}
			$product->setApproved($group_id);
			$product->setApprovedDate($approve_date);
			$product->setApprovedBy($header['user_data']['id']); 
			$product->setLastUpdated($approve_date);
			$product->setLastUpdatedBy($header['user_data']['id']);
			$this->em->persist($product);
			$this->em->flush();
			$this->session->set_flashdata('EditProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$data['product']->getProductName().' approved Successfully</b></div>');
			redirect('product/productlist'); 
	}
	

	/*
	*	revert product
	*	---------------------
	*	input: productid 
	*/
	public function revertproduct($id)
	{
	        
		   $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		   $data['product'] = $product = $this->em->getRepository('models\inventory\Products')->find($id);
			$group_id = $this->ion_auth->GetUserGroupId();
			$update_date = new\DateTime("now");
			//$product->setProductActivated($create_date);
			if($group_id == 2)
			{
			$product->setApproved(4);//reverted by admin
			$product->setApprovedDate($update_date);
			$product->setLastUpdated($update_date);
			$product->setLastUpdatedBy($id);
			$product->setApprovedBy($header['user_data']->id); 
			}
			$this->em->persist($product);
			$this->em->flush();
			$this->session->set_flashdata('EditProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$data['product']->getProductName().' Reverted </b></div>');
			redirect('product/productlist'); 
	}
	
	/*
	*	list Reverted Product List
	*	---------------------
	*	
	*/
	
	public function revertproductlist()
	{
	$header['user_data']=$this->ion_auth->GetHeaderDetails();
    $user['data'] = $this->em->getRepository('models\inventory\products')->findBy(array('approved' => 4,'createdBy'=>$header['user_data']['id']));
    $group = $this->ion_auth->GetUserGroupId();
	$menu = $this->navigator->getMenu();
	$user['tablehead'] = array('Product Code','Product Name','Categories','Created Date','Action'); 
	$this->load->view('general/header',$header);
	$this->load->view($menu);
	$this->load->view('product/revertproductlist',$user);
	$this->load->view('general/footer');
	}

    public function delete($id)
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenu();
	    $data['product'] = $product = $this->em->getRepository('models\inventory\Products')->find($id);
		$update_date = new\DateTime("now");
		$product->setLastUpdated($update_date);
		$product->setDeleted(1);
		$product->setLastUpdatedBy($id);
		$this->em->persist($product);
		$this->em->flush();
		$this->session->set_flashdata('EditProduct', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$data['product']->getProductName().' Deleted </b></div>');
		redirect('product/productlist'); 
	}

	public function addproductcategory()
	{
	
	$data['form_action'] = "product/addproductcategory";
      
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
		$menu = $this->navigator->getMenu();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('general/header', $header);
			$this->load->view($menu);
			$this->load->view('product/productcategory',$data);
			$this->load->view('general/footer');
		}
		else
		{
			try {
			    $productcategory = new models\inventory\Categories;
				$productcategory->setCategoryName($this->input->post('productcategory'));
				$productcategory->setComments($this->input->post('comments'));
				$productcategory->setCreatedBy($header['id']);
				$created_date = new\DateTime("now");
				$productcategory->setCreatedDate($created_date);
				$this->em->persist($productcategory);
	            $this->em->flush();
				$this->session->set_flashdata('productcategory', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Category Successfully</b></div>');
				redirect('product/addproductcategory');
				
	        }
		   catch(Exception $e)
		   {
			 echo $e->getMessage();
		   }
	  }
	}
	

   /*
	*	Generate SKU and PLU for products
	*	---------------------------------
	*	SKU = inv_country + inv_city + supplierid + category + design + shade + productid
	* 	formula : [Country][inventoryCity][supplier][first 3 char of category][first and last char of design][first and last char of shade]-[productid]
	*	example : INDCHE0001FABFLBE-000001
	*	
	*	PLU = category + design + shade + productid;
	*	example : FABFLBE000001
	*
	*
	*  	call: list($barCodeImage,$PLU,$SKU) = getSKU_PLU($product_id,$supplier_id,$inv_counrty,$inv_city,$supplierId,$category,$design,$shade)
	*
	*/	
	public function getSKU_PLU($product_id,$supplier_id,$inv_counrty,$inv_city,$category,$design,$shade = null)
	{
	 
		if(isset($product_id,$supplier_id,$inv_counrty,$inv_city,$category,$design))
		{
			
	
		    $inv_counrty = substr($inv_counrty, 0, 3);
		   
		    $inv_city = substr($inv_city, 0, 3);
		    
		    $supplierId = sprintf("%04s", $supplier_id);
			
			$category = substr($category, 0, 3);

			$design = $design[0].end(str_split($design));
			
			if(isset($shade))
				$shade = $shade[0].end(str_split($shade));
			else
				$shade = "00";
			
			$productId = sprintf("%06s", $product_id);

		
			$PLU = $category.$design.$shade."-".$productId;
			$SKU = $inv_counrty.$inv_city.$supplierId.$category.$design.$shade.$productId;

			$PLU = strtoupper($PLU);
			$SKU = strtoupper($SKU);

			$response = $this->barcode($PLU);
		    
		    if($response)
		    	return array(TRUE,$response['path'],$PLU,$SKU);
			else
				return array(False,null,null,null); 
		}
		else
		{
			log_message('error', 'insufficient parameters');
			return array(False,null,null,null); 
		}
	    
	}
	

	/*
	*	barcode
	*	-----------------------------
	*	create bar code with plu code
	*
	*	call : from "getSKU_PLU" function
	*	
	*/

	public function barcode($PLU = "test")
    {
      
         $this->load->library('zend');
	     $this->zend->load('Zend/Barcode');
         
         // Only the text to draw is required
		$barcodeOptions = array('text' => $PLU,'barHeight' => 50);
     
	    // No required options
	    $rendererOptions = array();
     
	    // Draw the barcode in a new image,
	    // send the headers and the image
	    $bar = Zend_Barcode::draw('code128', 'image', $barcodeOptions, $rendererOptions);

	    $file['path'] = "assets/product_bar_codes/".$PLU.".jpg";
	    $file['result'] = true;
	  
	    if (imagejpeg( $bar, $file['path'], 100))
	    	return $file;
	    else
	    	return $file['result'] = false;
    }
	
	 /*
	*	AjaxCall: get supplier list  
	*	---------------------
	*	input : product name or id
	*
	*/
	public function ajaxProductsLookup($product)
	{
		
		$products_list = array(); 
		try {
				$products = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('p')
												->where('p.sku LIKE :sku')
												->setParameter('sku', '%'.$product.'%')
												->orWhere('p.productName LIKE :name')
												->setParameter('name', '%'.$product.'%')
												->getQuery()
   												->getResult();

				foreach ($products as $product) {
					$products_list[] = array(
											 'id' => $product->getProductGenId(),
											 'value' => $product->getProductName() 
											 );
				}				
				echo json_encode($products_list);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get product Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxProductDetails($productId)
	{
		
		try {
				$product = $this->em->getRepository('models\inventory\Products')->find($productId);
				$product_detail['productId'] = $productId;
				$product_detail['name'] = $product->getProductName();
				$product_detail['sku'] = $product->getSku();
				$product_detail['design'] = $product->getDesignName();
				$product_detail['shade'] = $product->getShade();
				$product_detail['description'] = $product->getDescription();
				$product_detail['quantity'] = $product->getQuantity()." ".$product->getUnit();

				$width = $product->getWidth();
				$length = $product->getLength();
				$height = $product->getHeight();

				$product_detail['dimension'] = array();

				if($width != 0)
					$product_detail['dimension'][] = " ".$width."W ";

				if($length != 0)
					$product_detail['dimension'][] = " ".$length."L ";

				if($height != 0)
					$product_detail['dimension'][] = " ".$height."H ";


				$product_detail['dimension'] = implode('x', $product_detail['dimension'])." ".$product->getDimenUnit();

				echo json_encode($product_detail);			
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*	AjaxCall: get Category list  
	*	---------------------
	*	input : Category name or id
	*
	*/
	public function ajaxCategoriesLookup($category)
	{
		
		$Categories_list = array(); 
		try {
				$Categories = $this->em->getRepository('models\inventory\Categories')->createQueryBuilder('c')
												->where('c.categoryId LIKE :id')
												->setParameter('id', '%'.$category.'%')
												->orWhere('c.categoryName LIKE :name')
												->setParameter('name', '%'.$category.'%')
												->getQuery()
   												->getResult();

				foreach ($Categories as $Category) {
					$Categories_list[] = array(
											 'id' => $Category->getCategoryId(),
											 'value' => $Category->getCategoryName() 
											 );
				}				
				echo json_encode($Categories_list);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get Category Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxCategoryDetails($categoryId)
	{
		
		try {
				$category = $this->em->getRepository('models\inventory\Categories')->find($categoryId);
				$category_detail['categoryId'] = $categoryId;
				$category_detail['categoryName'] = $category->getCategoryName();
				echo json_encode($category_detail);			
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get Design list  
	*	---------------------
	*	input : Design name 
	*
	*/
	public function ajaxDesignLookup($design)
	{
		
		$Design_list = array(); 
		try {
				$Designs = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('d')
										    ->select('DISTINCT d.designName')
										    ->Where('d.designName LIKE :designName')
										    ->setParameter('designName', '%'.$design.'%')
										    ->getQuery()
										    ->getResult();
										    
				foreach ($Designs as $Design) {
					$Design_list[] = array(
     										 'value' => $Design['designName']
										   );
				}				
				echo json_encode($Design_list);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get Design Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxDesignDetails($designId)
	{
		
		try {
				$design = $this->em->getRepository('models\inventory\Products')->find($designId);
				$design_detail['designName'] = $design->getDesignName();
				echo json_encode($design_detail);			
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}



		/*
	*	AjaxCall: get Shade list  
	*	---------------------
	*	input : Shade name 
	*
	*/
	public function ajaxShadeLookup($shade)
	{
		
		$Shade_list = array(); 
		try {
				$Shades = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('sh')
										    ->select('DISTINCT sh.shade')
										    ->Where('sh.shade LIKE :shade')
										    ->setParameter('shade', '%'.$shade.'%')
										    ->getQuery()
				                            ->getResult();

		foreach ($Shades as $Shade) {
					$Shade_list[] = array(
     										 'value' => $Shade['shade'] 
										   );
				}				
				echo json_encode($Shade_list);
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}

	/*
	*	AjaxCall: get Design Details  
	*	---------------------
	*	input : id
	*
	*/
	public function ajaxShadeDetails($designId)
	{
		
		try {
				$Shades = $this->em->getRepository('models\inventory\Products')->find($designId);
				$Shade_detail['shade'] = $design->getShade();
				echo json_encode($design_detail);			
			}
			catch(Exception $e)
			{
				log_message('error',$e->getMessage());
			}
	}
  
}
?>

