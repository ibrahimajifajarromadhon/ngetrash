<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->Madmin->get_by_id('tbl_user', array('idUser' => $this->session->userdata('idUser')))->row();
		$this->load->view('user/layout/header', $data);
		$this->load->view('user/dashboard');
		$this->load->view('user/layout/footer');
	}

	public function login()
	{
		$this->load->view('user/login');
	}

	public function login_aksi()
	{
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

			redirect('user/login');
		}

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
			$this->session->set_flashdata('error', 'Your username or password is incorrect!');

			$input_userName = $this->input->post('userName');
			$input_password = $this->input->post('password');

			$this->session->set_flashdata('input_userName', $input_userName);
			$this->session->set_flashdata('input_password', $input_password);

			redirect('user/login');
		}
	}

	public function register(){
        $this->load->view('user/register');
    }

	public function register_aksi()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('userName', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
		$this->form_validation->set_rules('alamat', 'Address', 'required|min_length[5]|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
			$error_name = form_error('name');
			$error_userName = form_error('userName');
			$error_password = form_error('password');
			$error_alamat = form_error('alamat');

			$input_name = $this->input->post('name');
			$input_userName = $this->input->post('userName');
			$input_password = $this->input->post('password');
			$input_alamat = $this->input->post('alamat');

			$this->session->set_flashdata('error_name', $error_name);
			$this->session->set_flashdata('error_userName', $error_userName);
			$this->session->set_flashdata('error_password', $error_password);
			$this->session->set_flashdata('error_alamat', $error_alamat);

			$this->session->set_flashdata('input_name', $input_name);
			$this->session->set_flashdata('input_userName', $input_userName);
			$this->session->set_flashdata('input_password', $input_password);
			$this->session->set_flashdata('input_alamat', $input_alamat);

			redirect('user/register');
		} else {
			$n = $this->input->post('name');
			$u = $this->input->post('userName');
			$p = $this->input->post('password');
			$a = $this->input->post('alamat');
			$sm = $this->input->post('saldoMasuk');
			$sk = $this->input->post('saldoKeluar');
			$ts = $this->input->post('totalSaldo');
			$statusAktif = $this->input->post('statusAktif');

			$hashed_password = password_hash($p, PASSWORD_DEFAULT);

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
			$this->session->set_flashdata('success', 'Register user berhasil!');

			redirect('user/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}
}
