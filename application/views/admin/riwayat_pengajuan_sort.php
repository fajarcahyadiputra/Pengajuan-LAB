<?php if(!$this->session->userdata('username')){ 

  redirect('auth');
}else{
  ?>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper" style="height: 500px" >
		<h3>Riwayat Pengajuan Berdasarkan Tanggal</h3>
		
		<form class="column mt-4" method="post">
			<div class="form-group col-6" >
				<label for="awal">Tanggal Awal</label>
				<input required="" type="date" name="awal" class="form-control"> 
			</div>
			<div class="form-group col-6">
				<label for="akhir">Tanggal Akhir</label>
				<input required="" type="date" name="akhir" class="form-control"> 
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-primary" id="tambah-lab">Cetak</button>
				<button type="reset" class="btn btn-danger tombol-reset ml-2">Reset</button>
			</div>
		</form>
    <!---Container Fluid-->
  </div>

<?php } ?>
