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
				$this->_addaccident();
		}
	}
	
	private function _accidentview(){
		$data['accidents'] = $this->_getaccidentlist();
		
		$data['main_content'] = 'admin/accident/accident_view';	
		$this->load->view('includes/template', $data);
	}
	
	private function _getbarangaytype(){
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM  barangay';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
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
		$data['barangaytypes'] = $this->_getbarangaytype();
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
		
		//$validation->set_rules('indexid', 'error', 'required');
		$validation->set_rules('accidenttype', 'accidenttype', 'required');
		$validation->set_rules('barangay', 'barangay', 'required');
		$validation->set_rules('caller', 'caller', 'required');
		$validation->set_rules('acdntdate', 'acdntdate', 'required');
		$validation->set_rules('rptdate', 'acdntdarptdatete', 'required');
		
		if($validation->run() ===  FALSE) {
			echo '1';
		} else {
		
			$strQry = 'INSERT INTO accidents (a_id, acdnttype, brgy, details, caller, acdntdate, rptdate) VALUES ("' . $this->input->post("indexid") . '","' .  $this->input->post("accidenttype") . '","' .  $this->input->post("barangay") .  '","' .  $this->input->post("details") . '","' .  $this->input->post("caller") . '","' .  $this->input->post("acdntdate") . '","' .  $this->input->post("rptdate") .'") 
			ON DUPLICATE KEY UPDATE acdnttype="' . $this->input->post("accidenttype") .'", brgy="'. $this->input->post("barangay") .'", details="'. $this->input->post("details")  .'", caller="'. $this->input->post("caller") .'", acdntdate="'. $this->input->post("acdntdate") .'", rptdate="' .$this->input->post("rptdate") . '"';
			//call_debug($strQry);
			if(!$this->db->query($strQry)){
				echo 'Insert new record failed.';
			}
			else{
				if ($this->db->insert_id() == 0){
					echo $this->input->post("indexid");
				}
				else{
					echo $this->db->insert_id();
				}
			}
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
	
	public function validatesendsms(){
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		
		$validation->set_rules('lst_id', 'ID', 'required');
		$validation->set_rules('broadcastto', 'Checkbox', 'required');
		$validation->set_rules('message', 'Message', 'required');
		$validation->set_rules('smstype', 'SMS Type', 'required');
		
		if($validation->run() ===  FALSE) {
			$this->_addaccident();
		} else {
			$this->load->library('smsutil');
			
			$query = $this->_prepsql($this->input->post('broadcastto'), $this->input->post('lst_id')); // returns sql statement from selected recepient
			
			$params = array(
					'recepient'	=> $this->_getnumbers($query),
					'sms_type' => $this->input->post('smstype'),
					'message'	=> $this->input->post('message')
						);
			
			if( $this->smsutil->send($params) ) {
				$mData = $this->smsutil->mData;
				echo 'ID : ' . $mData->status_code . ' , message : ' .$mData->status_message ;
			}
		
		}
	}
	
	//returns sql statement
	private function _prepsql($arrentity, $lstid){
		$sqltemp = '';
		$broadcasted = 0;
		foreach ($arrentity as $table){
			
			if($table == 'police'){
				$sqltemp .= ' SELECT mobile FROM police UNION';
				$broadcasted += 4;
			}
			if($table == 'rta'){
				$sqltemp .= ' SELECT mobile FROM rta UNION';
				$broadcasted += 2;
			}
			if($table == 'hospitals'){
				$sqltemp .= ' SELECT mobile FROM hospitals UNION';
				$broadcasted += 1;
			}
		}
		
		$this->_updatetobroadcasted($broadcasted, $lstid);
		
		$sql = substr_replace($sqltemp, "", -5);
		return $sql;
	}
	
	// returns numbers
	private function _getnumbers($sql){
		$this->load->model('mdldata');
		$params['querystring'] = mysql_escape_string($sql);
		
			if(!$this->mdldata->select($params)){
				return false;
			}
			else{
				$to = '';
				foreach ( $this->mdldata->_mRecords as $temp){
		
					$recepient = explode(',', $temp->mobile);
					foreach ($recepient as $rec){
						$to .= $rec .',';
					}
					
				}
				$numbers = substr_replace($to, "", -1);
			
				return $numbers; // returns numbers
			}

		return true;
	}
	
	private function _updatetobroadcasted($value, $id){
		//$value = $value & 1111;
		$strqry = sprintf('UPDATE accidents SET broadcasted="%s" WHERE a_id="%d"', $value, $id);
		
		if($this->db->query($strqry))
			return true;
	}
	
}