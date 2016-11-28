<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Member extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	

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


	//UPDATE
	function profile_member($member_id, $data)
	{
		$this->db->where(array('member_id' => $member_id, 'member_id !=' => 1));
		$this->db->update('member', $data);   
	}

	// function yang digunakan oleh paginationsample
	function select_all_paging($limit=array())
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
    