<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasIuran extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Petugas'))) {
			redirect('petugas/login');
		}
        $data['iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        if(empty($this->session->userdata('Petugas'))) {
			redirect('petugas/login');
		}
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/iuran/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}



}

?>