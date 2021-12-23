<?php
class M_pengurus_koperasi extends CI_Model{

    public $tabel ="detail_koperasi_pengurus";
    public $id = "id";
    public $kode_admin = "kode_admin";
    public $tahun = "tahun";
    public $id_koperasi = "id_koperasi";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order) ;
        return $this->db->get($this->tabel)->result(); 
    }

     
    // get detail 
    function get_detail($id){
        $this->db->where($this->id, $id);
        $this->db->order_by($this->tahun,$this->order);
        return $this->db->get($this->tabel);  

    }

    // get detail 
    function get_detail_by_id_koperasi($id){
        $this->db->where($this->id_koperasi, $id);
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

    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }


    
}
?>