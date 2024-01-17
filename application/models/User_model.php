<?php
	class User_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($username, $password){
			$query = $this->db->get_where('tbl_users', array('username'=>$username));
			$row = $query->row_array();
			if (password_verify($password, $row['password'])) {
		        return $query->row_array();
		    } else {
		        return false;
		    }
		}

		public function addUser($userdata){
			$this->db->insert('tbl_users', $userdata);
		}

	}
?>