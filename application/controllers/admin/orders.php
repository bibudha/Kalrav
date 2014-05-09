<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/order_model");
		$this->load->model("admin/product_model");
                $this->load->model("admin/login_model");
		}


//Function for add product view Index
public function add_order()
		{
		 if($this->session->userdata('logged_in'))
			{
			$data['user_data'] = $this->session->userdata('logged_in');
			$data['get_products']= $this->product_model->get_all_products();
			$data['get_units']= $this->order_model->get_all_clients();
			$data['or_no']=$this->order_model->get_or_no();
			
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_orders_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		
}
// function for get_order
	
public function get_order()
		{
			 if($this->session->userdata('logged_in'))
			{
			$a=$this->security->xss_clean($this->input->post('client_id'));
			$b=$this->security->xss_clean($this->input->post('order_date'));
			$c=$this->security->xss_clean($this->input->post('delivery_date'));
			$d=$this->security->xss_clean($this->input->post('order_name'));
			$e=$this->security->xss_clean($this->input->post('final'));
			$f=$this->security->xss_clean($this->input->post('job'));
		$or=$this->security->xss_clean($this->input->post('or_no'));
			
			$get_arr=array('0'=>$a,
							'1'=>$b,
						   	'2'=>$c,
							'3'=>$d,
							'4'=>$e,
							'5'=>$f,
							'6'=>$or);
			
			
			
				$order_id=$this->order_model->create_data($get_arr);
				//$order_id= $this->order_model->get_order_id($d);
								
			//$aaa= array_pop($this->input->post('p_id'));
			$new_arr=array_slice($this->input->post('p_id'),0,-1);
			//print_r($new_arr);
			$j=count($new_arr);
			//exit;
			$arr_size=(array_slice($this->input->post('p_size'),0,-1));
			
			$arr_color=array_slice($this->input->post('p_color'),0,-1);
			$arr_price=array_slice($this->input->post('p_price'),0,-1);
			$arr_design=array_slice($this->input->post('p_design'),0,-1);
			$arr_quantity=array_slice($this->input->post('p_quantiy'),0,-1);
			$sub_t=array_slice($this->input->post('sub_total'),0,-1);
			$product_data=array();
			
			for($i=0;$i<$j;$i++)
			{
				for($k=1;$k<=7;$k++)
				{
				
			
				if($k==1)
				{
				$product_data[$i][$k]=$new_arr[$i];
				}
				if($k==2)
				{
				$product_data[$i][$k]=$arr_size[$i];
				}
				if($k==3)
				{
				$product_data[$i][$k]=$arr_color[$i];
				}
				if($k==4)
				{
				$product_data[$i][$k]=$arr_price[$i];
				}
				if($k==5)
				{
				$product_data[$i][$k]=$arr_design[$i];
				}
				if($k==6)
				{
				$product_data[$i][$k]=$arr_quantity[$i];
				}
				if($k==7)
				{
				$product_data[$i][$k]=$sub_t[$i];
				}
				}
			
			}
			
			
			$result=$this->order_model->create_otp($product_data,$order_id,$j);
						
			
				if($result)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/orders/all_order",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/product/add_orders",'refresh');
				}	
			}
			
		}		
		
		
		
		//all Order
public function all_order()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_order']= $this->order_model->get_all_order();
            $data['user_data'] = $this->session->userdata('logged_in');
			
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_order_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
		


}

// function for showing all detail of order and product 

public function order_details($id)
{

   if($this->session->userdata('logged_in'))
		{
			$data['get_order']= $this->order_model->get_order($id);
            $data['user_data'] = $this->session->userdata('logged_in');
			$data['product_detail']=$this->order_model->get_product_details($id);
			//$a=$this->$data['product_detail']->sub_total;	
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/order_details');
			$this->load->view('admin/footer_view');
		}
  else
  		{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
		}
						
						

}

// function for printing 
public function print_details($id)
{

   if($this->session->userdata('logged_in'))
		{
			$data['get_order']= $this->order_model->get_order($id);
            $data['user_data'] = $this->session->userdata('logged_in');
			$data['product_detail']=$this->order_model->get_product_details($id);
			//$a=$this->$data['product_detail']->sub_total;	
			//$this->load->view('admin/header_view',$data);
			$this->load->view('admin/print_detail',$data);
			//$this->load->view('admin/footer_view');
		}
		
}

// function for ajax
public function all_units($id)
{
 if($this->session->userdata('logged_in'))
			{
			$res= $this->order_model->all_units($id);
			//print_r($res);
			//exit;
			$str="";
			if($res)
				{			
					echo $res[0]->name."///".$res[0]->vat;
					//alert($str);
				
					
					}
					else
					{
					$str="NA";
					//echo $str;
					}
				
			
			}
			 else
			{
				
			}
		
	
	
	}
	
	
		

 } 