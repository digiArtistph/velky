<?php if (! defined('BASEPATH')) exit ('No direct script access allowed.');


if (! function_exists('getHeader')) {
	
	function getHeader() {
		$CI =& get_instance();
		$data['section'] = '';
			
		$data['section'] = '';
		$CI->load->view('includes/header', $data);
		
	}
}

if(! function_exists('getSideBar')) {
	function getSideBar() {
		$CI =& get_instance();
		
		$data['section'] = '';
		
		$data['section'] = '';
		$CI->load->view('includes/sidebar', $data);
		
	}
}

if (! function_exists('getFooter')) {
	function getFooter() {
		
		$CI =& get_instance();
		
		$data['section'] = '';
		$CI->load->view('includes/footer', $data);
		
	}
}