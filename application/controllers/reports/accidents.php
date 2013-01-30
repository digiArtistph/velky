<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accidents extends CI_Controller{
	
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
			case 'accidentsview':
				$this->_accidentsview(); 
				break;
			case 'dayaccidents':
				$this->_dayaccidents(); 
				break;
			case 'weekaccidents':
				$this->_weekaccidents();
				break;
			case 'monthaccidents':
				$this->_monthaccidents();
				break;
			case 'yearaccidents':
				$this->_yearaccidents();
				break;
			case 'barangayaccidents':
				$this->_barangayaccidents();
				break;
			default:
				$this->_accidentsview();
		}
	}
	
	private function _accidentsview(){
		$data['main_content'] = 'admin/accidents/views';
		$this->load->view('includes/template', $data);
	}
	
	
	private function _dayaccidents(){
		$data['accidents'] = $this->_getdayaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/accidents_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getdayaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents WHERE acdntdate BETWEEN "" AND ""';
		
		$today=getdate();
		print_r($today);
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _weekaccidents(){
		$data['accidents'] = $this->_getweekaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/accidents_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getweekaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents a LEFT JOIN accidenttype acct on acct.at_id = a.acdnttype WHERE BETWEEN acdntdate="2013-01-01" AND acdntdate="2013-01-02"';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _monthaccidents(){
		$data['accidents'] = $this->_getmonthaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/accidents_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getmonthaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents a LEFT JOIN accidenttype acct on acct.at_id = a.acdnttype WHERE acdntdate ';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _yearaccidents(){
		$data['accidents'] = $this->_getyearaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/accidents_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getyearaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents WHERE acdntdate= ';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _barangayaccidents(){
		$data['accidents'] = $this->_getbarangayaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/accidents_view';
		$this->load->view('includes/template', $data);
	}
	
	private function _getbarangayaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents WHERE brgy=%d';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
}