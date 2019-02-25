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
	public function GetMapel(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$_POST = $this->security->xss_clean($_POST);

		$Allmapel=$this->Mapel_model->getAllMapel()->result();
		$data=array();
		if (!empty($Allmapel) AND $Allmapel != FALSE)
		{
			foreach ($Allmapel as $allmapel) {
				$data[]=array(
					'mapelId'=>$allmapel->mapel_id,
					'mapelName'=>$allmapel->mapelname,
					'mapelNote'=>$allmapel->mapel_note
				);
			
			// print_r($schedule);
			}
			 $message =['auth_Mapel'=> [
					 'status' => 200,
					 'data' =>array( 
						 'Mapel'=>$data,
					 ),
					 'message' => "get Mapel successful"
			 ]];
			
			// $this->response($message, REST_Controller::HTTP_OK);
			echo json_encode($message);
		}else{
			$message =['auth_Mapel'=> [
				'status' => 404,
				'data' =>array( 
					'Mapel'=>$data,
				),
				'message' => "get Mapel Not Found"
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
					 'message' => "get Kelas successful"
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
					 $Schedule = $this->Schedule_model->getSchedule2("where kelas_id = '$kelas_id' and jurusan_id='$jurusan_id'")->result();
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
			 $this->form_validation->set_rules('siswa_nik', 'siswa_nik', 'trim|required');
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
					 $siswa_nis=$this->input->post('siswa_nik');
					 $data=array();
					 $HomeWork= $this->HomeWork_model->getHomeWork("where kelas_id = '$kelas_id' and jurusan_id='$jurusan_id' and siswa_nik='$siswa_nis'")->result();
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
									'month'=>$HomeWork_dateMont,
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
									'room_name'=>$nama_room,
									'siswa_nik'=>$HomeWork->siswa_nik,
									'alarm_time'=>$HomeWork->alarm_time,
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
		date_default_timezone_set('Asia/Jakarta');
		header('Content-Type:application/json');
		header('Accept:application/json');
		// homework_id
		
		$this->form_validation->set_rules('homework_date', 'homework_date', 'trim|required');
		$this->form_validation->set_rules('start_time', 'start_time', 'trim|required');
		$this->form_validation->set_rules('finish_time', 'finish_time', 'trim|required');
		// $this->form_validation->set_rules('day', 'day', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim|required');
		// $this->form_validation->set_rules('guru_id', 'guru_id', 'trim|required');
		$this->form_validation->set_rules('mapel_name', 'mapel_id', 'trim|required');
		$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
		// $this->form_validation->set_rules('room_id', 'room_id', 'trim|required');
		// $this->form_validation->set_rules('schedule_id', 'schedule_id', 'trim|required');
		$this->form_validation->set_rules('siswa_nik', 'siswa_nik', 'trim|required');
		$this->form_validation->set_rules('alarm_time', 'alarm_time', 'trim|required');
		$this->form_validation->set_rules('id_homework', 'id_homework', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
		 {
			$message =array('auth_AddHomework'=> array(
				'status' => false,
				'error' =>201,
				'message' =>  $this->form_validation->error_array()
			));
			echo json_encode($message);
		 }else{
			 $homeWorkDate=$this->input->post('homework_date');
			 $dayName=date('l',strtotime($homeWorkDate));
			 
			 if($dayName=='Monday'){
			 $Nameday="Senin";
			 }if($dayName=='Tuesday'){
			 $Nameday="Selasa";
			 }if($dayName=='Wednesday'){
			 $Nameday="Rabu";
			 }if($dayName=='Thursday'){
			 $Nameday="Kamis";
			 }if($dayName=='Friday'){
			 $Nameday="Jumat";
			 }if($dayName=='Saturday'){
			 $Nameday="Sabtu";
			 }if($dayName=='Sunday'){
			 $Nameday="Minggu";
			 }
			 
			 $starTime=$this->input->post('start_time');
			 $finishTime= $this->input->post('finish_time');
			 $note=$this->input->post('note');
			 $mapelName=$this->input->post('mapel_name');
			 $Mapel=$this->Mapel_model->getMapel2("where mapelname Like '%$mapelName%'")->result();
			 foreach($Mapel as $mapel){
				$idMapel=$mapel->mapel_id;
			 }
			 $idHomeWork=$this->input->post('id_homework');
			 $kelasId=$this->input->post('kelas_id');
			 $jurusanId=$this->input->post('jurusan_id');
			 $siswaNik=$this->input->post('siswa_nik');
			 $alrmTime=$this->input->post('alarm_time');
			 $schedule=$this->Schedule_model->getSchedule2("where mapel_id='$idMapel' and kelas_id='$kelasId' and jurusan_id='$jurusanId' ")->result();
			 foreach($schedule as $schedule){
				$guruId=$schedule->guru_id;
				$scheduleId=$schedule->schedule_id;
				$roomId=$schedule->room_id;
			 }
			 if(!empty($schedule)){
				// print_r($schedule);exit;
					$data_insert = array(
						'homework_id' => $idHomeWork,
						'homework_date' =>$homeWorkDate,
						'start_time' => $starTime,
						'finish_time' =>$finishTime,
						'day' =>$dayName,
						'note' => $note,
						'guru_id' => $guruId,
						'mapel_id' => $idMapel,
						'kelas_id' => $kelasId,
						'jurusan_id' => $jurusanId,
						'room_id' => $roomId,
						'schedule_id' => $scheduleId,
						'siswa_nik' => $siswaNik,
						'alarm_time'=>$alrmTime

					);
					$res = $this->HomeWork_model->insertData('homework', $data_insert);
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
					'error'=>202,
					'message' => 'Jadwal di jurusan Anda tidak Ada'
				));
				echo json_encode($message);
			}
			
		 }
	}

	public function DeleteHomeWork(){
		header('Content-Type:application/json');
		header('Accept:application/json');
		$this->form_validation->set_rules('homework_id', 'homework_id', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		 {
			$message =array('auth_DeleteHomework'=> array(
				'status' => false,
				'error' =>201,
				'message' =>  $this->form_validation->error_array()
			));
			echo json_encode($message);
		 }else{
			$idHomework=$this->input->post('homework_id');
			$where = array('homework_id' => '00'.$idHomework );
			$res = $this->HomeWork_model->deleteData('homework', $where);
			if ($res>=1){
				$message =array('auth_DeleteHomework'=> array(
					'status' => true,
					'error' =>200,
					'message' => 'Success'
				));
				echo json_encode($message);
			}else{
				$message =array('auth_DeleteHomework'=> array(
					'status' => false,
					'error' =>203,
					'message' => 'Not Succes'
				));
				echo json_encode($message);
			}
		 }
	}

	public function UpdateHomeWork(){
		date_default_timezone_set('Asia/Jakarta');
		header('Content-Type:application/json');
		header('Accept:application/json');
		// homework_id
		$this->form_validation->set_rules('homework_id', 'homework_id', 'trim|required');
		$this->form_validation->set_rules('homework_date', 'homework_date', 'trim|required');
		$this->form_validation->set_rules('start_time', 'start_time', 'trim|required');
		$this->form_validation->set_rules('finish_time', 'finish_time', 'trim|required');
		// $this->form_validation->set_rules('day', 'day', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim|required');
		// $this->form_validation->set_rules('guru_id', 'guru_id', 'trim|required');
		$this->form_validation->set_rules('mapel_name', 'mapel_id', 'trim|required');
		$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
		// $this->form_validation->set_rules('room_id', 'room_id', 'trim|required');
		// $this->form_validation->set_rules('schedule_id', 'schedule_id', 'trim|required');
		$this->form_validation->set_rules('siswa_nik', 'siswa_nik', 'trim|required');
		$this->form_validation->set_rules('alarm_time', 'alarm_time', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
		   $message =array('auth_UpdateHomework'=> array(
			   'status' => false,
			   'error' =>201,
			   'message' =>  $this->form_validation->error_array()
		   ));
		   echo json_encode($message);
		}else{
			$homeWorkDate=$this->input->post('homework_date');
			$dayName=date('l',$homeWorkDate);
			if($dayName=='Monday'){
			$Nameday="Senin";
			}if($dayName=='Tuesday'){
			$Nameday="Selasa";
			}if($dayName=='Wednesday'){
			$Nameday="Rabu";
			}if($dayName=='Thursday'){
			$Nameday="Kamis";
			}if($dayName=='Friday'){
			$Nameday="Jumat";
			}if($dayName=='Saturday'){
			$Nameday="Sabtu";
			}if($dayName=='Sunday'){
			$Nameday="Minggu";
			}
			$idHomework=$this->input->post('homework_id');
			$starTime=$this->input->post('start_time');
			$finishTime= $this->input->post('finish_time');
			$note=$this->input->post('note');
			$mapelName=$this->input->post('mapel_name');
			$Mapel=$this->Mapel_model->getMapel2("where mapelname Like '%$mapelName%'")->result();
			foreach($Mapel as $mapel){
			   $idMapel=$mapel->mapel_id;
			}
			
			$kelasId=$this->input->post('kelas_id');
			$jurusanId=$this->input->post('jurusan_id');
			$siswaNik=$this->input->post('siswa_nik');
			$alrmTime=$this->input->post('alarm_time');
			$schedule=$this->Schedule_model->getSchedule2("where mapel_id='$idMapel' and kelas_id='$kelasId' and jurusan_id='$jurusanId' ")->result();
			foreach($schedule as $schedule){
			   $guruId=$schedule->guru_id;
			   $scheduleId=$schedule->schedule_id;
			   $roomId=$schedule->room_id;
			}
			if(!empty($schedule)){
			   // print_r($schedule);exit;
				   $data_insert = array(
					   'homework_date' =>$homeWorkDate,
					   'start_time' => $starTime,
					   'finish_time' =>$finishTime,
					   'day' =>$Nameday,
					   'note' => $note,
					   'guru_id' => $guruId,
					   'mapel_id' => $idMapel,
					   'kelas_id' => $kelasId,
					   'jurusan_id' => $jurusanId,
					   'room_id' => $roomId,
					   'schedule_id' => $scheduleId,
					   'siswa_nik' => $siswaNik,
					   'alarm_time'=>$alrmTime

				   );
				   $where = array('homework_id' =>'00'.$idHomework);
				//    $res = $this->HomeWork_model->insertData('homework', $data_insert);
				   $res = $this->HomeWork_model->updateData('homework', $data_insert, $where);
				   if ($res>=1){
					   $message =array('auth_UpdateHomework'=> array(
						   'status' => true,
						   'error'=>200,
						   'message' => 'Success'
					   ));
					   echo json_encode($message);
				   }else{
					   $message =array('auth_UpdateHomework'=> array(
						   'status' => false,
						   'error'=>205,
						   'message' => 'Not Success'
					   ));
					   echo json_encode($message);
				   }
		   }else{
			   $message =array('auth_UpdateHomework'=> array(
				   'status' => false,
				   'error'=>202,
				   'message' => 'Jadwal di jurusan Anda tidak Ada'
			   ));
			   echo json_encode($message);
		   }
		   
		}
	}

	public function SearchSched(){
		date_default_timezone_set('Asia/Jakarta');
		header('Content-Type:application/json');
		header('Accept:application/json');
		$this->form_validation->set_rules('schedule_id', 'schedule_id', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
				// Form Validation Errors
				$message =array('auth_SearchSchedule'=> array(
						'status' => false,
						'error' => $this->form_validation->error_array(),
						'message' => validation_errors()
				));
				//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				echo json_encode($message);
		}else{
		try {
			$schedule_id=$this->input->post('schedule_id');
			$data=array();
			$Schedule=$this->Schedule_model->getSchedule2("where schedule_id='00$schedule_id'")->result();
			// print_r($Schedule);exit;
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
			$mont=date('M');
			
			$data=array(
				'schedule_id'=>$schedule->schedule_id,
				'month'=>$mont,
				'start_time'=>$schedule->start_time,
				'finish_time'=>$schedule->finish_time,
				'day_name'=>$schedule->day,			
				'note'=>$schedule->note,
				'guru_id'=>$schedule->guru_id,
				'guru_name'=>$nama_guru,
				'mapel_id'=>$schedule->mapel_id,
				'mapel_name'=>$nama_mapel,
				'kelas_id'=>$schedule->kelas_id,
				'kelas_name'=>$nama_kelas,
				'jurusan_name'=>$nama_jurusan,
				'room_name'=>$nama_room
			    );
			 }
		
		 
		   $message =['auth_SearchSchedule'=> [
				   'status' => 200,
				   'data' => $data,
				   'message' => "Data SearchSchedule"
		   ]];
		   echo json_encode($message);
		}else{
			$message =['auth_SearchSchedule'=> [
				'status' => 404,
				'data' => false,
				'message' => "Data Notfound"
		]];
		echo json_encode($message);
		}
		} catch (Exception $e) {
			http_response_code('401');
		   $message =['auth_SearchSchedule'=> [
				   'status' => false,
				   'message' => $e->getMessage()
		   ]];
		   echo json_encode($message);
		   exit;
		}

		}
	}
	
	public function SearchSchedForDay(){
		date_default_timezone_set('Asia/Jakarta');
		$bulan=date("m");
		$tahun=date("Y");
		$date=date('Y-m');
		// print_r($date);exit;
		$dayofweek = date('w', strtotime($bulan));
		header('Content-Type:application/json');
		header('Accept:application/json');
		$_POST = $this->security->xss_clean($_POST);
		$this->form_validation->set_rules('kelas_id', 'kelas_id', 'trim|required');
		$this->form_validation->set_rules('jurusan_id', 'jurusan_id', 'trim|required');
		$this->form_validation->set_rules('day_name', 'day_name', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
				// Form Validation Errors
				$message =array('auth_SearchSchedForDay'=> array(
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
			 $DayName=$this->input->post('day_name');
			 $data=array();
			 $Schedule = $this->Schedule_model->getSchedule2("where kelas_id = '$kelas_id' and jurusan_id='$jurusan_id' and day like'%$DayName%'")->result();
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
					 $message =['auth_SearchSchedForDay'=> [
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
					 $message = ['auth_SearchSchedForDay'=> [
							 'status' => FALSE,
							 'message' => "Invalid Get Schedule"
					 ]];
					 //$this->response($message, REST_Controller::HTTP_NOT_FOUND);
					 echo json_encode($message);
			 }
		}
	}

	public function GetIdHomework(){
		date_default_timezone_set('Asia/Jakarta');
		header('Content-Type:application/json');
		header('Accept:application/json');
		$_POST = $this->security->xss_clean($_POST);
		$idHomeWork=$this->HomeWork_model->cari_kode_idHomework();
		if (!empty($idHomeWork) AND $idHomeWork != FALSE)
		{
			 $message =['auth_idHomeWork'=> [
					 'status' => 200,
					 'data' =>array( 
						 'idHomeWork'=>$idHomeWork,
					 ),
					 'message' => "get idHomeWork successful"
			 ]];
			
			// $this->response($message, REST_Controller::HTTP_OK);
			echo json_encode($message);
		}else{
			$message =['auth_idHomeWork'=> [
				'status' => 404,
				'data' =>array( 
					'idHomeWork'=>$idHomeWork,
				),
				'message' => "get idHomeWork Not Found"
		]];
	   
	   // $this->response($message, REST_Controller::HTTP_OK);
	   echo json_encode($message);
		}

	}

	public function SearchHomeWork(){
		date_default_timezone_set('Asia/Jakarta');
		header('Content-Type:application/json');
		header('Accept:application/json');
		$this->form_validation->set_rules('homework_id', 'homework_id', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
				// Form Validation Errors
				$message =array('auth_SearchHomeWork'=> array(
						'status' => false,
						'error' => $this->form_validation->error_array(),
						'message' => validation_errors()
				));
				//$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				echo json_encode($message);
		}else{
		try {
			$HomeworkId=$this->input->post('homework_id');
			$data=array();
			$Homework=$this->HomeWork_model->getHomeWork("where homework_id='00$HomeworkId'")->result();
			// print_r($Schedule);exit;
			if (!empty($Homework) AND $Homework != FALSE)
			{
						 
			$nama_guru='';
			$nama_mapel='';
			$nama_kelas='';
			$nama_jurusan='';
			$nama_room='';
							 
							 
			foreach ($Homework as $Homework) {
			$day=$Homework->day;
			$day_of_week=substr($Homework->homework_date,-2);
								
			$Guru =$this->Guru_model->getGuru2("where guru_id='$Homework->guru_id'")->result();
			foreach($Guru as $guru){
				$nama_guru=$guru->guruname;	
			}
			$Mapel=$this->Mapel_model->getMapel2("where mapel_id='$Homework->mapel_id'")->result();
			foreach($Mapel as $mapel){
				$nama_mapel=$mapel->mapelname;
			}
			$Kelas=$this->Kelas_model->getKelas2("where kelas_id='$Homework->kelas_id'")->result();
				foreach($Kelas as $kelas){
				$nama_kelas=$kelas->kelas_name;
			}
			$Jurusan=$this->Jurusan_model->getJurusan2("where jurusan_id='$Homework->jurusan_id'")->result();
			foreach($Jurusan as $jurusan){
				$nama_jurusan=$jurusan->jurusan_name;
			}
			$Room=$this->Room_model->getRoom2("where room_id='$Homework->room_id'")->result();
			foreach($Room as $room){
				$nama_room=$room->roomname;
			}
								
			$schedule_dateYear=substr($Homework->homework_date,0,4);
			$schedule_dateMont=substr($Homework->homework_date,5,-3);
			$mont=date('m',strtotime($Homework->homework_date))-1;
			$date=date('d',strtotime($Homework->homework_date));
			$years=date('Y',strtotime($Homework->homework_date));
			$dayName=date('l',strtotime($Homework->homework_date));
			 
			 if($dayName=='Monday'){
			 $Nameday="Senin";
			 }if($dayName=='Tuesday'){
			 $Nameday="Selasa";
			 }if($dayName=='Wednesday'){
			 $Nameday="Rabu";
			 }if($dayName=='Thursday'){
			 $Nameday="Kamis";
			 }if($dayName=='Friday'){
			 $Nameday="Jumat";
			 }if($dayName=='Saturday'){
			 $Nameday="Sabtu";
			 }if($dayName=='Sunday'){
			 $Nameday="Minggu";
			 }
			 $hours=substr($Homework->alarm_time,0,2);
			 $minute=substr($Homework->alarm_time,3,-3);
			 $HomeworkDate=date('Ymd',strtotime($Homework->homework_date));
			$dateName=$Nameday.', '.date('d-M-Y',strtotime($Homework->homework_date));
			$data=array(
				'homework_id'=>$Homework->homework_id,
				'homework_date'=>$HomeworkDate,
				'dateName'=>$dateName,
				'month'=>$mont,
				'date'=>$date,
				'years'=>$years,
				'hours'=>$hours,
				'minute'=>$minute,
				'start_time'=>$Homework->start_time,
				'finish_time'=>$Homework->finish_time,
				'day_name'=>$Homework->day,			
				'note'=>$Homework->note,
				'guru_id'=>$Homework->guru_id,
				'guru_name'=>$nama_guru,
				'mapel_id'=>$Homework->mapel_id,
				'mapel_name'=>$nama_mapel,
				'kelas_id'=>$Homework->kelas_id,
				'kelas_name'=>$nama_kelas,
				'jurusan_name'=>$nama_jurusan,
				'room_name'=>$nama_room,
				'alarm_time'=>$Homework->alarm_time
			    );
			 }
		
		 
		   $message =['auth_SearchHomeWork'=> [
				   'status' => 200,
				   'data' => $data,
				   'message' => "Data Homework"
		   ]];
		   echo json_encode($message);
		}else{
			$message =['auth_SearchHomeWork'=> [
				'status' => 404,
				'data' => false,
				'message' => "Data Notfound"
		]];
		echo json_encode($message);
		}
		} catch (Exception $e) {
			http_response_code('401');
		   $message =['auth_SearchSchedule'=> [
				   'status' => false,
				   'message' => $e->getMessage()
		   ]];
		   echo json_encode($message);
		   exit;
		}

		}
	}

	public function GetNote(){

	}
	

}
