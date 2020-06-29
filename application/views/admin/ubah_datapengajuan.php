<?php if(!$this->session->userdata('username')){ 

	redirect('auth');
}else{ ?>
	<div class="container-fluid">
	<a class="btn btn-info mb-2" href="<?php echo base_url('admin/request_lab') ?>">Back</a>
	<hr>
	<form action="<?php echo base_url('admin/edit_datapengajuan') ?>" method="post">
	<div class="form-group">
	<label for="kode_pengajuan">Kode Pengajuan</label>
	<input type="text" name="kode_pengajuan" id="kode_pengajuan" class="form-control" value="<?php echo $kode_pengajuan ?>">
	<input type="text" hidden="" name="id"  value="<?php echo $id ?>">
	</div>
	<div class="form-group">
	<label for="kode_lab">Kode LAB</label>
	<input type="text" name="kode_lab" id="kode_lab" class="form-control" value="<?php echo $kode_lab ?>">
	</div>
	<div class="form-group">
	<label for="kode_guru">Kode Guru</label>
	<input type="text" name="kode_guru" id="kode_guru" class="form-control" value="<?php echo $kode_guru ?>">
	</div>
	<div class="form-group">
	<label for="nama_guru">Nama Guru</label>
	<input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?php echo $nama_guru ?>">
	</div>
	<div class="form-group">
	<label for="tanggal_pengajuan">Tanggal Pengajuan</label>
	<input type="text" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control" value="<?php echo $tanggal_pengajuan ?>">
	</div>
	<div class="form-group">
	<label for="tanggal_pemakaian">Tanggal Pemakaian</label>
	<input type="text" name="tanggal_pemakaian" id="tanggal_pemakaian" class="form-control" value="<?php echo $tanggal_pemakaian ?>">
	</div>
	<div class="form-group">
	<label for="batas_pemakaian">Batas Pemakaian</label>
	<input type="text" name="batas_pemakaian" id="batas_pemakaian" class="form-control" value="<?php echo $batas_pemakaian ?>">
	</div>
	<div class="form-group">
	<label for="no_hp">Nomer HP</label>
	<input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $nohp_guru ?>">
	</div>
	<div class="form-group">
	<label for="ketrangan">Keterangan</label>
	<textarea name="keterangan" rows="3" class="form-control"><?php echo $keterangan ?></textarea>
</div>
<button class="btn btn-success" type="submit">Edit</button>
</form>
</div>

<?php } ?>