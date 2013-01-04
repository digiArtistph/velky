<?php if (! defined('BASEPATH')) exit ('No direct script access allowed.');

if( ! function_exists('showData')) {
	function showData() {
		$CI = & get_instance();
		$accidenttype = array();
		$d1 = "";
		$d2 = "";
		$d3 = "";
		$dataLabel = array();
		
		$strQry = sprintf("SELECT COUNT(a.acdnttype) AS `count`, at.at_id, at.name, DATE(a.stamp) AS `Date` FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE ((DATE(a.stamp) BETWEEN (DATE_SUB(CURDATE(), INTERVAL (DAYOFWEEK(CURDATE())-1) DAY)) AND (ADDDATE(DATE_SUB(CURDATE(), INTERVAL (DAYOFWEEK(CURDATE())-1) DAY), INTERVAL 6 DAY))) AND at.at_id IN (SELECT a.acdnttype FROM accidents a LEFT JOIN accidenttype at ON a.acdnttype=at.at_id WHERE DATE(a.stamp) BETWEEN (DATE_SUB(CURDATE(), INTERVAL (DAYOFWEEK(CURDATE())-1) DAY)) AND (ADDDATE(DATE_SUB(CURDATE(), INTERVAL (DAYOFWEEK(CURDATE())-1) DAY), INTERVAL 6 DAY)) GROUP BY a.acdnttype ORDER BY COUNT(a.acdnttype) DESC)) GROUP BY DATE(a.stamp), a.acdnttype ORDER BY at.name DESC");
		
		$record = $CI->db->query($strQry)->result();
		
		foreach($record as $rec):
			$accidenttype[] = $rec->name;
		endforeach;
		
		$accidenttype = array_unique($accidenttype);
		
		// re-index the arrray
		$tmparr = array();
		foreach($accidenttype as $val):
			$tmparr[] = $val;
			$dataLabel[] = $val;
		endforeach;
		
		// assigns back to the original array
		$accidenttype = $tmparr;
		
		//var_dump($accidenttype);
		foreach($record as $rec):
			
			switch($rec->name) {
				case $accidenttype[0]:
					$d1 .= sprintf("[new Date('%s').getTime(),%d],", $rec->Date, $rec->count);
					break;
				case $accidenttype[1]:
					$d2 = sprintf("[new Date('%s').getTime(),%d],", $rec->Date, $rec->count);
					break;					
				case $accidenttype[2]:
					$d3 = sprintf("[new Date('%s').getTime(),%d],", $rec->Date, $rec->count);
					break;	
			}
						
		endforeach;
		
		$label = sprintf("var d1Label = '%s'; var d2Label = '%s'; var d3Label = '%s';", $dataLabel[0], $dataLabel[1], $dataLabel[2]);
		$d1 = sprintf(" var d1 = [%s];", trim($d1, ','));
		$d2 = sprintf(" var d2 = [%s];", trim($d2, ','));
		$d3 = sprintf(" var d3 = [%s];", trim($d3, ','));
		
		echo $d1 ;
		echo $d2 ;
		echo $d3 ;
		echo $label;
	}
}
