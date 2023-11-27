<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasStatus extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('petugas');
        }
        $data['status']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/status/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/status/form_tambah');
		$this->load->view('petugas/layout/footer');
	}



}

?>