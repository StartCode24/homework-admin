<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Kelas</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
          <div class="content">
              <form action="<?php echo base_url()?>Kelas/do_insert" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>ID Kelas</label>
                              <input type="text" id="kelas_id" class="form-control border-input" readonly placeholder="(autofill by system)" value="" name="kelas_id">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Kelas Tingkatan</label>
                            <select id="kelas_name" name="kelas_name" class="form-control border-input select-kelas-name">
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
                            <select id="kelas_jurusan" name="kelas_jurusan" class="form-control border-input select-jurusan">
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
                              <input type="text" id="kelas_sub" class="form-control border-input" placeholder="masukkan subkelas jika ada, contoh: A, B, C" value="" name="kelas_sub">
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
