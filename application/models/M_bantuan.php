<?php
class M_bantuan extends CI_Model{
 

    public $table ="bantuan";
    public $id = "id_bantuan";
    public $data_usaha ="data_usaha";

    var $column_order = array(null,'asal_bantuan','jenis_bantuan');
    var $column_search= array('asal_bantuan','jenis_bantuan');
    var $order = array('id_bantuan' => 'asc'); // default order 

    function __construct()
    {
        parent::__construct();

    }

    private function _get_datatables_query()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->join($this->data_usaha,'bantuan.id_usaha=data_usaha.id_usaha');
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order),$order[key($order)]);
        }
       
    }

    function get_datatables(){   
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    
    public function get_bantuan_by_id($id){
        $this->db->from($this->table);
        $this->db->where('id_bantuan',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    function get_data_usaha(){
        return $this->db->get($this->data_usaha);
    }

    public function update($where,$data){
        
        $this->db->update($this->table,$data,$where);
        $this->db->affected_rows();
    }

    //insert data
    function insert($data){
        $this->db->insert($this->table,$data);
        
        }
    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->table);
    }

    function deleted_at($id,$data)
    {
        $this->db->where('id_bantuan', $id);
        $this->db->update($this->table,$data);
    }

    function check_duplicate($asal_bantuan){
        $this->db->where("asal_bantuan",$asal_bantuan);
        $query = $this->db->get($this->table);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>