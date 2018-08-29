
	<?php echo"<h1>". $this->session->flashdata('pesan') . "</h1>"; ?>
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
					<a href="<?php echo base_url()."index.php/crud/edit_data/".$value['mapel_id'];?>">Edit</a>
					||
					<a href="<?php echo base_url()."index.php/crud/do_delete/".$value['mapel_id'];?>">Delete</a>
				</td>
		</tr>
		<?php } ?>		
	</table>
	<a href="<?php echo base_url()?>index.php/crud/add_data">Tambah Data</a>
