<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasStatus extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('Petugas'))) {
			redirect('petugas/login');
		}
        $data['status']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $data['petugas1']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/status/tampil', $data);
        $this->load->view('petugas/layout/footer');
    }

	public function add(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasstatus');
        }
        $data['user']=$this->Madmin->get_all_data('tbl_user')->result();
        $data['petugas'] = $this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
		$data['petugas1']=$this->Madmin->get_all_data('tbl_petugas')->result();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
		$this->load->view('petugas/status/form_tambah', $data);
		$this->load->view('petugas/layout/footer');
	}

    public function save(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasstatus');
        }
            $id_u = $this->input->post('idUser');
            $id_p = $this->input->post('idPetugas');
            $tanggal = $this->input->post('tanggal');
            $keterangan = $this->input->post('keterangan');
            $dataInput = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'keterangan' => $keterangan);
            $this->Madmin->insert('tbl_status_pengambilan', $dataInput);
            redirect('petugasstatus');
    }

    public function get_by_id($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasstatus');
        }
        $data['petugas']=$this->Madmin->get_by_id('tbl_petugas', array('idPetugas' => $this->session->userdata('idPetugas')))->row();
        $dataWhere = array('idStatus' => $id);
        $data['status']=$this->Madmin->get_by_id('tbl_status_pengambilan', $dataWhere)->row_object();
        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/menu', $data);
        $this->load->view('petugas/status/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }
    public function edit(){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugas/login');
        }
            $id = $this->input->post('id');
            $id_u = $this->input->post('idUser');
            $id_p = $this->input->post('idPetugas');
            $tanggal = $this->input->post('tanggal');
            $keterangan = $this->input->post('keterangan');

            $dataUpdate = array('idUser' => $id_u,
                                'idPetugas' => $id_p,
                                'tanggal' => $tanggal,
                                'keterangan' => $keterangan);
            $this->Madmin->update('tbl_status_pengambilan', $dataUpdate, 'idStatus', $id);
            redirect('petugasstatus');
	}

    public function delete($id){
        if(empty($this->session->userdata('Petugas'))){
            redirect('petugasstatus');
        }
        $this->Madmin->delete('tbl_status_pengambilan', 'idStatus', $id);
        redirect('petugasstatus');
    }


    



}

?>