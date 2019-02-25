<?php // debug_array($kelas); ?>
<?php
	if (empty($day)) {
		$day = "(Error. Data Hari tidak ditemukan)";
	} else {}
	
?>
<script>
  function Swall_Edit_Schedule(schedule_id){
    var datam={"schedule_id":schedule_id};
    var base_url = $('#base').val();
    var base_url2=base_url+'Schedule/';


    // ajax
    jQuery.ajax({
      // url untuk menuju data yang akan di kirim
      url: base_url2+"edit_data",
      method : "POST",
      data:datam,
      success:function(data){

        jQuery('body').append(data);
        // untuk menampilkan modal berdasarkan edit
        jQuery('#myModaledit').modal('toggle');
        // untuk menghilangkan isi post agar kembali menjadi 0 pada variabel datam
        jQuery('#myModaledit').remove();
      },
      error:function(){
          swal ( "Oops" ,  "Something went wrong!" ,  "error" );
      }

    });
  }

  function Swall_Add_Schedule(){
    // untuk menampung isi data dari schedule id
    // var base_url = $('#base').val();
    // var base_url2=base_url+'Schedule/';


    // // ajax
    // jQuery.ajax({
    //   // url untuk menuju data yang akan di kirim
    //   url: base_url2+"do_insert",
    //   method : "POST",
    //   data:datam,
    //   success:function(data){

        // jQuery('body').append(data);
        // untuk menampilkan modal berdasarkan edit
        jQuery('#myModaladd').modal('toggle');
        // untuk menghilangkan isi post agar kembali menjadi 0 pada variabel datam
        jQuery('#myModaladd').remove();
    //   },
    //   error:function(){
    //       // alert("something went wrong"+datam).console.error();
    //       swal ( "Oops" ,  "Something went wrong!" ,  "error" );
    //   }

    // });
  }
</script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Schedule - <?php echo $day; ?></p>
            <!-- <a href="<?php echo base_url()?>Schedule/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a> -->
            <!-- <button class="btn btn-light" onclick="Swall_Add_Schedule()">Add</button> -->
			<a href="" onclick="Swall_Add_Schedule()" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal">
              <span class="fa fa-plus-circle"></span>
              <b>Tambah Data</b>
            </a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>ID</th>
			<th>Start Time</th>
			<th>Finish Time</th>
			<th>Jam Mulai</th>
			<th>Jam Akhir</th>
			<th>Note</th>
			<th>Guru</th>
			<th>Mapel</th>
			<th>Room</th>
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
				<td class=""><?php echo $value['jam_mulai']; ?></td>
				<td class=""><?php echo $value['jam_akhir']; ?></td>
				<td class=""><?php echo $value['note']; ?></td>
				<td class=""><?php echo $value['guruname']; ?></td>
				<td class=""><?php echo $value['mapelname']; ?></td>
				<td class=""><?php echo $value['roomname']; ?></td>
				<!-- <td class=""><?php// echo $value['siswa_note']; ?></td> -->
				<td class="">
					<button class="btn btn-warning btn-fill" onclick="Swall_Edit_Schedule('<?php echo $value['schedule_id'];?>')">
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
