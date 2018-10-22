<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$data = $this->Siswa_model->getSiswa();
		//debug_array($data);
		$this->load->view('siswa', array('data' => $data ));
	}

	public function add_data(){
		$this->load->view('content/siswa/add_siswa');
	}

	public function do_insert(){
		$siswa_id = $_POST['siswa_id'];
		$siswa_nik = $_POST['siswa_nik'];
		$siswa_name = $_POST['siswa_name'];
		$siswa_alamat = $_POST['siswa_alamat'];
		$siswa_kelas = $_POST['siswa_kelas'];
		$siswa_jurusan = $_POST['siswa_jurusan'];
		$siswa_password = $_POST['siswa_password'];
		$siswa_note = $_POST['siswa_note'];
		$data_insert = array(
			'siswa_id' => $siswa_id,
			'siswa_nik' => $siswa_nik,
			'siswa_name' => $siswa_name,
			'siswa_alamat' => $siswa_alamat,
			'siswa_kelas' => $siswa_kelas,
			'siswa_jurusan' => $siswa_jurusan,
			'siswa_password' => $siswa_password,
			'siswa_note' => $siswa_note
		);
		$res = $this->Siswa_model->insertData('siswa', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/siswa');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data($siswa_id){
		$siswa = $this->Siswa_model->getSiswa("where siswa_id = '$siswa_id'");
		$data = array(
			'siswa_id' => $siswa[0]['siswa_id'], 
			'siswa_nik' => $siswa[0]['siswa_nik'],
			'siswa_name' => $siswa[0]['siswa_name'],
			'siswa_alamat' => $siswa[0]['siswa_alamat'],
			'siswa_kelas' => $siswa[0]['siswa_kelas'],
			'siswa_jurusan' => $siswa[0]['siswa_jurusan'],
			'siswa_password' => $siswa[0]['siswa_password'],
			'siswa_note' => $siswa[0]['siswa_note']		 
		);
		$this->load->view('content/siswa/edit_siswa', $data);
	}

	public function do_update(){
		$siswa_id = $_POST['siswa_id'];
		$siswa_nik = $_POST['siswa_nik'];
		$siswa_name = $_POST['siswa_name'];
		$siswa_alamat = $_POST['siswa_alamat'];
		$siswa_kelas = $_POST['siswa_kelas'];
		$siswa_jurusan = $_POST['siswa_jurusan'];
		$siswa_password = $_POST['siswa_password'];
		$siswa_note = $_POST['siswa_note'];
		$data_update = array(
			'siswa_id' => $siswa_id,
			'siswa_nik' => $siswa_nik,
			'siswa_name' => $siswa_name,
			'siswa_alamat' => $siswa_alamat,
			'siswa_kelas' => $siswa_kelas,
			'siswa_jurusan' => $siswa_jurusan,
			'siswa_password' => $siswa_password,
			'siswa_note' => $siswa_note
		);
		$where = array('siswa_id' => $siswa_id);
		$res = $this->Siswa_model->updateData('siswa', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/siswa');
		}else{
			echo "<h3>Update data gagal</h3>";
		}
	}

	public function do_delete() {
		$siswa_id=$this->input->post('siswa_id');
		$where = array('siswa_id' => $siswa_id );
		$res = $this->Siswa_model->deleteData('siswa', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/siswa');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
