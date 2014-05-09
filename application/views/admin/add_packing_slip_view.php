<script type="text/javascript">
 jQuery(document).ready(function(){
 $('.extra_qnty_add').hide();
 $('.extra_qnty_sub').hide();
 //$('.tott').hide();
  jQuery('#de_date').datepicker();
  jQuery('.sarninew tr.clone').clone(true).removeClass('clone').addClass('clone2').insertAfter('.clone').hide();
	$('.addmore').click(function(){$('.sarninew').find('.clone2').clone(true).removeClass('clone2').addClass('clone').insertBefore('.clone2').show();});
	$('.remove').click(function(){$(this).closest("tr").remove()});
	 var a= $(this).closest('tr');
  var c=0;

								
var u_rl="<?php echo base_url(); ?>"+"admin/invoice/packing_no";
	
				jQuery.ajax({
							url:u_rl,
							type:'GET',
							cache: false,
							data:"",
							success: function(html)
							{ 
							if(html)
								{
								//alert(html);
								var chalan_no= parseInt(html)+1;
								//alert('y');
							//	alert(chalan_no);
								
								$(".pslip_no").val(chalan_no);
								}
							else
								{
								alert('NO Units');
								}
							
							}						
						
							});														
												
					// ajax for geting all  prdoucts according to order no
					
					$('.or_no').change(function()
					{
						var no=$('.or_no').val();
						$('#product_id option').remove();
						$("#product_id").append('<option value=0>Please Select</option>');
						/*$('#product_id').each(function() {
						if($('#product_id option[value="0"]'))
						{
						}
						else{
						$('#product_id').remove();
						}
						});
						*/
						//alert(no);
						var u_rl1="<?php echo base_url(); ?>"+"admin/invoice/product_data/"+no;
						var opton="";
						jQuery.ajax({
							url:u_rl1,
							type:'GET',
							cache: false,
							data:"",
							dataType: "json",
							success: function(html)
							{ 
								if(html)
									{
									//alert(html);
									console.log(html);
									$.each(html, function(i) {
									//alert(html[i]['id']);
									opton +='<option value="'+html[i]['id']+'">'+html[i]['p_name']+'</option>';
										});
									$('#product_id').append(opton);
				//					alert(opton);
									//$(".pslip_no").val(chalan_no);
									}
									else
									{
									alert('NO Units');
									}
							
							}						
						
							});
						});		
                                    
				// ajax for geting  prdoucts  All Value according to order no
					
					$('#product_id').change(function()
					{
						var pr_no=$('#product_id').val();
						var or_no=$('.or_no').val();
						//alert(no);
						var u_rl1='<?php echo base_url(); ?>'+'admin/invoice/pro/'+pr_no+'/'+or_no;
						//alert(u_rl1);
						var opton="";
						jQuery.ajax({
							url:u_rl1,
							type:'GET',
							cache: false,
							data:"",
							dataType: "json",
							success: function(html)
							{ 
								if(html)
									{
									//alert(html);
									console.log(html);
									//var x=html[0]['p_color'];
									//alert(x);
									$('#pcolor').val(html[0]['p_color']);
									$('#pdesign').val(html[0]['p_design']);
									$('#total_quantity').val(html[0]['p_quantity']);
									$('.final_quantity').val(html[0]['p_quantity']);
									
									}
									else
									{
									alert('NO Units');
									}
							
							}						
						
							});
						});						
									            
						 /*  jQuery(".no").blur(function(e){
					  // alert(event.keyCode);
					   if(event.keyCode==9)
					   {	
					  alert('yep');
					   }
                       else{   
					   //alert('y'); 
						var tr_obj=$(this).closest('tr');
                        var qty  = tr_obj.find('.quantity').val();
						//alert(qty);
                        var copy = tr_obj.find('.no').val();						                                          
						//alert(copy);
                       
                       // var c = parseFloat($(".total_quantity").val()) ;
						//alert(c);
					/*	if(c=="NaN")
					{
						c =0 ;
						alert('this');
						}
                         else{      
                        var b = parseFloat(qty * copy);                      
						alert(b);
						 //var c = parseFloat($(".total_quantity").val()) ;
						// alert(c);
						//c = parseFloat($(".final_quantity").val();
                         c = c+b;
						alert(c);
                                          
                       jQuery(".total_quantity").val(c);
                    jQuery(".final_quantity").val(c);
                        //alert(total);
 
                     } });*/
					  
				$('.dr').hide();
				$('.direct').click(function(){
				$('.or_n').toggle();
				$('.dr').toggle();
				});
					  
					  
					 $('.or_no').change(function(){
	var option = $('option:selected', this).attr('my_data');
	//alert(option);	
	$( "#de_date" ).datepicker( "option", "minDate", new Date(option) );
					  
					  });
					  
					  
					 $('.extra').click(function(){
					var rad_val=$(this).val();
					if(rad_val=="more")
					{
					$('.extra_qnty_add').show();
					$('.extra_qnty_sub').hide();
					
					}
					else
					{
					$('.extra_qnty_sub').show();
					$('.extra_qnty_add').hide();
					}
					 });
					 
					 $('.extra_sub').blur(function(){
					 var t=parseFloat($('.final_quantity').val());
					 var e=parseFloat($(this).val());
					 var sub_result=t-e;
					$('.total_quantity').val(sub_result); 
					 
					 }); 
					
					 $('.extra_add').blur(function(){
					 var t=parseFloat($('.final_quantity').val());
					 var e=parseFloat($(this).val());
					 var add_result=t+e;
					$('.total_quantity').val(add_result); 
					 
					 }); 
					 
					 
					 // function for checking the no of packing slip product quantity is equal or not .. ??
					 $('.subm').click(function(){
					 //var cou=0;
					 var pck_tot=0;
					 
					 $('.clone').each(function(){
					 var a= $(this).closest('tr');
					// cou++;
					 var qnty_pack=parseInt(a.find('.quantity').val());
					 
					 var pck_slip_no=parseInt(a.find('.no').val());
					 //alert(qnty_pack*pck_slip_no);
					 pck_tot +=qnty_pack*pck_slip_no;
					 
					 })
					 var final_total=$('.total_quantity').val();
					if(pck_tot==final_total)
					{
					 alert("Ok It's Correct");
					// $('#frm').submit();
					 }
					 else
					 {
					 alert("Quantity In Packing Slip And Total Quantity Is Not Matching");
					 return false;
					 }
					 });
					
					
					  if($('.s').val()=="NILL")
					  {
					  
					  }
					  else
					  {
					  alert("Hey Order No is :KL14O"+$('.s').val());
					  }
 
 });
</script>
<div class="right_content">   
 <h1>Packing Slip</h1>
 <?php 
// print_r($s);
 //exit;
 
 

 
 //print_r($get_units);
 //print_r($get_units1); ?>
<form action="<?php echo base_url();?>admin/invoice/get_data" method="post" id="frm" >
<input type="hidden" name="s" class="s" value="<?php echo $s;?>" />
<table width="344" border="0"  id="rounded-corner" class="sarninew">

<!--<tr><td>Direct Billing </td> <td><input type="checkbox" name="direct" value="1" class="direct" /></td></tr>
	<tr>-->
	<tr>
    <td width="72">Order No.</td>
    <td width="144" class="or_n"><select name="or_no"  class="or_no"required>
	<option >Please Select</option>
	<?php foreach($or_no  as $order) {
	if($s==$order->id){ ?>
  <option value="<?php echo $order->id ?>" my_data="<?php echo $order->or_d ?>"><?php echo $order->no ?></option>
  <?php }
  else
  {?>
  <option value="<?php echo $order->id ?>" my_data="<?php echo $order->or_d ?>"><?php echo $order->no ?></option>
 <?php }} ?>
 	</select></td>
	
	<!--<td class="dr" ><input type="text" name="or_n" value=" " /></td>-->
  </tr>
   <tr>
    <td>Packing Slip No:</td>
    <td><input type="text" name="pslip_no" value=""  class="pslip_no" readonly="" ></td>
  </tr>
  <!-- <tr>
    <td>Client Name</td>
    <td><input type="text" name="cname" value="" required ></td>
  </tr>-->
    <tr>
    <td>Date:</td>
     <td><input type="text" name="packing_date" readonly="" class="de_date" value=""  id="de_date"/></td>
  </tr>
   <tr>
    <td >Products</td>
	<td><select name="product_id" id="product_id" required>
	<option value="0">Please Select</option>
	
 	</select></td>
   
  </tr>
 
	<tr>
    <td>Product Color:</td>
    <td><input type="text" name="pcolor" value=""  id="pcolor" required ></td>
  </tr>
	<tr>
    <td>Product Design:</td>
    <td><input type="text" name="pdesign" value=""  id="pdesign" required ></td>
  </tr>
  
   <tr class="tott">
    <td>Total Quantity:</td>
    <td><input type="text" name="total_quantity" class="total_quantity" value=""  id="total_quantity"  required >
        <input type="hidden" name="final_quantity" class="final_quantity" value="0" >
    </td><td width="114"><input type="radio" name="extra_quantity" value="more" class="extra">More<input type="radio" name="extra_quantity" value="less" class="extra">Less</td>
  </tr>
  <tr class="extra_qnty_add">
  <td>Add Extra Quantity</td>
 <td><input type="text" name="extra_add" value="0" class="extra_add" /></td> 
  </tr>
  <tr class="extra_qnty_sub">
  <td>Remove  Quantity</td>
 <td><input type="text" name="extra_sub" value="0" class="extra_sub" /></td> 
  </tr>
   <tr>
    <td>Product Description:</td>
    <td><input type="text" name="descpt" value=""  ></td>
  </tr>
 
	

<tr class="clone">
    <td>Quantity In Paking Slip:<br /><br />

 No of coyies </td>
    <td><input type="text" name="quantity[]" value="" class="quantity" ><br /><br />

<input type="text" name="no[]" value="" class="no" /></td>
<td><a class="remove" title="Remove">&#10006;</a><hr style="visibility:hidden" /></td>  </tr>
  
  <tr>
<td align="center"><a class="addmore" title="Add more">&#10010;</a></td>
    <td><input type="submit" name="submit" value="Submit" class="subm"></td>
    <td><input type="reset" name="reset" value="Cancel"></td>
  </tr>

 <tr>
 
 
 
 </table>
</form>

</div>

