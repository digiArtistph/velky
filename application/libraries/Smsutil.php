<?php
class Smsutil {

	private $CI;
	private $_mConfig;
	private $_mRecepient;
	private  $_mMessage;
	private $_mTo;

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
		
		//variable config
		$this->_mRecepient = $params['recepient'];
		$this->_mMessage = $params['message'];
		
		//SMS Configuration Variables
		$this->_mConfig = array(
				'ip_address' => '192.168.2.1',
				'port' => '81',
				'username' => 'admin',
				'password' => 'admin'
		);
		
		return true;
	}
	
	public function send(){
		
		if($this->_exploderecepient()){
			$url = 'http://'. $this->_mConfig['ip_address'] .':'. $this->_mConfig['port'] .'/sendmsg?user='. $this->_mConfig['username'] .'&passwd='. $this->_mConfig['password'] .'&cat=1&to='. $this->_mTo .'&text="' . $this->_mMessage. '"';
			return $url;
		}else{
			return false;
		}
	}
	
	private function _exploderecepient(){
		
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
		
		return true;
	}
	
	
}