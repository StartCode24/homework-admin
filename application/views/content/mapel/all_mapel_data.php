<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Mapel</p>
            <!-- <a href="<?php echo base_url()?>Mapel/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a> -->
            <a href="" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal">
              <span class="fa fa-plus-circle"></span>
              <b>Tambah Data</b>
              </a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Kode Mapel</th>
			<th>Mapel</th>
			<th>Note</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td class=""><?php echo $value['mapel_id']; ?></td>
				<td class=""><?php echo $value['mapelname']; ?></td>
				<td class=""><?php echo $value['mapel_note']; ?></td>
				<td class="">
					          <button class="btn btn-warning btn-fill" onclick="_edit_mapel('<?php echo $value['mapel_id'];?>')">
               Edit
             </button>
					||
					<button class="btn btn-danger" onclick="Swall_Delete_Mapel('<?php echo $value['mapel_id'];?> ')">Delete</button>
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
