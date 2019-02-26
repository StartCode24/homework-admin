<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		if (empty($this->session->userdata('status'))) {
			redirect('Auth/index');
		}

	}

	public function index()	{
		$this->cek_session_nav->cek_session_dashboard();
		$this->load->view('nav_content/header.php');
		$this->load->view('content/dashboard.php');
		$this->load->view('nav_content/footer.php');
	}

	public function schedule() {
		$this->cek_session_nav->cek_session_schedule();
		$data = $this->Schedule_model->getSchedule();
		// $kodeunik= $this->Cek_kodeUnik->cari_kode_schedule();
		$data_jurusan = $this->Jurusan_model->getJurusan();
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/schedule/filter_data', array('data' => $data, 'data_jurusan' => $data_jurusan));
		$this->load->view('nav_content/footer.php');
		// $this->load->view('content/schedule/add_modal_schedule',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/schedule/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/schedule/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function guru() {
		$this->cek_session_nav->cek_session_guru();
		$data = $this->Guru_model->getGuru();
		$kodeunik= $this->Cek_kodeUnik->cari_kode_guru();
		//debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/guru/all_guru_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/guru/add_modal_guru',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/guru/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/guru/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function mapel() {
		$this->cek_session_nav->cek_session_mapel();
		$data = $this->Mapel_model->getMapel();
		//debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/mapel/all_mapel_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$kodeunik= $this->Cek_kodeUnik->cari_kode_mapel();

		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/mapel/all_mapel_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/mapel/add_modal_mapel',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/mapel/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/mapel/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function room() {
		$this->cek_session_nav->cek_session_room();
		$data = $this->Room_model->getRoom();
		$kodeunik= $this->Cek_kodeUnik->cari_kode_room();
		//debug_array($data);

		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/room/all_room_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/room/add_modal_room',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/room/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/room/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function jurusan() {
		$this->cek_session_nav->cek_session_jurusan();
		$data = $this->Jurusan_model->getJurusan();
		$kodeunik= $this->Cek_kodeUnik->cari_kode_jurusan();
		//debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/jurusan/all_jurusan_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/jurusan/add_modal_jurusan',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/jurusan/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/jurusan/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function siswa() {
		$this->cek_session_nav->cek_session_siswa();
		$data = $this->Siswa_model->getSiswa();
		$kodeunik= $this->Cek_kodeUnik->cari_kode_siswa();
		//debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/siswa/all_siswa_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/siswa/add_modal_siswa',array('kode_unik' => $kodeunik ));

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/siswa/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/siswa/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}

	public function kelas() {
		$this->cek_session_nav->cek_session_kelas();
		$data = $this->Kelas_model->getKelasJurusan();
		// $kodeunik= $this->Cek_kodeUnik->cari_kode_kelas();
		// debug_array($data);
		// debug_array($this->db->last_query());
		$data_jurusan = $this->Jurusan_model->getJurusan();
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/kelas/all_kelas_data', array('data' => $data, 'data_jurusan' => $data_jurusan));
		$this->load->view('nav_content/footer.php');
		$this->load->view('content/kelas/add_modal_kelas');

		// untuk mengecek pesan konfirmasi input berhasil
				if ($this->session->userdata('pesan')=='berhasil') {
					$this->load->view('content/kelas/sweet-alert-input');
					$this->session->unset_userdata('pesan');
				}
				if ($this->session->userdata('EditPesan')=='berhasil') {
					$this->load->view('content/kelas/sweet-alert-edit');
					$this->session->unset_userdata('EditPesan');
				}
	}
}
