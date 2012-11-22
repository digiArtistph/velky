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
	}
	
}