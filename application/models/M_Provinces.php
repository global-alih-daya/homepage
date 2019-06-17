<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_Provinces extends CI_Model {
    
    public function view(){
        return $this->db->get('provinces')->result(); // Tampilkan semua data yang ada di tabel provinsi
    }
}