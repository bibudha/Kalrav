<script type="text/javascript">

$(document).ready(function(){

 $( '#inv_date' ).datepicker();
	});
	
</script>
<?php 
//$a=date('y');
//echo $a."yep";
//$a="K";
//$b="B";
$ste="KL".date('y')."B".$inv;
//echo $ste;
?>
<div class="right_content">
<form action="<?php echo base_url();?>admin/invoice/invoice_data " method="post" >
<TABLE BORDER="2"    WIDTH="100%"   CELLPADDING="2" CELLSPACING="2">
       <TR>
          <th COLSPAN="2"><BR><strong>Kalrav</strong></TH>         
       </TR>
       <TR>
           <TD colspan="4"><strong>Invoice No. :</strong><input type="text" readonly="" name="in_id" value="<?php echo $ste."\n";  ?>"  /> <strong style=" float:right "><?php echo"\t";?>Date :<input type="text" readonly="" name="in_date" value=" " id="inv_date" /></strong></TD>    
       </TR>
       <TR>
          <TD rowspan="3">Mr.&nbsp <input type="text" name="client_name" value="" /> </TD>
          
       </TR>
       <TR> 
           <TD><b style="margin-right:10px;">Order No.</b> <?php echo $order_data->or_no ;?> <b style="margin-left:90px">Date</b> <?php echo $order_data->order_date;?></TD>
       </TR>
       <TR> 
           <TD>G.R No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...................................&nbsp;&nbsp; Date................................</TD>
       </TR>
     
</TABLE>
<hr>
<table border="2" width="100%"  cellpadding="2" cellspacing="2">   
        <thead>
          <th>Chalan.No</th>
          <th>PARTICULARS</th>
          <th>VAT</th>
          <th>Total Units.</th>
          <th>RATE</th>
          <th>AMOUNT <br/>
          Rs. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
         </thead>
         <?php $to=0;
		 foreach($chalan_data as $key => $val)
{?>
        <tr>
          <td ><input type="text" name="ch_no[]" readonly="" value="<?php echo $key; ?>"  /> </td> <td>
		  <?php foreach($chalan_data[$key] as $k)
			{ ?>
        <?php echo "\n\n\n".$k['name']; ?><br />
		  <?php echo "(".$k['color'].")";  echo "(".$k['desgin'].")"; ?><br /><br />

 <?php }  ?> </td>
        <td ><?php if($k['vat']==0){echo"NA";}else{echo $k['per'];}?> </td>
         <td ><?php echo $k['quantity']; ?></td>
		  <td ><?php echo $k['price_per']; ?></td>
          <td ><?php echo $k['t_final']; ?></td>
          <?php
		  $to +=$k['t_final']; ?>
       </tr><?php } ?>
       <!-- <tr>
          <td>Desigh : ABCD</td>
       </tr>
        <tr>
          <td>Size : 12233</td>
       </tr>-->
       <tr>
          <td colspan="4"></td>
          <td>Total</td>
          <td><input type="text" name="to" value="<?php echo $to; ?>" readonly=""  /></td>
         
       </tr>
      
       <tr>
          <td colspan="4">Rs in Words :   .............................................................</td>
          <td>G.Total</td>
          <td><?php echo $to; ?></td>
          
       </tr>
       
        <tr>
            <td colspan="7">Directed Jaipur jurisdiction must be within ........ Days & by payment draft/cash only :   ....................................<br/><p>Party Signature : ..................................</p> 
                <p style="float: right; margin-right: 100px;">For : Kalrav </p><br/><br/>
                <p style="float: right; margin-bottom: 10px; margin-right:0px;">Propriter</p></td>
         
     
       </tr>
</table>



















<?php /*
 //print_r($chalan_data);
//print_r(array_chunk($chalan_data, 1));
//print_r($chalan_data);

foreach($chalan_data as $key => $val)
{

//echo (key($chalan_data));
//echo array_keys($chalan_data);
//echo current($chalan_data);
//echo key($chalan_data);
echo $key;
//var_dump($key);
	foreach($chalan_data[$key] as $k)
	{
	
	
	echo $k['name'];
	
	//echo $key[$k]['name'];
	
	}

    //$parts = explode('_', $key);  
	//print_r($parts) ; //split your $key
    //then deal with corresponding $value
}


//echo count($chalan_data);
//$i=0;
//for($i=0;$i<count($chalan_data);$i++)
//{
//echo $chalan_data[];
//}
*/?>
<input type="submit" name="submit" value="Save"  />
</form>

</div>