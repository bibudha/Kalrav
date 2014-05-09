 <div class="right_content">   
 <h1>Add Client</h1>
 <form action="<?php echo base_url();?>admin/clients/get_data" method="post">
<table width="249" border="0"  id="rounded-corner">
   <tr>
    <td>Client Name</td>
    <td><input type="text" name="client_name" value="" required ></td>
  </tr>
  <tr>
    <td>Client Phone no</td>
    <td><input type="text" name="client_ph" value="" ></td>
  </tr>
  <tr>
    <td>Client Mobile No.	</td>
    <td><input type="text" name="client_mo" value="" ></td>
  </tr>
  <tr>
    <tr>
    <td>Client Email Id	</td>
    <td><input type="text" name="client_email" value="" ></td>
  </tr>
  <tr>
  <tr>
    <td>Client Address	</td>
    <td><textarea name="client_add" value="" > </textarea></td>
  </tr>
  <tr>
  <tr>
    <td>Pincode	</td>
    <td><input type="text" name="client_pin" value="" ></td>
  </tr>
   <tr>
    <td>Pan Card </td>
    <td><input type="text" name="pancard" value="" ></td>
  </tr>
   <tr>
    <td>Vat </td>
    <td><input type="text" name="vat" value="" ></td>
  </tr>
   <tr>
    <td>T.D.S </td>
    <td><input type="text" name="tds" value="" ></td>
  </tr>
  <tr>
	
	
    <td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>
</table>
</form>

</div>

