<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Mata Pelajaran</p>
            <a href="<?php echo base_url()?>Mapel/add_data"><i class="fa fa-plus-circle"></i><h3 class="title">Tambah Data</h3></a>
            
	<table style="border-collapse: collapse; text-align: center;" class="table">
		<tr style="text-align: center;">
			<th>Kode Mapel</th>
			<th>Mapel</th>
			<th>Action</th>
		</tr>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td><?php echo $value['mapel_id']; ?></td>
				<td><?php echo $value['mapelname']; ?></td>
				<td align="center">
					<a href="<?php echo base_url()."Mapel/edit_data/".$value['mapel_id'];?>">Edit</a>
					||
					<a href="<?php echo base_url()."Mapel/do_delete/".$value['mapel_id'];?>">Delete</a>
				</td>
		</tr>
		<?php } ?>		
	</table>
          </div>
          <div class="card-footer">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>