<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Main extends CI_Model
{
	public function get_admin($username,$password)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE admin_user='$username' AND admin_pass='$password' ");
		return $query;
	}
	
	public function get_member($username,$password)
	{
		$query = $this->db->query("SELECT * FROM member WHERE member_user='$username' AND member_pass='$password' ");
		return $query;
	}

}

?>