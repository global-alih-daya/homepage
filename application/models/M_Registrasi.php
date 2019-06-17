<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrasi extends CI_Model {

    public function save($table,$data)
    {
        $this->db->insert($table,$data);
    }

}
