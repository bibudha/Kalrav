<div class="right_content">   
<h1>Bill </h1>

<script type="text/javascript">

$(document).ready(function(){
$('.total').hide();


});
function calc()
{
//alert('yep'); 
var tot=0;
		$('.price').each(function(i){
		//alert(i);
		var prc=$("#price"+i).val();
		//alert(prc);
		if(prc == "")
			{
			alert('Dont leave price field');
			}
		else
		{
		//alert(prc);
		
		 var tr=$(this).closest('tr');
		 var pry=(tr.find('.quantity').val());
		// alert(pry);
		tot +=parseFloat(prc)*parseFloat(pry);
		
		}
		
		})
		
	
	alert(tot);
	$('.total').show();
	$("#total").val(tot);
}

</script>




<table width="507" border="0" class="sarni">
<?php  foreach($chalan_data  as $chalan) { ?>
    <td width="46">Chalan No </td>
    <td width="146"><input type="text" name="ch_no" readonly="" value="<?php echo $chalan->ch_no; ?>" class="ch_no" ></td>
    <td width="126"> Bill date </td>
    <td width="171"><input type="date" name="date_date"   value="" /></td>
  </tr>
  <tr>
    <td>Client Name </td>
    <td><input type="text" name="client_name" placeholder="Client Name" readonly="" value="<?php echo $chalan->client_name; ?>"></td>
	 <td>Packing Slip Number </td>
    <td><input type="text" name="paking_slip_no"  readonly="" value="<?php echo $chalan->pack_slip_no; ?>"/></td>
    </tr> <?php } ?>
<br>

<tr><td colspan="4"><br>
<h2>  Details </h2></td></tr>
<br>
<?php $i=0;
foreach($product_data as $product) { ?>
<tr class="clone"><td>Particulars</td><td><input type="text" name="particular[]" value="<?php echo $product->particulars; ?>"></td>
<td>&nbsp;&nbsp;&nbsp; Size</td>
<td><input type="text" name="size[]" placeholder="Size"   value="<?php echo $product->size; ?>" required/></td></<br />
<td>Quantity</td>
<td><input type="text" name="quantity[]"  id="quantity" placeholder="Quantity"  class="quantity"  required value="<?php echo $product->quantity; ?>"/></td><br>

<td>price</td>
<td><input type="text" name="price" placeholder="price"  class="price" id="price<?php echo $i; ?>" value="" required/></td>
<?php
$i++;
} ?>
<td></td>
	</tr>
	 <tr>
	 
  <td align="center"></td></tr>
  <tr><td><input type="button" name="cal" value="cal" onClick="calc()" ></td></tr>
  <tr><td>Total</td><td><input type="text" name="total" id="total" class="total" value="" /></td>
    <td colspan="4"><a href="<?php echo base_url();?>admin/invoice/print_bill/<?php echo $chalan->ch_no; ?>">Print This </a></td>
    
	</tr>
</table>

</div>