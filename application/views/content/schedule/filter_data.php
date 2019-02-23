<?php // debug_array($data_jurusan); ?>
<style type="text/css" media="screen">
	input:hover{
		color: white !important;
		background-color:grey !important;
	}
	input:focus{
		color: white !important;
		background-color:grey !important;
	}
    .swal-footer {
        display: flex;
        justify-content: center;
    }
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function check_pilihan() {
	var jurusan = $( "p#jurusan_terpilih" ).val();
	var kelas = $( "p#kelas_terpilih" ).val();
	var subkelas = $( "p#subkelas_terpilih" ).val();
	var kelas_jurusan_subkelas = kelas+"_"+jurusan+"_"+subkelas;
	if ($( "p#jurusan_terpilih" ).val() == '' ) {
		swal("Pilihlah Jurusan", "Anda harus memilih salah satu jurusan" , "info");
	} else if ($( "#kelas_terpilih" ).val() == '' ) {
		swal("Pilihlah Kelas", "Anda harus memilih salah satu kelas" , "info");
	} else if ($( "#subkelas_terpilih" ).val() == '' ) {
		swal("Pilihlah Sub Kelas", "Anda harus memilih salah satu sub kelas" , "info");
	} else {
		 $.ajax({
		  type: 'POST',
		  url: '<?php echo base_url()?>Schedule/filter_data_view_schedule',
		  data: 
			    {
			      jurusan: jurusan,
			      kelas: kelas,
			      subkelas: subkelas
			    },
		  dataType: 'json',
		  success: function(d){
		   // alert(d.status); //will alert ok
			if (d.status === "ok") {
		      	swal("Data Valid", "Anda akan diteruskan ke laman schedule.", "success")
		      	// console.log(d.status);
		      	.then(
				  function() {
				    window.location.href = "<?php echo base_url()?>Schedule/view_schedule_day/"+kelas_jurusan_subkelas; 
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

function pilihJurusan(objButton) {
	var jurusan = objButton.id;
	var jurusan_desc = objButton.value;
	// swal("Terpilih", "Anda memilih jurusan : "+jurusan, "success");
	$( ".jurusan" ).hide( "slow", function() {});
	$( "#jurusan_terpilih" ).show( 0 );
	$( "#jurusan_terpilih" ).val( jurusan );
	$( "#jurusan_terpilih" ).text( jurusan_desc );
	$( "#jurusan_terpilih" ).append(" <button class='btn' onclick='ganti_jurusan()' style='transform: scale(0.8);'><b> Pilih Ulang</b></button>");
	
}
function ganti_jurusan() {
	$( ".jurusan" ).show( 0 );
	$( "#jurusan_terpilih" ).val( "" );
	$( "#jurusan_terpilih" ).hide( "slow", function() {});
}
function pilihKelas(objButton) {
	var kelas = objButton.value;
	// console.log(kelas);
	// swal("Terpilih", "Anda memilih kelas : "+kelas, "success");
  	$( ".kelas" ).hide( "slow", function() {});
  	$( "#kelas_terpilih" ).show( 0 );
	$( "#kelas_terpilih" ).val( kelas );
	$( "#kelas_terpilih" ).text( kelas );
	$( "#kelas_terpilih" ).append(" <button class='btn' onclick='ganti_kelas()' style='transform: scale(0.8);'><b> Pilih Ulang</b></button>");
	
}
function ganti_kelas() {
	$( ".kelas" ).show( 0 );
	$( "#kelas_terpilih" ).val( "" );
	$( "#kelas_terpilih" ).hide( "slow", function() {});
}
function pilihSubKelas(objButton) {
	var subkelas = objButton.value;
	// console.log(subkelas);
	// swal("Terpilih", "Anda memilih subkelas : "+subkelas, "success");
  	$( ".subkelas" ).hide( "slow", function() {});
  	$( "#subkelas_terpilih" ).show( 0 );
	$( "#subkelas_terpilih" ).val( subkelas );
	$( "#subkelas_terpilih" ).text( subkelas );
	$( "#subkelas_terpilih" ).append(" <button class='btn' onclick='ganti_subkelas()' style='transform: scale(0.8);'><b> Pilih Ulang</b></button>");
	
}
function ganti_subkelas() {
	$( ".subkelas" ).show( 0 );
	$( "#subkelas_terpilih" ).val( "" );
	$( "#subkelas_terpilih" ).hide( "slow", function() {});
}
</script>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card card-stats">
					<div class="card-content">
						<p class="category">Pilih Jurusan & Kelas</p>
						<div class="card-body">
							<h3>Pilih Jurusan</h3>
							<p id="jurusan_terpilih" value=""></p>
							<div class="jurusan">
								<?php foreach ($data_jurusan as $jurusan) { //debug_array($value, true); ?>
									<input type="button" onclick='pilihJurusan(this)' id="<?php echo $jurusan['jurusan_id']; ?>" name="<?php echo $jurusan['jurusan_name']; ?>" class="btn btn_jurusan" style="background-color: white; color: black;" value="<?php echo $jurusan['jurusan_name']; ?>" style="margin: 1em;"></input>
								<?php } ?>
							</div>
							<h3>Pilih Kelas</h3>
							<p id="kelas_terpilih" value=""></p>
							<div class="kelas">
									<input type="button" onclick='pilihKelas(this)' id="10" name="10" class="btn btn_kelas" style="background-color: white; color: black;" value="10" style="margin: 1em;"></input>
									<input type="button" onclick='pilihKelas(this)' id="11" name="11" class="btn btn_kelas" style="background-color: white; color: black;" value="11" style="margin: 1em;"></input>
									<input type="button" onclick='pilihKelas(this)' id="12" name="12" class="btn btn_kelas" style="background-color: white; color: black;" value="12" style="margin: 1em;"></input>
							</div>
							<h3>Pilih Sub Kelas</h3>
							<p id="subkelas_terpilih" value=""></p>
							<div class="subkelas">
								<input type="button" onclick='pilihSubKelas(this)' id="_" name="button_subkelas__" class="btn btn_subkelas" style="background-color: white; color: black;" value="_" style="margin: 1em;">
								</input>
								<input type="button" onclick='pilihSubKelas(this)' id="A" name="button_subkelas_A" class="btn btn_subkelas" style="background-color: white; color: black;" value="A" style="margin: 1em;">
								</input>
								<input type="button" onclick='pilihSubKelas(this)' id="B" name="button_subkelas_B" class="btn btn_subkelas" style="background-color: white; color: black;" value="B" style="margin: 1em;">
								</input>
								<input type="button" onclick='pilihSubKelas(this)' id="C" name="button_subkelas_C" class="btn btn_subkelas" style="background-color: white; color: black;" value="C" style="margin: 1em;">
								</input>
								<input type="button" onclick='pilihSubKelas(this)' id="D" name="button_subkelas_D" class="btn btn_subkelas" style="background-color: white; color: black;" value="D" style="margin: 1em;">
								</input>
							</div>
						</div>
						<button class='btn btn-primary' onclick='check_pilihan()' style='transform: scale(0.9);'><b>Lanjutkan</b></button>
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

