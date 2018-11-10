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
		 header('Content-Type:application/json');
		 header('Accept:application/json');
			 # XSS Filtering
			 $_POST = $this->security->xss_clean($_POST);

			 # Form Validation
			 $this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
			 $this->form_validation->set_rules('Password', 'Password', 'trim|required|max_length[100]');
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
					 $output = $this->cek_login->cekLoginSiswa($this->input->post('NIK'), $this->input->post('Password'));
					 if (!empty($output) AND $output != FALSE)
					 {
							 // Load Authorization Token Library

							 // Generate Token
							   foreach ($output as $output) ;
							 $token_data['siswa_id'] = $output->siswa_id;
							 $token_data['siswa_nik'] = $output->siswa_nik;
							 $token_data['siswa_name'] = $output->siswa_name;
							 $token_data['siswa_jurusan'] = $output->siswa_jurusan;
							 $token_data['siswa_kelas'] = $output->siswa_kelas;
							 $token_data['siswa_alamat'] = $output->siswa_alamat;
							// $token_data['auth_token'] = $output->auth_token;
							 $token_data['time'] = time();

							 $user_token = $this->authorization_token->generateToken($token_data);


							 $return_data = [
									 'auth_token' => $user_token,
							 ];
							 // Login Success
							 $message =['auth_login'=> [
									 'status' => 200,
									 'data' => $return_data,
									 'message' => "User login successful"
							 ]];
							// $this->response($message, REST_Controller::HTTP_OK);
							echo json_encode($message);
					 } else
					 {
							 // Login Error
							 $message = ['auth_login'=> [
									 'status' => FALSE,
									 'message' => "Invalid Username or Password"
							 ]];
							 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 echo json_encode($message);
					 }
			 }
	 }

	 public function GetProfile(){
		 header('Content-Type:application/json');
		 header('Accept:application/json');
		 $receive_token=$this->input->request_headers('Authorization');
		 try {
		 	$jwtData=$this->authorization_token->decodeToken($receive_token['Authorization']);
			$message =['auth_user'=> [
					'status' => 200,
					'data' => $jwtData,
					'message' => "Data User"
			]];
			echo json_encode($message);
		 } catch (Exception $e) {
		 	http_response_code('401');
			$message =['auth_user'=> [
					'status' => false,
					'message' => $e->getMessage()
			]];
			echo json_encode($message);
			exit;
		 }



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

	 public function EditProfile(){
		header('Content-Type:application/json');
		header('Accept:application/json');
			# XSS Filtering
			$_POST = $this->security->xss_clean($_POST);

			# Form Validation
			$this->form_validation->set_rules('siswa_id', 'siswa_id', 'trim|required');
			$this->form_validation->set_rules('siswa_nik', 'siswa_nik', 'trim|required');
			$this->form_validation->set_rules('siswa_name', 'siswa_name', 'trim|required');
			$this->form_validation->set_rules('siswa_alamat', 'siswa_alamat', 'trim|required');
			$this->form_validation->set_rules('siswa_kelas', 'siswa_kelas', 'trim|required');
			$this->form_validation->set_rules('siswa_jurusan', 'siswa_jurusan', 'trim|required');
			$this->form_validation->set_rules('siswa_password', 'siswa_password', 'trim|required');
			$this->form_validation->set_rules('siswa_note', 'siswa_note', 'trim|required');
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

					// Load Login Function
					$output = $this->Siswa_model->updateData('siswa', $data_update, $where);
					if (!empty($output) AND $output != FALSE)
					{
							
							// Login Success
							$message =['auth_update_siswa'=> [
									'status' => 200,
									'message' => "Update Siswa successful"
							]];
						   // $this->response($message, REST_Controller::HTTP_OK);
						   echo json_encode($message);
					} else
					{
							// Login Error
							$message = ['auth_update_siswa'=> [
									'status' => FALSE,
									'message' => "Update Invalid"
							]];
							//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							echo json_encode($message);
					}
			}
	 }

}
