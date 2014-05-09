<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/login_model");
		
		}
//Function for admin/login view Index
public function index()
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['user_data'] = $this->session->userdata('logged_in');
			
			//$this->load->view('header_view');
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/dashboard_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}				

}