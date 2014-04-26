<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_control extends CI_Controller {

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

   	function __construct()  
	{
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		
	}

 
    public function index()
	{
	$user = new models\inventory\User;
    $role = $this->em->find('models\inventory\Role','1');
	$user->setUsername('test');
	$user->setPassword('admin');
	$user->setRole($role);
	$this->em->persist($user);
	$this->em->flush();
	} 
	
	public function get_data()
	{
	$user = $this->em->getRepository('models\inventory\User')->findAll();
	//var_dump($user);
	foreach($user as $use)
	{
	$message = $use->getRole()->getRoleName();
	
	echo $use->getUsername()."-".$message."<br/>";
	}
	}
	public function get_data_by()
	{
	$user = $this->em->getRepository('models\inventory\User')->findBy(array('id' =>1));
	//var_dump($user);
	foreach($user as $use)
	{
	$message = $use->getRole()->getRoleName();
	
	echo $use->getUsername()."-".$message."<br/>";
	}
	}

}
?>

