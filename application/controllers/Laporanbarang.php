<?php

class Laporanbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mo_laporan');
        $this->load->model('mo_menu');
        $this->load->helper('tgl_indo');
        $this->load->helper('bilang');
        /* if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk"));} */
    }
    function kelaporan()
    {
        $start = $this->uri->segment(3);
        $row = $this->mo_laporan->baris_barang();
        $config['base_url'] = 'http://localhost/Barang-Ruangan/index.php/Laporanbarang/kelaporan/';
        $config['total_rows'] = $row;
        $config['per_page'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['tbl_pinjambarang'] = $this->mo_laporan->tampil_laporan($config['per_page'], $start);
         $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Laporan Peminjaman Barang';
        $data['page'] = 'barang/Vi_laporan';
        $this->load->view('menu', $data);
    }
    function kelaporan_user()
    {
        // $start = $this->uri->segment(3);
        $row = $this->mo_barang->baris_barang();
        $data['menu2'] = $this->mo_menu->tampiluser();
        $data['title'] = 'Laporan Peminjaman Barang';
        $data['page'] = 'barang/Vi_laporan_user';
        $data['tbl_pinjambarang'] = $this->mo_laporan->tampil_laporan_user();
        $this->load->view('menu2', $data);
    }
    function cetak($id)
    {
        $where = array('id_pb' => $id);
        $data['view_Mlaporan'] = $this->mo_laporan->cetak_laporan($where, 'tbl_pinjambarang')->result();
        $data['view_Dlaporan'] = $this->mo_laporan->cetak_laporan($where, 'view_barang')->result();
        $this->load->view('barang/PrintLaporan', $data);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['pagination'] = $this->pagination->create_links();
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Laporan Peminjaman Barang';
        $data['page'] = 'barang/Vi_laporan';
        $data['tbl_pinjambarang'] = $this->mo_laporan->get_keyword($keyword);
        $this->load->view('menu', $data);
    }

    function hapus($id)
    {
        $where = array('id_pb' => $id);
        $this->mo_laporan->hapus_barang($where, 'tbl_pinjambarang');
        redirect('laporanbarang/kelaporan');
    }

    function hapus_user($id)
    {
        $where = array('id_pb' => $id);
        $this->mo_laporan->hapus_barang($where, 'tbl_pinjambarang');
        redirect('laporanbarang/kelaporan_user');
    }
}
