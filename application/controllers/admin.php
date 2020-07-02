<?php

class Admin extends CI_Controller
{

	/*function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk")); //jika tidak login dan diback dari browser akan tetap pada vi_login
		}
	} */

	function __construct()
	{
		parent::__construct();

		$this->load->model('mo_login');
		$this->load->model('mo_menu');
	}

	function index()
	{

		// data variable untuk passing ke view

		$var['pend'] = count($this->mo_login->load_pend());
		$var['conf'] = count($this->mo_login->load_conf());
		$var['cancel'] = count($this->mo_login->load_cancel());

		// tampilan
		//$this->admin_template($var);
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Prosedur Peminjaman Barang dan Ruangan';
		$data['page'] = 'Vi_home';
		$this->load->view('menu', $data);
	}

	function index_user()
	{
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Prosedur Peminjaman Barang dan Ruangan';
		$data['page'] = 'Vi_home_user';
		$this->load->view('menu2', $data);
	}
}
