<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_model extends CI_Model {

	public function getMapel()
	{
		$data = $this->db->get('mapel');
		return $data->result_array();
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
}
