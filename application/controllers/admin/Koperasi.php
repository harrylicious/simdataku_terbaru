<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Koperasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_koperasi');
		$this->load->model('m_user');
		$this->load->model('m_kegiatan_koperasi');
		$this->load->model('m_anggota_koperasi');
		$this->load->model('m_pengawas_koperasi');
		$this->load->model('m_pengurus_koperasi');
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
		
		$cek = $this->m_koperasi->get_target_verifikasi($idadmin)->row_array();  

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_koperasi->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
		

			$x['total']=$this->m_koperasi->get_total()->row_array();   
			$x['total_semua']=$this->m_koperasi->get_total()->row_array();  



			if ($this->session->userdata('level') == "superadmin") {
				$x['data'] = $this->m_koperasi->get_all();  
				$this->load->view('admin/v_koperasi',$x);
			}
			else if ($this->session->userdata('level') == "admin") { 
				$x['data'] = $this->m_koperasi->get_all_data_koperasi_perkode_admin($username)->result();  
				$this->load->view('admin/v_koperasi_admin',$x);
			}
			else if ($this->session->userdata('level') == "relawan") { 
				$x['data']=$this->m_koperasi->get_all_data_koperasi_perkode_user($idadmin)->result();  
				$this->load->view('admin/v_koperasi',$x);
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

		$cek = $this->m_koperasi->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_koperasi->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_koperasi->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_koperasi->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_koperasi->get_total()->row_array();   
			$x['total_semua']=$this->m_koperasi->get_total()->row_array();  
			
			
			$this->load->view('admin/v_verifikasi_koperasi',$x); 
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

		$terverifikasi = $this->m_koperasi->terverifikasi($id, $data);

		$cek = $this->m_koperasi->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			 
			$x['data_target_verifikasi']=$this->m_koperasi->get_target_verifikasi($idadmin)->result();  
			$x['data_belum_verifikasi']=$this->m_koperasi->get_all_non_verified_desa($cek['desa'], $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_koperasi->get_all_verified_desa($cek['desa'], $idadmin); 
			 

			$x['total']=$this->m_koperasi->get_total()->row_array();   
			$x['total_semua']=$this->m_koperasi->get_total()->row_array();  
 

			$this->load->view('admin/v_verifikasi_koperasi',$x); 
			
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
			$x['data_sebaran_koperasi']=$this->m_koperasi->get_all_sebaran_koperasi_lengkap_belum_terverifikasi()->result();
			$x['data_target_verifikasi']=$this->m_koperasi->get_target_verifikasi($id)->result();
			
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
			$x['data_sebaran_koperasi']=$this->m_koperasi->get_all_sebaran_koperasi_lengkap_belum_terverifikasi()->result();
			$x['data']=$this->m_koperasi->get_all_data_koperasi_perkode_user($id)->result();
			$x['nama_relawan']=$nama;
			
			
			$this->load->view('admin/v_koperasi_relawan',$x);
		}else{
			redirect('administrator');
		}
	}

	//GET DATA BERTINGKAT
	
	//SELECT BERTINGKAT 
	function get_data_kecamatan_perkabupaten()
    {
        $kabupaten=$this->input->post('kabupaten'); 
		$kabupaten=getKodeWilayah("kabupaten", $kabupaten);
        $data=$this->m_wilayah->get_data_kecamatan_perkabupaten($kabupaten)->result(); 
        echo json_encode($data);
    }

	function get_data_desa_perkecamatan()
    {
        $kecamatan=$this->input->post('kecamatan');
		$kecamatan=getKodeWilayah("kecamatan", $kecamatan);
        $data=$this->m_wilayah->get_data_desa_perkecamatan($kecamatan)->result(); 
        echo json_encode($data);
    }

	function get_data_desa_perkabupaten()
    {
        $kabupaten=$this->input->post('kabupaten');
		$kabupaten=getKodeWilayah("kabupaten", $kabupaten);
        $data=$this->m_wilayah->get_data_desa_perkabupaten($kabupaten)->result(); 
        echo json_encode($data);
    }

	function get_data_koperasi_target_verifikasi($desa){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		
		if($this->session->userdata('akses')=='1'){  
			 
			
			$x['data_target_verifikasi']=$this->m_koperasi->get_target_verifikasi($idadmin)->result();  
			$x['data_non_verifikasi']=$this->m_koperasi->get_all_non_verified_desa($desa);  
			$x['data_verifikasi']=$this->m_koperasi->get_all_verified_desa($desa, $idadmin); 
			
			$x['data_belum_verifikasi']=$this->m_koperasi->get_all_non_verified_desa($desa, $idadmin); 
			$x['data_sudah_verifikasi']=$this->m_koperasi->get_all_verified_desa($desa, $idadmin);  

			$x['total']=$this->m_koperasi->get_total()->row_array();   
			$x['total_semua']=$this->m_koperasi->get_total()->row_array();  
			
			$this->load->view('admin/v_verifikasi_koperasi',$x); 
		}else{
			redirect('administrator');
		}
	}

	function edit($id){ 
		//$kode=$this->session->userdata('idadmin');
		//$x['user']=$this->m_koperasi->get_pengguna_login($kode); 

		$x['data'] = $this->m_koperasi->get_detail($id)->row_array(); 
		$x['data_sektor'] = $this->m_koperasi->get_detail($id)->result(); 
		$x['data_sub_sektor'] = $this->m_koperasi->get_detail($id)->result(); 
		$x['data_kabupaten'] = $this->m_wilayah->get_all_kabupaten()->result(); 

 
		$x['data_kegiatan'] = $this->m_kegiatan_koperasi->get_detail_by_id_koperasi($id)->result(); 
		$x['data_anggota'] = $this->m_anggota_koperasi->get_detail_by_id_koperasi($id)->result(); 
		$x['data_pengawas'] = $this->m_pengawas_koperasi->get_detail_by_id_koperasi($id)->result(); 
		$x['data_pengurus'] = $this->m_pengurus_koperasi->get_detail_by_id_koperasi($id)->result(); 

		$x['id'] = $id; 

		
		$check_kegiatan_usaha = checkIfEmpty('detail_koperasi_kegiatan_usaha', 'id_koperasi', $id);		
		$check_anggota = checkIfEmpty('detail_koperasi_anggota', 'id_koperasi', $id);	
		$check_pengawas = checkIfEmpty('detail_koperasi_pengawas', 'id_koperasi', $id);		
		$check_koperasi_pengurus = checkIfEmpty('detail_koperasi_pengurus', 'id_koperasi', $id);			
	

		$this->session->set_flashdata('msg', 'Berhasil');
		$this->load->view('admin/v_edit_koperasi',$x); 
	}

	

	function tambah($id) { 

		
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_koperasi->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){   
			
			
			$x['data'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_target_verifikasi']=$this->m_koperasi->get_target_verifikasi($idadmin)->result();  

			$x['data_kabupaten'] = $this->m_wilayah->get_all_kabupaten()->result(); 

		
			
			
			$this->load->view('admin/v_tambah_koperasi',$x);
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

		$nama_koperasi=$this->input->post('nama_koperasi');
		$tahun_berdiri=$this->input->post('tahun_berdiri');
		$tempat_kedudukan=$this->input->post('tempat_kedudukan');
		$no_badan_hukum=$this->input->post('no_badan_hukum');
		$tgl_badan_hukum=$this->input->post('tgl_badan_hukum');
		$tgl_pad=$this->input->post('tgl_pad');

		$notaris=$this->input->post('notaris_camat_badan_hukum');
		$nomor_akta_perubahan_pad=$this->input->post('no_akta_perubahan_pad');
		$notaris_camat_akta_pd=$this->input->post('notaris_camat_akta_pd');
		$jangka_waktu_pendirian=$this->input->post('jangka_waktu_pendirian');
		
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kodepos=$this->input->post('kodepos');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$provinsi=$this->input->post('provinsi');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');

		$status_koperasi=$this->input->post('status_koperasi');
		
		$no_telpon=$this->input->post('no_telpon'); 
		$nomor_fax=$this->input->post('fax');
		//$level=$this->input->post('xlevel');


		$data=array(
			'nama_koperasi'=>$nama_koperasi,
			'tahun_berdiri'=>$tahun_berdiri,
			'tempat_kedudukan'=>$tempat_kedudukan,
			'no_badan_hukum'=>$no_badan_hukum,
			'tgl_badan_hukum'=>$tgl_badan_hukum,
			'tgl_pad'=>$tgl_pad,
			
			'notaris'=>$notaris,
			'nomor_akta_perubahan_pad'=>$nomor_akta_perubahan_pad,
			'notaris_camat_akta_pd'=>$notaris_camat_akta_pd,
			'jangka_waktu_pendirian'=>$jangka_waktu_pendirian,

			'alamat'=>$alamat,
			'desa'=>$desa,
			'kodepos'=>$kodepos,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			'provinsi'=> $provinsi,
			
			'no_telpon'=>$no_telpon,
			'status_koperasi'=>$status_koperasi,
			'nomor_fax'=>$nomor_fax,
			'id_user'=>$_SESSION['idadmin']
		);

	
		$this->m_koperasi->insert($data);

		$get_last_id = getLastID('koperasi', 'id_koperasi');
		redirect('admin/koperasi/edit/'.$get_last_id['id_koperasi']);
}

	
function update_data($id){
 

		$nama_koperasi=$this->input->post('nama_koperasi');
		$tahun_berdiri=$this->input->post('tahun_berdiri');
		$tempat_kedudukan=$this->input->post('tempat_kedudukan');
		$no_badan_hukum=$this->input->post('no_badan_hukum');
		$tgl_badan_hukum=$this->input->post('tgl_badan_hukum');
		$tgl_pad=$this->input->post('tgl_pad');

		$notaris=$this->input->post('notaris');
		$nomor_akta_perubahan_pad=$this->input->post('nomor_akta_perubahan_pad');
		$notaris_camat_akta_pd=$this->input->post('notaris_camat_akta_pd');
		$jangka_waktu_pendirian=$this->input->post('jangka_waktu_pendirian');
		
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kodepos=$this->input->post('kodepos');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$provinsi=$this->input->post('provinsi');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');

		$status_koperasi=$this->input->post('status_koperasi');
		
		$no_telpon=$this->input->post('no_telpon');
		$nomor_fax=$this->input->post('nomor_fax');

		
		$data=array(
			'nama_koperasi'=>$nama_koperasi,
			'tahun_berdiri'=>$tahun_berdiri,
			'tempat_kedudukan'=>$tempat_kedudukan,
			'no_badan_hukum'=>$no_badan_hukum,
			'tgl_badan_hukum'=>$tgl_badan_hukum,
			'tgl_pad'=>$tgl_pad,
			
			'notaris'=>$notaris_camat_badan_hukum,
			'nomor_akta_perubahan_pad'=>$nomor_akta_perubahan_pad,
			'notaris_camat_akta_pd'=>$notaris_camat_akta_pd,
			'jangka_waktu_pendirian'=>$jangka_waktu_pendirian,

			'alamat'=>$alamat,
			'desa'=>$desa,
			'kodepos'=>$kodepos,
			'kecamatan'=>$kecamatan,
			'kabupaten'=> $kabupaten,
			'provinsi'=> $provinsi,
			
			'no_telpon'=>$no_telpon,
			'status_koperasi'=>$status_koperasi,
			'nomor_fax'=>$nomor_fax,
			'id_user'=>$_SESSION['idadmin']
		);

	$this->m_koperasi->update($id, $data);
	redirect('admin/koperasi');
}



public function import_excel(){ 

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
		'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
		'application/vnd.openxmlformats-officekoperasi.spreadsheetml.sheet');

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
				for($i = 2;$i < count($rowData);$i++)
					{	

				    $data = array(
						'nama_koperasi'=>$rowData[$i][1],
						'tahun_berdiri'=>$rowData[$i][2],
						'tempat_kedudukan'=>$rowData[$i][3],
						'no_badan_hukum'=>$rowData[$i][4],
						'tgl_badan_hukum'=>$rowData[$i][5],
						'tgl_pad'=>$rowData[$i][6],
						
						'notaris'=>$rowData[$i][7],
						'nomor_akta_perubahan_pad'=>$rowData[$i][8],
						'notaris_camat_akta_pd'=>$rowData[$i][9],
						'jangka_waktu_pendirian'=>$rowData[$i][10],
			
						'alamat'=>$rowData[$i][11],
						'desa'=>$rowData[$i][12],
						'kecamatan'=>$rowData[$i][13],
						'kabupaten'=> $rowData[$i][14],
						'provinsi'=> $rowData[$i][15],
						'kodepos'=>$rowData[$i][16],
						
						'no_telpon'=>$rowData[$i][17],
						'status_koperasi'=>$rowData[$i][18],
						'nomor_fax'=>$rowData[$i][19],
						'id_user'=>$_SESSION['idadmin']

				    	);
						$this->m_koperasi->insert($data);
				   
			    }
				echo $this->session->set_flashdata('Import data koperasi berhasil.','success-success');
				redirect('admin/koperasi');
			}
			
}


public function import_update_excel(){
	$unit_arsip=$this->session->kode_uk_up;
			  
	$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
	'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
	'application/vnd.openxmlformats-officekoperasi.spreadsheetml.sheet');

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
					$this->m_koperasi->update($dap_id, $data);
			   
			}

			$this->session->set_flashdata('Import berhasil.','success-success');
			redirect('admin/koperasi');
		  
		}
				
}


		function delete_data($id){
			
			$this->m_koperasi->delete($id);
				echo $this->session->set_flashdata('msg','success-hapus');
				redirect('admin/koperasi');
		}


		function delete_data_verifikasi($id){
			
			$this->m_koperasi->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/koperasi/verifikasi');
		}


		

		//INDIKATOR koperasi
		function save_data_kegiatan_koperasi($id_koperasi){
	
				$nama_kegiatan=$this->input->post('nama_kegiatan');
				$keterangan=$this->input->post('keterangan');
		
				$data=array(
					'id_koperasi'=>$id_koperasi,
					'nama_kegiatan'=>$nama_kegiatan,
					'keterangan'=>$keterangan
				);
		
			$this->m_kegiatan_koperasi->insert($data);
			redirect('admin/koperasi/edit/'.$id_koperasi);
		}

		
		//PRODUK
		function save_data_anggota($id_koperasi){
	
			$tahun=$this->input->post('tahun');
			$anggota=$this->input->post('jumlah_anggota');
			$lelaki=$this->input->post('jumlah_anggota_lelaki');
			$perempuan=$this->input->post('jumlah_anggota_perempuan');
	
			$data=array(
				'id_koperasi'=>$id_koperasi,
				'tahun'=>$tahun,
				'lelaki'=>$lelaki,
				'perempuan'=>$perempuan,
				'anggota'=>$anggota
			);
	
		$this->m_anggota_koperasi->insert($data);
		redirect('admin/koperasi/edit/'.$id_koperasi);
	}

	//SARANA
	function save_data_pengawas($id_koperasi){

			$nama_pengawas=$this->input->post('nama_pengawas');
			$masa_bakti=$this->input->post('masa_bakti');

			$data=array(
				'id_koperasi'=>$id_koperasi,
				'nama_pengawas'=>$nama_pengawas,
				'masa_bakti'=>$masa_bakti
			);

		$this->m_pengawas_koperasi->insert($data);
		redirect('admin/koperasi/edit/'.$id_koperasi);
	}


	//LEGALITAS
	function save_data_pengurus($id_koperasi){

		$ketua=$this->input->post('ketua');
		$sekretaris=$this->input->post('sekretaris');
		$bendahara=$this->input->post('bendahara');

		$data=array(
			'id_koperasi'=>$id_koperasi,
			'ketua'=>$ketua,
			'sekretaris'=>$sekretaris,
			'bendahara'=>$bendahara
		);

	$this->m_pengurus_koperasi->insert($data);
	redirect('admin/koperasi/edit/'.$id_koperasi);
	}

		
	function delete_data_kegiatan_koperasi($id, $id_koperasi){	
		$this->m_kegiatan_koperasi->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/koperasi/edit/'.$id_koperasi);
	}

	function delete_data_anggota($id, $id_koperasi){	
		$this->m_anggota_koperasi->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/koperasi/edit/'.$id_koperasi);
	}

	function delete_data_pengawas($id, $id_koperasi){	
		$this->m_pengawas_koperasi->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/koperasi/edit/'.$id_koperasi);
	}

	function delete_data_pengurus($id, $id_koperasi){	
		$this->m_pengurus_koperasi->delete($id);
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('admin/koperasi/edit/'.$id_koperasi);
	}


}