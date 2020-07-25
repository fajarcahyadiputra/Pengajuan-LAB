<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>
	<div class="container-fluid">
		<div class="d-flex justify-content-between">
			<h1 class="mb-4">Data Riwayat Pengajuan LAB</h1>
			
			<div>
				Kode Lab: 
				<select style="height: 38px" onchange="window.location.href=`<?= base_url('/admin/riwayat_pengajuan') ?>/${this.value}`">
					<option <?= empty($kode_lab) ? "selected" : null ?> value="">
						Semua
					</option>
					
					<?php foreach($kd_lab as $pn): ?>
					<option <?= $kode_lab == $pn->kode_lab ? "selected" : null ?> value="<?= $pn->kode_lab ?>" >
						<?= $pn->kode_lab ?>	
					</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped" id="datatable" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Pengajuan</th>
					<th>Kode LAB</th>
					<th>Nama Guru</th>
					<td>Waktu Pengajuan</td>
					<th>Tanggal pemakaian LAB</th>
					<th>Mata Pelajaran</th>
					<th>jam Pemakaian</th>
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
					<td><?php echo $this->db->get_where('tb_pelajaran',['kode_matapelajaran' => $pn->kode_matapelajaran])->row()->mata_pelajaran; ?></td>
					<td><?php echo $pn->jam_pemakaian ?></td>
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

<script>
	function optionOnclick(value) {
		return window.location.href=`<?= base_url('/admin/riwayat_pengajuan') ?>/${value}`
	}
</script>
