<?php
class Centersmodel extends CI_Model {
    
    function __construct() {
        parent::__construct();
		$this->load->database();
		$ci = get_instance();
		$ci->load->helper('string');
    }
    
	//list all centers
    function list_all_centers() {
		$center_table = 'center';
		$this->db->select('*');
		$this->db->from($center_table);
		$this->db->where('status !=', 0);
        $query = $this->db->get();
		return $query->result();
	}
	
	//get centers value by id
	function getCentersValueById($id) {
		$center_table = 'center';
		$this->db->select('*');
		$this->db->from($center_table);
		$this->db->where('center_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create Centers  
	function createCenter($center_name,$center_address,$phone_no,$center_email,$center_header,$center_footer) {
        $center_table = 'center';
        if(!empty($center_name)) {
            $this->db->select_max('center_id');
            $query = $this->db->get($center_table);
            $res = $query->result();
            $id = ($res[0]->center_id)+1;

            $this->db->set('center_id', $id);
            $this->db->set('center_name', $center_name);
			$this->db->set('center_address', $center_address);
			$this->db->set('center_phone', $phone_no);
			$this->db->set('center_email', $center_email);
			$this->db->set('center_header', $center_header);
			$this->db->set('center_footer', $center_footer);
            $res = $this->db->insert($center_table);
        }

        return ($id < 1) ? false : true;
    }


	//update centers  
	function editCenter($center_id_edit, $center_name, $center_address, $phone_no, $center_email, $center_header, $center_footer) {
		$center_table = 'center';
		if(!empty($center_name)) {
			$this->db->set('center_name', $center_name);
			$this->db->set('center_address', $center_address);
			$this->db->set('center_phone', $phone_no);
			$this->db->set('center_email', $center_email);
			$this->db->set('center_header', $center_header);
			$this->db->set('center_footer', $center_footer);
			$this->db->where('center_id', $center_id_edit);
			$result = $this->db->update($center_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete departments
	function deleteCenter($center_id) {
		$center_table = 'center';
		if( !empty($center_id) ) {
			$this->db->set('status', 0);
			$this->db->where('center_id', $center_id);
			$result = $this->db->update($center_table);
		}
		
		return ($result) ? true : false;
	}
}
?>    