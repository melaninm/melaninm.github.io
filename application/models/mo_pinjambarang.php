<?php

class Mo_pinjambarang extends CI_Model
{
	private $_table = "tb_barang";
	private $view = "view_barang";
	private $tbl_pinjambarang = "tbl_pinjambarang";

	function save_master()
	{
		//$idpb = $this->input->post('idpb');
		$id_user = $this->session->userdata("id");
		//$nopb = $this->input->post('nopb');
		$nospt = $this->input->post('nospt');
		$tanggal = $this->input->post('tanggal');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$tujuan = $this->input->post('tujuan');

		//$data['user']  = $this->db->get_where('tbl_login', ['id' => $this->session->userdata('id')])->row_array();
		//$date = date('Y-m-d', now());

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|text/plain';
		$config['max_size']             = 10240;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('surat'))
		{
			redirect(site_url("Crudpinjambarang/kepinjambarang"));
			return;
		}

		$stdate = date('Y-m-d', strtotime($tanggal));
		$fdate  = date('Y-m-d', strtotime($tanggal_kembali));


		$data = array(
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
		$this->db->insert($this->tbl_pinjambarang, $data);
		$insert_id = $this->db->insert_id(); // Last id insert
		$this->db->trans_complete();

		$wn = array('id_pb' => $insert_id);
		$wi = array('id_pb' => $insert_id);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wn)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2';
		$this->load->view('menu', $data);
	}

	function save_master_user()
	{
		//$idpb = $this->input->post('idpb');
		$id_user = $this->session->userdata("id");

		//$nopb = $this->input->post('nopb');
		$nospt = $this->input->post('nospt');
		$tanggal = $this->input->post('tanggal');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$tujuan = $this->input->post('tujuan');

		//$data['user']  = $this->db->get_where('tbl_login', ['id' => $this->session->userdata('id')])->row_array();
		$stdate = date('Y-m-d', strtotime($tanggal));
		$fdate  = date('Y-m-d', strtotime($tanggal_kembali));

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|text/plain';
		$config['max_size']             = 10240;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('surat'))
		{
			redirect(site_url("Crudpinjambarang/kepinjambarang_user"));
			return;
		}


		$data = array(
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
		$this->db->insert($this->tbl_pinjambarang, $data);
		$insert_id = $this->db->insert_id(); // Last id insert
		$this->db->trans_complete();
		
		$wi = array('id_pb' => $insert_id);
		$wn = array('id_pb' => $insert_id);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wn)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2_user';
		$this->load->view('menu2', $data);
	}
	function save_detail()
	{
		$idpb = $this->input->post('idpb');
		$id_barang = $this->input->post('id_barang');
		$unit = $this->input->post('unit');
		$keterangan = $this->input->post('keterangan');

		if ($this->input->post()) { #Check post data available
			$this->load->model('mo_pinjambarang');
			$data = array(
				'id_pb' => $idpb,
				'id_barang' => $id_barang,
				'unitb' => $unit,
				'keterangan' => $keterangan,
			);


			$cek = $this->db->query("SELECT * FROM tb_barang where id_barang='" . $id_barang . "'")->row_array();

			$sto = $cek['unit'];

			$stok = $sto - $unit;

			if ($sto < $unit) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jumlah barang melebihi stok !</div>');
			} else {
				$insert = $this->db->insert('tbl_detailpb', $data);
				if ($insert) {
					$updatestok = $this->db->query("UPDATE tb_barang SET unit='$stok' WHERE id_barang='$id_barang'");
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah barang</div>');
				} else {
					echo "<div><b>Oops!</b> 404 Error Server.</div>";
				}
			}
		}
		$wi = array('id_pb' => $idpb);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wi)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2';
		$this->load->view('menu', $data);
	}

	function save_detail_user()
	{
		$idpb = $this->input->post('idpb');
		$id_barang = $this->input->post('id_barang');
		$unit = $this->input->post('unit');
		$keterangan = $this->input->post('keterangan');
		
		if ($this->input->post()) { #Check post data available
			$this->load->model('mo_pinjambarang');
			$data = array(
				'id_pb' => $idpb,
				'id_barang' => $id_barang,
				'unitb' => $unit,
				'keterangan' => $keterangan,
			);
			$cek = $this->db->query("SELECT * FROM tb_barang where id_barang='" . $id_barang . "'")->row_array();

			$sto = $cek['unit'];

			$stok = $sto - $unit;

			if ($sto < $unit) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jumlah barang melebihi stok !</div>');
			} else {
				$insert = $this->db->insert('tbl_detailpb', $data);
				if ($insert) {
					$updatestok = $this->db->query("UPDATE tb_barang SET unit='$stok' WHERE id_barang='$id_barang'");
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah barang</div>');
				} else {
					echo "<div><b>Oops!</b> 404 Error Server.</div>";
				}
			}
		}
		$wi = array('id_pb' => $idpb);
		$data['view_barang'] = $this->db->get_where($this->view, $wi)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wi)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2_user';
		$this->load->view('menu2', $data);
	}

	function updateBeforeDelete($idBarang,$idPb){
		$whereDetail = array('id_barang' => $idBarang, 'id_pb' => $idPb);
		$datasDetail=$this->db->get_where("tbl_detailpb",$whereDetail)->result();
		$stockDelete=0;
		foreach ($datasDetail as $data) {
			$stockDelete=$stockDelete+$data->unitb;
		}
		$whereBarang=array('id_barang' => $idBarang);
		$dataBarang=$this->db->get_where("tb_barang", $whereBarang)->first_row();
		$stock=$stockDelete+$dataBarang->unit;

		$this->db->query("UPDATE tb_barang SET unit='$stock' WHERE id_barang='$idBarang'");
	}

	function hapus_barang($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tampillagi($wherespt)
	{
		$data['view_barang'] = $this->db->get_where($this->view, $wherespt)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wherespt)->result();
		$data['menu'] = $this->mo_menu->tampil();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2';
		$this->load->view('menu', $data);
	}

	function tampillagi_user($wherespt)
	{
		$data['view_barang'] = $this->db->get_where($this->view, $wherespt)->result();
		$data['tb_barang'] = $this->db->get($this->_table)->result();
		$data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang, $wherespt)->result();
		$data['menu2'] = $this->mo_menu->tampiluser();
		$data['title'] = 'Peminjaman Barang';
		$data['page'] = 'barang/Vi_pinjambarang2_user';
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


	public function get_detail($id)
	{

		$this->db->select('*');
		$this->db->from('tbl_detailpb');
		$this->db->join('tbl_pinjambarang', 'tbl_pinjambarang.id_pb = tbl_detailpb.id_pb', 'left');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tbl_detailpb.id_barang', 'left');
		$this->db->where('tbl_pinjambarang.id_pb', $id);
		return $this->db->get()->result();
	}


	function updatedata($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pb' => $nopb,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pb', $id);
		return $this->db->update('tbl_pinjambarang', $field);
	}

	function updateStatus($id, $status)
	{
		$field = array(
			'status' => $status,
		);
		$this->db->where('id_pb', $id);
		return $this->db->update('tbl_pinjambarang', $field);
	}

	function tolak($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pb' => $nopb,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pb', $id);
		return $this->db->update('tbl_pinjambarang', $field);
	}

	function kembali($id, $nopb, $nospt, $tanggal, $tanggalkembali, $nama1, $nama2, $tujuan, $status)
	{
		$field = array(
			'no_pb' => $nopb,
			'no_spt' => $nospt,
			'tanggal' => $tanggal,
			'tanggal_kembali' => $tanggalkembali,
			'nama1' => $nama1,
			'nama2' => $nama2,
			'status' => $status,
		);
		$this->db->where('id_pb', $id);
		return $this->db->update('tbl_pinjambarang', $field);
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
