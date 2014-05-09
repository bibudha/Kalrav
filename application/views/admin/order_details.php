


 <div class="right_content">   
 
 
<table width="386" border="0">
 <?php

  foreach($get_order  as $order) { ?>
  <tr><td> Order No.</td>
  
  <td><?php echo $order->or_no ?></td></tr>
  <tr>
  
    <td width="90" height="38">Order Name</td>
    <td width="90"><?php echo $order->order_name ?></td>
    <td width="99">Client Name </td>
    <td width="89"><?php echo $order->client_name?></td>
  </tr>
  <tr>
    <td height="46">Order Date</td>
    <td><?php echo $order->order_date ?></td>
    <td>Delivery Date</td>
    <td><?php echo $order->delivery_date ?></td>
  </tr>
 
  </table>
<hr /><h1>Product Details</h1>
<hr />

<table id="rounded-corner">
 <thead>
 <th>#</th>
 <th > Product Name </th>
 
  <th >Size</th>
 <th >color</th>
<th >Price </th>
<th>Design</th>
 <th> Quantity</th>
 <th> Units </th>
  <th  >Sub Total</th>
   </thead>
 <?php
 $i=1;
  foreach($product_detail  as $products) { ?>
<tbody>
<tr><td><?php echo $i;?> </td>
<td> &nbsp;&nbsp<?php echo $products->name ?> </td>

<td><?php echo $products->size ?></td>
<td><?php echo $products->color ?></td>
<td><?php echo $products->price ?></td>
<td><?php echo $products->design ?></td>
<td><?php echo $products->quantity ?></td> 
<td><?php echo $products->unit ?></td>
<td><?php echo $products->subtotal ?></td>


</tr><?php 
 $i++; } ?>
<tr align="right"><td>Total</td><td><?php  echo $order->total; ?></td>
</tr></tbody>
</table>
 <?php }?>
<p><a href="<?php echo base_url();?>admin/orders/print_details/<?php echo $order->order_id ?>" target="_blank">Print This </a></p>
</div>
