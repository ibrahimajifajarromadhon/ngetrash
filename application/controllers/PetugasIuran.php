<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasIuran extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugas/login');
        }
        $data['iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/iuran/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/iuran/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function save(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasiuran');
        }
            $id_u = $this->input->post('IdUser');
            $id_p = $this->input->post('IdPetugas');
            $tanggal = $this->input->post('tanggal');
            $jenisbayar = $this->input->post('jenisBayar');
            $status = $this->input->post('status');
            $dataInput = array('IdUser' => $id_u,
                                'IdPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'jenisBayar' => $jenisbayar,
                                'status' => $status);
            $this->Madmin->insert('tbl_iuran_wajib', $dataInput);
            redirect('petugasiuran');
    }
    public function get_by_id($id){
        if(empty($this->session->userdata('userName'))){
            redirect('petugasiuran');
        }
        $dataWhere = array('idIuran' => $id);
        $data['iuran']=$this->Madmin->get_by_id('tbl_iuran_wajib', $dataWhere)->row_object();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/iuran/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function edit($id){
        $data['iuran'] = $this->Madmin->get_by_id('tbl_iuran_wajib', array('idIuran' => $id))->row();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/petugasiuran/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }
    public function update(){
        
        $data['user']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['petugas']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['tanggal']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['jenisBayar']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $data['status']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();

        $id = $this->input->post('idIuran');
        $id_user = $this->input->post('IdUser');
        $id_petugas = $this->input->post('IdPetugas');
        $Tanggal = $this->input->post('tanggal');
        $Jenisbayar = $this->input->post('jenisBayar');
        $Status = $this->input->post('status');
        $dataUpdate = array('IdUser' => $id_user,
                            'IdPetugas' => $id_petugas,
                            'tanggal' => $Tanggal,
                            'jenisBayar' => $Jenisbayar,
                            'status' => $Status);
        $this->Madmin->update('tbl_iuran_wajib', $dataUpdate, 'idIuran', $id);                    
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/iuran/form_edit', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function delete($id){
        if(empty($this->session->userdata('userName'))){
            redirect('petugasiuran');
        }
        $this->Madmin->delete('tbl_iuran_wajib', 'idIuran', $id);
        redirect('petugasiuran');
    }
}

?>