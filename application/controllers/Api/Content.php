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

	public function GetJurusan(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$_POST = $this->security->xss_clean($_POST);

		$Alljurusan=$this->Jurusan_model->getAllJurusan()->result();
		$data=array();
		if (!empty($Alljurusan) AND $Alljurusan != FALSE)
		{
			foreach ($Alljurusan as $allJurusan) {
				$data[]=array(
					'jurusan_id'=>$allJurusan->jurusan_id,
					'jurusan_name'=>$allJurusan->jurusan_name,
					'jurusan_kepala'=>$allJurusan->jurusan_kepala,
					'jurusan_note'=>$allJurusan->jurusan_note
				);
			
			// print_r($schedule);
			}
			 $message =['auth_Jurusan'=> [
					 'status' => 200,
					 'data' =>array( 
						 'jurusan'=>$data,
					 ),
					 'message' => "get Jurusan successful"
			 ]];
			
			// $this->response($message, REST_Controller::HTTP_OK);
			echo json_encode($message);
		}else{
			$message =['auth_Jurusan'=> [
				'status' => 404,
				'data' =>array( 
					'jurusan'=>$data,
				),
				'message' => "get Jurusan Not Found"
		]];
	   
	   // $this->response($message, REST_Controller::HTTP_OK);
	   echo json_encode($message);
		}

	}

	public function GetKelas(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$_POST = $this->security->xss_clean($_POST);

		$AllKelas=$this->Kelas_model->getAllKelas()->result();
		$data=array();
		if (!empty($AllKelas) AND $AllKelas != FALSE)
		{
			foreach ($AllKelas as $allKelas) {
				$data[]=array(
					'kelas_id'=>$allKelas->kelas_id,
					'kelas_name'=>$allKelas->kelas_name,
					'kelas_jurusan'=>$allKelas->kelas_jurusan,
				);
			
			// print_r($schedule);
			}
			 $message =['auth_Kelas'=> [
					 'status' => 200,
					 'data' =>array( 
						 'kelas'=>$data,
					 ),
					 'message' => "get Jurusan successful"
			 ]];
			
			// $this->response($message, REST_Controller::HTTP_OK);
			echo json_encode($message);
		}else{
			$message =['auth_Kelas'=> [
				'status' => 404,
				'data' =>array( 
					'kelas'=>$data,
				),
				'message' => "get Kelas Not Found"
		]];
	   
	   // $this->response($message, REST_Controller::HTTP_OK);
	   echo json_encode($message);
		}

		

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
							 
							 
							 foreach ($Schedule as $schedule) {
								$day=$schedule->day;
								$day_of_week=substr($schedule->schedule_date,-2);
								
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
								$bulan=date("m");
								$tahun=date("Y");
								$schedule_dateYear=substr($schedule->schedule_date,0,4);
								$schedule_dateMont=substr($schedule->schedule_date,5,-3);
								if($tahun==$schedule_dateYear&&$bulan==$schedule_dateMont){
								$data[]=array(
									'schedule_id'=>$schedule->schedule_id,
									'schedule_date'=>$schedule->schedule_date,
									'tahun'=>$schedule_dateMont,
									'start_time'=>$schedule->start_time,
									'finish_time'=>$schedule->finish_time,
									'day'=>$day_of_week,
									'note'=>$schedule->note,
									'guru_id'=>$schedule->guru_id,
									'guru_name'=>$nama_guru,
									'mapel_id'=>$schedule->mapel_id,
									'mapel_name'=>$nama_mapel,
									'kelas_id'=>$schedule->kelas_id,
									'kelas_name'=>$nama_kelas,
									'jurusan_id'=>$schedule->jurusan_id,
									'jurusan_name'=>$nama_jurusan,
									'room_id'=>$schedule->room_id,
									'room_name'=>$nama_room
								);
							}
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

	public function GetHomeWork(){
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
					 $message =array('auth_HomeWork'=> array(
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
					 $HomeWork= $this->HomeWork_model->getHomeWork("where kelas_id = '$kelas_id' and jurusan_id='$jurusan_id'")->result();
					 if (!empty($HomeWork) AND $HomeWork != FALSE)
					 {
						 
							 $nama_guru='';
							 $nama_mapel='';
							 $nama_kelas='';
							 $nama_jurusan='';
							 $nama_room='';
							 
							 
							 foreach ($HomeWork as $HomeWork) {
								$day=$HomeWork->day;
								$day_of_week=substr($HomeWork->homework_date,-2);
								
								$Guru =$this->Guru_model->getGuru2("where guru_id='$HomeWork->guru_id'")->result();
								foreach($Guru as $guru){
									$nama_guru=$guru->guruname;	
								}
								$Mapel=$this->Mapel_model->getMapel2("where mapel_id='$HomeWork->mapel_id'")->result();
								foreach($Mapel as $mapel){
									$nama_mapel=$mapel->mapelname;
								}
								$Kelas=$this->Kelas_model->getKelas2("where kelas_id='$HomeWork->kelas_id'")->result();
								foreach($Kelas as $kelas){
									$nama_kelas=$kelas->kelas_name;
								}
								$Jurusan=$this->Jurusan_model->getJurusan2("where jurusan_id='$HomeWork->jurusan_id'")->result();
								foreach($Jurusan as $jurusan){
									$nama_jurusan=$jurusan->jurusan_name;
								}
								$Room=$this->Room_model->getRoom2("where room_id='$HomeWork->room_id'")->result();
								foreach($Room as $room){
									$nama_room=$room->roomname;
								}
								$bulan=date("m");
								$tahun=date("Y");
								$HomeWork_dateYear=substr($HomeWork->homework_date,0,4);
								$HomeWork_dateMont=substr($HomeWork->homework_date,5,-3);
								if($tahun==$HomeWork_dateYear&&$bulan==$HomeWork_dateMont){
								$data[]=array(
									'homework_id'=>$HomeWork->homework_id,
									'homework_date'=>$HomeWork->homework_date,
									'tahun'=>$HomeWork_dateMont,
									'start_time'=>$HomeWork->start_time,
									'finish_time'=>$HomeWork->finish_time,
									'day'=>$day_of_week,
									'note'=>$HomeWork->note,
									'guru_id'=>$HomeWork->guru_id,
									'guru_name'=>$nama_guru,
									'mapel_id'=>$HomeWork->mapel_id,
									'mapel_name'=>$nama_mapel,
									'kelas_id'=>$HomeWork->kelas_id,
									'kelas_name'=>$nama_kelas,
									'jurusan_id'=>$HomeWork->jurusan_id,
									'jurusan_name'=>$nama_jurusan,
									'room_id'=>$HomeWork->room_id,
									'room_name'=>$nama_room
								);
							}
							// print_r($schedule);
							}
							 $message =['auth_HomeWork'=> [
									 'status' => 200,
									 'data' =>array( 
										 'homework'=>$data,
									 ),
									 'message' => "get User schedule successful"
							 ]];
							
							// $this->response($message, REST_Controller::HTTP_OK);
							echo json_encode($message);
					 } else
					 {
							 // Login Error
							 $message = ['auth_HomeWork'=> [
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
