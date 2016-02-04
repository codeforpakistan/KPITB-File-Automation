<?php
/**
 *
Kpitb Model
 */
class Kpitb_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	public function user_authenticate($table, $data) {
		$this->db->where($data);
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		if ($query->num_rows > 0) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function SelectCommentsForNote($table, $Required, $Where) {
		$this->db->where($Where);
		$this->db->select($Required);
		$this->db->from($table);
		$Execute = $this->db->get();
		if ($Execute->num_rows > 0) {
			return $Execute->result();
		} else {
			return false;
		}
	}
	public function SelectOneRowDataDB($table, $SelectedID) {
		$this->db->where($SelectedID);
		$this->db->select('*');
		$this->db->from($table);
		$Execute = $this->db->get();
		if ($Execute->num_rows > 0) {
			return $Execute->result();
		} else {
			return false;
		}
	}
	public function SelectOneRowData($table, $SelectedID, $Order) {
		$this->db->order_by($Order, 'DESC');
		$this->db->where($SelectedID);
		$this->db->select('*');
		$this->db->from($table);
		$Execute = $this->db->get();
		if ($Execute->num_rows > 0) {
			return $Execute->result();
		} else {
			return false;
		}
	}
	public function SelectNotes($table, $SelectedID) {
		if (!empty($SelectedID)) {
			$notes = array();
			foreach ($SelectedID as $id) {
				$this->db->where('archieve','0');
				$this->db->where('id', $id);
				$this->db->select('*');
				$this->db->from($table);
				$Execute = $this->db->get();
				if ($Execute->num_rows > 0) {
					$notes[] = $Execute->result();
				} else {
					$notes[] = false;
				}
			}
			return $notes;
		}
	}
	public function SelectLetter($table, $SelectedID) {
		if (!empty($SelectedID)) {
			$notes = array();
			foreach ($SelectedID as $id) {
				$this->db->where('archieve','0');
				$this->db->where('id', $id);
				$this->db->select('*');
				$this->db->from($table);
				$Execute = $this->db->get();
				if ($Execute->num_rows > 0) {
					$notes[] = $Execute->result();
				} 
				else {
					$notes[] = false;
				}
			}
			return $notes;
		}
	}
	public function SelectRowsDataDB($table, $selection = NULL) {
		$this->db->select($selection);
		$this->db->from($table);
		$Execute = $this->db->get();
		if ($Execute->num_rows > 0) {
			return $Execute->result();
		} else {
			return false;
		}
	}
	public function InsertDataintoTable($table, $Data) {
		$query = $this->db->insert($table, $Data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function MultiInsertDataintoTable($table, $Data, $IDs) {
		if (!empty($IDs)) {
			foreach ($IDs as $EachKey) {
				$query = $this->db->where('intial_note', $EachKey);
				$query = $this->db->insert($table, $Data);
			}
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

	}
	public function UpdateDataIntoDB($table, $UpdateData, $Condition) {
		$this->db->where($Condition);
		$this->db->set($UpdateData);
		$query = $this->db->update($table);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	function getUsers($conditions = array(), $fields = '') {

		if (count($conditions) > 0) {
			$this->db->where($conditions);
		}

		$this->db->from('staff');
		$this->db->order_by("staff.id", "asc");
		if ($fields != '') {
			$this->db->select($fields);
		} else {
			$this->db->select('staff.id,staff.fIrst_name,staff.email,staff.online');
		}

		$result = $this->db->get();
		return $result;
	}
	public function ChatTo($table, $conditions, $order) {
		$this->db->order_by($order);
		$this->db->where($conditions);
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		if ($query->num_rows > 0) {
			return $query->result();
		}
	}
	public function UpdateChatTo($table, $conditions, $order) {
		$this->db->where($conditions);
		$this->db->set($order);
		$query = $this->db->update($table);
		if ($query) {
			return true;
		}
	}
	public function do_upload($image) {
		$config['upload_path'] = 'assets/VisualData/';
		$config['allowed_types'] = 'ICON|GIF|PNG|JPG|JPEG|jpeg|jpg|png|gif|icon';
		$config['max_size'] = '10000000000';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($image)) {
			return false;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}
	public function FileUpload($image) {
		$config['upload_path'] = 'assets/Attachments/';
		$config['allowed_types'] = 'ICON|GIF|PNG|JPG|JPEG|jpeg|jpg|png|gif|icon';
		$config['max_size'] = '10000000000';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($image)) {
			return false;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}
	public function CountData($table, $Where) {
		$this->db->where($Where);
		$Query = $this->db->select('*')->from($table);
		$Query = $this->db->get();
		if ($Query->num_rows() > 0) {
			return $Query->num_rows();
		}
	}

}

/**
Extra Security Classes
 */

/**
''ENDOF''
 */
?>