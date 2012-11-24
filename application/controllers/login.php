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
	
	function main_page ()
	{
		echo 'You are Logged in!';		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		
	}
	public function validate_my_login()
	{
			$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('email', 'Email',  'required');		
		$validation->set_rules('password', 'Password', 'required');
		
		
// 		call_debug($_POST);
		if($validation->run() === FALSE) {
			$this->index();
		} else {

			if($this->_isUserExists()) {
				$params = array(
									'suser_uname' => $this->input->post('email'),
									'suser_islog' => TRUE,
									'suser_fullname' => $this->_mfullname
								);
				
				$this->sessionbrowser->setInfo($params);
					
				redirect('main_page');
						
			} else {
				$this->_mMyLoginError = TRUE;
				$this->index();
			}
		}
	}
/*		if($validation->run() == FALSE)
		{
			$this->index();	
			//$data['title'] = $this->title;
			//$data['main_content'] = 'admin/admin_view';
			//$this->load->view('includes/template', $data);
		}
		else
		{					
			//fail		
			//call_debug($_POST);
			$this->load->model('user_model');
			$result = $this->user_model->check_login();
			if (!$result){			
				redirect('login/validate_my_login');
			}			
			else {
				
				//logged in
				$params = array(
					'suser_uname' => $this->input->post('email'),
					'suser_islog' => TRUE,
					'admin_fullname' => $this->_mfullname
					);
								
				$this->sessionbrowser->setInfo($params);
				
				$params = array('sadmin_uname', 'sadmin_islog','sadmin_fullname');
				$this->sessionbrowser->getInfo($params);
				$arr = $this->sessionbrowser->mData;
				
				$this->session->set_userdata($data);
				redirect('login/main_page');
				//dari sa nako gi direct
				
			} 
		} */

private function _isUserExists() {
		
		$strQry = sprintf("SELECT * FROM `users` WHERE email='%s' AND password='%s'", $this->input->post('email'), MD5($this->input->post('password')));

		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);

		if($this->mdldata->_mRowCount < 1)
		return FALSE;

		foreach($this->mdldata->_mRecords as $rec) {
			$this->_mAdminFullname = $rec->fname . ' ' . $rec->lname;
		}

		}
	}
	
?>