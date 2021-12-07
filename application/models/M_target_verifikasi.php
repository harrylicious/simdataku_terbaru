<?php
class M_target_verifikasi extends CI_Model{

    public $tabel ="target_verifikasi";
    public $id = "id";
    public $desa = "desa";
    public $kode_user = "kode_user";
    public $kode_admin = "kode_admin";
    public $wilayah = "wilayah";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel)->result(); 
    }

     
    // get detail 
    function get_detail($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->tabel);  

    }

    // get detail 
    function get_detail_by_admin($kode_admin){
        $this->db->where($this->kode_admin, $kode_admin);
        return $this->db->get($this->tabel);  

    }


    //insert data
    function insert($data){
        $this->db->insert($this->tabel,$data);
    }

    
    
    //update data
    function update($id, $data){
        $this->db->where($this->id,$id);
        $this->db->update($this->tabel,$data);

    }

    
    function delete_target($id, $desa){
        $this->db->where($this->kode_user,$id);
        $this->db->where($this->desa,urldecode($desa));
        $this->db->delete($this->tabel);
    }

    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }


    
}
?>