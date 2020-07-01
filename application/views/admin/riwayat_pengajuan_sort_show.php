
<div class="container">
<h4 style="text-align: center">Daftar Reservasi Laboratorium Komputer<br />SMPN NEGRI 1 WONOGIRI</h4>

<br />
<hr>
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%">
	<thead  style="margin:10px; text-align: center">
		<tr>
			<th>Kode Pengajuan</th>
			<th>Kode Lab</th>
			<th>Nama Guru</th>
			<th>Tanggal Diajukan</th>
			<th>Tanggal Dipakai</th>
			<th>Sampai Tanggal</th>
			<th>Kode Kelas</th>
			<th>Kode Pelajaran</th>
		</tr>
	</thead>
	<tbody  style=" text-align: center">
		<?php foreach($riwayat as $value): ?>
		<tr>
			<td><?php echo $value->kode_pengajuan ?></td>
			<td><?php echo $value->kode_lab ?></td>
			<td><?php echo $value->nama_guru ?></td>
			<td><?php echo $value->tanggal_pengajuan ?></td>
			<td><?php echo $value->tanggal_pemakaian ?></td>
			<td><?php echo $value->batas_pemakaian ?></td>
			<td><?php echo $value->kode_kelas ?></td>
			<td><?php echo $value->kode_matapelajaran ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
