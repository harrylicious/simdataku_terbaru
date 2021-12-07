<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');  
		$this->load->model('m_produk');
		$this->load->model('m_datausaha');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
			$x['semua']=$this->m_usaha->get_total()->row_array();
			$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
			$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
			$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
			$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
			$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

			$this->load->view('depan/v_home',$x);
	}

}
