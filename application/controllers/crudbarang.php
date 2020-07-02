<?php

class Crudbarang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mo_barang');
        $this->load->model('mo_menu');
    }
    function kebarang()
    {

        //$this->load->library('pagination');
        $start = $this->uri->segment(3);
        $row = $this->mo_barang->baris_barang();
        $config['base_url'] = 'http://localhost/Barang-Ruangan/index.php/crudbarang/kebarang/';
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
        $data['tb_barang'] = $this->mo_barang->tampil_data($config['per_page'], $start);
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Barang';
        $data['page'] = 'barang/Vi_daftarbarang';
        $this->load->view('menu', $data);
    }

    function add()
    {
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Barang';
        $data['page'] = 'barang/Vi_addbarang';
        $this->load->view('menu',  $data);
    }


    function save()
    {
        if ($this->input->post('save')) {
            $this->mo_barang->simpan();
            redirect('crudbarang/kebarang', 'refresh');
        } else {
            redirect('crudbarang/add', 'refresh');
        }
    }

    //function updatebarang ($id_barang)
    // {
    //    $data['tb_barang'] = $this->mo_barang->getbarang($id_barang);
    //    $this->load->view('Vi_editbarang',$data);
    // }

    function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['tb_barang'] = $this->mo_barang->edit_barang($where, 'tb_barang')->result();
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Barang';
        $data['page'] = 'barang/Vi_editbarang';
        $this->load->view('menu', $data);
    }

    function updatebarangDb()
    {
        $id_barang = $this->input->post('id');
        $kd = $this->input->post('kd');
        $nb = $this->input->post('nb');
        $merk = $this->input->post('merk');
        $ns = $this->input->post('ns');
        $kb = $this->input->post('kb');
        $unit = $this->input->post('unit');

        $data = array(
            'kode_barang' => $kd,
            'nama_barang' => $nb,
            'merk' => $merk,
            'no_seri' => $ns,
            'kondisi_barang' => $kb,
            'unit' => $unit
        );
        $where = array(
            'id_barang' => $id_barang
        );

        //$kondisi['id_barang'] = $this->input->post('id_barang');
        $this->mo_barang->updatebarang($where, $data, 'tb_barang');
        redirect('crudbarang/kebarang');
    }

    function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->mo_barang->hapus_barang($where, 'tb_barang');
        redirect('crudbarang/kebarang');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['pagination'] = $this->pagination->create_links();
        $data['tb_barang'] = $this->mo_barang->get_keyword($keyword);
        $data['menu'] = $this->mo_menu->tampil();
        $data['title'] = 'Peminjaman Barang';
        $data['page'] = 'barang/Vi_daftarbarang';
        $this->load->view('menu', $data);
    }
}
