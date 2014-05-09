 <div class="right_content"> 
 <script type="text/javascript">
 $(document).ready(function(){
		//alert(1);
			$('#group').change(function(){
				//alert(2);	
				var get_id=$(this).val();
				
				var u_rl="<?php echo base_url(); ?>"+"admin/employes/all_category/"+get_id;
				$('#cat_id').find('option:not(:first)').remove();
				  $.ajax({
							url:u_rl,
							type:'GET',
							cache: false,
							data:"",
							success: function(html)
							{ 
							if(html)
								{
								$("#cat_id").append(html);
								}
							else
								{
								alert('Availabel');
								}
							
							}
						
						
						})

		
					});
					
					
		
 
 			});
 </script>
 
   
 <h1>Add Employ </h1>
 <?php 
 //print_r($get_units);
 //print_r($get_units1); ?>
<form action="<?php echo base_url();?>admin/employes/get_data" method="post">
<table width="249" border="0"  id="rounded-corner">
    
   <tr>
    <td>First Name</td>
    <td><input type="text" name="f_name" value="" required ></td>
  </tr>
  
 <tr>
    <td>Last Name</td>
    <td><input type="text" name="l_name" value="" ></td>
  </tr>
  
   <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile" value=""  ></td>
  </tr>
  <tr>
    <td>Role</td>
    <td><select name="r_id" required>
	<option value="0">Please Select</option>
        <option value="2">Sales</option>
        <option value="3">CA</option>
        <option value="4">Worker</option>
	
 	</select></td>
  </tr>
  
   <tr>
    <td>User Name</td>
    <td><input type="text" name="u_name" value="" required ></td>
  </tr>
  
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="" required ></td>
  </tr>
  
   <tr>
    <td>Activate</td>
    <td><select name="act_id" id="act_id" required>
	<option value="0">Please Select</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
 	</select></td>
  </tr>
  
  <tr>

    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
</form>

</div>

