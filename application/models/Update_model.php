<?php
	class Update_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function lastLogin($user_id) {
		    $this->db->where('user_id', $user_id)->update('tbl_users', ['last_login' => date('Y-m-d H:i:s')]);
		}
		function unset_session($user_id){
		    $this->db->where('user_id', $user_id)
		             ->update('tbl_users', ['online' => 0]);
		}

		function updateComment(){
			$this->db->where('user_id', $_SESSION['user']['user_id'])->update('tbl_users', ['eligibility' => '1']);
		}
		function UpdateProfile($avatars){
			    $this->db->where('user_id', $_SESSION['user']['user_id'])
			    		->update('tbl_users', [
			    			'photo' => $avatars
			    		]);
		}
		
		function editRecords() 
		{
		    $records_id = $_POST['records_id'];
		    unset($_POST['records_id']);
		    $this->db->where('records_id', $records_id)->update('tbl_records', $this->input->post());
		}
		function recordReleased(){
			$records_id = $_POST['records_id'];
			$released_to_pres = $_POST['released_to_pres'];
			$status = $_POST['status'];

			$this->db->where('records_id', $records_id)->update('tbl_records', 
																['released_to_pres' => 'Released to'.'  '.$released_to_pres. ' at ' .date('F j, Y, g:i a'),
																 'status' => $status]);
		}
		function recordReceived(){
			$records_id = $_POST['records_id'];
			$remarks = $_POST['remarks'];
			$approved = $_POST['approved'];
			$concerned = $_POST['concerned'];
			$received_by_records = $_POST['received_by_records'];
			$status = $_POST['status'];
			$this->db->where('records_id', $records_id)->update('tbl_records', 
																['received_by_records' => 'Received by'.'  '.$_SESSION['user']['name']. ' at ' .date('F j, Y, g:i a'),
																 'status' => $status,
																 'approved' => $approved,
																 'concerned' =>json_encode($concerned),
																 'remarks' => $remarks]);
		}

		function recordConcerned($data, $records_id) 
		{
		    $this->db->where('records_id', $records_id)->update('tbl_records', $data);
		}

		function recordScanned($file) 
		{
			$records_id = $_POST['records_id'];
		    $this->db->where('records_id', $records_id)->update('tbl_records',																						['file' => $file,
																 'status' => 4,]);
		    print_r($this->db->last_query());

		}

		function recordComplied() 
		{
			$records_id = $_POST['records_id'];
			$remarks = $_POST['remarks'];
			$received_from_client = $_POST['received_from_client'];
		    $this->db->where('records_id', $records_id)->update('tbl_records',																						['received_from_client' => $received_from_client,
		    													 'remarks' => $remarks,
																 'return' => 1,]);

		}
	}