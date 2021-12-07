<?php
class M_user extends CI_Model{

    public $tabel ="user";
    public $id = "kode_user";
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

    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }


    
}
?>