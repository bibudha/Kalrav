<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class invoice_model extends CI_Model
{
	
	// function for all category for ajax
	
public function ch_no()
	{
				$this->db->select('max(ch_no) as ch_no');
				//$this->db->where('p_id',$id);
			$this->db->from('tbl_chalan');
			//$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
		$row=$query->result();
		//echo $this->db->last_query();
			//	print_r($query->result())	;
				//print_r( $row[0]->ch_no);
				echo (int)$row[0]->ch_no;
				
			
	
	}
	
	// function for add data .. 
	
	
    public function create_data($get_arr)
	{
                                $d=$get_arr[1];

                                $newDate = date("Y-m-d", strtotime($d));

                    $data_insert = array('id'=>$get_arr[0],
										 'de_date'=>$newDate,
                                         'product_id'=>$get_arr[2],
										 'descpt'=>$get_arr[3],
										 'pcolor'=>$get_arr[4],
										 'pdesign'=>$get_arr[5],
										 'quantity'=>$get_arr[6],
										 'total_quantity'=>$get_arr[7],
										 'order_no'=>$get_arr[8]);				     
       
		if($this->db->insert('tbl_packing_slip',$data_insert))
		{
		//	echo"unit enter successfully";	
				
			return true;
		}
		else
		{ 
			return false;
		}
	}    
        
        
	public function chalan_data($get_arr)
	{
				$d=$get_arr[1];

                                $newDate = date("Y-m-d", strtotime($d));
				
                            // Sum Array Value Of Total Price and save in tbl_chalan tabel
                                $total=	$get_arr[5];
                                $f_tot= array_sum($total);
                                
	$data_insert = array( 'ch_no'=>$get_arr[0],
                           'final_total'=>$f_tot,
						'client_name'=>$get_arr[2],
						'ch_date'=>$newDate,
						'order_no'=>$get_arr[6]);
						
						//print_r($data_insert);
						//exit;
				
			if($this->db->insert('tbl_chalan',$data_insert))
				{
		$insert_id = $get_arr[0];
		//echo "sss".$insert_id;
		//exit;
			
			return $insert_id;
				
			//return true;
				}
			else
			{ 
			return false;
			}
                        
                    $data_update = array( 'ch_no'=>$get_arr[0],
                                                'price'=>$get_arr[4]
						
							); 
                    $this->db->where('id',$get_arr[0]);
                   if($this->db->update('tbl_packing_slip',$data_update))
				{
		$insert_id = $get_arr[0];
		//echo "sss".$insert_id;
		//exit;
			
			return $insert_id;
				
			//return true;
				}
			else
			{ 
			return false;
			}
	}
	
	
	
	//----------------
	// for function for insert data entery on order to product table
	
	
	public function create_itp($get_arr,$ch_id,$j)
	{

				
	$data_chalan=array();
	$data_chalan['ch_no']=$ch_id;
	for($i=0;$i<$j;$i++)
	{
		for($k=1;$k<=3;$k++)
			{		
				if($k==1)
				{
				$data_chalan['particulars']=$get_arr[$i][$k];
				}
				if($k==2)
				{
				$data_chalan['size']=$get_arr[$i][$k];
				}
				if($k==3)
				{
				$data_chalan['quantity']=$get_arr[$i][$k];
				}
	
			}
			
			
		$res=$this->db->insert('tbl_invoice_to_product',$data_chalan);	
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
		
			// function for gets all units 	
				
	public function get_all_chalan()
	{
			$this->db->select('ch.ch_no as ch_no,
							   ch.ch_date as date,
			  				   ch.final_total as t_final,
			                   pck.descpt as desp,
			                   pck.pcolor as color,
			  				   pck.pdesign as desgin,			  				  
			     			   pck.total_quantity as quantity,
			      			   pck.price as price_per,
							   pro.p_name as name,
							   pro.vat_par as per,
							   pro.is_vat as vat');
			$this->db->from('tbl_chalan ch');
			$this->db->join('tbl_packing_slip pck', 'pck.ch_no = ch.ch_no');
			$this->db->join('tbl_product  pro', 'pro.p_id = pck.product_id');
			$this->db->where('ch.is_bill',1);
			$query=$this->db->get();
			$row=$query->result();
			$challan_array = array();
			$get_ch =array();
			foreach($row as $key)
				{
				if(!in_array($key->ch_no,$get_ch))
					{
					$challan_array[$key->ch_no] = array();
					array_push($get_ch,$key->ch_no);
					}
				
				}
				
				foreach($challan_array as $k)
					{
					$i = 0;
					foreach($row as $g)
						{
						
						if(in_array($g->ch_no,$get_ch))
							{
							$challan_array[$g->ch_no][$i]['name'] = $g->name;
							$challan_array[$g->ch_no][$i]['color'] = $g->color;
							$challan_array[$g->ch_no][$i]['desgin'] = $g->desgin;
							$challan_array[$g->ch_no][$i]['quantity'] = $g->quantity;
							$challan_array[$g->ch_no][$i]['price_per'] = $g->price_per;
							$challan_array[$g->ch_no][$i]['t_final'] = $g->t_final;
							$challan_array[$g->ch_no][$i]['per'] = $g->per;
							$challan_array[$g->ch_no][$i]['vat'] = $g->vat;
							}
						else
							{
							$challan_array[$g->ch_no][$i]['name'] = $g->name;
							$challan_array[$g->ch_no][$i]['color'] = $g->color;
							$challan_array[$g->ch_no][$i]['desgin'] = $g->desgin;
							$challan_array[$g->ch_no][$i]['quantity'] = $g->quantity;
							$challan_array[$g->ch_no][$i]['price_per'] = $g->price_per;
							$challan_array[$g->ch_no][$i]['t_final'] = $g->t_final;
							$challan_array[$g->ch_no][$i]['per'] = $g->per;
							$challan_array[$g->ch_no][$i]['vat'] = $g->vat;
							}
							$i++;	
						}
					
					}
			
				
				//print_r($get_ch);
				//print_r($challan_array);
				//exit;		
				return $challan_array;
			
	
	}
	
			// function for gets all units 	
				
	public function get_all_itp($ch_no)
	{
			$this->db->select('*');
			$this->db->where('ch_no',$ch_no);
			$this->db->from('tbl_invoice_to_product');
			$query=$this->db->get();
			$row=$query->result();
						
				return $row;
			
	
	}
	
		
	public function get_all_packing()
	{
				$this->db->select('*');
				
			       $this->db->from('tbl_packing_slip');
				   $this->db->order_by('id','desc');
                              
				$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	}	
	
	
	// Function for checkbox of paking slip 
 public function create_checkbox($get_arr)
	{                    
	 
	 foreach($get_arr as $get)
	 {
	 	$data_insert = array( 	'is_chalan'=>1);
		 $this->db->where('id',$get);  
		 $this->db->update('tbl_packing_slip',$data_insert);
          		  
         }        
          
           
				
			return true;
		
	} 
	
	
	
		
	// function for all category for ajax
	
public function pcking_no()
	{
				$this->db->select('max(id) as id');
				//$this->db->where('p_id',$id);
			$this->db->from('tbl_packing_slip');
			//$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
		$row=$query->result();
		//echo $this->db->last_query();
			//	print_r($query->result())	;
			//	print_r((int)$row[0]->id);
			//	exit;
				echo (int)$row[0]->id;
				
			
	
	}
	
		
	// function for all category for ajax
	/*
public function a($a)
	{
				$this->db->select('quantity as q');
				$this->db->where('id',$a);
			$this->db->from('tbl_packing_slip');
			//$this->db->join('tbl_units unt', 'unt.u_id = prd.u_id');
						$query=$this->db->get();
			//echo $this->db->last_query();
		$row=$query->result();
		//echo $this->db->last_query();
			//	print_r($query->result())	;
				//print_r( $row[0]->id);
				return $row[0]->q;
				
			
	
	}
	*/
	
	
	//function for getting all paking slip value 
	
	
	public function pkcs($a)

	{
	//var_dump($a);
     $this->db->select("prd.p_name,prd.vat_par,pck.id,pck.de_date,pck.product_id,pck.is_chalan,pck.descpt,pck.pcolor,pck.pdesign,				    pck.quantity,pck.ch_no,pck.total_quantity,pck.order_no,(select p_price from tbl_order_to_product where p_id = pck.product_id AND order_id = $a) as Price");
							$this->db->from('tbl_packing_slip pck');
                        	$this->db->join('tbl_order od','od.order_id=pck.order_no');
                        	//$this->db->join('tbl_order_to_product otp','otp.order_id=pck.order_no');
							$this->db->join('tbl_product prd','pck.product_id=prd.p_id');
							$this->db->where('pck.order_no',$a);
                           //$this->db->where('otp.order_id',$a);
                           	$this->db->where('pck.is_chalan',1);
							$this->db->where('od.order_id',$a);
							
							//$this->db->where('otp.is_packing',1);
							
				$query=$this->db->get();
			//echo $this->db->last_query();
			
                                
			$row=$query->result();
			
			
			//print_r($row);
			//exit;	
				return $row;
			
	
	}
	
	
	
	// function for changing paking slip value when go to bill 
	
	 public function slip($get_arr,$a,$b)
	{        
        
	//print_r($get_arr);
	//print_r($b);
	//exit;
	
	$i=0;
	for($i=0;$i<count($get_arr);$i++)

	 	 {
		   
		  
	 	$data_insert = array( 	'is_chalan'=>2,
								'price' => $b[$i],
								'ch_no'=>$a);
			
					
			
							
		 $this->db->where('id',$get_arr[$i]);  
		 $this->db->update('tbl_packing_slip',$data_insert);
		 }
		 
          		  
         
		        
          
           
				
			return true;
		
	} 
	
	//function for showing checkbox on all chalan view	
	public function all_is_bill()
	{
				$this->db->select('*');
				
			       $this->db->from('tbl_chalan');
                              
				$query=$this->db->get();
			//echo $this->db->last_query();
			$row=$query->result();
						
				return $row;
			
	}	
	
	
	
	// Function for checkbox of Chalan 
 public function ch_chek($get_arr)
	{                    
	 
	 foreach($get_arr as $get)
	 {
	 // change the value of is_bill in chalan table
	 	$data_insert = array( 	'is_bill'=>1);
		 $this->db->where('ch_no',$get);  
		 $this->db->update('tbl_chalan',$data_insert);
		 	
				  
         }        
         // $this->db->select('max(invoice_no) as invoice_id');
		  //$this->db->from('tbl_invoice');
		  //$query=$this->db->get();
		  //$row=$query->result();
		 // print_r($last)
		 //print_r((int)$row[0]->invoice_id);
		 //exit; 
          // $q=(int)$row[0]->invoice_id;
				
		return true;
			
			
			
		
	} 
	
	
	public function product_name()

	{
                            $this->db->select('prd.p_name,prd.vat_par,pck.id,pck.de_date,pck.product_id,pck.is_chalan, pck.order_no as orn,ord.or_no as osr,ord.order_id as or_id');
			    $this->db->from('tbl_packing_slip pck');
				 $this->db->order_by('pck.id','desc');
                            $this->db->join('tbl_product prd','prd.p_id=pck.product_id');
							$this->db->join('tbl_order ord','ord.order_id=pck.order_no');
                           
				$query=$this->db->get();
			//echo $this->db->last_query();
                                
			$row=$query->result();
				
				return $row;
			
	
	}
	
	// function for geting invoice id for bill view ... 
	
	public function invoice_id()
	{
			$this->db->select('max(inv_id) as invoice_id');
		  	$this->db->from('tbl_invoice');
		    $query=$this->db->get();
			$row=$query->result();
			$as=(int)$row[0]->invoice_id+1;
			return $as;	
				//print_r($row);
				//exit;
				//return $row;
	
	}
	
	
	//function for inseart data ... into invoice tabale
	
	public function in_id_data($get_ar)
	{
					$d=$get_ar[1];
                    $newDate = date("Y-m-d", strtotime($d));
				
//	$get_ar[1]
		$data_insert = array( 	'invoice_no'=>$get_ar[0],
								'inv_date'=>$newDate,
								'in_total'=>$get_ar[2],);
			
			$res=$this->db->insert('tbl_invoice',$data_insert);
			
			  $insert_id = $this->db->insert_id();
		//	print_r($insert_id);
		//exit;
	
				return $insert_id;
	}
	
	
	//function for change the value of is bill in chalan
	public function ch_change($s)
	{
		foreach($s as $d)
		{
		$data_insert = array( 	'is_bill'=>2);
			
					
			
							
		 $this->db->where('ch_no',$d);  
		 $this->db->update('tbl_chalan',$data_insert);
		
		}
		return true;
	}
	
	
	//function for insert data into .. invoice to product table
	
	public function itp_data($id,$get_arr)
	{
	foreach($get_arr as $po)
	{
		$data_insert=array('inv_id'=>$id,
					  'ch_no'=>$po	);
		
	$res=$this->db->insert('tbl_invoice_to_product',$data_insert);
	}
	return true;
	
	}
	
	// function for all bill view
	
	
	public function details()
	{
		$this->db->select('*');
		$this->db->from('tbl_invoice');
		 $query=$this->db->get();
			$row=$query->result();
	
		return $row;
	}
	
	// function for geting order no accordting to packing slip 
	
	public function order_name($a)
	{
		$this->db->select('ord.or_no, ord.order_id,ord.order_date,clnt.client_name,clnt.client_id');
		$this->db->from('tbl_order ord');
		$this->db->join('tbl_clients clnt','clnt.client_id=ord.client_id');
		$this->db->where('ord.order_id',$a);
		 $query=$this->db->get();
			$row=$query->result();
	//print_r($row);
	//exit;
		return $row;
			
	}
	
	// function for getting order date and order no for bill 
	
	public function order_data($as)
	{
	//print_r($as);
	//exit;
		foreach($as as $da)
		{
		//print_r($da);
			$this->db->select('order_date , or_no');
			$this->db->from('tbl_chalan ch');
			$this->db->join('tbl_order ord','ord.order_id=ch.order_no');
			$this->db->where('ch_no',$da);
			 $query=$this->db->get();
			$row=$query->result();
			//echo $this->db->last_query();
			//exit;
	
			break;
		}
	//print_r($row[0]);
	//exit;
	return $row[0];
			
	}
	
		
	// function for all category for ajax for product 
	
public function product_data($a)
	{
						$this->db->select('prd.p_id as id,prd.p_name');
						$this->db->where('order_id',$a);
						$this->db->where('is_packing',0);
						$this->db->from('tbl_order_to_product ord');
						$this->db->join('tbl_product prd', 'prd.p_id = ord.p_id');
						$query=$this->db->get();
		
						$row=$query->result();
		
						echo json_encode($row);
				
			
	
	}
	
	// function for all category for ajax for product 
	
public function pro($a,$b)
	{
						$this->db->select('*');
						$this->db->where('order_id',$b);
						$this->db->where('p_id',$a);
						$this->db->from('tbl_order_to_product ord');
						//$this->db->join('tbl_product prd', 'prd.p_id = ord.p_id');
						$query=$this->db->get();
		
						$row=$query->result();
		//
						//echo json_encode($row);
						
						return $row;
			
	
	}
	
	
	
}