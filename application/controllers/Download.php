<?php
class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['data']=$this->m_files->get_all_files();
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 
		
		$this->load->view('depan/v_download',$x);
	}

	function get_file(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

}
