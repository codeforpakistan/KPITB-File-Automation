<?php
/**
* 
	+++ Login Controller +++
*/
class Kpitb_login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function UserLogin()
	{
		if ($this->input->post('Login')) {
			$Username  = $this->input->post('email');
			$Password  = $this->input->post('password');
			$rnd  = hash('sha256',$Password);
			$where     = array(
					      'email' => $Username,
					      'password' => $rnd,
				    	 );
			if (!empty($Username) && !empty($Password)) {
				if ($this->security->xss_clean($where)) {
					$query = $this->kpitb_model->user_authenticate('staff',$where);
					if($query){
						if ($query->designation == 'MD') {
							$sessiondata =  array(
							'FirstName'  => $query->first_name,
							'LastName'   => $query->last_name,
							'Email'      => $query->email,
							'DGN'  	 	 => $query->designation,
							'Signature'  => $query->signature,
							'Picture'  	 => $query->picture,
							'CNIC' 		 => $query->cnic,
							'id'  		 => $query->id,
							'logged_in'  => TRUE 
							);
							$this->session->set_userdata($sessiondata);
							$LogsData = array(
										'staff_id' => $query->id,
										'ip_address' => $this->input->ip_address(),
										'time_in' => date("H:i:s"),
										'date' => date("Y-m-d"),
										'status' => 0,
										);
							$this->kpitb_model->InsertDataintoTable('login_status',$LogsData);
							redirect(base_url().'kpitb_letters/index');
						}
						else
						{
							$sessiondata =  array(
							'FirstName'  => $query->first_name,
							'LastName'   => $query->last_name,
							'Email'      => $query->email,
							'DGN'  	 	 => $query->designation,
							'Picture'  	 => $query->picture,
							'Signature'  => $query->signature,
							'CNIC' 		 => $query->cnic,
							'id'  		 => $query->id,
							'logged_in'  => TRUE 
							);
							$this->session->set_userdata($sessiondata);
							$LogsData = array(
										'staff_id' => $query->id,
										'ip_address' => $this->input->ip_address(),
										'time_in' => date("H:i:s"),
										'date' => date("Y-m-d"),
										'status' => 0,
										);
							$this->kpitb_model->InsertDataintoTable('login_status',$LogsData);
							redirect(base_url().'kpitb_letters/index');	
						}
					}
					else{					
							$this->index('1');
						}	
					}
				else
				{
					$this->index('4');
				}
			}
			else{
				$this->index('2');
			}
		}
	}
	public function log_out()
	{
		$DataArray = array(
					 'staff_id'=> $this->session->userdata('id'),
					 'date'=> date("Y-m-d"),
					 'status'=> 0,
					 ); 
		$UpdateData = array('status'=>1,'time_out'=>date('h:i:s'));
		$this->kpitb_model->UpdateDataIntoDB('login_status',$UpdateData,$DataArray);
		// Updating Log Records
		$id   = $this->session->userdata('id');
		$id = NULL;
		$this->session->sess_destroy();
		$this->index('3');
	}
/**
+++++++++++++ Ends Here .................
*/
}
?>