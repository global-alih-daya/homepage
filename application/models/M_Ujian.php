<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ujian extends CI_Model {

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function random_query($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by("id", "random");
		$this->db->limit(1, 0);
		return $this->db->get()->result(); 
	}

	public function save($table,$data)
	{
		$this->db->insert($table,$data);
	}
}
