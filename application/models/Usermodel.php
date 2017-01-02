<?php
class Usermodel extends CI_Model {
    
	private $user_category_table = 'usercategory';
	
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
	
	//list all user categories
    function listUserCategory() {
		$this->db->select('*');
		$this->db->from($this->user_category_table);
		$this->db->where('status !=', 0);
        $query = $this->db->get();
		return $query->result();
	}
	
	//get user category value by id
	function getCategoryValueById($id) {
		$this->db->select('*');
		$this->db->from($this->user_category_table);
		$this->db->where('usercategory_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create user categories  
	function createUserCategory($post) {
		if(!empty($post['usercategory_name'])) {
			$this->db->select_max('usercategory_id');
			$query = $this->db->get($this->user_category_table); 
			$res = $query->result();
			$id = ($res[0]->usercategory_id)+1;
			
			$this->db->set('usercategory_id', $id);
			$this->db->set('usercategory_name', $post['usercategory_name']);
			$res = $this->db->insert($this->user_category_table);
		}
		
		return ($id < 1) ? false : true;	
	} 
	
	//update user categories   
	function editUserCategory($post) {
		if(!empty($post['usercategory_id'])) {
			$this->db->set('usercategory_name', $post['usercategory_name']);
			$this->db->where('usercategory_id', $post['usercategory_id']);
			$result = $this->db->update($this->user_category_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete user categories 
	function deleteUserCategory($usercategory_id) {
		if( !empty($usercategory_id) ) {
			$this->db->set('status', 0);
			$this->db->where('usercategory_id', $usercategory_id);
			$result = $this->db->update($this->user_category_table);
		}
		
		return ($result) ? true : false;
	}
}
?>    