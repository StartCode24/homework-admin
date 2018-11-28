<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Jurusan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Jurusan/do_insert" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Kode Jurusan</label>
                              <input type="text" class="form-control border-input" readonly placeholder="kode" value="<?php echo $kode_unik; ?>" name="jurusan_id">
                          </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input type="text" required class="form-control border-input" placeholder="nama jurusan" name="jurusan_name">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Jurusan Kepala</label>
                            <input type="text" required class="form-control border-input" placeholder="nama kepala jurusan" name="jurusan_kepala">
                        </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <label>Note Jurusan</label>
                              <textarea name="jurusan_note" required rows="8" class="form-control border-input" cols="80"></textarea>
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
