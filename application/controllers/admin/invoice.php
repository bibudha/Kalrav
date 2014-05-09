<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice extends CI_Controller
{
function __construct()
		{
		parent::__construct();
		$this->load->model("admin/invoice_model");
          
		  $this->load->model("admin/product_model");
		   $this->load->model("admin/order_model");
		}

// function for showing bill choice 
public function index()
{
	 if($this->session->userdata('logged_in'))
			{
			$data['user_data'] = $this->session->userdata('logged_in');
			 $data['details']= $this->invoice_model->details();
			              
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_bill_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		
	
} 

// function for add packing slip view .. <br />

public function add_packing_slip($s="NILL"){
    
             if($this->session->userdata('logged_in'))
			{
						
			$data['user_data'] = $this->session->userdata('logged_in');
			$data['get_products']= $this->product_model->get_all_products();
			$data['or_no']= $this->order_model->order();
			$data['s']=$s;
                        
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/add_packing_slip_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
    
}

//function for checking and showing Bill view 
public function s_bill()
{

	 if($this->session->userdata('logged_in'))
			{
				
			$data['get_products']= $this->product_model->get_all_products();
			$data['user_data'] = $this->session->userdata('logged_in');
			              
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/direct_bill_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		
}  	

//function for Showing Information .. of Bill step 
public function step_bill()
{
$a=$this->security->xss_clean($this->input->post('option'));
				if($a==0){
	 if($this->session->userdata('logged_in'))
			{
				$data['user_data'] = $this->session->userdata('logged_in');
				$data['a']=$a;
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/bill_step_view');
			$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		}
	
}  	


public function chalan_view($a)
{
//$a=$this->security->xss_clean($this->input->post('option'));

	 if($this->session->userdata('logged_in'))
			{
				$data['user_data'] = $this->session->userdata('logged_in');                                
				$data['pcka']=$this->invoice_model->pkcs($a); 
				//$d=$data['pcka'][0]->order_no;
				//print_r($d);
				//exit;  
				$data['order_n']=$this->invoice_model->order_name($a);  
				//print_r($data['order_n']);
				//
				//exit;                              
                                                         
				$this->load->view('admin/header_view',$data);
				$this->load->view('admin/chalan_view');
				$this->load->view('admin/footer_view');
			
			}
	    else
			{
		   	redirect('admin/login', 'refresh');
			}
		
		
}  	


// function for ajax for geting chalan no
public function get_chalan_no()
{
 if($this->session->userdata('logged_in'))
			{
			$res= $this->invoice_model->ch_no();
			print_r($res);
			
			//$str="";
			if($res)
				{			
					//$str= $res;
					
					echo $res;
					
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
	
	// function for inserting chalan data into chalan table 
	public function bill_details()
		{
			 if($this->session->userdata('logged_in'))
			{
			$b=$this->security->xss_clean($this->input->post('ch_no'));
			$c=$this->security->xss_clean($this->input->post('ch_date'));
			$d=$this->security->xss_clean($this->input->post('client_name'));
			$e=$this->security->xss_clean($this->input->post('id'));
            $p=$this->security->xss_clean($this->input->post('price_per'));
            $t=$this->security->xss_clean($this->input->post('total_price'));
			 $or=$this->security->xss_clean($this->input->post('order_id'));
			
					   
					  
					
			$pck=$this->invoice_model->slip($e,$b,$p);
			
			$get_arr=array('0'=>$b,
							'1'=>$c,
						   '2'=>$d,
                           '3'=>$e,
                           '4'=>$p,
                           '5'=>$t,
						   '6'=>$or);
			
		
				$ch_id=$this->invoice_model->chalan_data($get_arr);
				
				
				
				if($ch_id)
				{
				//$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/invoice/all_chalan_view/",'refresh');

				}
				else
				{
				//$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				redirect("admin/product/add_product",'refresh');
				}	
			}
			
		}	
	


//--- fucnction for bill_view--
//public function bill_view($a)
//{
////$a=$this->security->xss_clean($this->input->post('option'));
//
//	 if($this->session->userdata('logged_in'))
//			{
//				$data['user_data'] = $this->session->userdata('logged_in');
//				$data['chalan_data'] =	$this->invoice_model->get_all_chalan($a);	
//				//$data['product_data'] =	$this->invoice_model->get_all_itp($a);				              
//			$this->load->view('admin/header_view',$data);
//			$this->load->view('admin/bill_view_new');
//			$this->load->view('admin/footer_view');
//			
//			}
//	    else
//			{
//		   	redirect('admin/login', 'refresh');
//			}
//		
//		
//}  	


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

public function get_data()
		{
			 if($this->session->userdata('logged_in'))
			{
		//	$a=$this->security->xss_clean($this->input->post('q'));
			
					$a=$this->security->xss_clean($this->input->post('pslip_no'));
                    $b=$this->security->xss_clean($this->input->post('packing_date'));
					$c=$this->security->xss_clean($this->input->post('product_id'));
					$d=$this->security->xss_clean($this->input->post('descpt'));
					$e=$this->security->xss_clean($this->input->post('pcolor'));
					$f=$this->security->xss_clean($this->input->post('pdesign'));
					$g=$this->security->xss_clean($this->input->post('total_quantity'));
					$h=$this->security->xss_clean($this->input->post('or_no'));
					
					$arr_q=(array_slice($this->input->post('quantity'),0,-1));
					$str ="";
					$arr_no=(array_slice($this->input->post('no'),0,-1));
					//print_r($arr_q);
					//print_r($arr_no);
					for($i=0;$i<count($arr_q);$i++)
						{
						if($i == (count($arr_q)-1))
							{
							$str .="".$arr_q[$i]."*".$arr_no[$i];
							}else
							{
							$str .="".$arr_q[$i]."*".$arr_no[$i].",";
							}
							
						}
						//echo $str;
					//exit;
                       // print_r($m);
                        //exit;
                     	
			$get_arr=array('0'=>$a,
						   '1'=>$b,
						   '2'=>$c,
						   '3'=>$d,
                           '4'=>$e,
						   '5'=>$f,
						   '6'=>$str,
						   '7'=>$g,
						   '8'=>$h);
			
				$res=$this->invoice_model->create_data($get_arr);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/invoice/all_packing_slip",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				//redirect("admin/employes/add_employes_view",'refresh');
				}	
			}			
}

public function all_packing_slip()
{
 if($this->session->userdata('logged_in'))
			{
						//$data['get_packing']= $this->invoice_model->get_all_packing();
                        $data['get_packing']= $this->invoice_model->product_name();
                        $data['user_data']  = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_packing_slip_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}		
}

// function for paking slip checkbox ... 
public function save_checkbox()
		{
			 if($this->session->userdata('logged_in'))
			{
			//$a=$this->security->xss_clean($this->input->post('p_id'));
			$f=$this->security->xss_clean($this->input->post('chkbox'));
                     				
				$res=$this->invoice_model->create_checkbox($f);
				//echo json_encode($res);
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/invoice/chalan_view",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				//redirect("admin/employes/add_employes_view",'refresh');
				}	
			}			
	}
	
	
	
	
// function for ajax for geting packing slip no
public function packing_no()
{
 if($this->session->userdata('logged_in'))
			{
			$res= $this->invoice_model->pcking_no();
			//print_r($res);
			//exit;
			//$str="";
			if($res)
				{			
					//$str= $res;
					
					echo $res;
					
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

// function for a32d1 
/*public function a()
{

   if($this->session->userdata('logged_in'))
		{
			//$data['get_order']= $this->order_model->get_order();
            $data['user_data'] = $this->session->userdata('logged_in');
			$data['str']= $this->invoice_model->a(4);
			//$data['product_detail']=$this->order_model->get_product_details($id);
			//$a=$this->$data['product_detail']->sub_total;	
			//$this->load->view('admin/header_view',$data);
			$this->load->view('admin/a',$data);
			//$this->load->view('admin/footer_view');
		}
		
}
*/
// function for chalan ... all chalan_view
	public function all_chalan_view()
{
 if($this->session->userdata('logged_in'))
			{
			$data['get_bill']= $this->invoice_model->all_is_bill();
            $data['user_data'] = $this->session->userdata('logged_in');
			
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/all_chalan_view');
			$this->load->view('admin/footer_view');
			
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}		
}

	
	


// function for Chalan  checkbox ... 
public function ch_check()
		{
			 if($this->session->userdata('logged_in'))
			{
			//$a=$this->security->xss_clean($this->input->post('p_id'));
			$f=$this->security->xss_clean($this->input->post('chkbox'));
                     				
				$res=$this->invoice_model->ch_chek($f);
								
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/invoice/bill_view_new",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				//redirect("admin/employes/add_employes_view",'refresh');
				}	
			}			
	}
	
	// function for bill view 21-04-2014 .. NeW .. after chalan check box 
	
	public function bill_view_new()
	{
	//print_r($a);
	//exit;
		 if($this->session->userdata('logged_in'))
			{
			$data['user_data'] = $this->session->userdata('logged_in');
			$data['chalan_data'] =	$this->invoice_model->get_all_chalan();
			//$ch=key($data['chalan_data']);
			//print_r($data['chalan_data']);
			
			$ch=array_keys($data['chalan_data']);
				
			//print_r($ch);
			//exit;
			$data['order_data']= $this->invoice_model->order_data($ch);
			$data['inv']=$this->invoice_model->invoice_id();
			
				
			$this->load->view('admin/header_view',$data);
			$this->load->view('admin/bill_view_new');
			$this->load->view('admin/footer_view');
			}
			 else
			{
			$this->session->set_flashdata('error_msg', 'Sorry   Failed ');
		   	redirect('admin/login', 'refresh');
			}
	
	}
	
	//funtcion for geting invoice data and store that .. 
	
	public function invoice_data()
	{
		if($this->session->userdata('logged_in'))
			{
					$a=$this->security->xss_clean($this->input->post('in_id'));
					
                    $b=$this->security->xss_clean($this->input->post('in_date'));
					//$c=$this->security->xss_clean($this->input->post('client_name'));
					$d=$this->security->xss_clean($this->input->post('ch_no'));
					$e=$this->security->xss_clean($this->input->post('to'));
					//print_r($d);
					//exit;
					
					$get_arr=array('0'=>$a,
						  		   '1'=>$b,
						   			'2'=>$e);
			
				$inv_id=$this->invoice_model->in_id_data($get_arr);
				$tb=$this->invoice_model->ch_change($d);
				$res=$this->invoice_model->itp_data($inv_id,$d);
				
				
				
				if($res)
				{
				$this->session->set_flashdata('success_msg', 'Insert Successfully');
				redirect("admin/invoice",'refresh');

				}
				else
				{
				$this->session->set_flashdata('error_msg', 'Sorry  Insertation Failed ');
				//redirect("admin/employes/add_employes_view",'refresh');
				}	
					
				
			}
	}
	
	// function for ajax request for geting all products name .. 
	
public function product_data($a)
{

 if($this->session->userdata('logged_in'))
			{
			$res= $this->invoice_model->product_data($a);
			//print_r($res);
			//exit;
			//$str="";
			if($res)
				{			
					//$str= $res;
					
					echo $res;
					
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
	
	// function for ajax request for geting  products all values .. 
	
public function pro($a,$b)
{

//echo $a;
//echo $b;
 if($this->session->userdata('logged_in'))
			{
			$res= $this->invoice_model->pro($a,$b);
			//echo"yep";
			//echo json_encode($res);
			//$str="";
			if($res)
				{			
					//$str= $res;
					
					echo json_encode($res);
					
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