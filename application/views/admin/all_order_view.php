

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
 <h1> All Orders</h1>
 

 <table id="rounded-corner">
 <thead><th>#</th>
 <th>Order No.</th>
 <th > Order Name </th>
  <th >Client Name </th>
 <th >Order Date</th>
 <th >Delivery Date </th>
  <th  >Details</th>
  <th>Status</th>
  <th>Go To </th></thead>
  
  <tbody>
  <?php
 $i=1;
  foreach($get_order  as $order) { ?>

<tr><td><?php echo $i;?> </td>
<td><?php echo ucfirst($order->or_no) ?> </td>
<td> &nbsp;&nbsp<?php echo ucfirst($order->order_name) ?> </td>
<td><?php echo ucfirst($order->client_name)?></td>
<td><?php echo ucfirst($order->order_date) ?></td>

<td><?php echo ucfirst($order->delivery_date) ?></td>
<td><a href="<?php echo base_url();?>admin/orders/order_details/<?php echo $order->order_id ?>">Details</a></td>
<td>
<?php 
if($order->is_complet==0)
{ ?>
<a href="#"><img src="<?php echo base_url(); ?>assets/images/red.jpg"></a> 
<?php } 
else{ ?><a href="#"><img src="<?php echo base_url(); ?>assets/images/green.jpg"></a><?php }?></td>
<td><?php if($order->is_packed==0)
{?>
<a href="<?php echo base_url();?>admin/invoice/add_packing_slip/<?php echo $order->order_id ?>"><?php echo"Packing Slip "; ?></a><?php
}
elseif($order->is_chalan==0)
{?>
<a href="<?php echo base_url();?>admin/invoice/all_packing_slip"><?php echo"Chalan"; ?></a><?php
}
elseif($order->is_complet)
{?>
<a href="#"><?php echo"Bill "; ?></a><?php
}
else
{?>
 <a href="#"><?php echo"Complete";?></a><?php
}
?></td>

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
