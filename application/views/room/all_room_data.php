<?php echo "string"; ?>
<div class="mapel-data">
	<table style="border-collapse: collapse; width: 50%;" border="1">
		<tr style="background-color: grey;">
			<th style="border: 1px solid black;">Kode Room</th>
			<th style="border: 1px solid black;">Room</th>
			<th style="border: 1px solid black;">Note</th>
			<th style="border: 1px solid black;">Action</th>
		</tr>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td><?php echo $value['room_id']; ?></td>
				<td><?php echo $value['roomname']; ?></td>
				<td><?php echo $value['room_note']; ?></td>
				<td align="center">
					<a href="<?php echo base_url()."Room/edit_data/".$value['room_id'];?>">Edit</a>
					||
					<button class="btn btn-danger" onclick="Swall_Delete('<?php echo $value['room_id'];?> ')">Delete</button>
				</td>
		</tr>
		<?php } ?>		
	</table>
	<a href="<?php echo base_url()?>Room/add_data">Tambah Data</a>
</div>