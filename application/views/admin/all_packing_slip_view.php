
<script>

 $(document).ready(function() {
		//$('.ask').jConfirmAction();
//		$('#rounded-corner').dataTable({
//     "bJQueryUI": true,
//     "sPaginationType": "full_numbers"
//	   }); 
		var selectedCountry = new Array();
		var extraOrder = new Array();
	     $('#rounded-corner').dataTable({"bJQueryUI":true,"sPaginationType":"full_numbers"});
		
		$('.chk').click(function(){
        var n = $(".chk:checked").length;
        if (n > 0){
            jQuery(".chk:checked").each(function(){
				if(selectedCountry.length == 0)
					{
					selectedCountry.push($(this).attr("mydata"));
					
					}
				else	
					{
					if(jQuery.inArray( $(this).attr("mydata"), selectedCountry ) != -1)
						{
						
						}
					else	
						{
						extraOrder.push($(this).attr("mydata"));
						}	
					
					}
				
            });
        }
        //alert(selectedCountry);
    
		 console.log(selectedCountry);
				console.log(extraOrder);
				
				if(extraOrder.length > 0)
				{	
				//alert("Please ")
				alert("Please Select One Order Packing Slip Only");
				$('.chk').prop('checked', false);
				selectedCountry.length=0;
				console.log(selectedCountry);
				extraOrder.length=0;
				console.log(extraOrder);
				}
				else
				{
				$("#order_no").val(selectedCountry);
				}
				
				
		 
		/* var s=$('.chk').val();
		 alert(s);
		 alert($('.chk').val());*/
		 });
		 
		/* $("#sub").click(function(){
				console.log(selectedCountry);
				console.log(extraOrder);
				if(extraOrder.length > 0)
				{
				alert("Please Select One Order Packing Slip Only");
				selectedCountry.length=0;
				console.log(selectedCountry);
				extraOrder.length=0;
				console.log(extraOrder);
				alert()
				return false;
				}
				else
				{
				
				$("#order_no").val(selectedCountry);
				alert($("#order_no").val())
				$("#frm").submit();
				
			});*/
	});
	function array_compare(a, b)
		{
			// if lengths are different, arrays aren't equal
			if(a.length != b.length)
			   return false;
		
			for(i = 0; i < a.length; i++)
			{
			   if(a[i] != b[i])
				{
				return false;
				}
			}	  
		
			return true;
		}
		
	
 
 </script>



 <div class="right_content">   
 <h1> All Packing Slip  </h1><h2 align="right"> <a href="<?php echo base_url();?>admin/invoice/add_packing_slip">Add New</a></h2>
 
 <form action="<?php echo base_url();?>admin/invoice/save_checkbox/" method="post" id="frm" enctype='multipart/form-data' >
 <input type="submit" name="submit" value="Go for Chalan" align="right" id="sub"/>
 <input type="hidden" name="nom"  id="order_no" />
 
 
 <table id="rounded-corner">
 <thead>
 <tr><th>#</th>
 <th> Check box</th>
 
 <th> Order No</th>
  <th> Date </th>
 
 <th> Product Name </th>
 
 <th  >Print</th>
 <th > Delete</th></tr></thead>
 <tbody>
 <?php
 $i=1;

      
  foreach($get_packing  as $packing) { 
     
  ?>

<tr><input type="hidden" name="id" value="<?php echo $packing->id; ?>" /> 

<td><?php echo $i ;?> </td> 
<!--  Checkbox Show -->
<?php $chalan= $packing->is_chalan ; ?>
<?php if($chalan==0){?>
<td>&nbsp;&nbsp;<input type="checkbox" class="chk" mydata="<?php echo ucfirst($packing->or_id) ?>" name="chkbox[]" value="<?php echo $packing->id ;?>"/> 
                
</td>
<?php } else{ echo '<td> </td>'; }?>

<td><?php echo ucfirst($packing->osr) ?></td>
<td><?php echo ucfirst($packing->de_date) ?></td>
      <td><?php echo ucfirst($packing->p_name)  ?></td>



<td><a href="<?php echo base_url();?>admin/invoice/edit_employes/<?php echo $packing->id ?>"><img src="<?php echo base_url(); ?>assets/images/user_edit.png"></a></td>
<td><a href="<?php echo base_url();?>admin/invoice/delete_employes/<?php echo $packing->id ?>"><img src="<?php echo base_url(); ?>assets/images/trash.png"></a></td> 
  </tr><?php  $i++; } ?></tbody>
</table>


 </form>
 <a href="<?php echo base_url();?>admin/invoice/chalan_view">chalan</a>
 
<?php if($this->session->flashdata('error_msg')){ ?>
 
     <div class="error_box">
       <?php  echo $this->session->flashdata('error_msg'); ?>
     </div>  
	 <?php
	 }
	 else if($this->session->flashdata('success_msg'))
	 { ?><div class="valid_box">
        <?php  echo $this->session->flashdata('success_msg'); ?>
     </div>
	 <?php
	 }
	 ?>

</div>
