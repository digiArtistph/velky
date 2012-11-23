<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Loginad extends CI_Controller {
	
	private $_mfullname;
	private $_mAdminFullname;
	private $_mMyLoginError;
	
	public function __construct() {
		parent::__construct();
		
		// initializes some member variables
		$this->_mfullname = '';
		$this->_mMyLoginError = null;
	}
	
	public function index() {
		$this->load->view('admin/login/login_view');
	}
	
	public function admin() {

		$data['main_content'] = 'admin/loginad_view';
		$this->load->view('includes/template', $data);

	}
	
	public function validate() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;

		$validation->set_rules('email', 'Email',  'required');
		$validation->set_rules('pword', 'Password', 'required');

		//call_debug($_POST);

		if($validation->run() === FALSE) {
			$this->admin();
		} else {
			if($this->__isAdminExists()) {
				$params = array(
						'sadmin_uname' => $this->input->post('email'),
						'sadmin_islog' => TRUE,
						'sadmin_fullname' => $this->_mAdminFullname
				);

				// loads the sessionbrowser
				//$this->load->library('sessionbrowser');

				$this->sessionbrowser->setInfo($params);

				$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
				$this->sessionbrowser->getInfo($params);
				$arr = $this->sessionbrowser->mData;

				//call_debug($arr);

				//call_debug($_POST);

				redirect(base_url() . 'admin/panel');

			} else {
				$this->admin();
			}

		}

	}
	
	
	
	private function __isAdminExists() {

		$strQry = sprintf("SELECT * FROM `users` WHERE email='%s' AND password='%s'", $this->input->post('email'), MD5($this->input->post('pword')));

		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);

		if($this->mdldata->_mRowCount < 1)
		return FALSE;

		foreach($this->mdldata->_mRecords as $rec) {
			$this->_mAdminFullname = $rec->fname . ' ' . $rec->lname;
		}

		return TRUE;
	}
	

	
}