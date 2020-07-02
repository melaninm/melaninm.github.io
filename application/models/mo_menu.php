<?php
class Mo_menu extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('tabel_menu')->result();
    }

    public function tampiluser()
    {
        return $this->db->get('table_menu_user')->result();
    }
}
