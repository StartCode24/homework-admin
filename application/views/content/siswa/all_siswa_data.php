<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Siswa</p>
            <a href="<?php echo base_url()?>Siswa/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Kode Siswa</th>
			<th>Nik Siswa</th>
			<th>Nama Siswa</th>
			<th>Alamat</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Password</th>
			<th>Note</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td class=""><?php echo $value['siswa_id']; ?></td>
				<td class=""><?php echo $value['siswa_nik']; ?></td>
				<td class=""><?php echo $value['siswa_name']; ?></td>
				<td class=""><?php echo $value['siswa_alamat']; ?></td>
				<td class=""><?php echo $value['siswa_kelas']; ?></td>
				<td class=""><?php echo $value['siswa_jurusan']; ?></td>
				<td class=""><?php echo $value['siswa_password']; ?></td>
				<!-- <td class=""><?php// echo $value['siswa_note']; ?></td> -->
				<td class="">
					<a href="<?php echo base_url()."Siswa/edit_data/".$value['siswa_id'];?>">Edit</a>
					||
					<button class="btn btn-danger" onclick="Swall_Delete_Siswa('<?php echo $value['siswa_id'];?> ')">Delete</button>
				</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
</div>
          </div>
          <div class="card-footer">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
