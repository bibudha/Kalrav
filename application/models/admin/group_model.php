<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class group_model extends CI_Model
{
public function create_data($get_arr)
	{
	
	$data_insert = array('group_name' => $get_arr,
				
				'group_isactive' => 1);
				
			$this->db->insert('tbl_group',$data_insert)	;
				
			//echo"unit enter successfully";	
				
			return true;	
	}
				
				// function for all units
				
				
public function get_all_group()
	{
				$this->db->select('*');
				$this->db->where('group_isactive','1');
			$this->db->from('tbl_group');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
				
			
				// function for get unit for editing
				
				
public function get_group($id)
	{
				$this->db->select('*');
				$this->db->where('group_id',$id);
			$this->db->from('tbl_group');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
	
	// function for insert edit data
	public function insert_edit_data($get_arr)
	{
	$data_insert = array(   'group_name'=>$get_arr[1],
						   	'group_isactive'=>1);
							
							
			$this->db->where('group_id',$get_arr[0]);  
		$this->db->update('tbl_group',$data_insert);
		
		return true;			
	
	}			
	
	// function for deleting unints
	
		public function delete_group($id)
	{
	
	
			if($this->db->delete('tbl_group', array('group_id'=> $id)))
			{
			return true;
			}
			else
			{
			return false;
			} 
	
	
	}
	
	//function for adding category
	public function create_category_data($get_arr)
	{
	
	$data_insert = array('cat_name' => $get_arr[1],
						'group_id' => $get_arr[2],
				
				'cat_isactive' => 1);
				
			$this->db->insert('tbl_category',$data_insert)	;
				
			//echo"unit enter successfully";	
				
			return true;	
				}
				
				
		//function for show all category
	
	
		public function get_all_category()
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_category prd');
			
			$this->db->join('tbl_group unt', 'unt.group_id = prd.group_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	// function for all Category for edit
	public function edit_all_category($a)
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_category prd');
			
			$this->db->join('tbl_group unt', 'unt.group_id = prd.group_id');
			$this->db->where('cat_id',$a);
			$query=$this->db->get();
			echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
	// insert edit data .. 
	
	public function insert_edit_category($get_arr)
	{
	$data_insert = array(   'cat_name'=>$get_arr[1],
						   	'group_id'=>$get_arr[2]);
							
							
			$this->db->where('cat_id',$get_arr[0]);  
		$this->db->update('tbl_category',$data_insert);	
		return true;			
	
	}
	
	//delete category function
	
	public function delete_category($id)
	{
	
	
			if($this->db->delete('tbl_category', array('cat_id'=> $id)))
			{
			return true;
			}
			else
			{
			return false;
			} 
	
	
	}
	
	// function for all category for ajax
	
		public function all_category($id)
	{
				$this->db->select('*');
				$this->db->where('group_id',$id);
			$this->db->from('tbl_category ');
			
			//$this->db->join('tbl_group unt', 'unt.group_id = prd.group_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
			
				
				
}
