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

	 public function SignUpUser()
	 {
	  	 header('Content-Type:application/json');
		 header('Accept:application/json');

		 $_POST = $this->security->xss_clean($_POST);
		 $this->form_validation->set_rules('NIS', 'NIS', 'trim|required');
		 $this->form_validation->set_rules('siswa_name', 'siswa_name', 'trim|required');
		 $this->form_validation->set_rules('siswa_alamat', 'siswa_alamat', 'trim|required');
		 $this->form_validation->set_rules('kelas_nama', 'kelas_nama', 'trim|required');
		//  $this->form_validation->set_rules('jurusan_nama', 'jurusan_nama', 'trim|required');
		 $this->form_validation->set_rules('password_1', 'password_1', 'trim|required');
		 $this->form_validation->set_rules('password_2', 'password_2', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
		 {
			$message =array('auth_SignUp'=> array(
				'status' => false,
				'error' =>201,
				'message' =>  $this->form_validation->error_array()
			));
			echo json_encode($message);
		 }else{
			$output = $this->Siswa_model->cekNISSiswa($this->input->post('NIS'));
			if (!empty($output) AND $output != FALSE)
			{
				$message =array('auth_SignUp'=> array(
					'status' => false,
					'error'=>204,
					'message' => 'User already available'
				));
			//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			echo json_encode($message);
			}else{
				$kelas_nama= $this->input->post('kelas_nama');
				$kelas=$this->Kelas_model->getKelas2("where kelas_notasi='$kelas_nama'")->result();
				foreach($kelas as $kelas){
					$id_kelas=$kelas->kelas_id;
					$id_jurusan=$kelas->kelas_jurusan;
				}
				// $jurusan_nama=$this->input->post('jurusan_nama');
				// $Jurusan=$this->Jurusan_model->getJurusan2("where jurusan_name='$jurusan_nama'")->result();
				// foreach($Jurusan as $jurusan){
				// 	$id_jurusan=$jurusan->jurusan_id;
				// }
				// print_r($id_jurusan);exit;
				if($this->input->post('password_1')==$this->input->post('password_2')){
					$data_insert = array(
						'siswa_id' => $this->Siswa_model->cari_kode_idSiswa(),
						'siswa_nis' => $this->input->post('NIS'),
						'siswa_name' => $this->input->post('siswa_name'),
						'siswa_alamat' => $this->input->post('siswa_alamat'),
						'kelas_id' =>$id_kelas,
						'jurusan_id' => $id_jurusan,
						'siswa_password' => $this->input->post('password_1'),
						'siswa_note' => ''
					);
					$res = $this->Siswa_model->insertData('siswa', $data_insert);
					if ($res>=1){
						$message =array('auth_SignUp'=> array(
							'status' => true,
							'error'=>200,
							'message' => 'Success'
						));
						echo json_encode($message);
					}else{
						$message =array('auth_SignUp'=> array(
							'status' => false,
							'error'=>205,
							'message' => 'Not Success'
						));
						echo json_encode($message);
					}
				}else{
					$message =array('auth_SignUp'=> array(
						'status' => false,
						'error'=>203,
						'message' => 'Password Not Same'
					));
					echo json_encode($message);
				}
			}
		 }

	 }
	 	
	 public function LoginPost()
	 {
		 header('Content-Type:application/json');
		 header('Accept:application/json');
			 # XSS Filtering
			 $_POST = $this->security->xss_clean($_POST);

			 # Form Validation
			 $this->form_validation->set_rules('NIS', 'NIS', 'trim|required');
			 $this->form_validation->set_rules('Password', 'Password', 'trim|required|max_length[100]');
			 if ($this->form_validation->run() == FALSE)
			 {
					 // Form Validation Errors
					 $message =array('auth_login'=> array(
							 'status' => false,
							 'error' => $this->form_validation->error_array(),
							 'message' => validation_errors()
					 ));
					 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					 echo json_encode($message);
			 }
			 else
			 {
					 // Load Login Function
					 $output = $this->cek_login->cekLoginSiswa($this->input->post('NIS'), $this->input->post('Password'));
					 if (!empty($output) AND $output != FALSE)
					 {
							 // Load Authorization Token Library

							 // Generate Token
							   foreach ($output as $output) ;
							 $token_data['siswa_id'] = $output->siswa_id;
							 $token_data['siswa_nis'] = $output->siswa_nis;
							 $token_data['siswa_name'] = $output->siswa_name;
							 $token_data['jurusan_id'] = $output->jurusan_id;
							 $token_data['kelas_id'] = $output->kelas_id;
							 $token_data['siswa_alamat'] = $output->siswa_alamat;
							 $token_data['siswa_password'] = $output->siswa_password;
							 $token_data['siswa_note'] = $output->siswa_note;
							 //$token_data['auth_token'] = $output->auth_token;
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

	 public function GetProfile()
	 {
		 header('Content-Type:application/json');
		 header('Accept:application/json');
		 $receive_token=$this->input->request_headers('Authorization');
		 try {
			 $jwtData=$this->authorization_token->decodeToken($receive_token['Authorization']);
			 $siswa_id=$jwtData['siswa_id'];
			 $siswa = $this->Siswa_model->getSiswa("where siswa_id = '$siswa_id'");
			 $jurusan_id=$jwtData['jurusan_id'];
			 $jurusan=$this->Jurusan_model->getJurusan("where jurusan_id = '$jurusan_id'");
			 $kelas_id=$jwtData['kelas_id'];
			 $kelas=$this->Kelas_model->getKelas("where kelas_id = '$kelas_id'");
			 $data=array(
				 'siswa_id'=>$siswa[0]['siswa_id'],
				 'siswa_nis'=>$siswa[0]['siswa_nis'],
				 'siswa_name'=>$siswa[0]['siswa_name'],
				 'siswa_alamat'=>$siswa[0]['siswa_alamat'],
				 'siswa_password'=>$siswa[0]['siswa_password'],
				 'siswa_note'=>$siswa[0]['siswa_note'],
				 'siswa_jurusan'=>$jurusan[0]['jurusan_name'],
				 'siswa_kelas'=>$kelas[0]['kelas_name'].'-'.$kelas[0]['kelas_sub'],
				 'kelas_id'=>$jwtData['kelas_id'],
				 'jurusan_id'=>$jwtData['jurusan_id']
			 );
			$message =['auth_user'=> [
					'status' => 200,
					'data' => $data,
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

	 public function EditProfile()
	 {
		header('Content-Type:application/json');
		header('Accept:application/json');
			# XSS Filtering
			$_POST = $this->security->xss_clean($_POST);

			# Form Validation
			$this->form_validation->set_rules('siswa_id', 'siswa_id', 'trim|required');
			$this->form_validation->set_rules('siswa_nis', 'siswa_nis', 'trim|required');
			$this->form_validation->set_rules('siswa_name', 'siswa_name', 'trim|required');
			$this->form_validation->set_rules('siswa_alamat', 'siswa_alamat', 'trim|required');
			$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
			$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
			$this->form_validation->set_rules('siswa_password', 'siswa_password', 'trim|required');
			$this->form_validation->set_rules('siswa_note', 'siswa_note', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
					// Form Validation Errors
					$message =array('auth_update_siswa'=> array(
							'status' => false,
							'error' => $this->form_validation->error_array(),
							'message' => validation_errors()
					));
					//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					echo json_encode($message);
			}
			else
			{
					$siswa_id = $_POST['siswa_id'];
					$siswa_nis = $_POST['siswa_nis'];
					$siswa_name = $_POST['siswa_name'];
					$siswa_alamat = $_POST['siswa_alamat'];
					$kelas_id= $_POST['kelas_id'];
					$jurusan_id = $_POST['jurusan_id'];
					$siswa_password = $_POST['siswa_password'];
					$siswa_note = $_POST['siswa_note'];
					$data_update = array(
						'siswa_id' => $siswa_id,
						'siswa_nis' => $siswa_nis,
						'siswa_name' => $siswa_name,
						'siswa_alamat' => $siswa_alamat,
						'kelas_id' => $kelas_id,
						'jurusan_id' => $jurusan_id,
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
