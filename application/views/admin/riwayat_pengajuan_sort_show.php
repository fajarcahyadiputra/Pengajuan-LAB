
<div class="container">
	<h4 style="text-align: center">Daftar Reservasi Laboratorium Komputer<br />SMPN NEGRI 1 WONOGIRI</h4>

	<br />
	<p>Dari Tanggal : <?php echo $tanggal ?></p>
	<hr>
	<table border="1" cellpadding="10" cellspacing="0" style="width: 100%">
		<thead  style="margin:10px; text-align: center">
			<tr>
				<th>Kode Pengajuan</th>
				<th>Kode Lab</th>
				<th>Nama Guru</th>
				<th>Tanggal Diajukan</th>
				<th>Tanggal Dipakai</th>
				<th>Jam Pemakaian</th>
				<th>Kode Kelas</th>
				<th>Kode Pelajaran</th>
			</tr>
		</thead>
		<tbody  style=" text-align: center">
			<?php foreach($riwayat as $value): 
				$pelajaran = $this->db->get_where('tb_pelajaran', ['kode_matapelajaran' => $value->kode_matapelajaran	])->row();
				$kelas  = $this->db->get_where('tb_kelas',['kode_kelas' => $value->kode_kelas])->row();
				?>
				<tr>
					<td><?php echo $value->kode_pengajuan ?></td>
					<td><?php echo $value->kode_lab ?></td>
					<td><?php echo $value->nama_guru ?></td>
					<td><?php echo $value->tanggal_pengajuan ?></td>
					<td><?php echo $value->tanggal_pemakaian ?></td>
					<td><?php echo $value->jam_pemakaian ?></td>
					<td><?php echo $pelajaran->mata_pelajaran ?></td>
					<td><?php echo $kelas->nama_kelas ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
