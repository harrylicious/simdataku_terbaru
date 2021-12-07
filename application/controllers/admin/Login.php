<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('admin/v_login'); 
    }
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p); 
        //echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){  
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['level']=='admin'){
            $this->session->set_userdata('akses','1');
            $id=$xcadmin['kode_user'];
            $kode_admin=$xcadmin['kode_admin'];
            $nama_lengkap=$xcadmin['nama_lengkap'];
            $alamat=$xcadmin['alamat'];
            $desa=$xcadmin['desa'];
            $kecamatan=$xcadmin['kecamatan'];
            $kabupaten = $xcadmin['kabupaten'];
            $username = $xcadmin['username'];
            $level = $xcadmin['level'];
            $bidang = $xcadmin['bidang'];
            $this->session->set_userdata('idadmin',$id);
            $this->session->set_userdata('kode_admin',$kode_admin);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('nama_lengkap',$nama_lengkap);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('alamat',$alamat);
            $this->session->set_userdata('desa',$desa);
            $this->session->set_userdata('kecamatan',$kecamatan);
            $this->session->set_userdata('kabupaten',$kabupaten);
            $this->session->set_userdata('level',$level);
            $this->session->set_userdata('bidang',$bidang);
            redirect('admin/dashboard');
         }else if($xcadmin['level']=='superadmin'){
            $this->session->set_userdata('akses','1');
            $id=$xcadmin['kode_user'];
            $kode_admin=$xcadmin['kode_admin'];
            $nama_lengkap=$xcadmin['nama_lengkap'];
            $alamat=$xcadmin['alamat'];
            $desa=$xcadmin['desa'];
            $kecamatan=$xcadmin['kecamatan'];
            $kabupaten = $xcadmin['kabupaten'];
            $username = $xcadmin['username'];
            $level = $xcadmin['level'];
            $bidang = $xcadmin['bidang'];
            $this->session->set_userdata('idadmin',$id);
            $this->session->set_userdata('kode_admin',$kode_admin);
            $this->session->set_userdata('username',$username);
            $level = $xcadmin['level'];
            $bidang = $xcadmin['bidang'];
            $this->session->set_userdata('idadmin',$id);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('nama_lengkap',$nama_lengkap);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('alamat',$alamat);
            $this->session->set_userdata('desa',$desa);
            $this->session->set_userdata('kecamatan',$kecamatan);
            $this->session->set_userdata('kabupaten',$kabupaten);
            $this->session->set_userdata('level',$level);
            $this->session->set_userdata('bidang',$bidang);
            redirect('admin/dashboard');
         }
            else {
                $this->session->set_userdata('akses','1');
                $id=$xcadmin['kode_user'];
                $kode_admin=$xcadmin['kode_admin'];
                $nama_lengkap=$xcadmin['nama_lengkap'];
                $alamat=$xcadmin['alamat'];
                $desa=$xcadmin['desa'];
                $kecamatan=$xcadmin['kecamatan'];
                $kabupaten = $xcadmin['kabupaten'];
                $username = $xcadmin['username'];
                $level = $xcadmin['level'];
                $bidang = $xcadmin['bidang'];
                $this->session->set_userdata('idadmin',$id);
                $this->session->set_userdata('kode_admin',$kode_admin);
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('nama_lengkap',$nama_lengkap);
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('alamat',$alamat);
                $this->session->set_userdata('desa',$desa);
                $this->session->set_userdata('kecamatan',$kecamatan);
                $this->session->set_userdata('kabupaten',$kabupaten);
                $this->session->set_userdata('level',$level);
                $this->session->set_userdata('bidang',$bidang);
                redirect('admin/dashboard');
         }

       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('admin/login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
