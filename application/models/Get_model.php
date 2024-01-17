<?php
	class Get_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
// Dashboard
		function getUser() {
		    return $this->db->where('username', $_POST['username'])->get('tbl_users')->result_array();
		}
		function getProfile(){
			return $this->db->where('user_id', $_SESSION['user']['user_id'])->get('tbl_users')->row();
		}
		function getRecords(){
			return $this->db->get('tbl_records');
		}
		function getReceived(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 0)
							->order_by('control_no', 'ASC')
							->get('tbl_records');
		}
		function getReleased(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 1)
							->order_by('control_no', 'ASC')->limit(5)
							->get('tbl_records');
		}
		function getReceivedPres(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 1)
							->order_by('control_no', 'ASC')
							->get('tbl_records');
		}
		function getForRelease(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 2)
							->order_by('control_no', 'ASC')->limit(5)
							->get('tbl_records');
		}
		function getForConcerned(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 3)
							->order_by('control_no', 'ASC')->limit(5)
							->get('tbl_records');
		}
		function getScanned(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.status', 4)
							->order_by('control_no', 'ASC')->limit(5)
							->get('tbl_records');
		}
		function getForComply(){
			return $this->db->join('tbl_users', 'tbl_users.user_id = tbl_records.user_id')
							->where('tbl_records.return', 2)
							->get('tbl_records');
		}
		function getUsers(){
			return $this->db->get('tbl_users')->result_array();
		}
}