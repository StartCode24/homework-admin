<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function index()
	{
		// $data = $this->Mapel_model->getMapel();
		//debug_array($data);
		// $this->load->view('mapel/all_mapel_data', array('data' => $data ));
		redirect('Dashboard/mapel');
	}

	public function add_data(){
		$this->load->view('content/mapel/add_mapel');
	}

	public function do_insert(){
		$mapel_id = $_POST['mapel_id'];
		$mapelname = $_POST['mapelname'];
		$mapel_note = $_POST['mapel_note'];
		$data_insert = array(
			'mapel_id' => $mapel_id,
			'mapelname' => $mapelname,
			'mapel_note' => $mapel_note,
		);
		$res = $this->Mapel_model->insertData('mapel', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data($mapel_id){
		$mapel = $this->Mapel_model->getMapel("where mapel_id = '$mapel_id'");
		$data = array(
			'mapel_id' => $mapel[0]['mapel_id'], 
			'mapelname' => $mapel[0]['mapelname'],
			'mapel_note' => $mapel[0]['mapel_note']
		);
		$this->load->view('content/mapel/edit_mapel', $data);
	}

	public function do_update(){
		$mapel_id = $_POST['mapel_id'];
		$mapelname = $_POST['mapelname'];
		$mapel_note = $_POST['mapel_note'];
		$data_update = array(
			'mapelname' => $mapelname,
			'mapel_note' => $mapel_note,
		);
		$where = array('mapel_id' => $mapel_id);
		$res = $this->Mapel_model->updateData('mapel', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$mapel_id=$this->input->post('mapel_id');
		$where = array('mapel_id' => $mapel_id );
		$res = $this->Mapel_model->deleteData('mapel', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
