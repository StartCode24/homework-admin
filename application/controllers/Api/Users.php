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
	 public function login_post()
	 {
			 header("Access-Control-Allow-Origin: *");
			 # XSS Filtering
			 $_POST = $this->security->xss_clean($_POST);

			 # Form Validation
			 $this->form_validation->set_rules('username', 'Username', 'trim|required');
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
					 $output = $this->cek_login->cekLogin($this->input->post('username'), $this->input->post('password'));
					 if (!empty($output) AND $output != FALSE)
					 {
							 // Load Authorization Token Library

							 // Generate Token
							   foreach ($output as $output) ;
							 $token_data['admin_id'] = $output->admin_id;
							 $token_data['username'] = $output->username;
							 $token_data['status'] = $output->status;
							// $token_data['auth_token'] = $output->auth_token;
							 $token_data['time'] = time();

							 $user_token = $this->authorization_token->generateToken($token_data);

							 
							 $return_data = [
									 'admin_id' => $output->admin_id,
									 'username' => $output->username,
									 'status' => $output->status,
									 'auth_token' => $user_token,


							 ];
							 // Login Success
							 $message = [
									 'status' => true,
									 'data' => $return_data,
									 'message' => "User login successful"
							 ];
							// $this->response($message, REST_Controller::HTTP_OK);
							echo json_encode($message);
					 } else
					 {
							 // Login Error
							 $message = [
									 'status' => FALSE,
									 'message' => "Invalid Username or Password"
							 ];
							 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 echo json_encode($message);
					 }
			 }
	 }

	 public function profile(){

	 }

}
