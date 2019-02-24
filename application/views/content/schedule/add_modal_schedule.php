<style>
  div.modal-body {
    padding-top: 0px !important;
  }
</style>

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
              <form action="<?php echo base_url()?>Schedule/do_insert" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Schedule ID</label>
                              <input type="text" class="form-control border-input" readonly value="" name="schedule_id" placeholder="(autofill by system)" style="font-size: 0.5em;">
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="time" required class="form-control border-input" placeholder="start_time" name="start_time" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Finish Time</label>
                            <input type="time" required class="form-control border-input" placeholder="finish_time" name="finish_time" value="">
                        </div>
                      </div>
                  </div>
                      
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Day</label>
                            <input type="text" readonly required class="form-control border-input" placeholder="day" name="day" value="Senin">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jam Awal</label>
                            <input type="number" min="0" max="10" required class="form-control border-input" placeholder="jam ke- (awal)" name="jam mulai" value="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jam Akhir</label>
                            <input type="number" min="0" max="10" required class="form-control border-input" placeholder="jam ke- (akhir)" name="jam akhir" value="">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label>Guru</label>
                            <select name="guru_id" class="form-control border-input select-guru">
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
                            <select name="mapel_id" class="form-control border-input select-mapel">
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
                            <select name="room_id" class="form-control border-input select-room">
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
                              <textarea name="note" class="form-control border-input"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control border-input" readonly value="<?php echo $kelas;?>" name="kelas" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" class="form-control border-input" readonly value="<?php echo $jurusan;?>_<?php echo $jurusan_describe;?>" name="jurusan" placeholder="(autofill by system)">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Subkelas</label>
                            <input type="text" class="form-control border-input" readonly value="<?php echo $subkelas;?>" name="subkelas" placeholder="(autofill by system)">
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
