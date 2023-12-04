<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/user/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function ubah_status($id) {
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
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
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $this->Madmin->delete('tbl_user', 'idUser', $id);
        redirect('adminuser');
    }

}

?>