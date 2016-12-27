<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Authenticate Class
 *
 * Authentication library for Code Igniter.
 *
 * @author		Sanjoy Chowdhury
 * @version		1.0.1
 */
 
class Aranax_Auth {
	
	function Aranax_Auth() {
		$this->ci =& get_instance();
		$this->ci->load->library('session');
		$this->ci->load->helper('form');
		$this->ci->load->config('aranax_config');
		$this->ci->load->database();
	}

	//generate salt
	function _get_hashsalt($password) {
		$options = [
					    'cost' => 11,
					    'salt' => $this->ci->config->item('aranax_salt'),
					];
		$hashAndSalt	=	password_hash($password, PASSWORD_BCRYPT, $options);
		
		return $hashAndSalt;
	}
	
	//encrypt password
	function _encrypt_password($password) {
		$majorsalt = $this->ci->config->item('aranax_salt');
		$_pass = str_split($password);
		// encrypts every single letter of the password
		foreach ($_pass as $_hashpass) {
			$majorsalt .= md5($_hashpass);
		}
		return md5($majorsalt);
	}
	
	function _set_session($data) {
		// set session data array
		$user = array(						
			'AX_username'				=> $data->user_name,
			'AX_user_firstname'			=> $data->user_firstname,
			'AX_user_lastname'			=> $data->user_lastname,
			'AX_role_id'				=> $data->user_role_id,				
			'AX_logged_in'				=> TRUE
		);

		$this->ci->session->set_userdata($user);
	
	}
	
	//create new user
	function create_user() {
		$this->ci->load->model('usermodel');
		$user	=	array(
							'user_role_id'	=>	$this->ci->input->post('user_role_id'),
							'user_name'		=>	$this->ci->input->post('user_name'),
							'user_password'	=>	$this->_encrypt_password($this->ci->input->post('user_password')),
							'user_firstname'=>	$this->ci->input->post('user_firstname'),
							'user_lastname'	=>	$this->ci->input->post('user_lastname'),
							'user_email'	=>	$this->ci->input->post('user_email'),
							'user_mobile'	=>	$this->ci->input->post('user_mobile'),
							'user_is_active'=>	1,
							'user_created'	=>	date('Y-m-d H:i:s')
						);	
		return $this->ci->usermodel->create_user($user);
	}
	
	//authenticate user
	function authenticate_user($username, $password) {
		$this->ci->load->model('authmodel');
		$row = $this->ci->authmodel->authenticate_user($username, $password);
		
		if(!is_null($row) ) {
			if (password_verify($this->_encrypt_password($password), $this->_get_hashsalt($row->user_password))) {
			    // log in user 
				$this->_set_session($row);	
			    return true;
			} else {
			    return false;
			}
		}
	}	
	
	// check if user is logged in
	function is_logged_in() {
		return $this->ci->session->userdata('AX_logged_in');
	}
	
	//check user access
	function has_access() {
		$controller	=	$this->ci->router->fetch_class();
		$action		=	$this->ci->router->fetch_method();
        $url		=	$controller . "/" . $action;
        
		$this->ci->load->model('authmodel');
		$row	=	$this->ci->authmodel->has_access($this->ci->session->userdata('AX_role_id'), $url);
		if(!is_null($row) ) {
			return true;
		}
		
		return false;
			
	}

	//get user roles as option
	function get_user_roles_option() {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->get_user_roles_option();
	}

	//get user roles
	function get_user_roles() {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->get_user_roles();
	}

	//create user role 
	function create_user_role($role_name, $role_description) {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->create_user_role($role_name, $role_description);
	}
	
	//create auth url 
	function create_auth_url($url_name, $url_description) {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->create_auth_url($url_name, $url_description);
	}

	//get auth urls
	function get_auth_urls() {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->get_auth_urls();
	}

	//get urls by role
	function get_auth_urls_by_role($role_id) {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->get_auth_urls_by_role($role_id);
	}

	//assign access
	function assign_access($role_id, $access_urls) {
		$this->ci->load->model('authmodel');
		return $this->ci->authmodel->assign_access($role_id, $access_urls);
	}

}	