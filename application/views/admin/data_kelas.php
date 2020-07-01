<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>

	<style>
		form{
			margin: 10px;
		}
		#tambah-guru{
			width: 135px;
		}
		.tombol-reset{
			width: 135px;
		}
		.tombol-close{
			width: 135px;
		}
		table .tombol-aksi{
			display: flex;
			justify-content: space-around;
		}

	</style>

	<!-- Container Fluid-->
	<div class="container-fluid" id="container-wrapper">
		<div class="d-flex justify-content-between">
			<h1 class="mb-4">Data Kelas</h1>
			<div class="d-flex">
				

				<a type="button" style="height: 38px" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#modal-kelas" ><i class="fas fa-user-plus"></i>Tambah Kelas</a>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped responsive" id="datatable" style="width: 100%">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="text-align: center">
					<?php $no=1; foreach($kelas as $gr) :?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $gr->nama_kelas ?></td>
						<td>
							<div class="tombol-aksi">	
								<a href="<?= base_url('admin/hapus_kelas/'.$gr->kode_kelas) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url('admin/tambah_kelas') ?>">
					<div class="form-group">
						<label>Nama Kelas</label>
						<input required="" type="text" name="nama_kelas" class="form-control"> 
					</div>
					<button type="submit" class="btn btn-primary">Tambahkan</button>
					<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
					<button type="button" class="btn btn-secondary tombol-close" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah data -->


<?php } ?>



