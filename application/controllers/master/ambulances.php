<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ambulances extends CI_Controller{
	
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
			
			$params= array (
				'plateno' => $this->input->post('plateno'),
				'capacity' => $this->input->post('capacity'),
					'h_id' => $this->input->post('h_id')
				
			);
				
			$this->db->query("CALL sp_insert_ambulance(?,?,?)", $params);
			
			redirect(base_url("master/ambulances"));
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
		
	
		$data['ambulances'] = $this->_getambulanceandhospital();
		$data['main_content'] = 'admin/ambulance/ambulance_view';
			$this->load->view('includes/template', $data);
	}
	
	private function _getambulanceandhospital(){
	
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT h.name, h.address, h.phone, a.amb_id, a.plateno, a.capacity, a.active FROM (hospitals_ambulances ha LEFT JOIN hospitals h ON ha.h_id = h.h_id) LEFT JOIN ambulances a ON ha.amb_id = a.amb_id ORDER BY h.name ASC";
	
	
		if(!$this->mdldata->select($params))
			echo 'getting ambulance and hospital records failed';
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _addambulance(){
		
		$data['types'] = $this->_gethospitallist();
		$data['main_content'] = 'admin/ambulance/addambulance_view';
		$this->load->view('includes/template', $data);		
	}
	
	
	private function _gethospitallist(){
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM hospitals WHERE status="1"';
	
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _editambulance(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		$data['types'] = $this->_gethospitallist();
		$data['plateno'] = $this->_selectambulance($id);
		
		call_debug($data);
		$data['main_content'] = 'admin/ambulance/editambulance_view';
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
			redirect(base_url("reports/hospitalsambulances"));
	}
	
}