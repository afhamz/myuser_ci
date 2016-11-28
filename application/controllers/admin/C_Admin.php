<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		admin_logged_in();

		$this->load->model('M_Admin');
	}

	public function index()
	{
		$data['count_admin']  = $this->M_Admin->admin_count()->result();
		$data['count_member'] = $this->M_Admin->member_count()->result();
		$this->load->view('admin/Va_dashboard', $data);
	}

	/*==================== MODULES ADMIN ====================*/
	//CREATE
	public function create_admin()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_member']	= $this->M_Admin->tb_member()->result();

		$this->load->view('admin/Va_admin-create', $data);
	}
	public function create_admin_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[admin.admin_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_admin-create');
		}
		else
		{
			$data['admin_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['admin_pass'] = md5($this->input->post('password'));
			$this->M_Admin->create_admin($data);
			redirect(site_url('admin/C_Admin/read_admin'));
		}
	}


    //READ
	public function read_admin()
	{
		$data['data_admin'] = $this->M_Admin->tb_admin()->result();
        $this->load->view('admin/Va_admin-read', $data);
	}


    //UPDATE
	public function update_admin($admin_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin'] = $this->M_Admin->admin_id($admin_id)->row();
        $this->load->view('admin/Va_admin-update', $data);
	}
	public function update_admin_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_admin-create');
		}
		else
		{
			$data['admin_user'] = str_replace(' ', '', $this->input->post('username'));  
			$data['admin_pass'] = md5($this->input->post('password'));
			$admin_id 	 		= $this->input->post('admin_id');
        	$this->M_Admin->update_admin($admin_id, $data);
			redirect(site_url('admin/C_Admin/read_admin'));
		}
	}


    //DELETE
	public function delete_admin($admin_id)
	{
        $this->M_Admin->delete_admin($admin_id);
		redirect(site_url('admin/C_Admin/read_admin'));     
	}


	/*==================== MODULES MEMBER ====================*/
	//CREATE
	public function create_member()
	{
		//GET REQUIRED DATA FROM DB
		$data['data_admin']		= $this->M_Admin->tb_admin()->result();
		$data['data_member']	= $this->M_Admin->tb_member()->result();

		$this->load->view('admin/Va_member-create', $data);
	}
	public function create_member_process()
	{
    	$this->form_validation->set_rules('username','USERNAME','required|trim|min_length[5]|max_length[20]|is_unique[member.member_user]',
					    		array(
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('fullname','MEMBER NAME','required');
    	$this->form_validation->set_rules('address','ADDRESS','required');
    	$this->form_validation->set_rules('birthdate','BIRTH DATE','required');
    	$this->form_validation->set_rules('email','EMAIL','required|trim|valid_email|is_unique[member.member_email]',
					    		array(
					    			'required' => 'Not valid EMAIL address, must be username@domain.com',
					                'is_unique' => 'This %s already exists.'
					        	));  
    	$this->form_validation->set_rules('password','PASSWORD','required|min_length[5]|max_length[20]');  
    	$this->form_validation->set_rules('passconf','CONFIRM PASSWORD','required|matches[password]');  

		if($this->form_validation->run() == FALSE)
		{  
			$this->load->view('admin/Va_member-create');
		}
		else
		{
			$data['member_user'] 	= $this->input->post('username');  
			$data['member_pass'] 	= md5($this->input->post('password'));
			$data['member_nama'] 	= $this->input->post('fullname');
			$data['member_alamat'] 	= $this->input->post('address');
			$data['member_ttl'] 	= date("Y-m-d", strtotime($this->input->post('birthdate')));
			$data['member_email'] 	= $this->input->post('email');
			$this->M_Admin->create_member($data);
			redirect(site_url('admin/C_Admin/read_member'));
		}
	}


    //READ
	public function read_member()
	{
		$data['data_member'] = $this->M_Admin->tb_member()->result();
        $this->load->view('admin/Va_member-read', $data);
	}


    //UPDATE
	public function update_member($member_id)
	{
		//GET REQUIRED DATA FROM DB
		$data['data_member'] = $this->M_Admin->member_id($member_id)->row();
        $this->load->view('admin/Va_member-update', $data);
	}
	public function update_member_process()
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
			$this->load->view('admin/Va_member-create');
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
        	$this->M_Admin->update_member($member_id, $data);
			redirect(site_url('admin/C_Admin/read_member'));
		}
	}


    //DELETE
	public function delete_member($member_id)
	{
        $this->M_Admin->delete_member($member_id);
		redirect(site_url('admin/C_Admin/read_member'));     
	}

}
?>