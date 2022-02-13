<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_usaha');
	}
	function index(){
			$x['data']=$this->m_usaha->get_all();  

			$x['data_grafik']=$this->m_usaha->get_data_grafik_pertumbuhan_data_perbulan()->result(); 
			
			$x['data_grafik_kelas_usaha']=$this->m_usaha->get_data_level_usaha("SEMUA")->result();
			$x['data_grafik_komoditas'] = $this->m_usaha->get_all_data_perkomoditas("SEMUA")->result();  

			$x['total_data_grafik']=$this->m_usaha->get_data_level_usaha("SEMUA")->num_rows();
			$x['total_semua_data']=$this->m_usaha->get_total_data()->num_rows(); 
	
			
			$x['semua']=$this->m_usaha->get_total()->row_array();
			$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
			$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
			$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
			$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
			$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 
	
			$x['tot_produk']=$this->db->get_where('usaha', ['is_activated' => '0'])->num_rows();
			$x['tot_usaha']=$this->db->get_where('usaha', ['is_activated' => '0'])->num_rows();
			$x['tot_pemasaran']=$this->db->get_where('usaha', ['is_activated' => '0'])->num_rows();
			$grafik_jenis_usaha = $this->db->select('komoditas, COUNT(*) as total')->group_by('komoditas')->get_where('usaha', ['is_activated' => '0'])->result();
			$x['label_grafik_jenis_usaha'] = [];
			$x['value_grafik_jenis_usaha'] = [];
	 
			foreach($grafik_jenis_usaha as $gfu)
			{
				$x['label_grafik_jenis_usaha'][] = [
					$gfu->komoditas
				];
	
				$x['value_grafik_jenis_usaha'][] = [
					$gfu->total
				];
			}

			$this->load->view('depan/v_home',$x);
	}

}
