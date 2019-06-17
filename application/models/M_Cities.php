<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class M_Cities extends CI_Model {
    
    public function viewByProvinsi($province_id){
        $this->db->where('province_id', $province_id);
        $result = $this->db->get('regencies')->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
        return $result; 
    }
}