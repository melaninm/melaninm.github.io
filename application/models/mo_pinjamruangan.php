<?php

class Mo_pinjamruangan extends CI_Model
{
	private $_table = "tb_ruangan";
	private $view = "view_ruangan";
	private $tbl_pinjamruangan = "tbl_pinjamruangan";
	function save_master()
	{
		//$id_pr = $this->input->post('id_pr');
		$id_user = $this->session->userdata("id");
		//$nopr = $this->input->post('nopr');
		$nospt = $this->input->post('nospt');
		$tanggal = $this->input->post('tanggal');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$tujuan = $this->input->post('tujuan');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|text/plain';
		$config['max_size']             = 10240;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('surat'))
		{
			redirect(site_url("Crudpinjamruangan/kepinjamruangan"));
			return;
		}

		$data = array(
			//'no_pr' => $nopr,
			'id_user' => $id_user,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggal_kembali,
			'nama1' => "Admin Lab FISIP",
			'nama2' => $nama2,
			'tujuan' => $tujuan,
			'status' => "Pending",
			"file_name"=>$this->upload->data("file_name"),
		);
		$this->db->trans_start();
		$this->db->insert($this->tbl_pinjamruangan, $data);
		$insert_id = $this->db->insert_id(); // Last id insert
		$this->db->trans_complete();

		$wi = array('id_pr' => $insert_id);
		$wn = array('id_pr' => $insert_id);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wn)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2';
		$this->load->view('menu', $data);
	}
	function save_master_user()
	{
		//$id_pr = $this->input->post('id_pr');
		$id_user = $this->session->userdata("id");
		//$nopr = $this->input->post('nopr');
		$nospt = $this->input->post('nospt');
		$tanggal = $this->input->post('tanggal');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$tujuan = $this->input->post('tujuan');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|text/plain';
		$config['max_size']             = 10240;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('surat'))
		{
			redirect(site_url("Crudpinjamruangan/kepinjamruangan_user"));
			return;
		}

		$data = array(
			//'id_pr' => $id_pr,
			//'no_pr' => $nopr,
			'id_user' => $id_user,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggal_kembali,
			'nama1' => "Admin Lab FISIP",
			'nama2' => $nama2,
			'tujuan' => $tujuan,
			'status' => "Pending",
			"file_name"=>$this->upload->data("file_name"),
		);
		$this->db->trans_start();
		$this->db->insert($this->tbl_pinjamruangan, $data);
		$insert_id = $this->db->insert_id(); // Last id insert
		$this->db->trans_complete();

		$wi = array('id_pr' => $insert_id);
		$wn = array('id_pr' => $insert_id);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wn)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2_user';
		$this->load->view('menu2', $data);
	}
	function save_detail()
	{
		$id_pr = $this->input->post('idpr');
		$select = $this->input->post('id_ruangan');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'id_pr' => $id_pr,
			'id_ruangan' => $select,
			//'nama_ruangan' => $nr,
			'keterangan' => $keterangan,
		);

		$cek = $this->db->query("SELECT * FROM tb_ruangan where id_ruangan='" . $select . "'")->row_array();

		$sto = $cek['ruangan'];

		$stok = $sto - 1;

		if ($sto < 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ruangan telah terpakai</div>');
		} else {
			$insert = $this->db->insert('tbl_detailpr', $data);
			if ($insert) {
				$updatestok = $this->db->query("UPDATE tb_ruangan SET ruangan='$stok' WHERE id_ruangan='$select'");
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil meminjam ruangan</div>');
			} else {
				echo "<div><b>Oops!</b> 404 Error Server.</div>";
			}
		}

		/*
		$wi = array('id_pr' => $insert_id);
		$wn = array('id_pr' => $insert_id);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wn)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2';
		*/

		// $this->db->insert('tbl_detailpr', $data);
		$wi = array('id_pr' => $id_pr);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wi)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2';
		$this->load->view('menu', $data);
	}
	function save_detail_user()
	{
		$id_pr = $this->input->post('id_pr');
		$select = $this->input->post('id_ruangan');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'id_pr' => $id_pr,
			'id_ruangan' => $select,
			'keterangan' => $keterangan,
		);
		$cek = $this->db->query("SELECT * FROM tb_ruangan where id_ruangan='" . $select . "'")->row_array();

		$sto = $cek['ruangan'];

		$stok = $sto - 1;

		if ($sto < 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ruangan telah terpakai</div>');
		} else {
			$insert = $this->db->insert('tbl_detailpr', $data);
			if ($insert) {
				$updatestok = $this->db->query("UPDATE tb_ruangan SET ruangan='$stok' WHERE id_ruangan='$select'");
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil meminjam ruangan</div>');
			} else {
				echo "<div><b>Oops!</b> 404 Error Server.</div>";
			}
		}

		$wi = array('id_pr' => $id_pr);
		$data['view_ruangan'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wi)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2_user';
		$this->load->view('menu2', $data);
	}
	function hapus_ruangan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tampillagi($wherespt)
	{
		$data['view_ruangan'] = $this->db->get_where($this->view, $wherespt)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wherespt)->result();
		$data['menu'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2';
		$this->load->view('menu', $data);
	}
	function tampillagi_user($wherespt)
	{
		$data['view_ruangan'] = $this->db->get_where($this->view, $wherespt)->result();
		$data['tb_ruangan'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjamruangan'] = $this->db->get_where($this->tbl_pinjamruangan, $wherespt)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Ruangan';
		$data['page'] = 'ruangan/Vi_pinjamruangan2_user';
		$this->load->view('menu2', $data);
	}
	function hapus_detail($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function hapus_master($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function get_detail($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_detailpr');
		$this->db->join('tbl_pinjamruangan', 'tbl_pinjamruangan.id_pr = tbl_detailpr.id_pr', 'left');
		$this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan = tbl_detailpr.id_ruangan', 'left');
		$this->db->where('tbl_pinjamruangan.id_pr', $id);
		return $this->db->get()->result();
	}

	function updatedata($id, $nopr, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pr' => $nopr,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pr', $id);
		return $this->db->update('tbl_pinjamruangan', $field);
	}

	function updateStatus($id, $status)
	{
		$field = array(
			'status' => $status,
		);
		$this->db->where('id_pr', $id);
		return $this->db->update('tbl_pinjamruangan', $field);
	}

	function tolak($id, $nopr, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pr' => $nopr,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pr', $id);
		return $this->db->update('tbl_pinjamruangan', $field);
	}

	function kembali($id, $nopr, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pr' => $nopr,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pr', $id);
		return $this->db->update('tbl_pinjamruangan', $field);
	}

	function cancel($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function cancel_detail($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
