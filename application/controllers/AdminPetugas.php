<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPetugas extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index() {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
    
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
    
        $config['base_url'] = base_url('admin_petugas/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_petugas');
        $config['per_page'] = 3; 
        $config['uri_segment'] = 3; 
    
        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['petugas'] = $this->Madmin->get_data_paginated('tbl_petugas', $config['per_page'], $offset)->result();
    
        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);    

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
        $nama = $result->name;
        if($status=="Y") {
            $dataUpdate = array('statusAktif'=>"N");
            $this->session->set_flashdata('non_active','Berhasil ubah status, akun '.$nama.' sekarang tidak aktif!'); 
        } else {
            $dataUpdate = array('statusAktif'=>"Y");
            $this->session->set_flashdata('active','Berhasil ubah status, akun '.$nama.' sekarang aktif!'); 
        }
        $this->Madmin-> update('tbl_petugas', $dataUpdate, 'idPetugas', $id);
        redirect('admin_petugas');
        }

    public function delete($id) {
        if(empty($this->session->userdata('Admin'))) {
			redirect('admin/login');
		}
        $this->Madmin->delete('tbl_petugas', 'idPetugas', $id);
        $this->session->set_flashdata('success','Berhasil hapus data akun!'); 
        redirect('admin_petugas');
    }

}

?>