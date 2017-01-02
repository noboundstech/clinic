<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		$this->load->model('authmodel');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		
	}
		
	function index() {
		$this->login();
	}
	
	//login
	function login() {
		//$this->output->enable_profiler(TRUE);
		$data['auth_error_message']	=	"";
		
		if ( !$this->aranax_auth->is_logged_in() ) {
			if($this->input->post('username')) {
				if( $this->aranax_auth->authenticate_user($this->input->post('username'), $this->input->post('password')) ) {
					redirect("user/dashboard");
				}
				else {
					$data['auth_error_message'] = "Either your username and/or password does not match";
				}
			}
				
		}
		else {
			redirect("user/dashboard");
		}
		
			
		$data["page_title"]	=	"Authenticate User";
		$this->load->view("auth/login_form", $data);
	}	
	
	//logout
	function logout() {
		session_destroy();
		redirect("auth/login");
	}	
	
	//roles
	function roles() {
		//$this->output->enable_profiler(TRUE);
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["roles"]	=	$this->aranax_auth->get_user_roles();
		}
			
		$data["page_title"]	=	"User Roles";
		$this->load->view("common/header", $data);
		$this->load->view("auth/roles", $data);
	}
	
	//create role
	function createrole() {
		//$this->output->enable_profiler(TRUE);
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			if($this->input->post('role_name')) {
				$status		=	$this->aranax_auth->create_user_role($this->input->post('role_name'), 
													 $this->input->post('role_description')
													);
				if($status){
					$this->session->set_flashdata('success', 'Role created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Role creation failed');
				}
			}	
			redirect("auth/roles");
		}
		
	}

	//get department values by idat
	function getRoleById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$role_val = $this->authmodel->getRoleValueById($this->uri->segment(3));
			$var = '';
			foreach($role_val as $role) {
				$var = $role->role_name.','.$role->role_description;
			}
			echo $var;
		}
	}
	
	//edit role
	function editRole() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('role_id')) {
				$status = $this->authmodel->editRole($this->input->post('role_id'), $this->input->post('role_name'), $this->input->post('role_description'));
				if($status){
					$this->session->set_flashdata('success', 'Role updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Role update failed');
				}
			}	
			redirect("auth/roles");
		}
		
	}
	
	//delete role
	function removerole() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->authmodel->deleteRole($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Role deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Role deletion failed');
					}
				}
			}
		redirect("auth/roles");	
	}
	
	//create url
	function createurl() {
		//$this->output->enable_profiler(TRUE);
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			if($this->input->post('url_name')) {
				$status		=	$this->aranax_auth->create_auth_url($this->input->post('url_name'), 
													 $this->input->post('url_description')
													);
				if($status){
					$this->session->set_flashdata('success', 'URL created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'URL creation failed');
				}
			}	
			redirect("auth/permissions");
		}
		
	}

	//permissions
	function permissions() {
		//$this->output->enable_profiler(TRUE);
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			//$this->load->library('controllerlist');
			//$data["urls"]			=	$this->controllerlist->getControllers();
			
			$data["role_options"]	=	$this->aranax_auth->get_user_roles_option();
			$data["selected_role"]	=	null;
			if($this->input->post('role_id')) {
				$data["acl"]		=	$this->aranax_auth->get_auth_urls_by_role($this->input->post('role_id'));
				$data["selected_role"]	=	$this->input->post('role_id');
			}
			else {
				$data["acl"]		=	array();
			}
		}
		
		$data["page_title"]	=	"User Permissions";
		$this->load->view("common/header", $data);
		$this->load->view("auth/permissions", $data);
	}
	
	//assign permission
	function assignpermission() {
		//$this->output->enable_profiler(TRUE);
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			if( $this->input->post('hidden_role_id') && $this->input->post('hidden_acl') ) {
				if($this->aranax_auth->assign_access($this->input->post('hidden_role_id'), $this->input->post('hidden_acl'))) {
					redirect("auth/permissions");
				}
			}
			
		}
	}
	
	//unauthorised
	function unauthorised() {
		$data["page_title"]	=	"Unauthorised Access";
		$this->load->view("common/header", $data);
		$this->load->view("auth/unauthorised", $data);
	}

}	