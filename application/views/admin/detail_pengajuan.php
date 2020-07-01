<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{ ?>
<?php foreach($pengajuan as $pg) : ?>
	<div class="container-fluid">
		<div class="title">
			<h2 class="text-center mb-3">Detail Pengajuan</h2>
			<a href="<?php echo base_url('admin/report_pdf_pengajuan/').$pg->id?>" style="float: right; margin-bottom: 20px;" class="btn btn-success mr-4">Ekport PDF</a>
		</div>
		<hr>
		<form class="form-detail-pengajuan">
			<div class="form-group">
				<label>Kode Pengajuan</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->kode_pengajuan ?>">
			</div>
			<div class="form-group">
				<label>Kode LAB</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->kode_lab ?>">
			</div>
			<div class="form-group">
				<label>Kode Guru</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->kode_guru ?>">
			</div>
			<div class="form-group">
				<label>Nama Guru</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->nama_guru ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Pengajuan</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->tanggal_pengajuan ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Pemakain</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->tanggal_pemakaian?>">
			</div>
			<div class="form-group">
				<label>Batas Pemakaian</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->batas_pemakaian ?>">
			</div>
			<div class="form-group">
				<label>Kode Kelas</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->kode_kelas ?>">
			</div>
			<div class="form-group">
				<label>Kode Pelajaran</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->kode_matapelajaran ?>">
			</div>
			<div class="form-group">
				<label>Nomer HP</label>
				<input type="text" readonly="" class="form-control" value="<?php echo $pg->nohp_guru ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea rows="5" readonly="" class="form-control"><?php echo $pg->keterangan ?></textarea>
			</div>
			<div class="form-group">
				<img src="<?php echo base_url('upload/foto_guru/').$pg->foto_guru ?>" alt="" width="200">
			</div>
		</form>

	</div>
<?php endforeach ?>
<?php } ?>
