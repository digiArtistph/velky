<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Smscontrol extends CI_Controller {
	
	public function index() {
		$data['main_content'] = 'admin/sms/form_view';
		$this->load->view('includes/template', $data);
	}
	
	public function validateSend(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('recepient', 'Recepient', 'required');
		$validation->set_rules('message', 'Message', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->index();
		} else {
			
			$params = array(
					'recepient'	=> $this->input->post('recepient'), 
					'message'	=> $this->input->post('message')
					);
			
			$this->load->library('smsutil', $params);
			
			if( $this->smsutil->send() )
				echo 'success';
			else
				echo 'not sent';
		}
	}

}