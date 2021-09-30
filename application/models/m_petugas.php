<?php
class M_petugas extends CI_Model{
    private $table='petugas';
	private $primary ='id_petugas';
    
    function cek($username,$password){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
        return $this->db->get("petugas");
    }
    
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
		return $this->db->get("petugas",$limit,$offset);
    }
	
	function jumlah(){
        return $this->db->count_all($this->table);
    }
    
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("petugas");
    }
    
    function cekId($kode){
        $this->db->where("id_petugas",$kode);
        return $this->db->get("petugas");
    }
	
	function cekPetugas($username,$password){
        $query=$this->db->query("SELECT * FROM petugas WHERE user='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
    
    function update($id,$info){
        $this->db->where("id_petugas",$id);
        $this->db->update("petugas",$info);
    }
    
    function simpan($info){
        $this->db->insert("petugas",$info);
    }
    
    function hapus($kode){
        $this->db->where("id_petugas",$kode);
        $this->db->delete("petugas");
    }
}