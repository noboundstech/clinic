<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('Aranax_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('testmodel');
		//$this->load->model('departmentmodel');
		$this->load->model('patientmodel');
	}
		
	//list of all tests
	function index() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["patients"] = $this->patientmodel->listPatient();
			$data["tests"] = $this->testmodel->listTest();
			//$data["testcategory"] = $this->testmodel->listTestCategory();
			//$data["departments"] = $this->departmentmodel->list_all_departments();
		}
		$data["page_title"]	= "Add Patient";
		$this->load->view("common/header", $data);
		$this->load->view("patient/patient", $data);
	}
	
	//get test values by id
	function getTestById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$test_val = $this->testmodel->getTestValueById($this->uri->segment(3));
			foreach($test_val as $tst_val) {
				echo $tst_val->test_name.','.$tst_val->test_short_name.','.$tst_val->testcategory_id.','.$tst_val->department_id;
			}
		}
	}
	
	//create test
	function createpatient() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				echo $this->input->post('testcategory');
				if($this->input->post('testcategory')) {
				$status = $this->patientmodel->createPatient($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Patient created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Patient creation failed');
				}
			}	
			redirect("patient/index");
		}
		
	}
		
	//edit test
	function edittest() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('test_name')) {
				$status = $this->testmodel->editTest($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Test updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Test update failed');
				}
			}	
			redirect("test/index");
		}
		
	}
	
	//delete test
	function removetest() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->testmodel->deleteTest($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Test deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Test deletion failed');
					}
				}
			}
		redirect("test/index");
	}
		
	//list all test categories
	function category() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["categories"] = $this->testmodel->listTestCategory();
		}
		$data["page_title"]	= "All Test Categories";
		$this->load->view("common/header", $data);
		$this->load->view("master/testcategory", $data);
	}
	
	//get category values by id
	function getCategoryById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$category_val = $this->testmodel->getCategoryValueById($this->uri->segment(3));
			foreach($category_val as $cat_val) {
				echo $cat_val->testcategory_name;
			}
		}
	}
	
	//create Category
	function createcategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('testcategory_name')) {
				$status = $this->testmodel->createTestCategory($this->input->post('testcategory_name'));
				if($status){
					$this->session->set_flashdata('success', 'Category created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Category creation failed');
				}
			}	
			redirect("test/category");
		}
		
	}

	//edit Category
	function editcategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('testcategory_name')) {
				$status = $this->testmodel->editTestCategory($this->input->post('testcategory_id'), $this->input->post('testcategory_name'));
				if($status){
					$this->session->set_flashdata('success', 'Category updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Category update failed');
				}
			}	
			redirect("test/category");
		}
		
	}
	
	//delete Category
	function removecategory() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->testmodel->deleteTestCategory($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Category deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Category deletion failed');
					}
				}
			}
		redirect("test/category");
	}
	
	//test price list
	function pricelist() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$data["role_options"] =	$this->aranax_auth->get_user_roles_option();
			$data["prices"] = $this->testmodel->listTestPrice();
			$data["tests"] = $this->testmodel->listTest();
		}
		$data["page_title"]	= "All Test Prices";
		$this->load->view("common/header", $data);
		$this->load->view("master/testprice", $data);
	}
	
	//get price values by id
	function getPriceById() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
			$price_val = $this->testmodel->getPriceValueById($this->uri->segment(3));
			foreach($price_val as $prc_val) {
				echo $prc_val->test_id.','.$prc_val->net_price.','.$prc_val->gross_price;
			}
		}
	}
	
	//add price
	function addprice() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('test_id')) {
				$status = $this->testmodel->addTestPrice($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Price created successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Price creation failed');
				}
			}	
			redirect("test/pricelist");
		}
		
	}
	
	//edit price
	function editprice() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if($this->input->post('test_id')) {
				$status = $this->testmodel->editTestPrice($this->input->post());
				if($status){
					$this->session->set_flashdata('success', 'Price updated successfully');	
				}else{
					$this->session->set_flashdata('failure', 'Price update failed');
				}
			}	
			redirect("test/pricelist");
		}
		
	}
	
	//delete price
	function removeprice() {
		if ( !$this->aranax_auth->is_logged_in() || !$this->aranax_auth->has_access() ) {
			redirect("unauthorised");
		}
		else {
				if( $this->uri->segment(3) ) {
					$status = $this->testmodel->deleteTestPrice($this->uri->segment(3));
					if($status){
						$this->session->set_flashdata('success', 'Test price deleted successfully');	
					}else{
						$this->session->set_flashdata('failure', 'Test price deletion failed');
					}
				}
			}
		redirect("test/pricelist");
	}
	
}	