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
			<h1 class="mb-4">Data Guru</h1>
			<div class="d-flex">
				

				<a type="button" style="height: 38px" class="btn btn-outline-primary mb-4 mr-2" data-toggle="modal" data-target="#modal-import" ><i class="fas fa-user-plus"></i>Import Dari Excel</a>
				<a type="button" style="height: 38px" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#modal-guru" ><i class="fas fa-user-plus"></i>Tambah Guru</a>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped responsive" id="datatable" style="width: 100%">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Kode Guru</th>
						<th>Nama Guru</th>
						<th>Email</th>
						<th>Apakah Aktif</th>
						<th>No hp</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="text-align: center">
					<?php $no=1; foreach($guru as $gr) :?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $gr->kode_guru ?></td>
						<td><?php echo $gr->nama_guru ?></td>
						<td><?php echo $gr->email ?></td>
						<td ><p style="background-color: lightblue; width:50px;text-align: center;border-radius: 30px"><?php echo $gr->apakah_aktif ?></p></td>
						<td><?php echo $gr->no_hp ?></td>
						<td><img width="100" height="100" src="<?php echo base_url('upload/foto_guru/').$gr->foto ?>" alt=""></td>
						<td>
							<div class="tombol-aksi">	
								<button type="button" data-id="<?php echo $gr->id ?>" id="tombol-editguru" class="btn btn-primary"><i class="fa fa-edit"></i></button>
								<button type="button" data-foto="<?php echo $gr->foto ?>" data-id="<?php echo $gr->id ?>" id="tombol-hapusguru" class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="modal-guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-guru" method="post" name="form-guru">
					<div class="form-group">
						<label for="kode_guru">Kode Guru</label>
						<input required="" type="text" id="kode_guru" name="kode_guru" class="form-control" value="<?php echo $kode ?>" >
					</div>
					<div class="form-group">
						<label for="nama_guru">Nama Guru</label>
						<input required="" type="text" name="nama_guru" class="form-control" id="nama_guru"> 
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input  required="" type="email" id="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="apakah_aktif">Apakah Aktif</label>
						<select id="apakah_aktif" name="apakah_aktif" class="form-control">
							<option value="aktif">Aktif</option>
							<option value="tidak">Tidak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input  required="" type="text" id="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="no_hp">NO HP</label>
						<input  required="" type="text" id="no_hp" name="no_hp" class="form-control">
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input  required="" type="file" id="foto" name="foto" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" id="tambah-guru">Tambahkan</button>
					<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
					<button type="button" class="btn btn-secondary tombol-close" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah data -->

<!-- Modal tambah-->
<div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Import Data Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/import_data_guru') ?>" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label for="foto">Dokumen Excel</label>
						<input  required="" type="file" name="doc" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah data -->

<!-- Modal tambah-->
<div class="modal fade" id="modal-edit-guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="penampung-edit-guru">
						
			</div>
		</div>
	</div>
</div>
<!-- end modal edit data -->

<?php } ?>



