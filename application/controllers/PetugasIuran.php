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
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasiuran');
        }
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas1']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
		$this->load->view('petugas/iuran/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function save(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasiuran');
        }
            $id_u = $this->input->post('idUser');
            $id_p = $this->input->post('idPetugas');
            $tanggal = $this->input->post('tanggal');
            $jenisbayar = $this->input->post('jenisBayar');
            $status = $this->input->post('status');

            $nominal = $this->input->post('nominal');

            $dataInput = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'jenisBayar' => $jenisbayar,
                                'status' => $status);
            $this->Madmin->insert('tbl_iuran_wajib', $dataInput);
            if ($jenisbayar == '2') { 
                $this->Madmin->kurangiSaldoKeluar($id_u, $nominal);
            }
            redirect('petugasiuran');
    }
    public function get_by_id($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugas/login');
        }
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $dataWhere = array('idIuran' => $id);
        $data['iuran']=$this->Madmin->get_by_id('tbl_iuran_wajib', $dataWhere)->row_object();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function edit(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugas/login');
        }
            $id = $this->input->post('id');
            $id_u = $this->input->post('idUser');
            $id_p = $this->input->post('idPetugas');
            $tanggal = $this->input->post('tanggal');
            $jenisbayar = $this->input->post('jenisBayar');
            $status = $this->input->post('status');

            $nominal = $this->input->post('nominal');

            $dataUpdate = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'jenisBayar' => $jenisbayar,
                                'status' => $status);
            $this->Madmin->update('tbl_iuran_wajib', $dataUpdate, 'idIuran', $id);
            if ($jenisbayar == '2') { 
                $this->Madmin->kurangiSaldoKeluar($id_u, $nominal);
            }
            redirect('petugasiuran');
	}

    public function delete($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasiuran');
        }
        $this->Madmin->delete('tbl_iuran_wajib', 'idIuran', $id);
        redirect('petugasiuran');
    }
}

?>