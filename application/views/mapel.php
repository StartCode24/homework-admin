<div class="mapel-data">
	<table style="border-collapse: collapse; width: 50%;" border="1">
		<tr style="background-color: grey;">
			<th style="border: 1px solid black;">Kode Mapel</th>
			<th style="border: 1px solid black;">Mapel</th>
			<th style="border: 1px solid black;">Action</th>
		</tr>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td><?php echo $value['mapel_id']; ?></td>
				<td><?php echo $value['mapelname']; ?></td>
				<td align="center">
					<a href="<?php echo base_url()."Mapel/edit_data/".$value['mapel_id'];?>">Edit</a>
					||
					<button class="btn btn-danger" onclick="Swall_Delete('<?php echo $value['mapel_id'];?> ')">Delete</button>
				</td>
		</tr>
		<?php } ?>		
	</table>
	<a href="<?php echo base_url()?>Mapel/add_data">Tambah Data</a>
</div>