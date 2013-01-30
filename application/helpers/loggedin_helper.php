<?php if (! defined('BASEPATH')) exit ('No direct script access allowed.');

if ( ! function_exists('retrieveUserFullName')) {
	
	function retrieveUserFullName($email =  FALSE) {
		$fullname = '';
		$CI =& get_instance();
				
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		
		
		$CI->sessionbrowser->getInfo($params);
		$arr = $CI->sessionbrowser->mData;
		
		if($email)
			return $arr['sadmin_uname'];
			
		$strQuery = sprintf("SELECT  IF((ASCII(CONCAT(fname,lname))),  CONCAT(fname, ' ', lname), 'No name given') AS fullname, lname, email FROM users WHERE email='%s'", $arr['sadmin_uname']);
		$record = $CI->db->query($strQuery)->result();
		
		foreach ($record as $rec) {
			$fullname = $rec->fullname;
		}
		
		return $fullname;
	}
	
}