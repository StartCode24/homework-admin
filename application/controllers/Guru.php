<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function index()
	{
		$data = $this->Guru_model->getGuru();
		//debug_array($data);
		$this->load->view('guru', array('data' => $data ));
	}

	public function add_data(){
		$this->load->view('content/guru/add_guru');
	}

	public function do_insert(){
		$guru_id = $_POST['guru_id'];
		$guruname = $_POST['guruname'];
		$guru_note = $_POST['guru_note'];
		$data_insert = array(
			'guru_id' => $guru_id,
			'guruname' => $guruname,
			'guru_note' => $guru_note
		);
		$res = $this->Guru_model->insertData('guru', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/guru');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data($guru_id){
		$guru = $this->Guru_model->getGuru("where guru_id = '$guru_id'");
		$data = array(
			'guru_id' => $guru[0]['guru_id'], 
			'guruname' => $guru[0]['guruname'] 
		);
		$this->load->view('content/guru/edit_guru', $data);
	}

	public function do_update(){
		$guru_id = $_POST['guru_id'];
		$guruname = $_POST['guruname'];
		$guru_note = $_POST['guru_note'];
		$data_update = array(
			'guruname' => $guruname,
			'guru_note' => $guru_note
		);
		$where = array('guru_id' => $guru_id);
		$res = $this->Guru_model->updateData('guru', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/guru');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$guru_id=$this->input->post('guru_id');
		$where = array('guru_id' => $guru_id );
		$res = $this->Guru_model->deleteData('guru', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/guru');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
