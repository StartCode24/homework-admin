<style>
  div.modal-body {
    padding-top: 0px !important;
  }

    .swal-footer {
        display: flex !important;
        justify-content: center !important;
    }
</style>
<script>
function submit_updated_data() {
  // alert($( "#start_time_edit" ).val());
  var schedule_id = $( "#schedule_id_edit" ).val();
  var start_time = $( "#start_time_edit" ).val();
  var finish_time = $( "#finish_time_edit" ).val();
  var day = $( "#day_edit" ).val();
  var jam_mulai = $( "#jam_mulai_edit" ).val();
  var jam_akhir = $( "#jam_akhir_edit" ).val();
  var guru_id = $( "#guru_id_edit" ).val();
  var mapel_id = $( "#mapel_id_edit" ).val();
  var room_id = $( "#room_id_edit" ).val();
  var note = $( "#note_edit" ).val();
  var kelas = $( "#kelas_edit" ).val();
  var jurusan = $( "#jurusan_edit" ).val();
  var subkelas = $( "#subkelas_edit" ).val();
  var kelas_jurusan_subkelas = kelas+"_"+jurusan+"_"+subkelas;
  if ($( "#start_time_edit" ).val() === '' ) {
    swal("Start Time Harus Diisi", "Isilah pukul berapa dimulainya pelajaran" , "info");
  } else if ($( "#finish_time_edit" ).val() == '' ) {
    swal("Finish Time Harus Diisi", "Isilah pukul berapa selesainya pelajaran" , "info");
  } else if ($( "#jam_mulai_edit" ).val() == '' ) {
    swal("Jam Mulai Harus Diisi", "Isilah jam ke- berapa dimulainya pelajaran" , "info");
  } else if ($( "#jam_akhir_edit" ).val() == '' ) {
    swal("Jam Akhir Harus Diisi", "Isilah jam ke- berapa selesainya pelajaran" , "info");
  } else if ($( "#guru_id_edit" ).val() == '' ) {
    swal("Data Guru Harus Diisi", "Isilah data guru yang mengajar" , "info");
  } else if ($( "#mapel_id_edit" ).val() == '' ) {
    swal("Data Mapel Harus Diisi", "Isilah data mata pelajaran" , "info");
  } else if ($( "#room_id_edit" ).val() == '' ) {
    swal("Data Ruangan Harus Diisi", "Isilah data ruangan" , "info");
  } else {
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>Schedule/do_update',
      data: 
          {
            schedule_id: schedule_id,
            start_time: start_time,
            finish_time: finish_time,
            day: day,
            jam_mulai: jam_mulai,
            jam_akhir: jam_akhir,
            guru_id: guru_id,
            mapel_id: mapel_id,
            room_id: room_id,
            note: note,
            kelas: kelas,
            jurusan: jurusan,
            subkelas: subkelas
          },
      dataType: 'json',
      success: function(d){
       // alert(d.status); //will alert ok
      if (d.status === "ok") {
            swal("Data Tersimpan", "Terimakasih, data Anda berhasil tersimpan.", "success")
            // console.log(d.status);
            .then(
          function() {
            location.reload();
          }, function() {
            alert( "failed redirect" );
          }
        );
          } else if (d.status === "not ok") {
            swal("Error", "Data tidak ditemukan, tolong cek kembali pilihan anda.", "error");
            // console.log(d.status);
          } else {}
      }
    });
  }
}
</script>
<?php // debug_array($data) ?>
<!-- Modal -->
  <div id="myModaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
          <h4 class="modal-title">Edit Data Schedule</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="content">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Schedule ID</label>
                              <input type="text" id="schedule_id_edit" class="form-control border-input" readonly value="<?php echo $schedule_id; ?>" name="schedule_id_edit" placeholder="(autofill by system)">
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="time" required id="start_time_edit" class="form-control border-input" placeholder="start_time_edit" name="start_time_edit" value="<?php echo $start_time; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Finish Time</label>
                            <input type="time" required id="finish_time_edit" class="form-control border-input" placeholder="finish_time_edit" name="finish_time_edit" value="<?php echo $finish_time; ?>">
                        </div>
                      </div>
                  </div>
                      
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hari</label>
                            <input type="text" readonly required id="day_edit" class="form-control border-input" placeholder="day" name="day_edit" value="<?php echo $day; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label>Guru</label>
                            <select id="guru_id_edit" name="guru_id_edit" class="form-control border-input select-guru_edit">
                                <option value="<?php echo $guru_id; ?>" selected><?php echo $guruname; ?></option>
                                <option value="">---</option>
                              <?php foreach ($data_guru as $value) { //print_r($value);?>
                                <option value="<?php echo $value['guru_id']?>"><?php echo $value['guruname'] ?></option>
                              <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Mapel</label>
                            <select id="mapel_id_edit" name="mapel_id_edit" class="form-control border-input select-mapel">
                              <option value="<?php echo $mapel_id; ?>" selected><?php echo $mapelname; ?></option>
                              <option value="">---</option>
                            <?php foreach ($data_mapel as $value) { //print_r($value);?>
                              <option value="<?php echo $value['mapel_id']?>"><?php echo $value['mapelname'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <select id="room_id_edit" name="room_id_edit" class="form-control border-input select-room_edit">
                              <option value="<?php echo $room_id; ?>" selected><?php echo $roomname; ?></option>
                              <option value="">---</option>
                            <?php foreach ($data_room as $value) { //print_r($value);?>
                              <option value="<?php echo $value['room_id']?>"><?php echo $value['roomname'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Note</label>
                              <textarea id="note_edit" class="form-control border-input" name="note_edit"><?php echo $note; ?></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" id="kelas_edit" class="form-control border-input" readonly value="<?php echo $kelas;?>" name="kelas_edit" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" id="jurusan_edit" class="form-control border-input" readonly value="<?php echo $jurusan;?>_<?php echo $jurusan_describe;?>" name="jurusan_edit" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Subkelas</label>
                            <input type="text" id="subkelas_edit" class="form-control border-input" readonly value="<?php echo $subkelas;?>" name="subkelas_edit" placeholder="(autofill by system)">
                        </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-warning btn-fill btn-wd" onclick="submit_updated_data()">Simpan Data</button>
                  </div>
                  <div class="clearfix"></div>
          </div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->
        </div>
      </div>
    </div>
  </div>
