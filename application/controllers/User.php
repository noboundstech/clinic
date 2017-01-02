<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('usermodel');
	}
	
	
	//list all users
	function index() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"]	=	$this->aranax_auth->get_user_roles_option();
			$data["users"]	=	$this->usermodel->list_all_users();
		}
		$data["page_title"]	=	"All Users";
		$this->load->view("common/header", $data);
		$this->load->view("user/index", $data);
	}
	
	//create user 
	function createuser() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			if($this->input->post('user_name')) {
				$status		=	$this->aranax_auth->create_user();
				if($status){
					$this->session->set_flashdata('success', 'User created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'User creation failed');
				}
			}	
			redirect("user/index");	
		}
		/*$data["page_title"]	=	"Create New User";
		$this->load->view("common/header", $data);
		$this->load->view("user/createuser", $data);*/
	}

	//user dashboard
	function dashboard() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		$data["page_title"]	=	"Dashboard";
		$this->load->view("common/header", $data);
		$this->load->view("user/dashboard", $data);
	}
	
	//user category list
	function category() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["categories"] = $this->usermodel->listUserCategory();
		}
		$data["page_title"]	= "All User Categories";
		$this->load->view("common/header", $data);
		$this->load->view("master/usercategory", $data);
	}
	
	//get user category values by id
	function getCategoryById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$category_val = $this->usermodel->getCategoryValueById($this->uri->segment(3));
			foreach($category_val as $cat_val) {
				echo $cat_val->usercategory_name;
			}
		}
	}
	
	//create user category
	function createcategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('usercategory_name')) {
				$status = $this->usermodel->createUserCategory($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Category created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Category creation failed');
				}
			}	
			redirect("user/category");
		}
		
	}
	
	//edit user category
	function editcategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('usercategory_id')) {
				$status = $this->usermodel->editUserCategory($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Category updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Category update failed');
				}
			}	
			redirect("user/category");
		}
		
	}
	
	//delete user category
	function removecategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->usermodel->deleteUserCategory($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Category deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Category deletion failed');
					}
				}
			}
		redirect("user/category");
	}
	
}	