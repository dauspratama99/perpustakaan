<?php
class Web extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_buku','m_anggota','m_petugas'));
		
		$this->load->library(array('template','form_validation','pagination','upload'));
        if($this->session->userdata('username')){
            redirect('dashboard');
        }
    }
    
    function index(){
        $this->load->view('web/index');
    }
    
    function cari_anggota(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_anggota->cari($cari)->result();
        $data['title']="Pencarian anggota";
        $this->load->view('web/cari_anggota',$data);
    }
    
    function buku(){
        $data['title']="Data Buku";
        $data['buku']=$this->m_buku->semua()->result();
        $this->load->view('web/buku',$data);
    }
    
    function cari_buku(){
        $cari=$this->input->post('cari');
        $data['title']="Data Buku";
        $data['buku']=$this->m_buku->cari($cari)->result();
        $this->load->view('web/buku',$data);
    }
    
    function daftar(){
		$data['title']="Daftar Member";

		$this->form_validation->set_rules('user','Username','required|min_length[5]');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('email','Email','required|max_length[50]');
		$this->form_validation->set_rules('ttl','Tanggal Lahir','required');
		if($this->form_validation->run()==true){
            $nis=$this->input->post('nis');
            $cek=$this->m_anggota->cek($nis);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>Nis sudah digunakan</div>";
                $this->load->view('web/daftar',$data);
            }else{
                //setting konfiguras upload image
                $config['upload_path'] = './assets/img/anggota/';
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
                    'nis'=>$this->input->post('nis'),
                    'nama'=>$this->input->post('nama'),
					'username'=>$this->input->post('user'),
					'password'=>md5($this->input->post('password')),
					'email'=>$this->input->post('email'),
                    'jk'=>$this->input->post('jk'),
                    'ttl'=>$this->input->post('ttl'),
                    'kelas'=>$this->input->post('kelas'),
                    'image'=>$gambar
                );
				
                $this->m_anggota->simpan($info);
				$data['message']="<div class='alert alert-success'>Daftar Telah Berhasil, silahkan kembali ke login</div>";
                redirect('web/daftar/add_success',$data);
            }
        }else{
            $data['message']="";
			$this->load->view('web/daftar',$data);
    }
	}

    
    function proses(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
            
			if($this->form_validation->run() != false){
				$cek=$this->m_petugas->cekPetugas($username,$password);
				if($cek->num_rows()>0){
					$data=$cek->row_array();
					//login berhasil, buat session
					$this->session->set_userdata('username',$username);
					if($data['level']=='administrator'){
						$this->session->set_userdata('akses','1');
						$this->session->set_userdata('id', $data['id_petugas']);
						$this->session->set_userdata('user',$data['user']);
						$this->session->set_userdata('level',$data['level']);
						$this->session->set_userdata('jk',$data['jk']);
						$this->session->set_userdata('email', $data['email']);
						$this->session->set_userdata('gambar', $data['image']);
						redirect('dashboard');
				
					}elseif($data['level']=='petugas'){
						$this->session->set_userdata('akses','2');
						$this->session->set_userdata('id', $data['id_petugas']);
						$this->session->set_userdata('user',$data['user']);
						$this->session->set_userdata('level',$data['level']);
						$this->session->set_userdata('jk',$data['jk']);
						$this->session->set_userdata('email', $data['email']);
						$this->session->set_userdata('gambar', $data['image']);
						redirect('dashboard');
					}
				}else{
				$cek=$this->m_anggota->cekAnggota($username,$password);
					if($cek->num_rows()>0){
						$data=$cek->row_array();
						//login berhasil, buat session
							$this->session->set_userdata('username',$username);
							$this->session->set_userdata('akses','3');
							$this->session->set_userdata('nis', $data['nis']);
							$this->session->set_userdata('nama', $data['nama']);
							$this->session->set_userdata('user',$data['username']);
							$this->session->set_userdata('email', $data['email']);
							$this->session->set_userdata('jk',$data['jk']);
							$this->session->set_userdata('ttl',$data['ttl']);
							$this->session->set_userdata('kelas',$data['kelas']);
							$this->session->set_userdata('gambar', $data['image']);
							redirect('dashboard');
					}else{
						//login gagal
						$this->session->set_flashdata('message',"<div class='alert alert-danger alert-message'>Username atau password salah</div>");
							redirect('web');
					}
				}
			}else{
				$this->session->set_flashdata('message', "<div class='alert alert-danger alert-message'>Anda Belum mengisi Username atau Password</div>");
				redirect('web');
			}
        }
    
}