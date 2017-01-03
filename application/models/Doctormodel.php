<?php
class Doctormodel extends CI_Model {
    
	private $doctor_details_table = 'doctor_details';
	
    function __construct() {
        parent::__construct();
		$this->load->database();
		$ci = get_instance();
		$ci->load->helper('string');
    }
    
	//list all doctors
    function listAllDoctors() {
		$this->db->select('*');
		$this->db->from($this->doctor_details_table);
		$this->db->where('status !=', 0);
        $query = $this->db->get();
		return $query->result();
	}
	
	//get doctor value by id
	function getDoctorValueById($id) {
		$this->db->select('*');
		$this->db->from($this->doctor_details_table);
		$this->db->where('doctor_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create doctor  
	function createDoctor($data) {
		if(!empty($data['doctor_name'])) {
			$this->db->select_max('doctor_id');
			$query = $this->db->get($this->doctor_details_table); 
			$res = $query->result();
			$id = ($res[0]->doctor_id)+1;
			
			$this->db->set('doctor_id', $id);
			$this->db->set('doctor_name', $data['doctor_name']);
			$this->db->set('doctor_address', $data['doctor_address']);
			$this->db->set('doctor_phone1', $data['doctor_phone1']);
			$this->db->set('doctor_phone2', $data['doctor_phone2']);
			$this->db->set('doctor_email', $data['doctor_email']);
			$res = $this->db->insert($this->doctor_details_table);
		}
		
		return ($id < 1) ? false : true;	
	} 

	//update doctor  
	function editDoctor($data) {
		if(!empty($data['doctor_name'])) {
			$this->db->set('doctor_id', $data['doctor_id']);
			$this->db->set('doctor_name', $data['doctor_name']);
			$this->db->set('doctor_address', $data['doctor_address']);
			$this->db->set('doctor_phone1', $data['doctor_phone1']);
			$this->db->set('doctor_phone2', $data['doctor_phone2']);
			$this->db->set('doctor_email', $data['doctor_email']);
			$this->db->where('doctor_id', $data['doctor_id']);
			$result = $this->db->update($this->doctor_details_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete doctor
	function deleteDoctor($doctor_id) {
		if( !empty($doctor_id) ) {
			$this->db->set('status', 0);
			$this->db->where('doctor_id', $doctor_id);
			$result = $this->db->update($this->doctor_details_table);
		}
		
		return ($result) ? true : false;
	}
}
?>    