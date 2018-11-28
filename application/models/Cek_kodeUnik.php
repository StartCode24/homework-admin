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

    function cari_kode_jurusan(){
      $this->db->select('RIGHT(jurusan.jurusan_id,4) as kode',false );
      $this->db->order_by('jurusan_id','DESC');
      $this->db->limit(1);
      $query=$this->db->get('jurusan');//cek apakah id atau tidak
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

    function cari_kode_room(){
      $this->db->select('RIGHT(room.room_id,4) as kode',false );
      $this->db->order_by('room_id','DESC');
      $this->db->limit(1);
      $query=$this->db->get('room');//cek apakah id atau tidak
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

    function cari_kode_mapel(){
      $this->db->select('RIGHT(mapel.mapel_id,4) as kode',false );
      $this->db->order_by('mapel_id','DESC');
      $this->db->limit(1);
      $query=$this->db->get('mapel');//cek apakah id atau tidak
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
