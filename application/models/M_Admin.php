<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/*==================== MODULES ADMIN ====================*/
	//SELECT * FROM TABLES
	function tb_admin()
	{
		$this->db->select('*')
				 ->from('admin')
				 ->order_by('admin_user','asc');
		return $this->db->get();
	}

	function admin_count()
	{
		$this->db->select('COUNT(admin_id) AS admin_count')
				 ->from('admin');
		return $this->db->get();
	}

	function admin_id($admin_id)
	{
		$this->db->select('*')
				 ->from('admin')
				 ->where('admin_id', $admin_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_admin($data)
	{
		$this->db->insert('admin', $data);
	}	  	   
	    
	function update_admin($admin_id, $data)
	{
		$this->db->where(array('admin_id' => $admin_id, 'admin_id !=' => 1));
		$this->db->update('admin', $data);  
	}

	function delete_admin($admin_id)
	{ 
		$this->db->delete('admin', array(
							'admin_id' => $admin_id, 
							'admin_id !=' => 1
						));  
	}


	// Used for paginationsample
	function paging_admin($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('admin_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}


	/*==================== MODULES MEMBER ====================*/

	//SELECT * FROM TABLES
	function tb_member()
	{
		$this->db->select('*')
				 ->from('member')
				 ->order_by('member_user','asc');
		return $this->db->get();
	}

	function member_count()
	{
		$this->db->select('COUNT(member_id) AS member_count')
				 ->from('member');
		return $this->db->get();
	}

	function member_id($member_id)
	{
		$this->db->select('*')
				 ->from('member')
				 ->where('member_id', $member_id);
		return $this->db->get();
	}

	//CREATE, UPDATE, DELETE
	function create_member($data)
	{
		$this->db->insert('member', $data);
	}	  	   
	    
	function update_member($member_id, $data)
	{
		$this->db->where(array('member_id' => $member_id, 'member_id !=' => 1));
		$this->db->update('member', $data);  
	}

	function delete_member($member_id)
	{ 
		$this->db->delete('member', array(
							'member_id' => $member_id, 
							'member_id !=' => 1
						));    
	}


	// Used for paginationsample
	function paging_member($limit=array())
	{ 
		$this->db->select('*');
		$this->db->from('member');
		$this->db->order_by('member_user', 'asc');
		        
		if ($limit != NULL)
		$this->db->limit($limit['perpage'], $limit['offset']);
		           
		return $this->db->get();
	}

}
?>
    