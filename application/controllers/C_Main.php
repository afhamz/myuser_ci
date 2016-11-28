<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Main');
		$this->load->model('M_Admin');
	}

	public function index()
	{
		//Check session
		if($this->session->userdata('admin_user'))
		{
			$this->load->view('admin/Va_dashboard');
		}
		elseif($this->session->userdata('member_user'))
		{
			$this->load->view('member/Vm_dashboard');
		}
		else
		{
			$this->load->view('V_Login');
		}
	}

	public function login()
	{
		$username  = $this->input->post('username');
		$password  = md5($this->input->post('password'));

		$cek_admin = $this->M_Main->get_admin($username,$password);
		$cek_member = $this->M_Main->get_member($username,$password);

		if($cek_admin->num_rows() == 1)
		{
			foreach($cek_admin->result_array() as $row)
			{
				$pass_auth = $row['admin_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'admin_id' 	 => $row['admin_id'],
						'admin_user' => $row['admin_user']
					);
					$this->session->set_userdata($row_data);
					redirect('admin/C_Admin');
				}
				else
				{
					//$data['error']='Wrong Password!';
					$this->load->view('V_Login');
				}

			}
		}
		elseif($cek_member->num_rows() == 1)
		{
			foreach($cek_member->result_array() as $row)
			{
				$pass_auth = $row['member_pass'];

				if($password == $pass_auth)
				{
					$row_data = array(
						'member_id'   => $row['member_id'],
						'member_user' => $row['member_user']
					);
					$this->session->set_userdata($row_data);
					redirect('member/C_Member');
				}
				else
				{
					//$data['error']='Wrong Password!';
					$this->load->view('V_Login');
				}

			}
		}
		else
		{
			//$data['error']='Wrong Username!';
			$this->load->view('V_Login');
		}
	
	}

    public function register()
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
			$this->load->view('V_Register');
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

			$pesan['success']  = "Registrasion Success!";  
			$this->load->view('V_Login2',$pesan);  
		}
	}  

    public function logout(){  
        $this->session->unset_userdata('admin_id');  
        $this->session->unset_userdata('admin_user');  
        $this->session->unset_userdata('member_id');  
        $this->session->unset_userdata('member_user');  
        redirect(site_url(''));  
    }  

}

?>