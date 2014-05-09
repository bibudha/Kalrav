<div class="right_content">   
<h1>Chalan </h1>
<script type="text/javascript">

$(document).ready(function(){
$('#submit').hide();

 $( '#ch_date' ).datepicker();
	
	var u_rl="<?php echo base_url(); ?>"+"admin/invoice/get_chalan_no";
	
				$.ajax({
							url:u_rl,
							type:'GET',
							cache: false,
							data:"",
							success: function(html)
							{ 
							if(html)
								{
								//alert(typeof(html));
								var chalan_no= parseInt(html)+1;
								//alert(chalan_no);
								//
								var today = new Date();
								var yyyy = today.getFullYear();
							//	alert(typeof(yyyy));
								var n =yyyy.toString();
								//	alert(typeof(n));
								var ss=n.split("20");
								//alert(ss[1]);
								var st="KL"+ss[1]+"C"+chalan_no;
								//alert(st);
								$(".ch_no").val(st);
								}
							else
								{
								alert('NO Units');
								}
							
							}
						
						
						})
					
					$(".price_per").blur(function(){
					//var kl=$(".vat").val();
					//alert(kl);
					
					var cl=$(this).closest('tr');
					var vl=cl.find(".vat").val();
					var ppl=$(this).val();
					var tl=parseFloat(cl.find('.qty').text());
					var at=tl*ppl;
					//alert(at);	
					var vat=at*vl/100;
					cl.find(".total_price").val(vat+at);
					
					//var kl=cl.$(".vat").val();
					//alert(final_total);
					});
                                                                            
                                        
                                 
	
	var option=$("#order_date").val();
	$( "#ch_date" ).datepicker( "option", "minDate", new Date(option) );
	
	
	
        });
		
		function final_total1()
		{
		
                 // alert('yep');                          					              
                                        var total = 0;
                                        $('.total_price').each(function (index, element) {
                                            total = total + parseFloat($(element).val());
                                        });
                                        
                                        $('input.final_total').val(total);
										$('#submit').show();
				 	
	
		}
	</script>
<form action="<?php echo base_url();?>admin/invoice/bill_details" method="post">

<table width="507" border="0" >
<tr><td>Order No.</td>
<td><input type="text" readonly="" name="order" value="<?php echo $order_n[0]->or_no; ?>" />
<input type="hidden" name="order_id" value="<?php echo $order_n[0]->order_id; ?>" /></td></tr>
<tr>
    <td width="46">Chalan No </td>
    <td width="146"><input type="text" name="ch_no" readonly="" value="" class="ch_no" ></td>
    <td width="126"> Chalan date </td>
    <td width="171"><input type="text" readonly="" name="ch_date" value="" id="ch_date" /><input type="hidden" id="order_date" value="<?php echo $order_n[0]->order_date ?>" /></td>
	
  </tr>
  <tr>
    <td>Client Name </td>
    <td><input type="text" name="client_name" placeholder="Client Name" value="<?php echo $order_n[0]->client_name;?>"><input type="hidden" name="client_id" value="<?php echo $order_n[0]->client_id; ?>"</td>
	
    </tr>
<br>
<tr><td colspan="4"><h2> Packing Slip Details </h2></td></tr>
<br>
<tr>
<td>Packing Slip Id</td>
<td>Date</td>
<td>Product Name</td>
<td>Description</td>
<td>Color</td>
<td>Design</td>
<td>Quantity*Packing Slip </td>
<td>Total Quantity </td>
<td> Vat % </td>
<td>Price per Unit</td>
<td>Total Price</td>
</tr>
<?php
$i=0;

foreach($pcka as $as)
{ ?><input type="hidden" name="id[]" value="<?php echo $as->id ?>" />
<tr>
<td><?php echo $as->id ?></td>
<td><?php echo $as->de_date ?></td>
<td><?php echo $as->p_name ?></td>
<td><?php echo $as->descpt ?></td>
<td><?php echo $as->pcolor ?></td>
<td><?php echo $as->pdesign ?></td>
<td><?php echo $as->quantity ?></td>
<td class="qty"><?php echo $as->total_quantity ?><input type="hidden" name="tot" value="<?php echo $as->total_quantity ?>" id="tot" class="tot" /></td>
<td><input type="text" name="vat[]" value="<?php echo $as->vat_par ?>"  id="vat[<?php echo $i ?>]" class="vat"/></td>
<td><input type="text" name="price_per[]" value="<?php echo $as->Price ?>" id="price_per[<?php echo $i ?>]" class="price_per"  /></td>
<td><input type="text" name="total_price[]" value="" id="total_price[<?php echo $i ?>]" class="total_price" /></td>
</tr>
<?php $i++; } ?>
<tr>
  <td><input type="button" name="Final_Total" onclick="final_total1();" value="final total"  /></td><td><input type="text" name="final_total" value="" id="final_total[<?php echo $i ?>]" class="final_total" /></td>

</tr>
 <tr>
 <input type="hidden" name="i" value="<?php echo $i; ?>" id="i" />
    <td colspan="4"><input type="submit" name="submit" value="Submit" id="submit"></td>
    
	</tr>
</table>
</form>
</div>