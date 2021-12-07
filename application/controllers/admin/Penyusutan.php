<?php
class Penyusutan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_document');
	}

	function index(){
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$kode_unit=$this->session->userdata('kode_uk_up');
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap'); 
		if($this->session->userdata('akses')=='1'){ 
		
			if ($this->session->userdata('nama_lengkap') == "UK KPU Provinsi NTB") {
				$x['data'] = $this->m_document->get_daftar_oleh_provinsi();  
			}
			else if (substr($this->session->userdata('nama_lengkap'), 0, 2) == "UK") {
				$x['data'] = $this->m_document->get_daftar_perwilayah($wilayah); 
			}
			else {	
				$x['data']=$this->m_document->get_daftar_unit_dan_wilayah($kode_unit, $wilayah); 
			}

			$x['data_penyusutan'] = $this->m_document->get_pernasib_akhir_dan_wilayah($wilayah);  
 
			$x['data_pindah_aktif'] = $this->m_document->get_pindah_inaktif_dan_wilayah($wilayah);   
			
			 
			$x['cek_data_inaktif'] = $this->m_document->cek_data_inaktif_up($nama, $wilayah);  
			$x['total_data_inaktif'] = $this->m_document->get_total_data_inaktif_up($nama, $wilayah)->row_array(); 
			$x['total_riwayat_pindah_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif($kode_unit);
			
			$x['data_inaktif'] = $this->m_document->get_data_inaktif_up($nama);  


			$x['total']=$this->m_document->get_total_perwilayah($wilayah)->row_array();  
			$x['total_semua']=$this->m_document->get_total()->row_array();  
		

			$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
			$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
			$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
			$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
			$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 

			
			$x['musnah'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Permanen", $wilayah); 
			
			$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();  
			$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array();  


			$inaktif = $x['inaktif'];

			$this->load->view('admin/v_penyusutan',$x);
		}else{
			redirect('administrator');
		}
	
	} 


	function get_data_by_jenis($jenis, $wilayah){
		$wilayah = $this->session->userdata('wilayah');
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();


			$x['semua']=$this->m_document->get_total_perwilayah($wilayah)->row_array();  
			$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
			$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
			$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
			$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
			$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 
			$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();   
			$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array(); 

			
			$x['data'] = $this->m_document->get_daftar_jenis_dan_wilayah($jenis, $wilayah);  

			
			//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('documents', ['deleted_at' => '0000-00-00 00:00:00'])->row();

			$this->load->view('admin/v_daftar_document_by_jenis',$x);
		}else{
			redirect('administrator');
		}
	}

	function get_data_by_unit($nama, $wilayah_filter){ 
		$wilayah = $this->session->userdata('wilayah');
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung(); 


			$x['data_penyusutan'] = $this->m_document->get_pernasib_akhir_dan_wilayah($wilayah);  
			$x['data_pindah_aktif'] = $this->m_document->get_pindah_inaktif_dan_wilayah($wilayah);  
			
			 
			$x['cek_data_inaktif'] = $this->m_document->cek_data_inaktif_up($nama, $wilayah);  
			$x['total_riwayat_pindah_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif($kode_uk_up);
			$x['total_data_inaktif'] = $this->m_document->get_total_data_inaktif_up($nama, $wilayah)->row_array(); 
			
			$x['data_inaktif'] = $this->m_document->get_data_inaktif_up($nama);  
	
	
			$x['total']=$this->m_document->get_total_perwilayah($wilayah)->row_array(); 
		
	
			$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
			$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
			$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
			$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
			$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 
	
			$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();  
			$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array(); 

			$x['data'] = $this->m_document->get_daftar_unit_dan_wilayah($nama, $wilayah_filter); 
			$x['wilayah'] = $wilayah_filter;   
			$x['nama'] = $nama;  

 
			
			//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('documents', ['deleted_at' => '0000-00-00 00:00:00'])->row();

			$this->load->view('admin/v_daftar_document_by_unit',$x);
		}else{
			redirect('administrator');
		}
	}


	function get_data_nasib_akhir_wilayah_inaktif($nasib_akhir){
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap');
		if($this->session->userdata('akses')=='1'){ 
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		
			$x['data'] = $this->m_document->get_daftar_pernasib_akhir_wilayah_inaktif($wilayah, $nasib_akhir); 

			$x['data_penyusutan'] = $this->m_document->get_pernasib_akhir_dan_wilayah($wilayah);  
			$x['data_pindah_aktif'] = $this->m_document->get_pindah_inaktif_dan_wilayah($wilayah);  
			
			 
			$x['cek_data_inaktif'] = $this->m_document->cek_data_inaktif_up($nama, $wilayah);  
			$x['total_data_inaktif'] = $this->m_document->get_total_data_inaktif_up($nama, $wilayah)->row_array(); 
			$x['total_riwayat_pindah_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif($kode_uk_up);
			
			$x['data_inaktif'] = $this->m_document->get_data_inaktif_up($nama);  


			$x['total']=$this->m_document->get_total_perwilayah($wilayah)->row_array(); 
			$x['nasib_akhir'] = $nasib_akhir; 
		

			$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
			$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
			$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
			$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
			$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 

			$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();  
			$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array(); 


			$inaktif = $x['inaktif'];

			$this->load->view('admin/v_daftar_document_by_nasib_akhir',$x);
		}else{
			redirect('administrator');
		}
	
	} 

	function get_data_pindah_inaktif_wilayah($wilayah){ 
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap');
		if($this->session->userdata('akses')=='1'){ 
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		
			$x['data'] = $this->m_document->get_daftar_pindah_inaktif_dan_wilayah($wilayah); 

			$x['data_penyusutan'] = $this->m_document->get_pernasib_akhir_dan_wilayah($wilayah);  
			$x['data_pindah_aktif'] = $this->m_document->get_pindah_inaktif_dan_wilayah($wilayah);  
			
			 
			$x['cek_data_inaktif'] = $this->m_document->cek_data_inaktif_up($nama, $wilayah);  
			$x['total_data_inaktif'] = $this->m_document->get_total_data_inaktif_up($nama, $wilayah)->row_array(); 
			
			$x['data_inaktif'] = $this->m_document->get_data_inaktif_up($nama);  


			$x['total']=$this->m_document->get_total_perwilayah($wilayah)->row_array(); 
		

			$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
			$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
			$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
			$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
			$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 

			$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();  
			$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array(); 

			$x['total_terima_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif_per_kode_uk_up($kode_uk_up, 0);
			$x['total_pindah_inaktif'] = $this->m_document->get_total_pindah_inaktif_dan_kode_uk_up($kode_uk_up);
			$x['total_riwayat_pindah_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif($kode_uk_up);

			$inaktif = $x['inaktif'];

			$this->load->view('admin/v_daftar_document_pindah_inaktif',$x);
		}else{
			redirect('administrator');
		}
	
	} 

	function export_data($nasib_akhir){
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap');
		if($this->session->userdata('akses')=='1'){ 
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		
			$x['data'] = $this->m_document->get_daftar_pernasib_akhir_wilayah_inaktif($wilayah, $nasib_akhir); 


			$this->load->view('admin/v_daftar_pernasib_akhir',$x);
		}else{
			redirect('administrator');
		}
	
	} 

	
	function export_data_perwilayah($nama, $wilayah){
		if($this->session->userdata('akses')=='1'){ 
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		
			$x['data'] = $this->m_document->get_daftar_unit_dan_wilayah($nama, $wilayah); 
			$x['nama'] = $nama;
			$x['wilayah'] = $wilayah;


			$this->load->view('admin/v_export_daftar_perwilayah',$x);  
		}else{
			redirect('administrator');
		}
	
	} 

	function export_data_pindah_inaktif(){
		$kode_uk_up = $this->session->userdata('kode_uk_up');
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap');
		if($this->session->userdata('akses')=='1'){ 
		
			$x['data'] = $this->m_document->get_daftar_pindah_inaktif_dan_wilayah($wilayah); 
			$x['kode_uk_up'] = $kode_uk_up;

			$this->load->view('admin/v_export_daftar_pindah_inaktif',$x);
		}else{
			redirect('administrator');
		}
	}
	
	function export_semua(){
		$kode_uk_up = $this->session->userdata('kode_uk_up');
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap');
		if($this->session->userdata('akses')=='1'){ 
			$x['data'] = $this->m_document->get_all(); 
			$x['kode_uk_up'] = $kode_uk_up;
			$this->load->view('admin/v_export_semua',$x);
		}else{
			redirect('administrator');
		}
	}

}