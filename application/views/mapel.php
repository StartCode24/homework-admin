<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mapel</title>
	<link rel="stylesheet" href="">
	<style>
		
	</style>
</head>
<body>
	<table style="border-collapse: collapse; width: 50%;" border="1">
		<tr style="background-color: grey;">
			<th style="border: 1px solid black;">Kode Mapel</th>
			<th style="border: 1px solid black;">Mapel</th>
		</tr>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td><?php echo $value['mapel_id']; ?></td>
				<td><?php echo $value['mapelname']; ?></td>
		</tr>
		<?php } ?>		
	</table>
</body>
</html>