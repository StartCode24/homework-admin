<!-- Modal -->
	<div id="myModaledit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
					<h4 class="modal-title">Edit Data Jurusan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Jurusan/do_update" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Kode Jurusan</label>
                              <input type="text" class="form-control border-input" readonly placeholder="kode" value="<?php echo $jurusan_id; ?>" name="jurusan_id">
                          </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input type="text" required class="form-control border-input" placeholder="nama jurusan" value="<?php echo $jurusan_name ?>" name="jurusan_name">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Jurusan Kepala</label>
                            <input type="text" required class="form-control border-input" placeholder="nama kepala jurusan" value="<?php echo $jurusan_kepala ?>" name="jurusan_kepala">
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
