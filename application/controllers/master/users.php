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
		authUser(array('section' => 'admin/loginad', 'sessvar' => array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname')));
				
		// sets default prefs
		$this->_mConfig = array('full_tag_open' => '<div class="pagination">', 'full_tag_close' => '</div>', 'first_link' => 'First', 'last_link' => 'Last', 'next_link' => '»', 'prev_link' => '«');

	}
	
	public function index() {
		$this->section();
	}
	
	public function section() {
		
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		//call_debug($section);
		switch($section) {
			case 'newuser':
				$this->_newuser();
				break;
			case 'edituser':
				$this->_edituser();
				break;
			case 'deleteuser':
				$this->_deleteuser();
				break;
			default:
				$this->_users();
		}			
		
	}

	
	public function validatenewuser() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('fname', 'First Name', 'required');
		$validation->set_rules('lname', 'Last Name', 'required');
		$validation->set_rules('mname', 'Middle Name', 'required');
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('addr1', 'Address #1', 'required');
		$validation->set_rules('addr2', 'Address #2', 'required');
		$validation->set_rules('pword', 'Password', 'required|min_length[6]');
		$validation->set_rules('pword2', 'Confirm Password', 'required|matches[pword]');
		$validation->set_rules('utype', 'Access Level', 'required');
		$validation->set_rules('status', 'status', 'required');
		
		if($validation->run() === FALSE) {
			$this->_newuser();
		} else {
			$strQry = sprintf("INSERT INTO `users` SET fname='%s', lname='%s', mname='%s', password='%s', email='%s', addr1='%s', addr2='%s', utype='%s', status='%s'",
					$this->input->post('fname'),
					$this->input->post('lname'),
					$this->input->post('mname'),
					md5($this->input->post('pword')),
					$this->input->post('email'),
					$this->input->post('addr1'),
					$this->input->post('addr2'),
					$this->input->post('utype'),
					$this->input->post('status')					
				);	
			
			$this->load->model('mdldata');
			$params['querystring'] = $strQry;
			
			if( ! $this->mdldata->insert($params))
				echo 'Error on updating some record.';
			else
				redirect(base_url("master/users"));
		}
		
	}
	private function _newuser() {
		
		$data['main_content'] = 'admin/users/newuser_view';
		$this->load->view('includes/template', $data);
		
	}
	
	private function _deleteuser() {
		$user_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		$strQry = sprintf("DELETE FROM users WHERE u_id = %d", $user_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		
		if(! $this->mdldata->update($params))
			echo 'Deleting existing record failded.';
		
		redirect(base_url("master/users/section/users"));
		
	}
	
	private function _edituser() {
		
		$u_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('u_id')) ? $this->input->post('u_id') : 0);
		
		$strQry = sprintf("SELECT * FROM `users` WHERE u_id=%d", $u_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['users'] = $this->mdldata->_mRecords;
		$data['u_id'] = $u_id;
	
		
		$data['main_content'] = 'admin/users/edituser_view';
		$this->load->view('includes/template', $data);
		
	}
	
	public function validateedituser() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('fname', 'First Name', 'required');
		$validation->set_rules('lname', 'Last Name', 'required');
		$validation->set_rules('mname', 'Middle Name', 'required');
		$validation->set_rules('email', 'Email', 'required');
		$validation->set_rules('addr1', 'Address #1', 'required');
		$validation->set_rules('addr2', 'Address #2', 'required');
		$validation->set_rules('utype', 'Access Level', 'required');
		$validation->set_rules('status', 'status', 'required');
		
		if($validation->run() === FALSE) {
			$this->_edituser();
		} else {
			$strQry  = sprintf("UPDATE `users` SET fname='%s', lname='%s', mname='%s', email='%s', addr1='%s', addr2='%s', utype='%s', status='%s' WHERE u_id=%d", 				
					$this->input->post('fname'),
					$this->input->post('lname'),
					$this->input->post('mname'),
					$this->input->post('email'),
					$this->input->post('addr1'),
					$this->input->post('addr2'),
					$this->input->post('utype'),
					$this->input->post('status'),
					$this->input->post('u_id')
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
		$config['base_url'] = base_url("master/users/users");
		$config['total_rows'] = $this->db->query("SELECT u_id, mname, email, IF(ASCII(fname) !=0 AND ASCII(mname) !=0 AND ASCII(lname) !=0, CONCAT(fname, ' ', mname, ' ', lname), 'no complete name provided') AS fullname, addr1, addr2, utype, status FROM `users`")->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 4;
		$config['uri_segment'] = 5;
		$config = array_merge($config, $this->_mConfig);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$strQry = sprintf("SELECT u_id, mname, email, IF(ASCII(fname) !=0 AND ASCII(mname) !=0 AND ASCII(lname) !=0, CONCAT(fname, ' ', mname, ' ', lname), 'no complete name provided') AS fullname, addr1, addr2, utype, status FROM `users` LIMIT %d, %d",$this->uri->segment($config['uri_segment']), $config['per_page']);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['users'] = $this->mdldata->_mRecords;
				
		
		$data['main_content'] = 'admin/users/users_view';
		$this->load->view('includes/template', $data);
	}
	
	

	
}
