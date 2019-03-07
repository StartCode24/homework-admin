<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		// $data = $this->Siswa_model->getSiswa();
		// //debug_array($data);
		// $this->load->view('siswa', array('data' => $data ));
		redirect('Dashboard/siswa');
	}

	public function add_data(){
		$this->load->view('content/siswa/add_siswa');
	}

	public function do_insert(){
		// debug_array($_POST);
		$siswa_id = $_POST['siswa_id'];
		$siswa_nis = $_POST['siswa_nis'];
		$siswa_name = $_POST['siswaname'];
		$siswa_alamat = $_POST['alamat'];
		$kelas_id = $_POST['kelas_id'];

		$jurusan_id = $this->Kelas_model->get_jurusan_id_by_kelas_id($kelas_id);

		// Pembuatan password untuk siswa baru diatur statis, siswa diwajibkan melakukan perubahan password secara mandiri
		$siswa_password = "skedi1234";

		$siswa_note = $_POST['siswa_note'];
		$data_insert = array(
			'siswa_id' => $siswa_id,
			'siswa_nis' => $siswa_nis,
			'siswa_name' => $siswa_name,
			'siswa_alamat' => $siswa_alamat,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
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

	public function edit_data(){
		$siswa_id=$this->input->post('siswa_id');
		$siswa = $this->Siswa_model->getSiswaJurusan($siswa_id);
		// debug_array($siswa);
		$data = array(
			'siswa_id' => $siswa[0]['siswa_id'], 
			'siswa_nis' => $siswa[0]['siswa_nis'],
			'siswa_name' => $siswa[0]['siswa_name'],
			'siswa_alamat' => $siswa[0]['siswa_alamat'],
			'kelas_id' => $siswa[0]['kelas_id'],
			'jurusan_id' => $siswa[0]['jurusan_id'],
			'jurusan_name' => $siswa[0]['jurusan_name'],
			'siswa_password' => $siswa[0]['siswa_password'],
			'siswa_note' => $siswa[0]['siswa_note']		 
		);

		$data['kelas_selected'] = $this->Kelas_model->get_kelas_notasi_by_kelas_id($siswa[0]['kelas_id']);
		$data['data_jurusan'] = $this->Jurusan_model->getJurusan();
		$data['data_kelas'] = $this->Kelas_model->getAllKelas();
		// debug_array($data['data_jurusan']);
		$this->load->view('content/siswa/edit_modal_siswa', $data);
		// $this->load->view('content/siswa/edit_modal_siswa', array('data' => $data, 'data_jurusan' => $data_jurusan));
	}

	public function do_update(){
		// debug_array($_POST);
		$siswa_id = $_POST['siswa_id'];
		$siswa_nis = $_POST['siswa_nis'];
		$siswa_name = $_POST['siswaname'];
		$siswa_alamat = $_POST['alamat'];
		$kelas_id = $_POST['kelas_id'];
		
		$jurusan_id = $this->Kelas_model->get_jurusan_id_by_kelas_id($kelas_id);

		// $siswa_password = $_POST['siswa_password'];
		$siswa_note = $_POST['siswa_note'];
		$data_update = array(
			'siswa_id' => $siswa_id,
			'siswa_nis' => $siswa_nis,
			'siswa_name' => $siswa_name,
			'siswa_alamat' => $siswa_alamat,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
			// 'siswa_password' => $siswa_password,
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
