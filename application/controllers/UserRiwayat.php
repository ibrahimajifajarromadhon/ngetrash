<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserRiwayat extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('User'))){
            redirect('user/login');
        }
        $data['user'] = $this->Madmin->get_by_id('tbl_user', array('idUser' => $this->session->userdata('idUser')))->row();

        $config['base_url'] = base_url('user/riwayat/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_iuran_wajib');
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['riwayat'] = $this->Madmin->get_data_paginated('tbl_iuran_wajib', $config['per_page'], $offset)->result();

        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

        $this->load->view('user/layout/header', $data);
        $this->load->view('user/riwayat/tampil', $data);
        $this->load->view('user/layout/footer');
    }
}

?>