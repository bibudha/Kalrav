<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class group extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/group_model");
                $this->load->model("admin/login_model");
		}


//Function for admin/login view Index 
public function add_group()
		{
		 if($this->session->userdata('logged_in'))
			{
			
			//$data['user_data'] = $this->session->userdata('logged_in');
			$data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/group_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}
		
	// function for get data from units view and insert into database
public function get_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			$get_arr=$_REQUEST['group_name'];
				$res=$this->group_model->create_data($get_arr);
				//echo json_encode($res);
					if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/group/all_group",'refresh');

				}
					
					
			}
			else
			{
				
			}
		}	
		 
	// function for showing all units for group 
	
	public function all_group()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->group_model->get_all_group();
                        $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_group_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		


}
			
			
	
			// edit function for group
public function edit_group($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['get_units']= $this->group_model->get_group($id);
			$data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_group_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}


// edit data insert function for group


public function insert_edit_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('group_id'));
			$b=$this->security->xss_clean($this->input->post('group_name'));
						
			$get_arr=array('0'=>$a,
						   '1'=>$b
						   	
							
			);
				$res=$this->group_model->insert_edit_data($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/group/all_group",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/group/all_group",'refresh');
			}
		}

	
	// funtion for delete Group
	
	public function delete_group($id)
		{
			if($this->session->userdata('logged_in'))
			{
				$delete_result=$this->group_model->delete_group($id);
				if($delete_result)
					{
					$this->session->set_flashdata('success_msg', 'delete Successfully');
				redirect("admin/group/all_group",'refresh');
				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  delete Failed ');
				redirect("admin/group/all_group",'refresh');
				}
				
		}
		
	}
	
	
	// function for display add category page
	public function add_category()
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['user_data'] = $this->session->userdata('logged_in');
			$data['get_units']= $this->group_model->get_all_group();
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_category_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}
	
	
	
	
	
	
	
	
	//function for category data entry
	
	
	// function for insert category .. 
	
	public function get_category()
		{
			 if($this->session->userdata('logged_in'))
			{
			//$a=$this->security->xss_clean($this->input->post('p_id'));
			$b=$this->security->xss_clean($this->input->post('cat_name'));
			$c=$this->security->xss_clean($this->input->post('group_id'));
			
			$get_arr=array('1'=>$b,
						   	'2'=>$c	);
			
				$res=$this->group_model->create_category_data($get_arr);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/group/all_group",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/product/add_product",'refresh');
				}	
			}
			
		}	
		
		
		// function for show all category
		
public function all_category()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->group_model->get_all_category();
                        $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_category_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		
	
	
	}
	
	
	// edit function for category
public function edit_category($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['get_units']= $this->group_model->get_all_group();
			$data['get_product']= $this->group_model->edit_all_category($id);
                        $data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_category_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}
		
		
// edit data insert function


public function insert_edit_category()
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('cat_id'));
			$b=$this->security->xss_clean($this->input->post('cat_name'));
			$c=$this->security->xss_clean($this->input->post('group_id'));
			
			
			$get_arr=array('0'=>$a,
						   '1'=>$b,
						   	'2'=>$c	);
				$res=$this->group_model->insert_edit_category($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/group/all_category",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/product/all_product",'refresh');
			}
		}

	
	
	/* funtion for delete */


		public function delete_category($id)
		{
			if($this->session->userdata('logged_in'))
			{
				$delete_result=$this->group_model->delete_category($id);
				if($delete_result)
					{
					$this->session->set_flashdata('success_msg', 'delete Successfully');
				redirect("admin/product/all_product",'refresh');
				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  delete Failed ');
				redirect("admin/product/all_product",'refresh');
				}
				
		}
		
	}
	

	

}