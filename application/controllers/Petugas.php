<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

	public function index(){
		if(empty($this->session->userdata('Petugas'))) {
			redirect('petugas/login');
		}
		$data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/menu', $data);
		$this->load->view('petugas/dashboard');
		$this->load->view('petugas/layout/footer');	
	}
	public function login(){
		$this->load->view('petugas/login');
	}

	public function login_aksi(){
		$this->load->model('Madmin');

		$u = $this->input->post('userName');
		$p = $this->input->post('password');

		$cek = $this->Madmin->cek_login_petugas($u, $p);

		if ($cek['loggedIn']) {
			$data_session = array(
				'idPetugas' => $cek['idPetugas'],
				'Petugas' => $u,
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);
			redirect('petugas');
		} else {
			redirect('petugas');
		}
	}

	public function register(){
		//Membuat aturan dari form validasi
		$this->form_validation->set_rules('userName', 'Username', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Password Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
		
		if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('petugas/register');
        } else{
			$n = $this->input->post('name');
			$u = $this->input->post('userName');
            $p = $this->input->post('password');
			$statusAktif = $this->input->post('statusAktif');
            
            // Encrypt password 
            $hashed_password = password_hash($p, PASSWORD_DEFAULT);
			// Save member
            $petugas_data = array(
				'name' => $n,
                'userName' => $u,
                'password' => $hashed_password,
				'statusAktif' => $statusAktif
            );
            
            $this->Madmin->save_petugas($petugas_data);
            
            redirect('petugas');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('petugas/login');
	}
}

?>