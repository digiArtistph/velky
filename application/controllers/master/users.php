<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
		
	private $_mConfig;
	
	public function __construct() {
		parent::__construct();
		
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		$this->sessionbrowser->getInfo($params);
		$arr = $this->sessionbrowser->mData;
		
		//call_debug($arr);
		
		// authorizes access
		authUser(array('section' => 'admin', 'sessvar' => array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname')));
				
		// sets default prefs
		$this->_mConfig = array('full_tag_open' => '<div class="pagination">', 'full_tag_close' => '</div>', 'first_link' => 'First', 'last_link' => 'Last', 'next_link' => '»', 'prev_link' => '«');

	}
	
	public function index() {
		$this->section();
	}
	
	public function section() {
		
		$section = ($this->uri->segment(3)) ? $this->uri->segment(3) : '';
		
		switch($section) {
			case 'users':
				$this->_users();
				break;
			case 'newuser':
				$this->_newuser();
				break;
			case 'edituser':
				$this->_edituser();
				break;
			case 'deleteuser':
				$this->_deleteuser();
				break;
		}			
		
	}

	
	public function validatenewuser() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('fname', 'First Name', 'required');
		$validation->set_rules('lname', 'Last Name', 'required');
		$validation->set_rules('mname', 'Middle Name', 'required');
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('pword', 'Password', 'required|min_length[6]');
		$validation->set_rules('pword2', 'Confirm Password', 'required|matches[pword]');
		$validation->set_rules('utype', 'Access Level', 'required');
		
		if($validation->run() === FALSE) {
			$this->_newuser();
		} else {
			$strQry = sprintf("INSERT INTO `users` SET fname='%s', lname='%s', mname='%s', password='%s', email='%s', utype='%s'",
					$this->input->post('fname'),
					$this->input->post('lname'),
					$this->input->post('mname'),
					md5($this->input->post('pword')),
					$this->input->post('email'),
					$this->input->post('utype')					
				);	
			
			$this->load->model('mdldata');
			$params['querystring'] = $strQry;
			
			if( ! $this->mdldata->insert($params))
				echo 'Error on updating some record.';
			else
				redirect(base_url("master/users/section/users"));
		}
		
	}
	private function _newuser() {
		
		$data['main_content'] = 'admin/users/newuser_view';
		$this->load->view('includes/template', $data);
		
	}
	
	private function _deleteuser() {
		$user_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		$strQry = sprintf("UPDATE `users` SET `status`='1' WHERE u_id=%d", $user_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		
		if(! $this->mdldata->update($params))
			echo 'Deleting existing record failded.';
		
		redirect(base_url("master/users/section/users"));
		
	}
	
	private function _edituser() {
		
		$usr_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('usr_id')) ? $this->input->post('usr_id') : 0);
		
		$strQry = sprintf("SELECT * FROM `users` WHERE u_id=%d", $usr_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['users'] = $this->mdldata->_mRecords;
		$data['usr_id'] = $usr_id;
	
		
		$data['main_content'] = 'admin/users/edituser_view';
		$this->load->view('includes/admin/template', $data);
		
	}
	
	public function validateedituser() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		
		$validation->set_rules('fname', 'First Name', 'required');
		$validation->set_rules('lname', 'Last Name', 'required');
		$validation->set_rules('mname', 'Middle Name', 'required');
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('utype', 'Access Level', 'required');
		
		if($validation->run() === FALSE) {
			$this->_edituser();
		} else {
			$strQry  = sprintf("UPDATE `users` SET fname='%s', lname='%s', mname='%s', email='%s', utype='%s' WHERE u_id=%d", 
					$this->input->post('fname'),
					$this->input->post('lname'),
					$this->input->post('mname'),
					$this->input->post('email'),
					$this->input->post('utype'),					
					$this->input->post('usr_id')
				);
			
			$this->load->model('mdldata');
			$params['querystring']= $strQry;
			
			if(! $this->mdldata->insert($params))
				echo 'Error on updating some record.';
			else
				redirect(base_url("master/users/section/users"));
		}
		
	}
	
	private function _users() {
		
		// pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url("master/users/section/users");
		$config['total_rows'] = $this->db->query("SELECT u_id, mname, email, IF(ASCII(fname) !=0 AND ASCII(lname) !=0, CONCAT(fname, ' ', lname), 'no complete name provided') AS fullname FROM `users` WHERE status='1'")->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 4;
		$config['uri_segment'] = 5;
		$config = array_merge($config, $this->_mConfig);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$strQry = sprintf("SELECT u_id, mname, email, IF(ASCII(fname) !=0 AND ASCII(lname) !=0, CONCAT(fname, ' ', lname), 'no complete name provided') AS fullname FROM `users`  WHERE status='1' LIMIT %d, %d",$this->uri->segment($config['uri_segment']), $config['per_page']);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['users'] = $this->mdldata->_mRecords;
				
		
		$data['main_content'] = 'admin/users/users_view';
		$this->load->view('includes/admin/template', $data);
	}
	
	

	
}
