<?php 

class Mo_laporan extends CI_Model{
	private $_table = "tbl_pinjambarang";
	
	function tampil_laporan($perPage, $start){
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get('tbl_pinjambarang', $perPage, $start)->result();
	}
	function baris_barang()
    {
        return $this->db->get($this->_table)->num_rows();
    }
	function tampil_laporan_user(){
		// $this->db->select('nama_ruangan as nama, kode_ruangan as kode, tanggal as tanggal, alasan,status as status');
		// $this->db->from('tbl_login as u, tb_barang as r, tbl_pinjambarang as p');
		// $this->db->where('p.id_user', $this->session->userdata('id'));
		// $this->db->where('p.id_user=u.id' );
		//$this->db->where('p.ruangan_id = r.id');
		// $id = $this->session->userdata['id'];
		// $this->db->select('id_user');
		// $this->db->where('id_user', $id);//
		// $query = $this->db->get();
		// return $query->result();
		// $data['tbl_pinjambarang'] = $this->db->get_where($this->tbl_pinjambarang)->result();	
		// $id = $this->session->userdata('');
		// $this->db->select('*');
		// $this->db->from('tbl_pinjambarang as pinjam');
		// $this->db->where('id_user', $id);
		// $this->db->order_by('tanggal', 'desc');
		// $id = $this->session->userdata['logged_in']['id_user'];
		$id = $this->session->userdata['id'];
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$this->db->from('tbl_pinjambarang');
		$query = $this->db->get();
		return $query->result();
		// return $this->db->get('tbl_pinjambarang')->result();
	}
    function cetak_laporan($where,$table){
		return $this->db->get_where($table,$where);
	}
	 public function get_keyword($keyword){
           $this->db->select('*');
           $this->db->from('tbl_pinjambarang');
            if(!empty($keyword)) {
        	$this->db->group_start();
            $this->db->like('nama2', $keyword);
            $this->db->or_like('tujuan',$keyword);
             $this->db->group_end();
         }
            return $this->db->get()->result();
		}
	
	function hapus_barang($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }	

}