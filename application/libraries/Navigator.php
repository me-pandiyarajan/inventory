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

	/*
	*	Description : check whether any user has logged in? continue : navigate to login page
	*/
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


	/*
	*	Description : check whether the user is either admin or super admin? continue : show error info
	*/
	public function mustBeAdminOrSAdmin()
	{
		$group = $this->ion_auth->GetUserGroupId();
		if ($group >= 3)
		{
			show_error('Your not supposed to view this page! Bye');
		}
	}


	/*
	*	Description : check whether the user is superadmin? continue : show error info
	*/
	public function mustBeSAdmin()
	{
		$group = $this->ion_auth->GetUserGroupId();
		if ($group >= 2)
		{
			show_error('Your not supposed to view this page! Bye');
		}
	}



}
/* End of file Navigate.php */