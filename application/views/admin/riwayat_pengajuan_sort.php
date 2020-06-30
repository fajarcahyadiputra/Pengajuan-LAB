<?php if(!$this->session->userdata('username')){ 

  redirect('auth');
}else{
  ?>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper" style="height: 500px" >
		<h3>Riwayat Pengajuan Berdasarkan Tanggal</h3>
		
		<form id="form-lab" class="column mt-4" method="post" name="form-lab">
			<div class="form-group col-6" >
				<label for="nama_lab">Tanggal Awal</label>
				<input required="" type="date" name="nama_lab" class="form-control" id="nama_lab"> 
			</div>
			<div class="form-group col-6">
				<label for="nama_lab">Tanggal Akhir</label>
				<input required="" type="date" name="nama_lab" class="form-control" id="nama_lab"> 
			</div>
			<div class="col-12">

				<button type="submit" class="btn btn-primary" id="tambah-lab">Tambahkan</button>
				<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
			</div>
		</form>
    <!---Container Fluid-->
  </div>

<?php } ?>
