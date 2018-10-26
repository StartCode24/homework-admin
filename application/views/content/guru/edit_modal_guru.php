<!-- Modal -->
	<div id="myModaledit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
					<h4 class="modal-title">Edit Data Pegawai</h4>

				</div>
				<!-- body modal -->
				<div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url().'Guru/do_update';?>" method="post">
                  <div class="row">
										<div class="row">
	                      <div class="col-md-4">
	                          <div class="form-group">
	                              <label>Kode Guru</label>
	                              <input type="text" class="form-control border-input" readonly placeholder="kode" value="<?php echo $guru_id; ?>" name="guru_id">
	                          </div>
	                      </div>
	                      <div class="col-md-8">
	                        <div class="form-group">
	                            <label>Nama Guru</label>
	                            <input type="text" required class="form-control border-input" placeholder="nama guru" name="guruname" value="<?php echo $guruname; ?>">
	                        </div>
	                      </div>
	                  </div>

	                  <div class="row">
	                      <div class="col-md-4">
	                          <div class="form-group">
	                              <label>Jenis Kelamin</label>
	                              <select class="form-control" name="jns">
	                                <option>Laki-Laki</option>
	                                <option>Perempuan</option>
	                              </select>
	                          </div>
	                      </div>
	                      <div class="col-md-8">
	                          <div class="form-group">
	                              <label>Note Guru</label>
	                              <textarea name="guru_note" required rows="8" class="form-control border-input" cols="80"></textarea>
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
