<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index()
	{
		$data = $this->Mapel_model->getMapel();
		//debug_array($data);
		$this->load->view('mapel', array('data' => $data ));
	}

	public function add_data(){
		$this->load->view('form_add');
	}

	public function do_insert(){
		echo "<pre>";
		print_r ($_POST);
		echo "</pre>";
	}
}
