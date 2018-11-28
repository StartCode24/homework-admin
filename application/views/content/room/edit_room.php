<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Room</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<form method="POST" action="<?php echo base_url()?>Room/do_update">
		<table>
			<tr>
				<td>Kode Room</td>
				<td><input type="text" name="room_id" value="<?php echo $room_id; ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Room</td>
				<td><input type="text" name="roomname" value="<?php echo $roomname; ?>"></td>
			</tr>
			<tr>
				<td>Note Room</td>
				<td><textarea name="room_note" value="<?php echo $room_note; ?>"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnSubmit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>