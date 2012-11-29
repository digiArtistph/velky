<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accident_type extends CI_Controller {
		
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
			case 'addaccident_type':
				$this->_addaccident_type();
				break;
			case 'editaccident_type':
				$this->_editaccident_type();
				break;
			case 'deleteaccident_type':
				$this->_deleteaccident_type();
				break;
			default:
				$this->_accident_type();
		}			
		
	}

	
	public function validateaddaccidenttype() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('name', 'Name', 'required');
		
		if($validation->run() === FALSE) {
			$this->_addaccident_type();
		} else {
			$strQry = sprintf("INSERT INTO `accidenttype` SET name='%s'",
					$this->input->post('name')			
				);	
			
			$this->load->model('mdldata');
			$params['querystring'] = $strQry;
			
			if( ! $this->mdldata->insert($params))
				echo 'Error on updating some record.';
			else
				redirect(base_url("master/accident_type"));
		}
		
	}
	private function _addaccident_type() {
		
		$data['main_content'] = 'admin/accident_type/addaccident_type_view';
		$this->load->view('includes/template', $data);
		
	}
	
	private function _deleteaccident_type() {
		$accidenttype_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		
		$strQry = sprintf("DELETE FROM accidenttype WHERE at_id = %d", $accidenttype_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		
		if(! $this->mdldata->update($params))
			echo 'Deleting existing record failded.';
		
		redirect(base_url("master/accident_type"));
		
	}
	
	private function _editaccident_type() {
		
		$at_id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('at_id')) ? $this->input->post('at_id') : 0);
		
		$strQry = sprintf("SELECT * FROM `accidenttype` WHERE at_id=%d", $at_id);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['accidenttype'] = $this->mdldata->_mRecords;
		$data['at_id'] = $at_id;
	
		
		$data['main_content'] = 'admin/accident_type/editaccident_type_view';
		$this->load->view('includes/template', $data);
		
	}
	
	public function validateeditaccidenttype() {
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('name', 'Name', 'required');
		
		if($validation->run() === FALSE) {
			$this->_editaccident_type();
		} else {
			$strQry  = sprintf("UPDATE `accidenttype` SET name='%s' WHERE at_id=%d", 				
					$this->input->post('name'),
					$this->input->post('at_id')
				);
			
			$this->load->model('mdldata');
			$params['querystring']= $strQry;
			
			if(! $this->mdldata->insert($params))
				echo 'Error on updating some record.';
			else
				redirect(base_url("master/accident_type"));
		}
		
	}
	
	private function _accident_type() {
		
		// pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url("master/accident_type");
		$config['total_rows'] = $this->db->query("SELECT at_id, name FROM `accidenttype`")->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 4;
		$config['uri_segment'] = 5;
		$config = array_merge($config, $this->_mConfig);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$strQry = sprintf("SELECT at_id, name FROM `accidenttype` LIMIT %d, %d",$this->uri->segment($config['uri_segment']), $config['per_page']);
		$this->load->model('mdldata');
		$params['querystring'] = $strQry;
		$this->mdldata->select($params);
		$data['accidenttype'] = $this->mdldata->_mRecords;
				
		
		$data['main_content'] = 'admin/accident_type/accident_type_view';
		$this->load->view('includes/template', $data);
	}
	
	

	
}
