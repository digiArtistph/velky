<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller{

	public function __construct() {
		parent::__construct();

	}

	public function index(){
		$this->section();

	}
	
	public function section(){
	
		$section = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
	
		switch($section){
			case 'bulksms':
				$this->_bulksms(); 
				break;
			case 'isms':
				$this->_isms();
				break;
			default:
				$this->_bulksms();
		}
	}
	
	private function _bulksms(){
		
		
		$oldMessage = $this->_getOldInbox(0);
		$old = end($oldMessage);
		$data['oldinbox'] = $this->_getInbox();
		
		if( $old[0] != $this->_getLastmsgId() ){
			if($this->_getInboxCount() != 0){
				$data['newinbox'] = $this->_getInboxdb();
			}else{
				$newMessage = $this->_getOldInbox( $this->_getLastmsgId() );
				$this->_insertInbox($newMessage);
				$data['newinbox'] = $this->_getInboxdb();
			}
		}else{
			$data['newinbox'] = $this->_getInboxdb();
		}
		
		$data['oldinbox'] = $this->_getInbox();
		$data['main_content'] = 'admin/response/bulksms/view_inbox';
		$this->load->view('includes/template', $data);
	}
	
	public function viewNewMessage(){
		$data['newinbox'] = array();
		foreach($this->_getInboxdb() as $key){
			$pattern = '/([t|T]amis)(\s)+([\w]+)(\2([\w\s]+))?/';
			
			if(preg_match($pattern, $key->message)){
				array_push($data['newinbox'], $key);
			}
		}
		
		//call_debug($data['newinbox']);
		$this->load->view('admin/response/bulksms/view_newmessage', $data);
	}
	public function viewEntityMessage(){
		$data['newinbox'] = array();
		if($this->_getInboxdb()){
			foreach($this->_getInboxdb() as $key){
				$pattern = '/([r|R]ta|[p|P]olice|[h|H]osp|[h|H]ospital)\s+(confirmed|declined)/';
					
				if(preg_match($pattern, $key->message)){
					array_push($data['newinbox'], $key);
				}
			}
	
			//call_debug($data['newinbox']);
			$this->load->view('admin/response/bulksms/view_newmessage', $data);
		}else{
			echo 1;
		}
	}

	
	private function _updateAutorecieve($id){
		$this->load->model('mdldata');
		$params['querystring'] = 'UPDATE  inbox SET repliable="1", status="1" WHERE id=' . $id;
		$this->mdldata->update($params);
	}
	
	private function _insertInbox($param){
		unset($param[0]);
		foreach ($param as $value){
			$value[0] = str_replace(array(' ', "\n", "\t", "\r"), '', $value[0]);
			$params = array(
					'table' => array('name' => 'inbox'),
					'fields' => array(
								'message_id' => $value[0],
								'number' =>  $value[1],
								'message' =>  $value[2],
								'txtdate' =>  $value[3],
								'status' =>  '0'
							 )
					);
			
				$this->mdldata->reset();
				$this->mdldata->insert($params);
		}
	}
	
	public function getCallerCount(){
		$count = 0;
		$count2= 0;
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		
		if( $this->sentinel->goFlag($params) ){
			
			if($this->_getInboxdb() != false){
				foreach($this->_getInboxdb() as $key){
					$pattern = '/([t|T]amis)(\s)+([\w]+)(\2([\w\s]+))?/';
			
					if(preg_match($pattern, $key->message)){
						$count++;
					}
			
					$pattern2 = '/([r|R]ta|[p|P]olice|[h|H]osp|[h|H]ospital)\s+(confirmed|declined)/';
			
					if(preg_match($pattern2, $key->message)){
						$count2++;
					}
			
				}
					
				echo $count . '|' . $count2;
			}else{
				
			}
		}
		else{
				echo "ses_false";
		}
			
		
		
	}
	

	public function autoResponse(){
		$params = array('sadmin_uname', 'sadmin_islog', 'sadmin_fullname');
		
		if( $this->sentinel->goFlag($params) ){
			$this->load->library('Smsutil');
			
			$body = $this->_repliable();
			
			$oldMessage = $this->_getOldInbox(0);
			$old = end($oldMessage);
			$this->load->model('mdldata');
			if( $old[0] != $this->_getLastmsgId() ){
					
				$newinput = $this->_getOldInbox($this->_getLastmsgId());
					
				unset($newinput[0]);
					
					
				foreach ($newinput as $key){
			
					$key[0] = str_replace(array(' ', "\n", "\t", "\r"), '', $key[0]);
			
					$params = array(
							'table' => array('name' => 'inbox'),
							'fields' => array(
									'message_id ' => $key[0],
									'number' => $key[1],
									'message' => $key[2],
									'txtdate' => $key[3],
									'status' => 0,
									'repliable' => 0
							)
					);
					$this->mdldata->reset();
					$this->mdldata->insert($params);
						
					$key[1] = substr($key[1], 2);
					$key[1] = '0' .  $key[1];
						
						
					$params = array(
							'recepient'	=> $key[1],
							'sms_type' => '2',
							'message'	=> $key[2]
					);
					$pattern = '/([t|T]amis)(\s)+([\w]+)(\2([\w\s]+))?/';
					$pattern2 = '/([r|R]ta|[p|P]olice|[h|H]osp|[h|H]ospital)\s+(confirmed|declined)/';
			
					if(preg_match($pattern, $key[2])){
						$params['message'] = 'We received your report message. We will contact you soon.';
			
					}elseif(preg_match($pattern2, $key[2])){
			
						$params['message'] = 'Thank for your reponse. We will assist you on your respond.';
					}else{
						$params['message'] = 'Please follow the format: tamis<space><location><space><report>';
					}
					$this->smsutil->send($params);
					call_debug($this->smsutil->mData);
				}
					
			}else{
				echo 0;
			}
		}
		else{
			
		}
			
		
		
	}
	
	private function _getLastmsgId(){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT message_id FROM inbox ORDER BY id DESC LIMIT 1";
		$this->mdldata->select($params);
		
		foreach ($this->mdldata->_mRecords as $lstid)
		
		return $lstid->message_id;
	}
	
	private function _getInbox(){
		$this->load->model('mdldata');
		$params['table']['name'] = 'inbox';
		$params['table']['criteria_phrase'] = 'status=1';
		$this->mdldata->select($params);
		return $this->mdldata->_mRecords;
	}
	
	
	private function _getInboxdb(){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM inbox WHERE status='0'";
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount < 1){
			return false;}
		else{
			return $this->mdldata->_mRecords;}
	}
	
	private function _repliable(){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM inbox WHERE status='0' AND repliable='0'";
		$this->mdldata->select($params);
		
		if($this->mdldata->_mRowCount < 0)
			return false;
		else
			return $this->mdldata->_mRecords;
	}
	
	private function _getInboxCount(){
		$this->load->model('mdldata');
		$params['querystring'] = "SELECT * FROM inbox WHERE status='0'";
		$this->mdldata->select($params);
		return $this->mdldata->_mRowCount;
	}
	
	private function _getOldInbox($id){
		$inbox = new stdClass;
		$this->load->library('smsutil');
		$this->smsutil->inbox($id);
		
		return $this->smsutil->mData;
	}
	
	public function updateInboxMessage(){
		$id = ($this->uri->segment(4)) ? $this->uri->segment(4) : show_404();
		$this->load->model('mdldata');
		$params['querystring'] = 'UPDATE inbox SET status="1" WHERE id=' . $id;
		$this->mdldata->update($params);
	}
	

}
?>