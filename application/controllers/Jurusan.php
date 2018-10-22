<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function index()
	{
		// $data = $this->Jurusan_model->getJurusan();
		//debug_array($data);
		// $this->load->view('jurusan/all_jurusan_data', array('data' => $data ));
		redirect('Dashboard/jurusan');
	}

	public function add_data(){
		$this->load->view('content/jurusan/add_jurusan');
	}

	public function do_insert(){
		$jurusan_id = $_POST['jurusan_id'];
		$jurusan_name = $_POST['jurusan_name'];
		$jurusan_jumlah_kelas = $_POST['jurusan_jumlah_kelas'];
		$jurusan_kepala = $_POST['jurusan_kepala'];
		$jurusan_note = $_POST['jurusan_note'];
		$data_insert = array(
			'jurusan_id' => $jurusan_id,
			'jurusan_name' => $jurusan_name,
			'jurusan_jumlah_kelas' => $jurusan_jumlah_kelas,
			'jurusan_kepala' => $jurusan_kepala,						
			'jurusan_note' => $jurusan_note,
		);
		$res = $this->Jurusan_model->insertData('jurusan', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/jurusan');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data($jurusan_id){
		$jurusan = $this->Jurusan_model->getJurusan("where jurusan_id = '$jurusan_id'");
		$data = array(
			'jurusan_id' => $jurusan[0]['jurusan_id'], 
			'jurusan_name' => $jurusan[0]['jurusan_name'],
			'jurusan_jumlah_kelas' => $jurusan[0]['jurusan_jumlah_kelas'],
			'jurusan_kepala' => $jurusan[0]['jurusan_kepala'],
			'jurusan_note' => $jurusan[0]['jurusan_note']
		);
		$this->load->view('content/jurusan/edit_jurusan', $data);
	}

	public function do_update(){
		$jurusan_id = $_POST['jurusan_id'];
		$jurusan_name = $_POST['jurusan_name'];
		$jurusan_jumlah_kelas = $_POST['jurusan_jumlah_kelas'];
		$jurusan_kepala = $_POST['jurusan_kepala'];
		$jurusan_note = $_POST['jurusan_note'];
		$data_update = array(
			'jurusan_id' => $jurusan_id,
			'jurusan_name' => $jurusan_name,
			'jurusan_jumlah_kelas' => $jurusan_jumlah_kelas,
			'jurusan_kepala' => $jurusan_kepala,						
			'jurusan_note' => $jurusan_note,
		);
		$where = array('jurusan_id' => $jurusan_id);
		$res = $this->Jurusan_model->updateData('jurusan', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/jurusan');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$jurusan_id=$this->input->post('jurusan_id');
		$where = array('jurusan_id' => $jurusan_id );
		$res = $this->Jurusan_model->deleteData('jurusan', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/jurusan');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
