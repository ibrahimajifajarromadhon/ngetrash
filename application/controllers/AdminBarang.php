<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminBarang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();

        $config['base_url'] = base_url('admin_barang/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_barang');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['barang'] = $this->Madmin->get_data_paginated('tbl_barang', $config['per_page'], $offset)->result();

        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/barang/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add()
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/barang/form_tambah', $data);
        $this->load->view('admin/layout/footer');
    }

    public function save()
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        $this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $error_namaBarang = form_error('namaBarang');
            $error_harga = form_error('harga');

            $input_namaBarang = $this->input->post('namaBarang');
            $input_harga = $this->input->post('harga');

            $this->session->set_flashdata('error_namaBarang', $error_namaBarang);
            $this->session->set_flashdata('error_harga', $error_harga);

            $this->session->set_flashdata('input_namaBarang', $input_namaBarang);
            $this->session->set_flashdata('input_harga', $input_harga);

            redirect('admin_barang/add');
        }

        $namaBarang = $this->input->post('namaBarang');
        $harga = $this->input->post('harga');

        $dataInput = array(
            'namaBarang' => $namaBarang,
            'harga' => $harga
        );
        $this->Madmin->insert('tbl_barang', $dataInput);
        $this->session->set_flashdata('success','Berhasil tambah data barang!'); 
        redirect('admin_barang');
    }

    public function get_by_id($id)
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        $data['admin'] = $this->Madmin->get_by_id('tbl_admin', array('idAdmin' => $this->session->userdata('idAdmin')))->row();
        $dataWhere = array('idBarang' => $id);
        $data['barang'] = $this->Madmin->get_by_id('tbl_barang', $dataWhere)->row_object();
        
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/barang/form_edit', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit()
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        
        $id = $this->input->post('id');
        $namaBarang = $this->input->post('namaBarang');
        $harga = $this->input->post('harga');

        $dataUpdate = array(
            'namaBarang' => $namaBarang,
            'harga' => $harga
        );
        $this->Madmin->update('tbl_barang', $dataUpdate, 'idBarang', $id);
        $this->session->set_flashdata('success','Berhasil ubah data barang!'); 
        redirect('admin_barang');
    }

    public function delete($id)
    {
        if(empty($this->session->userdata('Admin'))) {
            redirect('admin/login');
        }
        $this->Madmin->delete('tbl_barang', 'idBarang', $id);
        $this->session->set_flashdata('success', 'Berhasil hapus data barang!');
        redirect('admin_barang');
    }
}
