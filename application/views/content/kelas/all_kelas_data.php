<?php // debug_array($data); ?>
<style>
    .swal-footer {
        display: flex;
        justify-content: center;
    }
</style>
<script>
  function Swall_Edit_Kelas(kelas_id){
    var datam={"kelas_id":kelas_id};
    var base_url = $('#base').val();
    var base_url2=base_url+'Kelas/';


    // ajax
    jQuery.ajax({
      // url untuk menuju data yang akan di kirim
      url: base_url2+"edit_data",
      method : "POST",
      data:datam,
      success:function(data){

        jQuery('body').append(data);
        // untuk menampilkan modal berdasarkan edit
        jQuery('#myModaledit').modal('toggle');
        // untuk menghilangkan isi post agar kembali menjadi 0 pada variabel datam
        jQuery('#myModaledit').remove();
      },
      error:function(){
          swal ( "Oops" ,  "Something went wrong!" ,  "error" );
      }

    });
  }

  function Swall_Add_Kelas(){
    // untuk menampung isi data dari kelas id
    // var base_url = $('#base').val();
    // var base_url2=base_url+'Kelas/';


    // // ajax
    // jQuery.ajax({
    //   // url untuk menuju data yang akan di kirim
    //   url: base_url2+"do_insert",
    //   method : "POST",
    //   data:datam,
    //   success:function(data){

        // jQuery('body').append(data);
        // untuk menampilkan modal berdasarkan edit
        // jQuery('#myModaladd').modal('toggle');
        // // untuk menghilangkan isi post agar kembali menjadi 0 pada variabel datam
        // jQuery('#myModaladd').remove();
    //   },
    //   error:function(){
    //       // alert("something went wrong"+datam).console.error();
    //       swal ( "Oops" ,  "Something went wrong!" ,  "error" );
    //   }

    // });
  }
  function Swall_Delete_Kelas(kelas_id){
  //  var kd_kary=kd_kar;
    // alert('error hapus'+kd_kary);
    var base_url = $('#base').val();
    console.log(base_url);
    var base_url2=base_url+'Kelas/';
    swal({
      title: "Anda yakin?",
      text: "Data yang sudah terhapus tidak bisa dikembalikan lagi !",
      icon: "warning",
      buttons: true,
      dangerMode: true,

    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url:base_url2+"do_delete",
            type:"POST",
            data:{'kelas_id':kelas_id},

            success:function(){
              swal("Terhapus!", "Data Berhasil Dihapus.", {
                icon: "success",
              }).then((value) => {
                  window.location.reload();
                });

            },
            error:function(){
              alert('error hapus');
            }

          });

      } else {
        swal("Cancelled", "Data Tidak Jadi Dihapus");
      }
    });

    }
</script>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card card-stats">
					<div class="card-content">
						<p class="category">Kelas</p>
						<!-- <a href="<?php echo base_url()?>Room/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a> -->
			            <a href="" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModaladd">
			              <span class="fa fa-plus-circle"></span>
			              <b>Tambah Data</b>
			              </a>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
									<thead class=" text-primary">
										<tr>
											<th>ID</th>
											<th>Kelas Tingkatan</th>
											<th>Jurusan</th>
											<th>Sub</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data as $value) { ?>
											<tr>
												<td class=""><?php echo $value['kelas_id']; ?></td>
												<td class=""><?php echo $value['kelas_name']; ?></td>
												<td class=""><?php echo $value['jurusan_name']; ?></td>
												<td class=""><?php echo $value['kelas_sub']; ?></td>
												<td class="">
          <button class="btn btn-warning btn-fill" onclick="Swall_Edit_Kelas('<?php echo $value['kelas_id'];?>')">
               Edit
             </button>
													||
													<button class="btn btn-danger" onclick="Swall_Delete_Kelas('<?php echo $value['kelas_id'];?> ')">Delete</button>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card-footer">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
