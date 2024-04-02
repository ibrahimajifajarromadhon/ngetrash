<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct() {
        parent::__construct();
		$this->load->model('Madmin');
        $this->load->library('form_validation');
    }

	public function index(){
		if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
		$data['petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('admin/petugas/tampil', $data);
		$this->load->view('admin/layout/footer');	
	}

	public function login(){
		$this->load->view('admin/login');
	}

	public function login_aksi(){
		$this->load->model('Madmin');

		$this->form_validation->set_rules('userName', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
            $error_userName = form_error('userName');
            $error_password = form_error('password');

            $input_userName = $this->input->post('userName');
            $input_password = $this->input->post('password');

            $this->session->set_flashdata('error_userName', $error_userName);
            $this->session->set_flashdata('error_password', $error_password);

            $this->session->set_flashdata('input_userName', $input_userName);
            $this->session->set_flashdata('input_password', $input_password);

            redirect('admin/login');
        }

		$u = $this->input->post('userName');
		$p = $this->input->post('password');

		$cek = $this->Madmin->cek_login_admin($u, $p);

		if ($cek['loggedIn']) {
			$data_session = array(
				'idAdmin' => $cek['idAdmin'],
				'Admin' => $u,
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);
			redirect('admin_petugas');
		} else {
			$this->session->set_flashdata('error', 'Your username or password is incorrect!');
			
			$input_userName = $this->input->post('userName');
            $input_password = $this->input->post('password');

            $this->session->set_flashdata('input_userName', $input_userName);
            $this->session->set_flashdata('input_password', $input_password);
			
			redirect('admin/login');
		}
	}

	public function register(){
		$this->load->view('admin/register');
	}

	public function register_aksi(){
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('userName', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
            $error_name = form_error('name');
            $error_userName = form_error('userName');
            $error_password = form_error('password');

            $input_name= $this->input->post('name');
            $input_userName = $this->input->post('userName');
            $input_password = $this->input->post('password');

            $this->session->set_flashdata('error_name', $error_name);
            $this->session->set_flashdata('error_userName', $error_userName);
            $this->session->set_flashdata('error_password', $error_password);

            $this->session->set_flashdata('input_name', $input_name);
            $this->session->set_flashdata('input_userName', $input_userName);
            $this->session->set_flashdata('input_password', $input_password);

            redirect('admin/register');
        } else {
			$n = $this->input->post('name');
			$u = $this->input->post('userName');
            $p = $this->input->post('password');
            
            $hashed_password = password_hash($p, PASSWORD_DEFAULT);
            $admin_data = array(
				'name' => $n,
                'userName' => $u,
                'password' => $hashed_password
            );
            
            $this->Madmin->save_admin($admin_data);
			$this->session->set_flashdata('success', 'Register admin berhasil!');

            redirect('admin/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function laporan_petugas(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

		$config['base_url'] = base_url('admin_print/laporan_petugas/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_petugas');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['petugas'] = $this->Madmin->get_data_paginated('tbl_petugas', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		
		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('laporan/laporan_petugas', $data);
		$this->load->view('admin/layout/footer');	
	}

	function print_petugas() {	
		
        $data['data_petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();

		$this->load->view('print/petugas', $data);
	}

	public function laporan_user(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

		$config['base_url'] = base_url('admin_print/laporan_user/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_user');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['user'] = $this->Madmin->get_data_paginated('tbl_user', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('laporan/laporan_user', $data);
		$this->load->view('admin/layout/footer');	
	}

	function print_user() {	
		
        $data['data_user']=$this->Madmin->get_all_data('tbl_user')->result();

		$this->load->view('print/user', $data);
	}
	public function laporan_iuran(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

		$config['base_url'] = base_url('admin_print/laporan_iuran/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_iuran_wajib');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['iuran'] = $this->Madmin->get_data_paginated('tbl_iuran_wajib', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('laporan/laporan_iuran', $data);
		$this->load->view('admin/layout/footer');	
	}

	function print_iuran() {	
		
        $data['data_iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();

		$this->load->view('print/iuran', $data);
	}

	public function laporan_status(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

		$config['base_url'] = base_url('admin_print/laporan_status/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_status_pengambilan');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['status'] = $this->Madmin->get_data_paginated('tbl_status_pengambilan', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('laporan/laporan_status', $data);
		$this->load->view('admin/layout/footer');	
	}

	function print_status() {	
		
        $data['data_status']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();

		$this->load->view('print/status', $data);
	}

	public function laporan_daur(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

		$config['base_url'] = base_url('admin_print/laporan_daur/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_daur_ulang');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['daur'] = $this->Madmin->get_data_paginated('tbl_daur_ulang', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/menu', $data);
		$this->load->view('laporan/laporan_daur', $data);
		$this->load->view('admin/layout/footer');	
	}

	function print_daur() {	
		
        $data['data_daur']=$this->Madmin->get_all_data('tbl_daur_ulang')->result();

		$this->load->view('print/daur', $data);
	}
}


?>