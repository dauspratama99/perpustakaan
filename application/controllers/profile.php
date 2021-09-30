<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
    
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_petugas','m_anggota');
		$this->load->library(array('template','form_validation','pagination','upload'));
		
		if(!$this->session->userdata('username')){
			redirect('web');
        }
    }	
	
    function index(){
	
		$data['title']="Profile";
		$this->template->display('profile/profile',$data);
	}
	
	function profilePetugas()
	{
		$data['title']="Profile";
		$this->_set_rules_petugas();
		if($this->form_validation->run()==true){
			$id=$this->input->post('id');
			//setting konfiguras upload image
			$config['upload_path'] = './assets/img/petugas/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$config['max_width']  = '2400';
			$config['max_height']  = '3200';
                
			$this->upload->initialize($config);
				if(!$this->upload->do_upload('gambar')){
					$gambar="";
				}else{
					$gambar=$this->upload->file_name;
				}
				
			$info=array(
						'user'=>$this->input->post('user'),
						'email' =>$this->input->post('email'),
			);
					
			// Jalankan function update pada m_petugas
			$this->m_petugas->update($id,$info);
			

			//tampilkan pesan
			echo $this->session->set_flashdata('message','Data Berhasil diupdate');
			redirect('profile');
				
		}else{
			echo $this->session->set_flashdata('message','Data ada yang salah');
			redirect('profile');
		}
	}
	
	function profileAnggota()
	{
				$data['title']="Profile Anggota";
				$nis=$this->input->post('nis');
				$nama=$this->input->post('nama');
				$username=$this->input->post('user');
				$email=$this->input->post('email');
				$jk=$this->input->post('jk');
				$ttl=$this->input->post('ttl');
				$kelas=$this->input->post('kelas');
				$this->_set_rules_anggota();
					if($this->form_validation->run()==true){

						//setting konfiguras upload image
						$config['upload_path'] = './assets/img/anggota/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size']	= '1000';
						$config['max_width']  = '2000';
						$config['max_height']  = '1024';
                
						$this->upload->initialize($config);
							if(!$this->upload->do_upload('gambar')){
								$gambar="";
							}else{
								$gambar=$this->upload->file_name;
							}
                
						$info=array(
							'nama'=>$nama,
							'username'=>$username,
							'email'=>$email,
							'jk'=>$jk,
							'ttl'=>$ttl,
							'kelas'=>$kelas,
							'image'=>$gambar
						);
						//update data angggota
						$data['anggota']= $this->m_anggota->update($nis,$info);
						
						//tampilkan pesan
						
						$this->session->set_flashdata('message',"<div class='alert alert-success'>Data Berhasil diupdate, Silahkan keluar dulu Dan Masuk Lagi!</div>");
						redirect('profile/profileAnggota');
					
					}else{
						$data['message']="";
						$this->template->display('profile/profile',$data);
					}

					
	}

		function passwordPetugas()
		{
			$data['title']="Profile";
			$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');
			
			
			if ($this->form_validation->run() == true) {
				$id=$this->session->userdata('id');
				$info=array('password' =>md5($this->input->post('passBaru')));
				$this->m_petugas->update($id,$info);
				$this->m_petugas->cekId($id)->row_array();
				$this->session->set_flashdata('message',"<div class='alert alert-success'>Password berhasil diubah</div>");
				redirect('profile/profile');
			} else {
				$this->m_petugas->cekId($id)->row_array();
				$this->session->set_flashdata('message',"<div class='alert alert-danger'>Password Gagal diubah</div>");
				redirect('profile/profile');
			}
		}
		
		function passwordAnggota()
		{
			$data['title']="Profile";
			$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');
			
			
			if ($this->form_validation->run() == true) {
				$nis=$this->session->userdata('nis');
				$info=array('password' =>md5($this->input->post('passBaru')));
				$this->m_anggota->update($nis,$info);
				$this->session->set_flashdata('message',"<div class='alert alert-success'>Password berhasil diubah</div>");
				redirect('profile/profile');
			} else {
				$this->session->set_flashdata('message',"<div class='alert alert-danger'>Password Gagal diubah</div>");
				redirect('profile/profile');
			}
		}
	    
	public function _set_rules_petugas(){
		// Mengatur validasi data username,
		// # required = tidak boleh kosong
		// # min_length[5] = username harus terdiri dari minimal 5 karakter
        $this->form_validation->set_rules('user','username','required|min_length[5]');
		
		// Mengatur validasi data level,
		// # required = tidak boleh kosong
		// # in_list[administrator, petugas] = hanya boleh bernilai 
		//   salah satu di antara administrator atau petugas
		$this->form_validation->set_rules('level', 'Level', 'required|in_list[administrator,petugas]');
	
		$this->form_validation->set_rules('email','Email','required|max_length[50]');
		$this->form_validation->set_rules('jk','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
	
	function _set_rules_anggota(){
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
		$this->form_validation->set_rules('email','Email','required|max_length[50]');
		$this->form_validation->set_rules('user','username','required|min_length[5]');
        $this->form_validation->set_rules('ttl','Tanggal Lahir','required');
        $this->form_validation->set_rules('kelas','Kelas','required|max_length[10]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
	
}