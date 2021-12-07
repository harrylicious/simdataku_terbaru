<?php
class Komoditas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_usaha'); 
		$this->m_pengunjung->count_visitor();    
	}
 
	function index(){
		$x['data']=$this->m_usaha->get_all_perkomoditas("SEMUA");  

		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		//$x['last_update'] = last_updated();

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_komoditas',$x);
	}

	

	
	function get_perkomoditas($komoditas){ 

 
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['ket_komoditas'] = $komoditas;

		$x['data'] = $this->m_usaha->get_data_perkomoditas($komoditas); 
		$x['data_rangkuman_komoditas'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("SEMUA", $komoditas)->row_array(); 
		$x['data_rangkuman_produksi'] = $this->m_usaha->get_data_total_kapasitas_produksi_perkabupaten("SEMUA", $komoditas)->row_array(); 
		

		$this->load->view('depan/v_usaha_komoditas',$x); 
	}

	function get_perkomoditas_perkabupaten($komoditas){ 


		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array();  

		$x['ket_komoditas'] = $komoditas;

		$x['data'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("", $komoditas)->result(); 

		$x['data_rangkuman_komoditas'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("SEMUA", $komoditas)->row_array(); 
		$x['data_rangkuman_produksi'] = $this->m_usaha->get_data_total_kapasitas_produksi_perkabupaten("SEMUA", $komoditas)->row_array(); 
		

		$this->load->view('depan/v_usaha_komoditas_perkabupaten',$x); 
	}


	function get_daftar_komoditas_perkabupaten($wilayah, $komoditas){ 




		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array();  

		$x['ket_komoditas'] = $komoditas;
		$x['wilayah'] = $wilayah;

		$x['data'] = $this->m_usaha->get_data_komoditas_perkabupaten($wilayah, $komoditas)->result(); 

		$x['data_rangkuman_komoditas'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("SEMUA", $komoditas)->row_array(); 
		$x['data_rangkuman_produksi'] = $this->m_usaha->get_data_total_kapasitas_produksi_perkabupaten("SEMUA", $komoditas)->row_array(); 
		

		$this->load->view('depan/v_usaha_daftar_komoditas_perkabupaten',$x); 
	}

	

	



}
