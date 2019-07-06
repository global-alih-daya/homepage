<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ujian extends CI_Model {

	public function tampil_data()
	{
		return $this->db->get('soal_mbti');
	}

	public function save($table,$data)
	{
		$this->db->insert($table,$data);
	}
}
