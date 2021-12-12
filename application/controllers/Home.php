<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_usaha');
	}
	function index(){
			$x['semua']=$this->m_usaha->get_total()->row_array();

			$this->load->view('depan/v_home',$x);
	}

}
