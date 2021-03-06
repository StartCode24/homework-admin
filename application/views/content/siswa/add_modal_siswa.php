<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Siswa</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Siswa/do_insert" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Kode Siswa</label>
                              <input type="text" class="form-control border-input" readonly placeholder="kode" value="<?php echo $kode_unik; ?>" name="siswa_id">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nik Siswa</label>
                            <input type="text" required class="form-control border-input" placeholder="nik siswa" name="siswa_nik">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" required class="form-control border-input" placeholder="nama siswa" name="siswaname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" required class="form-control border-input" placeholder="alamat" name="alamat">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" required class="form-control border-input" placeholder="kelas" name="kelas">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" required class="form-control border-input" placeholder="jurusan" name="jurusan">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" required class="form-control border-input" placeholder="password" name="password">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Note Siswa</label>
                              <textarea name="siswa_note" class="form-control border-input"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <input type="submit" class="btn btn-info btn-fill btn-wd" value="Simpan Data"  >
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
