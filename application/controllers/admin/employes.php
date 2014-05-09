<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employes extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/employes_model");
                $this->load->model("admin/login_model");
		
		}


//Function for add product view Index
public function add_employes()
		{
		 if($this->session->userdata('logged_in'))
			{
						
			$data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_employes_view');
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
			//$a=$this->security->xss_clean($this->input->post('p_id'));
			$f=$this->security->xss_clean($this->input->post('f_name'));
                        $l=$this->security->xss_clean($this->input->post('l_name'));
                        $m=$this->security->xss_clean($this->input->post('mobile'));
			$r=$this->security->xss_clean($this->input->post('r_id'));
                        $u=$this->security->xss_clean($this->input->post('u_name'));
			$p=$this->security->xss_clean($this->input->post('password'));
			$a=$this->security->xss_clean($this->input->post('act_id'));
			;
			
			$get_arr=array('1'=>$f,
						   	'2'=>$l,
							'3'=>$m,
                                                        '4'=>$r,
                                                        '5'=>$u,
							'6'=>md5($p),
							'7'=>$a							
			);
			
				$res=$this->employes_model->create_data($get_arr);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/employes/all_employes_view",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/employes/add_employes_view",'refresh');
				}	
			}
			
		}		
//all Employes 
public function all_employes_view()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->employes_model->get_all_employes();
                        $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_employes_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		


}
// edit function
public function edit_employes($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			$data['get_employ']= $this->employes_model->edit_all_employes($id);
                        $data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_employes_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}


// edit data insert function


public function insert_edit_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			$i=$this->security->xss_clean($this->input->post('u_id'));
			$f=$this->security->xss_clean($this->input->post('f_name'));
			$l=$this->security->xss_clean($this->input->post('l_name'));
                        $m=$this->security->xss_clean($this->input->post('mobile'));
			$u=$this->security->xss_clean($this->input->post('u_name'));
			$r=$this->security->xss_clean($this->input->post('r_id'));
						
			$get_arr=array('0'=>$i,
						   '1'=>$f,
						   	'2'=>$l,
							'3'=>$m,
							'4'=>$u,
							'5'=>$r							
			);
				$res=$this->employes_model->insert_edit_data($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/employes/all_employes_view",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/employes/all_employes_view",'refresh');
			}
		}

	
	
	
		
		/* funtion for delete */


		public function delete_employes($id)
		{
			if($this->session->userdata('logged_in'))
			{
				$delete_result=$this->employes_model->delete_employ($id);
				if($delete_result)
					{
					$this->session->set_flashdata('success_msg', 'delete Successfully');
				redirect("admin/employes/all_employes_view",'refresh');
				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  delete Failed ');
				redirect("admin/employes/all_employes_view",'refresh');
				}
				
		}
		
	}		

 } 