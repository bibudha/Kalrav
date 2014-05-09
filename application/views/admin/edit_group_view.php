
 <div class="right_content">   
 <h1>Edit Group</h1>
 
<form action="<?php echo base_url();?>admin/group/insert_edit_data" method="post">
 <table width="249" border="0"  id="rounded-corner">
  <tr><?php foreach($get_units  as $units) { ?>
    <td width="95">Group Id</td>
    <td width="144"><input type="hidden" name="group_id" value="<?php echo $units->group_id ?>" required><?php echo $units->group_id ?></td>
  </tr>
  <tr>
    <td>Group Name</td>
    <td><input type="text" name="group_name" value="<?php echo $units->group_name ?>" required ></td>
  </tr>
 
 <?php }?>
  <tr>
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
 </form>


</div>
