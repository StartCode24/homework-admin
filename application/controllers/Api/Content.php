<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class content extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    $this->load->library('session');
		$this->load->library('Authorization_Token');
		

	}

	public function GetSchedule(){

	}
	public function AddNote(){

	}

}
