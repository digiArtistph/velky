<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accident extends CI_Controller{
	
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
			case 'accidentview':
				$this->_accidentview(); 
				break;
			case 'addaccident':
				$this->_addaccident(); 
				break;
			case 'editreport':
				$this->_editreport();
				break;
			case 'deletereport':
				$this->_deletereport();
				break;
			default:
				$this->_accidentview();
		}
	}
	
	private function _accidentview(){
		$data['accidents'] = $this->_getaccidentlist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accident/accident_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getaccidentlist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents a LEFT JOIN accidenttype acct on acct.at_id = a.acdnttype';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _addaccident(){
		$data['types'] = $this->_getaccidenttypelist();
		$data['main_content'] = 'admin/accident/addaccident_form';
		$this->load->view('includes/template', $data);
	}
	
	private function _getaccidenttypelist(){
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidenttype WHERE status="1"';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	public function validateaddreport(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('accidenttype', 'accidenttype', 'required');
		$validation->set_rules('barangay', 'barangay', 'required');
		$validation->set_rules('caller', 'caller', 'required');
		$validation->set_rules('acdntdate', 'acdntdate', 'required');
		$validation->set_rules('rptdate', 'acdntdarptdatete', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_addaccident();
		} else {
				
		$this->load->model('mdldata');
			
			$params = array(
					'table' => array('name' => 'accidents'),
					'fields' => array(
						'acdnttype' => $this->input->post('accidenttype'),
						'brgy' => $this->input->post('barangay'),
						'details' => $this->input->post('details'),
						'caller' => $this->input->post('caller'),
						'acdntdate' => $this->input->post('acdntdate'),
						'rptdate' => $this->input->post('rptdate'),
					)
				);
			$this->mdldata->reset();
				
			if(! $this->mdldata->insert($params))
				echo 'Insert new record failed.';
			else
				redirect(base_url("master/accident"));
		}
	}
	
	private function _editreport(){
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		
		$data['types'] = $this->_getaccidenttypelist();
		$data['accidents'] = $this->_selectreport($id);
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accident/editaccident_form';
		$this->load->view('includes/template', $data);
	}
	
	private function _selectreport($config){
		$a_id = strdecode($config);
		$params['querystring'] = sprintf("SELECT * FROM accidents a LEFT JOIN accidenttype acct on acct.at_id = a.acdnttype WHERE a_id=%d", $a_id);
		
		$this->load->model('mdldata');
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	public function validateupdatereport(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('accidenttype', 'accidenttype', 'required');
		$validation->set_rules('barangay', 'barangay', 'required');
		$validation->set_rules('caller', 'caller', 'required');
		$validation->set_rules('acdntdate', 'acdntdate', 'required');
		$validation->set_rules('rptdate', 'acdntdarptdatete', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_editreport();
		} else {
				
			$strqry = sprintf('UPDATE accidents SET acdnttype="%s", brgy="%d", details="%s", caller="%s", acdntdate="%s", rptdate="%s" WHERE a_id="%s"', $this->input->post('accidenttype'), $this->input->post('barangay'), $this->input->post('details'), $this->input->post('caller'), $this->input->post('acdntdate'), $this->input->post('rptdate'), strdecode($this->input->post('id') ));
				
			if(!$this->db->query($strqry))
				echo 'update failed';
			else
				redirect(base_url("master/accident"));
		}
	}
	
	private function _deletereport(){
	
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : show_404();
	
		$strqry = sprintf('DELETE FROM accidents WHERE a_id = %d ', strdecode($id));
			
		if(!$this->db->query($strqry))
			echo 'delete failed';
		else
			redirect(base_url("master/accident"));
	}
}