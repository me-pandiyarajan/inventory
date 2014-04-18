<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

class Usercontroller extends CI_Controller {
function __construct()
	{
	parent::__construct();
	$this->load->helper('url');

	
	}
// login function//
public function deo()

		{
	
	
	    $this->load->view('general/header');
	    $this->load->view('userlist');
		$this->load->view('general/deomenu');
	    $this->load->view('general/footer');
		}
   
 

public function admin()

		{
	
	
	    $this->load->view('general/header');
	    $this->load->view('productlist');
		$this->load->view('general/adminmenu');
	    $this->load->view('general/footer');
		}
   
 

public function superadmin()

		{
	
	
	    $this->load->view('general/header');
	    $this->load->view('productlist');
		$this->load->view('general/superadminmenu');
	    $this->load->view('general/footer');
		}
   
 
}
	
	?>
