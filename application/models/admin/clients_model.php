<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class clients_model extends CI_Model
{
public function create_data($get_arr)
	{
	
	$data_insert = array(   'client_name'=>$get_arr[0],
						    'client_ph'=>$get_arr[1],
						   	'client_mo'=>$get_arr[2],
							'client_email'=>$get_arr[3],
							'client_add'=>$get_arr[4],
							'client_pin'=>$get_arr[5],
                                                        'pancard'=>$get_arr[6],
                                                        'vat'=>$get_arr[7],
                                                        'tds'=>$get_arr[8]  );
				
			if($this->db->insert('tbl_clients',$data_insert))
				{
		//	echo"unit enter successfully";	
				
			return true;
				}
			else
			{ 
			return false;
			}
				}
	/*public function get_all_units()
	{
				$this->db->select('*');
				$this->db->where('u_isactive','1');
			$this->db->from('tbl_units');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
	*/
	// all products
	
	public function get_all_clients()
	{
				$this->db->select('*');
				//$this->db->where('u_isactive','1');
			$this->db->from('tbl_clients');
			
			//$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
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
			$this->db->from('tbl_clients');
			
			//$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
			$this->db->where('client_id',$a);
			$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	
	}
	
	
	
	// insert edit data .. 
	
	public function insert_edit_data($get_arr)
	{
	$data_insert = array(  'client_name'=>$get_arr[0],
						    'client_ph'=>$get_arr[1],
						   	'client_mo'=>$get_arr[2],
							'client_email'=>$get_arr[3],
							'client_add'=>$get_arr[4],
							'client_pin'=>$get_arr[5],
							'client_id'=>$get_arr[6],
                                                        'pancard'=>$get_arr[7],
                                                        'vat'=>$get_arr[8],
                                                        'tds'=>$get_arr[9]
                );
							
							
			$this->db->where('client_id',$get_arr[6]);  
		$this->db->update('tbl_clients',$data_insert);	
		return true;			
	
	}
	
	//delete product function
	
	public function delete_clients($id)
	{
	
	
			if($this->db->delete('tbl_clients', array('client_id'=> $id)))
			{
			return true;
			}
			else
			{
			return false;
			} 
	
	
	}
	
	
	
	
	
	}