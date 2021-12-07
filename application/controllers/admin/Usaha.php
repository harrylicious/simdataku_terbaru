<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Usaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_usaha');
		$this->load->model('m_user');
		$this->load->model('m_indikator_usaha');
		$this->load->model('m_produk');
		$this->load->model('m_sarana');
		$this->load->model('m_legalitas');
		$this->load->model('m_tenaga_kerja');
		$this->load->model('m_media_sosial');
		$this->load->model('m_pelatihan');
		$this->load->model('m_wilayah');
		$this->load->library('upload'); 
		$this->load->library('form_validation'); 
	}


	function index(){  
		$idadmin = $this->session->userdata('idadmin');
		$username = $this->session->userdata('username');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');
		$kabupaten = $this->session->userdata('kabupaten');
		
		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
		

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 

			if ($this->session->userdata('level') == "superadmin") {
				$x['data'] = $this->m_usaha->get_all();  
				$this->load->view('admin/v_usaha',$x);
			}
			else if ($this->session->userdata('level') == "admin") { 
				$x['data'] = $this->m_usaha->get_all_data_usaha_perkode_admin($username)->result();  
				$this->load->view('admin/v_usaha_admin',$x);
			}
			else if ($this->session->userdata('level') == "relawan") { 
				$x['data']=$this->m_usaha->get_all_data_usaha_perkode_user($idadmin)->result();  
				$this->load->view('admin/v_usaha',$x);
			}
		}else{
			redirect('administrator');
		}

	}

	
	function verifikasi(){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level'); 

		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 
			
			$this->load->view('admin/v_verifikasi_usaha',$x); 
		}else{
			redirect('administrator');
		}
	}

	function terverifikasi($id){   
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		$data = array(
			'is_verified' => 1,
			'id_user' => $idadmin
		);

		$terverifikasi = $this->m_usaha->terverifikasi($id, $data);

		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 

			$this->load->view('admin/v_verifikasi_usaha',$x); 
			
		}else{
			redirect('administrator');
		}
	}

	function target_verifikasi($id){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang'); 
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_profil'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_sebaran_usaha']=$this->m_usaha->get_all_sebaran_usaha_lengkap_belum_terverifikasi()->result();
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($id)->result();
			
			$this->load->view('admin/v_target_verifikasi',$x);
		}else{
			redirect('administrator');
		}
	}

	function lihat_data_by_relawan($id, $nama){   
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_profil'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_sebaran_usaha']=$this->m_usaha->get_all_sebaran_usaha_lengkap_belum_terverifikasi()->result();
			$x['data']=$this->m_usaha->get_all_data_usaha_perkode_user($id)->result();
			$x['nama_relawan']=$nama;
			
			
			$this->load->view('admin/v_usaha_relawan',$x);
		}else{
			redirect('administrator');
		}
	}

	function get_data_usaha_target_verifikasi($desa){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		
		if($this->session->userdata('akses')=='1'){  
			 
			
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_non_verifikasi']=$this->m_usaha->get_all_non_verified_desa($desa);  
			$x['data_verifikasi']=$this->m_usaha->get_all_verified_desa($desa, $idadmin); 
			
			$x['data_belum_verifikasi']=$this->m_usaha->get_all_non_verified_desa($desa, $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_usaha->get_all_verified_desa($desa, $idadmin);  

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			
			$this->load->view('admin/v_verifikasi_usaha',$x); 
		}else{
			redirect('administrator');
		}
	}

	function edit($id){ 
		//$kode=$this->session->userdata('idadmin');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode); 

		$x['data'] = $this->m_usaha->get_detail($id)->row_array(); 
		$x['data_sektor'] = $this->m_usaha->get_detail($id)->result(); 
		$x['data_sub_sektor'] = $this->m_usaha->get_detail($id)->result(); 

		$x['data_komoditas'] = $this->m_usaha->get_data_komoditas(); 
		$x['data_sumber_modal'] = $this->m_usaha->get_data_sumber_modal()->result(); 
		$x['data_status_kepemilikan'] = $this->m_usaha->get_data_status_kepemilikan()->result(); 
		$x['data_sektor_usaha'] = $this->m_usaha->get_data_sektor_usaha()->result(); 
		$x['data_sub_sektor_usaha'] = $this->m_usaha->get_data_sub_sektor_usaha()->result(); 
		$x['data_kabupaten'] = $this->m_wilayah->get_all_kabupaten()->result(); 

		$x['data_indikator_usaha'] = $this->m_indikator_usaha->get_detail_by_id_usaha($id)->result(); 
		$x['data_produk'] = $this->m_produk->get_detail_by_id_usaha($id)->result(); 
		$x['data_sarana'] = $this->m_sarana->get_detail_by_id_usaha($id)->result(); 
		$x['data_legalitas'] = $this->m_legalitas->get_detail_by_id_usaha($id)->result(); 
		$x['data_tenaga_kerja'] = $this->m_tenaga_kerja->get_detail_by_id_usaha($id)->result(); 
		$x['data_media_sosial'] = $this->m_media_sosial->get_detail_by_id_usaha($id)->result(); 
		$x['data_pelatihan'] = $this->m_pelatihan->get_detail_by_id_usaha($id)->result(); 


		$x['id'] = $id; 

		
		$check_indikator_usaha = checkIfEmpty('detail_indikator_usaha', 'id_usaha', $id);		
		$check_produk = checkIfEmpty('detail_produk', 'id_usaha', $id);	
		$check_legalitas = checkIfEmpty('detail_legalitas', 'id_usaha', $id);		
		$check_sarana = checkIfEmpty('detail_indikator_usaha', 'id_usaha', $id);		
		$check_tenaga_kerja = checkIfEmpty('detail_koperasi_tenaga_kerja', 'id_usaha', $id);		
		$check_media_sosial = checkIfEmpty('detail_media_sosial', 'id_usaha', $id);		
		$check_pelatihan = checkIfEmpty('detail_riwayat_pelatihan', 'id_usaha', $id);			
	

		$this->session->set_flashdata('msg', 'Berhasil');
		$this->load->view('admin/v_edit_usaha',$x); 
	}

	

	function tambah($id) {

		
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){   
			
			
			$x['data'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  

			$x['cek_indikator_usaha'] = $this->m_usaha->get_data_komoditas()->result();  
			 
			$x['data_komoditas'] = $this->m_usaha->get_data_komoditas()->result();  
			$x['data_sumber_modal'] = $this->m_usaha->get_data_sumber_modal()->result(); 
			$x['data_status_kepemilikan'] = $this->m_usaha->get_data_status_kepemilikan()->result(); 
			$x['data_sektor_usaha'] = $this->m_usaha->get_data_sektor_usaha()->result(); 
			$x['data_sub_sektor_usaha'] = $this->m_usaha->get_data_sub_sektor_usaha()->result(); 
			$x['data_kabupaten'] = $this->m_wilayah->get_all_kabupaten()->result(); 

		
			
			
			$this->load->view('admin/v_tambah_usaha',$x);
		}else{
			redirect('administrator');
		}
	}



	

   function check_data(){
	   $this->form_validation->set_rules('username', 'Username', 'is_unique[relawan.username]');
	   if ($this->form_validation->run() == FALSE) {
		echo $this->session->set_flashdata('msg','exist');
		redirect('admin/relawan');
	   } else {
		   $this->save_data();
	   }
   }


	function save_data(){

		$nama_usaha=$this->input->post('nama_usaha');
		$bentuk_usaha=$this->input->post('bentuk_usaha');
		$npwp_usaha=$this->input->post('npwp_usaha');
		$th_berdiri=$this->input->post('th_berdiri');
		$no_izin=$this->input->post('no_izin');
		$sektor_usaha=$this->input->post('sektor_usaha');
		$sub_sektor_usaha=$this->input->post('sub_sektor_usaha');
		$kepemilikan_koperasi=$this->input->post('kepemilikan_koperasi');

		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$npwp_pimpinan=$this->input->post('npwp_pimpinan');
		$nik=$this->input->post('nik');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$pendidikan_terakhir=$this->input->post('pendidikan_terakhir');
		
		$alamat=$this->input->post('alamat');
		$jalan=$this->input->post('jalan');
		$desa=$this->input->post('desa');
		$kode_pos=$this->input->post('kode_pos');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');

		$komoditas=$this->input->post('komoditas');
		$merk_produk=$this->input->post('merk_produk');
		$usaha_lain=$this->input->post('usaha_lain');

		$alamat_pemilik=$this->input->post('alamat_pemilik');
		$jalan_pemilik=$this->input->post('jalan_pemilik');
		$desa_pemilik=$this->input->post('desa_pemilik');
		$kode_pos_pemilik=$this->input->post('kode_pos_pemilik');
		$kecamatan_pemilik=$this->input->post('kecamatan_pemilik');
		$kabupaten_pemilik=$this->input->post('kabupaten_pemilik');
		//$jml_karyawan=$this->input->post('jml_karyawan');
		$kapasitas_produksi=$this->input->post('kapasitas_produksi');
		$satuan_produksi=$this->input->post('satuan_produksi');
		$periode_produksi=$this->input->post('periode_produksi');
		$status_kepemilikan=$this->input->post('status_kepemilikan');
		//$status_kepengurusan=$this->input->post('status_kepengurusan');
		$status_kepemilikan_tempat=$this->input->post('status_kepemilikan_tempat');
		$metode_pemasaran=$this->input->post('metode_pemasaran');
		//$sumber_modal=$this->input->post('sumber_modal');
		$skala_pasar=$this->input->post('skala_pasar');
		$luas_lahan=$this->input->post('luas_lahan');
		$periode_tanam=$this->input->post('periode_tanam');
		$telpon=$this->input->post('telpon');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		//$level=$this->input->post('xlevel');




		$data=array(
			'nama_usaha'=>$nama_usaha,
			'th_berdiri'=>$th_berdiri,
			'no_izin'=>$no_izin,
			'bentuk_usaha'=>$bentuk_usaha,
			'no_npwp_usaha'=>$npwp_usaha,
			'nama_pimpinan'=>$nama_pimpinan,
			'no_npwp_pribadi'=>$npwp_pimpinan,
			'jenis_kelamin'=>$jenis_kelamin,
			'pendidikan_terakhir'=>$pendidikan_terakhir,
			'nik'=>$nik,
			'sektor_usaha'=>$sektor_usaha,
			'sub_sektor_usaha'=>$sub_sektor_usaha,
			'is_anggota_koperasi'=>$kepemilikan_koperasi,

			'alamat'=>$alamat,
			'jalan'=>$jalan,
			'desa'=>$desa,
			'kode_pos'=>$kode_pos,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			
			'alamat_pemilik'=>$alamat_pemilik,
			'jalan_pemilik'=>$jalan_pemilik,
			'desa_pemilik'=>$desa_pemilik,
			'kode_pos_pemilik'=>$kode_pos_pemilik,
			'kecamatan_pemilik'=>$kecamatan_pemilik,
			'kabupaten_pemilik'=> $kabupaten_pemilik,

			'komoditas'=>$komoditas,
			'merek_produk'=>$merk_produk,
			'usaha_lain'=>$usaha_lain,
			//'jml_karyawan'=>$jml_karyawan,
			'kapasitas_produksi'=>$kapasitas_produksi,
			'satuan_produksi'=>$satuan_produksi,
			'periode_produksi'=>$periode_produksi,
			'status_kepemilikan'=>$status_kepemilikan,
			'status_kepemilikan_tempat'=>$status_kepemilikan_tempat,
			'metode_pemasaran'=>$metode_pemasaran,
			//'sumber_modal'=>$sumber_modal,
			'skala_pasar'=>$skala_pasar,
			'luas_lahan'=>$luas_lahan,
			'periode_tanam'=>$periode_tanam,
			'telpon'=>$telpon,
			'email'=>$email,
			'website'=>$website,
			'id_user'=>$_SESSION['idadmin']
		);

	
		$this->m_usaha->insert($data);

		$get_last_id = getLastID('usaha', 'id');
		redirect('admin/usaha/edit/'.$get_last_id['id']);
}

	
function update_data(){
 
		$id=$this->input->post('id');
		$nama_usaha=$this->input->post('nama_usaha');
		$bentuk_usaha=$this->input->post('bentuk_usaha');
		$npwp_usaha=$this->input->post('npwp_usaha');
		$th_berdiri=$this->input->post('th_berdiri');
		$no_izin=$this->input->post('no_izin');
		$sektor_usaha=$this->input->post('sektor_usaha');
		$sub_sektor_usaha=$this->input->post('sub_sektor_usaha');
		$kepemilikan_koperasi=$this->input->post('kepemilikan_koperasi');

		$nama_pimpinan=$this->input->post('nama_pimpinan');
		$npwp_pimpinan=$this->input->post('npwp_pimpinan');
		$nik=$this->input->post('nik');
		$jenis_kelamin=$this->input->post('jenis_kelamin');
		$pendidikan_terakhir=$this->input->post('pendidikan_terakhir');
		
		$alamat=$this->input->post('alamat');
		$jalan=$this->input->post('jalan');
		$desa=$this->input->post('desa');
		$kode_pos=$this->input->post('kode_pos');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');

		$komoditas=$this->input->post('komoditas');
		$merk_produk=$this->input->post('merk_produk');
		$usaha_lain=$this->input->post('usaha_lain');

		$alamat_pemilik=$this->input->post('alamat_pemilik');
		$jalan_pemilik=$this->input->post('jalan_pemilik');
		$desa_pemilik=$this->input->post('desa_pemilik');
		$kode_pos_pemilik=$this->input->post('kode_pos_pemilik');
		$kecamatan_pemilik=$this->input->post('kecamatan_pemilik');
		$kabupaten_pemilik=$this->input->post('kabupaten_pemilik');
		//$jml_karyawan=$this->input->post('jml_karyawan');
		$kapasitas_produksi=$this->input->post('kapasitas_produksi');
		$satuan_produksi=$this->input->post('satuan_produksi');
		$periode_produksi=$this->input->post('periode_produksi');
		$status_kepemilikan=$this->input->post('status_kepemilikan');
		//$status_kepengurusan=$this->input->post('status_kepengurusan');
		$status_kepemilikan_tempat=$this->input->post('status_kepemilikan_tempat');
		$metode_pemasaran=$this->input->post('metode_pemasaran');
		//$sumber_modal=$this->input->post('sumber_modal');
		$skala_pasar=$this->input->post('skala_pasar');
		$luas_lahan=$this->input->post('luas_lahan');
		$periode_tanam=$this->input->post('periode_tanam');
		$telpon=$this->input->post('telpon');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		//$level=$this->input->post('xlevel');




		$data=array(
			'nama_usaha'=>$nama_usaha,
			'th_berdiri'=>$th_berdiri,
			'no_izin'=>$no_izin,
			'bentuk_usaha'=>$bentuk_usaha,
			'no_npwp_usaha'=>$npwp_usaha,
			'nama_pimpinan'=>$nama_pimpinan,
			'no_npwp_pribadi'=>$npwp_pimpinan,
			'jenis_kelamin'=>$jenis_kelamin,
			'pendidikan_terakhir'=>$pendidikan_terakhir,
			'nik'=>$nik,
			'sektor_usaha'=>$sektor_usaha,
			'sub_sektor_usaha'=>$sub_sektor_usaha,
			'is_anggota_koperasi'=>$kepemilikan_koperasi,

			'alamat'=>$alamat,
			'jalan'=>$jalan,
			'desa'=>$desa,
			'kode_pos'=>$kode_pos,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			
			'alamat_pemilik'=>$alamat_pemilik,
			'jalan_pemilik'=>$jalan_pemilik,
			'desa_pemilik'=>$desa_pemilik,
			'kode_pos_pemilik'=>$kode_pos_pemilik,
			'kecamatan_pemilik'=>$kecamatan_pemilik,
			'kabupaten_pemilik'=> $kabupaten_pemilik,

			'komoditas'=>$komoditas,
			'merek_produk'=>$merk_produk,
			'usaha_lain'=>$usaha_lain,
			//'jml_karyawan'=>$jml_karyawan,
			'kapasitas_produksi'=>$kapasitas_produksi,
			'satuan_produksi'=>$satuan_produksi,
			'periode_produksi'=>$periode_produksi,
			'status_kepemilikan'=>$status_kepemilikan,
			'status_kepemilikan_tempat'=>$status_kepemilikan_tempat,
			'metode_pemasaran'=>$metode_pemasaran,
			//'sumber_modal'=>$sumber_modal,
			'skala_pasar'=>$skala_pasar,
			'luas_lahan'=>$luas_lahan,
			'periode_tanam'=>$periode_tanam,
			'telpon'=>$telpon,
			'email'=>$email,
			'website'=>$website,
			'id_user'=>$_SESSION['idadmin']
		);

	$this->m_usaha->update($id, $data);
	redirect('admin/usaha');
}



public function import_excel(){ 

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
		'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
		'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

			if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

			 
			    $arr_file = explode('.', $_FILES['file']['name']); 
			    $extension = end($arr_file);
			 
			    if('csv' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			    } else if('xls' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			    }
				else {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

				}
			 
			    $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
			     
			    $rowData = $spreadsheet->getActiveSheet()->toArray();
				for($i = 1;$i < count($rowData);$i++)
					{	

				    $data = array(	
						'nama_usaha'=>$rowData[$i][1],
						'nama_pimpinan'=>$rowData[$i][2],
						'th_berdiri'=>$rowData[$i][3],
						'no_izin'=>$rowData[$i][4],
						'nik'=>$rowData[$i][5],
						'sektor_usaha'=>$rowData[$i][6],
						'sub_sektor_usaha'=>$rowData[$i][7],
						'alamat'=>$rowData[$i][8],
						'desa'=>$rowData[$i][9],
						'kecamatan'=>$rowData[$i][10],
						'kabupaten'=> $rowData[$i][11],
						'komoditas'=>$rowData[$i][12],
						'jml_karyawan'=>$rowData[$i][13],
						'kapasitas_produksi'=>$rowData[$i][14],
						'satuan_produksi'=>$rowData[$i][15],
						'periode_produksi'=>$rowData[$i][16],
						'status_kepemilikan'=>$rowData[$i][17],
						'status_kepemilikan_tempat'=>$rowData[$i][18],
						'metode_pemasaran'=>$rowData[$i][19],
						'sumber_modal'=>$rowData[$i][20],
						'skala_pasar'=>$rowData[$i][21],
						'luas_lahan'=>$rowData[$i][22],
						'telpon'=>$rowData[$i][23],
						'email'=>$rowData[$i][24],
						'website'=>$rowData[$i][25],
						'id_user'=>$_SESSION['idadmin']
				    	);
						$this->m_usaha->insert($data);
				   
			    }
				echo $this->session->set_flashdata('Import berhasil.','success-success');
				redirect('admin/usaha');
			}
			
}


public function import_update_excel(){
	$unit_arsip=$this->session->kode_uk_up;
			  
	$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
	'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
	'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

		if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

		 
			$arr_file = explode('.', $_FILES['file']['name']); 
			$extension = end($arr_file);
		 
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if('xls' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

			}
		 
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			 
			$rowData = $spreadsheet->getActiveSheet()->toArray();

			for($i = 1;$i < count($rowData);$i++)
			{	
				$dap_id = $rowData[$i][0];
				$unit_arsip_excel = $rowData[$i][1];
				$tgl_akhir_aktif = $rowData[$i][17];
				$tgl_akhir_inaktif = $rowData[$i][18];
				$deskripsi = $rowData[$i][19];

				if ($unit_arsip != "SEKPROV") {
					if ($unit_arsip != $unit_arsip_excel) {

						echo "Kode unit arsip tidak sesuai untuk ".$unit_arsip." dengan ".$unit_arsip_excel."</br>";
						continue;

					}
				}



				$data = array(						
						"unit_arsip"=> $unit_arsip_excel,
						"nomor_berkas"=> $rowData[$i][2],
						"nomor_arsip"=> $rowData[$i][3],
						"kode_klasifikasi"=> $rowData[$i][4],
						"uraian"=> str_replace("'"," ", $rowData[$i][5]),
						"tgl_cipta"=> $rowData[$i][6],
						"jumlah_satuan"=> $rowData[$i][7],
						"jenis"=> $rowData[$i][8],
						"pencipta"=> $rowData[$i][9],
						"media"=> $rowData[$i][10],
						"kondisi"=> $rowData[$i][11],
						"lokasi_simpan"=> $rowData[$i][12],
						"tingkat_perkembangan"=> $rowData[$i][13],
						"nasib_akhir"=> $rowData[$i][14],
						"arsip_vital"=> $rowData[$i][15],
						"keamanan"=> $rowData[$i][16],
						"tgl_akhir_aktif"=> $tgl_akhir_aktif,
						"tgl_akhir_inaktif"=> $tgl_akhir_inaktif, 
						"deskripsi"=>$deskripsi
					);
					$this->m_usaha->update($dap_id, $data);
			   
			}

			$this->session->set_flashdata('Import berhasil.','success-success');
			redirect('admin/usaha');
		  
		}
				
		}


		function delete_data($id){
			
			$this->m_usaha->delete($id);
				echo $this->session->set_flashdata('msg','success-hapus');
				redirect('admin/usaha');
		}


		function delete_data_verifikasi($id){
			
			$this->m_usaha->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/verifikasi');
		}


		

		//INDIKATOR USAHA
		function save_data_indikator_usaha($id_usaha){
	
				$tahun=$this->input->post('tahun');
				$modal_sendiri=$this->input->post('modal_sendiri');
				$modal_luar=$this->input->post('modal_luar');
				$nilai_aset=$this->input->post('nilai_aset');
				$nilai_omzet=$this->input->post('nilai_omzet');
		
				$data=array(
					'id_usaha'=>$id_usaha,
					'tahun'=>$tahun,
					'nilai_modal_sendiri'=>$modal_sendiri,
					'nilai_modal_luar'=>$modal_luar,
					'nilai_aset'=>$nilai_aset,
					'nilai_omzet'=>$nilai_omzet
				);
		
			$this->m_indikator_usaha->insert($data);
			redirect('admin/usaha/edit/'.$id_usaha);
		}

		
		//PRODUK
		function save_data_produk($id_usaha){
	
			$nama_produk=$this->input->post('nama_produk');
			$deskripsi=$this->input->post('deskripsi');
			$harga=$this->input->post('harga');
	
			$data=array(
				'id_usaha'=>$id_usaha,
				'nama_produk'=>$nama_produk,
				'deskripsi'=>$deskripsi,
				'harga'=>$harga
			);
	
		$this->m_produk->insert($data);
		redirect('admin/usaha/edit/'.$id_usaha);
	}

	//SARANA
	function save_data_sarana($id_usaha){

			$sarana=$this->input->post('sarana');

			$data=array(
				'id_usaha'=>$id_usaha,
				'nama_sarana_fasilitas_alat'=>$sarana
			);

		$this->m_sarana->insert($data);
		redirect('admin/usaha/edit/'.$id_usaha);
	}


	//LEGALITAS
	function save_data_legalitas($id_usaha){

		$nama_izin=$this->input->post('nama_izin');
		$tahun_izin=$this->input->post('tahun_izin');
		$no_izin=$this->input->post('nomor_izin');

		$data=array(
			'id_usaha'=>$id_usaha,
			'nama_izin'=>$nama_izin,
			'th_izin'=>$tahun_izin,
			'no_izin'=>$no_izin
		);

	$this->m_legalitas->insert($data);
	redirect('admin/usaha/edit/'.$id_usaha);
	}

	//TENAGA KERJA
	function save_data_tenaga_kerja($id_usaha){ 

		$nama_koperasi=$this->input->post('tahun');
		$no_badan_hukum=$this->input->post('tahun');
		$alamat=$this->input->post('tahun');
		$tahun=$this->input->post('tahun');
		$anggota_laki_laki=$this->input->post('anggota_laki_laki');
		$anggota_perempuan=$this->input->post('anggota_perempuan');
		$pengurus_laki_laki=$this->input->post('pengurus_laki_laki');
		$pengurus_perempuan=$this->input->post('pengurus_perempuan');
		$pengawas_laki_laki=$this->input->post('pengawas_laki_laki');
		$pengawas_perempuan=$this->input->post('pengawas_perempuan');
		$manajer_laki_laki=$this->input->post('manajer_laki_laki');
		$manajer_perempuan=$this->input->post('manajer_perempuan'); 
		$karyawan_laki_laki=$this->input->post('karyawan_laki_laki');
		$karyawan_perempuan=$this->input->post('karyawan_perempuan');

		$data=array( 
			'id_usaha'=>$id_usaha,
			'tahun'=>$tahun,
			'nama_koperasi'=>$nama_koperasi,
			'no_badan_hukum'=>$no_badan_hukum,
			'alamat'=>$alamat,
			'anggota_laki_laki'=>$anggota_laki_laki,
			'anggota_perempuan'=>$anggota_perempuan,
			'pengurus_laki_laki'=>$pengurus_laki_laki,
			'pengurus_perempuan'=>$pengurus_perempuan,
			'pengawas_laki_laki'=>$pengawas_laki_laki,
			'pengawas_perempuan'=>$pengawas_perempuan,
			'manajer_laki_laki'=>$manajer_laki_laki,
			'manajer_perempuan'=>$manajer_perempuan,
			'karyawan_laki_laki'=>$karyawan_laki_laki,
			'karyawan_perempuan'=>$karyawan_perempuan
		);

	$this->m_tenaga_kerja->insert($data);
	redirect('admin/usaha/edit/'.$id_usaha);
	}

	//MEDIA SOSIAL
	function save_data_media_sosial($id_usaha){ 

		$nama_media=$this->input->post('nama_media');
		$link=$this->input->post('link');

		$data=array(
			'id_usaha'=>$id_usaha,
			'media_sosial'=>$nama_media,
			'link'=>$link
		);

	$this->m_media_sosial->insert($data);
	redirect('admin/usaha/edit/'.$id_usaha);
	}

	//PELATIHAN
	function save_data_pelatihan($id_usaha){ 

		$tahun=$this->input->post('tahun');
		$nama_pelatihan=$this->input->post('nama_pelatihan');
		$penyelenggara=$this->input->post('penyelenggara');

		$data=array(
			'id_usaha'=>$id_usaha,
			'tahun'=>$tahun,
			'nama_pelatihan'=>$nama_pelatihan,
			'penyelenggara'=>$penyelenggara
		);

	$this->m_pelatihan->insert($data);
	redirect('admin/usaha/edit/'.$id_usaha);
	}
		
	function delete_data_indikator_usaha($id, $id_usaha){	
		$this->m_indikator_usaha->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_produk($id, $id_usaha){	
		$this->m_produk->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_legalitas($id, $id_usaha){	
		$this->m_legalitas->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_sarana($id, $id_usaha){	
		$this->m_sarana->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_tenaga_kerja($id, $id_usaha){	
		$this->m_tenaga_kerja->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_media_sosial($id, $id_usaha){	
		$this->m_media_sosial->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

	function delete_data_pelatihan($id, $id_usaha){	
		$this->m_pelatihan->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/usaha/edit/'.$id_usaha);
	}

}