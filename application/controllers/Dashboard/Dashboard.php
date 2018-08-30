<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		if (empty($this->session->userdata('status'))) {
			redirect('auth/index');
		}

	}

	public function index()	{
		$this->load->view('nav_content/header.php');
		$this->load->view('content/dashboard.php');
		$this->load->view('nav_content/footer.php');
	}

	public function mapel() {
		$this->load->view('nav_content/header.php');
		$this->load->view('mapel.php');
		$this->load->view('nav_content/footer.php');
	}
}
