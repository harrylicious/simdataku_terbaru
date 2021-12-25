<?php
class Regional extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_usaha'); 
		$this->load->model('m_koperasi'); 
	}
 
	function index(){
		$x['data']=$this->m_usaha->get_all_perkabupaten("SEMUA")->result();  
		//$x['last_update'] = last_updated();
		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_regional',$x);
	}



	
	function get_perwilayah($wilayah){

 
		$x['wilayah'] = $wilayah; 
		$x['data'] = $this->m_usaha->get_data_kecamatan_perkabupaten($wilayah)->result();  
		
		$this->load('depan/v_usaha_perwilayah',$x);  
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
