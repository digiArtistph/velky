<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	private $_mfullname;
	private $_mAdminFullname;
	private $_mMyLoginError;
	
	public function __construct(){
		parent::__construct();
		
		// initializes some member variables
		$this->_mfullname = '';
		$this->_mMyLoginError = null;
		
	}

	public function index()
	{
		$this->load->view('view_login');
	}
	
	function main_page()
	{
		echo 'You are Logged in! Hello!';
		echo '<br /><a href="signout">Logout!</a>';
		
	}
public function validate_login() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('email', 'Email',  'required');
		$validation->set_rules('password', 'Password', 'required');
		
		//call_debug($_POST);
		
		if($validation->run() === FALSE) {
			$this->index();
		} else {
			if($this->__isUserExists()) {
				$params = array(
						'suser_uname' => $this->input->post('email'),
						'suser_islog' => TRUE,
						'suser_fullname' => $this->_mfullname
				);
				
				$this->sessionbrowser->setInfo($params);
				
				$params = array('suser_uname', 'suser_islog', 'suser_fillname');
				$this->sessionbrowser->getInfo($params);
				$arr = $this->sessionbrowser->mData;
				
				redirect('login/main_page');
				
			} else {
				$this->index();
				echo 'Username or password is invalid, try again.';
				
			}
						
		}
		
	}

private function __isUserExists() {
		
		$strQry = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s' AND utype='1'", $this->input->post('email'), MD5($this->input->post('password')));
		
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
	
		if($this->mdldata->_mRowCount < 1)
			return FALSE;
		
		foreach($this->mdldata->_mRecords as $rec) {
			$this->_mfullname = $rec->fname . ' ' . $rec->lname;
		}
		
		return TRUE;
	}
public function signout() {
	
		$params = array('suser_uname', 'suser_islog', 'suser_fillname');
		$this->sessionbrowser->getInfo($params); // returns TRUE if successful, otherwise FALSE
		$arr = $this->sessionbrowser->mData;
	
		$this->sessionbrowser->destroy($params);
	
		redirect(base_url() .'login');

	}
	
}
	
?>