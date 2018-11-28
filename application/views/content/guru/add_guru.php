<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Guru</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<form method="POST" action="<?php echo base_url()?>Guru/do_insert">
		<table>
			<tr>
				<td>Kode Guru</td>
				<td><input type="text" name="guru_id"></td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td><input type="text" name="guruname"></td>
			</tr>
			<tr>
				<td>Note Guru</td>
				<td><textarea name="guru_note"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>