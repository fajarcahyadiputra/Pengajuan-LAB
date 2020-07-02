<?php

class M_admin extends CI_Model
{
	public function tampil_data_guru($table){
		return $this->db->get($table)->result();
	}
	public function kode_guru(){
		$this->db->select('RIGHT(tb_guru.kode_guru, 4) as kode', false);
		$this->db->order_by('kode' , 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_guru');

		if($query->num_rows() > 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		$batas = str_pad($kode, 4, '0', STR_PAD_LEFT);
		return $kode = 'GR'. $batas;
	}
	public function tambah_data_guru($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_data_guru($where, $table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function tampil_dataeditguru($where, $table){
		return $this->db->get_where($table, $where)->result();
	}
	public function edit_data_guru($data , $where, $table){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
	public function tampil_data_lab($table){
		return $this->db->get($table)->result();
	}
	public function kode_lab(){
		$this->db->select('RIGHT(tb_lab.kode_lab, 4) as kode', false);
		$this->db->order_by('kode','desc');
		$this->db->limit(1);
		$query = $this->db->get('tb_lab');

		if($query->num_rows() > 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		$batas = str_pad($kode, 4, '0', STR_PAD_LEFT);
		return $kode = 'LAB'.$batas;
	}
	public function tambah_data_lab($data, $table){
		return $this->db->insert($table, $data);
	}
	public function hapus_data_lab($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function tampil_data_edit_lab($table, $where){
		return $this->db->get_where($table, $where)->result();
	}
	public function edit_data_lab($data, $where, $table){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
	public function tampil_data_pengajuan($table, $where){
		return $this->db->get_where($table,$where)->result();
	}
	public function tampil_detil_pengajuan($table,$where){
		return $this->db->get_where($table, $where)->result();

	}
	public function hapus_datapengajuan($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function ubah_datapengajuan($where, $table){
		$query = $this->db->get_where($table , $where)->result();
		$result = array();

		foreach ($query as $data) {
			$result['kode_pengajuan'] = $data->kode_pengajuan;
			$result['id']		= $data->id;
			$result['kode_lab'] = $data->kode_lab;
			$result['kode_guru'] = $data->kode_guru;
			$result['kode_pengajuan'] = $data->kode_pengajuan;
			$result['nama_guru'] = $data->nama_guru;
			$result['tanggal_pengajuan'] = $data->tanggal_pengajuan;
			$result['tanggal_pemakaian'] = $data->tanggal_pemakaian;
			$result['jam_pemakaian'] = $data->jam_pemakaian;
			$result['nohp_guru'] = $data->nohp_guru;
			$result['foto_guru'] = $data->foto_guru;
			$result['keterangan'] = $data->keterangan;
		}

		return $result;
	}
	public function edit_datapengajuan($data ,$where, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function edit_riwayat_pengajuan($data, $where, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function tampil_riwayatpengajuan($table){
		return $this->db->get($table)->result();
	}
	public function detail_riwayat_pengajuanlab($table, $where){
		return $this->db->get_where($table, $where)->result();
	}
	public function hapus_riwayat_pengajuan($where, $table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function tampil_admin($table, $where = 0){
		if($where == 0){
			return $this->db->get($table)->result();
		}else{
			return $this->db->get_where($table, $where)->row();
		}
	}
	public function kode_admin(){
		$this->db->select('RIGHT(tb_user.kode_user, 4) as kode', false);
		$this->db->order_by('kode','desc');
		$this->db->limit(1);
		$query = $this->db->get('tb_user');

		if($query->num_rows() > 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		$batas = str_pad($kode, 4, '0', STR_PAD_LEFT);
		return $kode = 'US'.$batas;
	}
	public function tambah_admin($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_admin($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_admin($table, $data, $where){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
	public function approve_pengajuan($table, $data, $where){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}