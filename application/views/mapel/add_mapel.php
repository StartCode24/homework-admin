<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Mapel</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<form method="POST" action="<?php echo base_url()?>Mapel/do_insert">
		<table>
			<tr>
				<td>Kode Mapel</td>
				<td><input type="text" name="mapel_id"></td>
			</tr>
			<tr>
				<td>Nama Mapel</td>
				<td><input type="text" name="mapelname"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>