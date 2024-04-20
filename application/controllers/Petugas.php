<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (empty($this->session->userdata('Petugas'))) {
			redirect('petugas/login');
		}
		$data['iuran'] = $this->Madmin->get_all_data('tbl_iuran_wajib')->result();
		$data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/menu', $data);
		$this->load->view('petugas/iuran/tampil', $data);
		$this->load->view('petugas/layout/footer');
	}
	public function login()
	{
		$this->load->view('petugas/login');
	}

	public function login_aksi()
	{
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

			redirect('petugas/login');
		} else {

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
				redirect('petugas_iuran');
			} else {
				$this->session->set_flashdata('error', 'Your username or password is incorrect!');

				$input_userName = $this->input->post('userName');
				$input_password = $this->input->post('password');

				$this->session->set_flashdata('input_userName', $input_userName);
				$this->session->set_flashdata('input_password', $input_password);

				redirect('petugas/login');
			}
		}
	}

	public function register()
	{
		$this->load->view('petugas/register');
	}

	public function register_aksi()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('userName', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');

		if ($this->form_validation->run() == FALSE) {
			$error_name = form_error('name');
			$error_userName = form_error('userName');
			$error_password = form_error('password');

			$input_name = $this->input->post('name');
			$input_userName = $this->input->post('userName');
			$input_password = $this->input->post('password');

			$this->session->set_flashdata('error_name', $error_name);
			$this->session->set_flashdata('error_userName', $error_userName);
			$this->session->set_flashdata('error_password', $error_password);

			$this->session->set_flashdata('input_name', $input_name);
			$this->session->set_flashdata('input_userName', $input_userName);
			$this->session->set_flashdata('input_password', $input_password);

			redirect('petugas/register');
		} else {
			$n = $this->input->post('name');
			$u = $this->input->post('userName');
			$p = $this->input->post('password');
			$statusAktif = $this->input->post('statusAktif');

			$hashed_password = password_hash($p, PASSWORD_DEFAULT);
			$petugas_data = array(
				'name' => $n,
				'userName' => $u,
				'password' => $hashed_password,
				'statusAktif' => $statusAktif
			);

			$this->Madmin->save_petugas($petugas_data);
			$this->session->set_flashdata('success', 'Register petugas berhasil!');

			redirect('petugas/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('petugas/login');
	}
}
