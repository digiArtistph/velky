<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {
	
	private $title;
	
	public function __construct() {
		
		parent::__construct();
		
		// initiates values on some variables
		$this->title = 'Control Panel';
		
	}
	
	public function index() {

		
		$data['title'] = $this->title;
		$data['main_content'] = 'admin/admin_view';
		$this->load->view('includes/template', $data);

	}
	
}