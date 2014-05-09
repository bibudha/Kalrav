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
 <h1> Clients</h1>
 

 <table id="rounded-corner">
 <thead><th>#</th>
 <th > Name </th>
 <th >Phone no</th>
 <th >Mobile No.</th>
 <th >Email Id </th>
 <th >Address </th>
 <th >Pincode</th>
 <th >Pancard</th>
 <th >Vat</th>
 <th >T.D.S</th>
 <th >Edit </th>
 <th >Delete</th></thead>
 <tbody>
  <?php
 $i=1;
  foreach($get_units  as $products) { ?>

<tr><td><?php echo $i;?> </td>
<td> &nbsp;&nbsp<?php echo ucfirst($products->client_name) ?> </td>
<td><?php echo ucfirst($products->client_ph)?></td>
<td><?php echo ucfirst($products->client_mo) ?></td>

<td><?php echo ucfirst($products->client_email) ?></td>
<td><?php echo ucfirst($products->client_add) ?></td>
<td><?php echo ucfirst($products->client_pin) ?></td>
<td><?php echo ucfirst($products->pancard) ?></td>
<td><?php echo ucfirst($products->vat) ?></td>
<td><?php echo ucfirst($products->tds) ?></td>
<td><a href="<?php echo base_url();?>admin/clients/edit_clients/<?php echo $products->client_id ?>"><img src="<?php echo base_url(); ?>assets/images/user_edit.png"></a></td>
<td><a href="<?php echo base_url();?>admin/clients/delete_clients/<?php echo $products->client_id ?>"><img src="<?php echo base_url(); ?>assets/images/trash.png"></a></td> 

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
