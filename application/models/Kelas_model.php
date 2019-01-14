<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function getKelas($where="")
	{
		$data = $this->db->query('select * from kelas '.$where);
		return $data->result_array();
	}
	public function getKelas2($where="")
	{
		$data = $this->db->query('select * from kelas '.$where);
		return $data;
	}

	public function insertData($kelas, $data){
		$res = $this->db->insert($kelas, $data);
		return $res;
	}

	public function updateData($kelas, $data, $where){
		$res = $this->db->update($kelas, $data, $where);
		return $res;
	}

	public function deleteData($kelas, $where){
		$res = $this->db->delete($kelas, $where);
		return $res;	
	}
}
