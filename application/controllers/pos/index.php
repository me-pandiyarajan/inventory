<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
												->where('p.productIdPlu LIKE :productIdPlu')
												->setParameter('productIdPlu', '%'.$product.'%')
												->orWhere('p.productName LIKE :name')
												->setParameter('name', '%'.$product.'%')
												->andWhere('p.approved = 1')
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
				echo $e->getMessage();
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
				$product_detail['p_name'] = $product->getProductName();
				$product_detail['plu'] = $product->getProductIdPlu();
				$product_detail['price'] = $product->getPrice();
				$product_detail['unit'] = $product->getUnit();
                $product_detail['tax'] = $product->getPosTaxTaxClass()->getTaxPercent();
				
				// $product_detail['design'] = $product->getDesignName();
				// $product_detail['shade'] = $product->getShade();
				// $product_detail['description'] = $product->getDescription();
				// $product_detail['quantity'] = $product->getQuantity()." ".$product->getUnit();

				// $width = $product->getWidth();
				// $length = $product->getLength();
				// $height = $product->getHeight();

				// $product_detail['dimension'] = array();

				// if($width != 0)
				// 	$product_detail['dimension'][] = " ".$width."W ";

				// if($length != 0)
				// 	$product_detail['dimension'][] = " ".$length."L ";

				// if($height != 0)
				// 	$product_detail['dimension'][] = " ".$height."H ";


				// $product_detail['dimension'] = implode('x', $product_detail['dimension'])." ".$product->getDimenUnit();

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
												->andWhere('c.status = 1')
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
										    ->andWhere('p.approved = 1')
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
										    ->andWhere('p.approved = 1')
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

	public function productlist()
	{
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuPos();
    	$data['products'] = $this->em->getRepository('models\inventory\Products')->findBy(array('deleted'=>0,'approved' => 1));	
    	$data['tablehead'] = array('Product_PLU','Product Name','Unit Price','Quantity','Safety stock level','Tax %','Action');			
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/Product/listproduct',$data);
		$this->load->view('pos/footer/footer');
	}
	public function editProduct($plu)
	{
		
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuPos();
		$data['form_action']="pos/product/updateProduct";
    	$data['products'] = $this->em->getRepository('models\inventory\Products')->findBy(array('productIdPlu'=> $plu));
    	$taxes = $this->em->getRepository('models\pos\PosTax')->findAll();
    	$tax_data = array();
				
				if(!empty($taxes))
				{
					foreach($taxes as $tax)
					{
						$id = $tax->getTaxClassId();
						$value = $tax->getTaxClassName() ."(" .$tax->getTaxPercent() .")";

						 $tax_data[$id] = $value;
						
					}
				}
				else
				{
					$tax_data[0] = "No Tax Available";
				}
		$data['tax'] = $tax_data;	
    	$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/Product/Editproduct',$data);
		$this->load->view('pos/footer/footer');
	}
	 public function updateProduct()
	 {
	 	$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuPos();
	 	$plu = $this->input->post('plu');
	 	$tax = $this->input->post('tax');
	 	$user = $this->em->getRepository('models\inventory\Users')->find($header['user_data']['id']);
	 	$data['products'] = $products = $this->em->getRepository('models\inventory\Products')->findBy(array('productIdPlu'=> $plu));
	 	$tax_data = $this->em->getRepository('models\pos\PosTax')->find($tax);
		 	foreach ($products as $product)
		 	 {
		 		$product->setPosTaxTaxClass($tax_data);
		 		$product->setLastUpdatedBy($user);
		 		$product->setLastUpdatedDate(1);
		 		$this->em->persist($product);
				$this->em->flush();
		 	}
	 	$this->session->set_flashdata('productedit', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Product Updated Successfully</b></div>');
		redirect('pos/Product/productlist');
	 	
	 }
  
}
?>

