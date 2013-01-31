<?php
class Smsutil {

	private $CI;
	private $_mConfig1;
	private $_mConfig2;
	private $_mRecepient;
	private  $_mMessage;
	private $_mTo;
	public $mData;

	public function __construct($params = array()) {
		
		$this->CI =& get_instance();
		$this->_mTo = array();
		
		if(!empty($params)) // config of sms function
			$this->_configuration($params);
	}
	
	private function _configuration($params){
		
		if(empty($params))
			return FALSE;
		
		if(!array_key_exists('recepient', $params))
			return FALSE;
		
		if(!array_key_exists('message', $params)) // blank message
			return FALSE;
		
		$this->_mRecepient = $params['recepient'];
		$this->_mMessage = $params['message'];
		
		//iSMS Configuration Variables
		$this->_mConfig1 = array(
				'ip_address' => '192.168.2.1',
				'port' => '81',
				'username' => 'admin',
				'password' => 'admin'
		);
		
		//Bulk Configuration Variables
		$this->_mConfig2 = array(
				'header' => 'http://bulksms.vsms.net/eapi/submission/send_sms/2/2.0',
				'username' => 'tongbens01',
				'password' => 'tongbens0101'
		);
		
		//private $_mConfig1;
		return true;
	}
	
	//returns response of text
	public function send($smsType){
		
		if($smsType == 'isms'){
				$this->_exploderecepient(1);
				$url = 'http://'. $this->_mConfig1['ip_address'] .':'. $this->_mConfig1['port'] .'/sendmsg?';
				$data = 'user='. $this->_mConfig1['username'] .'&passwd='. $this->_mConfig1['password'] .'&cat=1&to='. $this->_mTo .'&text="' . $this->_mMessage. '"';
				
				$this->mData = $this->_requestiSMS($url, $data);
				
		}
			
		if ($smsType == 'bulk'){
				$this->_exploderecepient(2);
				$data = 'username='. $this->_mConfig2['username'] .'&password='. $this->_mConfig2['password'] . '&message='.urlencode($this->_mMessage).'&msisdn='. $this->_mTo;
				
				$this->mData = $this->__requestBulk($this->_mConfig2['header'], $data);
				
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
						$response = "Problem reading data from $url, No status returned\n";
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
				$response = "Problem reading data from $url, No status returned\n";
			}
		
		return $response;
	}

	//preping numbers to format: 1) "09232222222", "09359999999" 2) "+639353333333","+639249999999"
	private function _exploderecepient($param){
		
		if($param == 1){
		
			$recepients = explode(',', $this->_mRecepient);
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
		
		if($param == 2){
			
			$recepients = explode(',', $this->_mRecepient);
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
	
	
}