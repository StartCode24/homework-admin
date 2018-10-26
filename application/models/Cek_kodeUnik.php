<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_kodeUnik extends CI_Model {


  //untuk mencari kode unik jadwal
    function cari_kode_guru(){
      $this->db->select('RIGHT(guru.guru_id,4) as kode',false );
      $this->db->order_by('guru_id','DESC');
      $this->db->limit(1);
      $query=$this->db->get('guru');//cek apakah id atau tidak
      if ($query->num_rows()<>0) {
        // jika kode ternyata sudah add
        $data=$query->row();
        $kode=intval($data->kode)+1;
      }else {
        // jika kode bl ada
        $kode=1;
      }

       $kodeMax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 4 menunjukan jumlah angka digit 0
      $kodeJadi=$kodeMax;
      return $kodeJadi;
    }
}
