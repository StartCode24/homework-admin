<script>
function submit_data() {
  var kelas_id = $( "#kelas_id" ).val();
  var kelas_name = $( "#kelas_name" ).val();
  var kelas_jurusan = $( "#kelas_jurusan" ).val();
  var kelas_sub = $( "#kelas_sub" ).val();
  if ($( "#kelas_name" ).val() === '' ) {
    swal("Tingkatan kelas Harus Diisi", "Isilah tingkatan kelas" , "info");
  } else if ($( "#kelas_jurusan" ).val() == '' ) {
    swal("Jurusan Harus Diisi", "Isilah data jurusan" , "info");
  } else if ($( "#kelas_sub" ).val() == '' ) {
    swal("Subkelas Harus Diisi", "Isilah data subkelas" , "info");
  } else {
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>Kelas/do_insert',
      data: 
          {
            kelas_id: kelas_id,
            kelas_name: kelas_name,
            kelas_jurusan: kelas_jurusan,
            kelas_sub: kelas_sub,
            
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
                                <option value="<?php echo $value['jurusan_id']?>"><?php echo $value['jurusan_singkat'] ?> - <?php echo $value['jurusan_name'] ?></option>
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
