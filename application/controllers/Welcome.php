<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

	public function index()
	{
		$data['page'] = 'Login';
		$this->load->view('pages/components/header', $data);
		$this->load->view('pages/components/sign_in.php');
		$this->load->view('pages/components/footer');
	}
	public function sign_up()
	{
		$data['page'] = 'Sign up';
		$this->load->view('pages/components/header', $data);
		$this->load->view('pages/components/sign_up.php');
		$this->load->view('pages/components/footer');
	}

	public function addUser(){
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_users.username]', ['is_unique' => 'Username already in use.']);
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_users.email]', ['is_unique' => 'Email already in use.']);
		    if (!$this->form_validation->run()) {
		      	$this->session->set_flashdata('error', 'Username | Username is already in used!.');
		      	$this->session->set_flashdata('error', 'Email | Email is already in used!.');
		       $this->redirect();
		    } else {
		    	$userdata = [
		    		  'name' => $_POST['name'],
		    		  'user_type' => $_POST['user_type'],
		    		  'email' => $_POST['email'],
				      'username' => $_POST['username'],
				      'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
				    ];
		      $addUser = $this->user_model->addUser($userdata);
		       if (!$addUser) {
		      	$this->session->set_flashdata('success', 'User Successfully Added!.');
		      	$this->redirect();
		      }
		    }
	}
		public function login(){
			$this->load->library('session');
			$user = $this->get_model->getUser();
	    	if($user) {
					if (password_verify($_POST['password'], $user[0]['password'])) {
				        $_SESSION['user'] = $user[0];
				        $this->update_model->lastLogin($user[0]['user_id']);
						if($user[0]['user_type'] == 'Admin'){
							redirect(base_url('admin'));
						}
					}
					$this->session->set_flashdata('error','You Logged as Admin');
					redirect('welcome');

			}else{
				$this->session->set_flashdata('error','Invalid login. User not found');
				redirect('welcome');
			}
		}

	public function logout() {
		unset($_SESSION['user']);
		redirect(base_url('welcome'));
	}
	public function UpdateProfile(){
		 $this->update_model->UpdateProfile($this->upload('avatars'), );
		 $this->session->set_flashdata('success', 'Successfully Updated');
		 redirect('admin');
	}
}
