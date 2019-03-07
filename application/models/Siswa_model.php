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
	function cari_kode_idSiswa(){
        $this->db->select('RIGHT(siswa.siswa_id,4) as id',false );
        $this->db->order_by('siswa_id','DESC');
        $this->db->limit(1);
        $query=$this->db->get('siswa');//cek apakah id atau tidak
        if ($query->num_rows()<>0) {
          // jika kode ternyata sudah add
          $data=$query->row();
          $kode=intval($data->id)+1;
        }else {
          // jika kode bl ada
          $kode=1;
        }

         $kodeMax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 4 menunjukan jumlah angka digit 0
          $kodeJadi=$kodeMax;
          return $kodeJadi;
	  }
	  
	  function cekNiSSiswa($nis){
		$NIS=$this->db->escape_like_str($nis);
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('siswa_nis',$NIS);
		$this->db->limit(1);
   
		$query=$this->db->get();
   
		if($query->num_rows()==1){
			return $query->result();
		}else {
			return false;
		}
	}

	public function getSiswaJurusan($siswa_id)
	{
		$this->db->select('siswa_id, siswa_nis, siswa_name, siswa_alamat, kelas_id, siswa.jurusan_id, jurusan_name, siswa_password, siswa_note');
		$this->db->join('jurusan', 'siswa.jurusan_id = jurusan.jurusan_id', 'left');
		$this->db->where('siswa_id', $siswa_id);
		$data = $this->db->get('siswa')->result_array();

		return $data;
	}

	public function getAllSiswa()
	{
		$this->db->select('siswa_id, siswa_nis, siswa_name, siswa_alamat, kelas_notasi, siswa_note');
		$this->db->join('kelas', 'siswa.kelas_id = kelas.kelas_id', 'left');
		$data = $this->db->get('siswa')->result_array();

		return $data;
	}

	public function countSiswa()
	{
		$query = $this->db->query('select * from siswa');

		return $query->num_rows();
	}
	
}