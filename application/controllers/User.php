<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

	public function index(){
		$data['user'] = $this->Madmin->get_by_id('tbl_user', array('idUser' => $this->session->userdata('idUser')))->row();
		$this->load->view('user/layout/header', $data);
		$this->load->view('user/dashboard');
		$this->load->view('user/layout/footer');	
	}

	public function login(){
        $this->load->view('user/login');
    }

	public function login_aksi(){
		$this->load->model('Madmin');

		$u = $this->input->post('userName');
		$p = $this->input->post('password');

		$cek = $this->Madmin->cek_login_user($u, $p);

		if ($cek['loggedIn']) {
			$data_session = array(
				'idUser' => $cek['idUser'],
				'User' => $u,
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);
			redirect('user');
		} else {
			redirect('user');
		}
}

	public function register(){
		//Membuat aturan dari form validasi
		$this->form_validation->set_rules('userName', 'Username', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Password Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
		
		if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('user/register');
        } else{
			$n = $this->input->post('name');
			$u = $this->input->post('userName');
            $p = $this->input->post('password');
			$a = $this->input->post('alamat');
			$sm = $this->input->post('saldoMasuk');
			$sk = $this->input->post('saldoKeluar');
			$ts = $this->input->post('totalSaldo');
			$statusAktif = $this->input->post('statusAktif');
            
            // Encrypt password 
            $hashed_password = password_hash($p, PASSWORD_DEFAULT);
			// Save member
            $user_data = array(
				'name' => $n,
                'userName' => $u,
                'password' => $hashed_password,
				'alamat' => $a,
				'saldoMasuk' => $sm,
				'saldoKeluar' => $sk,
				'totalSaldo' => $ts,
				'statusAktif' => $statusAktif
			);
            
            $this->Madmin->save_user($user_data);
            
            redirect('user');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
}

?>