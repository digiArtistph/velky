<?php if (! defined('BASEPATH')) exit ('No direct script access allowed.');

if (! function_exists('getHeader')) {
	
	function getHeader() {
		$data['section'] = '';
		$this->load->view('includes/header', $data);
		
	}
}

if (! function_exists('getFooter')) {
	function getFooter() {
		$data['section'] = '';
		$this->load->view('includes/footer', $data);
	}
}