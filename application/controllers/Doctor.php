<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('doctormodel');
	}
		
	//list all doctors
	function index() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["doctors"] = $this->doctormodel->listAllDoctors();
		}
		$data["page_title"]	= "All Doctors";
		$this->load->view("common/header", $data);
		$this->load->view("master/doctor", $data);
	}
	
	//get doctors values by id
	function getDoctorById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$doctors_val = $this->doctormodel->getDoctorValueById($this->uri->segment(3));
			foreach($doctors_val as $doc_val) {
				echo $doc_val->doctor_name.','.$doc_val->doctor_address.','.$doc_val->doctor_phone1.','.$doc_val->doctor_phone2.','.$doc_val->doctor_email;
			}
		}
	}
	
	//create doctor
	function create() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('doctor_name')) {
				$status = $this->doctormodel->createDoctor($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Doctor created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Doctor creation failed');
				}
			}	
			redirect("doctor/index");
		}
		
	}
	
	//edit doctor
	function edit() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('doctor_name')) {
				$status = $this->doctormodel->editDoctor($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Doctor updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Doctor update failed');
				}
			}	
			redirect("doctor/index");
		}
		
	}
	
	//delete doctor
	function remove() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->doctormodel->deleteDoctor($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Doctor deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Doctor deletion failed');
					}
				}
			}
		redirect("doctor/index");
	}

}	