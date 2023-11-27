<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasIuran extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('petugas');
        }
        $data['iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/iuran/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function add($idPetugas){
        $data['idPetugas']=$idPetugas;
        $data['iuran']=$this->Madmin->get_all_data('tbl_iuran_wajib')->result();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/iuran/tambah', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function get_by_id($idIuran){
        $data['idIuran']=$idIuran;
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $dataWhere = array('idIuran'=>$data['idIuran']);
        $data['iuran'] = $this->Madmin->get_by_id('tbl_iuran_wajib', $dataWhere)->row_object();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/iuran/ubah', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function save(){
        $idIuran=$this->input->post('iuranwajib');
        $idKategori = $this->input->post('kategori');
        $namaProduk = $this->input->post('namaProduk');
        $hargaProduk = $this->input->post('hargaProduk');
        $jumlahProduk = $this->input->post('jumlahProduk');
        $beratProduk = $this->input->post('beratProduk');
        $deskripsi = $this->input->post('deskripsi');
        $config['upload_path'] = './assets/foto_produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')){
            $data_file = $this->upload->data();
            $data_insert=array('idKat' => $idKategori,
                                'namaProduk' => $namaProduk,
                                'idToko' => $idToko,
                                'harga' => $hargaProduk,
                                'stok' => $jumlahProduk,
                                'berat' => $beratProduk,
                                'foto' =>  $data_file['file_name'],
                                'deskripsiProduk' => $deskripsi);
            $this->Madmin->insert('tbl_produk', $data_insert);
            redirect('produk/index/'.$idToko);
        } else {
            redirect('adminuser');
        }
    }
    public function ubah_status($id) {
        if (empty($this->session->userdata('userName'))) {
            redirect('admin');
        }
        $datawhere = array('idUser'=>$id);
        $result = $this->Madmin->get_by_id('tbl_user', $datawhere)->row_object();
        $status = $result->statusAktif;
        if($status=="Y") {
            $dataUpdate = array('statusAktif'=>"N");
        } else {
            $dataUpdate = array('statusAktif'=>"Y");
        }
        $this->Madmin-> update('tbl_user', $dataUpdate, 'idUser', $id);
        redirect('adminuser');
        }

    public function delete($id) {
        if (empty($this->session->userdata('userName'))) {
            redirect('admin');
        }
        $this->Madmin->delete('tbl_user', 'idUser', $id);
        redirect('adminuser');
    }

}

?>