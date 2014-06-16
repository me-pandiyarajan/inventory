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
	public function getMenuInventory()
	{
		switch ($this->ion_auth->GetUserGroupId()) 
		{
			case 1:
				return 'inventory/general/superadminmenu';
				break;
			case 2:
				return 'inventory/general/adminmenu';
				break;
			case 3:
				return 'inventory/general/deomenu';
				break;
			default:
				# code...
				break;
		}	
	}

	/*
	*	returns : String
	*	Description : assigns view name according to the user's group
	*/
	public function getMenuPos()
	{
		switch ($this->ion_auth->GetUserGroupId()) 
		{
			case 1:
				return 'pos/menu/menu';
				break;
			case 12:
				return 'pos/menu/menu';
				break;
			case 13:
				return 'pos/menu/menu';
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

	/*
	*	Description : check whether the user is inventory gang? continue : show error info
	*/
	public function inventoryUserOnly()
	{
		$group = $this->ion_auth->GetUserGroupId();
		if ($group <= 3)
		{
			show_error('Your not supposed to view this page! Bye');
		}
	}

	/*
	*	Description : check whether the user is pos gang? continue : show error info
	*/
	public function posUserOnly()
	{
		$group = $this->ion_auth->GetUserGroupId();
		$allowedGroup = array(1,22,23);
		if (in_array($group, $allowedGroup))
		{
			show_error('Your not supposed to view this page! Bye');
		}
	}

}
/* End of file Navigate.php */