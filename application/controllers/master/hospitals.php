<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hospitals extends CI_Controller{
	
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
			case 'addhospital':
				$this->_addhospital();
				break;
			case 'edithospital':
				$this->_edithospital();
				break;
			case 'deletehospital':
				$this->_deletehospital();
				break;
			default:
				$this->_viewhospital();
		}
	}
	
	public function validatenewhospital(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('name', 'name', 'required');
		$validation->set_rules('address', 'address', 'required');
		$validation->set_rules('phone', 'phone', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_addhospital();
		} else {
			
			$this->load->model('mdldata');
			
			$params = array(
					'table' => array('name' => 'hospitals'),
					'fields' => array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'phone' => $this->input->post('phone'),
						'status' => 1
						)
					);
			$this->mdldata->reset();
				
			if(! $this->mdldata->insert($params))
				echo 'Insert new record failed.';
			else
				redirect(base_url("master/hospitals"));
		}
	}
	
	public function validateupdatehospital(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('id', 'id', 'required');
		$validation->set_rules('name', 'name', 'required');
		$validation->set_rules('address', 'address', 'required');
		$validation->set_rules('phone', 'phone', 'required');
		$validation->set_rules('status', 'status', 'integer');
		
		if($validation->run() ===  FALSE) {
			$this->_edithospital();
		} else {
			
			$strqry = sprintf('UPDATE hospitals SET name="%s", address="%s", phone="%s",  status="%d" WHERE h_id="%s"', $this->input->post('name'), $this->input->post('address'), $this->input->post('phone'), $this->input->post('status'), strdecode($this->input->post('id') ));
			
			if(!$this->db->query($strqry))
				echo 'update failed';
			else
				redirect(base_url("master/hospitals"));
		}
	}
	
	private function _viewhospital(){
		
		$data['hospitals'] = $this->_gethospital();
		$data['main_content'] = 'admin/hospitals/hospital_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _gethospital(){
		
		$this->load->model('mdldata');
		$params['table'] = array('name' => 'hospitals');
		$params['table']['order_by'] = 'h_id:asc';
		
		if(!$this->mdldata->select($params))
			echo 'getting Hospital name failed';
		else 
			return $this->mdldata->_mRecords;
	}
	
	private function _addhospital(){
		
		$data['main_content'] = 'admin/hospitals/addhospital_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _edithospital(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		
		$data['name'] = $this->_selecthospital($id);
		
		$data['main_content'] = 'admin/hospitals/edithospital_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _selecthospital($config){
		
		$rid = strdecode($config);
		$params['querystring'] = sprintf("SELECT * FROM hospitals WHERE h_id=%d", $rid);
		
		$this->load->model('mdldata');
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _deletehospital(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : show_404();
		
		$strqry = sprintf('DELETE FROM hospitals WHERE h_id = %d ', strdecode($id));
			
		if(!$this->db->query($strqry))
			echo 'delete failed';
		else
			redirect(base_url("master/hospitals"));
	}
}