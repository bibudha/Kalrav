<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class units_model extends CI_Model
{
public function create_data($get_arr)
	{
	
	$data_insert = array('u_name' => $get_arr,
				
				'u_isactive' => 1);
				
			$this->db->insert('tbl_units',$data_insert)	;
				
			//echo"unit enter successfully";	
				
			return true;	
				}
				
				// function for all units
		public function get_all_units()
			{
			$this->db->select('*');
			$this->db->where('u_isactive','1');
			$this->db->from('tbl_units');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
			}
				
				
				// function for get unit for editing
				
				
				public function get_units($id)
				{
				$this->db->select('*');
							$this->db->where('u_id',$id);
						$this->db->from('tbl_units');
						$query=$this->db->get();
						$row=$query->result();
									
							return $row;
						
				
				}
	
	
	
	// function for insert edit data
	public function insert_edit_data($get_arr)
	{
	$data_insert = array(   'u_name'=>$get_arr[1],
						   	'u_isactive'=>1);
							
							
			$this->db->where('u_id',$get_arr[0]);  
		$this->db->update('tbl_units',$data_insert);	
		return true;			
	
	}			
	
	// function for deleting unints
	
		public function delete_units($id)
		{
			try{
					if($this->db->delete('tbl_units', array('u_id'=> $id)))
					{
					return true;
					}
					else
					{
					return false;
					}
			}catch(Exception $ex){
					return false;
			
			}
			
		}
	
				
}