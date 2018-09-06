<div class="mapel-data">
	<table style="border-collapse: collapse; width: 50%;" border="1">
		<tr style="background-color: grey;">
			<th style="border: 1px solid black;">Kode Guru</th>
			<th style="border: 1px solid black;">Guru</th>
			<th style="border: 1px solid black;">Note</th>
			<th style="border: 1px solid black;">Action</th>
		</tr>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td><?php echo $value['guru_id']; ?></td>
				<td><?php echo $value['guruname']; ?></td>
				<td><?php echo $value['guru_note']; ?></td>
				<td align="center">
					<a href="<?php echo base_url()."Guru/edit_data/".$value['guru_id'];?>">Edit</a>
					||
					<button class="btn btn-danger" onclick="Swall_Delete_Guru('<?php echo $value['guru_id'];?> ')">Delete</button>
				</td>
		</tr>
		<?php } ?>		
	</table>
	<a href="<?php echo base_url()?>Guru/add_data">Tambah Data</a>
</div>