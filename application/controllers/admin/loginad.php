<?php if ( ! defined('BASEPATH')) exit();

class Loginad extends CI_Controller {
	
	private	$_mUser;
	
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		// initializes some member variables.
		$this->_mUser = null;
		
	}
	
	public function index() {
		
		// sentinel
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');		

		if($this->sentinel->goFlag($params)) {
			redirect(base_url() . 'admin/panel');
		} else {
			$this->load->view('admin/loginad_view');
		}
		
	}
	
	public function validate() {
		
		$validation = $this->form_validation;
		
		// sets rules
		$validation->set_rules('email', 'Email', 'required|valid_email');
		$validation->set_rules('pword', 'Password', 'required|min_length[3]');
		
		if($validation->run() === FALSE) {
			$this->index();
		} else {
			if($this->_isExists()) {
				$this->_setSession();
				redirect(base_url() . 'admin/panel');
			} else {
				$this->index();
			}
		}
	}
	
	public function sign_out() {
		// destroy();
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');	
		$this->sessionbrowser->destroy($params); // returns TRUE if successful, otherwise FALSE
		
		redirect(base_url() . 'admin');
	}
	
	private function _isExists() {
		
		// loads mdldata class
		$this->load->model('mdldata');
		
		$params['table'] = array('name' => 'users');
		$params['fields'] = array('email' => '', 'fname' => '','lname' => '', 'utype' => '');
		$params['table']['criteria_phrase'] = '(email="' . $this->input->post('uname') . '" and password="' . md5($this->input->post('pword')) . '") and (utype="0" or utype="2")'; 
		
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount < 1)
			return FALSE;
		
		$this->_mUser = $this->mdldata->_mRecords;
		
		return TRUE;	
	}
	
	public function _setSession() {
		$curUser = array();
		
		foreach($this->_mUser as $user):
			$curUser['fname'] = $user->fname;
			$curUser['lname'] = $user->lname; 
			$curUser['utype'] = $user->utype;
		endforeach;

		$params = array(
						'sadmin_uname' => $this->input->post('email'),
						'sadmin_islog' => TRUE,
						'sadmin_fullname' => $curUser['fname'] . ' ' . $curUser['lname'],
						'sadmin_ulvl' => $curUser['utype']
					);
		
		$this->sessionbrowser->setInfo($params); // returns TRUE if successful, otherwise FALSE	
		
		/*$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname', 'sadmin_ulvl');
 		$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
		
		$arr = $this->sessionbrowser->mData;
		call_debug($arr);*/
	}
	
}