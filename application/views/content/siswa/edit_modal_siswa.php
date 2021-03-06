<!-- Modal -->
  <div id="myModaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
          <h4 class="modal-title">Edit Data Siswa</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Siswa/do_update" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Kode Siswa</label>
                              <input type="text" class="form-control border-input" readonly placeholder="kode" value="<?php echo $siswa_id; ?>" name="siswa_id">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nik Siswa</label>
                            <input type="text" required class="form-control border-input" placeholder="nik siswa" name="siswa_nik" value="<?php echo $siswa_nik; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" required class="form-control border-input" placeholder="nama siswa" name="siswaname" value="<?php echo $siswa_name; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" required class="form-control border-input" placeholder="alamat" name="alamat" value="<?php echo $siswa_alamat; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" required class="form-control border-input" placeholder="kelas" name="kelas" value="<?php echo $kelas_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" required class="form-control border-input" placeholder="jurusan" name="jurusan" value="<?php echo $jurusan_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" required class="form-control border-input" placeholder="password" name="password" value="<?php echo $siswa_password; ?>">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Note Siswa</label>
                              <textarea name="siswa_note" class="form-control border-input"><?php echo $siswa_note; ?></textarea>
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
