<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Guru</p>
            <a href="<?php echo base_url()?>Guru/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a>
            <div class="card-body">
       <div class="table-responsive">
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Kode Guru</th>
			<th>Guru</th>
			<th>Note</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td class=""><?php echo $value['guru_id']; ?></td>
				<td class=""><?php echo $value['guruname']; ?></td>
				<td class=""><?php echo $value['guru_note']; ?></td>
				<td class="">
					<a href="<?php echo base_url()."Guru/edit_data/".$value['guru_id'];?>">Edit</a>
					||
					<button class="btn btn-danger" onclick="Swall_Delete_Guru('<?php echo $value['guru_id'];?> ')">Delete</button>
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
