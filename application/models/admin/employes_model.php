<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class employes_model extends CI_Model
{
public function create_data($get_arr)
	{
	
	$data_insert = array(   'fname'=>$get_arr[1],
							'lname'=>$get_arr[2],
                                                        'mobile'=>$get_arr[3],
							'user_role'=>$get_arr[4],
                                                        'user_name'=>$get_arr[5],
							'user_password'=>$get_arr[6],
                                                        'user_isactive'=>$get_arr[7]
                                                        );
				
			if($this->db->insert('tbl_user',$data_insert))
				{
		//	echo"unit enter successfully";	
				
			return true;
				}
			else
			{ 
			return false;
			}
	}
				
	
	// all employes
	
	public function get_all_employes()
	{
				$this->db->select('*');
				
			       $this->db->from('tbl_user ');
				$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	}
	
	
	// function for all product for edit
	public function edit_all_employes($a)
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_user');
		
			$this->db->where('user_id',$a);
			$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
					
				return $row;			
	}
	
	
	
	// insert edit data .. 
	
	public function insert_edit_data($get_arr)
	{
	$data_insert = array(   'fname'=>$get_arr[1],
						   	'lname'=>$get_arr[2],
                                                        'mobile'=>$get_arr[3],
							'user_name'=>$get_arr[4],
							'user_role'=>$get_arr[5],
							//'user_isactive'=>$get_arr[5]
                                                        );
														
			$this->db->where('user_id',$get_arr[0]);  
		$this->db->update('tbl_user',$data_insert);	
		return true;			
	
	}
	
	//delete product function
	
	public function delete_employ($id)
	{
	
	
			if($this->db->delete('tbl_user', array('user_id'=> $id)))
			{
			return true;
			}
			else
			{
			return false;
			} 
	
	
	}
	
	
	
	
	
	}