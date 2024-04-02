<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetugasDaur extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas/login');
        }
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();

        $config['base_url'] = base_url('petugas_daur/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_daur_ulang');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['daur'] = $this->Madmin->get_data_paginated('tbl_daur_ulang', $config['per_page'], $offset)->result();

        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/daur/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function add()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugasdaur');
        }
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $data['user'] = $this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas1'] = $this->Madmin->get_all_data('tbl_petugas')->result();
        $data['barang'] = $this->Madmin->get_all_data('tbl_barang')->result();
        $data['harga'] = $this->Madmin->get_all_data('tbl_barang')->result();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/daur/form_tambah', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function save()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugasdaur');
        }
        $this->form_validation->set_rules('idUser', 'Nama User', 'required');
        $this->form_validation->set_rules('idPetugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('idBarang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('totalResult', 'Total', 'required');

        if ($this->form_validation->run() == FALSE) {
            $error_idUser = form_error('idUser');
            $error_idPetugas = form_error('idPetugas');
            $error_tanggal = form_error('tanggal');
            $error_idBarang = form_error('idBarang');
            $error_berat = form_error('berat');
            $error_totalResult = form_error('totalResult');

            $input_idUser = $this->input->post('idUser');
            $input_idPetugas = $this->input->post('idPetugas');
            $input_tanggal = $this->input->post('tanggal');
            $input_idBarang = $this->input->post('idBarang');
            $input_berat = $this->input->post('berat');

            $this->session->set_flashdata('error_idUser', $error_idUser);
            $this->session->set_flashdata('error_idPetugas', $error_idPetugas);
            $this->session->set_flashdata('error_tanggal', $error_tanggal);
            $this->session->set_flashdata('error_idBarang', $error_idBarang);
            $this->session->set_flashdata('error_berat', $error_berat);
            $this->session->set_flashdata('error_totalResult', $error_totalResult);

            $this->session->set_flashdata('input_idUser', $input_idUser);
            $this->session->set_flashdata('input_idPetugas', $input_idPetugas);
            $this->session->set_flashdata('input_tanggal', $input_tanggal);
            $this->session->set_flashdata('input_idBarang', $input_idBarang);
            $this->session->set_flashdata('input_berat', $input_berat);

            redirect('petugas_daur/add');
        }

        $id_u = $this->input->post('idUser');
        $id_p = $this->input->post('idPetugas');
        $tanggal = $this->input->post('tanggal');
        $jenisbarang = $this->input->post('idBarang');
        $berat = $this->input->post('berat');
        $total = $this->input->post('totalResult');
        $dataInput = array(
            'idUser' => $id_u,
            'idPetugas' => $id_p,
            'tanggal' => $tanggal,
            'idBarang' => $jenisbarang,
            'berat' => $berat,
            'total' => $total
        );
        $this->Madmin->insert('tbl_daur_ulang', $dataInput);
        $this->Madmin->tambahSaldoMasuk($id_u, $total);
        $this->session->set_flashdata('success','Berhasil tambah data daur ulang!'); 
        redirect('petugas_daur');
    }

    public function get_by_id($id)
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugasdaur');
        }
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $dataWhere = array('idDaur' => $id);
        $data['daur'] = $this->Madmin->get_by_id('tbl_daur_ulang', $dataWhere)->row_object();
        $data['barang'] = $this->Madmin->get_all_data('tbl_barang')->result();
        $data['harga'] = $this->Madmin->get_all_data('tbl_barang')->result();
        
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/daur/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }
    public function edit()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas/login');
        }
        $id = $this->input->post('id');
        $id_u = $this->input->post('idUser');
        $id_p = $this->input->post('idPetugas');
        $tanggal = $this->input->post('tanggal');
        $jenisbarang = $this->input->post('idBarang');
        $berat = $this->input->post('berat');

        $total = $this->input->post('totalResult');

        if ($total == "") {
            $total_daur_ulang = $this->Madmin->getTotalDaurUlang($id); 
            $total = $total_daur_ulang;
        }

        $dataUpdate = array(
            'idUser' => $id_u,
            'idPetugas' => $id_p,
            'tanggal' => $tanggal,
            'idBarang' => $jenisbarang,
            'berat' => $berat,
            'total' => $total
        );
        $this->Madmin->update('tbl_daur_ulang', $dataUpdate, 'idDaur', $id);
        $this->Madmin->tambahSaldoMasuk($id_u, $total);
        $this->session->set_flashdata('success','Berhasil ubah data daur ulang!'); 
        redirect('petugas_daur');
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugasdaur');
        }
        $this->Madmin->delete('tbl_daur_ulang', 'idDaur', $id);
        $this->session->set_flashdata('success', 'Berhasil hapus data daur ulang!');
        redirect('petugas_daur');
    }
}
