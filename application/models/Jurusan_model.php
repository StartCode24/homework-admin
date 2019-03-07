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
	public function getAllJurusan()
	{
		$data = $this->db->query('select * from jurusan');
		return $data;
	}

	public function getJurusanName($jurusan_id)
	{
		$this->db->select('jurusan_name');
		$this->db->where('jurusan_id', $jurusan_id);
		$query = $this->db->get('jurusan', 1)->row();
		return $query->jurusan_name;
		// debug_array($query);
	}

	public function getJurusanSingkat($jurusan_id)
	{
		$this->db->select('jurusan_singkat');
		$this->db->where('jurusan_id', $jurusan_id);
		$query = $this->db->get('jurusan', 1)->row();
		return $query->jurusan_singkat;
		// debug_array($query);
	}
}
