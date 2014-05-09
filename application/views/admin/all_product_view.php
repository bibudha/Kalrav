
<script>
 $(document).ready(function() {
		$('.ask').jConfirmAction();
		$('#rounded-corner').dataTable( {
     "bJQueryUI": true,
     "sPaginationType": "full_numbers"
     });
	});
 
 </script>



 <div class="right_content">   
 <h1> Products</h1>
 

 <table id="rounded-corner">
 <thead>
 <th>#</th>
 <th > Name </th>
 
 <th >Vat %</th>
 <th >Size In </th>
 <th> Quantity</th>
 
 <th  >Edit</th>
 <th > Delete</th></thead>
 <tbody>
 <?php
 $i=1;
  foreach($get_units  as $products) { ?>

<tr ><td><?php echo $i;?> </td>
<td contenteditable="true"> &nbsp;&nbsp<?php echo ucfirst($products->p_name) ?> </td>

<td><?php echo ucfirst($products->vat_par) ?></td>

<td><?php echo ucfirst($products->u_name) ?></td>
<td><?php echo ucfirst($products->p_quantity) ?></td>

<td><a href="<?php echo base_url();?>admin/product/edit_product/<?php echo $products->p_id ?>"><img src="<?php echo base_url(); ?>assets/images/user_edit.png"></a></td>
<td><a href="<?php echo base_url();?>admin/product/delete_product/<?php echo $products->p_id ?>"><img src="<?php echo base_url(); ?>assets/images/trash.png"></a></td> 
</tr><?php $i++; } ?></tbody>
</table>

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
