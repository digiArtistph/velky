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
		// $data['main_content'] = 'admin/accidents/views';
		$data['main_content'] = 'admin/accidents/accidents_filter_views';
		$this->load->view('includes/template', $data);
	}
	
	
	private function _dayaccidents(){
		$data['accident_monday'] = $this->_getdayaccidentslist(2);
		$data['accident_tuesday'] = $this->_getdayaccidentslist(3);
		$data['accident_wednesday'] = $this->_getdayaccidentslist(4);
		$data['accident_thursday'] = $this->_getdayaccidentslist(5);
		$data['accident_friday'] = $this->_getdayaccidentslist(6);
		$data['accident_saturday'] = $this->_getdayaccidentslist(7);
		$data['accident_sunday'] = $this->_getdayaccidentslist(1);
		//call_debug( $data['accident_tuesday'] );
		$data['main_content'] = 'admin/accidents/view_by_day';
		$this->load->view('includes/template', $data);
	}
	
	private function _getdayaccidentslist($weekday){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM  accidents WHERE DAYOFWEEK(acdntdate ) = ' . $weekday;
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _weekaccidents(){
		//$data['accidents'] = $this->_getweekaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/view_by_week';
		$this->load->view('includes/template', $data);
	}
	
	private function _getweekaccidentslist(){
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM  accidents WHERE WEEKOFYEAR(acdntdate ) = ' . $i;
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _monthaccidents(){
		$data['accident_january'] = $this->_getmonthaccidentslist(2);
		$data['accident_february'] = $this->_getmonthaccidentslist(3);
		$data['accident_march'] = $this->_getmonthaccidentslist(4);
		$data['accident_april'] = $this->_getmonthaccidentslist(5);
		$data['accident_may'] = $this->_getmonthaccidentslist(6);
		$data['accident_june'] = $this->_getmonthaccidentslist(7);
		$data['accident_july'] = $this->_getmonthaccidentslist(1);
		$data['accident_august'] = $this->_getmonthaccidentslist(1);
		$data['accident_september'] = $this->_getmonthaccidentslist(1);
		$data['accident_october'] = $this->_getmonthaccidentslist(1);
		$data['accident_november'] = $this->_getmonthaccidentslist(1);
		$data['accident_december'] = $this->_getmonthaccidentslist(1);
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/view_by_month';
		$this->load->view('includes/template', $data);
	}
	
	private function _getmonthaccidentslist($month){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM  accidents WHERE DAYOFWEEK(acdntdate ) = ' . $month;
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _yearaccidents(){
		//$data['accidents'] = $this->_getyearaccidentslist();
		//call_debug($data['accidents']);
		$data['main_content'] = 'admin/accidents/view_by_year';
		$this->load->view('includes/template', $data);
	}
	
	private function _getyearaccidentslist(){
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM  accidents WHERE YEAR(acdntdate ) = ' . $i;
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}	
	
	private function _barangayaccidents(){
		//$data['accidents'] = $this->_getbarangayaccidentslist();
		//call_debug($data['accidents']);
		$data['barangaytypes'] = $this->_getbarangaytype();
		$data['main_content'] = 'admin/accidents/view_by_barangay';
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
	
	private function _getbarangayaccidentslist(){
		
		$this->load->model('mdldata');
		$params['querystring'] = 'SELECT * FROM accidents WHERE brgy=%d';
		
		if(!$this->mdldata->select($params))
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	public function accidentfilterbydate() {
		$from = $this->input->post('acdntdatefrom');
		$to = $this->input->post('acdntdateto');
		
		$strQry = sprintf("SELECT a.a_id, at.name AS accident, b.name AS barangay, a.acdntdate, a.stamp, DAYNAME(a.stamp) AS `day` FROM ((accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id) LEFT JOIN barangay b ON a.brgy=b.b_id) WHERE a.stamp BETWEEN '%s' AND '%s'", $from, $to);
		
		$this->load->view('admin/accident/ajx_accident_filter_by_date');
	}
	
}