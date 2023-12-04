<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPetugas extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
        $data['petugas']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/petugas/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    
    public function ubah_status($id) {
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $datawhere = array('idPetugas'=>$id);
        $result = $this->Madmin->get_by_id('tbl_petugas', $datawhere)->row_object();
        $status = $result->statusAktif;
        if($status=="Y") {
            $dataUpdate = array('statusAktif'=>"N");
        } else {
            $dataUpdate = array('statusAktif'=>"Y");
        }
        $this->Madmin-> update('tbl_petugas', $dataUpdate, 'idPetugas', $id);
        redirect('adminpetugas');
        }

    public function delete($id) {
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $this->Madmin->delete('tbl_petugas', 'idPetugas', $id);
        redirect('adminpetugas');
    }

}

?>