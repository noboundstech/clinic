<?php
class Testmodel extends CI_Model {
    
	private $test_category_table = 'testcategory';
	private $test_table = 'test';
	private $department_table = 'department_master';
	private $test_price_table = 'test_price';
	
    function __construct() {
        parent::__construct();
		$this->load->database();
		$ci = get_instance();
		$ci->load->helper('string');
    }
    
	//list all tests
    function listTest() {
		$query = $this->db->query('SELECT a.*,b.*,c.* FROM '.$this->test_table.' AS a, '.$this->test_category_table.' AS b, '.$this->department_table.' AS c WHERE a.department_id=c.department_id AND a.testcategory_id=b.testcategory_id AND a.status!=0');
		return $query->result();
	}
	
	//get test value by id
	function getTestValueById($id) {
		$this->db->select('*');
		$this->db->from($this->test_table);
		$this->db->where('test_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create test  
	function createTest($post) {
		if(!empty($post['test_name'])) {
			$this->db->select_max('test_id');
			$query = $this->db->get($this->test_table); 
			$res = $query->result();
			$id = ($res[0]->test_id)+1;
			
			$this->db->set('test_id', $id);
			$this->db->set('test_name', $post['test_name']);
			$this->db->set('test_short_name', $post['test_short_name']);
			$this->db->set('testcategory_id', $post['testcategory_id']);
			$this->db->set('department_id', $post['department_id']);
			$res = $this->db->insert($this->test_table);
		}
		
		return ($id < 1) ? false : true;	
	} 
	
	//update test  
	function editTest($post) {
		if(!empty($post['test_name'])) {
			$this->db->set('test_name', $post['test_name']);
			$this->db->set('test_short_name', $post['test_short_name']);
			$this->db->set('testcategory_id', $post['testcategory_id']);
			$this->db->set('department_id', $post['department_id']);
			$this->db->where('test_id', $post['test_id']);
			$result = $this->db->update($this->test_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete departments
	function deleteTest($test_id) {
		if( !empty($test_id) ) {
			$this->db->set('status', 0);
			$this->db->where('test_id', $test_id);
			$result = $this->db->update($this->test_table);
		}
		
		return ($result) ? true : false;
	}
	
	//list all test categories
    function listTestCategory() {
		$query = $this->db->query('SELECT a.*,b.* FROM '.$this->test_category_table.' AS a, '.$this->department_table.' AS b WHERE a.department_id=b.department_id AND a.status!=0');
		return $query->result();
	}
	
	//department wise test category list
	function departmentWiseTestCategory($department_id) {
		$this->db->select('*');
		$this->db->from($this->test_category_table);
		$this->db->where('department_id', $department_id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//get category value by id
	function getCategoryValueById($id) {
		$this->db->select('*');
		$this->db->from($this->test_category_table);
		$this->db->where('testcategory_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create category  
	function createTestCategory($testcategory_name, $department_id) {
		if(!empty($testcategory_name)) {
			$this->db->select_max('testcategory_id');
			$query = $this->db->get($this->test_category_table); 
			$res = $query->result();
			$id = ($res[0]->testcategory_id)+1;
			
			$this->db->set('testcategory_id', $id);
			$this->db->set('department_id', $department_id);
			$this->db->set('testcategory_name', $testcategory_name);
			$res = $this->db->insert($this->test_category_table);
		}
		
		return ($id < 1) ? false : true;	
	} 
		
	//update category  
	function editTestCategory($testcategory_id, $testcategory_name, $department_id) {
		if(!empty($testcategory_name)) {
			$this->db->set('department_id', $department_id);
			$this->db->set('testcategory_name', $testcategory_name);
			$this->db->where('testcategory_id', $testcategory_id);
			$result = $this->db->update($this->test_category_table);
		}
		
		return ($result) ? true : false;
	}  
	
	// delete departments
	function deleteTestCategory($testcategory_id) {
		if( !empty($testcategory_id) ) {
			$this->db->set('status', 0);
			$this->db->where('testcategory_id', $testcategory_id);
			$result = $this->db->update($this->test_category_table);
		}
		
		return ($result) ? true : false;
	}
	
	//list all test prices
    function listTestPrice() {
		$query = $this->db->query('SELECT a.*,b.* FROM '.$this->test_price_table.' AS a, '.$this->test_table.' AS b WHERE a.test_id=b.test_id AND a.status!=0');
		return $query->result();
	}
	
	//get price value by id
	function getPriceValueById($id) {
		$this->db->select('*');
		$this->db->from($this->test_price_table);
		$this->db->where('test_price_id', $id);
        $query = $this->db->get();
		return $query->result();
	}
	
	//create test price  
	function addTestPrice($post) {
		if(!empty($post['test_id'])) {
			$this->db->select_max('test_price_id');
			$query = $this->db->get($this->test_price_table); 
			$res = $query->result();
			$id = ($res[0]->test_price_id)+1;
			
			$this->db->set('test_price_id', $id);
			$this->db->set('test_id', $post['test_id']);
			$this->db->set('net_price', $post['net_price']);
			$this->db->set('gross_price', $post['gross_price']);
			$this->db->set('commission_price', $post['gross_price']-$post['net_price']);
			$res = $this->db->insert($this->test_price_table);
		}
		
		return ($id < 1) ? false : true;	
	} 
	
	//update price  
	function editTestPrice($post) {
		if(!empty($post['test_price_id'])) {
			$this->db->set('test_id', $post['test_id']);
			$this->db->set('net_price', $post['net_price']);
			$this->db->set('gross_price', $post['gross_price']);
			$this->db->set('commission_price', $post['gross_price']-$post['net_price']);
			$this->db->where('test_price_id', $post['test_price_id']);
			$result = $this->db->update($this->test_price_table);
		}
		
		return ($result) ? true : false;
	} 
	
	// delete test price
	function deleteTestPrice($test_price_id) {
		if( !empty($test_price_id) ) {
			$this->db->set('status', 0);
			$this->db->where('test_price_id', $test_price_id);
			$result = $this->db->update($this->test_price_table);
		}
		
		return ($result) ? true : false;
	}
	
}
?>    