<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('departmentmodel');
	}
		
	//list all Department
	function master() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["departments"] = $this->departmentmodel->list_all_departments();
		}
		$data["page_title"]	= "All Departments";
		$this->load->view("common/header", $data);
		$this->load->view("master/department", $data);
	}
	
	//get department values by id
	function getDepartmentById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$department_val = $this->departmentmodel->getDepartmentValueById($this->uri->segment(3));
			foreach($department_val as $dept_val) {
				echo $dept_val->department_name;
			}
			//echo json_encode($department_val);
		}
	}
	
	//create Department
	function create() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('department_name')) {
				$status = $this->departmentmodel->createDepartment($this->input->post('department_name'));
				if($status){
					$this->session->set_flashdata('success', 'Department created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Department creation failed');
				}
			}	
			redirect("department/master");
		}
		
	}
	
	//edit Department
	function edit() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('department_name')) {
				$status = $this->departmentmodel->editDepartment($this->input->post('department_id'), $this->input->post('department_name'));
				if($status){
					$this->session->set_flashdata('success', 'Department updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Department update failed');
				}
			}	
			redirect("department/master");
		}
		
	}
	
	//delete Department
	function remove() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->departmentmodel->deleteDepartment($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Department deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Department deletion failed');
					}
				}
			}
		redirect("department/master");	
	}

}	