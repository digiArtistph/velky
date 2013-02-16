<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller{

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
		$params = array('recepient'	=> '1','message'	=> '1');
		/*
		$this->load->library('smsutil', $params);
		$this->smsutil->inbox();
		
		if(!$msgs){
			echo 'no message';
		}else{
			echo count($msgs)." inbox messages, as follows:"; 
		}
			foreach($msgs as $item){
				echo "Message ID: ".$item[0]."";?></td>
				echo "Sender: ".$item[1]."";?></td>
						</tr>
						<tr>
							<td><?php echo "Message: ".$item[2]."";?></td>
						</tr>
						<tr>
							<td><?php echo "Date & Time: ".$item[3]."";?></td>
						</tr>
						<tr>
							<td><?php echo "MSISDN: ".$item[4].""; ?></td>
						</tr>
						<tr>
							<td><?php echo "Referring message ID: ".$item[5]."";?></td>
						</tr>
						<?php endforeach;?>
			<?php endif;?>
			*/
		$data['msgs'] = null;  //$this->smsutil->mData;
		$data['main_content'] = 'admin/response/bulksms/view_inbox';
		$this->load->view('includes/template', $data);
	}
	
	private function _isms(){
		
	}
}
?>