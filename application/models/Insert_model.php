<?php
	class Insert_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function addRecords(){
		    $this->db->insert('tbl_records', $this->input->post());
		    return $this->db->insert_id();
		}
}