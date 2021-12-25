<?php
class Koperasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_koperasi');    
	}
 
	function index(){ 
		
		$x['data']=$this->m_koperasi->get_all_perkabupaten("SEMUA")->result();  
		//$x['last_update'] = last_updated();
		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_regional_koperasi',$x); 
	}

	

}
