<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasDaur extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugas/login');
        }
        $data['daur']=$this->Madmin->get_all_data('tbl_daur_ulang')->result();
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/daur/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasdaur');
        }
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas1']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $data['barang']=$this->Madmin->get_all_data('tbl_barang')->result();
        $data['harga']=$this->Madmin->get_all_data('tbl_barang')->result();
		$this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
		$this->load->view('petugas/daur/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function save(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasdaur');
        }
            $id_u = $this->input->post('idUser');
            $id_p = $this->input->post('idPetugas');
            $tanggal = $this->input->post('tanggal');
            $jenisbarang = $this->input->post('idBarang');
            $berat = $this->input->post('berat');
            $total = $this->input->post('total');
            $dataInput = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'idBarang' => $jenisbarang,
                                'berat' => $berat,
                                'total' => $total);
            $this->Madmin->insert('tbl_daur_ulang', $dataInput);
            redirect('petugasdaur');
    }

    public function get_by_id($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasdaur');
        }
        $dataWhere = array('idDaur' => $id);
        $data['daur']=$this->Madmin->get_by_id('tbl_daur_ulang', $dataWhere)->row_object();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/petugasdaur/form_tambah', $data);
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
            $jenisbarang = $this->input->post('jenisBarang');
            $berat = $this->input->post('berat');
            $dataUpdate = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'jenisBayar' => $jenisbarang,
                                'status' => $berat);
            $this->Madmin->update('tbl_daur_ulang', $dataUpdate, 'idDaur', $id);
            redirect('petugasdaur');
	}

    public function delete($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasdaur');
        }
        $this->Madmin->delete('tbl_iuran_wajib', 'idIuran', $id);
        redirect('petugasdaur');
    }


    



}

?>