<?php
class Datausaha extends CI_Controller{
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

		$this->load->view('depan/v_data_usaha',$x);
	}

	function detail($kode){
		$x['data'] = $this->m_datausaha->get_usaha_by_kode($kode)->row();
		$x['produk']=$this->m_produk->get_produk_home_byusaha($kode);
		$this->load->view('depan/v_detail_usaha',$x); 
	}

	function daftar(){
		$x['data']=$this->m_datausaha->get_all_based_kabupaten();
		$x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
		$x['tot_produk']=$this->db->get('produk')->num_rows();
		$x['tot_usaha']=$this->db->get('data_usaha')->num_rows();
		$x['tot_pemasaran']=$this->db->get('produk')->num_rows();
		$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$kab = $this->input->get('kab') ? $this->input->get('kab') : '';
		$kab = str_replace(["%20", '+'], " ", $kab);

		$kab_kode = $this->db->get_where('wilayah_2020', ['nama' => $kab])->row();
		$x['kecamatan'] = $this->m_profil_usaha->get_kecamatan($kab_kode->kode);
		// echo json_encode($x['kecamatan']);die;
		$x['jenis_usaha'] = $this->db->get('ket_jenis_usaha')->result();
		$this->load->view('depan/v_daftar_usaha',$x);  
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

	public function datatables($kabupaten)
    {
        if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
			header('Content-Type: application/json');
			$kabupaten = str_replace(["%20", '+'], " ", $kabupaten );
			$kecamatan = str_replace(["%20", '+'], " ", $this->input->get('kecamatan'));
			$jenis_usaha = str_replace(["%20", '+'], " ", $this->input->get('jenis_usaha'));

			$where['kabupaten'] = $kabupaten;
			$where['deleted_at'] = '0000-00-00 00:00:00';

			if($this->input->get('kecamatan'))
			{
				$where['kecamatan'] = $kecamatan;
			}

			if($this->input->get('jenis_usaha'))
			{
				$where['jenis_usaha'] = $jenis_usaha;
			}
	
			$this->datatables->select('id_usaha,nama_usaha,tahun_berdiri,desa,kecamatan,kabupaten');
			$this->datatables->from('data_usaha');
			$this->datatables->where($where);
			$this->datatables->add_column('action', '$1','actionUsaha(id_usaha)');
			$this->datatables->edit_column('tahun_berdiri', '$1','tahunBerdiri(tahun_berdiri)');
            echo $this->datatables->generate();
        } else {
			header('Content-Type: application/json');
           
			$this->datatables->select('*');
            $this->datatables->from('data_usaha');
            echo $this->datatables->generate();
        }
    }

}
