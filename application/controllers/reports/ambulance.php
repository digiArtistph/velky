<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ambulance extends CI_Controller{
	
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
			case 'addambulance':
				$this->_addambulance();
				break;
			case 'editambulance':
				$this->_editambulance();
				break;
			case 'deleteambulance':
				$this->_deleteambulance();
				break;
			default:
				$this->_viewambulance(); 
		}
	}
	
	public function validatenewambulance(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('plateno', 'plateno', 'required');
		$validation->set_rules('capacity', 'capacity', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_addambulance();
		} else {
			
			$this->load->model('mdldata');
			
			$params = array(
					'table' => array('name' => 'ambulances'),
					'fields' => array(
						'plateno' => $this->input->post('plateno'),
						'capacity' => $this->input->post('capacity'),
						'active' => 1
						)
					);
			$this->mdldata->reset();
				
			if(! $this->mdldata->insert($params))
				echo 'Insert new record failed.';
			else
				redirect(base_url("reports/ambulance"));
		}
	}

	public function validateupdateambulance(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('id', 'id', 'required');
		$validation->set_rules('plateno', 'plateno', 'required');
		$validation->set_rules('capacity', 'capacity', 'required');
		$validation->set_rules('active', 'active', 'integer');
		
		if($validation->run() ===  FALSE) {
			$this->_editambulance();
		} else {
			
			$strqry = sprintf('UPDATE ambulances SET plateno="%s", capacity="%s",  active="%d" WHERE amb_id="%s"', $this->input->post('plateno'), $this->input->post('capacity'), $this->input->post('active'), strdecode($this->input->post('id') ));
			
			if(!$this->db->query($strqry))
				echo 'update failed';
			else
				redirect(base_url("master/ambulances"));
		}
	}
	
	private function _viewambulance(){
		
		$data['ambulances'] = $this->_getambulance();
		$data['main_content'] = 'admin/ambulance/ambulance_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getambulance(){
		
		$this->load->model('mdldata');
		$params['table'] = array('name' => 'ambulances');
		$params['table']['order_by'] = 'amb_id:asc';
		
		if(!$this->mdldata->select($params))
			echo 'getting ambulance plateno failed';
		else 
			return $this->mdldata->_mRecords;
	}
	
	private function _addambulance(){
		
		$data['main_content'] = 'admin/ambulance/addambulance_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _editambulance(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		
		$data['plateno'] = $this->_selectambulance($id);
		
		$data['main_content'] = 'admin/ambulances/editambulance_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _selectambulance($config){
		
		$rid = strdecode($config);
		$params['querystring'] = sprintf("SELECT * FROM ambulances WHERE amb_id=%d", $rid);
		
		$this->load->model('mdldata');
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _deleteambulance(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : show_404();
		
		$strqry = sprintf('DELETE FROM ambulances WHERE amb_id = %d ', strdecode($id));
			
		if(!$this->db->query($strqry))
			echo 'delete failed';
		else
			redirect(base_url("reports/ambulance"));
	}
	
}