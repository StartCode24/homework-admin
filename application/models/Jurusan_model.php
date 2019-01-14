<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

	public function getJurusan($where="")
	{
		$data = $this->db->query('select * from jurusan '.$where);
		return $data->result_array();
	}
	public function getJurusan2($where="")
	{
		$data = $this->db->query('select * from jurusan '.$where);
		return $data;
	}

	public function insertData($Jurusan, $data){
		$res = $this->db->insert($Jurusan, $data);
		return $res;
	}

	public function updateData($Jurusan, $data, $where){
		$res = $this->db->update($Jurusan, $data, $where);
		return $res;
	}

	public function deleteData($Jurusan, $where){
		$res = $this->db->delete($Jurusan, $where);
		return $res;	
	}
}
