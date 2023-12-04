<?php

class Madmin extends CI_Model{

	public function create_admin($n, $u, $p){
		$is_username_exist =($this->db->get_where('tbl_admin', array('name' => $n)));
		if(!$is_username_exist){
			$data = array(
				'name' => $n,
				'userName' => $u,
				'password' => password_hash($p, PASSWORD_DEFAULT)
			);
			$this->db->insert('tbl_admin', $data);
			return true;
		}
		return false;
	}

	public function cek_login($u, $p){
		$query = $this->db->get_where('tbl_admin', array('userName' => $u));
		$check = $query->num_rows();
		$akun = $query->row_object();
	
		if ($check==1) {
			$hashed_password = $akun->password;
			if (password_verify($p, $hashed_password)) {
				return true;
			}
		}
	
		return false;
	}



    public function save_admin($data) {
        $this->db->insert('tbl_admin', $data);
    }

	public function save_user($data) {
        $this->db->insert('tbl_user', $data);
    }

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}
   
	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val));
	}
	
	public function save_petugas($data) {
        $this->db->insert('tbl_petugas', $data);
    }

	
	public function cek_login_user($u, $p){
		$query = $this->db->get_where('tbl_user', array('userName' => $u,'statusAktif' => 'Y' ));
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

}
?>