<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function getSiswa($where="")
	{
		$data = $this->db->query('select * from siswa '.$where);
		return $data->result_array();
	}

	public function insertData($siswa, $data) {
		$res = $this->db->insert($siswa, $data);
		return $res;
	}

	public function updateData($siswa, $data, $where) {
		$res = $this->db->update($siswa, $data, $where);
		return $res;
	}

	public function deleteData($siswa, $where) {
		$res = $this->db->delete($siswa, $where);
		return $res;
	}
}
