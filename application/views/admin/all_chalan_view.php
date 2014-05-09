
<script>
 $(document).ready(function() {
		//$('.ask').jConfirmAction();
//		$('#rounded-corner').dataTable({
//     "bJQueryUI": true,
//     "sPaginationType": "full_numbers"
//	   });
	     $('#rounded-corner').dataTable({"bJQueryUI":true,"sPaginationType":"full_numbers"});
	});
 
 </script>



 <div class="right_content">   
 <h1> All Chalan </h1><h2 align="right"> <a href="<?php echo base_url();?>admin/invoice/all_packing_slip">Add New</a></h2>
 
 <form action="<?php echo base_url();?>admin/invoice/ch_check/" method="post">
 <input type="submit" name="submit" value="Go  For Bill" align="right" />
 
 
 <table id="rounded-corner">
 <thead>
 <tr><th>#</th>
 <th> Check box</th>
 
 <th> Order No.</th>
  <th> Date </th>
 
 <th> Client Name </th>
 
 <th  >Edit</th>
 <th > Delete</th></tr></thead>
 <tbody>
 <?php
 $i=1;
  foreach($get_bill  as $bill) { 
  
  ?>

<tr><!--<input type="hidden" name="id" value="<?php echo $packing->id; ?>" />-->
<td><?php echo $i ;?> </td> 
<!--  Checkbox Show -->
<?php $chalan= $bill->is_bill ; ?>
<?php if($chalan==0){?>
<td>&nbsp;&nbsp;<input type="checkbox"  name="chkbox[]" value="<?php echo $bill->ch_no ;?>"/> 
                
</td>
<?php } else{ echo '<td> </td>'; }?>

<td><?php echo ucfirst($bill->order_no) ?></td>
<td><?php echo ucfirst($bill->ch_date) ?></td>
<td><?php echo ucfirst($bill->client_name) ?></td>



<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/user_edit.png"></a></td>
<td><a href="#"><img src="<?php echo base_url(); ?>assets/images/trash.png"></a></td> 
</tr><?php $i++; } ?></tbody>
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
