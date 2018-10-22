<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Siswa</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<form method="POST" action="<?php echo base_url()?>Siswa/do_update">
		<table>
			<tr>
				<td>Kode Siswa</td>
				<td><input type="text" name="siswa_id"></td>
			</tr>
			<tr>
				<td>NIK Siswa</td>
				<td><input type="text" name="siswa_nik"></td>
			</tr>			
			<tr>
				<td>Nama Siswa</td>
				<td><input type="text" name="siswa_name"></td>
			</tr>
			<tr>
				<td>Alamat Siswa</td>
				<td><input type="text" name="siswa_alamat"></td>
			</tr>
			<tr>
				<td>Kelas Siswa</td>
				<td><input type="text" name="siswa_kelas"></td>
			</tr>						
			<tr>
				<td>Jurusan Siswa</td>
				<td><input type="text" name="siswa_jurusan"></td>
			</tr>
			<tr>
				<td>Password Siswa</td>
				<td><input type="text" name="siswa_password"></td>
			</tr>			
			<tr>
				<td>Note Siswa</td>
				<td><textarea name="siswa_note"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>