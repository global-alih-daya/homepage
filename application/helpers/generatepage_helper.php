<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('generate_page') ) {

	function generate_navlink($path_page, $var_path_page, $page_name) {
		//print_r($path_page);die;
		$html = '<li class="nav-item {status}">';
		$html.= "\n";
		$html.= '<a class="js-scroll-trigger" href="' . $var_path_page .'">'.$page_name.'<b class="caret"></b></a>';
		$html.= '</li>';
		//print_r($var_path_page);die;
		return ( ($path_page==$var_path_page) ? str_replace('{status}', 'active', $html) : str_replace('{status}', '', $html) );
		//print_r($path_page);die;
	}

}


if( !function_exists('generate_page') ) {

	function generate_about($path_page, $var_path_page, $page_name) {
		//$ci =& get_instance();
		//$ci->load->helper('url');
		$html = '<li>';
		$html.= "\n";
		$html.= '<a class="nav-item {status}" href="' . base_url($var_path_page) .'"><i class="fa fa-check-square-o mr-10"></i>'.$page_name.'</a>';
		$html.= '</li>';
		//$url = $ci->uri->segment(2);
		//print_r($path_page);die;
		//echo "<br>";
		//$uri = $_SERVER['REQUEST_URI'];
		//$arrUri = explode('/', $uri);
		//print_r($arrUri);
		/* if(isset($arrUri[3]) || $arrUri[3] == $var_path_page) {
			//die('msk');
			return str_replace('{status}', 'text-black', $html);
		} else {
			return str_replace('{status}', '', $html);
		} */
		//print_r($url);

		//die;
		return ( ($path_page==$var_path_page) ? str_replace('{status}', 'text-black', $html) : str_replace('{status}', '', $html) );

	}

}

if( !function_exists('generate_page') ) {

	function generate_page($title_page, $path_page) {
		//print_r($user_type);die;
		$ci =& get_instance();
		//print_r($ci);die;
		$data = array();

			$data_header['title_page'] = $title_page;
			//print_r($data_header['title_page']);die();
		$data['header'] = $ci->load->view('default/V_Header', $data_header, true);

			$data_navbar['user_name'] = $ci->session->userdata('user_name');
			$data_navbar['user_avatar'] = $ci->session->userdata('user_avatar');
		$data['navbar'] = $ci->load->view('default/V_Navbar', $data_navbar, true);

			//print_r($path_page);die;
			//$user_type = $ci->session->userdata('user_type');
			$data_menu['path_page'] = $path_page;
			/* $data_menu['user_name'] = $ci->session->userdata('user_name');
			$data_menu['user_avatar'] = $ci->session->userdata('user_avatar');
			$data_menu['jabatan'] = $ci->session->userdata('user_nama_jabatan');
			$data_menu['bidang'] = $ci->session->userdata('user_nama_bidang'); */

			//print_r($data_menu);die;
			//print_r($user_type);die;
		$data['menu'] = $ci->load->view('default/V_Menu' ,$data_menu, true);
		$data['modal'] = $ci->load->view('default/V_Modal', '', true);
		//print_r($data['menu']);die;
		$data['footer'] = $ci->load->view('default/V_Footer', '', true);
		$data['javascript'] = $ci->load->view('default/V_JavaScript', '', true);
		$data['menu_abouts'] = $ci->load->view('default/menu_about', '', true);

		return $data;
	}

}


if( !function_exists('generate_page') ) {

	function generate_page_about($title_page, $path_page) {
		//print_r($user_type);die;
		$ci =& get_instance();
		//print_r($ci);die;
		$data = array();


		$data['menu_abouts'] = $ci->load->view('default/menu_about', '', true);

		return $data;
	}

}
