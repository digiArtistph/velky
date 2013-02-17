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
		$pattern = '/([t|T]amis)(\s)+([\w]+)(\2([\w\s]+))?/';
		$pattern2 = '/([r|R]ta|[p|P]olice|[h|H]osp|[h|H]ospital)\s+(confirmed|declined)/';
		$temp = array();
		$temp2 = array();
		//call_debug($this->smsutil->mData);
		//call_debug(preg_match($pattern2,$this->smsutil->mData[3][2]));
		foreach ($this->smsutil->mData as $caller => $key){
			
			if(preg_match($pattern, $key[2])){
				//$temp = $key;
				array_push($temp, $key);
			}
			
			if(preg_match($pattern2, $key[2])){
				
				array_push($temp2, $key);
			}
			
		}
		
		$data['callers'] = $temp;
		$data['entities'] = $temp2;
		$data['main_content'] = 'admin/response/bulksms/view_inbox';
		$this->load->view('includes/template', $data);
	}
	
	private function _isms(){
		
	}
}
?>