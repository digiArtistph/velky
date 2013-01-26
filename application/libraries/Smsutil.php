<?php
class Smsutil {

	private $CI;
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
		
		return true;
	}
	
	public function send(){
		
		if($this->_exploderecepient()){
			//send protocol
			return true;
		}else{
			return false;
		}
	}
	
	private function _exploderecepient(){
		$recepients = explode(';', $this->_mRecepient);
		
		foreach ($recepients as $temp){
			
			if ( (strlen($temp) == 11) || (strlen($temp) == 13) )
				array_push($this->_mTo, $temp);
			else
				return false;
		}
		
		return true;
	}
	
}