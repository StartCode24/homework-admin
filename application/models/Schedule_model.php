<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schedule_model extends CI_Model {

	public function getSchedule($where="")
	{
		$data = $this->db->query('select * from schedule '.$where)->result_array();
		return $data;
		// debug_array($data);
	}
	public function getSchedule2($where="")
	{
		$data = $this->db->query('select * from schedule '.$where);
		return $data;
		// debug_array($data);
	}
	public function getMapelIdDistinc($where="")
	{
		$data = $this->db->query('select DISTINCT mapel_id FROM schedule '.$where);
		return $data;
	}
	

	public function getScheduleByDay($kelas_name, $jurusan, $subkelas, $day)
	{
		$get_kelas_id = 
			$this->db->query(
			" select kelas_id
			from kelas
			where kelas.kelas_name = '$kelas_name' and kelas.kelas_jurusan = '$jurusan' and kelas.kelas_sub = '$subkelas' "
			)->row();

		// debug_array($get_kelas_id->kelas_id);

		$schedule_by_day = 
			$this->db->query(
			" select schedule_id, start_time, finish_time, day, note,guruname,mapelname,roomname 
			from schedule 
			inner join guru on schedule.guru_id = guru.guru_id 
			inner join mapel on schedule.mapel_id = mapel.mapel_id
			inner join room on schedule.room_id = room.room_id
			where schedule.jurusan_id = '$jurusan' and schedule.kelas_id = '$get_kelas_id->kelas_id' and schedule.day = '$day' 
			order by schedule_id asc "
			)->result_array();

		// $this->db->select('schedule_id, start_time, finish_time, day, jam_mulai,jam_akhir,note,guruname,mapelname,room_id');
		// $this->db->from('schedule');
		// $this->db->join('guru', 'schedule.guru_id = guru.guru_id', "inner");
		// $this->db->join('mapel', 'schedule.mapel_id = mapel.mapel_id', "inner");
		// $this->db->where('schedule.kelas_id', $kelas);
		// $this->db->where('schedule.jurusan_id', $jurusan);
		// $this->db->where('schedule.day', $day);
		// $query = $this->db->get()->result_array();

		// debug_array($this->db->last_query());
		// debug_array($schedule_by_day);

		return $schedule_by_day;
	}

	public function insertData($schedule, $data){
		$res = $this->db->insert($schedule, $data);
		return $res;
	}

	public function updateData($schedule, $data, $where){
		$res = $this->db->update($schedule, $data, $where);
		return $res;
	}

	public function deleteData($schedule, $where){
		$res = $this->db->delete($schedule, $where);
		return $res;	
	}
	
	public function countSchedule()
	{
		$query = $this->db->query('select * from schedule');

		return $query->num_rows();
	}
}
 