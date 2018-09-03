<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

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
		$room_id = $_POST['room_id'];
		$roomname = $_POST['roomname'];
		$data_insert = array(
			'room_id' => $room_id,
			'roomname' => $roomname,
		);
		$res = $this->Mapel_model->insertData('mapel', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data($room_id){
		$mapel = $this->Mapel_model->getMapel("where room_id = '$room_id'");
		$data = array(
			'room_id' => $mapel[0]['room_id'], 
			'roomname' => $mapel[0]['roomname'] 
		);
		$this->load->view('form_edit', $data);
	}

	public function do_update(){
		$room_id = $_POST['room_id'];
		$roomname = $_POST['roomname'];
		$data_update = array(
			'roomname' => $roomname,
		);
		$where = array('room_id' => $room_id);
		$res = $this->Mapel_model->updateData('mapel', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$room_id=$this->input->post('room_id');
		$where = array('room_id' => $room_id );
		$res = $this->Mapel_model->deleteData('mapel', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/mapel');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
