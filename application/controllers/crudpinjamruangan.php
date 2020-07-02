<?php

class Crudpinjamruangan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mo_pinjamruangan');
		$this->load->model('mo_menu');
		/* if($this->session->userdata('status') != "login"){
			redirect(site_url("Login/masuk"));} */
	}
	function kepinjamruangan()
	{
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan';
		$this->load->view('menu', $data);
	}
	function kepinjamruangan_user()
	{
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan_user';
		$this->load->view('menu2', $data);
	}
	function tomaster()
	{
		$this->mo_pinjamruangan->save_master();
	}
	function tomaster_user()
	{
		$this->mo_pinjamruangan->save_master_user();
	}
	function todetail()
	{
		$this->mo_pinjamruangan->save_detail();
	}
	function todetail_user()
	{
		$this->mo_pinjamruangan->save_detail_user();
	}
	function hapus()
	{
		$id =  $this->uri->segment(3);
		$idpr =  $this->uri->segment(4);
		$where = array('id_ruangan' => $id, 'id_pr' => $idpr);
		$this->mo_pinjamruangan->hapus_ruangan($where, 'tbl_detailpr');
		$wherespt = array('id_pr' => $idpr);
		$this->mo_pinjamruangan->tampillagi($wherespt);
	}
	function hapus_user()
	{
		$id =  $this->uri->segment(3);
		$idpr =  $this->uri->segment(4);
		$where = array('id_ruangan' => $id, 'id_pr' => $idpr);
		$this->mo_pinjamruangan->hapus_ruangan($where, 'tbl_detailpr');
		$wherespt = array('id_pr' => $idpr);
		$this->mo_pinjamruangan->tampillagi_user($wherespt);
	}
	function hapusall($id)
	{
		$where = array('id_pr' => $id);
		$this->mo_pinjamruangan->hapus_detail($where, 'tbl_detailpr');
		$this->mo_pinjamruangan->hapus_master($where, 'tbl_pinjamruangan');
		redirect('crudpinjamruangan/kepinjamruangan');
	}
	function hapusall_user($id)
	{
		$where = array('id_pr' => $id);
		$this->mo_pinjamruangan->hapus_detail($where, 'tbl_detailpr');
		$this->mo_pinjamruangan->hapus_master($where, 'tbl_pinjamruangan');
		redirect('crudpinjamruangan/kepinjamruangan_user');
	}

	public function accpinjam_ruangan($id)
	{
		$detail = $this->mo_pinjamruangan->get_detail($id);
		$data['detail'] = $detail;
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_accRuangan';
		$this->load->view('menu', $data);
	}

	public function accpinjam_ruangan_user($id)
	{

		$detail = $this->mo_pinjamruangan->get_detail($id);
		$data['detail'] = $detail;
		$data['menu2'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_accRuangan_user';
		$this->load->view('menu2', $data);
	}

	public function aksipinjam_ruangan()
	{
		$idpr =  $this->uri->segment(3);
		$nopr =  $this->uri->segment(4);

		$wi = array('id_pr' => $idpr);
		$wn = array('no_pr' => $nopr);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wn)->result();
		$this->db->where('p.id_pr', $data);
	}

	public function update()
	{
		$id = $this->input->post('id_pr', TRUE);
		$action=$this->input->post("action",TRUE);

		$queryupdate = $this->mo_pinjamruangan->updateStatus($id,$action);
		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanruangan/kelaporan');
		}
	}

	public function tolak()
	{
		$id = $this->input->post('id_pr', TRUE);
		$nopr = $this->input->post('no_pr', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjamruangan->tolak($id, $nopr, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanruangan/kelaporan');
		}
	}

	public function kembali()
	{
		$id = $this->input->post('id_pr', TRUE);
		$nopr = $this->input->post('no_pr', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjamruangan->kembali($id, $nopr, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanruangan/kelaporan');
		}
	}

	public function cancel($id)
	{
		$where = array('id_pr' => $id);
		$this->mo_pinjamruangan->cancel($where, 'tbl_pinjamruangan');
		$this->mo_pinjamruangan->cancel_detail($where, 'tbl_detailpr');
		redirect('Crudpinjamruangan/kepinjamruangan');
	}

	public function cancel_user($id)
	{
		$where = array('id_pr' => $id);
		$this->mo_pinjamruangan->cancel($where, 'tbl_pinjamruangan');
		$this->mo_pinjamruangan->cancel_detail($where, 'tbl_detailpr');
		redirect('Crudpinjamruangan/kepinjamruangan_user');
	}
}
