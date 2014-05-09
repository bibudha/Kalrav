<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clients extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/clients_model");
                $this->load->model("admin/login_model");
		}


//Function for add product view Index
public function index()
		{
		 if($this->session->userdata('logged_in'))
			{
				
			$data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_clients_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}
	
		
public function get_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('client_name'));
			$b=$this->security->xss_clean($this->input->post('client_ph'));
			$c=$this->security->xss_clean($this->input->post('client_mo'));
			$d=$this->security->xss_clean($this->input->post('client_email'));
			$e=$this->security->xss_clean($this->input->post('client_add'));
			$f=$this->security->xss_clean($this->input->post('client_pin'));
                        $g=$this->security->xss_clean($this->input->post('pancard'));
                        $h=$this->security->xss_clean($this->input->post('vat'));
                        $i=$this->security->xss_clean($this->input->post('tds'));
			
			
			$get_arr=array('0'=>$a,
							'1'=>$b,
						   	'2'=>$c,
							'3'=>$d,
							'4'=>$e,
							'5'=>$f,
                                                        '6'=>$g,
                                                        '7'=>$h,
                                                        '8'=>$i
			);
			
				$res=$this->clients_model->create_data($get_arr);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/clients/all_clients",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/clients/add_clients",'refresh');
				}	
			}
			
		}		
//all Client
public function all_clients()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->clients_model->get_all_clients();
                        $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_clients_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		


}
// edit function

public function edit_clients($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			
			//$data['get_units']= $this->clients_model->get_all_units();
			$data['get_product']= $this->clients_model->edit_all_products($id);
                        $data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_clients_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}


// edit data insert function


public function insert_edit_data($id)
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('client_name'));
			$b=$this->security->xss_clean($this->input->post('client_ph'));
			$c=$this->security->xss_clean($this->input->post('client_mo'));
			$d=$this->security->xss_clean($this->input->post('client_email'));
			$e=$this->security->xss_clean($this->input->post('client_add'));
			$f=$this->security->xss_clean($this->input->post('client_pin'));
			$g=$this->security->xss_clean($this->input->post('pancard'));
                        $h=$this->security->xss_clean($this->input->post('vat'));
                        $i=$this->security->xss_clean($this->input->post('tds'));
			
                        $get_arr=array('0'=>$a,
						   '1'=>$b,
						   	'2'=>$c,
							'3'=>$d,
							'4'=>$e,
							'5'=>$f,
							'6'=>$id,
                                                        '7'=>$g,
                                                        '8'=>$h,
                                                        '9'=>$i
			);
				$res=$this->clients_model->insert_edit_data($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/clients/all_clients",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/clients/all_clients",'refresh');
			}
		}

	
	
	
		
		/* funtion for delete */


		public function delete_clients($id)
		{
			if($this->session->userdata('logged_in'))
			{
				$delete_result=$this->clients_model->delete_clients($id);
				if($delete_result)
					{
					$this->session->set_flashdata('success_msg', 'delete Successfully');
				redirect($_SERVER['HTTP_REFERER'],'refresh');
				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  delete Failed ');
				redirect("admin/clients/all_clients",'refresh');
				}
				
		}
		
	}
	
	

 } 