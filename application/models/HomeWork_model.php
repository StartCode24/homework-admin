<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homework_model extends CI_Model {

	public function getHomeWork($where="")
	{
		$data = $this->db->query('select * from homework '.$where);
		return $data;
	}

	public function insertData($homeWork, $data){
		$res = $this->db->insert($homeWork, $data);
		return $res;
	}

	public function updateData($homeWork, $data, $where){
		$res = $this->db->update($homeWork, $data, $where);
		return $res;
	}

	public function deleteData($homeWork, $where){
		$res = $this->db->delete($homeWork, $where);
		return $res;	
	}
	function cari_kode_idHomework(){
        $this->db->select('RIGHT(homework.homework_id,4) as id',false );
        $this->db->order_by('homework_id','DESC');
        $this->db->limit(1);
        $query=$this->db->get('homework');//cek apakah id atau tidak
        if ($query->num_rows()<>0) {
          // jika kode ternyata sudah add
          $data=$query->row();
          $kode=intval($data->id)+1;
        }else {
          // jika kode bl ada
          $kode=1;
        }

         $kodeMax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 4 menunjukan jumlah angka digit 0
          $kodeJadi=$kodeMax;
          return $kodeJadi;
	  }
	  
	  
}
