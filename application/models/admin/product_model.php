<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class product_model extends CI_Model
{
public function create_data($get_arr)
	{
	
	$data_insert = array(   'p_name'=>$get_arr[1],
						   	'is_vat'=>$get_arr[2],
							'vat_par'=>$get_arr[3],
							'u_id'=>$get_arr[4],
							//'p_price'=>$get_arr[5],
							//'p_quantity'=>$get_arr[6],
							'group_id'=>$get_arr[7],
							'cat_id'=>$get_arr[8]);
				
			if($this->db->insert('tbl_product',$data_insert))
				{
		//	echo"unit enter successfully";	
				
			return true;
				}
			else
			{ 
			return false;
			}
	}
				
			// function for gets all units 	
				
	public function get_all_units()
	{
			$this->db->select('*');
			$this->db->where('u_isactive','1');
			$this->db->from('tbl_units');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
		// function for gets all group 	
				
	public function get_all_group()
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_group');
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
	
	
	// function for all product for edit
	public function edit_all_products($a)
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_product prd');
			
			$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
			$this->db->where('p_id',$a);
			$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
	
	// insert edit data .. 
	
	public function insert_edit_data($get_arr)
	{
	$data_insert = array(   'p_name'=>$get_arr[1],
						   	'is_vat'=>$get_arr[2],
							'vat_par'=>$get_arr[3],
							'u_id'=>$get_arr[4],
							);
							
							
			$this->db->where('p_id',$get_arr[0]);  
		$this->db->update('tbl_product',$data_insert);	
		return true;			
	
	}
	
	//delete product function
	
	public function delete_product($id)
	{
	
	
			if($this->db->delete('tbl_product', array('p_id'=> $id)))
			{
			return true;
			}
			else
			{
			return false;
			} 
	
	
	}
	
	
	
	}