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
		$validation->set_rules('name', 'name');
		$validation->set_rules('status', 'status', 'integer');
		
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
		
		$data['barangay'] = $this->_getbarangay();
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