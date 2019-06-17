<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function practices_area() {
		$q=$this->db->select('*')->get('practices_area');
		//print_r($q);die();
		return $q->result();
	}

	
}
