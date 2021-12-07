<?php
class Usaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_usaha');    
	}
 
	function index(){ 
		$x['data']=$this->m_usaha->get_all();  
		$x['data_kabupaten']=$this->m_usaha->get_all();  
		$x['data_grafik']=$this->m_usaha->get_all_perkabupaten("SEMUA")->result();  
		
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

		//$x['last_update'] = last_updated();

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_usaha',$x);
	}

	

	function detail($id){


		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

	
		$x['data_produk'] = $this->m_usaha->get_produk_by_id($id)->result(); 
		$x['data_bantuan'] = $this->m_usaha->get_bantuan_by_id($id)->result(); 
		$x['data_legalitas'] = $this->m_usaha->get_legalitas_by_id($id)->result(); 

		$x['data'] = $this->m_usaha->get_detail($id)->row_array(); 
		

		$this->load->view('depan/v_detail_usaha',$x); 
	}

	 
	function get_data_berd_skala_pasar($skala_pasar){
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['data'] = $this->m_usaha->get_all_daftar_perskala_pasar("Nasional")->result(); 
		$x['skala_pasar'] = $skala_pasar; 

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_usaha_perskala_pasar',$x);
	}


	//FILTER BERTINGKAT


	function get_data_berd_metode_pemasaran($metode_pemasaran){
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['data'] = $this->m_usaha->get_all_daftar_metode_pemasaran($metode_pemasaran)->result(); 
		$x['metode_pemasaran'] = $metode_pemasaran; 

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_usaha_metode_pemasaran',$x); 
	}


	function get_daftar_desa_terdaftar(){
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['data'] = $this->m_usaha->get_all_desa_terdaftar()->result(); 

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_usaha_daftar_desa',$x);
	}


	function get_data_berd_desa_terdaftar($desa){
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['data'] = $this->m_usaha->get_all_daftar_desa_terdaftar($desa)->result(); 
		$x['desa'] = $desa; 

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_usaha_perdesa',$x);
	}



	function autofillusaha(){
		$dap_id = $_GET['id'];
		$doc = $this->m_usaha->get_detail_json($dap_id)->row_array();
		$data = array(
			'uraian' => $doc['uraian'],
			'wilayah' => $doc['wilayah']
			);
		echo json_encode($data);
	   }


}
