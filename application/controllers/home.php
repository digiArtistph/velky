<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	private $title;
	
	public function __construct() {
		
		parent::__construct();
		
		// initiates values on some variables
		$this->title = 'Home Page';
		
	}
	
	public function index() {
		
		$data['title'] = $this->title;
		$data['main_content'] = 'home/home_view';
		$this->load->view('includes/template', $data);

	}
	
}