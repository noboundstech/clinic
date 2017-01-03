<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centers extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('centersmodel');
	}
		
	//list all Centers
	function master() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["centers"] = $this->centersmodel->list_all_centers();
		}
		$data["page_title"]	= "All Centers";
		$this->load->view("common/header", $data);
		$this->load->view("master/centers", $data);
	}
	
	//get center values by id at
	function getCentersById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$centers_val = $this->centersmodel->getCentersValueById($this->uri->segment(3));
			foreach($centers_val as $center_val) {
				echo $center_val->center_name.','.$center_val->center_address.','.$center_val->center_phone.','.$center_val->center_email.','.
				$center_val->center_header.','.$center_val->center_footer;
			}
			//echo json_encode($department_val);
		}
	}
	
	//create Center
	function create() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('center_name')) {
				$status = $this->centersmodel->createCenter($this->input->post('center_name'),
																	$this->input->post('center_address'),
																	$this->input->post('phone_no'),
																	$this->input->post('center_email'),
																	$this->input->post('center_header'),
																	$this->input->post('center_footer')
																	);
				if($status){
					$this->session->set_flashdata('success', 'Center created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Center creation failed');
				}
			}	
			redirect("centers/master");
		}
		
	}
	
	//edit Department
	function edit() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('center_name')) {
				$status = $this->centersmodel->editCenter($this->input->post('center_id_edit'), 
															$this->input->post('center_name'), 
															$this->input->post('center_address'), 
															$this->input->post('phone_no'), 
															$this->input->post('center_email'), 
															$this->input->post('center_header'), 
															$this->input->post('center_footer'));
				if($status){
					$this->session->set_flashdata('success', 'center updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'center update failed');
				}
			}	
			redirect("centers/master");
		}
		
	}
	
	//delete Center
	function remove() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->centersmodel->deleteCenter($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'center deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'center deletion failed');
					}
				}
			}
		redirect("centers/master");	
	}

}	