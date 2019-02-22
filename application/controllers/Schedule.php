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

	public function view_schedule_day($kelas_jurusan_subkelas) {
		$data = "";
		$this->load->view('nav_content/header.php', array('data' => $data ));
		$this->load->view('content/schedule/schedule_day', array('data' => $data ));
		$this->load->view('nav_content/footer.php');
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
		$schedule_id = $_POST['schedule_id'];
		$start_time = $_POST['start_time'];
		$finish_time = $_POST['finish_time'];
		$day = $_POST['day'];
		$jam_ke = $_POST['jam_ke'];
		$note = $_POST['note'];
		$guru_id = $_POST['guru_id'];
		$mapel_id = $_POST['mapel_id'];
		$kelas_id = $_POST['kelas_id'];
		$jurusan_id = $_POST['jurusan_id'];
		$room_id = $_POST['room_id'];
		$data_insert = array(
			'schedule_id' => $schedule_id,
			'schedule_date' => $schedule_date,
			'start_time' => $start_time,
			'finish_time' => $finish_time,
			'day' => $day,
			'jam_ke' => $jam_ke,
			'note' => $note,
			'guru_id' => $guru_id,
			'mapel_id' => $mapel_id,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
			'room_id' => $room_id
		);
		$res = $this->Schedule_model->insertData('schedule', $data_insert);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Tambah data sukses');
			redirect('Dashboard/schedule');
		}else{
			echo "<h3>Insert data gagal</h3>";
		}
	}

	public function edit_data(){
		$schedule_id=$this->input->post('schedule_id');
		$schedule = $this->Schedule_model->getSchedule("where schedule_id = '$schedule_id'");
		// debug_array($schedule);
		$data = array(
			'schedule_id' => $schedule[0]['schedule_id'],
			'schedule_date' => $schedule[0]['schedule_date'],
			'start_time' => $schedule[0]['start_time'],
			'finish_time' => $schedule[0]['finish_time'],
			'day' => $schedule[0]['day'],
			'jam_ke' => $schedule[0]['jam_ke'],
			'note' => $schedule[0]['note'],
			'guru_id' => $schedule[0]['guru_id'],
			'mapel_id' => $schedule[0]['mapel_id'],
			'kelas_id' => $schedule[0]['kelas_id'],
			'jurusan_id' => $schedule[0]['jurusan_id'],
			'room_id' => $schedule[0]['room_id']
		);
		// debug_array($data);

		$this->load->view('content/schedule/edit_modal_schedule', $data);
	}

	public function do_update(){
		$schedule_id = $_POST['schedule_id'];
		$schedule_date = $_POST['schedule_date'];
		$start_time = $_POST['start_time'];
		$finish_time = $_POST['finish_time'];
		$day = $_POST['day'];
		$jam_ke = $_POST['jam_ke'];
		$note = $_POST['note'];
		$guru_id = $_POST['guru_id'];
		$mapel_id = $_POST['mapel_id'];
		$kelas_id = $_POST['kelas_id'];
		$jurusan_id = $_POST['jurusan_id'];
		$room_id = $_POST['room_id'];
		$data_update = array(
			'schedule_id' => $schedule_id,
			'schedule_date' => $schedule_date,
			'start_time' => $start_time,
			'finish_time' => $finish_time,
			'day' => $day,
			'jam_ke' => $jam_ke,
			'note' => $note,
			'guru_id' => $guru_id,
			'mapel_id' => $mapel_id,
			'kelas_id' => $kelas_id,
			'jurusan_id' => $jurusan_id,
			'room_id' => $room_id
		);
		$where = array('schedule_id' => $schedule_id);
		$res = $this->Schedule_model->updateData('schedule', $data_update, $where);
		if ($res>=1){
			$this->session->set_flashdata('pesan', 'Update data sukses');
			redirect('Dashboard/schedule');
		}else{
			echo "<h3>Update data gagal</h3>";
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
