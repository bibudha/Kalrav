<div class="right_content">   
 <h1>Bill</h1>
 <script type="text/javascript">

$(document).ready(function(){
$('.chalan').hide();
var sum=0;
$('.sarni tr.clone').clone(true).removeClass('clone').addClass('clone2').insertAfter('.clone').hide();
	$('.addmore').click(function(){$('.sarni').find('.clone2').clone(true).removeClass('clone2').addClass('clone').insertBefore('.clone2').show();});
	$('.remove').click(function(){$(this).closest("tr").remove();
	 var a= $(this).closest('tr');
	var b= a.find('.sub').val();	
	 var c= $('.total').val()
	 $('.total').val(c-b);}); 
	var a=$('.clone').length;
	alert
	//moreFields();
	$('.chal').click(function(){
	$('.chalan').show();
	});
	
	$('.price').blur(function(){
		sum=0;
		var qty=($(this).val());
		 var tr=$(this).closest('tr');
		var pry=(tr.find('.quantity').val());
		var ts=$(this).closest('tr');
		//vat mul=parseFloat(qty*pry).toFixed(2);
		
		ts.find('.sub').val(qty*pry);
		$('.clone').each(function() {
			var sub_total=parseFloat($(this).find(".sub").val());
			sum=parseFloat(sum+sub_total);
			
		});
		$('.total').val(sum);
		var vat=sum*5/100;
		//alert(vat);
		$('.vat').val(vat);
		
	var final=vat+sum;
	$('.final').val(final);
	});	
	
	$('#product').change(function(){
				//alert(2);	
				var get_id=$(this).val();
				
				var u_rl="<?php echo base_url(); ?>"+"admin/orders/all_units/"+get_id;
				//$('#cat_id').find('option:not(:first)').remove();
				  $.ajax({
							url:u_rl,
							type:'GET',
							cache: false,
							data:"",
							success: function(html)
							{ 
							if(html)
								{
								//alert(html);
								$(".quantity").attr("placeholder",html);
								}
							else
								{
								alert('NO Units');
								}
							
							}
						
						
						})

		
					});
					
	
	
//document.write(d);
			
});




 </script>
 <form method="POST" action="<?php echo base_url();?>admin/invoice" name="order_form">
 <table width="200" border="0" class="sarni">

  <tr>
  <td> client </td>
  <td><input type="text" name="c_name" value=""></td>
  </tr>
  <tr >
  <td>Date</td>
  <td><input type="date" name="date" class="or_date" required/></td>
  </tr>
  <tr><td><input type="button" name="chal" value="chalan" class="chal"></td></tr>
  <tr class="clone"><td>Product </td>
  
    
   
 <td><select  name="p_id[]" id="product" >
   <option value="0">Select Product</option>
 <?php foreach($get_products  as $product) {  ?>
  <option value="<?php echo $product->p_id ?>"><?php echo $product->p_name ?></option>
  <?php  } ?></td>
 	</select>
	<td>size<br /><br />Color<br /><br />Design</td> 
	<td><input type="text" name="p_size[]"  /><br /><br /><input type="text" name="p_color[]"/><br /><br /><input type="text" name="p_design[]" /></td>
	<td>Quantity<br /><br />Price<br /><br />Sub-Total</td> 
	<td><input type="text" name="p_quantiy[]" class="quantity" placeholder="" /><br /><br /><input type="text" name="p_price[]" class="price" /><br /><br /><input type="text" name="sub_total[]" class="sub" value="" /><a class="remove" title="Remove">&#10006;</a><hr style="visibility:hidden" /></td>
	
	<!--<td>Color</td> 
	<td><input type="text" name="p_color[]"/></td>
	<td>Quantity</td> 
	<td><input type="text" name="p_quantiy[]" class="quantity1" /></td>
	<td>Price</td> 
	<td><input type="text" name="p_price[]" class="price" /></td>
	<td>Sub-Total</td> 
	<td><input type="text" name="sub-total[]" class="sub" value=""  /></td>
	 -->
	 </tr>
	 <tr> <td>Sub Total</td><td><input type="text" name="total" class="total" value="" /></td> 
	
	 
	 </tr>
	 <tr> <td>Vat 5%</td><td><input type="text" name="vat" class="vat" value="" /></td></tr>
  <tr>
  <td align="center"><a class="addmore" title="Add more">&#10010;</a></td>
  <td>Final Payment</td><td><input type="text" name="final" class="final" value="" /></td>
   
</tr>  
  </table>
 <div class="chalan">
 <h2> Chalan Detail</h2>
<table>
<tr>Packing Slip No.
<td>
</td>
</tr>
<tr>
<td><input type="text" name="pack_slip" value="">
</td>
</tr>
<tr><td><input type="submit" name="submit" value="Submit"></td>
    <td><input type="reset" name="reset" value="Cancel"></td></tr>
</table>
 </div>

  

</form>
</div>