<?php
class M_datausaha extends CI_Model{

    public $tabel ="documents";
    public $id = "dap_id";
    public $jenis_media = "jenis_media";
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

    
    // get all
    function get_all_buku(){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis_media, "Buku"); 
        return $this->db->get($this->tabel)->result(); 

    }

      // get all
    function get_all_teks(){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis_media, "Text");
        return $this->db->get($this->tabel)->result(); 

    }

     // get all
     function get_all_gambar(){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis_media, "Gambar");
        return $this->db->get($this->tabel)->result(); 

    }

     // get all
     function get_all_video(){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis_media, "Video");
        return $this->db->get($this->tabel)->result(); 

    }

    // get detail
    function get_detail($id){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->id, $id);
        return $this->db->get($this->tabel); 

    }

    //insert data
    function insert($data){
        $this->db->insert($this->tabel,$data);
    }

    
    
    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);

    }
    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }


    
}
?>