<?php

class Crudpinjambarang extends CI_Controller
{
	private $_table = "tb_barang";
	private $view = "view_barang";
	private $tbl_pinjambarang = "tbl_pinjambarang";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mo_pinjambarang');
		$this->load->model('mo_menu');
	}
	function kepinjambarang()
	{
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang';
		// $this->load->view('barang/Vi_pinjambarang');
		$this->load->view('menu', $data);
	}
	function kepinjambarang_user()
	{
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang_user';
		$this->load->view('menu2', $data);
	}
	function tomaster()
	{
		$this->mo_pinjambarang->save_master();
	}

	function tomaster_user()
	{
		$this->mo_pinjambarang->save_master_user();
	}

	function todetail()
	{
		$this->mo_pinjambarang->save_detail();
	}

	function todetail_user()
	{
		$this->mo_pinjambarang->save_detail_user();
	}

	function hapus()
	{
		$id =  $this->uri->segment(3);
		$idpb =  $this->uri->segment(4);
		$where = array('id_barang' => $id, 'id_pb' => $idpb);
		$this->mo_pinjambarang->updateBeforeDelete($id,$idpb);
		$this->mo_pinjambarang->hapus_barang($where, 'tbl_detailpb');
		$wherespt = array('id_pb' => $idpb);
		$this->mo_pinjambarang->tampillagi($wherespt);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus barang</div>');
	}

	function hapus_user()
	{
		$id =  $this->uri->segment(3);
		$idpb =  $this->uri->segment(4);
		$where = array('id_barang' => $id, 'id_pb' => $idpb);
		$this->mo_pinjambarang->updateBeforeDelete($id,$idpb);
		$this->mo_pinjambarang->hapus_barang($where, 'tbl_detailpb');
		$wherespt = array('id_pb' => $idpb);
		$this->mo_pinjambarang->tampillagi_user($wherespt);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus barang</div>');
	}
	function hapusall($id)
	{
		$where = array('id_pb' => $id);
		$this->mo_pinjambarang->hapus_detail($where, 'tbl_detailpb');
		$this->mo_pinjambarang->hapus_master($where, 'tbl_pinjambarang');
		redirect('crudpinjambarang/kepinjambarang');
	}

	public function accpinjam_barang($id)
	{

		$detail = $this->mo_pinjambarang->get_detail($id);
		$data['detail'] = $detail;
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_accBarang';
		$this->load->view('menu', $data);
	}

	public function accpinjam_barang_user($id)
	{

		$detail = $this->mo_pinjambarang->get_detail($id);
		$data['detail'] = $detail;
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_accBarang_user';
		$this->load->view('menu2', $data);
	}

	public function aksipinjam_barang()
	{
		$idpb =  $this->uri->segment(3);
		$nopb =  $this->uri->segment(4);

		$wi = array('id_pb' => $idpb);
		$wn = array('no_pb' => $nopb);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wn)->result();
		$this->db->where('p.id_pb', $data);

	}

	public function edit($id)
	{
		$where = array('id_pb' => $id);
		$data['detail']	 = $this->mo_pinjambarang->edit_data($where, 'tbl_pinjambarang')->result();
		$this->load->view('Laporanbarang/kelaporan', $data);
	}

	public function update()
	{
		$id = $this->input->post('id_pb', TRUE);
		$action=$this->input->post("action",TRUE);

		$queryupdate = $this->mo_pinjambarang->updateStatus($id,$action);
		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanbarang/kelaporan');
		}
		/*echo $action;
		die();

		$id = $this->input->post('id_pb', TRUE);
		$nopb = $this->input->post('no_pb', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjambarang->updatedata($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanbarang/kelaporan');
		}*/
	}

	public function tolak()
	{
		$id = $this->input->post('id_pb', TRUE);
		$nopb = $this->input->post('no_pb', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjambarang->tolak($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanbarang/kelaporan');
		}
	}

	public function kembali()
	{
		$id = $this->input->post('id_pb', TRUE);
		$nopb = $this->input->post('no_pb', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjambarang->kembali($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanbarang/kelaporan');
		}
	}

	public function kembali_user()
	{
		$id = $this->input->post('id_pb', TRUE);
		$nopb = $this->input->post('no_pb', TRUE);
		$nospt = $this->input->post('no_spt', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$tanggalkembali = $this->input->post('tanggal_kembali', TRUE);
		$nama1 = $this->input->post('nama1', TRUE);
		$nama2 = $this->input->post('nama2', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$status = $this->input->post('status', TRUE);

		$queryupdate = $this->mo_pinjambarang->kembali($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status);

		if ($queryupdate) {
			$pesansukses = '<div class="alert alert-success">Data berhasil diupdate</div>';
			redirect('Laporanbarang/kelaporan_user');
		}
	}

	public function cancel($id)
	{
		$where = array('id_pb' => $id);
		$this->mo_pinjambarang->cancel($where, 'tbl_pinjambarang');
		$this->mo_pinjambarang->cancel_detail($where, 'tbl_detailpb');
		redirect('Crudpinjambarang/kepinjambarang');
	}

	public function cancel_user($id)
	{
		$where = array('id_pb' => $id);
		$this->mo_pinjambarang->cancel($where, 'tbl_pinjambarang');
		$this->mo_pinjambarang->cancel_detail($where, 'tbl_detailpb');
		redirect('Crudpinjambarang/kepinjambarang_user');
	}
}
