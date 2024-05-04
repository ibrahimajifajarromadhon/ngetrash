<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');

        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
    }

    public function index(){
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
    
        $config['base_url'] = base_url('admin_user/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_user');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 3; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['user'] = $this->Madmin->get_data_paginated('tbl_user', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/user/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function ubah_status($id) {
        $datawhere = array('idUser'=>$id);
        $result = $this->Madmin->get_by_id('tbl_user', $datawhere)->row_object();
        $status = $result->statusAktif;
        $nama = $result->name;
        if($status=="Y") {
            $dataUpdate = array('statusAktif'=>"N");
            $this->session->set_flashdata('non_active','Berhasil ubah status, akun '.$nama.' sekarang tidak aktif!'); 
        } else if($status=="N") {
            $dataUpdate = array('statusAktif'=>"Y");
            $this->session->set_flashdata('active','Berhasil ubah status, akun '.$nama.' sekarang aktif!'); 
        } else {
            $this->session->set_flashdata('fail', 'Gagal ubah status, akun '.$nama);
        }
        $this->Madmin->update('tbl_user', $dataUpdate, 'idUser', $id);
        redirect('admin_user');
        }

    public function delete($id) {
        $this->Madmin->delete('tbl_user', 'idUser', $id);
        $this->session->set_flashdata('success','Berhasil hapus data akun!'); 
        redirect('admin_user');
    }

}

?>