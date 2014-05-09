<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class order_model extends CI_Model
{


public function create_data($get_arr)
	{
	
	 $d=$get_arr[1];
	 $orDate = date("Y-m-d", strtotime($d));
	  $d=$get_arr[2];
	 $deDate = date("Y-m-d", strtotime($d));
	 
	
	//print_r($get_arr);
	$data_insert = array(   'client_id'=>$get_arr[0],
						   	'order_date'=>$orDate,
							'delivery_date'=>$deDate,
							'order_name'=>$get_arr[3],
							'total'=>$get_arr[4],
							'type_id'=>$get_arr[5],
							'or_no'=>$get_arr[6]);
				
			if($this->db->insert('tbl_order',$data_insert))
				{
		//	echo"unit enter successfully";	
			$insert_id = $this->db->insert_id();	
			
			return $insert_id;
				}
			else
			{ 
			return false;
			}
	}
			
	public function get_all_clients()
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_clients');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
	// all products
	
	public function get_all_products()
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_product prd');
			
			$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	// for function for insert data entery on order to product table
	
	
	public function create_otp($get_arr,$or_id,$j)
	{
	
//print_r($or_id);
//exit;
	//}
	
	$data_order=array();
	$data_order['order_id']=$or_id;
	for($i=0;$i<$j;$i++)
	{
		for($k=1;$k<=7;$k++)
			{		
				if($k==1)
				{
				$data_order['p_id']=$get_arr[$i][$k];
				}
				if($k==2)
				{
				$data_order['p_size']=$get_arr[$i][$k];
				}
				if($k==3)
				{
				$data_order['p_color']=$get_arr[$i][$k];
				}
				if($k==4)
				{
				$data_order['p_price']=$get_arr[$i][$k];
				}
				if($k==5)
				{
				$data_order['p_design']=$get_arr[$i][$k];
				}
				if($k==6)
				{
				$data_order['p_quantity']=$get_arr[$i][$k];
				}
				if($k==7)
				{
				$data_order['sub_total']=$get_arr[$i][$k];
				}
	
			}
		$res=$this->db->insert('tbl_order_to_product',$data_order);	
		}	
			
		if($res=true)
		{
		return true;
		}
		else
		{
		return false;
		}

	}
		
	
	// all Orders
	
	public function get_all_order()
	{
				$this->db->select('*');
				$this->db->from('tbl_order ord');
				$this->db->join('tbl_clients clnt', 'clnt.client_id = ord.client_id');
				$this->db->order_by('order_id','desc');
				$query=$this->db->get();
				$row=$query->result();

				$i=0;
				foreach($row as $rw)
					{
					$row[$i]->is_packed=$this->universal_packing($rw->order_id);
					$row[$i]->is_chalan=$this->universal_chalan($rw->order_id);
					$i++;
					}	
				//print_r($row);
				//exit;						
				return $row;
			
	
	}
	
	
	// function for Orders
	
	public function get_order($id)
	{
				$this->db->select('*');
				$this->db->where('order_id',$id);
			$this->db->from('tbl_order ord');
			$this->db->join('tbl_clients clnt', 'clnt.client_id = ord.client_id');
			$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	//function  for get all detail of product
	public function get_product_details($id)
	{
			$this->db->select('otp.p_size as size, otp.p_color as color,otp.p_price as price,otp.p_design as design, otp.p_quantity as quantity, otp.sub_total as subtotal, prd.p_name as name, uni.u_name as unit');
			$this->db->where('order_id',$id);
			$this->db->from('tbl_order_to_product otp');
			$this->db->join('tbl_product prd', 'prd.p_id = otp.p_id');
			$this->db->join('tbl_units uni', 'uni.u_id = prd.u_id');
			$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
	
	}
	
	// function for all category for ajax
	
		public function all_units($id)
	{
				$this->db->select('unt.u_name as name, prd.vat_par as vat');
				$this->db->where('p_id',$id);
			$this->db->from('tbl_product prd ');
			$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
		$row=$query->result();
				//	print_r($query->result())	;
					//exit;
			return $row;
			
	
	}
	
	
	// function for geting max order no for genrate order id 
	
	public function get_or_no()
	{
		$this->db->select('max(order_id) as or_no');
		$this->db->from('tbl_order');
		$query=$this->db->get();
		$row=$query->result();
		//echo $this->db->last_query();
			//	print_r($query->result())	;
				//print_r( $row[0]->ch_no);
				return (int)$row[0]->or_no+1;
				
				
		
	}
	
	
	// function for geting order no .. for adding no . 
	public function order()
	{
				$this->db->select('or_no as no, order_id as id, order_date as or_d');
				$this->db->where('is_complet',0);
				$this->db->from('tbl_order');
				$query=$this->db->get();
				$row=$query->result();
				return $row;
		
	}
	
	// function for Updating Is Packing Slip In order table  
	public function or_update($pc,$or)
	{
			$data_insert = array('is_packing'=>1);				
		 	$this->db->where('order_id',$or);  
			$this->db->where('p_id',$pc);  
		 	$this->db->update('tbl_order_to_product',$data_insert);
					
				return true;
		
	}
	
	// universal function for packing slip  
	
	public function universal_packing($order_number)
{
	$this->db->select('*');
	$this->db->where('order_id',$order_number);
	$this->db->from('tbl_order_to_product');
	$query=$this->db->get();
	$first=$query->num_rows();


	$this->db->select('*');
	$this->db->where('order_no',$order_number);
	$this->db->from('tbl_packing_slip');
	$query1=$this->db->get();
	$second=$query1->num_rows();
	if($first==$second)
	{
	return 1;
//	exit;
	}
	else
	{
		return 0;
	//exit;
	}
	
	//exit;

}

// universal function for chalan   
	
	public function universal_chalan($order_number)
{
	$this->db->select('*');
	$this->db->where('order_no',$order_number);
	$this->db->where('ch_no',0);
	$this->db->from('tbl_packing_slip');
	$query=$this->db->get();
	$first=$query->num_rows();


	
	if($first==0)
	{
	return 1;
//	exit;
	}
	else
	{
		return 0;
	//exit;
	}
	
	//exit;

}
	
	
	
}