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
						 
							 $nama_guru='';
							 $nama_mapel='';
							 $nama_kelas='';
							 $nama_jurusan='';
							 $nama_room='';
							 $day=0;
							 foreach ($Schedule as $schedule) {
								$Guru =$this->Guru_model->getGuru2("where guru_id='$schedule->guru_id'")->result();
								foreach($Guru as $guru){
									$nama_guru=$guru->guruname;	
								}
								$Mapel=$this->Mapel_model->getMapel2("where mapel_id='$schedule->mapel_id'")->result();
								foreach($Mapel as $mapel){
									$nama_mapel=$mapel->mapelname;
								}
								$Kelas=$this->Kelas_model->getKelas2("where kelas_id='$schedule->kelas_id'")->result();
								foreach($Kelas as $kelas){
									$nama_kelas=$kelas->kelas_name;
								}
								$Jurusan=$this->Jurusan_model->getJurusan2("where jurusan_id='$schedule->jurusan_id'")->result();
								foreach($Jurusan as $jurusan){
									$nama_jurusan=$jurusan->jurusan_name;
								}
								$Room=$this->Room_model->getRoom2("where room_id='$schedule->room_id'")->result();
								foreach($Room as $room){
									$nama_room=$room->roomname;
								}
								$data[]=array(
									'schedule_id'=>$schedule->schedule_id,
									'schedule_date'=>$schedule->schedule_date,
									'start_time'=>$schedule->start_time,
									'finish_time'=>$schedule->finish_time,
									'day'=>$schedule->day,
									'note'=>$schedule->note,
									'guru_id'=>$schedule->guru_id,
									'guruname'=>$nama_guru,
									'mapel_id'=>$schedule->mapel_id,
									'nama_mapel'=>$nama_mapel,
									'kelas_id'=>$schedule->kelas_id,
									'nama_kelas'=>$nama_kelas,
									'jurusan_id'=>$schedule->jurusan_id,
									'nama_jurusan'=>$nama_jurusan,
									'room_id'=>$schedule->room_id,
									'nama_room'=>$nama_room
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
