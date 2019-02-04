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
		
		date_default_timezone_set('Asia/Jakarta');
		$bulan=date("m");
		$tahun=date("Y");
		$date=date('Y-m');
		// print_r($date);exit;
		$dayofweek = date('w', strtotime($bulan));
		// print_r($dayofweek);exit;
		
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
								
								$schedule_dateYear=substr($schedule->schedule_date,0,4);
								$schedule_dateMont=substr($schedule->schedule_date,5,-3);
								
									//  print_r($dayofweek );exit;
									$dayName=$schedule->day;
									if($dayName=='Senin'){
										$dayName="Monday";
									}if($dayName=='Selasa'){
										$dayName="Tuesday";
									}if($dayName=='Rabu'){
										$dayName="Wednesday";
									}if($dayName=='Kamis'){
										$dayName="Thursday";
									}if($dayName=='Jumat'){
										$dayName="Friday";
									}if($dayName=='Sabtu'){
										$dayName="Saturday";
									}if($dayName=='Minggu'){
										$dayName="Sunday";
									}
									// for($i=1;$i<=$dayofweek;$i++){
									// 	$dayDate[]= date('d', strtotime(($dayofweek - ($dayofweek-$i)).'Friday', strtotime($date)));
									// }
									// print_r($dayDate);exit;
								
								if($tahun==$schedule_dateYear&&$bulan==$schedule_dateMont){
									for($i=1;$i<=$dayofweek;$i++){
										$dayDate= date('d', strtotime(($dayofweek - ($dayofweek-$i)).$dayName, strtotime($date)));
										
									$data[]=array(
										'schedule_id'=>$schedule->schedule_id,
										'month'=>$schedule_dateMont,
										'start_time'=>$schedule->start_time,
										'finish_time'=>$schedule->finish_time,
										'day_name'=>$dayName,
										'day_date'=>$dayDate,
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
		date_default_timezone_set('Asia/Jakarta');
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
	public function AddHomeWork(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		// homework_id
		
		$this->form_validation->set_rules('homework_date', 'homework_date', 'trim|required');
		$this->form_validation->set_rules('start_time', 'start_time', 'trim|required');
		$this->form_validation->set_rules('finish_time', 'finish_time', 'trim|required');
		$this->form_validation->set_rules('day', 'day', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim|required');
		$this->form_validation->set_rules('guru_id', 'guru_id', 'trim|required');
		$this->form_validation->set_rules('mapel_id', 'mapel_id', 'trim|required');
		$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
		$this->form_validation->set_rules('room_id', 'room_id', 'trim|required');
		$this->form_validation->set_rules('schedule_id', 'schedule_id', 'trim|required');
		$this->form_validation->set_rules('siswa_id', 'siswa_id', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
		 {
			$message =array('auth_AddHomework'=> array(
				'status' => false,
				'error' =>201,
				'message' =>  $this->form_validation->error_array()
			));
			echo json_encode($message);
		 }else{
			
				$kelas_nama= $this->input->post('kelas_nama');
				$kelas=$this->Kelas_model->getKelas2("where kelas_name='$kelas_nama'")->result();
				foreach($kelas as $kelas){
					$id_kelas=$kelas->kelas_id;
				}
				$jurusan_nama=$this->input->post('jurusan_nama');
				$Jurusan=$this->Jurusan_model->getJurusan2("where jurusan_name='$jurusan_nama'")->result();
				foreach($Jurusan as $jurusan){
					$id_jurusan=$jurusan->jurusan_id;
				}
				// print_r($id_jurusan);exit;
				if($this->input->post('password_1')==$this->input->post('password_2')){
					$data_insert = array(
						'homework_id' => '',
						'homework_date' => '',
						'start_time' => '',
						'finish_time' => '',
						'day' =>'',
						'note' => '',
						'guru_id' => '',
						'mapel_id' => '',
						'kelas_id' => '',
						'jurusan_id' => '',
						'room_id' => '',
						'schedule_id' => '',
						'siswa_id' => '',

					);
					$res = $this->Siswa_model->insertData('siswa', $data_insert);
					if ($res>=1){
						$message =array('auth_AddHomework'=> array(
							'status' => true,
							'error'=>200,
							'message' => 'Success'
						));
						echo json_encode($message);
					}else{
						$message =array('auth_AddHomework'=> array(
							'status' => false,
							'error'=>205,
							'message' => 'Not Success'
						));
						echo json_encode($message);
					}
				}else{
					$message =array('auth_AddHomework'=> array(
						'status' => false,
						'error'=>203,
						'message' => 'Password Not Same'
					));
					echo json_encode($message);
				}
			
		 }
	}

	public function GetNote(){

	}
	

}
