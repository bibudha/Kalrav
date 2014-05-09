
 <div class="right_content">   
 <h1>Edit Category</h1>
 
<form action="<?php echo base_url();?>admin/group/insert_edit_category" method="post">
 <table width="249" border="0"  id="rounded-corner">
  <tr><?php foreach($get_product  as $products) { ?>
    <td width="95">Category Id</td>
    <td width="144"><input type="hidden" name="cat_id" value="<?php echo $products->cat_id ?>" required><?php echo $products->cat_id ?></td>
  </tr>
  <tr>
    <td>Category Name</td>
    <td><input type="text" name="cat_name" value="<?php echo $products->cat_name ?>" required ></td>
  </tr>
  <tr>
    <td>Group Name</td>
    <td><select name="group_id" required>
		<?php 
		$sel="";
		foreach($get_units  as $units) { 
		if($units->group_id == $product->group_id)
		{
		$sel="selected";
		}
		?>
  <option <?php echo $sel ;?> value="<?php echo $units->group_id ?>"><?php echo $units->group_name ?></option>
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
