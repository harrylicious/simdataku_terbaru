<?php
class M_relawan extends CI_model{

    public $table ="documents";
    public $view = "data_documents";

    public $id = "dap_id";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    

    //datatable

    function json(){
        $this->datatables->select("nama_lengkap,ktp,jenis_kelamin,alamat,id_kawasan,telp,email,username,password,photo");
        $this->datatables->from('relawan');
        return $this->datatables->generate();

    }

    // get all
    function get_all(){
        $this->db->limit(10);
        return $this->db->get($this->table);
    }

    // get by id

    function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    //insert data
    function insert($data){
        $this->db->insert($this->table,$data);
        

    }
    
    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);

    }
    //update_data_tanpa_password
    

    //delete data

    function delete($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);

    }






   


}

?>