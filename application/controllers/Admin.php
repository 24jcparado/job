<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

class Admin extends My_Controller {

	function __construct(){
		parent::__construct();
		$this->checkSession('Admin');
	}
	public function index()
	{
		$data['page'] = 'Dashboard';
		$data['profile'] = $this->get_model->getProfile();
		$data['records'] = $this->get_model->getRecords()->result_array();
		$data['received'] = $this->get_model->getReceived()->result_array();
		$data['released'] = $this->get_model->getReleased()->result_array();
		$data['concerned'] = $this->get_model->getForConcerned()->result_array();
		$data['comply'] = $this->get_model->getForComply()->result_array();
		$data['scanned'] = $this->get_model->getScanned()->result_array();				
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/index.php');
		$this->load->view('pages/components/footer.php');
	}

	public function addForm(){
	 	$data['page'] = 'Add Form';
	 	$data['profile'] = $this->get_model->getProfile();	
	 	$data['received'] = $this->get_model->getReceived()->result_array();	
	 	$data['check'] = $this->get_model->getReceived()->row();	
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/add_form.php');
		$this->load->view('pages/components/footer.php');
	 }
	  public function addRecords(){
	 	$this->form_validation->set_rules('control_no', 'control_no', 'required|is_unique[tbl_records.control_no]', ['is_unique' => 'Seems like you have entered an existing data, Please check!)']);
	    if (!$this->form_validation->run()) {
	    	$this->session->set_flashdata('error', preg_replace("/\r|\n/", "", validation_errors()), 1);
	      	$this->redirect();
	    } else {
		    $insert = $this->insert_model->addRecords();
			$this->session->set_flashdata('success', 'Sucessfully added records');
			$this->redirect();   
		}
	 }
	 public function editRecords()
	{
		$editRecords = $this->update_model->editRecords();
	    if ($editRecords) {
	    	$this->session->set_flashdata('error', 'Error Updating');
	    }else{
	    	$this->session->set_flashdata('success', 'Successfully Updated');
	    }
	    $this->redirect();
	}
	public function deleteRecords($records_id){
		$this->delete_model->deleteRecords($records_id);
		$this->session->set_flashdata('success', 'Successfully Deleted Data');
	    $this->redirect();
	}
	public function forReleased(){
	 	$data['page'] = 'For Released';
	 	$data['profile'] = $this->get_model->getProfile();	
	 	$data['received'] = $this->get_model->getReceived()->result_array();
	 	$data['released'] = $this->get_model->getReleased()->result_array();		
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/for_released.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function forReceived(){
	 	$data['page'] = 'For Received';
	 	$data['profile'] = $this->get_model->getProfile();	
	 	$data['received'] = $this->get_model->getReceivedPres()->result_array();
	 	$data['for_release'] = $this->get_model->getForRelease()->result_array();		
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/for_received.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function forConcerned(){
	 	$data['page'] = 'For Concerned';
	 	$data['profile'] = $this->get_model->getProfile();
	 	$data['for_release'] = $this->get_model->getForRelease()->result_array();	
	 	$data['concerned'] = $this->get_model->getForConcerned()->result_array();
	 	$data['scanned'] = $this->get_model->getScanned()->result_array();		
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/for_concerned.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function forScanned(){
	 	$data['page'] = 'For Scanned';
	 	$data['profile'] = $this->get_model->getProfile();
	 	$data['concerned'] = $this->get_model->getForConcerned()->result_array();	
	 	$data['scanned'] = $this->get_model->getScanned()->result_array();	
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/for_scanned.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function recordReleased()
	{
		$recordRelease = $this->update_model->recordReleased();
	    if ($recordRelease) {
	    	$this->session->set_flashdata('error', 'Error Updating');
	    }else{
	    	$this->session->set_flashdata('success', 'Records Is now released');
	    }
	    $this->redirect();
	}
	function recordScanned(){
		$this->update_model->recordScanned($this->upload('file'));
		$this->session->set_flashdata('success', 'Successfully file Uploaded');
		$this->redirect();
	}
	public function recordReceived()
	{
		$this->update_model->recordReceived($concerned);
	    $this->session->set_flashdata('success', 'Records Is now released');
	    $this->redirect();
	}
	public function recordComplied()
	{
		$this->update_model->recordComplied();
	    $this->session->set_flashdata('success', 'Records Is now for scanned');
	    $this->redirect();
	}
	public function recordConcerned()
	{
		$records_id = $this->input->post('records_id');
		$name = $this->input->post('name');
		$return = $this->input->post('return');
		$date_returned = $this->input->post('date_returned');
		 $data = array(
		       			'date_returned' => 'Return to concerned office at '.$date_returned .'and received by'.$name,
		       			'return' => $return,
		       			'status' => '3');
		 $this->update_model->recordConcerned($data, $records_id);
		 $this->session->set_flashdata('success', 'Return to concerned office at '.$date_returned . 'and received by'.$name);
	     $this->redirect();
	}
	public function Records(){
	 	$data['page'] = 'Records';
	 	$data['profile'] = $this->get_model->getProfile();	
	 	$data['records'] = $this->get_model->getRecords()->result_array();
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/records.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function forCompliance(){
	 	$data['page'] = 'For Compliance';
	 	$data['profile'] = $this->get_model->getProfile();
	 	$data['comply'] = $this->get_model->getForComply()->result_array();	
	 	$data['scanned'] = $this->get_model->getScanned()->result_array();
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/for_comply.php');
		$this->load->view('pages/components/footer.php');
	 }
	 public function Users(){
	 	$data['page'] = 'Users';
	 	$data['profile'] = $this->get_model->getProfile();
	 	$data['users'] = $this->get_model->getUsers();
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/admin/users.php');
		$this->load->view('pages/components/footer.php');
	 }
	 function print_release(){
	 	$data['page'] = 'Print Records';
		$data['profile'] = $this->get_model->getProfile();	
	 	$data['received'] = $this->get_model->getReceived()->result_array();
	 	$data['released'] = $this->get_model->getReleased()->result_array();
 		$html = $this->load->view('pages/admin/print/print_release', $data, true);
 		$mpdf->curlAllowUnsafeSslRequests = true;
	    $mpdf = new \Mpdf\Mpdf([
	      'format' => 'A4'
	    ]);
	    $mpdf->AddPage('L');
	    $mpdf->WriteHTML($html);
	    $mpdf->Output();
	 }
	  function print_records(){
	 	$data['page'] = 'Print Records';
		$data['profile'] = $this->get_model->getProfile();	
	 	$data['records'] = $this->get_model->getRecords()->result_array();
 		$html = $this->load->view('pages/admin/print/print_records', $data, true);
 		$mpdf->curlAllowUnsafeSslRequests = true;
	    $mpdf = new \Mpdf\Mpdf([
	      'format' => 'A4'
	    ]);
	    $mpdf->AddPage('L');
	    $mpdf->WriteHTML($html);
	    $mpdf->Output();
	 }
}