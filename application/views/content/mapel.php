<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-content">
            <p class="category">Mata Pelajaran</p>
            <a href="<?php echo base_url()?>Mapel/add_data"><h3 class="title"><i class="fa fa-plus-circle"></i>Tambah Data</h3></a>
            <div class="card-body">
       <div class="table-responsive">     
	<table class="table">
		<thead class=" text-primary">
		<tr>
			<th>Kode Mapel</th>
			<th>Mapel</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $value) { ?>
		<tr>
				<td class=""><?php echo $value['mapel_id']; ?></td>
				<td class=""><?php echo $value['mapelname']; ?></td>
				<td class="">
					<a href="<?php echo base_url()."Mapel/edit_data/".$value['mapel_id'];?>">Edit</a>
					||
					<a href="<?php echo base_url()."Mapel/do_delete/".$value['mapel_id'];?>" onClick="doconfirm()">Delete</a>
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

<script>
function doconfirm()
{
	swal({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.value) {
	    swal(
	      'Deleted!',
	      'Your file has been deleted.',
	      'success'
	    )
	  }
	})
}
</script>