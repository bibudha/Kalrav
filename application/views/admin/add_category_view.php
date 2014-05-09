 <div class="right_content">   
 <h1>Add Category</h1>
 <?php 
 //print_r($get_units);
 //print_r($get_units1); ?>
<form action="<?php echo base_url();?>admin/group/get_category" method="post">
<table width="249" border="0"  id="rounded-corner">
   <tr>
    <td>Category Name</td>
    <td><input type="text" name="cat_name" value="" required ></td>
  </tr>
   <tr>
    <td>Group Name</td>
    <td><select name="group_id" required>
	<option value="0">Please Select</option>
	<?php foreach($get_units  as $units) { ?>
  <option value="<?php echo $units->group_id ?>"><?php echo $units->group_name ?></option>
  <?php } ?>
 	</select></td>
  </tr>

    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
</form>

</div>

