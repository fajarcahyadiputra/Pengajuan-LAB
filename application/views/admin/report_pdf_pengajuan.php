<?php if(!isset($kode_pengajuan)){ 

	redirect('auth');
}else{ ?>
<div class="container">
	<h4 style="text-align: center">Daftar Reservasi Laboratorium Komputer<br />SMPN NEGRI 1 WONOGIRI</h4>
	
	<br />
	<pre>
Kode Pengajuan : <?php echo $kode_pengajuan ?><br>
Kode LAB       : <?php echo $kode_lab ?><br>
kode Guru      : <?php echo $kode_guru ?><br>
	</pre>
	<hr>
	<table border="1" cellpadding="10" cellspacing="0" style="width: 100%">
		<thead  style="margin:10px; text-align: center">
			<tr>
				<th>Nama Guru</th>
				<th>Tanggal Pengajuan</th>
				<th>Tanggal Pemakaian</th>
				<th>Batas Pemakaian</th>
				<th>Nomer HP</th>
			</tr>
		</thead>
		<tbody  style=" text-align: center">
			<tr>
				<td><?php echo $nama_guru ?></td>
				<td><?php echo $tanggal_pengajuan ?></td>
				<td><?php echo $tanggal_pemakaian ?></td>
				<td><?php echo $batas_pemakaian ?></td>
				<td><?php echo $nohp_guru ?></td>
			</tr>
		</tbody>
	</table>
</div>

<?php } ?>


