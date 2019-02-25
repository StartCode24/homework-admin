<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_model extends CI_Model {

	public function getMapel($where="")
	{
		$data = $this->db->query('select * from mapel '.$where);
		return $data->result_array();
	}
	public function getMapel2($where="")
	{
		$data = $this->db->query('select * from mapel '.$where);
		return $data;
	}

	public function insertData($mapel, $data){
		$res = $this->db->insert($mapel, $data);
		return $res;
	}

	public function updateData($mapel, $data, $where){
		$res = $this->db->update($mapel, $data, $where);
		return $res;
	}

	public function deleteData($mapel, $where){
		$res = $this->db->delete($mapel, $where);
		return $res;	
	}

	public function getMapelName($mapel_id)
	{
		$this->db->select('mapelname');
		$this->db->where('mapel_id', $mapel_id);
		$data = $this->db->get('mapel', 1)->row();
		// debug_array($data);
		return $data->mapelname;
	}

	public function getAllMapel()
	 {
	  $data = $this->db->query('select * from mapel');
	  return $data;
	 }
}
 