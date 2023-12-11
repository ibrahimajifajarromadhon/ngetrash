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
			redirect('admin');
		} else {
			redirect('admin');
		}
	}

	public function register(){
		$this->form_validation->set_rules('userName', 'Username', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Password Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
		
		if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/register');
        } else{
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
            
            redirect('admin');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function laporan_petugas(){
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
        $data['data_petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();

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
        $data['data_user']=$this->Madmin->get_all_data('tbl_user')->result();

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
        $data['data_iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();

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
        $data['data_status']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();

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
        $data['data_daur']=$this->Madmin->get_all_data('tbl_daur_ulang')->result();

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