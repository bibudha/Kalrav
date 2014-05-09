<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class units extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/units_model");
                $this->load->model("admin/login_model");
		}


//Function for admin/login view Index
public function add_units()
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['user_data'] = $this->session->userdata('logged_in');
			
			//$this->load->view('header_view');
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/units_view');
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
			$get_arr=$_REQUEST['u_name'];
				$res=$this->units_model->create_data($get_arr);
				//echo json_encode($res);
					if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/product/add_product",'refresh');

				}
					
					
			}
			else
			{
				
			}
		}	
		
	// function for showing all units 
	
	public function all_units()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->units_model->get_all_units();
			$data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_units_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		


}
			
			
			
			// edit function
public function edit_units($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['get_units']= $this->units_model->get_units($id);
                        $data['user_data'] = $this->session->userdata('logged_in');
			//$data['get_product']= $this->product_model->edit_all_products($id);
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_units_view');
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
			$a=$this->security->xss_clean($this->input->post('u_id'));
			$b=$this->security->xss_clean($this->input->post('u_name'));
						
			$get_arr=array('0'=>$a,
						   '1'=>$b
						   	
							
			);
				$res=$this->units_model->insert_edit_data($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/units/all_units",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/units/all_units",'refresh');
			}
		}

	
	// funtion for delete units 
	
	public function delete_units($id)
		{
			if($this->session->userdata('logged_in'))
			{
						
	
			 try
        		{				
				$delete_result=$this->units_model->delete_units($id);
				}
				
				
		
        catch(Exception $ex)
        {
             echo $ex->getMessage();
        }	
				if($delete_result)
					{
					$this->session->set_flashdata('success_msg', 'delete Successfully');
				redirect("admin/units/all_units",'refresh');
				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  delete Failed ');
				redirect("admin/units/all_units",'refresh');
				}
				
		}
		
	}
	
	
 
	

}