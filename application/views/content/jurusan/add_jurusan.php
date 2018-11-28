<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Jurusan</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<form method="POST" action="<?php echo base_url()?>Jurusan/do_insert">
		<table>
			<tr>
				<td>Kode Jurusan</td>
				<td><input type="text" name="jurusan_id"></td>
			</tr>
			<tr>
				<td>Nama Jurusan</td>
				<td><input type="text" name="jurusan_name"></td>
			</tr>
			<tr>
				<td>Jumlah Kelas Jurusan</td>
				<td><input type="text" name="jurusan_jumlah_kelas"></td>
			</tr>			
			<tr>
				<td>Kepala Jurusan</td>
				<td><input type="text" name="jurusan_kepala"></td>
			</tr>			
			<tr>
				<td>Note Jurusan</td>
				<td><textarea name="jurusan_note"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>