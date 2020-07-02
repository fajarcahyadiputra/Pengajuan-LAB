<?php 

class Guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru', 'guru');
	}
	public function index(){
		$data['kode']     = $this->guru->tampil_kode_pengajuan();
		$data['data_lab'] = $this->guru->tampil_data_lab();
		$data['cek_booking'] = $this->db->get_where("tb_riwayatpengajuan", ['jam_pemakaian >' => date("Y-m-d H:i:s"), 'approve' => 'setuju'])->result();
		$data['booking'] = $this->guru->tampil_pengajuan();
		$data['labku'] = $this->db->select('tb_lab.*')
			->from('tb_lab')
			->join('tb_riwayatpengajuan', 'tb_riwayatpengajuan.kode_lab = tb_lab.kode_lab', 'inner')
			->where(['tb_riwayatpengajuan.jam_pemakaian >' => date("Y-m-d H:i:s"), 'tb_riwayatpengajuan.approve' => 'setuju'])
			->get()->result();

		$data['kelas'] = $this->db->get('tb_kelas')->result();
		$data['pelajaran'] = $this->db->get('tb_pelajaran')->result();

		$this->load->view('guru/dashboard',$data);
	}
	public function mengajukan_lab(){
		date_default_timezone_set('Asia/Jakarta');
		$kode_pengajuan   = htmlspecialchars($this->input->post('kode_pengajuan'));
		$kode_lab 		  = htmlspecialchars($this->input->post('kode_lab'));
		$kode_guru 		  = htmlspecialchars($this->input->post('kode_guru'));
		$nama_guru 		  = htmlspecialchars($this->input->post('nama_guru'));
		$nohp_guru 		  = htmlspecialchars($this->input->post('nohp_guru'));
		$keterangan 	  = htmlspecialchars($this->input->post('keterangan'));
		$tp 			  = htmlspecialchars($this->input->post('tanggal_pemakaian'));
		$jp 			  = htmlspecialchars($this->input->post('jam_pemakaian'));
		$foto_lama        = $this->input->post('foto_lama');
		$sj 			  = $this->input->post('sampai_jam');
		$jtp 			  = $jp . '-' . $sj;
		

		$config['upload_path'] 		= './upload/foto_guru';
		$config['allowed_types']	= 'png|jpeg|jpg|gift';
		$config['encrypt_name']		= true;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('foto')){
			$foto = $foto_lama;
		}else{
			unlink(FCPATH . 'upload/foto_guru/' . $foto_lama);
			$foto = $this->upload->data('file_name');
		}

		$data     		  =[
			'kode_pengajuan'  => $kode_pengajuan,
			'kode_lab'		 => $kode_lab,
			'kode_guru'		 => $kode_guru,
			'nama_guru'		 => $nama_guru,
			'tanggal_pengajuan' => date('Y-m-d h:i:s'),
			'tanggal_pemakaian' => $tp,
			'jam_pemakaian'  => $jtp,
			'nohp_guru'		 => $nohp_guru,
			'keterangan'     => $keterangan,
			'foto_guru'		=> $foto,
			'kode_kelas' 	=> $this->input->post("kode_kelas"),
			'kode_matapelajaran' 	=> $this->input->post("kode_matapelajaran"),
			'approve'		=> 'tidak'
		];

		$masukan = $this->guru->mengajukan_lab($data,'tb_pengajuan');
		$this->guru->tambah_keriwayatpengajuan($data,'tb_riwayatpengajuan');
		$ambil_id = $this->db->get_where('tb_pengajuan',['kode_pengajuan' => $kode_pengajuan])->result();

		foreach ($ambil_id as $ai) {
			$id_pengajuan = $ai->id;
		}

		$pesan = array();

		if($masukan){
			$pesan['pengajuan'] = true;
			$pesan['kode_pengajuan'] = $kode_pengajuan;
			$pesan['id']             = $id_pengajuan;
		}else{
			$pesan['pengajuan'] = false;
		}

		echo json_encode($pesan);
	}
	public function tampil_detail_lab($id){
		$where  = ['kode_lab' => $id];
		$result = array();

		$query  = $this->guru->tampil_detail_lab('tb_lab', $where);

		foreach ($query as $isi) {
			$result['id']						=  $isi->id;
			$result['kode_lab']    		 		=  $isi->kode_lab;
			$result['nama_lab']					=  $isi->nama_lab;
			$result['fasilitas']		 		=  $isi->fasilitas;
			$result['keterangan']				=  $isi->keterangan;
			$result['foto']						=  $isi->foto;
		}

		echo json_encode($result);
	}
}
