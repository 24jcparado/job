<?php
	class Delete_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function deleteRecords($records_id){
			$this->db->where('records_id', $records_id)->delete('tbl_crecords');
		}
	}