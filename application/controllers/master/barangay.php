<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barangay extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		
		//authenticate pages 
		authUser(array('section' => 'admin', 'sessvar' => array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname')));
	}
	
	public function index(){
		$this->section();
	}
	
	public function section(){
		
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
		
		switch($section){
			case 'barangay':
				$this->_viewbarangay();
				break;
			case 'addbarangay':
				$this->_addbarangay();
				break;
			case 'editbarangay':
				$this->_editbarangay();
				break;
			case 'deletebarangay':
				$this->_deletebarangay();
				break;
			default:
				$this->_viewbarangay();
		}
	}
	
	public function validatenewbarangay(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('name', 'name', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_addbarangay();
		} else {
			
			$this->load->model('mdldata');
			
			$params = array(
					'table' => array('name' => 'barangay'),
					'fields' => array(
						'name' => $this->input->post('name'),
						'status' => 1
						)
					);
			$this->mdldata->reset();
				
			if(! $this->mdldata->insert($params))
				echo 'Insert new record failed.';
			else
				redirect(base_url("master/barangay"));
		}
	}
	
	public function validateupdatebarangay(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('id', 'id', 'required');
		$validation->set_rules('name', 'name', 'required');
		$validation->set_rules('status', 'status', 'integer', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_editbarangay();
		} else {
			
			$strqry = sprintf('UPDATE barangay SET name="%s", status="%d" WHERE b_id="%s"', $this->input->post('name'), $this->input->post('status'), strdecode($this->input->post('id') ));
			
			if(!$this->db->query($strqry))
				echo 'update failed';
			else
				redirect(base_url("master/barangay"));
		}
	}
	
	private function _viewbarangay(){
		$this->load->library('pagination');

		$config['base_url'] = base_url('master/barangay/section/');
		$config['total_rows'] = $this->db->query("SELECT * FROM barangay")->num_rows();
		$config['uri_segment'] = 4;
		$config['per_page'] = 10;
		$config['num_links'] = 2;
		$config['cur_tag_open'] = '<li class="disabled">';
		$config['cur_tag_close'] = '</li>';
		$config['anchor_class'] = 'class="ext_disabled"';		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$this->pagination->initialize($config);
		$data['paginate'] = paginate_helper($this->pagination->create_links());		
		$data['barangay'] = $this->db->get('barangay', $config['per_page'], $this->uri->segment(4))->result(); //$this->_getbarangay();
		
		$data['main_content'] = 'admin/barangay/barangay_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getbarangay(){
		
		$this->load->model('mdldata');
		$params['table'] = array('name' => 'barangay');
		$params['table']['order_by'] = 'b_id:asc';
		
		if(!$this->mdldata->select($params))
			echo 'getting barangay name failed';
		else 
			return $this->mdldata->_mRecords;
	}
	
	private function _addbarangay(){
		
		$data['main_content'] = 'admin/barangay/addbarangay_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _editbarangay(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		
		$data['name'] = $this->_selectbarangay($id);
		
		$data['main_content'] = 'admin/barangay/editbarangay_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _selectbarangay($config){
		
		$rid = strdecode($config);
		$params['querystring'] = sprintf("SELECT * FROM barangay WHERE b_id=%d", $rid);
		
		$this->load->model('mdldata');
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _deletebarangay(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : show_404();
		
		$strqry = sprintf('DELETE FROM barangay WHERE b_id = %d ', strdecode($id));
			
		if(!$this->db->query($strqry))
			echo 'delete failed';
		else
			redirect(base_url("master/barangay"));
	}
}