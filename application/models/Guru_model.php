<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function getGuru($where="")
	{
		$data = $this->db->query('select * from guru '.$where);
		return $data->result_array();
	}
	public function getGuru2($where="")
	{
		$data = $this->db->query('select * from guru '.$where);
		return $data;
	}


	public function insertData($guru, $data) {
		$res = $this->db->insert($guru, $data);
		return $res;
	}

	public function updateData($guru, $data, $where) {
		$res = $this->db->update($guru, $data, $where);
		return $res;
	}

	public function deleteData($guru, $where) {
		$res = $this->db->delete($guru, $where);
		return $res;
	}

	public function getGuruName($guru_id)
	{
		$this->db->select('guruname');
		$this->db->where('guru_id', $guru_id);
		$data = $this->db->get('guru', 1)->row();
		// debug_array($data);
		return $data->guruname;
	}
}
