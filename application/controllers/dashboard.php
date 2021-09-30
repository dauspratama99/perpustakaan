<?php
class Dashboard extends CI_Controller{
	private $limit=20;
    
    function __construct(){
        parent::__construct();
		
		
		// Load model m_petugas
        $this->load->model('m_petugas');
        $this->load->library(array('template','form_validation','pagination','upload'));
        
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// untuk mengakses objek session dan mengakses method yang didukung
		
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    
    public function index(){
		$data['title']="Home";
		$this->template->display('dashboard/index',$data);
	}
    
	public function petugas($offset=0,$order_column='id_petugas',$order_type='asc'){
		if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_petugas';
        if(empty($order_type)) $order_type='asc';
        $data['title']="Data Petugas";
        $data['petugas']=$this->m_petugas->semua($this->limit,$offset,$order_column,$order_type)->result();	

		$config['base_url']=site_url('anggota/index/');
        $config['total_rows']=$this->m_petugas->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->display('dashboard/petugas',$data);
    }
	
    public function tambahpetugas()
	{	
			$data['title']="Tambah Petugas";
			$this->_set_rules();
		
			// Jalankan validasi jika semuanya benar maka lanjutkan
			if($this->form_validation->run()==true){
				$user=$this->input->post('user');			
				$cek=$this->m_petugas->cekKode($user);
					if($cek->num_rows()>0){
						$data['message']="<div class='alert alert-danger'>Username sudah digunakan</div>";
						$this->template->display('dashboard/tambahpetugas',$data);
					}else{
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
						'password'=>md5($this->input->post('password')),
						'level' =>$this->input->post('level'),
						'email' =>$this->input->post('email'),
						'jk'=>$this->input->post('jk'),
						'image'=>$gambar		
					);
				
				// Jalankan function simpan pada m_petugas
                $this->m_petugas->simpan($info);
                redirect('dashboard/petugas/add_success');
				}
			}else{
				$data['message']="";
				// Jalankan view dashboard/tambahpetugas
				$this->template->display('dashboard/tambahpetugas',$data);
			}
	}
    
    public function edit($id)
	{ 
        $data['title']="Update data Petugas";
        $this->_set_rules();
		
		// Jalankan validasi jika semuanya benar maka lanjutkan
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
						'password'=>md5($this->input->post('password')),
						'level' =>$this->input->post('level'),
						'email' =>$this->input->post('email'),
						'jk'=>$this->input->post('jk'),
						'image'=>$gambar
				);
				
				// Jalankan function update pada m_petugas
				$this->m_petugas->update($id,$info);

				//tampilkan data petugas
				$data['petugas']=$this->m_petugas->cekId($id)->row_array();
				
				//tampilkan pesan
				$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";				
				$this->template->display('dashboard/editpetugas',$data);
			}else{
				$data['message']="";
				$data['petugas']=$this->m_petugas->cekId($id)->row_array();
				$this->template->display('dashboard/editpetugas',$data);
			}
	}
    
    public function hapus(){
        $kode=$this->input->post('kode');
        $detail=$this->m_petugas->cek($kode)->result();
	foreach($detail as $det):
	    unlink("assets/img/petugas/".$det->image);
	endforeach;
        $this->m_petugas->hapus($kode);
    }
    
    public function _set_rules(){
		// Mengatur validasi data username,
		// # required = tidak boleh kosong
		// # min_length[5] = username harus terdiri dari minimal 5 karakter
        $this->form_validation->set_rules('user','username','required|min_length[5]');
		
		// Mengatur validasi data password,
		// # required = tidak boleh kosong
		// # min_length[5] = password harus terdiri dari minimal
        $this->form_validation->set_rules('password','password','required|min_length[5]');
		
		// Mengatur validasi data level,
		// # required = tidak boleh kosong
		// # in_list[administrator, petugas] = hanya boleh bernilai 
		//   salah satu di antara administrator atau petugas
		$this->form_validation->set_rules('level', 'Level', 'required|in_list[administrator,petugas]');
	
		$this->form_validation->set_rules('email','Email','required|max_length[50]');
		$this->form_validation->set_rules('jk','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    public function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}