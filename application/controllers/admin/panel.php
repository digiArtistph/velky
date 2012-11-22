<?php if(! defined('BASEPATH')) exit('No direct script access allowed.');

class Panel extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		// sentinel
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');	

		
		if($this->sentinel->goFlag($params)) {
			$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
 			$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
			
			$data['user'] = $this->sessionbrowser->mData;
			//call_debug($data);
			
			$data['main_content'] = 'admin/admin_view';
			$this->load->view('includes/admin/template', $data);
		} else {
			redirect(base_url() . 'admin/loginad');
		}
		
	}
	
	
	
}