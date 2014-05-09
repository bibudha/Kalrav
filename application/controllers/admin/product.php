<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/product_model");
		$this->load->model("admin/group_model");
                $this->load->model("admin/login_model");
                   
		}


//Function for add product view Index
public function add_product()
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['user_data'] = $this->session->userdata('logged_in');
			$data['get_units']= $this->product_model->get_all_units();
			$data['get_group']= $this->product_model->get_all_group();
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_product_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('login', 'refresh');
			}
		
		}
	
		
		public function get_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			//$a=$this->security->xss_clean($this->input->post('p_id'));
			$b=$this->security->xss_clean($this->input->post('p_name'));
			$c=$this->security->xss_clean($this->input->post('is_vat'));
			$d=$this->security->xss_clean($this->input->post('vat_par'));
			$e=$this->security->xss_clean($this->input->post('u_id'));
			//$f=$this->security->xss_clean($this->input->post('p_price'));
			//$g=$this->security->xss_clean($this->input->post('p_quantity'));
			$h=$this->security->xss_clean($this->input->post('group_id'));
			$i=$this->security->xss_clean($this->input->post('cat_id'));
			
			$get_arr=array('1'=>$b,
						   '2'=>$c,
							'3'=>$d,
							'4'=>$e,
							//'5'=>$f,
							//'6'=>$g
							'7'=>$h,
							'8'=>$i
			);
			
				$res=$this->product_model->create_data($get_arr);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/product/all_product",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/product/add_product",'refresh');
				}	
			}
			
		}		
//all product 
public function all_product()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_units']= $this->product_model->get_all_products();
                        $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_product_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('login', 'refresh');
			}
		


}
// edit function
public function edit_product($id)
		{
		 if($this->session->userdata('logged_in'))
			{
			
			$data['get_units']= $this->product_model->get_all_units();
			$data['get_product']= $this->product_model->edit_all_products($id);
                        $data['user_data'] = $this->session->userdata('logged_in');
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/edit_product_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('login', 'refresh');
			}
		
		}


// edit data insert function


public function insert_edit_data()
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('p_id'));
			$b=$this->security->xss_clean($this->input->post('p_name'));
			$c=$this->security->xss_clean($this->input->post('is_vat'));
			$d=$this->security->xss_clean($this->input->post('vat_par'));
			$e=$this->security->xss_clean($this->input->post('u_id'));
			
			
			
			$get_arr=array('0'=>$a,
						   '1'=>$b,
						   	'2'=>$c,
							'3'=>$d,
							'4'=>$e							
								);
				$res=$this->product_model->insert_edit_data($get_arr);
				if($res==true)
				{
				$this->session->set_flashdata('success_msg', 'Edit Successfully');
				redirect("admin/product/all_product",'refresh');				}
				
					
			}
			else
			{
			$this->session->set_flashdata('error_msg', 'Sorry  Edit Failed ');
				redirect("admin/product/all_product",'refresh');
			}
		}

	
	
	
		
		/* funtion for delete */


		public function delete_product($id)
		{
			if($this->session->userdata('logged_in'))
			{
				$delete_result=$this->product_model->delete_product($id);
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
	
	
	// function for show all category
		
		public function all_category($id)
{
 if($this->session->userdata('logged_in'))
			{
			$res= $this->group_model->all_category($id);
			//print_r($res);
			$str="";
			if(is_array($res))
				{
					foreach($res as $val)
					{
					$str.='<option value="'.$val->cat_id.'">'.$val->cat_name.'</option>';
					}
					echo $str;
					}
					else
					{
					$str="NA";
					echo $str;
					}
				
			
			}
			 else
			{
				
			}
		
	
	
	}
	
	

 } 