<?php

class Madmin extends CI_Model{

    public function save_admin($data) {
        $this->db->insert('tbl_admin', $data);
    }

	public function save_user($data) {
        $this->db->insert('tbl_user', $data);
    }

	public function save_petugas($data) {
        $this->db->insert('tbl_petugas', $data);
    }

	public function cek_login_admin($u, $p){
		$query = $this->db->get_where('tbl_admin', array('userName' => $u ));
		$check = $query->num_rows();
		$account = $query->row_object();
		$hash = $account->password;
			if($check == 1){
				if(password_verify($p, $hash)){
					return array(
						'loggedIn' => true, 
						'idAdmin' => $account->idAdmin
					);
				}
			}
			return array(
				'loggedIn' => false, 
				'idAdmin' => $account->idAdmin
			);
	}

	public function cek_login_petugas($u, $p){
		$query = $this->db->get_where('tbl_petugas', array('userName' => $u ));
		$check = $query->num_rows();
		$account = $query->row_object();
		$hash = $account->password;
			if($check == 1){
				if(password_verify($p, $hash)){
					return array(
						'loggedIn' => true, 
						'idPetugas' => $account->idPetugas
					);
				}
			}
			return array(
				'loggedIn' => false, 
				'idPetugas' => $account->idPetugas
			);
	}

	public function cek_login_user($u, $p){
		$query = $this->db->get_where('tbl_user', array('userName' => $u, 'statusAktif' => 'Y' ));
		$check = $query->num_rows();
		$account = $query->row_object();
		$hash = $account->password;
			if($check == 1){
				if(password_verify($p, $hash)){
					return array(
						'loggedIn' => true, 
						'idUser' => $account->idUser
					);
				}
			}
			return array(
				'loggedIn' => false, 
				'idUser' => $account->idUser
			);
	}

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

	public function count_all_data($table) {
		return $this->db->count_all($table);
	}

	public function get_data_paginated($table, $limit, $offset) {
		$this->db->limit($limit, $offset);
		return $this->db->get($table);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val));
	}

	public function tambahSaldoMasuk($idUser, $total) {
		$data = array(
			'idUser' => $idUser,
			'jenis_transaksi' => 'masuk',
			'jumlah' => $total,
			'keterangan' => 'Daur ulang'
		);
	
		$this->db->insert('tbl_riwayat_transaksi', $data);
	
		$this->tambahTotalSaldoUser($idUser, $total);
	}
	
	public function tambahTotalSaldoUser($idUser, $total) {
		$this->db->select_sum('jumlah');
		$this->db->where('idUser', $idUser);
		$this->db->where('jenis_transaksi', 'masuk');
		$queryMasuk = $this->db->get('tbl_riwayat_transaksi');
		$totalSaldoMasuk = $queryMasuk->row()->jumlah;
	
		$userData = $this->get_by_id('tbl_user', array('idUser' => $idUser))->row();
		$saldoSaatIni = $userData->totalSaldo;
		$totalSaldo = $saldoSaatIni + $total;
	
		$data = array(
			'saldoMasuk' => $totalSaldoMasuk,
			'totalSaldo' => $totalSaldo
		);
	
		$this->db->where('idUser', $idUser);
		$this->db->update('tbl_user', $data);
	}

	public function kurangiSaldoKeluar($idUser, $nominal) {
		$data = array(
			'idUser' => $idUser,
			'jenis_transaksi' => 'keluar',
			'jumlah' => $nominal,
			'keterangan' => 'Pengeluaran Iuran Wajib'
		);
	
		$this->db->insert('tbl_riwayat_transaksi', $data);
	
		$this->kurangiTotalSaldoUser($idUser, $nominal);
	}
	
	public function kurangiTotalSaldoUser($idUser, $nominal) {
		$this->db->select_sum('jumlah');
		$this->db->where('idUser', $idUser);
		$this->db->where('jenis_transaksi', 'keluar');
		$queryKeluar = $this->db->get('tbl_riwayat_transaksi');
		$totalSaldoKeluar = $queryKeluar->row()->jumlah;
	
		$userData = $this->get_by_id('tbl_user', array('idUser' => $idUser))->row();
		$saldoSaatIni = $userData->totalSaldo;
		$totalSaldo = $saldoSaatIni - $nominal;
	
		$data = array(
			'saldoKeluar' => $totalSaldoKeluar,
			'totalSaldo' => $totalSaldo
		);
	
		$this->db->where('idUser', $idUser);
		$this->db->update('tbl_user', $data);
	}

	public function get_petugas($petugas) {
        $this->db->where('idPetugas', $petugas);
        return $this->db->get('tbl_petugas')->result();
    }

	public function getTotalDaurUlang($id){
		$this->db->select('total');
		$this->db->where('idDaur', $id);
		$query = $this->db->get('tbl_daur_ulang');
		$result = $query->row();
		
		if ($result) {
			return $result->total;
		} else {
			return 0; 
		}
	}

	public function getSaldoUser($id_u) {
        $query = $this->db->get_where('tbl_user', array('idUser' => $id_u));
        $user = $query->row_array();
        return $user['totalSaldo'];
    }
}
?>