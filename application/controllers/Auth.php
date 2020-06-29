<?php

class Auth extends CI_Controller
{
	public function index(){
		$this->load->view('login');
	}
	public function proses_login(){

		$this->form_validation->set_rules('username','username','required|trim',
			[
				'required' =>  'Username Harus Di Isi'
			]);
		$this->form_validation->set_rules('password','pasword','required|trim',
			[
				'required' =>  'Password Harus Di Isi'
			]);

		if($this->form_validation->run() != FALSE){
			$username = strtolower(trim($this->input->post('username')));
			$password = sha1($this->input->post('password'));

			$cek_admin_username     = $this->db->get_where('tb_user',['username' => $username, 'password' => $password])->row();

			if(empty($cek_admin_username)){
				$cek_admin_email = $this->db->get_where('tb_user',['email' => $username, 'password' => $password])->row();

				if(empty($cek_admin_email)){
					
					$cek_user_username = $this->db->get_where('tb_guru', ['username' => $username, 'password' => $this->input->post('password')])->row();

					if(empty($cek_user_username)){
						
						$cek_user_email = $this->db->get_where('tb_guru', ['email' => $username, 'password' => $this->input->post('password')])->row();

						if(empty($cek_user_email)){
							$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Maaf Password/Username Salah</div>');
							redirect('Auth');
						}else{
							if($cek_user_email->apakah_aktif == 'aktif'){
								$userdata['kode_guru'] = $cek_user_email->kode_guru;
								$userdata['username'] = $cek_user_email->usernmae;
								$userdata['nama'] = $cek_user_email->nama_guru;
								$userdata['url'] = 'Guru';
								$userdata['email'] = $cek_user_email->email;
								$userdata['no_hp'] = $cek_user_email->no_hp;
								$userdata['foto'] = $cek_user_email->foto;
								$userdata['Loggen_in'] = true;

								$this->session->set_userdata($userdata);
								redirect('Guru/index');
							}else{
								$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Account Anda Sudah Tidak Aktif</div>');
								redirect('Auth');
							}
						}

					}else{
						if($cek_user_username->apakah_aktif == 'aktif'){
							$userdata['kode_guru'] = $cek_user_username->kode_guru;
							$userdata['nama'] = $cek_user_username->nama_guru;
							$userdata['url'] = 'Guru';
							$userdata['username'] = $cek_user_username->username;
							$userdata['email'] = $cek_user_username->email;
							$userdata['no_hp'] = $cek_user_username->no_hp;
							$userdata['foto'] = $cek_user_username->foto;
							$userdata['Loggen_in'] = true;

							$this->session->set_userdata($userdata);
							redirect('Guru');
						}else{
							$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Account Anda Sudah Tidak Aktif</div>');
							redirect('Auth');
						}
					}

				}else{

					if($cek_admin_email->status_aktif == 'aktif'){
						$userdata['username'] = $cek_admin_email->username;
						$userdata['url'] = 'Admin';
						$userdata['Logged_in'] = true;

						$this->session->set_userdata($userdata);
						redirect('Admin/index');
					}else{
						$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Account Anda Sudah Tidak Aktif</div>');
						redirect('Auth');
					}
					
				}
			}else{

				if($cek_admin_username->status_aktif == 'aktif'){
					$userdata['username'] = $cek_admin_username->username;
					$userdata['url'] = 'Admin';
					$userdata['Logged_in'] = true;

					$this->session->set_userdata($userdata);
					redirect('Admin');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Account Anda Sudah Tidak Aktif</div>');
					redirect('Auth');
				}
				
			}

			
		}else{
			$this->load->view('login');
		}
	}

	public function logout_admin(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('url');
		$this->session->unset_userdata('Logged_in');
		$this->session->set_flashdata('pesan','<div class="alert alert-success text-center">Selamat Berhasil Logout</div>');
		redirect('Auth');
	}
	public function logout_user(){
		$this->session->unset_userdata('kode_guru');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('url');
		$this->session->unset_userdata('no_hp');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('Logged_in');
		$this->session->set_flashdata('pesan','<div class="alert alert-success text-center">Selamat Berhasil Logout</div>');
		redirect('Auth');
	}
}






