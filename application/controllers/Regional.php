<?php
class Regional extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_usaha'); 
		$this->m_pengunjung->count_visitor();    
	}
 
	function index(){
		$x['data']=$this->m_usaha->get_all_perkabupaten("SEMUA")->result();  
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		//$x['last_update'] = last_updated();

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_regional',$x);
	}

	

	
	function get_perwilayah($wilayah){

		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 

		$x['wilayah'] = $wilayah;

		$x['data'] = $this->m_usaha->get_all_data_usaha_perkabupaten($wilayah)->result();  
		

		$this->load->view('depan/v_usaha_wilayah',$x); 
	}

	
	function get_by_jenis($jenis){
		$x['data']=$this->m_usaha->get_all_by_jenis($jenis);
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['nasional'] = $this->m_usaha->get_all_perskala_pasar("Nasional")->row_array(); 
		$x['komoditas'] = $this->m_usaha->get_all_data_perkomoditas("")->row_array(); 
		$x['regional'] = $this->m_usaha->get_all_perdesa_terdaftar()->row_array(); 
		$x['online'] = $this->m_usaha->get_all_permetode_pemasaran("ONLINE")->row_array(); 
		$x['offline'] = $this->m_usaha->get_all_permetode_pemasaran("OFFLINE")->row_array(); 


		$x['jenis'] = $jenis;	

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}

	
	function get_by_aktif() {
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['tekstual'] = $this->m_usaha->get_perjenis("TEKSTUAL")->row_array(); 
		$x['audio'] = $this->m_usaha->get_perjenis("AUDIO VISUAL")->row_array(); 
		$x['gambar'] = $this->m_usaha->get_perjenis("GAMBAR")->row_array(); 
		$x['alih_media'] = $this->m_usaha->get_perjenis("ALIH MEDIA")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus_aktif()->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus_inaktif()->row_array(); 

		$x['data'] = $this->m_usaha->get_all_aktif(); 

		$x['jenis'] = "AKTIF";	

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}


	
	function get_by_inaktif() {
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['tekstual'] = $this->m_usaha->get_perjenis("TEKSTUAL")->row_array(); 
		$x['audio'] = $this->m_usaha->get_perjenis("AUDIO VISUAL")->row_array(); 
		$x['gambar'] = $this->m_usaha->get_perjenis("GAMBAR")->row_array(); 
		$x['alih_media'] = $this->m_usaha->get_perjenis("ALIH MEDIA")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus_aktif()->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus_inaktif()->row_array(); 

		$x['data'] = $this->m_usaha->get_all_inaktif(); 

		$x['jenis'] = "INAKTIF";	

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}

	public function auto_dapid($dapid){
		// POST data
		$dapid = $this->input->post();
		// Get data
		$data = $this->m_usaha->get_usahas($dapid);
		echo json_encode($data);
	  }

	  function autocomplete_id() { 
        $this->db->limit(10);
        $this->db->like('dap_id', $_GET['term']); 
        $this->db->select('dap_id');
        $data = $this->db->get('data_usahas')->result();
        foreach ($data as $row) {
            $return_arr[] = $row->dap_id;
        }
		
        echo json_encode($return_arr); 
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
