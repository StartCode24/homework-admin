<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class content extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    	$this->load->library('session');
		$this->load->library('Authorization_Token');
		$this->load->library('form_validation');
		$this->load->model('cek_login');
		

	}

	public function GetSchedule(){

			header('Content-Type:application/json');
			header('Accept:application/json');
			 # XSS Filtering
			 $_POST = $this->security->xss_clean($_POST);

			 # Form Validation
			 $this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
			 $this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
			 if ($this->form_validation->run() == FALSE)
			 {
					 // Form Validation Errors
					 $message =array('auth_Schedule'=> array(
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
					 $kelas_id=$this->input->post('kelas_id');
					 $jurusan_id=$this->input->post('jurusan_id');
					 $data=array();
					 $Schedule = $this->Schedule_model->getSchedule("where kelas_id = '$kelas_id' and jurusan_id='$jurusan_id'")->result();
					 if (!empty($Schedule) AND $Schedule != FALSE)
					 {
							 
							 foreach ($Schedule as $schedule) {
								$data[]=array(
									'schedule_id'=>$schedule->schedule_id,
									'schedule_date'=>$schedule->schedule_date,
									'start_time'=>$schedule->start_time,
									'finish_time'=>$schedule->finish_time,
									'day'=>$schedule->day,
									'note'=>$schedule->note,
									'guru_id'=>$schedule->guru_id,
									'mapel_id'=>$schedule->mapel_id,
									'kelas_id'=>$schedule->kelas_id,
									'jurusan_id'=>$schedule->jurusan_id,
									'room_id'=>$schedule->room_id
								);
							// print_r($schedule);
							}
							 $message =['auth_Schedule'=> [
									 'status' => 200,
									 'data' =>array( 
										 'schedule'=>$data,
									 ),
									 'message' => "get User schedule successful"
							 ]];
							
							// $this->response($message, REST_Controller::HTTP_OK);
							echo json_encode($message);
					 } else
					 {
							 // Login Error
							 $message = ['auth_Schedule'=> [
									 'status' => FALSE,
									 'message' => "Invalid Get Schedule"
							 ]];
							 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
							 echo json_encode($message);
					 }
			 }


	}
	public function AddNote(){

	}

	public function GetNote(){

	}
	

}
