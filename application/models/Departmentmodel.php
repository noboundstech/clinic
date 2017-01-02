<?php
class Departmentmodel extends CI_Model {
    
    function __construct() {
        parent::__construct();
		$this->load->database();
		$ci = get_instance();
		$ci->load->helper('string');
    }
    
	//list all departments
    function list_all_departments() {
		$department_table = 'department_master';
		$this->db->select('*');
		$this->db->from($department_table);
		$this->db->where('status !=', 0);
        $query = $this->db->get();
		return $query->result();
	}
	
	//get department value by id
	function getDepartmentValueById($id) {
		$department_table = 'department_master';
		$this->db->select('*');
		$this->db->from($department_table);
		$this->db->where('department_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create departments  
	function createDepartment($department_name) {
		$department_table = 'department_master';
		if(!empty($department_name)) {
			$this->db->select_max('department_id');
			$query = $this->db->get($department_table); 
			$res = $query->result();
			$id = ($res[0]->department_id)+1;
			
			$this->db->set('department_id', $id);
			$this->db->set('department_name', $department_name);
			$res = $this->db->insert($department_table);
		}
		
		return ($id < 1) ? false : true;	
	} 

	//update departments  
	function editDepartment($department_id, $department_name) {
		$department_table = 'department_master';
		if(!empty($department_name)) {
			$this->db->set('department_name', $department_name);
			$this->db->where('department_id', $department_id);
			$result = $this->db->update($department_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete departments
	function deleteDepartment($department_id) {
		$department_table = 'department_master';
		if( !empty($department_id) ) {
			$this->db->set('status', 0);
			$this->db->where('department_id', $department_id);
			$result = $this->db->update($department_table);
		}
		
		return ($result) ? true : false;
	}
}
?>    