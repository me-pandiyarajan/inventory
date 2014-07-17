<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesreport extends CI_Controller {

	/**
	 * sales report management controller.
	 *
	 */

	public $em; 

	function __construct()  
    {
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		
		$this->load->helper('url');
		$this->em = $this->doctrine->em;
		$this->load->library('navigator');
		
		$this->navigator->checkLogin(); 
	}
 
   	public function index()
	{
		$menu = $this->navigator->getMenuInventory();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
        $group_id = $this->ion_auth->GetUserGroupId();
		
		/* top customer sales*/

		$data['customer_sales'] = $this->customer_for_sales();

		 /* top product sales*/
		
		$data['product_sales'] = $this->product_for_sales();

		 /* top sales return*/
		
		$data['sales_return'] = $this->high_sales_return();

		/* top sales damaged*/
		
		$data['sales_damaged'] = $this->high_sales_damaged();
		
		/* payment_type*/
		
		$data['area_wise_sales'] = $this->area_wise_sales();
		
		/* payment_type*/

		$data['payment_type'] = $this->payment_type();
				
		/* project count*/

		$data['project_count'] = $this->project_sale_count();
		
		/* void invoice details*/

		$data['voidinvoice'] = $this->voidinvoice();
		
        $this->load->view('pos/header/header',$header);
		$this->load->view('pos/reports/sales_report',$data);
		$this->load->view('pos/footer/footer');

	}

  /* top 5 customer sale details */
  
	public function customer_for_sales()
	{
	
	$customer = $this->em->getRepository('models\pos\PosInvoices')->createQueryBuilder('c') 
	                                        ->addselect('COUNT(c.invoiceid) as data')
	                                        ->groupBy('c.posCustomerCustomer')
											->setMaxResults(5)
											->getQuery()
										    ->getResult();
							           return $customer;			
		
	}
   
      /* top 5 sales per day */
	  
	public function sales_per_date()

	{
	   								
	 
	}
	
      /* top area wise sales */
	  
	public function area_wise_sales()

	{
	$customer_area = $this->em->getRepository('models\pos\PosCustomer')->createQueryBuilder('c')    
	                                        ->addselect('COUNT(c.city) as data')
	                                        ->groupBy('c.city')
											->setMaxResults(5)
											->getQuery()
										    ->getResult();
							           return $customer_area;	
	}
    
	    /* top 5 product for sales details */
	
	public function product_for_sales()

	{
	$product = $this->em->getRepository('models\pos\PosProductSales')->createQueryBuilder('p')      
	                                        ->addselect('SUM(p.quantity) as data')
	                                        ->groupBy('p.productsProductGen')
											->setMaxResults(5)
											->getQuery()
										    ->getResult();
										
							           return $product;		
	
	}

	    /* top 5 category sale details */
	
	public function category_for_sales()

	{

	$product = $this->em->getRepository('models\pos\PosProductSales')->findAll();
	foreach($product as $products)
		{
		$id = $products->getProductsProductGen()->getProductGenId();
       
        
		
									  

	   }exit;
	
	}

	/* top high sale for return */
	
	public function high_sales_return()

	{
	 $return = $this->em->getRepository('models\pos\PosReturn')->createQueryBuilder('r')                                     
	 										->addselect('SUM(r.quantity) as data')
	                                        ->groupBy('r.productsProductGen')
											->orderBy('data', 'DESC')
											->setMaxResults(5)
											->getQuery()
										    ->getResult();
										
										return $return;										
	}
  
    /* top high sale for damaged */
  
	public function high_sales_damaged()

	{
   $damaged = $this->em->getRepository('models\pos\PosDamaged')->createQueryBuilder('d')
                                            ->addselect('SUM(d.quantity) as data')
	                                        ->groupBy('d.productsProductGen')
											->orderBy('data', 'DESC')
											->setMaxResults(5)
											->getQuery()
										    ->getResult();
										
										return $damaged;
		

							
								
	}

	  /* total project for sale */
	
	public function project_sale_count()

	{
	$projects = $this->em->getRepository('models\pos\PosProjects')->findAll();
	return count($projects);
	}
	
	
	/* payment type-check,credit,DD,cash */
	
	public function payment_type()

	{
	$credit_payment = $this->em->getRepository('models\pos\PosInvoices')->findby(array('tenderedby'=>'0'));
	$cash_payment = $this->em->getRepository('models\pos\PosInvoices')->findby(array('tenderedby'=>'1'));
	$cheque_payment = $this->em->getRepository('models\pos\PosInvoices')->findby(array('tenderedby'=>'2'));
	$dd_payment = $this->em->getRepository('models\pos\PosInvoices')->findby(array('tenderedby'=>'3'));
	
	return $payment_type = array('credit' => count($credit_payment), 'cash'=> count($cash_payment), 'cheque'=> count($cheque_payment), 'dd'=> count($dd_payment) );	
	}
		
	/* void invoice list */
	
	public function voidinvoice()

	{
		$void_invoice = $this->em->getRepository('models\pos\PosInvoices')->findby(array('status'=>'0'));
		foreach($void_invoice as $void)
		{
		$id = $void->getInvoiceid();
		$void_invoices = $this->em->getRepository('models\pos\PosProductSales')->findBy(array('invoicesInvoiceid' => $id));
		//var_dump($void_invoices);
		}
		
		return ($void_invoices);
	}
		 
   



		 
}
?>

