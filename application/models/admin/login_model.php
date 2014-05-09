<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author : Bibudha
 * Description : This model is used for login Process
 */

class login_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//This function is used to validate admin login
	public function validate(){
		$user_name=$this->security->xss_clean($this->input->post('user_name'));
		$password=$this->security->xss_clean($this->input->post('user_password'));
		
		//echo $useremail;
		//echo $password;
		$this->db->select('*');
		$this->db->where('user_name',$user_name);
		$this->db->where('user_password',md5($password));
		$this->db->from('tbl_user');
		$query=$this->db->get();
		
		//echo ($this->db->last_query()); 
		if($query->num_rows == 1)
			{
				$row=$query->row();
				$login_user=array('user_id' => $row->user_id,
								   'user_email' => $row->user_email,
								   'fname' => $row->fname,
								   'lname' => $row->lname,
                                                                   'user_role' => $row->user_role,
                                                                   'user_isactive' => $row->user_isactive,
								   'user_name'=> $row->user_name);							   
				
				$this->session->set_userdata('logged_in',$login_user);
				return true;					
			}
		
	return false;
			
	}
//Log out Function
	public function make_logout()
	{
		$user_data=$this->session->userdata('userlogged_in');
		$user_name=$user_data['user_name'];
		$cur_time=date('Y/m/d H:i:s');
		$edit_data = array(
               'user_lastlogin' => $cur_time               
            );

		$this->db->where('user_name', $user_name);
		if($this->db->update('tbl_user', $edit_data))
			{
			return true;
			}
		else
			{
			return false;
			}
	
	}
}