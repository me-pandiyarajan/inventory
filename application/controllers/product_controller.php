<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_controller extends CI_Controller {

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
		$this->em = $this->doctrine->em;
		
	}
 
	public function index()
	{
	
	}
	
	public function add_product()
	{
		$action['form_action'] = "add_product_function";
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
		
		
		if(!empty($TaxClass_data))
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
		
		// exit;
		$this->load->view('general/header',$header);
		$this->load->view('product/productadd',$action);
		$this->load->view('general/deomenu');
		$this->load->view('general/footer');
		
	}


	public function add_product_function()
	{
	//$product = new models\inventory\Products;
	echo $this->input->post('productName');exit;
	/*$product->setProductName('sample');
	$product->setDescription('test');
	$product->setShortDescription('test');
	$product->setCountryOfManufacture('test');
	$product->setPrice('23');
	$product->setGroupPrice('956545456');
	$product->setSpecialPriceFrom('21-04-2014');
	$product->setSpecialPriceTo('26-04-2014');
	$product->setInstallationCharges(12);
	$product->setTotalCost(100);
	$product->setGrandTotal(122);
	$product->setUploadImage(0);
	$product->setQuantity(10);
	$product->setStockAvailability(10);
	$product->setSafetyStockLevel(3);
	$product->setWeight(200);
	$product->setWidth(12);
	$product->setLength(12);
	$product->setHeight(12);
	$product->setDesignName('test');
	$product->setShade('test');
	$product->setCreatedDate(0);
	$product->setLastUpdated(0);
	$product->setProductActivated(0);
	$product->setApproved(0);
	$product->setApprovedDate(21-04-2014);
	$product->setCreatedBy(0);
	$product->setLastUpdatedBy(0);
	$product->setApprovedBy(0); 
	$product->setCategoriesCategory($Categories);
	$product->setSuppliersSupplier($Suppliers);
	$product->setTaxClassTaxClass($TaxClass);
	$this->em->persist($product);
	$this->em->flush();
	echo "success";*/
	}

	


}
