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
		$mapel_id = $_POST['mapel_id'];
		$mapelname = $_POST['mapelname'];
		$data_insert = array(
			'mapel_id' => $mapel_id,
			'mapelname' => $mapelname,
		);
		$res = $this->Mapel_model->insertData('mapel', $data_insert);
		if ($res>=1){
			redirect('index.php/crud/index','refresh');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function do_delete($mapel_id) {
		$where = array('mapel_id' => $mapel_id );
		$res = $this->Mapel_model->deleteData('mapel', $where);
		if ($res>=1){
			redirect('index.php/crud/index','refresh');
		}else{
			echo "<h3>Delte data gagal</h3>";
		}	
	}
}
