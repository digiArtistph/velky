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
		$data['main_content'] = 'admin/login/login_view';
		$this->load->view('includes/template_login', $data);
	}
	
	
	public function validate_admin_login() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;

		$validation->set_rules('username', 'Email',  'required');
		$validation->set_rules('password', 'Password', 'required');

		//call_debug($_POST);

		if($validation->run() === FALSE) {		
			$this->index();
		} else {
			if($this->__isAdminExists()) {
				$params = array(
						'sadmin_uname' => $this->input->post('username'),
						'sadmin_islog' => TRUE,
						'sadmin_fullname' => $this->_mfullname
				);

				// loads the sessionbrowser
				//$this->load->library('sessionbrowser');

				$this->sessionbrowser->setInfo($params);

				$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
				$this->sessionbrowser->getInfo($params);
				$arr = $this->sessionbrowser->mData;

				//call_debug($arr);

				redirect(base_url() . 'master/users');
				
			} else {
				echo"This email has not been registered or the password did not match.";
				$this->index();
			}

		}

	}

	private function __isAdminExists() {

		$strQry = sprintf("SELECT * FROM `users` WHERE email='%s' AND password='%s' AND utype LIKE '0'", $this->input->post('username'), MD5($this->input->post('password')));

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
	
	public function admin_signout() {
		
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
		$arr = $this->sessionbrowser->mData;

		$this->sessionbrowser->destroy($params);
		
		redirect(base_url() . 'admin/loginad');
		
	}
	
}