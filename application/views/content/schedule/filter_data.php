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
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function refresh_laman() {
	location.reload();
}
function check_pilihan() {
	if ($( "p#jurusan_terpilih" ).text() == '' ) {
		swal("Pilihlah Jurusan", "Anda harus memilih salah satu jurusan" , "info");
	} else if ($( "#kelas_terpilih" ).text() == '' ) {
		swal("Pilihlah Kelas", "Anda harus memilih salah satu kelas" , "info");
	} else {
		swal("Selamat", "Anda bisa melanjutkan ke proses selanjutnya", "success");
	}
}

function pilihJurusan(objButton) {
	var jurusan = objButton.value;
	swal("Terpilih", "Anda memilih jurusan : "+jurusan, "success");
	$( ".jurusan" ).hide( "slow", function() {});
	$( "#jurusan_terpilih" ).text( jurusan );
	$( "#jurusan_terpilih" ).append(" <button class='btn' onclick='ganti_jurusan()' style='transform: scale(0.8);'><b> Pilih Ulang</b></button>");
	
}
function ganti_jurusan() {
	$( ".jurusan" ).show( 0 );
	$( "#jurusan_terpilih" ).text( "" );
}
function pilihKelas(objButton) {
	var kelas = objButton.value;
	// console.log(kelas);
	swal("Terpilih", "Anda memilih kelas : "+kelas, "success");
  	$( ".kelas" ).hide( "slow", function() {});
	$( "#kelas_terpilih" ).text( kelas );
	$( "#kelas_terpilih" ).append(" <button class='btn' onclick='ganti_kelas()' style='transform: scale(0.8);'><b> Pilih Ulang</b></button>");
	
}
function ganti_kelas() {
	$( ".kelas" ).show( 0 );
	$( "#kelas_terpilih" ).text( "" );
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
							<p id="jurusan_terpilih"></p>
							<div class="jurusan">
								<?php foreach ($data_jurusan as $jurusan) { //debug_array($value, true); ?>
									<input type="button" onclick='pilihJurusan(this)' id="<?php echo $jurusan['jurusan_id']; ?>" name="<?php echo $jurusan['jurusan_name']; ?>" class="btn btn_jurusan" style="background-color: white; color: black;" value="<?php echo $jurusan['jurusan_name']; ?>" style="margin: 1em;"></input>
								<?php } ?>
							</div>
							<h3>Pilih Kelas</h3>
							<p id="kelas_terpilih"></p>
							<div class="kelas">
								<?php foreach ($data_kelas as $kelas) { //debug_array($value, true); ?>
									<input type="button" onclick='pilihKelas(this)' id="<?php echo $kelas['kelas_id']; ?>" name="button_<?php echo $kelas['kelas_name']; ?>" class="btn btn_kelas" style="background-color: white; color: black;" value="<?php echo $kelas['kelas_name']; ?>" style="margin: 1em;"></input>
								<?php } ?>
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

