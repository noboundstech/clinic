<?php
class Usermodel extends CI_Model {
    
    function __construct() {
        parent::__construct();
		$this->load->database();
		$ci = get_instance();
		$ci->load->helper('string');
    }
    
	//create user  
	function create_user($data) {
		$user_table = 'users';
		$id		=	0;
		if(!empty($data)) {
			$this->db->insert($user_table, $data);
			$id = $this->db->insert_id();
		}
		
		return ($id == 0) ? false : true;	
	}    
    
    //list all users
    function list_all_users() {
		$user_table = 'users';
		$role_table = 'auth_roles';
		
		$this->db->select('user_name, CONCAT (user_firstname, " ", user_lastname) AS user_fullname, user_email, user_mobile, user_is_active, role_name');
        $this->db->from($user_table);
        $this->db->join($role_table, 'role_id = user_role_id');
        $this->db->order_by('user_firstname', 'ASC');
        $query = $this->db->get();
		return json_encode($query->result());
	}
}
?>    