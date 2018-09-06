<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_login extends CI_Model {


	 function cekLogin($user,$pass){
		$username=$this->db->escape_like_str($user);
		$password=$this->db->escape_like_str($pass);
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}else {
			return false;
		}



	}
}
