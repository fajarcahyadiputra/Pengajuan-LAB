<?php
class M_guru extends CI_Model
{
	public function tampil_data_lab(){
		return $this->db->get_where('tb_lab',['apakah_aktif' => 'aktif'])->result();
	}
	public function tampil_kode_pengajuan(){
		$this->db->select('RIGHT(tb_pengajuan.kode_pengajuan, 4) as kode',false);
		$this->db->order_by('kode', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('tb_pengajuan');
		if($query->num_rows() > 0){
			$data   =  $query->row();
			$kode   =  intval($data->kode) + 1;
		}else{
			$kode   = 1;
		}

		$batas      = str_pad($kode, 4,'0', STR_PAD_LEFT);
		return $kode = 'PGN'.$batas;
	}
	public function mengajukan_lab($data, $table){
		return $this->db->insert($table , $data);
	}
	public function tampil_detail_lab($table, $where){
		return $this->db->get_where($table ,$where)->result();

	}
	public function tambah_keriwayatpengajuan($data, $table){
		$this->db->insert($table, $data);
	}
}
