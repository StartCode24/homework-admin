<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    $this->load->library('session');
		$this->load->model('cek_login');

	}
  function index(){
    $this->load->view('login');

  }
  function cekLogin(){
    $username=$this->input->post('username');
    $password=$this->input->post('password');
     $cekLoginn=$this->cek_login->cekLogin($username,$password);

    if ($cekLoginn) {
        foreach ($cekLoginn as $rows) ;
          $this->session->set_userdata('username',$rows->username);
          $this->session->set_userdata('status',$rows->status);

          if($this->session->userdata('status')=='admin'){
            redirect('Dashboard/index');
          }else if($this->session->userdata('status')=='member'){
            redirect('member/index');
          }
    }else {
      $data['pesan']="username atau password tidak sesuai";
    $this->load->view('login',$data);
    $this->session->sess_destroy();
    }



  }
  function logout(){
    $this->session->sess_destroy();
    $this->load->view('login');
  }
}
