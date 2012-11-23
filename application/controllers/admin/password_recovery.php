<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Password_recovery extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$data['main_content'] = 'admin/login/login_view';
		$this->load->view('includes/template', $data);
	}
	
	public function reset_password(){
		$data['main_content'] = 'admin/login/reset_password';
		$this->load->view('includes/template', $data);
	}
	
	public function validate_reset_password(){
	
		$this->load->library('form_validation');
		$validation = $this->form_validation;
	
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('email_confirm', 'Email Confirmation', 'required');
	
		if($validation->run() === FALSE) {
			$this->reset_password();
		} else {
			
			$mMsg ="<div>
			<h3>This is a Link to Reset your Password</h3>
			<p><a href=". base_url(). 'admin/password_recovery/renew_password/' . strencode($this->input->post('email')) .">Please Click this link to Reset your Password</a></p>
			</div>";
			
			$params = array(
					'sender' => 'juntals01@gmail.com',
					'receiver' => $this->input->post('email'),
					'from_name' => 'Velky Web Master',
					'cc' => 'supervisor@otherdomainname.com', 
					'subject' => 'Velky Password Recovery',
					'msg' => $mMsg, 
					'email_temp_account' => TRUE
					);
			//call_debug($params);
			
			$this->load->library('emailutil', $params);
	
			if( $this->emailutil->send() ){
				$data['msg'] = 'Email Sent';
			}else{
				$data['msg'] = 'Sending Email Error';
			}
			$data['main_content'] = 'admin/login/email_status';
			$this->load->view('includes/template', $data);
	
		}
	}
	
	
	public function renew_password(){
		$mHash = $this->uri->segment(4);
		$mEmail = strdecode($mHash);
		$data['email'] = $mEmail;
		$this->load->view('admin/login/renew_password', $data);
	}
	
	
	public function validate_renew_password(){
		$this->load->library('form_validation');
		$validation = $this->form_validation;
	
		$validation->set_rules('email', '', 'required');
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
				
			redirect( base_url() . 'admin/password_recovery/password_renewed');
		}
	
	}
	
	public function password_renewed(){
		echo 'password renewed';
	
	}
}