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
	public function get_kelas_info_by_id($kelas_id)
	{
		$this->db->select('*');
		$this->db->where('kelas_id', $kelas_id);
		$data = $this->db->get('kelas')->result_array();
		// debug_array($data);
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

	public function getAllKelas()
	{
		$data = $this->db->query('select * from kelas ');
		return $data;
	}

	public function get_kelas_id($kelas_name, $kelas_jurusan, $kelas_sub)
	{
		$this->db->select('kelas_id');
		$this->db->where('kelas_name', $kelas_name);
		$query = $this->db->get('kelas', 1)->row();
		return $query->kelas_id;
		// debug_array($query);
	}
}
