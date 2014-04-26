<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Navigator
*
* Author: Pandiyarajan A
*		  pandiyarajan.a@jemsnets.com
*
* Created:  23.04.2014
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Navigator extends Ion_auth
{
	/**
	 * __construct
	 *
	 * @return void
	 * @author Ben [ion_auth]
	 **/
	public function __construct()
	{
		#construct
	}


	public function checkLogin()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
	}

	/*
	*	returns : String
	*	Description : assigns view name according to the user's group
	*/
	public function getMenu()
	{
		switch ($this->ion_auth->GetUserGroupId()) 
		{
			case 1:
				return 'general/superadminmenu';
				break;
			case 2:
				return 'general/adminmenu';
				break;
			case 3:
				return 'general/deomenu';
				break;
			default:
				# code...
				break;
		}	
	}



}
/* End of file Navigate.php */