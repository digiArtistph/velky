<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller{

	public function __construct() {
		parent::__construct();

		//authenticate pages
		authUser(array('section' => 'admin', 'sessvar' => array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname')));
	}

	public function index(){
		$this->section();

	}
	
	public function section(){
	
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
	
		switch($section){
			case 'bulksms':
				$this->_bulksms(); 
				break;
			case 'isms':
				$this->_isms();
				break;
			default:
				$this->_bulksms();
		}
	}
	
	private function _bulksms(){
		$this->load->library('smsutil');
		$this->smsutil->inbox();
		$pattern = '/(tamis)(\s)+([\w]+)(\2([\w\s]+))?/';
		
		foreach ($this->smsutil->mData as $caller => key){
			call_debug($this->smsutil->mData);
			
		}
		
		
		$data['msgs'] = null;  //;
		$data['main_content'] = 'admin/response/bulksms/view_inbox';
		$this->load->view('includes/template', $data);
	}
	
	private function _isms(){
		
	}
}
?>