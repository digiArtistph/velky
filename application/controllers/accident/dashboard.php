<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); 

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
			
	}
	
	public function index() {
		$this->section();
	}
	
	public function section() {
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		
		switch($section){			
			default:
				$this->_viewdashboard();
		}
	}
	
	
	public function _viewdashboard() {
		
		$data['main_content'] = 'admin/barangay/addbarangay_view';
		$this->load->view('includes/template', $data);	
		
	}
}