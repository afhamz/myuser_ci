<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		member_logged_in();

		$this->load->model('M_Member');
	}

	public function index()
	{
		$data['count_member'] = $this->M_Member->member_count()->result();
		$this->load->view('member/Vm_dashboard', $data);
	}

	/*==================== MODULES MEMBER ====================*/
    //READ
	public function read_member()
	{
		$data['data_member'] = $this->M_Member->tb_member()->result();
        $this->load->view('member/Vm_member-read', $data);
	}


    //UPDATE
	public function profile_member($member_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_member'] = $this->M_Member->member_id($member_id)->row();
        $this->load->view('member/Vm_member-profile', $data);
	}
	public function profile_member_update()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('fullname','FULL NAME','required');
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('birthdate','BIRTH DATE','required');
    	$this->form_validation->set_rules('email','EMAIL','required|trim|valid_email');  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
        	$this->load->view('member/Vm_member-read');
		}
		else
		{
			$data['member_user'] 	= $this->input->post('username');  
			$data['member_pass'] 	= md5($this->input->post('password'));
			$data['member_nama'] 	= $this->input->post('fullname');
			$data['member_alamat'] 	= $this->input->post('address');
			$data['member_ttl'] 	= date("Y-m-d", strtotime($this->input->post('birthdate')));
			$data['member_email'] 	= $this->input->post('email');
			$member_id 	 			= $this->input->post('member_id');
        	$this->M_Member->profile_member($member_id, $data);
			redirect(site_url('member/C_Member/read_member'));
		}
	}

}
?>