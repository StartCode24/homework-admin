<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library(array('session','form_validation', 'user_agent', 'Telegram'));
        $this->load->helper(array('url','form','security','tgl_indo','global'));
		$this->load->database();

	}	

	public function index()
	{
		$data = $this->Mapel_model->getMapel();
		//debug_array($data);
		$this->load->view('mapel', array('data' => $data ));
	}

	public function insert(){
		$res = $this->Mapel_model->insertData('mapel', array(
			"mapel_id" => "8094214",
			"mapelname" => "GHGhdauo"
		));

		if ($res >= 1) {
			echo "<h2>Sukses Insert data</h2>";
		} else {
			echo "<h2>Gagal Insert data</h2>";
		}
	}

	public function update(){
		$res = $this->Mapel_model->updateData('mapel', array(
			"mapelname" => "Fisika"
		), array("mapel_id" => "8094214" ));

		if ($res >= 1) {
			echo "<h2>Sukses Edit</h2>";
		} else {
			echo "<h2>Gagal Edit</h2>";
		}
	}

	public function delete(){
		$res = $this->Mapel_model->deleteData('mapel', array("mapel_id" => "8094214" ));

		if ($res >= 1) {
			echo "<h2>Sukses Menghapus</h2>";
		} else {
			echo "<h2>Gagal Menghapus</h2>";
		}		
	}	
}
