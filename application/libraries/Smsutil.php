<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * Two way version of sms broadcasting
 * 	1) using isms - local sms broadcast used only in the philippines
 *  2) using bulksms - international sms broadcast
 *
 * @author Norberto 'junlax' Libago
 * @since Wednesday, Feb. 13, 2013
 * @version 1.0.1
 *
 * Instructions:
 *	
 * 		1) $this->smsutil->send($params)
 * 					a) 
 * 						Def'n: $params['sms_type'] = 1, selects isms
 * 						$params = array(
 * 								'recepient'	=> '09352689566,09268469576',
 *								'sms_type' => '1',
 *								'message'	=> 'tongbens gwapo'
 * 								);
 *						$this->smsutil->send($params)
 *					b) 
 * 						Def'n: $params['sms_type'] = 2, selects bulks
 * 						$params = array(
 * 								'recepient'	=> '+639352689566,+639268469576',
 *								'sms_type' => '2',
 *								'message'	=> 'tongbens gwapo'
 * 								);
 *						$this->smsutil->send($params)
 *
 *
 *			// DATA:
 *			$arr = $this->smsutil->mData; // returns array of data
 *
 */

class Smsutil {

	private $CI;
	private $_mConfig1;
	private $_mConfig2;
	private $_mTo;
	public $mData;

	public function __construct() {
		
		$this->CI =& get_instance();
		$this->_mTo = array();
		$this->_configuration();
	}
	
	private function _configuration(){
		//isms
		$this->_mConfig1 = array(
				'ip_address' => '192.168.2.1',
				'port' => '81',
				'username' => 'admin',
				'password' => 'admin'
		);
		
		//Bulk Configuration Variables
		$this->_mConfig2 = array(
				'header' => 'http://bulksms.vsms.net/eapi/submission/send_sms/2/2.0',
				'header2' => 'http://bulksms.vsms.net:5567/eapi/reception/get_inbox/1/1.1?',
				'username' => 'tongbens01',
				'password' => 'tongbens0101'
		);
		
		$this->mData = new STDClass();
		$this->mData->status_code = null;
		$this->mData->status_message = null;
		$this->mData->status_description = null;
	}
	
	//returns response of text
	public function send($params){
		$param = array(
				'number_type' => null,
				'number' => $params['recepient']
		);
		
		if($params['sms_type'] == 1){
			$param['number_type'] = 1;
			$this->_exploderecepient($param);
			
			$url = 'http://'. $this->_mConfig1['ip_address'] .':'. $this->_mConfig1['port'] .'/sendmsg?';
			$data = 'user='. $this->_mConfig1['username'] .'&passwd='. $this->_mConfig1['password'] .'&cat=1&to='. $this->_mTo .'&text="' . $params['message']. '"';
			
			$qry = $this->_requestiSMS($url, $data);
			
			$this->_splistResponse($qry, 1);
		
		}
		elseif ($params['sms_type'] == 2){
			$param['number_type'] = 2;
			$this->_exploderecepient($param);
			
			$data = 'username='. $this->_mConfig2['username'] .'&password='. $this->_mConfig2['password'] . '&message='.urlencode($params['message']).'&msisdn='. $this->_mTo;
			$qry = $this->__requestBulk($this->_mConfig2['header'], $data);
			
			$this->_splistResponse($qry, 2);
		}
		
		return true;
	}
	
	private function _splistResponse($params, $type){
		if($type == 1){
			$param = explode(':', $params);
			
			if(!empty($param[0] )){
				$this->mData->status_code = $param[0];
			}
			
			if(!empty($param[1] )){
				$this->mData->status_message = $param[1];
			}
			
			if(!empty($param[2] )){
				$this->mData->status_description = $param[2];
			}
			
			if(!is_numeric(substr($params, 0, 1))){
				$this->mData->status_code = $params;
				return false;
			}
		}else{
			$param = explode('|', $params);
			
			if(!empty($param[0] )){
				$this->mData->status_code = $param[0];
			}
				
			if(!empty($param[1] )){
				$this->mData->status_message = $param[1];
			}
				
			if(!empty($param[2] )){
				$this->mData->status_description = $param[2];
			}
			
			if(!is_numeric(substr($params, 0, 1))){
				$this->mData->status_code = $params;
				return false;
			}
		}
		return true;
	}
	
	//performing request using iSMS
	private function _requestiSMS($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
		
		$params = array('http'      => array(
						'method'       => 'POST',
						'content'      => $data,
					));
		
		if ($optional_headers !== null) {
				$params['http']['header'] = $optional_headers;
			}
		
		$requesting = stream_context_create($params);
		$response = @file_get_contents($url, false, $requesting);
					
			if ($response === false) {
						$response = "200:Server Request not found";
			}
			
		return $response;
	}
	
	private function __requestBulk($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded'){
		
			$params = array('http'      => array(
					'method'       => 'POST',
					'content'      => $data,
			));
			if ($optional_headers !== null) {
				$params['http']['header'] = $optional_headers;
			}
		
			$ctx = stream_context_create($params);
		
		
			$response = @file_get_contents($url, false, $ctx);
			if ($response === false) {
				$response = "200|Server Request not found";
			}
		
		return $response;
	}

	//preping numbers to format: 1) "09232222222", "09359999999" 2) "+639353333333","+639249999999"
	private function _exploderecepient($param){
		
		if($param['number_type'] == 1){
		
			$recepients = explode(',', $param['number']);
			$temp2 = '"';
			foreach ($recepients as $temp){
				if ( (strlen($temp) == 11) || (strlen($temp) == 13) ){
					$temp2 .= $temp . '","';
					$this->_mTo = substr_replace($temp2, "", -2);
				}
				else
					return false;
			}
		}
		
		if($param['number_type'] == 2){
			
			$recepients = explode(',', $param['number']);
			$temp2 = '"';
			foreach ($recepients as $temp){
				$rest = substr($temp, 1);
				$temp3 = '+63' . $rest;
				if ( strlen($temp3) == 13 ){
					$temp2 .= $temp3 . '","';
					$this->_mTo = substr_replace($temp2, "", -2);
				}
				else
					return false;
			}
		}
		return true;
	}
	
	public function inbox($id){
		$url = $this->_mConfig2['header2'];
		
		$data = 'username='. $this->_mConfig2['username'] .'&password='. $this->_mConfig2['password'] .'&cat=1&last_retrieved_id=' . $id;
		
		$this->_splitArray($this->__requestInboxBulk($url, $data));
	}
	
	private function _splitArray($qry){
		$eachArray = preg_split('/(?<=t)\s(?=\d)|(?<=\|\d)\s/', $qry);
		$this->mData = array();
		foreach ($eachArray as $var){
			$variable = explode('|', $var);
			array_push($this->mData, $variable);
		}
	}
	
	private function __requestInboxBulk($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded'){
	
		$params = array('http'      => array(
				'method'       => 'POST',
				'content'      => $data,
		));
		
		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}
	
		$ctx = stream_context_create($params);
	
	
		$response = @file_get_contents($url, false, $ctx);
		if ($response === false) {
			$response = "200|Server Request not found";
		}
	
		return $response;
	}
}