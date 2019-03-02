<?php // debug_array($data_jurusan); ?>
<style>
  div.modal-body {
    padding-top: 0px !important;
  }

    .swal-footer {
        display: flex !important;
        justify-content: center !important;
    }
</style>
<script>
function submit_updated_data() {
  var kelas_id_update = $( "#kelas_id_update" ).val();
  var kelas_name_update = $( "#kelas_name_update" ).val();
  var kelas_jurusan_update = $( "#kelas_jurusan_update" ).val();
  var kelas_sub_update = $( "#kelas_sub_update" ).val();
  if ($( "#kelas_name_update" ).val() == '' ) {
    swal("Tingkatan Kelas Harus Diisi", "Isilah data tingkatan kelas" , "info");
  } else if ($( "#kelas_jurusan_update" ).val() == '' ) {
    swal("Jurusan Harus Diisi", "Isilah data jurusan kelas" , "info");
  } else {
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>Kelas/do_update',
      data: 
          {
            kelas_id_update: kelas_id_update,
            kelas_name_update: kelas_name_update,
            kelas_jurusan_update: kelas_jurusan_update,
            kelas_sub_update: kelas_sub_update
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
  <div id="#myModaledit" class="modal fade" role="dialog">
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
                              <label>Kode Kelas</label>
                              <input type="text" id="kelas_id_update" class="form-control border-input" readonly placeholder="(autofill by system)" value="" name="kelas_id_update">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Kelas Tingkatan</label>
                            <select id="kelas_name_update" name="kelas_name_update" class="form-control border-input select-kelas-name">
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
                              <input type="text" id="kelas_sub_update" class="form-control border-input" placeholder="masukkan subkelas jika ada, contoh: A, B, C" value="" name="kelas_sub_update">
                          </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <input type="button" class="btn btn-info btn-fill btn-wd" value="Simpan Data" onclick="submit_updated_data()">
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
