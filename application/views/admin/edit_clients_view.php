 <div class="right_content">   
 <h1>Edit Client</h1>
 <?php foreach($get_product  as $products) { ?>
<form action="<?php echo base_url();?>admin/clients/insert_edit_data/<?php echo $products->client_id ?>" method="post">
<table width="249" border="0"  id="rounded-corner">
   <tr>
    <td>Client Name</td>
    <td><input type="text" name="client_name" value="<?php echo $products->client_name ?>" required ></td>
  </tr>
  <tr>
    <td>Client Phone no</td>
    <td><input type="text" name="client_ph" value="<?php echo $products->client_ph ?>" required></td>
  </tr>
  <tr>
    <td>Client Mobile No.	</td>
    <td><input type="text" name="client_mo" value="<?php echo $products->client_mo ?>" required></td>
  </tr>
  <tr>
    <tr>
    <td>Client Email Id	</td>
    <td><input type="text" name="client_email" value="<?php echo $products->client_email ?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Client Address	</td>
    <td><textarea name="client_add"  required> <?php echo $products->client_add ?></textarea></td>
  </tr>
  <tr>
  <tr>
    <td>Pincode	</td>
    <td><input type="text" name="client_pin" value="<?php echo $products->client_pin ?>" required></td>
  </tr>
   <tr>
    <td>PanCard	</td>
    <td><input type="text" name="pancard" value="<?php echo $products->pancard ?>" required></td>
  </tr>
    <tr>
    <td>Vat </td>
    <td><input type="text" name="vat" value="<?php echo $products->vat ?>" required></td>
  </tr>
  <tr>
    <td>T.D.S </td>
    <td><input type="text" name="tds" value="<?php echo $products->tds ?>" required></td>
  </tr>
  <tr>
	<?php }?>
	
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
</form>

</div>

