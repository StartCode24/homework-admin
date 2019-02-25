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
function submit_data() {
  var schedule_id = $( "#schedule_id" ).val();
  var start_time = $( "#start_time" ).val();
  var finish_time = $( "#finish_time" ).val();
  var day = $( "#day" ).val();
  var jam_mulai = $( "#jam_mulai" ).val();
  var jam_akhir = $( "#jam_akhir" ).val();
  var guru_id = $( "#guru_id" ).val();
  var mapel_id = $( "#mapel_id" ).val();
  var room_id = $( "#room_id" ).val();
  var note = $( "#note" ).val();
  var kelas = $( "#kelas" ).val();
  var jurusan = $( "#jurusan" ).val();
  var subkelas = $( "#subkelas" ).val();
  var kelas_jurusan_subkelas = kelas+"_"+jurusan+"_"+subkelas;
  if ($( "#start_time" ).val() == '' ) {
    swal("Start Time Harus Diisi", "Isilah pukul berapa dimulainya pelajaran" , "info");
  } else if ($( "#finish_time" ).val() == '' ) {
    swal("Finish Time Harus Diisi", "Isilah pukul berapa selesainya pelajaran" , "info");
  } else if ($( "#jam_mulai" ).val() == '' ) {
    swal("Jam Mulai Harus Diisi", "Isilah jam ke- berapa dimulainya pelajaran" , "info");
  } else if ($( "#jam_akhir" ).val() == '' ) {
    swal("Jam Akhir Harus Diisi", "Isilah jam ke- berapa selesainya pelajaran" , "info");
  } else if ($( "#guru_id" ).val() == '' ) {
    swal("Data Guru Harus Diisi", "Isilah data guru yang mengajar" , "info");
  } else if ($( "#mapel_id" ).val() == '' ) {
    swal("Data Mapel Harus Diisi", "Isilah data mata pelajaran" , "info");
  } else if ($( "#room_id" ).val() == '' ) {
    swal("Data Ruangan Harus Diisi", "Isilah data ruangan" , "info");
  } else {
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>Schedule/do_insert',
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
<!-- Modal -->
  <div id="myModaladd" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
          <h4 class="modal-title">Add Data Schedule</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="content">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Schedule ID</label>
                              <input type="text" id="schedule_id" class="form-control border-input" readonly value="" name="schedule_id" placeholder="(autofill by system)" style="font-size: 0.5em;">
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="time" required id="start_time" class="form-control border-input" placeholder="start_time" name="start_time" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Finish Time</label>
                            <input type="time" required id="finish_time" class="form-control border-input" placeholder="finish_time" name="finish_time" value="">
                        </div>
                      </div>
                  </div>
                      
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Day</label>
                            <input type="text" readonly required id="day" class="form-control border-input" placeholder="day" name="day" value="<?php echo $day; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <input type="number" min="0" max="10" required id="jam_mulai" class="form-control border-input" placeholder="jam ke- (awal)" name="jam_mulai" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jam Akhir</label>
                            <input type="number" min="0" max="10" required id="jam_akhir" class="form-control border-input" placeholder="jam ke- (akhir)" name="jam_akhir" value="">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label>Guru</label>
                            <select id="guru_id" name="guru_id" class="form-control border-input select-guru">
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
                            <select id="mapel_id" name="mapel_id" class="form-control border-input select-mapel">
                              <option value="">---</option>
                            <?php foreach ($data_mapel as $value) { //print_r($value);?>
                              <option value="<?php echo $value['mapel_id']?>"><?php echo $value['mapelname'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Room</label>
                            <select id="room_id" name="room_id" class="form-control border-input select-room">
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
                              <textarea id="note" class="form-control border-input" name="note"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" id="kelas" class="form-control border-input" readonly value="<?php echo $kelas;?>" name="kelas" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" id="jurusan" class="form-control border-input" readonly value="<?php echo $jurusan;?>_<?php echo $jurusan_describe;?>" name="jurusan" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Subkelas</label>
                            <input type="text" id="subkelas" class="form-control border-input" readonly value="<?php echo $subkelas;?>" name="subkelas" placeholder="(autofill by system)">
                        </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-warning btn-fill btn-wd" onclick="submit_data()">Simpan Data</button>
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
