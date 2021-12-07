<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		
		$x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
		$x['tot_relawan']=$this->db->get('relawan')->num_rows();
		$x['tot_usaha']=$this->db->get('profil_usaha')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 
		
		$this->load->view('depan/v_about',$x);
	}
}
