<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetugasIuran extends CI_Controller
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

        $config['base_url'] = base_url('petugas_iuran/page');
        $config['total_rows'] = $this->Madmin->count_all_data('tbl_iuran_wajib');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $offset = ($page > 0) ? ($page - 1) * $config['per_page'] : 0;
        $data['iuran'] = $this->Madmin->get_data_paginated('tbl_iuran_wajib', $config['per_page'], $offset)->result();

        $data['links']['pagination'] = $this->pagination->create_links();
        $data['links']['prev_page'] = ($page > 1) ? $page - 1 : 1;
        $data['links']['next_page'] = ($page < ceil($config['total_rows'] / $config['per_page'])) ? $page + 1 : 1;
        $data['links']['current_page'] = $page;
        $data['links']['num_pages'] = ceil($config['total_rows'] / $config['per_page']);

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function add()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas_iuran');
        }
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $data['user'] = $this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas1'] = $this->Madmin->get_all_data('tbl_petugas')->result();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/form_tambah', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function save()
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas_iuran');
        } else {
            $this->form_validation->set_rules('idUser', 'Nama User', 'required');
            $this->form_validation->set_rules('idPetugas', 'Nama Petugas', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('jenisBayar', 'Jenis Bayar', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $error_idUser = form_error('idUser');
                $error_idPetugas = form_error('idPetugas');
                $error_tanggal = form_error('tanggal');
                $error_jenisBayar = form_error('jenisBayar');
                $error_status = form_error('status');

                $input_idUser = $this->input->post('idUser');
                $input_idPetugas = $this->input->post('idPetugas');
                $input_tanggal = $this->input->post('tanggal');
                $input_jenisBayar = $this->input->post('jenisBayar');
                $input_status = $this->input->post('status');

                $this->session->set_flashdata('error_idUser', $error_idUser);
                $this->session->set_flashdata('error_idPetugas', $error_idPetugas);
                $this->session->set_flashdata('error_tanggal', $error_tanggal);
                $this->session->set_flashdata('error_jenisBayar', $error_jenisBayar);
                $this->session->set_flashdata('error_status', $error_status);

                $this->session->set_flashdata('input_idUser', $input_idUser);
                $this->session->set_flashdata('input_idPetugas', $input_idPetugas);
                $this->session->set_flashdata('input_tanggal', $input_tanggal);
                $this->session->set_flashdata('input_jenisBayar', $input_jenisBayar);
                $this->session->set_flashdata('input_status', $input_status);
                redirect('petugas_iuran/add');
            } else {

                $id_u = $this->input->post('idUser');
                $id_p = $this->input->post('idPetugas');
                $tanggal = $this->input->post('tanggal');
                $jenisbayar = $this->input->post('jenisBayar');
                $status = $this->input->post('status');

                $nominal = $this->input->post('nominal');

                $saldo_user = $this->Madmin->getSaldoUser($id_u);

                if ($nominal > $saldo_user) {
                    $input_idUser = $this->input->post('idUser');
                    $input_idPetugas = $this->input->post('idPetugas');
                    $input_tanggal = $this->input->post('tanggal');
                    $input_jenisBayar = $this->input->post('jenisBayar');
                    $input_status = $this->input->post('status');

                    $this->session->set_flashdata('input_idUser', $input_idUser);
                    $this->session->set_flashdata('input_idPetugas', $input_idPetugas);
                    $this->session->set_flashdata('input_tanggal', $input_tanggal);
                    $this->session->set_flashdata('input_jenisBayar', $input_jenisBayar);
                    $this->session->set_flashdata('input_status', $input_status);

                    $this->session->set_flashdata('error_nominal', 'Nominal melebihi saldo yang dimiliki!');

                    redirect('petugas_iuran/add');
                } else {

                    $dataInput = array(
                        'idUser' => $id_u,
                        'idPetugas' => $id_p,
                        'tanggal' => $tanggal,
                        'jenisBayar' => $jenisbayar,
                        'status' => $status
                    );

                    $this->Madmin->insert('tbl_iuran_wajib', $dataInput);
                    if ($jenisbayar == '2') {
                        $this->Madmin->kurangiSaldoKeluar($id_u, $nominal);
                        $this->session->set_flashdata('success', 'Berhasil tambah data iuran wajib!');
                        redirect('petugas_iuran');
                    } else {
                        $this->session->set_flashdata('success', 'Berhasil tambah data iuran wajib!');
                        redirect('petugas_iuran');
                    }
                }
            }
        }
    }

    public function get_by_id($id)
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas/login');
        }
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $dataWhere = array('idIuran' => $id);
        $data['iuran'] = $this->Madmin->get_by_id('tbl_iuran_wajib', $dataWhere)->row_object();

        $data['user'] = $this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas1'] = $this->Madmin->get_all_data('tbl_petugas')->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/iuran/form_edit', $data);
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
        $jenisbayar = $this->input->post('jenisBayar');
        $status = $this->input->post('status');

        $nominal = ($jenisbayar == 'Non Tunai') ? $this->input->post('nominal') : 0;

        $dataUpdate = array(
            'idUser' => $id_u,
            'idPetugas' => $id_p,
            'tanggal' => $tanggal,
            'jenisBayar' => $jenisbayar,
            'status' => $status
        );
        $this->Madmin->update('tbl_iuran_wajib', $dataUpdate, 'idIuran', $id);
        if ($jenisbayar == '2') {
            $this->Madmin->kurangiSaldoKeluar($id_u, $nominal);
        }
        $this->session->set_flashdata('success', 'Berhasil ubah data iuran wajib!');
        redirect('petugas_iuran');
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('Petugas'))) {
            redirect('petugas_iuran');
        }
        $this->Madmin->delete('tbl_iuran_wajib', 'idIuran', $id);
        $this->session->set_flashdata('success', 'Berhasil hapus data iuran wajib!');
        redirect('petugas_iuran');
    }
}
