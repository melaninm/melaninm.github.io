<?php 

class Mo_ruangan extends CI_Model{
    
    private $_table = "tb_ruangan";
 
	function tampil_data($perPage, $start)
    {
        $this->db->order_by('nama_ruangan', 'asc');
		return $this->db->get('tb_ruangan', $perPage, $start)->result();
	} 

     function baris_ruangan()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    
    function simpan()
    {
        $kr = $this->input->post('kr');
        $nr = $this->input->post('nr');
        $st = $this->input->post('st');
        
        $data = array(
            'kode_ruangan' => $kr,
            'nama_ruangan' => $nr,
            'ruangan' => $st,
            );
            $this->db->insert('tb_ruangan',$data);
    }
    
   // function getBarang($id)
    //{
    //    $this->db->where('id_barang',$id);
    //    $this->db->select("*");
    //    $this->db->from("tb_barang");
    //    return $this->db->get();
    //}
    
    function edit_ruangan($where,$table){		
        return $this->db->get_where($table,$where);
    }
    function updateruangan($where,$data,$table)
    {
       $this->db->where($where);
       $this->db->update ('tb_ruangan',$data);       
    }
    
    function hapus_ruangan($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

     public function get_keyword($keyword){
            $this->db->select('*');
            $this->db->from('tb_ruangan');
            $this->db->like('nama_ruangan',$keyword);
            return $this->db->get()->result();
        }
    
}