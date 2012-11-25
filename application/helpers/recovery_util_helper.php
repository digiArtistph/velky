<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


	if(!function_exists('auth_email')) {
		
		function auth_email($param) {
			$CI = get_instance();
			$strqry = sprintf('SELECT * FROM users WHERE email = "%s"', $param);
			
			if($CI->db->query($strqry)->num_rows() == 1 ){
				return true;
			}
			return false;
			
		}
	}
	
	if(!function_exists('auth_session')) {
		
		function auth_session($param) {
			$CI = get_instance();
			$strqry = sprintf('SELECT * FROM velky_sessions WHERE session_id  = "%s"', $param);
			$query = $CI->db->query($strqry)->result();
			//call_debug($CI->session->userdata('session_id'),false);
			//call_debug($param);
				if( $CI->db->query($strqry)->num_rows < 1 ){
						return false;
				}else{
					if($CI->session->userdata('session_id') == $param){
						return true;
					}else{
						return false;
					}
				}	
				
		}
	}
		
