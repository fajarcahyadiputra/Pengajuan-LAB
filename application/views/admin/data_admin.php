<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>
	<style>	
		form{
			margin: 10px;
		}
		#tambah-admin{
			width: 135px;
		}
		.tombol-reset{
			width: 135px;
		}
		.tombol-close{
			width: 135px;
		}
		.aksi{
			display: flex;
			justify-content: space-around;
		}
	</style>
	<!-- Container Fluid-->
	<div class="container-fluid" id="container-wrapper">
		<a style="float: right" type="button" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#modal-admin" ><i class="fas fa-user-plus"></i>Tambah Admin</a>
		<h1 class="mb-3">DATA ADMIN</h1>	
		<table class="table table-hover table-bordered table-striped" id="datatable" >
			<thead>
				<tr>
					<th width="5%">No</th>
					<th>Kode User</th>
					<th>Nama User</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>NO HP</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $no=1; foreach ($admin as $ad): ?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $ad->kode_user ?></td>
					<td><?php echo $ad->nama ?></td>
					<td><?php echo $ad->username ?></td>
					<td><?php echo $ad->text_password ?></td>
					<td><?php echo $ad->email ?></td>
					<td><?php echo $ad->no_hp ?></td>
					<td>
						<div class="aksi">
							<button id="tombol-editAdmin" data-id="<?php echo $ad->kode_user ?>" class="btn btn-primary"><i class="fa fa-edit"></i></button>
							<button id="tombol-hapusAdmin" data-id="<?php echo $ad->kode_user ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
						</div>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
</div>


<!-- Modal tambah-->
<div class="modal fade" id="modal-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-admin" method="post">
					<div class="form-group">
						<label for="kode_user">Kode Admin</label>
						<input required="" type="text" id="kode_user" name="kode_user" class="form-control" value="<?php echo $kode ?>" >
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input required="" type="text" name="nama" class="form-control" id="nama"> 
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input  required="" type="email" id="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="status_aktif">Status Aktif</label>
						<select id="status_aktif" name="status_aktif" class="form-control">
							<option value="" disabled="" selected="" hidden="">Pilih Status Aktif</option>
							<option value="aktif">Aktif</option>
							<option value="tidak">Tidak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input  required="" type="text" id="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input  required="" type="text" id="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="no_hp">No HP</label>
						<input  required="" type="number" id="no_hp" name="no_hp" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" id="tambah-admin">Tambahkan</button>
					<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
					<button type="button" class="btn btn-secondary tombol-close ml-2" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah data -->

<!-- Modal edit-->
<div class="modal fade" id="modal-edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="penampung-edit-admin">

			</div>
		</div>
	</div>
</div>
<!-- end modal edit data -->

<?php } ?>