<?php // debug_array($data); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Schedule</p>
            <!-- <a href="<?php echo base_url()?>Schedule/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a> -->
            <a href="" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal">
              <span class="fa fa-plus-circle"></span>
              <b>Tambah Data</b>
            </a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Schedule ID</th>
			<th>Start Time</th>
			<th>Finish Time</th>
			<th>Day</th>
			<th>Jam Ke</th>
			<th>Note</th>
			<th>Guru ID</th>
			<th>Mapel ID</th>
			<th>Kelas ID</th>
			<th>Jurusan ID</th>
			<th>Room ID</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
			<?php // debug_array($value) ?>
		<tr>
				<td class=""><?php echo $value['schedule_id']; ?></td>
				<td class=""><?php echo $value['start_time']; ?></td>
				<td class=""><?php echo $value['finish_time']; ?></td>
				<td class=""><?php echo $value['day']; ?></td>
				<td class=""><?php echo $value['jam_ke']; ?></td>
				<td class=""><?php echo $value['note']; ?></td>
				<td class=""><?php echo $value['guru_id']; ?></td>
				<td class=""><?php echo $value['mapel_id']; ?></td>
				<td class=""><?php echo $value['kelas_id']; ?></td>
				<td class=""><?php echo $value['jurusan_id']; ?></td>
				<td class=""><?php echo $value['room_id']; ?></td>
				<!-- <td class=""><?php// echo $value['siswa_note']; ?></td> -->
				<td class="">
					<button class="btn btn-warning btn-fill" onclick="_edit_schedule('<?php echo $value['schedule_id'];?>')">
               Edit
             </button>
					||
					<button class="btn btn-danger" onclick="Swall_Delete_Schedule('<?php echo $value['schedule_id'];?> ')">Delete</button>
				</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
</div>
          </div>
          <div class="card-footer">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
