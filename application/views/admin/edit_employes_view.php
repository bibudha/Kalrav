
 <div class="right_content">   
 <h1>Edit Employ</h1>
 
<form action="<?php echo base_url();?>admin/employes/insert_edit_data" method="post">
 <table width="249" border="0"  id="rounded-corner">
  <tr><?php foreach($get_employ  as $employ) { ?>
  
    <td width="95">Employ Id</td>
    <td width="144"><input type="hidden" name="u_id" value="<?php echo $employ->user_id ?>" required><?php echo $employ->user_id ?></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><input type="text" name="f_name" value="<?php echo $employ->fname ?>" required ></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="l_name" value="<?php echo $employ->lname ?>" required></td>
  </tr>
    <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile" value="<?php echo $employ->mobile ?>" required></td>
  </tr>
  <tr>
    <td>User Name</td>
    <td><input type="text" name="u_name" value="<?php echo $employ->user_name ?>" required></td>
  </tr>
  
   <tr>
    <td>Role</td>
    <td><select name="r_id" >
            <?php //$role= $employ->user_role; ?>
            <option>Select</option>
        <option <?php if($employ->user_role == 2){ echo "selected"; } ?> value="2" >Sales</option>
        <option <?php if($employ->user_role == 3){ echo "selected"; }?> value="3" >CA</option>
        <option <?php if($employ->user_role == 4){ echo "selected"; }?> value="4" >Worker</option>
 	</select>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
 </form>

</div>
