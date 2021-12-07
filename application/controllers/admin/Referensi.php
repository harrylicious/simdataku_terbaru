<?php
class Referensi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_referensi');
		$this->load->model('m_document');
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->m_pengunjung->count_visitor(); 
	}
	function index(){
		$kode_uk_up=$this->session->userdata('kode_uk_up');
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap'); 
		
		$x['data']=$this->m_referensi->get_all(); 

		

		$x['data_penyusutan'] = $this->m_document->get_pernasib_akhir_dan_wilayah($wilayah);  
		$x['data_pindah_aktif'] = $this->m_document->get_pindah_inaktif_dan_wilayah($wilayah);  
		
		 
		$x['cek_data_inaktif'] = $this->m_document->cek_data_inaktif_up($nama, $wilayah);  
		$x['total_data_inaktif'] = $this->m_document->get_total_data_inaktif_up($nama, $wilayah)->row_array(); 
		$x['total_riwayat_pindah_inaktif'] = $this->m_document->get_total_riwayat_pindah_inaktif($kode_uk_up);
		
		$x['data_inaktif'] = $this->m_document->get_data_inaktif_up($nama);  


		$x['total']=$this->m_document->get_total_perwilayah($wilayah)->row_array(); 

		
		$x['musnah'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Musnah", $wilayah);  
		$x['berkas_perorangan'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Berkas Perorangan", $wilayah); 
		$x['dinilai_kembali'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Dinilai Kembali", $wilayah); 
		$x['permanen'] = $this->m_document->get_pernasib_berdasarkan_wilayah("Permanen", $wilayah); 
	

		$x['tekstual'] = $this->m_document->get_perjenis_dan_wilayah("TEKSTUAL", $wilayah);  
		$x['audio'] = $this->m_document->get_perjenis_dan_wilayah("AUDIO VISUAL", $wilayah); 
		$x['gambar'] = $this->m_document->get_perjenis_dan_wilayah("GAMBAR", $wilayah); 
		$x['alih_media'] = $this->m_document->get_perjenis_dan_wilayah("ALIH MEDIA", $wilayah); 
		$x['peta'] = $this->m_document->get_perjenis_dan_wilayah("PETA", $wilayah); 

		$x['aktif'] = $this->m_document->get_status_aktif_perwilayah($wilayah)->row_array();  
		$x['inaktif'] = $this->m_document->get_status_inaktif_perwilayah($wilayah)->row_array(); 

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('documents', ['deleted_at' => '0000-00-00 00:00:00'])->row();


		$this->load->view('admin/v_referensi',$x);
	}

	

	function tambah() {
 
		$this->load->view('admin/v_tambah_referensi');
	}

    function edit($id) {

		$x['data'] = $this->m_referensi->get_detail($id)->row_array();  
		$this->load->view('admin/v_tambah_referensi', $x);
	}

    function save_data(){
		
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
        $this->upload->initialize($config);
		

        if (!$this->upload->do_upload('file_berkas')) {
            $error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/referensi', $error);

        } else {
			$filename = $this->upload->data("file_name");
			$judul = $this->input->post('judul');
			// $data['tipe_berkas'] = $this->upload->data('file_ext');
			// $data['ukuran_berkas'] = $this->upload->data('file_size');
			
            $data = $this->upload->data();
			print_r($data);


			//$level=$this->input->post('xlevel');
			$data=array(
				'judul'=>$judul,
				'url'=>$filename
			);
		
	
		
			$this->m_referensi->insert($data);
			redirect('admin/referensi');

        }


     
    }

        
    function update_data($id){

        $judul=$this->input->post('judul');
        //$level=$this->input->post('xlevel');
        $data=array(
            'judul'=>$judul
        );


        $this->m_referensi->update($id, $data);
        redirect('admin/referensi');
    }

	function delete_data($id) { 
		$this->m_referensi->delete($id);
        redirect('admin/referensi');
	}



}
