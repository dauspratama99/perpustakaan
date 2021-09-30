<?php
class M_Peminjaman extends CI_Model{
    private $table="transaksi";
    
    function nootomatis(){
		$this->db->select('RIGHT(transaksi.id_transaksi,4) as kode', false);
		$this->db->order_by('id_transaksi','desc');
		$this->db->limit(1);
		$query=$this->db->get('transaksi');
		if($query->num_rows() <> 0){
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT); //angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "KN".$kodemax; // hasil KN-0001 dst.
		return $kodejadi;
	}
    
    function getAnggota(){
        return $this->db->get("anggota");
    }
    
    function cariAnggota($nis){
        $this->db->where("nis",$nis);
        return $this->db->get("anggota");
    }
    
    function cariBuku($kode){
        $this->db->where("kode_buku",$kode);
        return $this->db->get("buku");
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode){
        $this->db->where("kode_buku",$kode);
        return $this->db->get("tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp");
    }
    
    function hapusTmp($kode){
        $this->db->where("kode_buku",$kode);
        $this->db->delete("tmp");
    }
    
    function simpan($info){
        $this->db->insert("transaksi",$info);
    }
    
    function pencarianbuku($cari){
        $this->db->like("judul",$cari);
        return $this->db->get("buku");
    }
    
}