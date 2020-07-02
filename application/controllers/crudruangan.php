<?php

class Crudruangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mo_ruangan');
        $this->load->model('mo_menu');
        /* if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk"));} */
    }

    //admin
    function keruangan()
    {
        $start = $this->uri->segment(3);
        $row = $this->mo_ruangan->baris_ruangan();
        $config['base_url'] = 'http://localhost/Barang-Ruangan/index.php/crudruangan/keruangan/';
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
        //$this->load->view('template/header',$data);
        //$this->load->view('user/template/sidebar');
        //$this->load->view('user/template/topbar');
        $this->pagination->initialize($config);
        $data['tb_ruangan'] = $this->mo_ruangan->tampil_data($config['per_page'], $start);
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Ruangan';
        $data['page'] = 'ruangan/Vi_daftarruangan';
        $this->load->view('menu', $data);
        // $this->load->view('user/template/footer');

    }

    function add()
    {
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Ruangan';
        $data['page'] = 'ruangan/Vi_addruangan';
        $this->load->view('menu', $data);
    }


    function save()
    {
        if ($this->input->post('save')) {
            $this->mo_ruangan->simpan();
            redirect('crudruangan/keruangan', 'refresh');
        } else {
            redirect('crudruangan/add', 'refresh');
        }
    }


    function edit($id)
    {
        $where = array('id_ruangan' => $id);
        $data['tb_ruangan'] = $this->mo_ruangan->edit_ruangan($where, 'tb_ruangan')->result();
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Ruangan';
        $data['page'] = 'ruangan/Vi_editruangan';
        $this->load->view('menu', $data);
    }

    function updateruanganDb()
    {
        $id_ruangan = $this->input->post('id');
        $kr = $this->input->post('kr');
        $nr = $this->input->post('nr');
        $st = $this->input->post('st');

        $data = array(
            'kode_ruangan' => $kr,
            'nama_ruangan' => $nr,
            'ruangan' => $st,
        );
        $where = array(
            'id_ruangan' => $id_ruangan
        );

        $this->mo_ruangan->updateruangan($where, $data, 'tb_ruangan');
        redirect('crudruangan/keruangan');
    }

    function hapus($id)
    {
        $where = array('id_ruangan' => $id);
        $this->mo_ruangan->hapus_ruangan($where, 'tb_ruangan');
        redirect('crudruangan/keruangan');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['tb_ruangan'] = $this->mo_ruangan->get_keyword($keyword);
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Ruangan';
        $data['page'] = 'ruangan/Vi_daftarruangan';
        $this->load->view('menu', $data);
    }
}
