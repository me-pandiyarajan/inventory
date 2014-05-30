<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	/**
	 * dashboard controller.
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

	/**
	 * Index Page for this controller.
	 */
	
	public function index()
	{

	}

	public function deo()
	{
		
		$menu = $this->navigator->getMenuInventory();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
        $group_id = $this->ion_auth->GetUserGroupId();
		$data['belowSaftyLevel'] = $this->SafetyStockLevel();
		$data['forApproval'] =  $this->forApproval();

		$data['productsCount'] = $this->productsCount($header['user_data']['id'],$group_id);
		$data['totalProducts'] = $this->totalProducts();

		$this->load->view('inventory/general/header', $header);
		$this->load->view($menu);
		$this->load->view('inventory/dashboard/deodashboard',$data);


	}
	
	public function admin()
	{
		
		$menu = $this->navigator->getMenuInventory();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
        $group_id = $this->ion_auth->GetUserGroupId();
		$data['belowSaftyLevel'] = $this->SafetyStockLevel();
		$data['forApproval'] =  $this->forApproval();
		$data['supplierCount'] = $this->supplierCount();
		$data['deoCount'] = $this->deoCount();
		$data['estimated'] = $this->estimated($header['user_data']['id'],$group_id);
		$data['ordered'] = $this->ordered($header['user_data']['id'],$group_id);
		$data['delivered'] = $this->delivered($header['user_data']['id'],$group_id);
		$data['productsCount'] = $this->productsCount($header['user_data']['id'],$group_id);
		$data['totalProducts'] = $this->totalProducts();

		$this->load->view('inventory/general/header', $header);
		$this->load->view($menu);
		$this->load->view('inventory/dashboard/admindashboard',$data);

	}

	public function superadmin()
	{
		
		$menu = $this->navigator->getMenuInventory();
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
 		$group_id = $this->ion_auth->GetUserGroupId();
		$data['belowSaftyLevel'] = $this->SafetyStockLevel();
		$data['forApproval'] =  $this->forApproval();
		$data['supplierCount'] = $this->supplierCount();
		$data['deoCount'] = $this->deoCount();
		$data['adminCount'] = $this->adminCount();
		$data['estimated'] = $this->estimated($header['user_data']['id'],$group_id);
		$data['ordered'] = $this->ordered($header['user_data']['id'],$group_id);
		$data['delivered'] = $this->delivered($header['user_data']['id'],$group_id);
		$data['productsCount'] = $this->productsCount($header['user_data']['id'],$group_id);
		$data['totalProducts'] = $this->totalProducts();
		$data['updateproductcount'] = $this->updateproductcount();


		$this->load->view('inventory/general/header', $header);
		$this->load->view($menu);
		$this->load->view('inventory/dashboard/superadmindashboard',$data);

	}
	
   /*
	*	Safety Stock Level
	*	---------------------
	*	where : safetyStockLevel >= posstocklevel , status = enable ,not deleted
	*	
	*/

	public function SafetyStockLevel()
	{
		
		$user = $this->em->getRepository('models\inventory\Products')->createQueryBuilder('p')
				->where("p.safetyStockLevel >= p.posStockLevel")
				->andWhere("p.status = 1")
				->andWhere("p.deleted = 0")
				->getQuery()
				->getResult();
		return count($user);
	}

	
	public function supplierCount() 
	{
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
					
		/* supplier counts */
		$activeSupplierCount =$this->em->getRepository('models\inventory\Suppliers')->findBy(array('status' =>1));
		$inactiveSupplierCount =$this->em->getRepository('models\inventory\Suppliers')->findBy(array('status' =>0));
		
		return $supplierCount = array('active' => count($activeSupplierCount), 'inactive'=> count($inactiveSupplierCount) );			
	}


	public function productsCount($id,$group_id)
	{
	  if($group_id == 1)
		{
		$approvedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>1,'deleted'=>0));
		$deletedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('deleted' =>1));
		$createdProductsCount =$this->em->getRepository('models\inventory\Products')->findAll();
		$revertedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>4));
		}
		else
		{
		$approvedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>1,'createdBy'=>$id,'deleted'=>0));
		$deletedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('deleted' =>1,'createdBy'=>$id));
		$createdProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('createdBy'=>$id));
		$revertedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>4,'createdBy'=>$id));

		}

		return $productsCount = array('created'=>count($createdProductsCount),'approved'=>count($approvedProductsCount),'deleted'=>count($deletedProductsCount),'reverted' => count($revertedProductsCount));	
	}

	public function updateproductcount()
	{
		$updatedProductsCount =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>6));
		return count($updatedProductsCount);
	}

	public function totalProducts()
	{
		$ProductsCount = $this->em->getRepository('models\inventory\Products')->findBy(array('approved' => 1,'deleted' => 0));
		return count($ProductsCount);
	}

	public function forApproval()
	{
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$group_id = $this->ion_auth->GetUserGroupId();
		if($group_id == 1)
		{
			$for_approval =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>array(2,3),'deleted'=>0));
		    return count($for_approval);
		}
		else
		{
           $for_approval =$this->em->getRepository('models\inventory\Products')->findBy(array('approved' =>3,'deleted'=>0));
		   return count($for_approval);
		}
		
	}

	public function deoCount()
	{
		
		$group =$this->em->getRepository('models\inventory\UsersGroups')->findBy(array('group' =>3));
		$activeDeoCount = 0;
		$inactiveDeoCount = 0;

		foreach($group as $user_group)
		{
		  $id = $user_group->getUser();
          $activeDeo = $this->em->getRepository('models\inventory\Users')->findBy(array('id'=>$id,'active'=>1,'deleted'=>0));
          if(count($activeDeo) > 0){
          	$activeDeoCount++;
          }
          		
          $inactiveDeo = $this->em->getRepository('models\inventory\Users')->findBy(array('id'=>$id,'active'=>0,'deleted'=>0));
          if(count($inactiveDeo) > 0){
          		$inactiveDeoCount++;
          }
          	
        }
	   
  
       	return array('active' => $activeDeoCount, 'inactive'=> $inactiveDeoCount);
	}

	
	public function adminCount()
	{
		$group =$this->em->getRepository('models\inventory\UsersGroups')->findBy(array('group' =>2));
		$activeAdminCount = 0;
		$inactiveAdminCount = 0;

		foreach($group as $user_group)
		{
		  $id = $user_group->getUser();
          $activeAdmin =$this->em->getRepository('models\inventory\Users')->findBy(array('id'=>$id,'active'=>1,'deleted'=>0));
          if(count($activeAdmin) > 0){
          	$activeAdminCount++;
          }

          $inactiveAdmin =$this->em->getRepository('models\inventory\Users')->findBy(array('id'=>$id,'active'=>0,'deleted'=>0));
          if(count($inactiveAdmin) > 0){
          	$inactiveAdminCount++;
          }
        }
	   
       	return array('active' => $activeAdminCount, 'inactive'=> $inactiveAdminCount );
	}

	public function estimated($id,$group_id)
	{  
		if($group_id == 1)
		{
          $estimated =$this->em->getRepository('models\inventory\NewEstimation')->findAll();
		  return count($estimated);
		}
		else
		{
		  $estimated =$this->em->getRepository('models\inventory\NewEstimation')->findBy(array('createdBy'=>$id));
	      return count($estimated);
	    }
		
		
		//$estimated =$this->em->getRepository('models\inventory\NewEstimation')->findBy(array('createdBy'=>$id,'status' =>1));
	 }

	public function ordered($id,$group_id)
	{
		if($group_id == 1)
		{
	      $ordered =$this->em->getRepository('models\inventory\NewOrder')->findBy(array('deliveryStatus' =>2));
		  return count($ordered);	
		}
		else
		{
		   $ordered =$this->em->getRepository('models\inventory\NewOrder')->findBy(array('deliveryStatus' =>2));
		   return count($ordered);
		}
				
	}

	public function delivered($id,$group_id)
	{
		if($group_id == 1)
		{
	      $delivered =$this->em->getRepository('models\inventory\NewOrder')->findBy(array('deliveryStatus' =>1));
           return count($delivered);
		}
		else
		{
			$delivered =$this->em->getRepository('models\inventory\NewOrder')->findBy(array('createdBy'=>$id,'deliveryStatus' =>1));
            return count($delivered);
		}
        
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
