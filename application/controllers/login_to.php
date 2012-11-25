<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login_to extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	function index(){
		$data['main_content'] = 'tongbens/login_view';
		$this->load->view('includes/template', $data);
	}
	
	public function validate_login(){
		print_r($_POST);
	}
}