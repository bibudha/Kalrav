 <div class="right_content"> 
 <script type="text/javascript">
 $(document).ready(function(){
		//alert(1);
		
		
			$('#group').change(function(){
				//alert(2);	
				var get_id=$(this).val();
				
				var u_rl="<?php echo base_url(); ?>"+"admin/product/all_category/"+get_id;
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
					
					
					
		$("#vat").click(function(){
		 	$('.par').toggle(function(){
			if($('.par').css("display")=="block")
			{
				$('.is_vat').val(1);
				//alert($('.is_vat').val());
			}
			else
			{
				$('.is_vat').val(0);
				//alert($('.is_vat').val());
			}
				
			
			});
				
       		});
			
		
 });
			
			
 </script>
 
   
 <h1>Add Product </h1>
 <?php 
 //print_r($get_units);
 //print_r($get_units1); ?>
<form action="<?php echo base_url();?>admin/product/get_data" method="post">
<table width="249" border="0"  id="rounded-corner">
   <tr>
    <td>Product Name</td>
    <td><input type="text" name="p_name" value="" required ></td>
  </tr>
 <!-- <tr>
    <td>Color</td>
    <td><input type="text" name="p_color" value="" required></td>
  </tr>
  <tr>
    <td>Size</td>
    <td><input type="text" name="p_size" value="" required></td>
  </tr>-->
  <tr>
    <td>Unit Name</td>
    <td><select name="u_id" required>
	<option value="0">Please Select</option>
	<?php foreach($get_units  as $units) { ?>
  <option value="<?php echo $units->u_id ?>"><?php echo $units->u_name ?></option>
  <?php } ?>
 	</select></td>
  </tr>
   <tr>
    <td>Group Name</td>
    <td><select name="group_id" required id="group">
	<option value="0">Please Select</option>
	<?php foreach($get_group  as $group) { ?>
  <option value="<?php echo $group->group_id ?>"><?php echo $group->group_name ?></option>
  <?php } ?>
 	</select></td>
  </tr>
   <tr>
    <td>Category Name</td>
    <td><select name="cat_id" id="cat_id" required>
	<option value="0">Please Select</option>

 	</select></td>
  </tr>
  <tr><td>vat</td><td><input type="checkbox" name="vat"  id="vat" class="vat" />vat</td></tr>
  <tr class="par" style="display:none"><td>%</td><td><input type="text" name="vat_par" value="" /></td></tr>
  <tr><input type="hidden" name="is_vat" class="is_vat" value="" />
      <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
</form>

</div>

