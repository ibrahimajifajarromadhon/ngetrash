<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('admin');
        }
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/user/tampil', $data);
        $this->load->view('admin/layout/footer');
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