<?php
class Umkm extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_usaha'); 
		$this->m_pengunjung->count_visitor();    
	}
 
	function index(){
		$x['data']=$this->m_usaha->get_all();  
		
			
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		//$x['last_update'] = last_updated();

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_umkm',$x);
	}

	

	function detail($id){

		$cek = $this->m_usaha->get_detail($id)->row_array();  

		$wilayah = $cek['wilayah'];

		
		$x['semua']=$this->m_usaha->get_total()->row_array();

		$x['data'] = $this->m_usaha->get_detail($id)->row_array(); 
		
		$x['wilayah'] = $this->m_usaha->get_perwilayah($wilayah)->row_array(); 
		$x['instansi'] = $this->m_usaha->get_perinstansi($instansi)->row_array(); 

		$this->load->view('depan/v_detail_usaha',$x); 
	}

	
	function get_by_jenis($jenis){
		$x['data']=$this->m_usaha->get_all_by_jenis($jenis);
		$x['semua']=$this->m_usaha->get_total()->row_array();


		$x['jenis'] = $jenis;	

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}



	function autofillusaha(){
		$dap_id = $_GET['dap_id'];
		$doc = $this->m_usaha->get_detail_json($dap_id)->row_array();
		$data = array(
			'uraian' => $doc['uraian'],
			'wilayah' => $doc['wilayah']
			);
		echo json_encode($data);
	   }


}
