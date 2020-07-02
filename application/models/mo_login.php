<?php 
 
class Mo_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	// pending
	public function load_pend()
	{
		$query = $this->db->query('select * from tbl_pinjambarang where status="Pending"');
		return $query->result();
	}

	public function load_conf()
	{
		$query = $this->db->query('select * from tbl_pinjambarang  where status="Diterima"');
		return $query->result();
	}

	public function load_cancel()
	{
		$query = $this->db->query('select * from tbl_pinjambarang  where status="Ditolak"');
		return $query->result();
	}
}