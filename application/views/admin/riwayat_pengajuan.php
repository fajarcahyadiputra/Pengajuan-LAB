<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>
	<div class="container-fluid">
		<h1 class="mb-4">Data Riwayat Pengajuan LAB</h1>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped" id="datatable" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Pengajuan</th>
					<th>Kode LAB</th>
					<th>Nama Guru</th>
					<td>Waktu Pengajuan</td>
					<th>waktu pengajuan LAB</th>
					<th>Batas Pengajuan LAB</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;  foreach($riwayat as $pn) :?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $pn->kode_pengajuan ?></td>
					<td><?php echo $pn->kode_lab ?></td>
					<td><?php echo $pn->nama_guru ?></td>
					<td><?php echo $pn->tanggal_pengajuan ?></td>
					<td><?php echo $pn->tanggal_pemakaian ?></td>
					<td><?php echo $pn->batas_pemakaian ?></td>
					<td>
						<button type="button" id="tombol-detail-riwayat-pengajuan" data-id="<?php echo $pn->kode_pengajuan ?>" class="btn btn-info btn-sm"><i class="fa fa-info"></i></button>
						<button class="btn btn-danger btn-sm" data-id="<?php echo $pn->id ?>" id="tombol-hapus-riwayat-pengajuan"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</div>

<?php } ?>



<!-- Modal tambah-->
<div class="modal fade" id="modal-detai-riwayat-pengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="penampung-detail-riwayat-pengajuan" style="margin:10px">

			</div>
		</div>
	</div>
</div>
<!-- end modal edit data -->