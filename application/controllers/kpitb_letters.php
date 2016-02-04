<?php
/**
..................
 */
class Kpitb_letters extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($Message = Null) {
		$Data['listOfUsers'] = $this->kpitb_model->getUsers();
		$ColumnsToBeSelected = ['id', 'first_name', 'last_name'];
		$Data['Message'] = $Message;
		$Data['Employee'] = $this->kpitb_model->SelectRowsDataDB('staff', $ColumnsToBeSelected);
		$this->load->view('index-letters', $Data);
	}

	public function details() {
		$this->load->view('letters');
	}

	public function letter_details() {
		$Data['id'] = $this->input->post('id');
		$this->load->view('ajax/letter_details', $Data);
	}

	public function LetterLogs() {
		$outputData['listOfUsers'] = $this->kpitb_model->getUsers();
		$this->load->view('letterlogs', $outputData);
	}

	public function SendTo() {
		$WhereData = array(
			'id' => $this->input->post('file'),
			'sendto' => $this->input->post('from'),
		);
		$Condition = array('letter_id' => $this->input->post('file'));
		$UpdateData = array('received' => 1);
		$UpdateCurrentRecord = $this->kpitb_model->UpdateDataIntoDB('letter_log', $UpdateData, $Condition);
		$SendToOther = array(
			'letter_id' => $this->input->post('file'),
			'reciver_id' => $this->input->post('to'),
			'sender_id' => $this->input->post('from'),
			'received' => 0,
			'sent' => 1,
		);
		$Query = $this->kpitb_model->InsertDataintoTable('letter_log', $SendToOther);
		if ($Query) {
			return true;
		}
	}
	public function Initiate() {
		if ($this->input->post('Letter')) {
			$AttachmentFile = $this->kpitb_model->FileUpload('Files');
			$AttachmentName = $AttachmentFile['upload_data']['file_name'];
			$LetterData = array(
				'staff_id' => $this->input->post('From'),
				'subject' => $this->input->post('Subject'),
				'detail' => $this->input->post('Details'),
				'sendto' => $this->input->post('SendTo'),
				'signature' => 1,
				'attachment' => isset($AttachmentName) ? $AttachmentName : "",
				'time_stamp' => date("Y-m-d H-i-s"),
			);
			$this->kpitb_model->InsertDataintoTable('letter', $LetterData);
			//
			$WhereLetter = array('subject' => $this->input->post('Subject'), 'sendto' => $this->input->post('SendTo'), 'staff_id' => $this->input->post('From'));
			$LetterID = $this->kpitb_model->SelectOneRowDataDB('letter', $WhereLetter);
			// Also Creating Logs Of This Letter So
			$LetterLogData = array(
				'letter_id' => $LetterID[0]->id,
				'reciver_id' => $this->input->post('SendTo'),
				'sender_id' => $this->session->userdata('id'),
				'received' => 0,
				'sent' => 1,
			);
			$this->kpitb_model->InsertDataintoTable('letter_log', $LetterLogData);
			$Message = 'Letter Sent';
			$this->index($Message);
		} else {
			$Message = 'Sorry Letter Can not Created Error Exists';
			$this->index($Message);
		}
	}

	public function LoadLetters() {
		$Order = 'letter_id';
		$WhereCondition = array('reciver_id' => $this->session->userdata('id'), 'received' => 0);
		$SelectNewLetter = $this->kpitb_model->SelectOneRowData('letter_log', $WhereCondition, $Order);
		$i = 0;
		if (!empty($SelectNewLetter)) {
			foreach ($SelectNewLetter as $key) {
				$ID[$i] = $key->letter_id;
				$i++;
			}
			$Data['AllLetters'] = $this->kpitb_model->SelectLetter('letter', $ID);
			$this->load->view('ajax/letters', $Data);
		}
	}

	public function CountLetter() {
		$WhereCondition = array('received' => '0', 'reciver_id' => $this->session->userdata('id'));
		$Count['one'] = $this->kpitb_model->CountData('letter_log', $WhereCondition);
		echo json_encode($Count);
	}

	public function AddComment() {
		$DataComment = array(
			'staff_id' => $this->input->post('userid'),
			'text' => $this->input->post('comment'),
			'time_stamp' => date("Y-m-d H:i:s"),
			'signature' => $this->input->post('check'),
			'document_id' => $this->input->post('Document'),
		);
		$Query = $this->kpitb_model->InsertDataintoTable('comment', $DataComment);
		if ($Query) {
			return true;
		}
	}
	// Sent Notes
	public function Sendletter() {
		$this->load->view('sentletter');
	}
	public function SenTletter() {
		$ColumnsToBeSelected = ['id', 'first_name', 'last_name'];
		$Data['Employee'] = $this->kpitb_model->SelectRowsDataDB('staff', $ColumnsToBeSelected);
		$WhereCondition = array('sender_id' => $this->session->userdata('id'), 'sent' => 1);
		$SelectNewLetter = $this->kpitb_model->SelectOneRowData('letter_log', $WhereCondition, 'letter_id');
		$i = 0;
		if (!empty($SelectNewLetter)) {
			foreach ($SelectNewLetter as $key) {
				$ID[$i] = $key->letter_id;
				$i++;
			}
			$Data['AllLetters'] = $this->kpitb_model->SelectLetter('letter', $ID);
			$this->load->view('ajax/sentletter', $Data);
		}
	}
	public function sent_letterdetails() {
		$Data['id'] = $this->uri->segment(3);
		$this->load->view('ajax/sent_letterdetails', $Data);
	}
	// Approve Disapprove Archieve Letters
	public function ApproveLetter()
	{
		$ApproveID = $this->input->post('ID');
		$Approved = $this->kpitb_model->UpdateDataIntoDB('letter',array('approval'=>1),array('id'=>$ApproveID));
		if ($Approved) {
			return true;
		}
	}
	public function DisapproveLetter()
	{
		$Disapproval = $this->input->post('ID');
		$Disapprove = $this->kpitb_model->UpdateDataIntoDB('letter',array('approval'=>2),array('id'=>$Disapproval));
		if ($Disapprove) {
			return true;
		}
	}
	public function Archieve()
	{
		$ArchieveID = $this->input->post('ID');
		$Archieve = $this->kpitb_model->UpdateDataIntoDB('letter',array('archieve'=>1),array('id'=>$ArchieveID));
		if ($Archieve) {
			return true;
		}
	}
}
?>