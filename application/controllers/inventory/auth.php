<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

   /*
	*	Available actions
	*	---------------------------
	*	> index				-	redirect if needed, otherwise display the user list
	*	> login				-	log the user in
	*	> logout			-	log the user out
	*	> change_password	-	change user password
	*	> forgot_password	-	forgot password
	*	> reset_password	-	reset password - final step for forgotten password
	*	> activate			-	activate the user
	*	> deactivate		-	deactivate the user
	*	> create_user		-	create a new user
	*	> list_users [C]	-	display the user list
	*	> edit_user			-	edit a user
	*	> create_group		-	create a new group
	*	> edit_group		-	edit a group
	*	> _get_csrf_nonce	-
	*	> _valid_csrf_nonce	-
	*	> _valid_csrf_nonce	-
	*	> _render_page		-
	*
	*/

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->library('navigator');

		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
	}

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('inventory/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			
		}
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$group = $this->ion_auth->GetUserGroupId();
				switch($group)
				{
				case 1:
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('inventory/dashboard/superadmin', 'refresh');	
					break;
				case 2:			
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('inventory/dashboard/admin', 'refresh');	
					break;
					
				case 3:
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('inventory/dashboard/deo', 'refresh');	
					break;
				}	
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  								 Incorrect Login!
  									</div>');
				redirect('inventory/auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
             $this->_render_page('inventory/header_login');
			 $this->_render_page('inventory/auth/login', $this->data);
			 $this->load->view('inventory/footer_login');
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('inventory/auth/login', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('inventory/auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('inventory/header');
			$this->_render_page('inventory/auth/change_password', $this->data);
			$this->load->view('inventory/footer');
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('inventory/auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('inventory/auth/forgot_password', $this->data);
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	            	if(empty($identity)) {
		        	$this->ion_auth->set_message('forgot_password_email_not_found');
		                $this->session->set_flashdata('message', $this->ion_auth->messages());
                		redirect("inventory/auth/forgot_password", 'refresh');
            		}
            
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("inventory/auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("inventory/auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('inventory/auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('inventory/auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("inventory/auth/forgot_password", 'refresh');
		}
	}

	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("inventory/auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("inventory/auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('inventory/auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('inventory/auth', 'refresh');
		}
	}

	//create a new user
	function create_user()
	{
		
		$this->navigator->checkLogin(); 
		$this->data['form_action'] = 'inventory/auth/create_user';
		/*if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('inventory/auth', 'refresh');
		}*/

		$tables = $this->config->item('tables','ion_auth');
		
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('mobile', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		if($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$groupNo = $this->input->post('group');
			$group = array($groupNo); 
			$password = $this->input->post('password');
			$additional_data = array(
			   'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'  => $this->input->post('email'),
				'phone'      => $this->input->post('mobile'),
				'active'	 => $this->input->post('status')
			);
        	
		}
		
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email,$additional_data,$group))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									User added successfully!
  									</div>');
			redirect("inventory/auth/list_users", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));

			$group = $this->ion_auth->GetUserGroupId();
			switch($group)
			{
				case 1:
				$this->data['options'] = array('3'=>'DEO','2'=>'ADMIN');
				break;
				case 2:
				$this->data['options'] = array('3'=>'DEO');
				break;
				case 3:
				$this->data['options'] = array();
				break;
			}

			$header['user_data']=$this->ion_auth->GetHeaderDetails();
			$menu = $this->navigator->getMenuInventory();

            $this->_render_page('inventory/general/header',$header);
			$this->_render_page($menu);
			$this->_render_page('inventory/auth/create_user_admin', $this->data);
			$this->_render_page('inventory/general/footer');
		}
	} 

	
	public function list_users()
	{
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		if($group == 1)
		{
		$groupToList = array(2,3);
		}
		else
		{
		$groupToList = $group + 1;
		}
		$this->data['data'] = $this->ion_auth->users($groupToList)->result();
		$menu = $this->navigator->getMenuInventory();
		foreach ($this->data['data'] as $k => $user)
		{
			if($user->deleted == 0){
			$this->data['data'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			
			$this->data['user'][$k] = $user;
			}
		}		
	
			
		switch($group)
		{
		case 1: 
			$this->data['tablehead'] = array('UserName','FirstName','LastName','Email','Mobile','Role','Status','Action');
			$this->data['visiblity'] = 2;
			break;
		case 2:
			$this->data['tablehead'] = array('UserName','FirstName','LastName','Email','Mobile','Role','Status','Action');
			$this->data['visiblity'] = 1;
			break;
		case 3:
		  	$this->data['visiblity'] = 0;				
			break;				
		}

		$this->load->view('inventory/general/header',$header);
		$this->load->view($menu);
		$this->load->view('inventory/auth/userlist',$this->data); 
		$this->load->view('inventory/general/footer');

	}
	//edit a user
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";
		$this->navigator->checkLogin(); 

		/*if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('inventory/auth', 'refresh');
		}*/

		$user = $this->ion_auth->user($id)->row();
		//$groups=$this->ion_auth->groups()->result_array();
		//$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
			   'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'  => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'active'	 => $this->input->post('status')
			);

			// Only allow updating groups if user is admin
			if ($this->ion_auth->is_admin())
			{
				//Update the groups user belongs to
				$groupData = $this->input->post('group');

				if (isset($groupData) && !empty($groupData)) 
				{
					$this->ion_auth->remove_from_group('', $id);
					$this->ion_auth->add_to_group($groupData, $id);
				}
			}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($user->id, $data);

				//check to see if we are creating the user
				//redirect them back to the admin page
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									User Edited successfuly!
  									</div>');
				redirect("inventory/auth/list_users", 'refresh');
				
				//$this->session->set_flashdata('message', "User Saved");
				if ($this->ion_auth->is_admin())
				{
					redirect('inventory/auth/list_users', 'refresh');
				}
				else
				{
					//redirect('inventory//', 'refresh');
				}
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));

		//pass the user to the view
		$this->data['user'] = $user;
		$group = $this->ion_auth->GetUserGroupId();
		$this->data['currentGroups'] = $group;

		switch($group)
		{
			case 1:
			$this->data['options'] = array('3'=>'DEO','2'=>'ADMIN');
			break;
			case 2:
			$this->data['options'] = array('3'=>'DEO');
			break;
			case 3:
			$this->data['options'] = array();
			break;
		}


		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuInventory();
        $this->_render_page('inventory/general/header',$header);
		$this->_render_page($menu);
		$this->_render_page('inventory/auth/edit_user', $this->data);
		$this->_render_page('inventory/general/footer');
	}


	function view_profile($id)
	{
	$this->navigator->checkLogin(); 
	$user = $this->ion_auth->user($id)->row();
	if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'active'	 => $this->input->post('status')
			);

			
			if ($this->ion_auth->is_admin())
			{
			
				$groupData = $this->input->post('group');

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);
					$this->ion_auth->add_to_group($groupData, $id);

				}
			}
			$this->ion_auth->update($user->id, $data);
				if ($this->ion_auth->is_admin())
				{
					redirect('inventory/auth/list_users', 'refresh');
				}
				else
				{
					redirect('inventory/auth/list_users', 'refresh');
				}
			
		}
	
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['user'] = $user;
		$group = $this->ion_auth->GetUserGroupId();
		$this->data['currentGroups'] = $group;

		switch($group)
		{
			case 1:
			$this->data['options'] = array('3'=>'DEO','2'=>'ADMIN');
			break;
			case 2:
			$this->data['options'] = array('3'=>'DEO');
			break;
			case 3:
			$this->data['options'] = array();
			break;
		}
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuInventory();
        $this->_render_page('inventory/general/header',$header);
		$this->_render_page($menu);
		$this->_render_page('inventory/auth/view_profile', $this->data);
		$this->_render_page('inventory/general/footer');
	}
	
	function edit_profile($id)
	{
	    $this->navigator->checkLogin(); 
     	$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
	
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>', '</b></div>');
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
			    
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'password'      => $this->input->post('password')
				
			);
			// Only allow updating groups if user is admin
			if ($this->ion_auth->is_admin())
			{
				//Update the groups user belongs to
				$groupData = $this->input->post('group');

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);

					// for single user in multiple groups
					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}

					$this->ion_auth->add_to_group($groupData, $id);

				}
			}

			//update the password if it was posted
		if ($this->input->post('password'))
			{
			$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($user->id, $data);

				//check to see if we are creating the user
				//redirect them back to the admin page
				$this->session->set_flashdata('profileadd','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Your Profile has been updated successfully!</b></div>');
		//redirect('inventory/auth/list_users'); 

				/* $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									Profile	Add successful!
  									</div>'); */
				if ($this->ion_auth->is_admin())
				{
					redirect('inventory/auth/view_profile/'.$id, 'refresh');
				}
				else
				{
					redirect('inventory/auth/view_profile/'.$id, 'refresh');
				}
			}
		}
     	//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		//set the flash data error message if there is one
		$this->data['message'] = ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'));

		//pass the user to the view
		$this->data['user'] = $user;
		$group = $this->ion_auth->GetUserGroupId();
		$this->data['currentGroups'] = $group;
		switch($group)
		{
			case 1:
			$this->data['options'] = array('3'=>'DEO','2'=>'ADMIN');
			break;
			case 2:
			$this->data['options'] = array('3'=>'DEO');
			break;
			case 3:
			$this->data['options'] = array();
			break;
		}
		$header['user_data']=$this->ion_auth->GetHeaderDetails();
		$menu = $this->navigator->getMenuInventory();
        $this->_render_page('inventory/general/header',$header);
		$this->_render_page($menu);
		$this->_render_page('inventory/auth/edit_Profile', $this->data);
		$this->_render_page('inventory/general/footer');
	}

	function deleteuser1($id)
	{
        $header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
		$user = $this->ion_auth->user($id)->row();
		$data = array('deleted' => 1);
		//var_dump($data);exit;
		 $this->ion_auth->delete_user($user->id, $data);
		//$user = $this->ion_auth->delete_user($id);
		$this->session->set_flashdata('userdelect','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>user cancelled</b></div>');
		redirect('inventory/auth/list_users'); 

	}

	function deleteuser($id)
	{
        $header['user_data']=$this->ion_auth->GetHeaderDetails();
		$group = $this->ion_auth->GetUserGroupId();
		$menu = $this->navigator->getMenuInventory();
			$user = $this->ion_auth->user($id)->row();
		$data = array('deleted' => 1);
			//var_dump($data);exit;
		 $this->ion_auth->delete_user($user->id, $data);
			$this->session->set_flashdata('userdelect','<div class="alert alert-success alert-dismissable">
  									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  									deleted successfully!
  									</div>');
				
		redirect('inventory/auth/list_users', 'refresh');
	}	


	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('inventory/auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("inventory/auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('inventory/auth/create_group', $this->data);
		}
	}

	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('inventory/auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('inventory/auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("inventory/auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('inventory/auth/edit_group', $this->data);
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}
	
	
}
