<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estimation extends CI_Controller {

	/**
	 * estimation management controller.
	 *
	 *
	 */
	public $em; 

   	function __construct()  
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('navigator');
		$this->em = $this->doctrine->em;	
	    $this->navigator->checkLogin();
	}

   	/* 
   	 * form_action send estimation 
   	 *
   	 */
   	public function view_estimation()
   	{
        $data['form_action'] = "pos/estimation/sendestimate";
        $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/estimation/pos_estimation',$data);
		$this->load->view('pos/footer/footer');
   	}

  	/* 
  	 * add estimation 
  	 *
  	 */
  	public function sendestimate()
	{
	
	    $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$project_id = $this->input->post('project_id');
		$projectname = $this->input->post('project_name_id_fetch'); 
		$customerid = $this->input->post('customer_id');
	    $p_id = $this->input->post('product_ids');
		$p_plu = $this->input->post('plu'); 
		$productnames = $this->input->post('product_names');
		$price = $this->input->post('price');
		$quantities = $this->input->post('quantities');
		//$unit = $this->input->post('unit');
		$tax = $this->input->post('tax');
		$amount = $this->input->post('amount');
		//var_dump($amount);exit;
        $customers_id = $this->em->getRepository('models\pos\PosCustomer')->find($customerid);
		$email = $customers_id->getEmail();
		$emaildata['customer_email'] = array('email'=>$email);
        $emaildata['product'] = array('p_id'=>$p_id,'p_plu'=>$p_plu,'productname'=>$productnames,'price'=>$price,'quantities'=>$quantities,'tax'=>$tax,'amount'=>$amount);
		
		//var_dump($emaildata['product']);exit;
		
	try {
		 $PosEstimates = new models\pos\PosEstimates;
		 $proj_id = $this->em->getRepository('models\pos\PosProjects')->find($project_id);
		 $PosEstimates->setPosProjectsProjectid($proj_id);
		 $PosEstimates->setStatus(2);
		 $PosEstimates->setIsdeleted(0);
		  $unixtime = time();
		$PosEstimates->setCreatedDate($unixtime);
		$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
		$PosEstimates->setCreatedBy($user);
		$this->em->persist($PosEstimates);
	     $this->em->flush();
		  $estimate_id = $PosEstimates->getEstimateid();
		
		for ($i=0; $i < count($p_id); $i++) 
		    { 
	         $PosEstimates = new models\pos\PosEstimateProducts;
			  $PosEstimates->setQuantity($quantities[$i]);
			  $PosEstimates->setAmount($amount[$i]);
			  $PosEstimates->setStatus(2);
			  $Pos_estimate = $this->em->getRepository('models\pos\PosEstimates')->find($estimate_id);
			  $PosEstimates->setPosEstimatesEstimateid($Pos_estimate);
			   $Products = $this->em->getRepository('models\inventory\Products')->find($p_id[$i]);
			  $PosEstimates->setProductsProductGen($Products);
			  $unixtime = time();
			  $PosEstimates->setCreatedDate($unixtime);
			  $user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
			  $PosEstimates->setCreatedBy($user);
			  
			  $this->em->persist($PosEstimates);
			  $this->em->flush();
			  

				}
				
				  $emaildata['estimate_id'] = $estimate_id;
		            /* create estimate pdf and send mail*/
		            $this->load->helper(array('dompdf', 'file'));

		            $html = $this->load->view('pos/email_template/estimate_template', $emaildata, true);

	 	    		$estimate_name = $estimate_id."_".date('Y_m_d').".pdf";
	 	    		$data = pdf_create($html, $estimate_name,false);

					if(!write_file("assets_pos/estimations/".$estimate_name, $data))
					{
					     echo 'Unable to write the file';
					}
                    $msg = "Estimated Product";
                    $subject = "New Estimate";
					$attachment= "assets_pos/estimations/".$estimate_name;
					$attachments = array($attachment);
		            $this->email($email,$msg,$attachments,$subject);
			  
			  $this->session->set_flashdata('estimationcreated','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Estimation send successfuly!</b></div>');
			redirect('pos/estimation/view_estimation');
			  }
			catch(Exception $e)
			{
				echo $e->getMessage();
			} 
		}
	public function sendestimate1()
	{
	
	    $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$project_id = $this->input->post('project_id');
		$projectname = $this->input->post('project_name_id_fetch'); 
		$p_id = $this->input->post('product_ids'); 
        $productnames = $this->input->post('product_names');
		$quantities = $this->input->post('quantities');
		$amount = $this->input->post('amount');
		try {
			$PosEstimates = new models\pos\PosEstimates;
			$proj_id = $this->em->getRepository('models\pos\PosProjects')->find($project_id);
			$PosEstimates->setPosProjectsProjectid($proj_id);
			$PosEstimates->setStatus(2);
			$PosEstimates->setIsdeleted(0);
			$unixtime = time();
			$PosEstimates->setCreatedDate($unixtime);
			$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
			$PosEstimates->setCreatedBy($user);
			$this->em->persist($PosEstimates);
		    $this->em->flush();
			$estimate_id = $PosEstimates->getEstimateid();
		 
			for ($i=0; $i < count($p_id); $i++) 
			{ 
		        $PosEstimates = new models\pos\PosEstimateProducts;
				$PosEstimates->setQuantity($quantities[$i]);
				$PosEstimates->setAmount($amount[$i]);
				$PosEstimates->setStatus(2);
				$Pos_estimate = $this->em->getRepository('models\pos\PosEstimates')->find($estimate_id);
				$PosEstimates->setPosEstimatesEstimateid($Pos_estimate);
				$Products = $this->em->getRepository('models\inventory\Products')->find($p_id[$i]);
				$PosEstimates->setProductsProductGen($Products);
				$unixtime = time();
				$PosEstimates->setCreatedDate($unixtime);
				$user = $this->em->getRepository('models\pos\Users')->find($header['user_data']['id']);
				$PosEstimates->setCreatedBy($user);
				  
				$this->em->persist($PosEstimates);
				$this->em->flush();
			}

               $emaildata['estimate_id'] = $estimate_id;
		            /* create estimate pdf and send mail*/
		            $this->load->helper(array('dompdf', 'file'));

		            $html = $this->load->view('pos/email_template/estimate_template', $emaildata, true);

	 	    		$estimate_name = $estimate_id."_".date('Y_m_d').".pdf";
	 	    		$data = pdf_create($html, $estimate_name,false);

					if(!write_file("assets_pos/estimations/".$estimate_name, $data))
					{
					     echo 'Unable to write the file';
					}
                    $msg = "Estimated Product";
                    $subject = "New Estimate";
					$attachment= "assets_pos/estimations/".$estimate_name;
					$attachments = array($attachment);
		            $this->email($email,$msg,$attachments,$subject);

				$this->session->set_flashdata('estimationcreated','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b> Estimation send successfuly!</b></div>');
				redirect('pos/estimation/view_estimation');
			
			
		} 
		catch(Exception $e)
		{
			echo $e->getMessage();
		}    

	}

	/* 
	 * estimation list
	 *  
	 */
	Public function estimationlist()
	{
	
       	$data['Estimates_details'] = $this->em->getRepository('models\pos\PosEstimates')->findAll();
	   		
	   		foreach ($data['Estimates_details'] as $Estimates_detail)
	   		{
			   	$projectid = $Estimates_detail->getPosProjectsProjectid();
			   	
			   	$projects = $this->em->getRepository('models\pos\PosProjects')->findByProjectid($projectid);
			   	
			   	if(!empty($projects))
			   	{
			   		$invoiceid = $projects[0]->getPosInvoicesInvoiceid();
			    	$customer_details = $this->em->getRepository('models\pos\PosInvoices')->findBy(array('invoiceid' => $invoiceid));

			    	$data['customer_details'][] = $customer_details[0]->getPosCustomerCustomer();	
			   	}
			   	else
			   	{
			   		$data['customer_details'][] = $Estimates_detail->getPosCustomerCustomer(); //->getCustomerId();
			   	}

        	}

        $header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$data['tablehead'] = array('Estimates ID','Customer Name','Created Date','Action');
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/estimation/pos_estimation_list',$data);
		$this->load->view('pos/footer/footer');
	}

	/* 
	 * estimation details 
	 * 
	 */
	public function view_estimation_details($estimate_id)
	{
	    $data['product'] = $product = $this->em->getRepository('models\pos\PosEstimateProducts')->findByposEstimatesEstimateid($estimate_id);
  		
		$header['user_data'] = $this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuPos();
		$this->load->view('pos/header/header', $header);
		$this->load->view($menu);
		$this->load->view('pos/estimation/view_estimation_details',$data);
		$this->load->view('pos/footer/footer');
	}

 public function email($to,$message,$attachments,$subject)
   {
	     $config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'inventorypos@gmail.com',
		    'smtp_pass' => 'inventorypos123',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
	    $this->email->from('admin@inventory.com','admin');
	    $this->email->to($to,'supplier');
		$this->email->subject($subject);
		foreach ($attachments as $attachment) {
			$this->email->attach($attachment);
		}
		$this->email->message($message);
		$this->email->send();  
    }


}
/* End of file estimation.php */
/* Location: ./application/controllers/pos/estimation.php */
