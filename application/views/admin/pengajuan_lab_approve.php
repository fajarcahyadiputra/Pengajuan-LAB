<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{
	?>
	<style>
		.aksi1{
			display: flex;
		}
		.aksi2{
			justify-content: center;
			display: flex;
		}
	</style>
	<div class="container-fluid">
		<h1 class="mb-4">Data Pengajuan Yang Sudah Di Setujui</h1>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped" id="datatable" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pengajuan</th>
						<th>Kode LAB</th>
						<th>Nama Guru</th>
						<td>Waktu Pengajuan</td>
						<td>Pelajaran</td>
						<td>Kelas</td>
						<th>Tanggal pengajuan LAB</th>
						<th>Jam Pengajuan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;  foreach($pengajuan as $pn):
					$pelajaran = $this->db->get_where('tb_pelajaran', ['kode_matapelajaran' => $pn->kode_matapelajaran	])->row();
					$kelas  = $this->db->get_where('tb_kelas',['kode_kelas' => $pn->kode_kelas])->row();

					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $pn->kode_pengajuan ?></td>
						<td><?php echo $pn->kode_lab ?></td>
						<td><?php echo $pn->nama_guru ?></td>
						<td><?php echo $pn->tanggal_pengajuan ?></td>
						<td><?php echo $pelajaran->mata_pelajaran ?></td>
						<td><?php echo $kelas->nama_kelas ?></td>
						<td><?php echo $pn->tanggal_pemakaian ?></td>
						<td><?php echo $pn->jam_pemakaian ?></td>
						<td>
							<div class="aksi1">
								<a style="width:30px; height:30px" href="<?php echo base_url('admin/lihat_detail_pengajuan/').$pn->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-info"></i></a>
								<a style="width:30px; height:30px" href="<?php echo base_url('admin/ubah_datapengajuan/').$pn->id ?>" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i></a>
							</div>
							<div class="aksi2">
								<button style="width:30px; height:30px" type="button" id="tombol-hapuspengajuan" data-id="<?php echo $pn->id ?>" class="btn btn-danger btn-sm mt-2"><i class="fa fa-trash"></i></button>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<?php } ?>