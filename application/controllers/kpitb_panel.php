<?php
/**
* 
*/
class Kpitb_panel extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect('kpitb_login');			
		}
	}
	
	public function index()
	{
		$outputData['listOfUsers']	= $this->kpitb_model->getUsers();
		$this->load->view('index',$outputData);
	}
	public function profile()
	{
		$Data['listOfUsers']	= $this->kpitb_model->getUsers();
		$ID = $this->uri->segment('3');
		$CondtionSelect = array('id' => $ID, );
		$Data['AdminInfo'] = $this->kpitb_model->SelectOneRowDataDB('staff', $CondtionSelect);
		$this->load->view('profile',$Data);
	}
	public function permission()
	{
		$this->load->view('permissions');
	}
	public function comments()
	{
		$this->load->view('comments');
	}
	public function MS()
	{
		$GetMessage = $this->input->get('Action');
		$GetSession = $this->input->post('num');
		if ($GetSession == "chatheartbeat") { $this->chatHeartbeat(); } 
		if ($GetMessage == "sendchat"){ 
			$from = $this->session->userdata('FirstName');
			$to   = $this->input->post('to');
			$message = $this->input->post('message');
			$this->sendChat($from,$to,$message);} 
		if ($GetSession == "closechat") { $this->closeChat(); } 
		if ($GetSession == "startchatsession") { $this->startChatSession(); } 
		if (!isset($_SESSION['chatHistory'])) {
			$_SESSION['chatHistory'] = array(); }
		if (!isset($_SESSION['openChatBoxes'])) {
			$_SESSION['openChatBoxes'] = array();	
		}
	}
	function chatHeartbeat() 
	{
		$Username = $this->session->userdata('FirstName');
		$WhereCondition = array('to'=>$Username,'recd'=>'0');
		$Order = 'id ASC';
		$SelectUser = $this->kpitb_model->ChatTo('chat',$WhereCondition,$Order);
		$items = '';
		$chatBoxes = array();
		// kjhjh--=----=-=-=-==--=--=-=
		if (!empty($SelectUser)) {
		foreach ($SelectUser as $each) {
			if (!isset($_SESSION['openChatBoxes'][$each->from]) && isset($_SESSION['chatHistory'][$each->from])) {
				$items = $_SESSION['chatHistory'][$each->from];
			}
		$chat['message'] = $this->sanitize($each->message);
		$items .= <<<EOD
					   {
			"s": "0",
			"f": "{$each->from}",
			"m": "{$each->message}"
	   },
EOD;
	if (!isset($_SESSION['chatHistory'][$each->from])) {
		$_SESSION['chatHistory'][$each->from] = '';
	}

	$_SESSION['chatHistory'][$each->from] .= <<<EOD
						   {
			"s": "0",
			"f": "{$each->from}",
			"m": "{$each->message}"
	   },
EOD;
		unset($_SESSION['tsChatBoxes'][$each->from]);
		$_SESSION['openChatBoxes'][$each->from] = $each->sent;
if (!empty($_SESSION['openChatBoxes'])) {
	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
			$now = time()-strtotime($time);
			$time = date('g:iA M dS', strtotime($time));

			$message = "Sent at $time";
			if ($now > 180) {
				$items .= <<<EOD
				{
				"s": "2",
				"f": "{$chatbox}",
				"m": "{$message}"
				},
EOD;

	if (!isset($_SESSION['chatHistory'][$chatbox])) {
		$_SESSION['chatHistory'][$chatbox] = '';
	}

	$_SESSION['chatHistory'][$chatbox] .= <<<EOD
				{
				"s": "2",
				"f": "{$chatbox}",
				"m": "{$message}"
				},
EOD;
			$_SESSION['tsChatBoxes'][$chatbox] = 1;
		}
		}
	}
}
	}
}
	// end----------------------------------------
	
	$WhereCondition = array('to'=>$Username,'recd'=>0);
	$Order = array('recd'=>1);
	$SelectUser = $this->kpitb_model->UpdateChatTo('chat',$WhereCondition,$Order);
	if ($items != '') {
		$items = substr($items, 0, -1);
	}
header('Content-type: application/json');
?>
{
		"items": [
			<?php echo $items;?>
        ]
}

<?php
			exit(0);
}

function chatBoxSession($chatbox) {
	
	$items = '';
	
	if (isset($_SESSION['chatHistory'][$chatbox])) {
		$items = $_SESSION['chatHistory'][$chatbox];
	}

	return $items;
}

function startChatSession() {
	$items = '';
	if (!empty($_SESSION['openChatBoxes'])) {
		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
			$items .= chatBoxSession($chatbox);
		}
	}
	if ($items != '') {
			$items = substr($items, 0, -1);
		}
	header('Content-type: application/json');
	?>
	{
			"username": "<?php echo $this->session->userdata('FirstName');?>",
			"items": [
				<?php echo $items;?>
	        ]
	}
	<?php
		exit(0);
}

function sendChat($from,$to,$message) {
	

	$_SESSION['openChatBoxes'][$to] = date('Y-m-d H:i:s', time());
	
	$messagesan = $this->sanitize($message);

	if (!isset($_SESSION['chatHistory'][$to])) {
		$_SESSION['chatHistory'][$to] = '';
	}

	$_SESSION['chatHistory'][$to] .= <<<EOD
					   {
			"s": "1",
			"f": "{$to}",
			"m": "{$messagesan}"
	   },
EOD;
	unset($_SESSION['tsChatBoxes'][$to]);

	$data = array(
			'from' => mysql_real_escape_string($from),
			'to'   => mysql_real_escape_string($to),
			'message' => mysql_real_escape_string($message),
			'sent' => date("Y-m-d H:i:s"),
			);
	$Sql = $this->kpitb_model->InsertDataintoTable('chat',$data);
	echo '1';
}

function closeChat() {

	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
	
	echo "1";
	exit(0);
}

function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;
}
public function logs()
{
	$CondtionSelect = array('id' => 1, );
	$Data['AdminInfo'] = $this->kpitb_model->SelectOneRowDataDB('staff', $CondtionSelect);
	// Users
	$this->load->view('logs',$Data);
}
public function Login_logs()
{
	$CondtionSelect = array('id' => 1, );
	$Data['AdminInfo'] = $this->kpitb_model->SelectOneRowDataDB('staff', $CondtionSelect);
	// Users
	$Data['Staff'] = $this->kpitb_model->SelectRowsDataDB('staff','first_name,id',NULL);
	$Data['LoginLogs'] = $this->kpitb_model->SelectRowsDataDB('login_status','*',NULL);
	$this->load->view('loginlogs',$Data);
}

public function Profile_Image()
{
	if ($this->input->post('changepic')) {
		$ID = $this->input->post('AdminID');
		$ProfilePicture = $this->kpitb_model->do_upload('Photo');
		$ProfileName    = $ProfilePicture['upload_data']['file_name'];
		$ProfileData = array('picture'=>$ProfileName);
		$this->db->where('id',$ID);	
		$this->db->update("staff",$ProfileData);	
		redirect(base_url().'kpitb_panel/profile/'.$ID);
	}
}
	public function GetEmployees()
	{
		$Query = $this->kpitb_model->SelectRowsDataDB('staff','*');
		$Result = array();
		foreach ($Query as $Employee) {
			$Result[] = $Employee->first_name.' '.$Employee->last_name;
		}
		echo json_encode($Result);
	}
	public function LetterLogs()
	{
		$Data['Staff'] = $this->kpitb_model->SelectRowsDataDB('staff','first_name,id',NULL);
		$Data['LetterLogs'] = $this->kpitb_model->SelectRowsDataDB('letter','*',NULL);
		$this->load->view('letter_logs',$Data);
	}
	public function NoteLogs()
	{
		$Data['Staff'] = $this->kpitb_model->SelectRowsDataDB('staff','first_name,id',NULL);
		$Data['NoteLogs'] = $this->kpitb_model->SelectRowsDataDB('intial_note','*',NULL);
		$this->load->view('note_logs',$Data);
	}
	public function ViewHistory()
	{
		$Id = $this->uri->segment(3);
		$Data['Staff'] = $this->kpitb_model->SelectRowsDataDB('staff','first_name,id',NULL);
		$Data['Letter']  =  $this->kpitb_model->SelectOneRowDataDB('letter',array('id'=>$Id));
		$Data['History']  =  $this->kpitb_model->SelectOneRowDataDB('letter_log',array('letter_id'=>$Id));
		$this->load->view('letter_history',$Data);
	}
	public function ViewHistoryNotes()
	{
		$Id = $this->uri->segment(3);
		$Data['Staff'] = $this->kpitb_model->SelectRowsDataDB('staff','first_name,id',NULL);
		$Data['Note']  =  $this->kpitb_model->SelectOneRowDataDB('intial_note',array('id'=>$Id));
		$Data['History']  =  $this->kpitb_model->SelectOneRowDataDB('note_log',array('note_id'=>$Id));
		$this->load->view('note_history',$Data);
	}
}
?>