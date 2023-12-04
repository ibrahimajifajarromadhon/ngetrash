<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasDaur extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('petugas');
        }
        $data['daur']=$this->Madmin->get_all_data('tbl_daur_ulang')->result();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/daur/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $data['barang']=$this->Madmin->get_all_data('tbl_barang')->result();
        $data['harga']=$this->Madmin->get_all_data('tbl_barang')->result();
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/daur/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function save(){
        if(empty($this->session->userdata('userName'))){
            redirect('petugasstatus');
        }
            $id_u = $this->input->post('IdUser');
            $id_p = $this->input->post('IdPetugas');
            $tanggal = $this->input->post('tanggal');
            $jenisbarang = $this->input->post('jenisBarang');
            $berat = $this->input->post('berat');
            $total = $this->input->post('total');
            $dataInput = array('IdUser' => $id_u,
                                'IdPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'jenisBarang' => $jenisbarang,
                                'berat' => $berat,
                                'total' => $total);
            $this->Madmin->insert('tbl_daur_ulang', $dataInput);
            redirect('petugasdaur');
    }

    public function get_by_id($id){
        if(empty($this->session->userdata('userName'))){
            redirect('petugasdaur');
        }
        $dataWhere = array('idIuran' => $id);
        $data['status']=$this->Madmin->get_by_id('tbl_daur_ulang', $dataWhere)->row_object();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/petugasdaur/form_tambah', $data);
        $this->load->view('admin/layout/footer');
    }



    



}

?>