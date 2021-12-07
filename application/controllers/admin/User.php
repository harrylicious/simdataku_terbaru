<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_usaha');
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_target_verifikasi'); 
		$this->m_pengunjung->count_visitor();  
	}

	function index(){ 
		$kode_admin = $this->session->userdata('username'); 
		if ($_SESSION['level'] == "superadmin") {
			$x['data'] = $this->m_user->get_all();  
		}
		else {
			$x['data'] = $this->m_user->get_detail_by_admin($kode_admin)->result();  
		}
		$this->load->view('admin/v_user', $x); 
	}

	function ubah_password(){ 
		
		$this->load->view('admin/v_ubah_password');
	}
	

	function tambah() {
		$this->load->view('admin/v_tambah_user');
	}
	

    function edit($id) { 

		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap'); 

		$x['data'] = $this->m_user->get_detail($id)->row_array();  
		$this->load->view('admin/v_edit_user', $x);
	}

    

        
    function save_data(){
		$kode_admin = $this->session->userdata('username'); 

		$kode_user=$this->input->post('kode_user');
		$username=$this->input->post('username'); 
		$email=$this->input->post('email');
		$telpon=$this->input->post('telpon');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$bidang=$this->input->post('bidang');
		$level=$this->input->post('level');
		$password=MD5($this->input->post('password'));
		//$level=$this->input->post('xlevel');
	 
	
		$data=array(
			'kode_user'=>$kode_user,
			'nama_lengkap'=>$nama_lengkap,
			'alamat'=>$alamat,
			'desa'=>$desa,
			'kecamatan'=>$kecamatan,
			'kabupaten'=>$kabupaten,
			'kode_admin'=>$kode_admin,
			'bidang'=>$bidang,
			'level'=>$level,
			'telp'=> $telpon,
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
		);
 

        $this->m_user->insert($data);
        redirect('admin/user');
    }

    function update_data($id){

		$kode_admin = $this->session->userdata('username'); 

		$kode_user=$this->input->post('kode_user');
		$username=$this->input->post('username'); 
		$email=$this->input->post('email');
		$telpon=$this->input->post('telpon');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$alamat=$this->input->post('alamat');
		$desa=$this->input->post('desa');
		$kecamatan=$this->input->post('kecamatan');
		$kabupaten=$this->input->post('kabupaten');
		$bidang=$this->input->post('bidang');
		$level=$this->input->post('level');
		$password=MD5($this->input->post('password'));
		//$level=$this->input->post('xlevel');
	 
	
		$data=array(
			'kode_user'=>$kode_user,
			'nama_lengkap'=>$nama_lengkap,
			'alamat'=>$alamat,
			'desa'=>$desa,
			'kecamatan'=>$kecamatan,
			'kabupaten'=>$kabupaten,
			'kode_admin'=>$kode_admin,
			'bidang'=>$bidang,
			'level'=>$level,
			'telp'=> $telpon,
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
		);


        $this->m_user->update($id, $data);
        redirect('admin/user');
    }
	
	function update_password($id){

		
		
		$password=$this->input->post('password');
		$password2=$this->input->post('password_ulangi');

		if ($password != $password2) {
			echo "Password tidak sama.";
		}
		else {	
			$data=array(
				'password'=>MD5($password)
			);

			$this->m_user->update($id, $data);
			echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil.</div>');
			redirect('admin/user');
		}

    }
	
	function profil($id) { 
		$idadmin = $this->session->userdata('idadmin');
		
		$x['data'] = $this->m_user->get_detail($id)->row_array(); 
		$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  

		if ($_SESSION['level'] == "relawan") {
			$this->load->view('admin/v_profil_relawan', $x);

		}
		else {
			
		$this->load->view('admin/v_profil_admin', $x);
		}
	}


	function atur_target($id) { 
		$idadmin = $this->session->userdata('idadmin');
		
		$x['data'] = $this->m_user->get_detail($id)->row_array(); 
		$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  

		redirect('admin/usaha/target_verifikasi/'.$id);
	}

	function tambahkan_ke_target($desa, $id_user) {  
		
		$cek = $this->m_usaha->get_data_sebaran_usaha_lengkap_belum_terverifikasi_by_desa(urldecode($desa))->row_array(); 

		$data = array (
			'desa' => $cek['desa'],
			'kecamatan' => $cek['kecamatan'],
			'kabupaten' => $cek['kabupaten'],
			'kode_user' => $id_user

		);

		$this->m_target_verifikasi->insert($data);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil.</div>');
		redirect('admin/usaha/target_verifikasi/'.$id_user);

	}

	function hapus_data_target($desa, $id_user) { 
		


		$this->m_target_verifikasi->delete_target($id_user, urldecode($desa));
		echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Berhasil.</div>');
		redirect('admin/usaha/target_verifikasi/'.$id_user);

	}

	


	function delete_data($id) { 
		$this->m_user->delete($id);
        redirect('admin/user');
	}



}
