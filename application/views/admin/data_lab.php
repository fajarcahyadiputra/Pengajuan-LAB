<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>

	<style>
		table tbody .aksi{
			display: flex;
			justify-content: space-around;
		}
	</style>
	<!-- Container Fluid-->
	<div class="container-fluid" id="container-wrapper">
		<a style="float: right" type="button" class="btn btn-outline-warning mb-4" data-toggle="modal" data-target="#modal-lab" ><i class="fas fa-user-plus"></i>Tambah LAB</a>
		<h1 class="mb-4">Data LAB</h1>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode LAB</th>
						<th>Nama LAB</th>
						<th>Fasilitas</th>
						<th>Apakah Aktif</th>
						<th>Keterangan</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($lab as $lb) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $lb->kode_lab ?></td>
						<td><?php echo $lb->nama_lab ?></td>
						<td><?php echo $lb->fasilitas ?></td>
						<td><p style="background-color: lightblue; width:50px; text-align: center;border-radius: 30px"><?php echo $lb->apakah_aktif ?></p></td>
						<td><textarea disabled="" readonly="" class="form-control" rows="3"><?php echo $lb->keterangan ?></textarea></td>
						<td><img width="100" height="100" src="../upload/foto_lab/<?php echo $lb->foto ?>" alt=""></td>
						<td>
							<div class="aksi">
								<button type="button" data-id="<?php echo $lb->id ?>" id="tombol-editlab" class="btn btn-primary"><i class="fa fa-edit"></i></button>
								<button type="button" data-foto="<?php echo $lb->foto ?>" data-id="<?php echo $lb->id ?>" id="tombol-hapuslab" class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<style>
	form{
		margin: 10px;
	}
	#tambah-lab{
		width: 135px;
	}
	.tombol-reset{
		width: 135px;
	}
	.tombol-close{
		width: 135px;
	}

</style>
<!-- Modal tambah-->
<div class="modal fade" id="modal-lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data LAB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-lab" method="post" name="form-lab">
					<div class="form-group">
						<label for="kode_lab">Kode LAB</label>
						<input required="" type="text" id="kode_lab" name="kode_lab" class="form-control" value="<?php echo $kode ?>" >
					</div>
					<div class="form-group">
						<label for="nama_lab">Nama LAB</label>
						<input required="" type="text" name="nama_lab" class="form-control" id="nama_lab"> 
					</div>
					<div class="form-group">
						<label for="fasilitas">Fasilitas</label>
						<input  required="" type="text" id="fasilitas" name="fasilitas" class="form-control">
					</div>
					<div class="form-group">
						<label for="apakah_aktif">Apakah Aktif</label>
						<select required="" id="apakah_aktif" name="apakah_aktif" class="form-control">
							<option value="aktif">Aktif</option>
							<option value="tidak">Tidak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea  class="form-control" name="keterangan" rows="3" cols="10"></textarea>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input  required="" type="file" id="foto" name="foto" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" id="tambah-lab">Tambahkan</button>
					<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
					<button type="button" class="btn btn-secondary tombol-close ml-2" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal tambah -->


<!-- Modal tambah-->
<div class="modal fade" id="modal-edit-lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data LAB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="penampung-edit-lab">
				
			</div>
		</div>
	</div>
</div>

<!-- end modal edit -->

<?php } ?>

