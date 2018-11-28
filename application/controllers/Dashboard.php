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
	}

	public function room() {
		$this->cek_session_nav->cek_session_room();
		$data = $this->Room_model->getRoom();
		//debug_array($data);

		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/room/all_room_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
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
		//debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/siswa/all_siswa_data', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
	}
}
