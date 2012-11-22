<<<<<<< HEAD
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
=======
<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Loginad extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('admin/login/login_view');
	}
	
	public function reset_password(){
		$this->load->view('admin/login/reset_password');
	}
	
	public function validate_reset_password(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('email_confirm', 'Email Confirmation', 'required');
		
		if($validation->run() === FALSE) {
			$this->reset_password();
		} else {
			
			$config = Array(
					'protocol' => 'smtp',
			        'smtp_host' => 'ssl://smtp.googlemail.com',
			        'smtp_port' => 465,
			        'smtp_user' => 'juntals01@gmail.com',
			        'smtp_pass' => 'csmolax01!',
			        'mailtype'  => 'html', 
			        'charset' => 'utf-8',
			        'wordwrap' => TRUE
		    );
			
		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    
		    $email_body ="<div>
		    				<h3>This is a Link to Reset your Password</h3>
		    				<p><a href=". base_url('admin/loginad/renew_password') .">Please Click this link to Reset your Password</a></p>
		    			</div>";
		    
		    $this->email->from('juntals01@gmail.com', 'Reset Password Confirmation');
		    $this->email->to($this->input->post('email'));
		    $this->email->subject('Reset your password');
		    $this->email->message($email_body);
		
		    $this->email->send();
		    
		    if($this->email->print_debugger()){
		    	echo "message sent";
		    }else{
		    	echo "message not sent";
		    }
		    
		}
	}
		
		
	public function renew_password(){
		$this->load->view('admin/login/renew_password');
	}
	
	
	public function validate_renew_password(){
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('pass', 'Password', 'required');
		$validation->set_rules('pass_conf', 'Password Confirmation', 'required');
		
		if($validation->run() === FALSE) {
			$this->renew_password();
		} else {
			$this->load->model('mdldata');
			
			$params['table']['name'] = 'users';
			$params['table']['criteria'] = 'email';
			$params['table']['criteria_value'] = $this->input->post('email');
			
			$params['fields'] = array(
						        'password' => md5( $this->input->post('pass') )  
								);
			$this->mdldata->reset();
			$this->mdldata->update($params);
			
			redirect( base_url() . 'admin/loginad/password_renewed');
		}
		
	}
	
	public function password_renewed(){
		echo 'password renewed';
>>>>>>> f8493456574e66efab4ee4468aa4629632314945
	}
	
}