
 <div class="right_content">   
 <h1>Edit Units</h1>
 
<form action="<?php echo base_url();?>admin/units/insert_edit_data" method="post">
 <table width="249" border="0"  id="rounded-corner">
  <tr><?php foreach($get_units  as $units) { ?>
    <td width="95">units Id</td>
    <td width="144"><input type="hidden" name="u_id" value="<?php echo $units->u_id ?>" required><?php echo $units->u_id ?></td>
  </tr>
  <tr>
    <td>unit Name</td>
    <td><input type="text" name="u_name" value="<?php echo $units->u_name ?>" required ></td>
  </tr>
 
 <?php }?>
  <tr>
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
 </form>


</div>
