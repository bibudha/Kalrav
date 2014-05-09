
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
 <h1> Employes </h1>
 

 <table id="rounded-corner">
 <thead>
 <th>#</th>
 <th > First Name </th>
 
 <th> Last Name </th>
 
  <th> Mobile </th>
 
 <th> User Name </th>
 
 <th > Role  </th>
 
 <th  > Activate </th>
 
 <th  >Edit</th>
 <th > Delete</th></thead>
 <tbody>
 <?php
 $i=1;
  foreach($get_units  as $employe) { ?>

<tr><td><?php echo ucfirst($employe->user_id)?> </td>
<td> &nbsp;&nbsp<?php echo ucfirst($employe->fname) ?> </td>
<td><?php echo ucfirst($employe->lname) ?></td>
<td><?php echo ucfirst($employe->mobile) ?></td>
<td><?php echo ucfirst($employe->user_name) ?></td>
<td><?php echo ucfirst($employe->user_role) ?></td>
<td><?php echo ucfirst($employe->user_isactive) ?></td>

<td><a href="<?php echo base_url();?>admin/employes/edit_employes/<?php echo $employe->user_id ?>"><img src="<?php echo base_url(); ?>assets/images/user_edit.png"></a></td>
<td><a href="<?php echo base_url();?>admin/employes/delete_employes/<?php echo $employe->user_id ?>"><img src="<?php echo base_url(); ?>assets/images/trash.png"></a></td> 
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
