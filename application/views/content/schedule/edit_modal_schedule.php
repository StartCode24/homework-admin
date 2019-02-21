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
              <form action="<?php echo base_url()?>Schedule/do_update" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Schedule ID</label>
                              <input type="text" class="form-control border-input" readonly value="<?php echo $schedule_id; ?>" name="schedule_id">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Schedule Date</label>
                            <input type="text" required class="form-control border-input" placeholder="schedule_date" name="schedule_date" value="<?php echo $schedule_date; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="text" required class="form-control border-input" placeholder="start_time" name="start_time" value="<?php echo $start_time; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Finish Time</label>
                            <input type="text" required class="form-control border-input" placeholder="finish_time" name="finish_time" value="<?php echo $finish_time; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Day</label>
                            <input type="text" required class="form-control border-input" placeholder="day" name="day" value="<?php echo $day; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jam Ke</label>
                            <input type="text" required class="form-control border-input" placeholder="jam_ke" name="jam_ke" value="<?php echo $jam_ke; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Note</label>
                              <textarea name="note" class="form-control border-input"><?php echo $note; ?></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Guru ID</label>
                            <input type="text" required class="form-control border-input" placeholder="guru_id" name="guru_id" value="<?php echo $guru_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Mapel ID</label>
                            <input type="text" required class="form-control border-input" placeholder="mapel_id" name="mapel_id" value="<?php echo $mapel_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas ID</label>
                            <input type="text" required class="form-control border-input" placeholder="kelas_id" name="kelas_id" value="<?php echo $kelas_id; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan ID</label>
                            <input type="text" required class="form-control border-input" placeholder="jurusan_id" name="jurusan_id" value="<?php echo $jurusan_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Room ID</label>
                            <input type="text" required class="form-control border-input" placeholder="room_id" name="room_id" value="<?php echo $room_id; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-warning btn-fill btn-wd">Simpan Data</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
          </div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->
        </div>
      </div>
    </div>
  </div>
