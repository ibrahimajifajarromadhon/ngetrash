<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserStatus extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('User'))){
            redirect('user/login');
        }
        $data['user'] = $this->Madmin->get_by_id('tbl_user', array('idUser' => $this->session->userdata('idUser')))->row();
        $data['status']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $this->load->view('user/layout/header', $data);
        $this->load->view('user/status/tampil', $data);
        $this->load->view('user/layout/footer');
    }
}

?>