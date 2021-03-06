<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rta extends CI_Controller{
	
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
			case 'addoffice':
				$this->_addoffice();
				break;
			case 'editoffice':
				$this->_editoffice();
				break;
			case 'deleteoffice':
				$this->_deleteoffice();
				break;
			default:
				$this->_viewoffice();
		}
	}
	
	public function validatenewoffice(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('office', 'Office', 'required');
		$validation->set_rules('address', 'Address', 'required');
		$validation->set_rules('mobile', 'Mobile No.', 'required');
		$validation->set_rules('phone', 'Telephone No.', 'required|alpha_dash');
		
		if($validation->run() ===  FALSE) {
			$this->_addoffice();
		} else {
			
			$this->load->model('mdldata');
			
			$params = array(
					'table' => array('name' => 'rta'),
					'fields' => array(
						'office' => $this->input->post('office'),
						'address' => $this->input->post('address'),
						'mobile' => $this->input->post('mobile'),
						'phone' => $this->input->post('phone'),
						'contactperson' => $this->input->post('contactperson')
						)
					);
			$this->mdldata->reset();
				
			if(! $this->mdldata->insert($params))
				echo 'Insert new record failed.';
			else
				redirect(base_url("master/rta"));
		}
	}
	
	public function validateupdateoffice(){
		
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('id', 'id', 'required');
		$validation->set_rules('office', 'Office', 'required');
		$validation->set_rules('mobile', 'Mobile No.', 'required');
		$validation->set_rules('address', 'Telephone No.', 'required');
		$validation->set_rules('phone', 'Phone', 'required|alpha_dash');
		
		if($validation->run() ===  FALSE) {
			$this->_editoffice();
		} else {
			
			$strqry = sprintf('UPDATE rta SET office="%s", address="%s", phone="%s", contactperson="%s" WHERE r_id="%s"', $this->input->post('office'), $this->input->post('address'), $this->input->post('phone'), $this->input->post('contactperson'), strdecode($this->input->post('id') ));
			
			if(!$this->db->query($strqry))
				echo 'update failed';
			else
				redirect(base_url("master/rta"));
		}
	}
	
	private function _viewoffice(){
		
		$config = array();
		$config["base_url"] = base_url() . "master/rta/section/viewoffice/";
		$config["total_rows"] = $this->_totaloffice();
		$config["per_page"] = 10;
		$config["uri_segment"] = 5;
		
		$this->load->library("pagination");
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data["links"] = $this->pagination->create_links();
		
		$data['offices'] = $this->_getoffice($config["per_page"], $page);
		$data['main_content'] = 'admin/rta/rta_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _totaloffice(){
		$this->load->model('mdldata');
		$params['table'] = array('name' => 'rta');
		
		if(!$this->mdldata->select($params))
			echo 'getting rta office failed';
		else
			return $this->mdldata->_mRowCount;
	}
	
	private function _getoffice($limit, $start){
		
		$this->load->model('mdldata');
		$params['table'] = array('name' => 'rta');
		$params['table']['order_by'] = 'r_id:asc';
		$params['table']['limit'] = $start . ':' . $limit;
		
		if(!$this->mdldata->select($params))
			echo 'getting rta office failed';
		else 
			return $this->mdldata->_mRecords;
	}
	
	private function _addoffice(){
		
		$data['main_content'] = 'admin/rta/addoffice_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _editoffice(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : (($this->input->post('id')) ? $this->input->post('id'): 0);
		//call_debug($id);
		$data['office'] = $this->_selectoffice($id);
		
		$data['main_content'] = 'admin/rta/editoffice_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _selectoffice($config){
		
		$rid = strdecode($config);
		$params['querystring'] = sprintf("SELECT * FROM rta WHERE r_id=%d", $rid);
		
		$this->load->model('mdldata');
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _deleteoffice(){
		
		$id = ($this->uri->segment(5)) ? $this->uri->segment(5) : show_404();
		
		$strqry = sprintf('DELETE FROM rta WHERE r_id = %d ', strdecode($id));
			
		if(!$this->db->query($strqry))
			echo 'delete failed';
		else
			redirect(base_url("master/rta"));
	}
}