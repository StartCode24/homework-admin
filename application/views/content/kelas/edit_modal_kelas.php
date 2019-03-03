<?php // debug_array($data); ?>
<!-- Modal -->
  <div id="myModaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
          <h4 class="modal-title">Edit Data Kelas</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Kelas/do_update" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>ID Kelas</label>
                              <input type="text" id="kelas_id_update" class="form-control border-input" readonly placeholder="(autofill by system)" value="<?php echo $kelas_id ?>" name="kelas_id_update">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Kelas Tingkatan</label>
                            <select id="kelas_name_update" name="kelas_name_update" class="form-control border-input select-kelas-name">
                              <option value="<?php echo $kelas_name ?>" selected><?php echo $kelas_name ?></option>
                              <option value="">---</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                            <label>Jurusan</label>
                            <select id="kelas_jurusan_update" name="kelas_jurusan_update" class="form-control border-input select-jurusan">
                                <option value="<?php echo $kelas_jurusan ?>" selected><?php echo $kelas_jurusan_name ?></option>
                                <option value="">---</option>
                              <?php foreach ($data_jurusan as $value) { //print_r($value);?>
                                <option value="<?php echo $value['jurusan_id']?>"><?php echo $value['jurusan_name'] ?></option>
                              <?php } ?>
                            </select>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Subkelas</label>
                              <input type="text" id="kelas_sub_update" class="form-control border-input" placeholder="masukkan subkelas jika ada, contoh: A, B, C" value="<?php echo $kelas_sub ?>" name="kelas_sub_update">
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
