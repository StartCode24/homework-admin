<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Jurusan</p>
            <!-- <a href="<?php echo base_url()?>Jurusan/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a> -->
            <a href="" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal">
              <span class="fa fa-plus-circle"></span>
              <b>Tambah Data</b>
              </a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Kode Jurusan</th>
			<th>Nama Jurusan</th>
			<th>Kepala Jurusan</th>
			<th>Note</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td class=""><?php echo $value['jurusan_id']; ?></td>
				<td class=""><?php echo $value['jurusan_name']; ?></td>
				<td class=""><?php echo $value['jurusan_kepala']; ?></td>
				<td class=""><?php echo $value['jurusan_note']; ?></td>
				<td class="">
          <button class="btn btn-warning btn-fill" onclick="_edit_guru('<?php echo $value['jurusan_id'];?>')">
               Edit
             </button>
             		||
					<button class="btn btn-danger" onclick="Swall_Delete_Jurusan('<?php echo $value['jurusan_id'];?> ')">Delete</button>
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
