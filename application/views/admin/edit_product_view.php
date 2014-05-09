
	<script type="text/javascript">
 			$(document).ready(function(){		
					$("#vat").click(function(){
					
		 				$('.par').toggle(function(){
							if($('.par').css("display")=="none")
							{
							
								$('.is_vat').val(0);
						//alert($('.is_vat').val());
							}
							else
							{
								$('.is_vat').val(1);
						//alert($('.is_vat').val());
							}
				
			
						});
				
       		});
			});
</script>
 <div class="right_content">   
 <h1>Edit Products</h1>
 
<form action="<?php echo base_url();?>admin/product/insert_edit_data" method="post">
 <table width="249" border="0"  id="rounded-corner">
  <tr><?php foreach($get_product  as $products) { ?>
    <td width="95">Product Id</td>
    <td width="144"><input type="hidden" name="p_id" value="<?php echo $products->p_id ?>" required><?php echo $products->p_id ?></td>
  </tr>
  <tr>
    <td>Product Name</td>
    <td><input type="text" name="p_name" value="<?php echo $products->p_name ?>" required ></td>
  </tr>
   <tr>
   <td>vat</td><?php if($products->is_vat==1)
     {
	 $chk='checked="checked"';
	 $stl="display:block";
	 }else
	 {
	 $chk='';
	 $stl="display:none";
	
	
	 }
	 ?>
   <td><input type="checkbox" name="vat"  id="vat" class="vat" <?php echo $chk; ?> />vat</td>

  </tr>
  <tr class="par" style="<?php echo $stl; ?>"><td>%</td><td><input type="text" name="vat_par" value="<?php echo $products->vat_par; ?>" /></td></tr>
 <tr><input type="hidden" name="is_vat" class="is_vat" value="" />
  <tr>
    <td>Unit Name</td>
    <td><select name="u_id" required>
		<?php 
		$sel="";
		foreach($get_units  as $units) { 
		if($units->u_id == $product->u_id)
		{
		$sel="selected";
		}
		?>
  <option <?php echo $sel ;?> value="<?php echo $units->u_id ?>"><?php echo $units->u_name ?></option>
  <?php } ?>
 	</select></td>
  </tr> <?php } ?>
  
  
  <tr>
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
 </form>


</div>
