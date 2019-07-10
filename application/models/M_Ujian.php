<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ujian extends CI_Model {

	public function tampil_data()
	{
		return $this->db->get('soal_mbti');
	}

	public function tampil_data_2()
	{
		return $this->db->get('soal_psikotes');
	}

	public function save($table,$data)
	{
		$this->db->insert($table,$data);
	}
}
