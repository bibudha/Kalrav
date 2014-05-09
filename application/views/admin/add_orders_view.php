<div class="right_content">   
 <h1>Orders</h1>
 <script type="text/javascript">

$(document).ready(function(){
 //$( '#datepi' ).datepicker();
 $('#submit,#reset').hide();
 
var sum=0;
$('.sarni tr.clone').clone(true).removeClass('clone').addClass('clone2').insertAfter('.clone').hide();
	$('.addmore').click(function(){$('.sarni').find('.clone2').clone(true).removeClass('clone2').addClass('clone').insertBefore('.clone2').show();});
	$('.remove').click(function(){$(this).closest("tr").remove();
	 var a= $(this).closest('tr');
	var b= a.find('.sub').val();	
	 var c= $('.total').val()
	 $('.total').val(c-b);}); 
	var a=$('.clone').length;
	//alert
	//moreFields();
	var final=0;
	$('.price').blur(function(){
		sum=0;
		
		 var tr=$(this).closest('tr');
		 var qty=($(this).val());
		//alert(qty);
		var pry=(tr.find('.quantity').val());
		var ts=$(this).closest('tr');
		//vat mul=parseFloat(qty*pry).toFixed(2);
		//sum=0;
		ts.find('.sub').val(qty*pry);
		$('.clone').each(function() {
			var sub_total=parseFloat(ts.find("#sub").val());
			sum=0;
			sum=parseFloat(sum+sub_total);
			
		});
                
               // $(".vat").blur(function(){
               
                var vat=ts.find('.vat').val();

		var vatam=sum*vat/100;
		//alert(vatam);
	
		ts.find('.vatam').val(vatam);
		ts.find('.total').val(sum+vatam);

                $('.final').val(final); 
               // });
	});
        
         	     
         
	 $('#btn').click(function() {
                   var total = 0;
                    
                      
                    $('.clone').each(function (index) {
					var a= $(this).closest('tr');
					
					var vat= a.find('.vat').val();
					//alert(vat);
                   var sub_total=parseFloat(a.find("#sub").val());
			//alert(sub_total);
		sum=0;
		sum=parseFloat(sum+sub_total);
                       var vatam=sum*vat/100;
					//alert(sum);              
                   
                    total = total + vatam + parseFloat($(this).find('.sub').val());
                    });
                    $('input.final').val(total);
					//alert(total);
					
					$('#submit,#reset').show();
         });
		 
         $("#p_size,#p_color,#quantity,#price,#sub,#vat,#vatam,#p_design").click(function()
		 {
		 var a= $(this).closest('tr');
		 if(a.find("#product").val()==0)
		 {
		 alert("Please Select Product First");
		  $("#p_size,#p_color,#quantity,#price,#sub,#vat,#vatam,#p_design").attr('readonly',true);
		  		 
		 }
		 else
		 {
		  $("#p_size,#p_color,#quantity,#price,#sub,#vat,#vatam,#p_design").removeAttr('readonly',true);
		 }
		 
		 } );
         
         
	$('.product').change(function(){
				//alert(2);	
				
				var get_id=$(this).val();
				
				var cur_row=$(this).closest("tr");
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
								var st=html.split("///");
								
								//console.log(cur_row.find(".quantity"));
								cur_row.find(".quantity").attr("placeholder",st[0]);
								cur_row.find(".vat").val(st[1]);
								}
							else
								{
								alert('NO Units');
								}
							
							}
						
						
						})

		
					});
					
	// $( '#de_date' ).datepicker({onSelect: function myfunction(){minDate:d}});
	
	
	$('.de_date').datepicker();
$('.or_date').datepicker({
  onSelect: function(dateText, inst) {
    $('.de_date').val("");
    $('.de_date').datepicker("option", "minDate", new Date(dateText));
  }
});
	
//document.write(d);
			
});

//function myfunction()
//{
//$('.de_date').click(function(){
//		//var d=new Date();
//	var d =$('.or_date').val();
//	
//	//alert(d);
//		//$('.de_date').attr("min",d);
//	//minDate: new Date(d);
//		});
//}


 </script>
 <form method="POST" action="<?php echo base_url();?>admin/orders/get_order" name="order_form">
 <table width="200" border="0" class="sarni">

<?php 
$ste="KL".date('y')."O".$or_no;
//echo $ste;
?>
<tr>
<td>Order No.</td>
<td><input type="text" readonly="" name="or_no" value="<?php echo $ste; ?>"  /> </td>
</tr>
  <tr>
   <td> client </td>
  <td><select name="client_id"  class="client"required>
	<option value="0">Please Select</option>
	<?php foreach($get_units  as $clients) { ?>
  <option value="<?php echo $clients->client_id ?>"><?php echo $clients->client_name ?></option>
  <?php } ?>
 	</select></td>
	<td><a href="<?php echo base_url();?>admin/clients">add new</a> 
	</td>
    
  </tr>
  <tr >
  <td> Order Date</td>
  <td><input type="text" name="order_date" class="or_date" value=""  id="datepi"/></td>
  </tr>
  <tr>
  <td> Order Delivary Date</td>
  <td><input type="text" name="delivery_date" class="de_date"  id="de_date" /></td>
  </tr>
  <tr>
  <td> Order Name</td>
  <td><input type="text" name="order_name" /></td>
  </tr>
  <tr><td> Type</td>
  <td><select name="job">
  		<option value="0">Select Type</option>
		<option value="1">Job Work In</option>
		<option value="2">Job Work Out</option>
		<option value="3">Finished Good In</option>
		<option value="4">Finished Good out</option></select></td>
  </tr>
   <tr class="clone"><td>Product </td>
  
    
   
 <td><select  name="p_id[]" id="product" class="product" >
   <option value="0">Select Product</option>
 <?php foreach($get_products  as $product) {  ?>
  <option value="<?php echo $product->p_id ?>"><?php echo $product->p_name ?></option>
  <?php  } ?></td>
 	</select>
	<td>size<br /><br />Color<br /><br />Design</td> 
	<td><input type="text" name="p_size[]" id="p_size" /><br /><br /><input type="text" name="p_color[]" id="p_color"/><br /><br /><input type="text" name="p_design[]"  id="p_design"/></td>
	<td>Quantity<br /><br />Price<br /><br />Sub-Total</td> 
	<td><input type="text" name="p_quantiy[]" class="quantity" placeholder="" id="quantity"/><br /><br /><input type="text" name="p_price[]" class="price" id="price" /><br /><br /><input type="text" name="sub_total[]" class="sub" id="sub" value="" /><a class="remove" title="Remove">&#10006;</a><hr style="visibility:hidden" /></td> 
	
	<td>Vat %<br /> vat amount</td><td><input type="text" name="vat" class="vat" value=""  id="vat"/>
	<input type="text" name="vatam" class="vatam" value="" id="vatam"/></td>
	
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


  <tr>
  <td align="center"><a class="addmore" title="Add more">&#10010;</a></td>
  <td>Final Payment</td><td><input type="text" name="final" class="final" value="" /></td>

  <td><input id="btn" value="Calculate Total" type="button"></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" value="Order" id="submit"></td>
   
    <td><input type="reset" name="reset" value="Cancel" id="reset"></td>
</tr>  
  </table>
 

  

</form>
</div>