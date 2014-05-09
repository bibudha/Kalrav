

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
 <h1> All Bill</h1>
 

 <table id="rounded-corner">
 <thead><th>#</th>
 <th >Bill No</th>
  <th >Bill Date </th>
  <th>Bill Amount</th>
 <th >Print</th>
   <tbody>
  <?php
 $i=1;
  foreach($details  as $de) { ?>

<tr><td><?php echo $i;?> </td>
<td> &nbsp;&nbsp<?php echo ucfirst($de->invoice_no) ?> </td>
<td><?php echo ucfirst($de->inv_date)?></td>
<td><?php echo ucfirst($de->in_total) ?></td>
<td><a href="#">Details</a></td>


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
