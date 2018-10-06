<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    $this->load->library('session');
		$this->load->library('Authorization_Token');
		$this->load->library('form_validation');
		$this->load->model('cek_login');

	}

	 /**
		* User Login API
		*/
	 public function LoginPost()
	 {
			 header("Access-Control-Allow-Origin: *");
			 # XSS Filtering
			 $_POST = $this->security->xss_clean($_POST);

			 # Form Validation
			 $this->form_validation->set_rules('nik', 'nik', 'trim|required');
			 $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
			 if ($this->form_validation->run() == FALSE)
			 {
					 // Form Validation Errors
					 $message = array(
							 'status' => false,
							 'error' => $this->form_validation->error_array(),
							 'message' => validation_errors()
					 );
					 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					 echo json_encode($message);
			 }
			 else
			 {
					 // Load Login Function
					 $output = $this->cek_login->cekLoginSiswa($this->input->post('nik'), $this->input->post('password'));
					 if (!empty($output) AND $output != FALSE)
					 {
							 // Load Authorization Token Library

							 // Generate Token
							   foreach ($output as $output) ;
							 $token_data['id_siswa'] = $output->id_siswa;
							 $token_data['nik'] = $output->nik;
							 $token_data['nama'] = $output->nama;
							 $token_data['jurusan'] = $output->jurusan;
							 $token_data['kelas'] = $output->kelas;
							 $token_data['alamat'] = $output->alamat;
							// $token_data['auth_token'] = $output->auth_token;
							 $token_data['time'] = time();

							 $user_token = $this->authorization_token->generateToken($token_data);


							 $return_data = [
									 'auth_token' => $user_token,
							 ];
							 // Login Success
							 $message =['response'=> [
									 'status' => 200,
									 'data' => $return_data,
									 'message' => "User login successful"
							 ]];
							// $this->response($message, REST_Controller::HTTP_OK);
							echo json_encode($message);
					 } else
					 {
							 // Login Error
							 $message = ['response'=> [
									 'status' => FALSE,
									 'message' => "Invalid Username or Password"
							 ]];
							 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 echo json_encode($message);
					 }
			 }
	 }

	 public function GetProfile(){
		 header('Content-Type:multipart/form-data');
		 header('Accept:application/json');
		 $receive_token=$this->input->request_headers('Authorization');
		 try {
		 	$jwtData=$this->authorization_token->decodeToken($receive_token['Authorization']);
			$message =['response'=> [
					'status' => 200,
					'data' => $jwtData,
					'message' => "Data User"
			]];
			echo json_encode($message);
		 } catch (Exception $e) {
		 	http_response_code('401');
			$message =['response'=> [
					'status' => false,
					'message' => $e->getMessage()
			]];
			echo json_encode($message);
			exit;
		 }



	 }

}
