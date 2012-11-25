<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Password_recovery extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
	}
	
	private function _emailView(){
		$data['main_content'] = 'admin/login/reset_password';
		$this->load->view('includes/template', $data);
	}
	
	public function forgot_password(){
		$user = ($this->uri->segment(4)) ? :show_404();
	
		if(strdecode($user) != 'admin'){
			show_404();
		}
		$this->_emailView();
	}
	
	
	public function validate_reset_password(){
	
		$this->load->library('form_validation');
		$validation = $this->form_validation;
	
		$validation->set_rules('email', 'email', 'required');
		$validation->set_rules('email_conf', 'email_conf', 'required|matches[email]');
	
		if($validation->run() === FALSE) {
			$this->_emailView();
		} else {
			$this->load->helper('recovery_util');
				
			if(auth_email( $this->input->post('email') ) ){
				$hash = strencode($this->input->post('email') ) . '/' . $this->session->userdata('session_id');
				$this->_sendMail( $hash );
				
				$data['msg'] = 'email sent';
			}else{
				$data['msg'] = 'your account doesn\'t exisin our database ';
			}
			$data['main_content'] = 'admin/login/email_verification';
			$this->load->view('includes/template', $data);
		}
		
		
	}
	
	private function _sendMail($param){
		$mMsg ="<div>
		<h3>This is a Link to Reset your New Password</h3>
		<p><a href=". base_url(). 'admin/password_recovery/renew_password/' . $param .">Please Click this link to Reset your Password</a></p>
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
	
		$this->load->library('emailutil', $params);
		if( $this->emailutil->send() ){
			return true;
		}
		return false;
	
	}
	
	private function _passView($email){
		$data['email'] = $email;
		$data['main_content'] = 'admin/login/renew_password';
		$this->load->view('includes/template', $data);
	}
	
	public function renew_password(){
		
		$email = ($this->uri->segment(4)) ?  $this->uri->segment(4): show_404();
		$sessionId = ($this->uri->segment(5)) ? $this->uri->segment(5): show_404();
		
		$this->load->helper('recovery_util');
		
		if( auth_session($sessionId) ){
			$this->_passView(strdecode($email) );
			
		}else{
			call_debug( 'you password link has expired. please renew' );
		}
	}
	
	
	
	public function validate_renew_password(){
		$this->load->library('form_validation');
		$validation = $this->form_validation;
	
		$validation->set_rules('pass', 'pass', 'required');
		$validation->set_rules('pass_conf', 'pass_conf', 'required|matches[pass]');
	
		if($validation->run() === FALSE) {
			$this->_passView('');
		} else {
			$this->load->model('mdldata');
			$params['table'] = array('name' => 'users', 'criteria' => 'email', 'criteria_value' => $this->input->post('email'));
			$params['fields'] = array( 'password' => md5($this->input->post('pass')) );
			$this->mdldata->update($params);
			
			$data['msg'] =  'password renewed';
			$data['main_content'] = 'admin/login/password_verification';
			$this->load->view('includes/template', $data);
		}
	}
}