<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index()
	{
		// $data = $this->Schedule_model->getSchedule();
		// //debug_array($data);
		// $this->load->view('schedule', array('data' => $data ));
		redirect('Dashboard/schedule');
	}

	public function filter_data_view_schedule(){
		// debug_array($_POST);
		
		if ($_POST['subkelas'] == "_") {
			$_POST['subkelas'] = "";
		}

		// debug_array($_POST);

		$data['jurusan'] = $_POST['jurusan'];
		$data['kelas'] = $_POST['kelas'];
		$data['subkelas'] = $_POST['subkelas'];

		$this->db->where('kelas_jurusan',$data['jurusan'])
				 ->where('kelas_name',$data['kelas'])
				 ->where('kelas_sub',$data['subkelas']);
		    $query = $this->db->get('kelas');
		    if ($query->num_rows() > 0){
		        $data['status'] = "true";
		        echo json_encode(array('status' => 'ok')); 
		    }
		    else{
		        $data['status'] = "false";
		        echo json_encode(array('status' => 'not ok')); 
		    }
		  // $this->db->last_query();
		
	}

	public function view_schedule_day($kelas_jurusan_subkelas="", $day="") {
		if ($kelas_jurusan_subkelas != "") {
			$expl = explode("_", $kelas_jurusan_subkelas);
			$kelas = $expl[0];
			$jurusan = $expl[1];
			$subkelas = $expl[2];
			// debug_array($expl);
		} else {
			redirect('Dashboard/schedule');
		}

		$day_array = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");

		if (in_array($day, $day_array))
		  {
			// $data = $this->Schedule_model->getScheduleByDay("10","13","B","Senin");
			$data = $this->Schedule_model->getScheduleByDay($kelas, $jurusan, $subkelas, $day);
			$jurusan_describe = $this->Jurusan_model->getJurusanName($jurusan);
			$data_guru = $this->Guru_model->getGuru();
			$data_mapel = $this->Mapel_model->getMapel();
			$data_room = $this->Room_model->getRoom();
			// debug_array($data_mapel);
			$this->load->view('nav_content/header.php', array('data' => $data ));
			$this->load->view('content/schedule/add_modal_schedule', array(
				'data' => $data, 
				'kelas' => $kelas, 
				'jurusan' => $jurusan, 
				'jurusan_describe' => $jurusan_describe, 
				'subkelas' => $subkelas, 
				'day' => $day,
				'data_guru' => $data_guru,
				'data_mapel' => $data_mapel,
				'data_room' => $data_room
			));
			// $this->load->view('content/schedule/edit_modal_schedule', array(
			// 	'data' => $data, 
			// 	'kelas' => $kelas, 
			// 	'jurusan' => $jurusan, 
			// 	'jurusan_describe' => $jurusan_describe, 
			// 	'subkelas' => $subkelas, 
			// 	'day' => $day,
			// 	'data_guru' => $data_guru,
			// 	'data_mapel' => $data_mapel,
			// 	'data_room' => $data_room
			// ));
			$this->load->view('content/schedule/schedule_day_detail', array(
				'data' => $data, 
				'kelas' => $kelas, 
				'jurusan' => $jurusan, 
				'jurusan_describe' => $jurusan_describe, 
				'subkelas' => $subkelas, 
				'day' => $day,
				'data_guru' => $data_guru,
				'data_mapel' => $data_mapel
			));
			$this->load->view('nav_content/footer.php');
		  } else {
			$data = "";
			$this->load->view('nav_content/header.php', array('data' => $data ));
			$this->load->view('content/schedule/schedule_day', array('data' => $data ));
			$this->load->view('nav_content/footer.php');
		  }
		
	}

	public function view_schedule_detail($value='')	{
		if ($kelas_jurusan_subkelas != "") {
			$expl = explode("_", $kelas_jurusan_subkelas);
			$kelas = $expl[0];
			$jurusan = $expl[1];
			$subkelas = $expl[2];
			// debug_array($expl);
		}
		$data = $this->Schedule_model->getSchedule();
		// debug_array($data);
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/schedule/schedule_day_detail', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
	}

	public function add_data(){
		$this->load->view('content/schedule/add_schedule');
	}

	public function do_insert(){
		// debug_array($_POST);
		$expl_jurusan = explode("_", $_POST['jurusan']);
		// debug_array($expl_jurusan);
		$kode_jurusan = $expl_jurusan[0];
		$kode_kelas = $this->Kelas_model->get_kelas_id($_POST['kelas'], $kode_jurusan, $_POST['subkelas']);
		// debug_array($kode_kelas);
		$schedule_id = $_POST['schedule_id'];
		$start_time = $_POST['start_time'];
		$finish_time = $_POST['finish_time'];
		$day = $_POST['day'];
		$guru_id = $_POST['guru_id'];
		$mapel_id = $_POST['mapel_id'];
		$kelas_id = $kode_kelas;
		$jurusan_id = $kode_jurusan;
		$room_id = $_POST['room_id'];
		$note = $_POST['note'];
		$data_insert = array(
			'schedule_id' => $schedule_id,
			'start_time' => $start_time,
			'finish_time' => $finish_time,
			'day' => $day,
			'note' => $note,
			'guru_id' => $guru_id,
			'mapel_id' => $mapel_id,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
			'room_id' => $room_id
		);

		$this->db->where('kelas_id',$kelas_id)
				 ->where('day',$day)
				 ->where('start_time',$start_time)
				 ->where('finish_time',$finish_time);
		$query = $this->db->get('schedule')->num_rows();
		// debug_array($query);
		    if ($query == 0){
		    	// debug_array($query, true);
		    	// debug_array($this->db->last_query());
		        	$res = $this->Schedule_model->insertData('schedule', $data_insert);
					if ($res>=1){
						$data['status'] = "true";
					        echo json_encode(array('status' => 'ok')); 
						
					}else{
						// echo "<h3>Insert data gagal</h3>";
						$data['status'] = "false";
					        echo json_encode(array('status' => 'not ok')); 
					}
		    }
		    else{
		        $data['status'] = "false";
		        echo json_encode(array('status' => 'not ok')); 
		        // echo json_encode(array('status' => 'not ok', 'desc' => 'data has duplicate')); 
		    }


	}

	public function edit_data(){
		$schedule_id=$this->input->post('schedule_id');
		$schedule = $this->Schedule_model->getSchedule("where schedule_id = '$schedule_id'");
		// debug_array($schedule);
		$jurusan_id = $schedule[0]['jurusan_id'];
		$jurusan_describe = $this->Jurusan_model->getJurusanName($jurusan_id);

		$guru_id = $schedule[0]['guru_id'];
		$guruname = $this->Guru_model->getGuruName($guru_id);

		$mapel_id = $schedule[0]['mapel_id'];
		$mapelname = $this->Mapel_model->getMapelName($mapel_id);

		$room_id = $schedule[0]['room_id'];
		$roomname = $this->Room_model->getRoomName($room_id);

		$kelas_info = $this->Kelas_model->get_kelas_info_by_id($schedule[0]['kelas_id']);
		// debug_array($kelas_info[0]);
		$kelas = $kelas_info[0]['kelas_name'];
		$subkelas = $kelas_info[0]['kelas_sub'];

		$data_guru = $this->Guru_model->getGuru();
		$data_mapel = $this->Mapel_model->getMapel();
		$data_room = $this->Room_model->getRoom();
		$data = array(
			'schedule_id' => $schedule[0]['schedule_id'],
			'start_time' => $schedule[0]['start_time'],
			'finish_time' => $schedule[0]['finish_time'],
			'day' => $schedule[0]['day'],
			'note' => $schedule[0]['note'],
			'guru_id' => $guru_id,
			'guruname' => $guruname,
			'mapel_id' => $mapel_id,
			'mapelname' => $mapelname,
			'room_id' => $room_id,
			'roomname' => $roomname,
			'kelas' => $kelas,
			'subkelas' => $subkelas,
			'jurusan' => $jurusan_id,
			'jurusan_describe' => $jurusan_describe,
			'data_guru' => $data_guru,
			'data_mapel' => $data_mapel,
			'data_room' => $data_room
		);
		// debug_array($data);

		$this->load->view('content/schedule/edit_modal_schedule', $data);
	}

	public function do_update(){
		// debug_array($_POST);
		$expl_jurusan = explode("_", $_POST['jurusan']);
		// debug_array($expl_jurusan);
		$kode_jurusan = $expl_jurusan[0];
		$kode_kelas = $this->Kelas_model->get_kelas_id($_POST['kelas'], $kode_jurusan, $_POST['subkelas']);
		// debug_array($kode_kelas);
		$schedule_id = $_POST['schedule_id'];
		$start_time = $_POST['start_time'];
		$finish_time = $_POST['finish_time'];
		$day = $_POST['day'];
		$guru_id = $_POST['guru_id'];
		$mapel_id = $_POST['mapel_id'];
		$kelas_id = $kode_kelas;
		$jurusan_id = $kode_jurusan;
		$room_id = $_POST['room_id'];
		$note = $_POST['note'];
		$data_update = array(
			'schedule_id' => $schedule_id,
			'start_time' => $start_time,
			'finish_time' => $finish_time,
			'day' => $day,
			'note' => $note,
			'guru_id' => $guru_id,
			'mapel_id' => $mapel_id,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
			'room_id' => $room_id
		);
		// debug_array($data_update);
		$where = array('schedule_id' => $schedule_id);
		$res = $this->Schedule_model->updateData('schedule', $data_update, $where);
		if ($res>=1){
			$data['status'] = "true";
		        echo json_encode(array('status' => 'ok')); 
		}else{
			$data['status'] = "false";
		        echo json_encode(array('status' => 'not ok')); 
		}

	}

	public function do_delete() {
		$schedule_id=$this->input->post('schedule_id');
		$where = array('schedule_id' => $schedule_id );
		$res = $this->Schedule_model->deleteData('schedule', $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Delete data sukses');
			redirect('Dashboard/schedule');
		}else{
			echo "<h3>Delete data gagal</h3>";
		}
	}
}
