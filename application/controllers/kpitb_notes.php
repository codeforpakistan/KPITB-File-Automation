<?php
/**
 *
----------------------------=--------=-
 */
class Kpitb_notes extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index($Message = NULL) {
		$Data['listOfUsers'] = $this->kpitb_model->getUsers();
		$Data['Message'] = $Message;
		$ColumnsToBeSelected = ['id', 'first_name', 'last_name'];
		$Data['Employee'] = $this->kpitb_model->SelectRowsDataDB('staff', $ColumnsToBeSelected);
		$this->load->view('index-notes', $Data);
	}
	public function Newnotes() {
		$outputData['listOfUsers'] = $this->kpitb_model->getUsers();
		$this->load->view('notes_comments', $outputData);
	}
	public function Note_details() {
		$Data['id'] = $this->input->post('id');
		$this->load->view('ajax/notes_details', $Data);
	}
	public function details() {
		$this->load->view('notes');
	}

	public function Loadnotes() {
		// From Log
		$Order = 'note_id';
		$WhereCondition = array('reciver_id' => $this->session->userdata('id'), 'received' => 0);
		$SelectNewNotes = $this->kpitb_model->SelectOneRowData('note_log', $WhereCondition, $Order);
		$i = 0;
		if (!empty($SelectNewNotes)) {
			foreach ($SelectNewNotes as $key) {
				$ID[$i] = $key->note_id;
				$i++;
			}
			$Data['AllNotes'] = $this->kpitb_model->SelectNotes('intial_note', $ID);
			$this->load->view('ajax/notes', $Data);
		}
	}
	public function Initiate() {
		if ($this->input->post('Notes')) {
			$AttachmentFile = $this->kpitb_model->FileUpload('Files');
			$SendTo = $this->input->post('SendTo');
			$AttachmentName = $AttachmentFile['upload_data']['file_name'];
			$NoteData = array(
				'staff_id' => $this->input->post('From'),
				'subject' => $this->input->post('Subject'),
				'detail' => $this->input->post('text'),
				'sendto' => $this->input->post('SendTo'),
				'signature' => 1,
				'attachment' => isset($AttachmentName) ? $AttachmentName : "",
				'time_stamp' => date("Y-m-d H-i-s"),
			);

			$this->kpitb_model->InsertDataintoTable('intial_note', $NoteData);
			$WhereNote = array(
				'subject' => $this->input->post('Subject'),
				'staff_id' => $this->input->post('From'),
			);
			$NoteID = $this->kpitb_model->SelectOneRowDataDB('intial_note', $WhereNote);
			$NoteLogData = array(
				'note_id' => $NoteID[0]->id,
				'reciver_id' => $this->input->post('SendTo'),
				'sender_id' => $this->session->userdata('id'),
				'received' => 0,
				'sent' => 1,
			);
			$this->kpitb_model->InsertDataintoTable('note_log', $NoteLogData);
			$Message = 'Note Sent';
			$this->index($Message);
		} else {
			$Message = 'Sorry Note Can not Created Error Exists';
			$this->index($Message);
		}
	}
	public function CountNotes() {
		$WhereCondition = array('received' => '0', 'reciver_id' => $this->session->userdata('id'));
		$Count['one'] = $this->kpitb_model->CountData('note_log', $WhereCondition);
		echo json_encode($Count);
	}
	public function SendTo() {
		$WhereData = array(
			'id' => $this->input->post('file'),
			'sendto' => $this->input->post('from'),
		);
		$Condition = array('note_id' => $this->input->post('file'));
		$UpdateData = array('received' => 1);
		$UpdateCurrentRecord = $this->kpitb_model->UpdateDataIntoDB('note_log', $UpdateData, $Condition);
		$SendToOther = array(
			'note_id' => $this->input->post('file'),
			'reciver_id' => $this->input->post('to'),
			'sender_id' => $this->input->post('from'),
			'received' => 0,
			'sent' => 1,
		);
		$Query = $this->kpitb_model->InsertDataintoTable('note_log', $SendToOther);
		if ($Query) {
			return true;
		}
	}
	public function AddComment() {
		$DataComment = array(
			'staff_id' => $this->input->post('userid'),
			'text' => $this->input->post('comment'),
			'time_stamp' => date("Y-m-d H:i:s"),
			'signature' => $this->input->post('check'),
			'document_id' => $this->input->post('Document'),
		);
		$Query = $this->kpitb_model->InsertDataintoTable('comment_notes', $DataComment);
		if ($Query) {
			return true;
		}
	}
	// Sent Notes
	public function SendNotes() {
		$Data['listOfUsers'] = $this->kpitb_model->getUsers();
		$this->load->view('sentnotes');
	}
	public function SenTNotes() {
		$ColumnsToBeSelected = ['id', 'first_name', 'last_name'];
		$Data['Employee'] = $this->kpitb_model->SelectRowsDataDB('staff', $ColumnsToBeSelected);
		$WhereCondition = array('sender_id' => $this->session->userdata('id'), 'sent' => 1);
		$SelectNewNote = $this->kpitb_model->SelectOneRowData('note_log', $WhereCondition, 'note_id');
		$i = 0;
		if (!empty($SelectNewNote)) {
			foreach ($SelectNewNote as $key) {
				$ID[$i] = $key->note_id;
				$i++;
			}
			$Data['AllNotes'] = $this->kpitb_model->SelectLetter('intial_note', $ID);
			$this->load->view('ajax/sentnotes', $Data);
		}
	}
	public function sent_notedetails() {
		$Data['id'] = $this->uri->segment(3);
		$this->load->view('ajax/sent_notedetails', $Data);
	}
	public function NoteLogs() {
		$outputData['listOfUsers'] = $this->kpitb_model->getUsers();
		$this->load->view('notelogs', $outputData);
	}
	// Approve Disapprove Archieve Letters
	public function ApproveNote()
	{
		$ApproveID = $this->input->post('ID');
		$Approved = $this->kpitb_model->UpdateDataIntoDB('intial_note',array('approval'=>1),array('id'=>$ApproveID));
		if ($Approved) {
			return true;
		}
	}
	public function DisapproveNote()
	{
		$Disapproval = $this->input->post('ID');
		$Disapprove = $this->kpitb_model->UpdateDataIntoDB('intial_note',array('approval'=>2),array('id'=>$Disapproval));
		if ($Disapprove) {
			return true;
		}
	}
	public function Archieve()
	{
		$ArchieveID = $this->input->post('ID');
		$Archieve = $this->kpitb_model->UpdateDataIntoDB('intial_note',array('archieve'=>1),array('id'=>$ArchieveID));
			if ($Archieve) {
				return true;
			}
		}

}
?>