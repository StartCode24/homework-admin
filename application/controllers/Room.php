<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function index()
	{
		$data = $this->Room_model->getRoom();
		//debug_array($data);
		$this->load->view('room', array('data' => $data ));
	}

	public function add_data(){
		$this->load->view('content/room/add_room');
	}

	public function do_insert(){
		$room_id = $_POST['room_id'];
		$roomname = $_POST['roomname'];
		$room_note = $_POST['room_note'];
		$data_insert = array(
			'room_id' => $room_id,
			'roomname' => $roomname,
			'room_note' => $room_note
		);
		$res = $this->Room_model->insertData('room', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/room');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data(){
		$room_id=$this->input->post('room_id');
		$room = $this->Room_model->getRoom("where room_id = '$room_id'");
		$data = array(
			'room_id' => $room[0]['room_id'], 
			'roomname' => $room[0]['roomname'],
			'room_note' => $room[0]['room_note'],
		);
		$this->load->view('content/room/edit_modal_room', $data);
	}

	public function do_update(){
		$room_id = $_POST['room_id'];
		$roomname = $_POST['roomname'];
		$room_note = $_POST['room_note'];
		$data_update = array(
			'roomname' => $roomname,
			'room_note' => $room_note
		);
		$where = array('room_id' => $room_id);
		$res = $this->Room_model->updateData('room', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/room');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$room_id=$this->input->post('room_id');
		$where = array('room_id' => $room_id );
		$res = $this->Room_model->deleteData('room', $where);
		if ($res>=1){
			$this->session->set_userdata('EditPesan','berhasil');
			redirect('Dashboard/room');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
