<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_session_nav extends CI_Model {

// untuk cek button meu nav aktif
	 function cek_session_dashboard(){
		 if ($this->session->set_userdata('class0')=='') {
 			$this->session->set_userdata('class0','active');
 			$this->session->unset_userdata('class2');
 			$this->session->unset_userdata('class1');
 			$this->session->unset_userdata('class3');
 			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
 		}elseif ($this->session->set_userdata('class1')=='active') {
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class0','active');
		}elseif ($this->session->set_userdata('class2')=='active') {
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class0','active');
		}elseif ($this->session->set_userdata('class3')=='active') {
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class4');
			$this->session->set_userdata('class0','active');
		}elseif ($this->session->set_userdata('class4')=='active') {
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class0','active');
		}elseif ($this->session->set_userdata('class5')=='active') {
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class0','active');
		}

	}

	function cek_session_skejul(){

	}	

	function cek_session_guru(){
		if ($this->session->set_userdata('class2')=='') {
			$this->session->set_userdata('class2','active');
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
		}elseif ($this->session->set_userdata('class0')=='active') {
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class2','active');
		}elseif ($this->session->set_userdata('class1')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class2','active');
		}elseif ($this->session->set_userdata('class3')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class2','active');
		}elseif ($this->session->set_userdata('class4')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class2','active');
		}
		elseif ($this->session->set_userdata('class5')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class4');
			$this->session->set_userdata('class2','active');
		}
	}	


	function cek_session_mapel(){
		if ($this->session->set_userdata('class3')=='') {
			$this->session->set_userdata('class3','active');
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
		}elseif ($this->session->set_userdata('class0')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class3','active');
		}elseif ($this->session->set_userdata('class1')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class3','active');
		}elseif ($this->session->set_userdata('class2')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class3','active');
		}elseif ($this->session->set_userdata('class4')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class3','active');
		}
		elseif ($this->session->set_userdata('class5')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class3','active');
		}
	}

	function cek_session_room(){
		if ($this->session->set_userdata('class4')=='') {
			$this->session->set_userdata('class4','active');
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class3');
			$this->session->unset_userdata('class5');
		}elseif ($this->session->set_userdata('class0')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class4','active');
		}elseif ($this->session->set_userdata('class1')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class4','active');
		}elseif ($this->session->set_userdata('class2')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class4','active');
		}elseif ($this->session->set_userdata('class3')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class4','active');
		}
		elseif ($this->session->set_userdata('class5')=='active') {
			$this->session->unset_userdata('class0');
			$this->session->unset_userdata('class1');
			$this->session->unset_userdata('class2');
			$this->session->unset_userdata('class4');
			$this->session->unset_userdata('class5');
			$this->session->set_userdata('class4','active');
		}
	}

			
}
