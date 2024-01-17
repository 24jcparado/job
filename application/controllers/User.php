<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller {

	function __construct(){
		parent::__construct();
		$this->checkSession('User');
	}
	public function index()
	{
		$data['page'] = 'Add Form';
	 	$data['profile'] = $this->get_model->getProfile();	
	 	$data['comment'] = $this->get_model->getComments()->result_array();	
	 	$data['check'] = $this->get_model->getComments()->row();	
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/user/comment.php');
		$this->load->view('pages/components/footer.php');
	}
	  public function addComment(){
	 	$this->form_validation->set_rules('comment', 'comment', 'required|is_unique[tbl_comments.comment]', ['is_unique' => 'Seems like you have already added your work experience, for multiple entry of work experience please click the edit button and please refer to the instruction below)']);
	    if (!$this->form_validation->run()) {
	    	$this->session->set_flashdata('error', preg_replace("/\r|\n/", "", validation_errors()), 1);
	      	$this->redirect();
	    } else {
		    $insert = $this->insert_model->addComments();
			$this->session->set_flashdata('success', 'Sucessfully added Comment');
			$this->redirect();   
		}
	 }
	 public function editComment()
	{
		$editEligibility = $this->update_model->editComment();
	    if ($editEligibility) {
	    	$this->session->set_flashdata('error', 'Error Updating');
	    }else{
	    	$this->session->set_flashdata('success', 'Successfully Updated');
	    }
	    $this->redirect();
	}
	public function deleteComment($comment_id){
		$this->delete_model->deleteComment($comment_id);
		$this->session->set_flashdata('success', 'Successfully Deleted Data');
	    $this->redirect();
	}
	public function submitComment(){
		 $this->update_model->updateComment();
		 $this->session->set_flashdata('success', 'Sucess');
		 redirect('user/profile');
	}
	public function profile(){
	 	$data['page'] = 'Applicant Profile';
	 	$data['profile'] = $this->get_model->getProfile();
	 	$data['basic_information'] = $this->get_model->getBasic_information()->row();	
	 	$data['eligibility'] = $this->get_model->getEligibility()->result_array();	
	 	$data['check'] = $this->get_model->getEligibility()->row();	
		$this->load->view('pages/components/header.php', $data);
		$this->load->view('pages/user/profile.php');
		$this->load->view('pages/components/footer.php');
	 }
}