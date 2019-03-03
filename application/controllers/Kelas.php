<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function index()
	{
		$data = $this->Kelas_model->getKelasJurusan();
		$jurusan_id = $schedule[0]['jurusan_id'];
		$jurusan_describe = $this->Jurusan_model->getJurusanName($jurusan_id);
		// debug_array($data);
		$this->load->view('kelas', array('data' => $data));
	}

	public function add_data(){
		$this->load->view('content/kelas/add_kelas');
	}

	public function do_insert(){
		// debug_array($_POST);
		$kelas_id = $_POST['kelas_id'];
		$kelas_name = $_POST['kelas_name'];
		$kelas_jurusan = $_POST['kelas_jurusan'];
		$kelas_sub = $_POST['kelas_sub'];

		$data_insert = array(
			'kelas_id' => $kelas_id,
			'kelas_name' => $kelas_name,
			'kelas_jurusan' => $kelas_jurusan,
			'kelas_sub' => $kelas_sub,
		);
		$res = $this->Kelas_model->insertData('kelas', $data_insert);
		if ($res>=1){
			$data['status'] = "true";
		        echo json_encode(array('status' => 'ok')); 
		}else{
			$data['status'] = "false";
		        echo json_encode(array('status' => 'not ok')); 
		}
	}

	public function edit_data(){
		// debug_array($_POST);
		$kelas_id=$this->input->post('kelas_id');
		$kelas = $this->Kelas_model->getKelas("where kelas_id = '$kelas_id'");
		// debug_array($kelas);
		$data_jurusan = $this->Jurusan_model->getJurusan();
		$kelas_jurusan_name = $this->Jurusan_model->getJurusanName($kelas[0]['kelas_jurusan']);
		$data = array(
			'kelas_id' => $kelas[0]['kelas_id'],
			'kelas_name' => $kelas[0]['kelas_name'],
			'kelas_jurusan' => $kelas[0]['kelas_jurusan'],
			'kelas_jurusan_name' => $kelas_jurusan_name,
			'kelas_sub' => $kelas[0]['kelas_sub'],
			'data_jurusan' => $data_jurusan
		);
		
		// $data = "";
		$this->load->view('content/kelas/edit_modal_kelas', $data);
		// debug_array($data);
	}

	public function do_update(){
		debug_array($_POST);
		$kelas_id = $_POST['kelas_id'];
		$kelasname = $_POST['kelasname'];
		$kelas_note = $_POST['kelas_note'];
		$data_update = array(
			'kelasname' => $kelasname,
			'kelas_note' => $kelas_note
		);
		$where = array('kelas_id' => $kelas_id);
		$res = $this->Kelas_model->updateData('kelas', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/kelas');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$kelas_id=$this->input->post('kelas_id');
		$where = array('kelas_id' => $kelas_id );
		$res = $this->Kelas_model->deleteData('kelas', $where);
		if ($res>=1){
			$this->session->set_userdata('EditPesan','berhasil');
			redirect('Dashboard/kelas');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
