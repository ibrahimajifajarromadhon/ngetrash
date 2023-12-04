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
            $id_u = $this->input->post('IdUser');
            $id_p = $this->input->post('IdPetugas');
            $tanggal = $this->input->post('tanggal');
            $keterangan = $this->input->post('keterangan');
            $dataInput = array('IdUser' => $id_u,
                                'IdPetugas' => $id_p,
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
    public function edit($id){
        $data['status'] = $this->Madmin->get_by_id('tbl_status_pengambilan', array('idStatus' => $id))->row();
        $this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
        $this->load->view('petugas/status/form_edit', $data);
        $this->load->view('petugas/layout/footer');
    }
    public function update(){
        
        $data['user']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $data['petugas']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $data['tanggal']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();
        $data['keterangan']=$this->Madmin->get_all_data('tbl_status_pengambilan')->result();

        $id = $this->input->post('idStatus');
        $id_user = $this->input->post('IdUser');
        $id_petugas = $this->input->post('IdPetugas');
        $Tanggal = $this->input->post('tanggal');
        $Keterangan = $this->input->post('keterangan');
        $dataUpdate = array('IdUser' => $id_user,
                            'IdPetugas' => $id_petugas,
                            'tanggal' => $Tanggal,
                            'keterangan' => $Keterangan);
        $this->Madmin->update('tbl_status_pengambilan', $dataUpdate, 'idStatus', $id);                    
		$this->load->view('petugas/layout/header');
        $this->load->view('petugas/layout/menu');
		$this->load->view('petugas/status/form_edit', $data);
		$this->load->view('petugas/layout/footer');
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