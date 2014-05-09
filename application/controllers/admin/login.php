<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login extends CI_Controller{

function __construct()
		{
		parent::__construct();
		$this->load->model("admin/login_model");
		
		}

public function index()
		{
		 
		  if($this->session->userdata('logged_in'))
		 {
		 	 redirect('admin/dashboard');
		 }
		 else
		 {
		 	$this->load->view('admin/login_view');
		 }
		 
		 		 
		
		}
		
		
		public function login_process()
		{
		$result=$this->login_model->validate();
		if(!$result)
			{
				$this->session->set_flashdata('error_msg', 'Sorry Login Failed ');
				redirect('admin/login');
			}
		else
			{
				redirect('admin/dashboard');
			}	
		}
		
		
			//Function forlogoutProcess
	public function logout_process()
		{
		$res=$this->login_model->make_logout();
		if($res)
			{
				$this->session->set_flashdata('success_msg', 'Logout Successfully');	
				$this->session->unset_userdata('logged_in');
				redirect('admin/login', 'refresh');
			}
		else
			{
			    $this->session->set_flashdata('error_msg', 'Sorry Logout Failed ');	
				redirect('admin/login', 'refresh');
			}
			
		}	

		
}